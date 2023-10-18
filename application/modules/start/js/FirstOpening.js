'use strict';
function FirstOpening(optionArr) {
    this.properties = {
        siteUrl: '/',
        id: {
            brand: '#brand'
        },
        themes: {},
        theme_id: null,
        steps: {
            design: ['apply-theme','edit-colorscheme'], 
            brand:  ['edit-brand-name'], 
            money:  ['edit-mmbship','edit-services','how-to-earn-money']
        },
        success_actions: {
            design: ['success-colorscheme'], 
            brand:  ['success-brand-name'], 
            money:  ['success-service','success-create-mmbship','success-permission','success-price-period']
        }, 
        data:{
            action: {
                selDesign: '[data-action="sel-design"]',
                setDesign: '[data-action="set-design"]',
                editColourSet: '[data-action="edit-colourset"]',
                setBrand: '[data-action="set-brand"]',
                editDesign: '[data-action="edit-design"]',
                editMemberships: '[data-action="edit-memberships"]',
                editServices: '[data-action="edit-services"]',
                skipSettings: '[data-action="skip_settings"]'
            }
        },
        url: {
            firstOpening: 'start/first_opening/',
            preview: 'start/index/preview'
        },
        errorObj: new Errors()
    };

    var _self = this;
    var setId = null;
    var themeId = null;
    var colorset = null;

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
        _self.initControls();
        _self.initEvents();
    };

    this.initEvents = function () {
        const timeout = setTimeout(() => clearInterval(interval), 10000);
        const interval = setInterval(() => {
            if (typeof analyticsEvents !== 'undefined') {
                clearInterval(interval);
                clearTimeout(timeout);
                $.each(_self.properties.steps, function(index_st, value_steps) {
                    if(index_st == 'design') {
                        $.each(_self.properties.themes, function(index_th, value) {
                            $.each(value_steps, function(action_key, action_value) {
                                var analytics_action = {"onboarding" : {}};
                                analytics_action['onboarding'][index_st + '-' + value.set_gid + '-' + action_value] = action_value;
                                $.extend(true, analyticsEvents, analytics_action);
                            })
                        });
                    } else {
                        $.each(value_steps, function(action_key, action_value) {
                            var analytics_action = {"onboarding" : {}};
                            analytics_action['onboarding'][index_st + '-' + action_value] = action_value;
                            $.extend(true, analyticsEvents, analytics_action);
                        });
                    }
                });
                $.each(_self.properties.success_actions, function(index_st, value_steps) {
                    $.each(value_steps, function(action_key, action_value) {
                        var analytics_action = {"onboarding" : {}};
                        analytics_action['onboarding'][index_st + '-' + action_value] = action_value;
                        $.extend(true, analyticsEvents, analytics_action);
                    });
                });
            }
        }, 100);
    }

    this.initControls = function () {
        $(document)
           .off('click', _self.properties.data.action.selDesign).on('click', _self.properties.data.action.selDesign, function () {
            _self.selDesign(this);
        }).off('click', _self.properties.data.action.setDesign).on('click', _self.properties.data.action.setDesign, function () {
            _self.setDesign(this);
        }).off('click', _self.properties.data.action.editColourSet).on('click', _self.properties.data.action.editColourSet, function () {
            _self.editColourSet(this);
        }).off('click', _self.properties.data.action.setBrand).on('click', _self.properties.data.action.setBrand, function () {
            _self.setBrand(this);
        }).off('click', _self.properties.data.action.editServices).on('click', _self.properties.data.action.editServices, function () {
            _self.editServices(this);
        }).off('click', _self.properties.data.action.editMemberships).on('click', _self.properties.data.action.editMemberships, function () {
            _self.editMemberships(this);
        }).off('click', _self.properties.data.action.skipSettings).on('click', _self.properties.data.action.skipSettings, function () {
            _self.skipSettings(this);
        });
        $('.theme-image-block img:first').trigger('click');
    };

    this.editServices = function () {
        sendAnalytics('edit-services', 'onboarding', 'money'); 
    };

    this.editMemberships = function () {
        sendAnalytics('edit-mmbship', 'onboarding', 'money'); 
    };

    this.skipSettings = function () {
        _self.query(
            _self.properties.url.firstOpening,
            {data: {
                    step: 'skip_settings'                 
                }
            },
            'json',
            function () {
                locationHref(_self.properties.siteUrl + _self.properties.url.preview, false, true);
            }
        );
    };

    this.editColourSet = function (obj) {
        sendAnalytics('edit-colorscheme', 'onboarding', 'design-' + colorset); 
        _self.query(
            _self.properties.url.firstOpening,
            {data: {
                    step: 'edit_colourset', 
                    set_id: setId,
                    theme_id: themeId                   
                }
            },
            'json',
            function (data) {
                if (data.error.length === 0 && data.data) {
                     locationHref(data.data, false, true);
                }
            }
        );
    };
    
    this.selDesign = function (obj) {
        setId = $(obj).data('set_id');
        themeId = $(obj).data('theme_id');
        colorset = $(obj).data('colorset');
        $(_self.properties.data.action.selDesign).removeClass('select');
        $(obj).addClass('select');
    };
    
    this.setDesign = function () {
        sendAnalytics('apply-theme', 'onboarding', 'design-' + colorset); 
        _self.query(
            _self.properties.url.firstOpening,
            {data: {
                    step: 'design', 
                    set_id: setId                    
                }
            },
            'json',
            function (data) {
                if (data.error.length === 0) {
                    locationHref(_self.properties.siteUrl + _self.properties.url.preview, false, true);
                }
            }
        );
    };
    
    this.setBrand = function () {
        sendAnalytics('edit-brand-name', 'onboarding', 'brand'); 
        _self.query(
            _self.properties.url.firstOpening,
            {data: {
                    step: 'brand', 
                    brand: $(_self.properties.id.brand).val()  
                }
            },
            'json',
            function (data) {
                if (data.error.length === 0) {
                   sendAnalytics('success-brand-name', 'onboarding', 'brand');  
                   locationHref(_self.properties.siteUrl + _self.properties.url.preview, false, true);
                }
            }
        );
    };

    this.query = function (url, data, dataType, cb) {
        if (!/^(f|ht)tps?:\/\//i.test(url)) {
            url = _self.properties.siteUrl + url;
        }
        $.ajax({
            url: url,
            type: 'POST',
            cache: false,
            data: data,
            dataType: dataType,
            success: function (data) {
                if (typeof (data.error) !== 'undefined' && data.error.length > 0) {
                    _self.properties.errorObj.show_error_block(data.error, 'error');
                }
                if (typeof (data.info) !== 'undefined' && data.info.length > 0) {
                    _self.properties.errorObj.show_error_block(data.info, 'info');
                }
                if (typeof (data.success) !== 'undefined' && data.success.length > 0) {
                    _self.properties.errorObj.show_error_block(data.success, 'success');
                }
                if (typeof (cb) !== 'undefined') {
                    cb(data);
                }
            }
        });
        return false;
    };

    _self.Init(optionArr);
};
