

$.fn.TableSearch = function(options) {
    var opts = $.extend( {}, $.fn.TableSearch.defaults, options );

    var prefix_id = "#sm-";
    var model_id = prefix_id+opts.theme.id;
    var partent = $("#partent_search_x").html();
    var view = opts.theme;

    var search = Mustache.render(partent, view);
    $('body').append(search);

    var search_account = function (keyword) {
        $(model_id+" .search-loading").show();
        $.getJSON(opts.url+"?kw=" + keyword, function (data) {
            $(model_id+" .search-r").html("");
            var output = opts.data_return(data);
            $(model_id+" .search-r").append(output);

            $(model_id+" .search-r-item").click(function () {
                var data = $(this).data("store");
                opts.select_return(data);
                $(model_id).modal("hide");
            });

            $(model_id+" .search-loading").hide();
        });
    }

    var tim_kiem = function(){
        var kw = "";
        if(opts.pre_search != '') {
            kw = $(opts.pre_search).val();
        }

        $(model_id+" .search-kw").val(kw);
        search_account(kw);
        $(model_id).modal("show");
    }

    $(this).click(function () {
        tim_kiem();
    });

    $(model_id+' .search-kw').on("keypress", function (e) {
        if (e.keyCode == 13) {
            var keyword = $.trim($(this).val());
            search_account(keyword);
        }
    });

    $(model_id+' .search-button').on("click", function (e) {
        var keyword = $.trim($(this).val());
        search_account(keyword);
    });

}

$.fn.CustomTableSearch = function(options) {
    var opts = $.extend( {}, $.fn.TableSearch.defaults, options );

    var prefix_id = "#sm-";
    var model_id = prefix_id+opts.theme.id;
    var partent = $("#partent_search_x").html();
    var view = opts.theme;

    var search = Mustache.render(partent, view);
    $('body').append(search);

    var search_account = function (keyword) {
        var optional_search = $(opts.optional_search).val();
        $(model_id+" .search-loading").show();
        var url = opts.url+"?kw=" + keyword + "&okw="+optional_search;
        $.getJSON(url, function (data) {
            $(model_id+" .search-r").html("");
            var output = opts.data_return(data);
            $(model_id+" .search-r").append(output);

            $(model_id+" .search-r-item").click(function () {
                var data = $(this).data("store");
                opts.select_return(data);
                $(model_id).modal("hide");
            });

            $(model_id+" .search-loading").hide();
        });
    }

    var tim_kiem = function(){
        var kw = "";
        if(opts.pre_search != '') {
            kw = $(opts.pre_search).val();
        }

        $(model_id+" .search-kw").val(kw);
        search_account(kw);
        $(model_id).modal("show");
    }

    $(this).click(function () {
        tim_kiem();
    });

    $(model_id+' .search-kw').on("keypress", function (e) {
        if (e.keyCode == 13) {
            var keyword = $.trim($(this).val());
            search_account(keyword);
        }
    });

    $(model_id+' .search-button').on("click", function (e) {
        var keyword = $.trim($(this).val());
        search_account(keyword);
    });

}

$.fn.TableSearch.defaults = {
    pre_search: '',
    url: '',
    theme:{
        "id" :"",
        "title" :"",
        "cols": [
            { "name": "Mã" },
            { "name": "Tên" },
        ],
    },

};
