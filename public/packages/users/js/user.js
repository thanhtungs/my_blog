jQuery.validator.addMethod("phone_number", function (phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);
}, "Số điện thoại không hợp lệ");

jQuery.validator.addMethod("exactlength", function (value, element, param) {
    return this.optional(element) || value.length == param;
}, $.validator.format("Số điện thoại phải có 10 ký tự"));

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
        //add more
        $('#hideImg').hide();
        $('#hideLabel').hide();
        $('#blah').show();
        $("#resetImg").show();
    }
}

$(document).ready(function () {
    $("#resetImg").hide();

    $("#resetImg").click(function () {
        $('#hideImg').show();
        $('#hideLabel').show();
        $('#blah').hide();
        $("#resetImg").hide();
        $('#removeValueFile').val("");
    });

    let uris = $(location).attr('href').split('/');
    const baseUrl = uris[0] + '//' + uris[2] + '/' + uris[3];
    let userId = $('#user').val();

    $("#form").validate({
        rules: {
            name: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                }
            },
            phone: {
                required: true,
                phone_number: true,
                exactlength: 10,
                remote: {
                    url: baseUrl + '/check-unique',
                    type: "post",
                    data: {
                        phone: function () {
                            return $("#phone").val();
                        },
                        id: userId,
                    },
                }
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: baseUrl + '/check-unique',
                    type: "post",
                    data: {
                        email: function () {
                            return $("#email").val();
                        },
                        id: userId,
                    },
                }
            },
            password: {
                required: true,
                minlength: 6
            }
            ,
            confirm_password: {
                required: true,
                equalTo:
                    "#password"
            }
            ,
            image:
                {
                    accept: "image/*"
                }
        },
        messages: {
            name: "Xin hãy nhập tên",
            phone:
                {
                    required: "Xin hãy nhập số điện thoại",
                    remote:
                        "Số điện thoại đã tồn tại trong hệ thống",
                }
            ,
            email: {
                required: "Xin hãy nhập email",
                email:
                    "Email đã nhập không đúng định dạng",
                remote:
                    "Email đã tồn tại trong hệ thống",
            }
            ,
            password: {
                required: "Chưa nhập mật khẩu",
                minlength:
                    "Mật khẩu không được nhỏ hơn 6 ký tự"
            }
            ,
            confirm_password: {
                required: "Chưa nhập xác nhận mật khẩu",
                equalTo:
                    "Mật khẩu nhập lại không chính xác"
            }
            ,
            image: "Ảnh không đúng định dạng"
        }
        ,
    })
    ;
});