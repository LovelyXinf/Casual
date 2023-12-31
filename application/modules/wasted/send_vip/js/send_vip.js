function ajaxDeclineVipTransaction(optionArr) {

    this.properties = {
        siteUrl: '',
        reloadTimeout: 600,
        idTransaction: 0,
        rand: 0,
        urlCheckTransaction: 'send_vip/ajaxDecline/',
        errorObj: new Errors
    };

    var _self = this;

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
    };

    this.declineVipTransaction = function (idTransaction, rand) {
        $.ajax({
            type: 'POST',
            url: _self.properties.siteUrl + _self.properties.urlCheckTransaction + idTransaction,
            data: {'id_transaction': idTransaction},
            success: function (data) {
                if (data) {
                    _self.properties.errorObj.show_error_block(data, 'success');
                    $('#status_' + rand).html('<font class="donate decline">' + data + '</font>');
                } else {
                    console.log('return error');
                }
            }
        });
    };

    _self.Init(optionArr);
};

function ajaxApproveVipTransaction(optionArr) {

    this.properties = {
        siteUrl: '',
        reloadTimeout: 600,
        idTransaction: 0,
        rand: 0,
        urlCheckTransaction: 'send_vip/ajaxApprove/',
        errorObj: new Errors
    };

    var _self = this;

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
    };

    this.approveVipTransaction = function (idTransaction, rand) {
        $.ajax({
            type: 'POST',
            url: _self.properties.siteUrl + _self.properties.urlCheckTransaction + idTransaction,
            data: {'id_transaction': idTransaction},
            success: function (data) {
                if (data) {
                    _self.properties.errorObj.show_error_block(data, 'success');
                    $('#status_' + rand).html('<font class="donate approve">' + data + '</font>');
                    sendAnalytics('send_membership_approved', 'communication', 'user');
                } else {
                    console.log('return error');
                }
            }
        });
    };

    _self.Init(optionArr);
}

function ajaxValidateVipTransaction(optionArr) {

    this.properties = {
        siteUrl: '',
        reloadTimeout: 600,
        idForm: 0,
        rand: 0,
        urlCheckTransaction: 'send_vip/ajaxValidateTransaction/',
        errorObj: new Errors
    };

    var _self = this;

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
        _self.validateTransaction();
    };

    this.validateTransaction = function () {
        $('#send_vip').bind('click', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: _self.properties.siteUrl + _self.properties.urlCheckTransaction,
                data: $('#send_form').serialize(),
                dataType: 'json',
                success: function (data) {
                    if (typeof (data.errors) !== 'undefined' && data.errors.length > 0) {
                        _self.properties.errorObj.show_error_block(data.errors, 'error');
                    } else {
                        $('#send_form').submit();
                    }
                }
            });
        });
    };

    _self.Init(optionArr);
};
