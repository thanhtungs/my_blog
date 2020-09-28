function validateEmail(email) {
    if(email){
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    return true;
}
//Validate Is number
function numhasInput(num) {
    return num && $.isNumeric(num)
}

jQuery('.numbersOnly').keyup(function () {
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

function numHasValue(num) {
    return num && $.isNumeric(num) && num > 0
}

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    window.setTimeout(function() {
         $(".ialert").fadeTo(1500, 0).slideUp(500, function(){
            $(this).remove();
         });
    }, 5000);

    $('.date-picker-wgi').parent().addClass('icon-date-click icon-date-click1');
    $('.date-max-now').parent().addClass('icon-date-click icon-date-click2');
    $('.date-picker-wgi').parents('.widget-body').addClass('min-height');
    var count_click = 0;
    $('.date-picker-wgi').click(function() {
        count_click += 1;
        if (count_click > 1){
            $(this).parent().toggleClass('hidden-pop');
        }
    });
    var count_click1 = 0;
    $('.date-max-now').click(function() {
        count_click1 += 1;
        if (count_click1 > 1){
            $(this).parent().toggleClass('hidden-pop');
        }
    });
    $('body').click(function(event) {
        if (!$(event.target).closest('.date-picker-wgi').length) {
            $('.icon-date-click1').addClass('hidden-pop');
        };
    });
    $('body').click(function(event) {
        if (!$(event.target).closest('.date-max-now').length) {
            $('.icon-date-click2').addClass('hidden-pop');
        };
    });

    $("input[type='number']").parent().addClass("input-number");
    jQuery.validator.addMethod("selectnic", function (value, element) {
        return this.optional(element) || /[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$/.test(value)
    }, 'Bạn chỉ được nhập chữ.');
    jQuery.validator.addClassRules("only-text", {
        selectnic: true,
        required: true
    });
    $(".frm_support_preview").find("[pre-show='true']").each(function (e) {
        $(this).attr('pre-val', $(this).val());
        var change_to = pre(this, "change-to");

        $(this).change(function () {
            $(this).attr('pre-val', $(this).val());
            if (change_to != '') {
                $(change_to).attr('pre-val', $(this).val());
                $(change_to).val($(this).val());
            }
        });

    });
    if ($('.date-picker-wgi').length) {
        $('.date-picker-wgi').datetimepicker({
            "useCurrent": true,
            "locale": "vi",
            "format": "DD/MM/YYYY",
            "allowInputToggle": true
        })
    }
    if ($('.date-max-now').length) {
        $('.date-max-now').datetimepicker({
            "useCurrent": true,
            "locale": "vi",
            "format": "DD/MM/YYYY",
            "allowInputToggle": true,
            "maxDate": moment(),
        });
    }

    if($('.hide-alert-custom').length) {
        setTimeout(function () {
            $('.alert').hide(200);
        },2500)
    }

    var redactor = $('#redactor');
    if (redactor.length) {
        redactor.redactor({
            'min-height': 400
        });
    }

    $("body").find("[isoft-sort]").each(function (e) {

        $(this).hover(function () {
            $(this).css("cursor", "pointer");
        });

        $(this).css("color", "#427fed");

        var sort = $("#search_sort").val();
        if (sort == "desc") {
            $(this).append(' <i style="float: right;" class="fa fa-sort-desc"></i>');
        } else {
            $(this).append(' <i style="float: right;" class="fa fa-sort-asc"></i>');
        }


        $(this).click(function () {
            var sort_by = $(this).data("sort-by");
            var sort = $("#search_sort").val();


            var sv = sort == "desc" ? "asc" : "desc";
            $(this).data("sort", sv);
            $(this).attr("data-sort", sv);

            $("#search_sort").val(sv);
            $("#search_sort_by").val(sort_by);
            $(".search_form").submit();
        });
    });
    //alert session
    $('div.alert:not(.alert-title)').delay(3000).fadeOut('2000', function () {
        $(this).fadeOut()
    });

    for (i = 0; i < 20; i++) {
        if ($('.open-m' + i + '').length) {
            $('#sidebar .nav li:nth-child(' + i + ')').addClass('open');
        }
        for (y = 0; y < 16; y++) {
            if ($('.active-m-' + i + '-' + y).length) {
                $('#sidebar .nav li:nth-child(' + i + ') li:nth-child(' + y + ')').addClass('active');
            }
        }
        for (z = 0; z < 16; z++) {
            if ($('.open-m-' + i + '-' + z).length) {
                $('#sidebar .nav li:nth-child(' + i + ') li:nth-child(' + z + ')').addClass('open');
            }
            for (x = 0; x < 15; x++) {
                if ($('.active-m-' + i + '-' + z + '-' + x).length) {
                    $('#sidebar .nav li:nth-child(' + i + ') li:nth-child(' + z + ') li:nth-child(' + x + ')').addClass('active');
                }
            }
        }
    }
});

let url = window.location.pathname,
    urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");

if (urlRegExp != '/$/') {
    $('.submenu2 li a').each(function () {
        if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
            $(this).parent().addClass('active');
            $(this).parent().parent().parent().addClass('open');
            $(this).parent().parent().parent().parent().parent().addClass('open');
        }
    });
    $('.submenu>li>a').each(function () {
        if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
            $(this).parent().addClass('active');
            $(this).parent().parent().parent().addClass('open');
        }
    });
}

