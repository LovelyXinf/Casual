/* global site_url, Function, error_object, Uint8Array */

function uploader(optionArr) {
    this.properties = {
        Accept: 'text/html',
        // Process settings
        siteUrl: '',
        uploadUrl: '',
        cbOnUpload: null,
        cbOnComplete: null,
        cbOnError: null,
        cbOnQueueComplete: null,
        cbOnQueueError: null,
        cbOnSend: null,
        cbOnProcessError: null,
        fieldName: '',
        // listing block
        zoneId: '',
        // Send type ( file or auto)
        sendType: 'auto',
        // file selector Input
        fileId: '',
        // additional filename input block Id (useful for audio_uploads)
        filenameFieldId: '',
        filebarId: 'filebar' + (Math.floor(Math.random() * (99999 - 11111)) + 11111),
        filebarHeight: null,
        fileListInZone: true,
        displayFileRow: false,
        displayAfterProcess: false,
        // if sendType == 'file'
        sendId: '',
        // add data into request
        formId: '',
        // block for messages
        messageId: '',
        warningId: '',
        // settings
        maxFileSize: 1000000,
        multiFile: true,
        mimeType: {},
        allowUnknownMimeTypes: true,
        //thumb settings
        createThumb: false,
        thumbWidth: 50,
        thumbHeight: 50,
        thumbCrop: false,
        thumbJpeg: false,
        thumbBg: 'transparent',
        allowEmptyFile: false,
        isFileEmpty: false,
        jqueryFormPluginUrl: (window.site_url ? site_url + 'application/js/jquery.form.min.js' : '/application/js/jquery.form.min.js'),
        lang: {errors: {file_missing: ''}},
        errorObj: new Errors(),
        langs: '',
        isChat: false
    };

    this.objects = {};
    this.files = [];
    this.que = [];

    var _self = this;

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);

        _self.objects.fileInput = $('#' + _self.properties.fileId);
        _self.objects.dropZone = $('#' + _self.properties.zoneId);
        if (_self.properties.formId) {
            _self.objects.form = $('#' + _self.properties.formId);
        }
        if (!_self.properties.fieldName) {
            _self.properties.fieldName = $('#' + _self.properties.fileId).attr('name');
        }

        _self.setFilebar();
        _self.objects.fileBox = $('#' + _self.properties.filebarId);
        if (_self.properties.filebarHeight) {
            _self.objects.fileBox.css('max-height', _self.properties.filebarHeight + 'px');
            
        }

        if (_self.properties.messageId) {
            _self.objects.messageBox = new uploadErrorObject({blockId: _self.properties.messageId});
        }
        if (_self.properties.warningId) {
            _self.objects.warningBox = new uploadErrorObject({blockId: _self.properties.warningId});
        }

        if (!_self.checkFileApi()) {
            return _self.InitNoFileApi();
        }

        _self.objects.fileInput.unbind('change').bind('change', function (event) {
            if (_self.properties.filenameFieldId !== '') {
                var name_of_the_file = _self.objects.fileInput.val().split('\\').pop().split('.').shift();
                $('#' + _self.properties.filenameFieldId).val(name_of_the_file);
            }

            event.preventDefault();
            event.stopPropagation();

            if (_self.properties.zoneId === '' && $(this).parent().data('role') === 'filebutton') {
                $(this).parent().find('s').html($(this).val().replace(/^.*[\\\/]/, ''));
            }

            for (var i = 0; i < event.target.files.length; i++) {
                _self.process(event.target.files[i]);
            }
            if (_self.properties.sendType === 'auto') {
                _self.add_in_queue();
                _self.upload();
                return false;
            }
        });
        _self.objects.dropZone.unbind('dragenter').bind('dragenter', function () {
            _self.objects.dropZone.addClass('hover');
            return false;
        });

        _self.objects.dropZone.unbind('dragover').bind('dragover', function () {
            return false;
        });
        
        _self.objects.dropZone.off('click', '.media-description').on('click', '.media-description', function () {
            _self.mediaDescription($(this));
        }).off('focusout', '.media-description').on('focusout', '.media-description', function () {
            _self.mediaDescriptionOut($(this));
        });

        _self.objects.dropZone.unbind('dragleave').bind('dragleave', function (e) {
            var is_leave = false;
            if (e.relatedTarget) {
                var rel_target = $(e.relatedTarget);
                if (!_self.objects.dropZone.is(rel_target.parents()) && !_self.objects.dropZone.is(rel_target)) {
                    is_leave = true;
                }
            } else {
                var rect = this.getBoundingClientRect();
                var e_pos = (function (event) {
                    var x, y;
                    if (typeof event.clientX === 'undefined') {
                        // try touch screen
                        x = event.pageX + document.documentElement.scrollLeft;
                        y = event.pageY + document.documentElement.scrollTop;
                    } else {
                        x = event.clientX;
                        y = event.clientY;
                    }
                    return {x: x, y: y};
                })(e.originalEvent);
                if (e_pos.x > rect.left + rect.width - 1 || e_pos.x < rect.left || e_pos.y > rect.top + rect.height - 1 || e_pos.y < rect.top) {
                    is_leave = true;
                }
            }

            if (is_leave) {
                _self.objects.dropZone.removeClass('hover');
            }
            return false;
        });

        _self.objects.dropZone.unbind('drop').bind('drop', function (e) {
            e.originalEvent.preventDefault();
            e.originalEvent.stopPropagation();
            _self.objects.dropZone.removeClass('hover').addClass('drop');
            var files = e.originalEvent.dataTransfer.files;

            if (_self.properties.multiFile) {
                for (var i = 0; i < files.length; i++) {
                    _self.process(files[i]);
                }
            } else {
                _self.process(files[files.length - 1]);
            }

            if (_self.properties.sendType === 'auto') {
                _self.add_in_queue();
                _self.upload();
                return false;
            }

            _self.processComplete();
        });

        if (_self.properties.sendType === 'file') {
            $('#' + _self.properties.sendId).unbind('click').bind('click', function () {
                if (_self.properties.cbOnSend instanceof Function) {
                    _self.properties.cbOnSend(false);
                } else {
                    _self.send();
                }
                return false;
            });
        }
    };

    // temporary block to edit in future
    this.langs = {
        exceeded: {
            en: "Filesize exceeded",
            ru: "Превышен размер файла"
        },
        mime: {
            en: "Mime type is not allowed",
            ru: "Тип файла не разрешен"
        }
    };

    this.setFilebar = function () {
        if (_self.properties.fileListInZone) {
            _self.objects.dropZone.append('<ul class="filebar" id="' + _self.properties.filebarId + '"></ul>');
        } else {
            if (_self.properties.displayFileRow) {
                _self.objects.dropZone.append('<div class="filebar" id="' + _self.properties.filebarId + '"></div>');
            } else {
                _self.objects.dropZone.after('<ul class="filebar" id="' + _self.properties.filebarId + '"></ul>');
            }
        }
    };

    this.showUploadBlock = function () {
        $('#upload_properties').hide();
        $('#dnd_upload_info').show();
        _self.objects.dropZone.removeClass('set-uploader-form');
    };

    this.showPropertiesBlock = function () {
        $('#upload_properties').show();
        $('#dnd_upload_info').hide();
        _self.objects.dropZone.addClass('set-uploader-form');
    };

    this.processComplete = function () {
        if (_self.properties.displayAfterProcess) {
           _self.showPropertiesBlock();
        }
    };

    this.removeEvent = function () {
        if (_self.properties.displayAfterProcess) {
            var img_count = _self.objects.fileBox.find('.g-users-gallery__item').length;
            if (!img_count) {
                _self.showUploadBlock();
            }
        }
    };

    this.getMessageLang = function (message) {
        var languageId = $('menu[lang-code]').attr('lang-code') || $('option[lang-code][selected]').attr('lang-code');
        if(_self.properties.langs[message] == null || _self.properties.langs[message] == undefined){
            if (this.langs[message][languageId]) {
                return this.langs[message][languageId];
            } else {
                return this.langs[message]["en"];
            }            
        } else {
            return _self.properties.langs[message];
        }
    };

    this.addFile = function (file) {
        if (file.size > _self.properties.maxFileSize && _self.properties.maxFileSize > 0) {
            if (_self.properties.cbOnProcessError instanceof Function) {
                _self.properties.cbOnProcessError('max filesize exeeded');
            } else {
                this.addMessage(this.getMessageLang('exceeded'), 'error');
            }
            return false;
        }
        if (!_self.allowedMimeType(file.type)) {
            if (_self.properties.cbOnProcessError instanceof Function) {
                _self.properties.cbOnProcessError('mime type not allowed');
            } else {
                this.addMessage(this.getMessageLang('mime'), 'error');
            }
            return false;
        }
        if (!_self.properties.multiFile) {
            _self.que = [];
            _self.files = [];
        }

        _self.files.push(file);
    };

    this.send = function (options) {
        _self.properties = $.extend(_self.properties, options || {});
        _self.add_in_queue();
        _self.upload();
    };

    this.InitNoFileApi = function () {
        _self.objects.dropZone.hide();
        loadScripts(_self.properties.jqueryFormPluginUrl, function () {
        }, '', {async: false});
        $('#' + _self.properties.sendId).unbind('click').bind('click', function () {
            if (_self.properties.cbOnSend instanceof Function) {
                _self.properties.cbOnSend(true);
            } else {
                _self.sendNoFileApi();
            }
            return false;
        });
        _self.objects.fileInput.unbind('change').bind('change', function (event) {
            event.preventDefault();
            event.stopPropagation();
            if ($(this).parent().data('role') === 'filebutton') {
                $(this).parent().find('s').html($(this).val().replace(/^.*[\\\/]/, ''));
            }
        });
        return false;
    };

    this.sendNoFileApi = function (options) {
        _self.properties = $.extend(_self.properties, options || {});
        _self.objects.form.ajaxSubmit({
            url: _self.properties.siteUrl + _self.properties.uploadUrl,
            data: {no_file_api: 1},
            beforeSerialize: function ($form, options) {
                _self.objects.fileInput.prop('disabled', !_self.objects.fileInput.val());
            },
            success: function (data) {
                _self.objects.fileInput.prop('disabled', false);
                if (data.errors && data.errors.length) {
                    var msg = '';
                    if (typeof data.errors === 'object') {
                        for (var i in data.errors)
                            if (data.errors.hasOwnProperty(i)) {
                                msg = data.errors.join('. ');
                            }
                    } else {
                        msg = data.errors;
                    }
                    _self.objects.messageBox.add_message(msg);
                } else {
                    _self.resetFileInput();
                }

                if (_self.properties.cbOnUpload instanceof Function) {
                    _self.properties.cbOnUpload(data.name, data);
                }
                if (_self.properties.cbOnComplete instanceof Function) {
                    _self.properties.cbOnComplete(data);
                }
                if (_self.properties.cbOnError instanceof Function) {
                    _self.properties.cbOnError(data);
                }
                if (_self.properties.cbOnQueueComplete instanceof Function) {
                    _self.properties.cbOnQueueComplete(data);
                }
                if (_self.properties.cbOnQueueError instanceof Function) {
                    _self.properties.cbOnQueueError(data);
                }
            },
            error: function () {
                _self.objects.fileInput.prop('disabled', false);
            },
            dataType: 'json'
        });
    };

    this.allowedMimeType = function (type) {
        if (type === '' && _self.properties.allowUnknownMimeTypes) {
            return true;
        }
        for (var i in _self.properties.mimeType) {
            if (type === _self.properties.mimeType[i]) {
                return true;
            }
        }
        return false;
    };

    this.addMessage = function (message, type) {
        if (_self.objects.messageBox) {
            _self.objects.messageBox.add_message(message, type);
        }
    };

    this.addWarning = function (message, type) {
        if (_self.objects.warningBox) {
            if (typeof (error_object) !== 'undefined') {
                error_object.show_error_block(message, 'success');
            }

            _self.objects.warningBox.add_message(message, type);
        }
    };

    this.checkFileApi = function () {
        if (window.FileReader === null || window.FileReader === null || window.FileList === null || window.Blob === null) {
            return false;
        }
        xhr = new XMLHttpRequest();
        if (typeof xhr.upload !== 'object') {
            return false;
        }
        return true;
    };

    this.clearList = function () {
        _self.que = [];
        _self.files = [];
        $('#' + _self.properties.filebarId).html('');
    };

    this.process = function (file) {
        if (file.size > _self.properties.maxFileSize && _self.properties.maxFileSize > 0) {
            if (_self.properties.cbOnProcessError instanceof Function) {
                _self.properties.cbOnProcessError('max filesize exeeded');
            } else {
                _self.properties.errorObj.show_error_block(this.getMessageLang('mime'), 'error');
                this.addMessage(this.getMessageLang('exceeded'), 'error');
            }
            _self.objects.dropZone.removeClass('set-uploader-form');
            return false;
        }
        if (!_self.allowedMimeType(file.type)) {
            if (_self.properties.cbOnProcessError instanceof Function) {
                _self.properties.cbOnProcessError('mime type not allowed');
            } else {
                _self.properties.errorObj.show_error_block(this.getMessageLang('mime'), 'error');
                this.addMessage(this.getMessageLang('mime'), 'error');
            }
            _self.objects.dropZone.removeClass('set-uploader-form');            
            return false;
        }
        if (!_self.properties.multiFile) {
            _self.clearList();
        }

        if (_self.properties.displayFileRow) {
            _self.displayFile(file);
        } else {
            _self.display(file);
        }
        _self.processComplete();
    };
    
    this.mediaDescription = function (data) {
        data.removeClass('placeholder').addClass('edit').html(function(){
            if ($(this).find('span').text() === _self.properties.lang.data.description) {
                $(this).find('span').text('');
            }
        });
    };
    
    this.mediaDescriptionOut = function (data) {
        data.removeClass('edit');
        data.find('span').text(function(){
            if (data.find('textarea').val() !== '') {
                return data.find('textarea').val();
            } else {
                return _self.properties.lang.data.description;
            }
        });

    };

    this.displayFile = function (file) {
        var index = _self.files.push(file) - 1;
        var thumb = $('<div class="g-users-gallery__item col-md-2 col-lg-2 col-xs-4" data-id="' + index + '">'
                + '<div class="g-users-gallery__content">'
                + '<div class="g-users-gallery__photo">'
                + '<div class="g-pic-border g-rounded"></div>'
                + '<div class="g-users-gallery__actions">'
                + '<div class="g-photo-actions">'
                + '<a href="javascript:void(0);" data-action="delete" class="delete-media"><i class="fa fa-remove"></i></a>'
                + '</div></div></div></div>'
                + '<div class="media-description placeholder" data-id="' + index + '">' 
                + '<span>' +_self.properties.lang.data.description + '</span>'
                + '<textarea class="wp100" name="descriptions[' + file.name + ']" placeholder="' + _self.properties.lang.data.description + '"></textarea></div>'
                + '</div>');
        thumb.appendTo(_self.objects.fileBox);
        thumb.find('[data-action="delete"]').bind('click', function () {
            var container = $(this).parents('[data-id]');
            delete _self.files[container.attr('data-id')];
            container.fadeOut(150, function () {
                $(this).remove();
                _self.removeEvent();
            });
            _self.resetFileInput();
        });

        var reader = new FileReader();
        reader.onload = (function (thumb) {
            return function (e) {
                if ((/image/i).test(file.type) && _self.properties.createThumb) {
                    var img = new Image();
                    img.src = e.target.result;
                    $(img).one('load', function () {
                        var img = new Image();
                        img.src = _self.getThumb(this, _self.properties.thumbWidth, _self.properties.thumbHeight, _self.properties.thumbCrop, _self.properties.thumbBg, _self.properties.thumbJpeg);

                        $(img).prependTo($(thumb).find('.g-pic-border').css('max-height', _self.properties.thumbWidth));

                    });
                }
            };
        })(thumb);
        reader.readAsDataURL(file);
    };

    this.display = function (file) {
        var index = _self.files.push(file) - 1;
        var thumb = $('<li data-id="' + index + '"><span>' + file.name + ' (' + file.type + ')</span><div class="act"><i data-action="delete" class="fa fa-remove"></i></div></li>');
        thumb.appendTo(_self.objects.fileBox);
        thumb.find('[data-action="delete"]').bind('click', function () {
            var container = $(this).parents('[data-id]');
            delete _self.files[container.attr('data-id')];
            container.fadeOut(150, function () {
                $(this).remove();
            });

            _self.resetFileInput();
        });

        var reader = new FileReader();
        reader.onload = (function (thumb) {
            return function (e) {
                if ((/image/i).test(file.type) && _self.properties.createThumb) {
                    var img = new Image();
                    img.src = e.target.result;
                    $(img).one('load', function () {
                        var img = new Image();
                        img.src = _self.getThumb(this, _self.properties.thumbWidth, _self.properties.thumbHeight, _self.properties.thumbCrop, _self.properties.thumbBg, _self.properties.thumbJpeg);
                        $('<span>').append($(img)).addClass('upload-preview').prependTo(thumb);
                    });
                }
            };
        })(thumb);
        reader.readAsDataURL(file);
    };

    this.getThumb = function (img_obj, thumbwidth, thumbheight, crop, background, jpeg) {
        crop = crop || false;
        background = background || 'transparent';
        jpeg = jpeg || false;

        var c = document.createElement('canvas');
        var cx = c.getContext('2d');
        c.width = thumbwidth;
        c.height = thumbheight;
        var dimensions = (function (imagewidth, imageheight, thumbwidth, thumbheight) {
            var w = 0, h = 0, x = 0, y = 0;
            var widthratio = imagewidth / thumbwidth;
            var heightratio = imageheight / thumbheight;
            var maxratio = Math.max(widthratio, heightratio);
            if (maxratio > 1) {
                w = imagewidth / maxratio;
                h = imageheight / maxratio;
            } else {
                w = imagewidth;
                h = imageheight;
            }
            x = (thumbwidth - w) / 2;
            y = (thumbheight - h) / 2;
            return {w: w, h: h, x: x, y: y};
        })(img_obj.width, img_obj.height, thumbwidth, thumbheight);

        if (crop) {
            c.width = dimensions.w;
            c.height = dimensions.h;
            dimensions.x = 0;
            dimensions.y = 0;
        }
        if (background !== 'transparent') {
            cx.fillStyle = background;
            cx.fillRect(0, 0, thumbwidth, thumbheight);
        }
        cx.drawImage(img_obj, dimensions.x, dimensions.y, dimensions.w, dimensions.h);

        var url = jpeg ? c.toDataURL('image/jpeg', 80) : c.toDataURL();
        return url;
    };

    this.markUploaded = function (index, remove, form_error) {
        if (typeof remove === 'undefined')
            remove = true;
        if (typeof form_error === 'undefined')
            form_error = false;
        if (remove) {
            _self.objects.fileBox.find('li[data-id=' + index + ']').remove();
        }
        _self.files[index].inQue = false;
        if (form_error) {
            _self.files[index].uploaded = false;
        } else {
            _self.files[index].uploaded = true;
        }
    };

    this.remove = function (index) {

    };

    this.add_in_queue = function (i) {
        if (typeof i === 'undefined') {
            for (var i in _self.files) {
                if (!_self.files[i].inQue && !_self.files[i].uploaded) {
                    _self.files[i].inQue = true;
                    _self.que.push(i);
                }
            }
        } else if (!_self.files[i].inQue && !_self.files[i].uploaded) {
            _self.files[i].inQue = true;
            _self.que.push(i);
        }
    };

    this.upload = function () {
        if (!_self.que.length) {
            if (!_self.properties.allowEmptyFile && !_self.properties.isFileEmpty) {
                error_object.show_error_block(_self.properties.lang.errors.file_missing, 'error');
                return;
            }
            if (_self.properties.cbOnQueueComplete instanceof Function) {
                _self.properties.cbOnQueueComplete();
                // for chat, send message with no files
                if (_self.properties.isChat) {
                    return;
                }
            }
        }
        var index = parseInt(_self.que.splice(0, 1));

        if (_self.objects.form) {
            var fields = _self.objects.form.serializeArray();
        } else {
            var fields = {};
        }
        

        if (_self.properties.displayAfterProcess) {
            var progressOptions = {
                statContainer: '.g-users-gallery__photo',
                template: '<div class="g-users-gallery__overlayinfo">'
                        + '<div class="g-photo-statuses fright">'
                        + '<div class="g-photo-statuses__item g-photo-statuses__item_place">'
                        + '<span class="stat-bar"></span>'
                        + '</div></div></div>',
                barClass: 'status-progress'
            };
        };

        var progress = new progressBar(index, _self.properties.filebarId, progressOptions);

        new uploaderObject({
            file: _self.files.hasOwnProperty(index) ? _self.files[index] : null,
            url: _self.properties.siteUrl + _self.properties.uploadUrl,
            fieldName: _self.properties.fieldName,
            fields: fields,
            allowEmptyFile: _self.properties.allowEmptyFile,
            Accept: _self.properties.Accept,
            onprogress: function (percents) {
                progress.updateProgress(percents);
            },
            oncomplete: function (done, jsonStr) {
                var data = $.parseJSON(jsonStr);

                if (_self.properties.cbOnComplete instanceof Function) {
                    _self.properties.cbOnComplete(data);
                }
                if (data.errors && !data.errors.length) {
                    delete data.errors;
                }
                
                if (done && !data.errors) {
                    progress.updateProgress(100);
                    if (_self.properties.cbOnUpload instanceof Function) {
                        _self.properties.cbOnUpload(data.name, data);
                    }
                } else if (data.errors) {
                    if (done && _self.properties.cbOnError instanceof Function) {
                        _self.properties.cbOnError(data);
                    }
                    progress.setError(data.errors);
                } else {
                    if (done && _self.properties.cbOnError instanceof Function) {
                        _self.properties.cbOnError(this.lastError.text);
                    }
                    progress.setError(this.lastError.text);
                }

                if (data.warnings && data.warnings.length) {
                    _self.addWarning(data.warnings, 'error');
                }

                if (data.success && data.success.length) {
                    _self.addWarning(data.success, 'success');
                }

                if (_self.files.hasOwnProperty(index)) {
                    _self.markUploaded(index, Boolean(!data.errors), data.form_error);
                }
                progress = null;
                if (_self.que.length) {
                    _self.upload();
                } else if (_self.properties.cbOnQueueComplete instanceof Function) {
                    _self.properties.cbOnQueueComplete(data);
                }
            }
        });

    };

    this.resetFileInput = function () {
        _self.objects.fileInput.val('');
        _self.objects.fileInput.replaceWith(_self.objects.fileInput = _self.objects.fileInput.clone(true));
    };

    _self.Init(optionArr);
}

