(function (angular) {
    'use strict';
    var chatApp = angular.module('chatBar', ['ngCookies', 'ngFileUpload', 'ngSanitize']);
    var apiBase = 'http://128.199.85.112/garagev2/api/chat';
    var socketServer = 'http://128.199.85.112:8890';
    // var apiBase = 'http://localhost/garagev2/api/chat';
    // var socketServer = 'http://localhost:8890';
    var socketPath = '/garagev2/socket.io';

    chatApp.controller('ChatController', ['$scope', '$timeout', '$http', '$cookieStore', 'Upload',
        function ($scope, $timeout, $http, $cookieStore, Upload) {
            $scope.messages = {};
            $scope.currentPerson = false;
            $scope.currentMessage = {};
            $scope.chat_file = [];
            $scope.me = {
                token: $cookieStore.get('access_token'),
            };

            var scrollToBottom = function (person) {
                $timeout(function () {
                    var itemContainer = $('#window_' + person.user_id + '.chatbar-messages .messages-list');
                    var scrollTo_int = itemContainer.prop('scrollHeight') + 'px';
                    itemContainer.slimScroll({
                        scrollTo: scrollTo_int,
                        height: $(window).height() - 250,
                        // scrollBy: '400px',
                        start: 'bottom',
                        alwaysVisible: true
                    });
                });
            };

            $http.get(apiBase + '/me').then(function (data, status, headers, config) {
                $scope.me.id = data.data.data.id;
                $scope.me.name = data.data.data.name;
            }, function (data, status, headers, config) {
                console.log(data);
            });

            var getPeople = function () {
                $http.get(apiBase + '/people').then(function (data, status, headers, config) {
                    $scope.people = data.data.data;
                    var unread = 0;
                    $scope.people.forEach(function (person) {
                        getMessages(person);
                        if (person.chua_doc > 0) {
                            unread += person.chua_doc;
                        }
                    });
                    if (unread > 0) {
                        if ($('#chat-link').find('>span.badge').length) {
                            $('#chat-link').find('>span.badge').text(unread);
                        } else {
                            $('#chat-link').find('>i').after('<span class="badge">' + unread + '</span>');
                        }
                    } else {
                        $('#chat-link').find('>span.badge').remove();
                    }
                }, function (data, status, headers, config) {
                    console.log(data);
                });
            };
            getPeople();
            console.log($scope.messages);

            $('#chat-link').on('click', function () {
                getPeople();
            });

            var getMessages = function (person, start) {
                if (!person) return false;
                $http.get(apiBase + '/messages?receiver=' + person.user_id).then(function (data, status, headers, config) {
                    var key = 'msgs_' + person.user_id;
                    $scope.messages[key] = data.data.data;
                    scrollToBottom(person);
                    if (start != undefined && start == true) {
                        $scope.$watch("chat_file['file_" + person.user_id + "']", function () {
                            // console.log('Watching... ' + person.user_id);
                            // console.log($scope.chat_file['file_' + person.user_id]);
                            if ($scope.chat_file['file_' + person.user_id]) {
                                // console.log($scope.data)
                                Upload.upload({
                                    url: apiBase + '/upload',
                                    data: {file: $scope.chat_file['file_' + person.user_id]}
                                }).then(function (response) {
                                    if (response.status) {
                                        var message = angular.copy($scope.currentMessage['current_' + person.user_id]);
                                        $scope.currentMessage['current_' + person.user_id].text = '';
                                        message.text = response.data.data;
                                        $scope.messages['msgs_' + person.user_id].push(message);
                                        doSendMessage(message);
                                        scrollToBottom(person);
                                    }
                                }, function (response) {
                                    console.log(response);
                                }, function (evt) {
                                    console.log(evt);
                                });
                            }
                        });
                    }
                }, function (data, status, headers, config) {
                    console.log(data);
                });
            };

            var getFormattedDate = function () {
                var d = new Date();
                d = d.getFullYear() + "-" + ('0' + (d.getMonth() + 1)).slice(-2) + "-" + ('0' + d.getDate()).slice(-2) + " " + ('0' + d.getHours()).slice(-2) + ":" + ('0' + d.getMinutes()).slice(-2) + ":" + ('0' + d.getSeconds()).slice(-2);
                return d;
            }

            $scope.startChat = function (person) {
                var activeCount = 0;
                var list = $('.chat-window', $('#window_' + person.user_id).parent().parent());
                console.log('START CHAT');
                list.each(function (idx, obj) {
                    if ($(obj).attr('data-active') != '1') {
                        // console.log('hide all chat not active')
                        console.log('hide: ' + $('.chatbar-messages', obj).attr('id'))
                        console.log(' ------------------------- ');
                        $(obj).hide();
                    } else {
                        activeCount++;
                        console.log('show: ' + $('.chatbar-messages', obj).attr('id'));
                        $('.chatbar-messages', obj).show().css({
                            left: (activeCount * 260)
                        });
                        // console.log(activeCount)
                    }
                });
                // console.log('Number of active window(s): ' + (activeCount + 1));
                // console.log('#window_' + person.user_id);
                setTimeout(function () {
                    $('#window_' + person.user_id).parent().attr('data-active', '1').show();
                    $('#window_' + person.user_id).show().css({
                        left: (activeCount * 260)
                    });
                }, 200);

                $scope.currentPerson = person;
                // $scope.messages = {};
                getMessages(person, true);
                $scope.currentMessage['current_' + person.user_id] = {
                    name: $scope.me.name,
                    receiver: person.user_id,
                    user_id: $scope.me.id,
                    time: getFormattedDate(),
                    text: ''
                };
            };

            $scope.closeCurrentChat = function (person) {
                $scope.currentPerson = false;
                var activeCount = 0;
                $('#window_' + person.user_id).parent().attr('data-active', '0').hide();
                var list = $('.chat-window', $('#window_' + person.user_id).parent().parent());
                list.each(function (idx, obj) {
                    // console.log(obj);
                    if ($(obj).attr('data-active') == '1') {
                        $('.chatbar-messages', obj).show().css({
                            left: (activeCount * 260)
                        });
                        activeCount++;
                    }
                });
                // getPeople();
            };

            var doSendMessage = function (message) {
                $http.post(apiBase + '/send-message', message).then(function (data, status, headers, config) {
                    console.log(data);
                }, function (data, status, headers, config) {
                    console.log(data);
                });
            };

            $scope.sendMsg = function (person) {
                if (!$scope.currentMessage['current_' + person.user_id].text.length) {
                    return false;
                }
                var message = angular.copy($scope.currentMessage['current_' + person.user_id]);
                $scope.currentMessage['current_' + person.user_id].text = '';
                $scope.messages['msgs_' + person.user_id].push(message);
                doSendMessage(message);
                scrollToBottom(person);
            };

            // $scope.$watch('chat_file', function () {
            //     if ($scope.chat_file) {
            //         console.log($scope.data)
            //         Upload.upload({
            //             url: apiBase + '/upload',
            //             data: {file: $scope.chat_file}
            //         }).then(function (response) {
            //             if (response.status) {
            //                 var message = angular.copy($scope.currentMessage);
            //                 $scope.currentMessage.text = '';
            //                 message.text = response.data.data;
            //                 $scope.messages.push(message);
            //                 doSendMessage(message);
            //                 scrollToBottom();
            //             }
            //         }, function (response) {
            //             console.log(response);
            //         }, function (evt) {
            //             console.log(evt);
            //         });
            //     }
            // });

            var socket = io.connect(socketServer, {path: socketPath});
            socket.on('message', function (data) {
                if ($scope.currentPerson) {
                    data = jQuery.parseJSON(data);
                    if (data.token === $scope.me.token) {
                        $scope.$apply(function () {
                            $scope.messages.push(data.message);
                            scrollToBottom();
                        });
                    }
                } else {
                    getPeople();
                }
                console.log(data);
            });
            socket.emit('online', {token: $scope.me.token});

            socket.on('updatePeople', function (data) {
                getPeople();
            });

            $scope.makeRead = function () {
                socket.emit('makeRead', {token: $scope.me.token, receiver: $scope.currentMessage.receiver});
            };

        }])
        .directive('myEnter', function () {
            return function (scope, element, attrs) {
                element.bind("keydown keypress", function (event) {
                    if (event.which === 13) {
                        scope.$apply(function () {
                            scope.$eval(attrs.myEnter);
                        });
                        console.log('enter enter');
                        event.preventDefault();
                    }
                });
            };
        });
})(window.angular);