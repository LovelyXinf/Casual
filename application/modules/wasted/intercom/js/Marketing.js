'use strict';
function Marketing(optionArr) {
    
    this.properties = {
        siteUrl: '/',
        load: 'intercom',
        id: {
            intercomFrame: '#intercom_frame',
            analyticsBlock: '#analytics-block'
        }
    };
    
    var _self = this;
    
    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
        _self.load();
    };

    this.load = function () {
        if (_self.properties.load === 'intercom') {
            _self.loadintercomFrame();
        } else {
            _self.loadanalyticsBlock();
        }
        return this;
    };
    
    this.loadintercomFrame = function () {
        $(_self.properties.id.intercomFrame).on('load', function(){
            var iframe = document.getElementById('intercom_frame');
            var iframeDoc = iframe.contentWindow.document;           
            $(iframeDoc).find('[data-analytics-cat=intercom]').on('click', function () {
                var gid = $(this).attr('data-analytics-gid');
                var cat = $(this).attr('data-analytics-cat');
                sendAnalytics('dp_admin_intercom_' + gid, cat, gid);                
            });
        });
    };
    
    this.loadanalyticsBlock = function () {};
    
    _self.Init(optionArr);

}