var progressBar = function (index, filebarId, options) {
    this.properties = {
        index: index,
        filebarId: filebarId,
        statClass: '.stat-bar',
        statContainer: '',
        template: '<div class="stat-bar"></div>',
        barClass: 'progress',
        box: {}
    };

    this.init = function () {
        this.properties = $.extend(this.properties, options);
        this.properties.box = $(this.properties.template);
        this.initTemplate();
    };

    this.initTemplate = function () {
        var file = $('#' + this.properties.filebarId).find('[data-id=' + this.properties.index + ']');
        file.find(this.properties.statClass).empty();

        if (this.properties.statContainer) {
            this.properties.box.appendTo(file.find(this.properties.statContainer));
        } else {
            this.properties.box.appendTo(file);
        }

    };

    this.updateProgress = function (percent) {
        NProgress.start();
        var progress = this.properties.box.find('.' + this.properties.barClass);
        if (!progress.length) {
            var progress = $('<div class="' + this.properties.barClass + '"><div class="percent"></div></div>');

            var stat_block = this.properties.box.find(this.properties.statClass);
            stat_block.append(progress);
            progress.find('.percent').css({width: '0%'}).text('0%');
        }
        progress.find('.percent').css({width: percent + '%'}).text(percent + '%');
    };

    this.setError = function (text) {
        this.properties.box.removeClass('error success').addClass('error').html(text);
    };

    this.setSuccess = function (text) {
        this.properties.box.removeClass('error success').addClass('success').html(text);
    };

    this.init();
};

