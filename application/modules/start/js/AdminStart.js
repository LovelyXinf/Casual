'use strict';
function AdminStart (optionArr) {
    this.properties = {
        siteUrl: '',
        pageGid: '',
        class: {
            marketplaceButton: '.marketplace-button',
            rightCol: '.right_col'
        },
        data: {
            captchaType: '[data-captcha="type"]',
            captchaBlock: '[data-captcha="block"]'
        }
    };
    
    var _self = this;

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
        _self.initControls();
        _self.scrollPage();
    };
    
    this.initControls = function () {
         $(document)
                .off('click', _self.properties.data.captchaType).on('click', _self.properties.data.captchaType, function () {
            _self.changeCaptchaSettings(this);
        });
    };
    
    this.changeCaptchaSettings = function (obj) {
        var captcha = $(obj).data('captcha_type');
        $(_self.properties.data.captchaBlock).addClass('hide');
        $('[data-captcha_block="' + captcha + '"]').removeClass('hide');
    };
    
    this.scrollPage = function () {     
        var size = $(document).height() - 28;
        var height = $(window).height();
        $(window).scroll(function () {
                if($(this).scrollTop()+height >= size){
                    $(_self.properties.class.rightCol).css('padding-bottom', '60px');
                    $(_self.properties.class.marketplaceButton).css('bottom', '30px');
                } else {
                    $(_self.properties.class.marketplaceButton).css('bottom', '0px');
                }
        });
    };
    
    _self.Init(optionArr);
    
};