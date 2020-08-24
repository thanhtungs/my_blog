/**
 * Created by Van Nguyen on 4/14/2017.
 */
var Garage;
Garage = {
    stopSaveDraft: false,
    intervalSaveDraft: null,
    runSaveDraft: function (obj) {
        var that = this;
        this.intervalSaveDraft = setInterval(function () {
            console.log("START AUTOSAVE");
            that.saveDraft(obj)
        }, 5000);
    },

    saveDraft: function (obj) {
        if (this.stopSaveDraft) {
            console.log("STOP AUTOSAVE");
            clearInterval(this.intervalSaveDraft);
        }
        var data = [];
        var today = new Date();
        var formId = 'form_' + today.getTime();
        data = $(obj).serializeArray();
        if ($(obj).prop('id')) {
            formId = $(obj).prop('id');
        }

        if (data.length > 0) {
            for (var idx in data) {
                if(idx == '_token') {
                    continue;
                }
                // console.log(idx + ':' + data[idx]['name'] + ' => ' + data[idx]['value']);
                $.cookie(formId + '_' + idx, JSON.stringify({'name': data[idx]['name'], 'value' : data[idx]['value']}));
            }
        }
    },
    loadSavedDraft: function (obj) {
        console.log('LOAD DATA FROM AUTOSAVE');
        var data = [];
        var formId = null;
        data = $(obj).serializeArray();
        if ($(obj).prop('id')) {
            formId = $(obj).prop('id');
        }

        for (var idx in data) {
            item = $.cookie(formId + '_' + idx);
            itemObj = JSON.parse(item);
            // $(obj).get(0)[itemObj.name] = itemObj.value;
            $("[name='"+itemObj.name+"']").val(itemObj.value);
            $("[name='"+itemObj.name+"']").trigger('change');
            console.log(idx + ': ' + item);
        }
    }
};

$.fn.garage = function(options) {
    var opts = $.extend( {}, $.fn.garage.defaults, options );
    if (opts.stopSaveDraft == true) {
        Garage.stopSaveDraft = true;
    }
    switch (opts.run) {
        case 'save':
            Garage.runSaveDraft(this);
            break;
        case 'load':
            Garage.loadSavedDraft(this);
    }
}

$.fn.garage.defaults = {
    stopSaveDraft: false
};

// })(jQuery);
