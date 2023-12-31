/* global site_root, site_rtl_settings */
(function (optionArr) {
    this.properties = {
        siteUrl: null,
        data: {
            action: {
                loadRegForm: '[data-action="show-registration-block"]'
            }
        },
        url: {
            loadRegForm: 'users/load_reg_form'
        },
        loadCssFiles: {
            font: 'application/views/flatty/css/font-awesome.min.css',
            font5: 'application/views/flatty/css/fontawesome-5.0.11/css/fontawesome-all.min.css',
            bootstrap: 'application/views/flatty/css/bootstrap-ltr.css',
            jquery: 'application/js/jquery-ui/jquery-ui.custom.css',
            flatty: 'application/views/flatty/sets/default/css/style-ltr.css'
        },
        loadJsFiles: {
            jq: 'application/js/jquery.js',
            bootstrap: 'application/js/bootstrap/bootstrap.min.js',
            loading: 'application/js/nprogress/nprogress.min.js',
            functions: 'application/js/functions.js',
            errors: 'application/js/errors.js',
            twig: 'application/js/twig.js/twig.js',
            loading_content: 'application/views/flatty/js/loading_content.js'
        },
        isLoad: false
    };

    const _self = this;
    const _p = {};
    const request = new XMLHttpRequest();

    this.Init = function () {
        _p.findInitBtn();
        _p.setSiteUrl();
        _p.render();
        _p.loadRegForm()
            .then(_p.renderRegForm);

    };

     _p.findInitBtn = function () {
        if ($('[href="#registration-btn"]').length == 1) {
            $('[href="#registration-btn"]').attr("data-action", "show-registration-block");
            $('[href="#registration-btn"]').attr("href", "javascript:void(0);");
        } else {
            console.log('no registration btn for initialize the widget')
        }
    }

    _p.setSiteUrl = function () {
        let scriptEls = document.getElementsByTagName( 'script' );
        let thisScriptEl = scriptEls[scriptEls.length - 1];
        _self.properties.siteUrl = thisScriptEl.src.split('application')[0];
    };

    _p.render = function () {
        for (let gid in _self.properties.loadCssFiles) {
            _p.loadCss(_self.properties.siteUrl + _self.properties.loadCssFiles[gid]);
        }
    };

    _p.loadRegForm = function () {
        return new Promise((resolve)=>{
            _p.query(
                _self.properties.url.loadRegForm,
                {},
                'json',
                function (data) {
                    if (_self.properties.isLoad === false) {
                        _self.properties.isLoad = true;
                        _p.form = data;
                        resolve();
                    }
                }
            );
        });
    };

    _p.renderRegForm = function () {
        let form = document.createElement('div');
        let promise = new Promise((resolve) => {
            form.innerHTML = _p.form.html;
            document.body.prepend(form);
            form.querySelector('.btn-regshow').remove();
            let scriptBlock = form.querySelector('#registration-widget-script').querySelector('script').innerHTML;
            eval(scriptBlock);
            resolve();
        });
        promise
            .then(_p.appendScripts)
            .then(() => {
                let arr = form.querySelector('#registration-widget').getElementsByTagName('script');
                for (var n = 0; n < arr.length; n++) {
                    if (typeof arr[n].attributes.src !== 'undefined') {
                        _p.setJsFile(arr[n].attributes.src.nodeValue, '#registration-widget-script');
                    } else {
                        eval(arr[n].innerHTML);
                    }
                }
            });
    };

    _p.appendScripts = function () {
        return _p.loadJs(_self.properties.siteUrl + _self.properties.loadJsFiles['loading'], '#registration-widget-script')
            .then(() => Promise.all([
                    _p.loadJs(_self.properties.siteUrl + _self.properties.loadJsFiles['jq'], '#registration-widget-script'),
                    _p.loadJs(_self.properties.siteUrl + _self.properties.loadJsFiles['bootstrap'], '#registration-widget-script'),
                    _p.loadJs(_self.properties.siteUrl + _self.properties.loadJsFiles['functions'], '#registration-widget-script'),
                    _p.loadJs(_self.properties.siteUrl + _self.properties.loadJsFiles['errors'], '#registration-widget-script'),
                    _p.loadJs(_self.properties.siteUrl + _self.properties.loadJsFiles['twig'], '#registration-widget-script'),
                    _p.loadJs(_self.properties.siteUrl + _self.properties.loadJsFiles['loading_content'], '#registration-widget-script')
                ])
            )
            .catch(error => new Error('Unable to load map files'))
    };

    _p.loadCss = function (file) {
        let styleCss = document.styleSheets;
        for(var i in styleCss) {
            if (styleCss[i].href === file) {
                return;
            }
        }
        let link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = file;
        document.querySelector('head').appendChild(link);
    };

    _p.loadJs = function (file, el) {
        return new Promise((resolve) => {
            if (_p.isJSOnPage(file) !== false) {
                _p.setJsFile(file, el, resolve);
            }
        });
    };

    _p.setJsFile = function (file, el, resolve) {
        let script = document.createElement('script');
        script.src = file;
        if (typeof resolve !== 'undefined') {
            script.onload = function () {
                resolve(file);
            }
        }
        document.querySelector(el).appendChild(script);
    }

    _p.isJSOnPage = function (file) {
        let jsFile = document.getElementsByTagName('script');
        for (var i in jsFile) {
            if (jsFile[i].src === file) {
                return false;
            }
        }
        return true;
    }

    _p.query = function (url, data, dataType, cb) {
        if (!/^(f|ht)tps?:\/\//i.test(url)) {
            url = _self.properties.siteUrl + url;
        }
        request.responseType =	dataType;
        request.open("POST", url, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.addEventListener("readystatechange", () => {
            if (request.readyState === 4 && request.status === 200) {
                let obj = request.response;
                if (typeof (cb) !== 'undefined') {
                    cb(obj);
                }
            }
        });
        request.send(data);
        return false;
    };

    _self.Init(optionArr);

    return this;

})();