var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server, {path: '/garagev2/socket.io'});
var redis = require('redis');
var http = require('http');
var token = {};

server.listen(8890);
io.on('connection', function (socket) {

  console.log("client connected");
  var redisClient = redis.createClient();
  redisClient.subscribe('message');

  redisClient.on("message", function (channel, data) {
    console.log("Data: " + data);
    socket.emit(channel, data);
  });

  redisClient.on("updatePeople", function (channel, data) {
    console.log("Data: " + data);
    socket.emit(channel, data);
  });

  socket.on('makeRead', function (data) {
    var options = {
      host: 'localhost',
      port: 80,
      path: '/garagev2/api/chat/make-read?receiver=' + data.receiver + '&token=' + data.token,
      method: 'POST'
    };

    http.request(options, function(res) {
      res.setEncoding('utf8');
      res.on('data', function (chunk) {
        console.log('BODY: ' + chunk);
      });
    }).end();
  });

  socket.on('online', function(data){
    token = data.token;
    var options = {
      host: 'localhost',
      port: 80,
      path: '/garagev2/api/chat/update-status?status=online&token=' + token,
      method: 'POST'
    };

    http.request(options, function(res) {
      res.setEncoding('utf8');
      res.on('data', function (chunk) {
        console.log('BODY: ' + chunk);
      });
    }).end();
  });

  socket.on('disconnect', function () {
    var options = {
      host: 'localhost',
      port: 80,
      path: '/garagev2/api/chat/update-status?status=offline&token=' + token,
      method: 'POST'
    };

    http.request(options, function(res) {
      res.setEncoding('utf8');
      res.on('data', function (chunk) {
        console.log('BODY: ' + chunk);
      });
    }).end();
    redisClient.quit();
  });

});