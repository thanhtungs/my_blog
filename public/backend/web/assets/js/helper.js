/**
 * Created by dungphanxuan on 31/03/2017.
 */

$(document).on("keyup",".mMoney",function(e) {
    if ($.inArray(e.keyCode, [46, 8,  27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }else{
        var num = $(this).val().replace(/(\s)/g, '');
        $(this).val(num.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 "));
    }
});

//Allow only numberic
$(document).on("keydown",".mMoney",function(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8,  27, 13, 110]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
    var keyCode = e.keyCode || e.which;

    if (keyCode == 9) {
        var currentVal = $(this).val();
        $(this).val(currentVal + getSuggestPrice(currentVal));
        $(this).bind('keyup', function(){
            //console.log('Hander Price KeyUp Event');
        });
    }
});
$(document).on("keydown",".mVat",function(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8,  27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
    var keyCode = e.keyCode || e.which;

    if (keyCode == 9) {
        var currentVal = $(this).val();
        $(this).val(currentVal + '0');
        $(this).bind('keyup', function(){
            //console.log('Hander Price KeyUp Event');
        });
        // call custom function here
    }
});

$(".mQty").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8,  27, 13, 110]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        console.log('aa');
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
    var keyCode = e.keyCode || e.which;

    if (keyCode == 9) {
        var currentVal = $(this).val();
        $(this).val(currentVal + getSuggestQty(currentVal));
        // call custom function here
    }
});

function formatShowPrice(price) {
    return 'a';
}

//Hàm chuyển về định dạng chuẩn trong code: 1 000 000 => 1000000
function setNumberStandar(str) {
    return str.split(' ').join('');
}
//Chuyển định dạng 1000000 => 1 000 000
function getNumberStandar(str) {
    return number_format(str, 0, ' ', ' ');
}

//Hàm định dạng số thập phân
function number_format(number, decimals, dec_point, thousands_sep) {
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        toFixedFix = function (n, prec) {
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            var k = Math.pow(10, prec);
            return Math.round(n * k) / k;
        },
        s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

//Validate Input Số lượng
$(document).on("keyup",".iAmount",function(e) {
    var valid = /^\d{0,6}(\.\d{0,2})?$/.test(this.value),
        val = this.value;

    if(!valid){
        //console.log("Invalid input!");
        this.value = val.substring(0, val.length - 1);
    }
});