var uploaderObject = function (params) {
    if ((!params.file && !params.allowEmptyFile) || !params.url) {
        return false;
    }

    this.xhr = new XMLHttpRequest();
    this.reader = new FileReader();
    this.progress = 0;
    this.uploaded = false;
    this.successful = false;
    this.lastError = false;

    var self = this;

    var onload = function () {
        self.xhr.upload.addEventListener("progress", function (e) {
            if (e.lengthComputable) {
                self.progress = (e.loaded * 100) / e.total;
                if (params.onprogress instanceof Function) {
                    params.onprogress.call(self, Math.round(self.progress));
                }
            }
        }, false);

        self.xhr.upload.addEventListener("load", function () {
            self.progress = 100;
            self.uploaded = true;
        }, false);

        self.xhr.upload.addEventListener("error", function () {
            self.lastError = {
                code: 1,
                text: 'Error uploading on server'
            };
        }, false);

        self.xhr.onreadystatechange = function () {
            var callbackDefined = params.oncomplete instanceof Function;
            if (this.readyState === 4) {
                if (this.status === 200) {
                    if (!self.uploaded) {
                        if (callbackDefined) {
                            params.oncomplete.call(self, false);
                        }
                    } else {
                        self.successful = true;
                        if (callbackDefined) {
                            params.oncomplete.call(self, true, this.responseText);
                        }
                    }
                } else {
                    self.lastError = {
                        code: this.status,
                        text: 'HTTP response code is not OK (' + this.status + ')'
                    };
                    if (callbackDefined) {
                        params.oncomplete.call(self, false);
                    }
                }
            }
        };

        self.xhr.open("POST", params.url);

        if (window.FormData) {
            var form = new FormData();
            if (params.fields) {
                for (var i in params.fields) {
                    form.append(params.fields[i].name, params.fields[i].value);
                }
            }
            if (params.file) {
                form.append(params.fieldName, params.file);
            }
            if (params.Accept) {
                self.xhr.setRequestHeader("Accept", params.Accept);
            }
            self.xhr.send(form);
        } else {
            var boundary = "";
            for (var i = 0; i < 9; i++) {
                boundary += Math.floor(Math.random() * 9).toString();
            }

            var body = "--" + boundary + "\r\n";

            if (params.Accept) {
                body += "Accept: " + params.Accept + "\r\n";
            }

            if (params.fields) {
                for (var i in params.fields) {
                    body += "\r\nContent-Disposition: form-data; name='" + params.fields[i].name + "'\r\n\r\n";
                    body += params.fields[i].value + "\r\n";
                    body += "--" + boundary;
                }
            }

            if (params.file) {
                body += "Content-Disposition: form-data; name='" + (params.fieldName || 'file') + "'; filename='" + params.file.name + "'\r\n";
                body += "Content-Type: application/octet-stream\r\n\r\n";
                body += self.reader.result + "\r\n";
                body += "--" + boundary;
            }

            body += "--\r\n";

            self.xhr.setRequestHeader("Content-Type", "multipart/form-data, boundary=" + boundary);
            self.xhr.setRequestHeader('Content-Length', body.length);
            self.xhr.setRequestHeader("Cache-Control", "no-cache");

            if (!XMLHttpRequest.prototype.sendAsBinary && Uint8Array) {
                XMLHttpRequest.prototype.sendAsBinary = function (datastr) {
                    function byteValue(x) {
                        return x.charCodeAt(0) & 0xff;
                    }
                    var ords = Array.prototype.map.call(datastr, byteValue);
                    var ui8a = new Uint8Array(ords);
                    this.send(ui8a.buffer);
                };
            }

            if (self.xhr.sendAsBinary) {
                // firefox
                self.xhr.sendAsBinary(body);
            } else {
                // chrome (W3C spec.)
                self.xhr.send(body);
            }
        }

    };

    if (params.file) {
        self.reader.onload = onload();
        if ('readAsBinaryString' in self.reader) {
            self.reader.readAsBinaryString(params.file);
        } else if ('readAsArrayBuffer' in self.reader) {
            self.reader.readAsArrayBuffer(params.file);
        }
    } else {
        onload();
    }
};

function uploadErrorObject(params) {
    this.properties = {
        blockId: '',
        timeout: 10000,
        fadeTimeout: 'slow'
    };

    this.messageBlock = {};
    var _self = this;

    this.Init = function (options) {
        this.properties = $.extend(this.properties, options);
        this.messageBlock = $('#' + this.properties.blockId);
    };

    // type = 'error', 'message', 'success'
    this.add_message = function (message, type) {
        if (!type)
            type = 'error';
        if (typeof message === 'object') {
            message = message.join('<br>');
        }
        this.messageBlock
                .hide()
                .removeClass('error message success')
                .html(message)
                .addClass(type)
                .fadeIn(this.properties.fadeTimeout, function () {
                    setTimeout(function () {
                        _self.remove_message();
                    }, _self.properties.timeout);
                });
    };

    this.remove_message = function () {
        this.messageBlock.fadeOut(this.properties.fadeTimeout, function () {
            $(this).removeClass('error message success').html('');
        });
    };

    this.Init(params);
}