$('.format_price').each(function () {
    var number_price_val = $(this).html();
    var number_price = parseInt(number_price_val);

    function format_price(n) {
        return n.toFixed(0).replace(/./g, function (c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        });
    }

    if (number_price_val == '') {
        $(this).html('');
    } else {
        $(this).html(format_price(number_price));
    }
});

var pre = function (c, name) {
    return $(c).attr("pre-" + name);
};

var preview = function () {
    var element = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $(".frm_support_preview").find("[pre-show='true']").each(function (index) {
        var input_val = pre(this, "val");
        var input_name = pre(this, "label");

        element += '<input type="hidden" name="item[' + index + '][name]" value="' + input_name + '"/>\n';
        element += '<input type="hidden" name="item[' + index + '][val]" value="' + input_val + '"/>\n';
    });
    $("#fm_preview_accounting").html(element);
    $("#fm_preview_accounting").submit();

};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// xoa hang loat

$("#check_all").change(function () {
    if (this.checked) {
        $('input[type=checkbox]').prop('checked', true);
    } else {
        $('input[type=checkbox]').prop('checked', false);
    }
});

$(".deleted-checkbox").change(function () {
    if (!this.checked) {
        $('#check_all').prop('checked', false);
    }
});

$('.btn-delete-all').on('click', function () {
    var deleted = [];
    $('.deleted-checkbox').each(function (i, element) {
        if (this.checked) {
            deleted.push($(this).attr('data-id'));
        }
    });

    if (deleted.length > 0) {
        bootbox.confirm('Bạn có chắc chắn muốn xóa?', function (result) {
            if (result) {
                $.ajax({
                    url: window.location.pathname + '/delete',
                    method: "POST",
                    data: {
                        ids: deleted
                    },
                    success: function () {
                        bootbox.alert('Xóa thành công', function () {
                            location.reload();
                        });
                    }
                });
            }
        })
    } else {
        bootbox.alert('Bạn chưa chọn nội dung cần xoá');
    }
    return false;

});

// $(".validate-form").validate();

if ($('.error-select2 select').length) {
    $('.error-select2 select').on('change', function () {
        $(this).valid();
    });
}

function formatRepo(repo) {
    return repo.text;
}

function formatRepoSelection(repo) {
    return repo.text;
}

function sum2Item(item1, item2) {
    var x = parseInt(item1, 10);
    var y = parseInt(item2, 10);
    return x+y;

}