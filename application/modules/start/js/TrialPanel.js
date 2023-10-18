'use strict';
function TrialPanel(optionArr) {

    this.properties = {
        siteUrl: '',
        sude: 'user',
        delay: {
            'user': 60000,
            'admin': 30000
        },
        cookiePath: '/',
        cookieDomain: '',
        analyticEvents: {
            buyNow: '[data-event="dp_top_panel_buy_now"]',
            desctopBtn: '[data-event="dp_top_panel_computer"]',
            tabletBtn: '[data-event="dp_top_panel_tablet"]',
            mobileBtn: '[data-event="dp_top_panel_mobile"]',
            switchUser: '[data-event="dp_top_panel_switch_user"]',
            switchAdmin: '[data-event="dp_top_panel_switch_admin"]',
            toggleMenu: '[data-event="dp_top_panel_more_button"]',
            //toggle Menu
            datingSoftware: '[data-event="dp_top_panel_pc"]',
            mobileAppsAll: '[data-event="dp_top_panel_mobile_web"]',
            mobileAppsAndroid: '[data-event="dp_top_panel_mobile_android"]',
            mobileAppsApple: '[data-event="dp_top_panel_mobile_apple"]',
            websiteTemplates: '[data-event="dp_top_panel_templates"]',
            customDevelopment: '[data-event="dp_top_panel_development"]'
        },
        id: {
            topNav: '#top_nav',
            demoPanel: '#demo-panel'
        },
        class: {
            demoPromoBlock: '.demo-promo-block-js',
            demoCloseLink: '.demo-close-link-js' 
        },
        url: {
            sendAnalytics: 'start/sendAnalytics'
        }
    };

    var _self = this;

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
        _self.initControls();
        _self.demoPromoPanel();
        _self.loadIntercomForm();
    };

    this.initControls = function () {
        $(document)
                .off('click', _self.properties.analyticEvents.buyNow).on('click', _self.properties.analyticEvents.buyNow, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.desctopBtn).on('click', _self.properties.analyticEvents.desctopBtn, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.tabletBtn).on('click', _self.properties.analyticEvents.tabletBtn, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.mobileBtn).on('click', _self.properties.analyticEvents.mobileBtn, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.toggleMenu).on('click', _self.properties.analyticEvents.toggleMenu, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.datingSoftware).on('click', _self.properties.analyticEvents.datingSoftware, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.mobileAppsAll).on('click', _self.properties.analyticEvents.mobileAppsAll, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.mobileAppsAndroid).on('click', _self.properties.analyticEvents.mobileAppsAndroid, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.mobileAppsApple).on('click', _self.properties.analyticEvents.mobileAppsApple, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.websiteTemplates).on('click', _self.properties.analyticEvents.websiteTemplates, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.analyticEvents.customDevelopment).on('click', _self.properties.analyticEvents.customDevelopment, function () {
            _self.sendAnalytics($(this).data('event'));
        }).off('click', _self.properties.id.topNav).on('click', _self.properties.id.topNav, function () {
            _self.resizeTrialPanel();
        }).off('click', _self.properties.class.demoCloseLink).on('click', _self.properties.class.demoCloseLink, function () {
            _self.closeDemoPromoPanel();
        });
    };

    this.sendAnalytics = function (event) {
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.url.sendAnalytics,
            type: 'POST',
            cache: false,
            data: {event: event}
        });
        return false;
    };

    this.loadIntercomForm = function () {
        $('#dashboard-visibility-btn').css('top', '123px');
        if (window.Intercom !== undefined) {
            Intercom('onHide', function() {
                if ($(window).width() <= 470) {
                    document.location.reload(true);
                }
            });
            if (_self.getCookie('show_trial_intercom_form_' + _self.properties.side) === undefined) {
                setTimeout(function () {
                    Intercom('show');
                    _self.setCookie('show_trial_intercom_form_' + _self.properties.side, 1, {
                        expires: 3600, 
                        path: _self.properties.cookiePath, 
                        domain: _self.properties.cookieDomain
                    });
                }, _self.properties.delay[_self.properties.side]);
            }
        }
    };

    this.setCookie = function (name, value, options) {
        options = options || {};

        var expires = options.expires;

        if (typeof expires === "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 60 * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    };

    this.getCookie = function (name) {
        var matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    };

    this.resizeTrialPanel = function () {
        $(_self.properties.id.demoPanel).width(function(){});
    };
    
    this.demoPromoPanel = function () {
        if (_self.getCookie('hide_demo_promo_panel') === undefined) {
            $(_self.properties.class.demoPromoBlock).fadeIn();
        }
    };
    
    this.closeDemoPromoPanel = function () {
        $(_self.properties.class.demoPromoBlock).fadeOut();
        _self.setCookie('hide_demo_promo_panel', 1, {
            expires: 3600, 
            path: _self.properties.cookiePath, 
            domain: _self.properties.cookieDomain
        });
    };

    _self.Init(optionArr);

}

