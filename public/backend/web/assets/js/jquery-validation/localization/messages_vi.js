(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else if (typeof module === "object" && module.exports) {
		module.exports = factory( require( "jquery" ) );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: VI (Vietnamese; Tiếng Việt)
 */
$.extend( $.validator.messages, {
	required: "Xin hãy nhập",
	remote: "Xin hãy sửa cho đúng",
	email: "Xin hãy nhập email",
	url: "Xin hãy nhập URL",
	date: "Xin hãy nhập ngày",
	dateISO: "Xin hãy nhập ngày (ISO)",
	number: "Xin hãy nhập số",
	digits: "Xin hãy nhập chữ số",
	creditcard: "Xin hãy nhập số thẻ tín dụng",
	equalTo: "Xin hãy nhập thêm lần nữa",
	extension: "Phần mở rộng không đúng",
	maxlength: $.validator.format( "Xin hãy nhập từ {0} kí tự trở xuống" ),
	minlength: $.validator.format( "Xin hãy nhập từ {0} kí tự trở lên" ),
	rangelength: $.validator.format( "Xin hãy nhập từ {0} đến {1} kí tự" ),
	range: $.validator.format( "Xin hãy nhập từ {0} đến {1}" ),
	max: $.validator.format( "Xin hãy nhập từ {0} trở xuống" ),
	min: $.validator.format( "Xin hãy nhập từ {1} trở lên" )
} );
return $;
}));