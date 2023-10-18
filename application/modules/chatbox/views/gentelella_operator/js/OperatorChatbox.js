function OperatorChatbox(optionArr) {
    this.properties = {
        siteUrl: '',
        urls: {
            getUsersLink: 'operator/chatbox/ajax_get_users',
            getContactsLink: 'operator/chatbox/ajax_get_contacts',
            deleteContactLink: 'operator/chatbox/ajax_delete_contact',
            startDialogLink: 'operator/chatbox/ajax_open_dialog',
            loadMessagesLink: 'operator/chatbox/ajax_get_messages',
            sendMessageLink: 'operator/chatbox/ajax_send_message',
            deleteMessageLink: 'operator/chatbox/ajax_delete_message',
            getAddContactForm: 'operator/chatbox/ajax_add_contact_form',
            getNotesForm: 'operator/chatbox/ajax_get_notes_form',
            addNoteLink: 'operator/chatbox/ajax_add_note',
            saveNoteLink: 'operator/chatbox/ajax_save_note',
            getNotesLink: 'operator/chatbox/ajax_get_notes',
            deleteNoteLink: 'operator/chatbox/ajax_delete_note',
            answerTimeExpiredLink: 'operator/chatbox/ajax_answer_time_expired',
            getAttachForm: 'operator/chatbox/ajax_attach_form',
            getAttachMediaList: 'operator/chatbox/ajax_attach_media_list',
        },

        userId: 0,
        contactId: 0,
        lTime: 0,
        dialogStateClass: 'dialog-opened',
        elementsDOM: {
            messageTextarea: 'chb_message',
        },
        actions: {
            closeDialog: '[data-click=close_dialog]',
            deleteMessage: '[data-click=delete_message]',
            viewMedia: '[data-click=view_media]',
            addContact: '[data-click=add_contact]',
            openNotes: '[data-click=open_notes]',
            addNote: '[data-click=add_note]',
            loadMoreNotes: '[data-click=load_more_notes]',
            deleteNote: '[data-click=delete_note]',
            sendMessage: '[data-click=send_message]',
            showAttachForm: '[data-click=show_attach_form]',
        },
        errorObj: new Errors(),
        modal: new loadingContent({
            loadBlockTopType: 'center',
            loadBlockWidth: '50%',
            closeBtnPadding: 12,
            blockBody: true,
            showAfterImagesLoad: false,
        }),
        langs: {
            noticeClearHistory: 'Вы действительно хотите очистить историю сообщений с этим пользователем?',
            noticeDeleteMessage: 'Вы действительно хотите удалить это сообщение?',
            successMessageSent: 'Сообщение успешно отправлено!',
            btnAccept: 'Принять',
            btnDecline: 'Отклонить',
            btnClose: 'Закрыть',
            messagesInQueue: 'Сообщений в очереди',
        },

        uploaded: false,
        gallery: null,
        next_gallery_image: null,
        prev_gallery_image: null,
        images: [],
        emojiPicker: null,
        minChars: 0,
        maxChars: 0,
        timeToAnswer: 0,
        attachedMediaIds: [],
        maxAttachedMedia: 0,
    };

    var _self = this,
        xhrLoadUsers   = null,
        xhrLoadContacts = null,
        xhrLoadHistory = null,
        xhrLoadNotes = null,
        xhrLoadAttachMedia = null,
        _answerTO = null,
        _p = {
            usersLoaded: false,
            usersNextPage: 2,
            contactsLoaded: false,
            historyLoaded: false,
            notesPage: 1,
            answerTime: 0,
            attachMediaPage: 1,
        };

    this.Init = function (options) {
        _self.properties = $.extend(true, _self.properties, options);

        // _self.initActions();
        // _self.initUsersActions();

        _self.properties.gallery = new loadingContent({
            loadBlockID: 'chatbox_gallery',
            loadBlockBgID: 'chatbox_gallery_bg',
            loadBlockWidth: '980px',
            loadBlockTopType: 'top',
            loadBlockTopPoint: 10,
            linkerObjID: null,
            blockBody: true,
            showAfterImagesLoad: true,
            closeBtnClass: 'w'
        });

        $('#' + _self.properties.modal.properties.loadContentId).css('max-width', '800px');

        return this;
    };

    this.initActions = function () {
        $('.chatbox-users__filter input[type=text]').off('change').change(function () {
            _p.usersLoaded   = false;
            _p.usersNextPage = 1;
            let search_kw  = _self.trimStr($('.chatbox-users__filter input[type=text]').val());
            _self.loadUsers(search_kw, false);
        });

        $(_self.properties.actions.addContact).off('click').click(function (e) {
            e.preventDefault();
            _self.openAddContactForm();
            return false;
        });

        return this;
    }

    this.initUsersActions = function () {
        $('.chatbox-users__user').removeClass('active');
        if (_self.properties.userId) {
            $('#chb_user_' + _self.properties.userId).addClass('active');
        }

        $('.chatbox-users__user').off('click').click(function (e) {
            let userId = $(this).data('id') || 0;
            if (userId) {
                _self.properties.userId = userId;
                _self.properties.contactId = 0;
                $('.chatbox-users__user').removeClass('active');
                $('#chb_user_' + userId).addClass('active');
                $('.chatbox-users-empty').hide();
                $('.chatbox-dialog').html('').hide();
                _self.loadContacts();
            }
            return false;
        });

        let $usersList = $('.chatbox-users__list');
        $usersList.off('scroll').on('scroll', function() {
            if (_p.usersLoaded == true) {
                return;
            }

            if ($usersList.scrollTop() >= ($usersList.prop("scrollHeight") - $usersList.height() - 1000)) {
                let search_kw = _self.trimStr($('.chatbox-users__filter input[type=text]').val());
                _self.loadUsers(search_kw, true);
            }
        });

        return this;
    }

    this.loadUsers = function (search_kw, load_more) {
        if (xhrLoadUsers == true) {
            return;
        }

        load_more = load_more || false;

        if (load_more && _p.usersLoaded == true) {
            return;
        }

        let is_backend = load_more ? 1 : 0;

        xhrLoadUsers = true;
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getUsersLink + '/' + _p.usersNextPage,
            type: 'POST',
            data: {
                search: search_kw,
            },
            dataType: 'json',
            cache: false,
            async: true,
            backend: is_backend,
            success: function (resp) {
                _p.usersNextPage = _p.usersNextPage + 1;
                xhrLoadUsers     = false;
                if (!load_more) {
                    _self.renderUsers(resp.users, false);
                } else {
                    if (resp.count > 0) {
                        _self.renderUsers(resp.users, true);
                    } else {
                        _p.usersLoaded = true;
                    }
                }
            }
        });

        return this;
    };

    this.renderUsers = function (users, load_more) {
        load_more = load_more || false;

        $('.chatbox-users__list .empty').hide();
        if (!users.length && !load_more) {
            $('.chatbox-users__list .empty').show();
        }

        if (!load_more) {
            $('.chatbox-users__list li.chatbox-users__user').remove();
        }

        $users_block = $('.chatbox-users__list ul');

        for (let i in users) {
            if (!$users_block.find('#chb_user_' + users[i].contact_id).length) {
                $users_block.append(users[i].html);
            }
        }

        _self.initUsersActions();

        return this;
    }

    this.initContactsActions = function () {
        $('.chatbox-contacts__filter input[type=text]').off('change').change(function () {
            _p.contactsLoaded = false;
            let search_kw  = _self.trimStr($('.chatbox-contacts__filter input[type=text]').val());
            _self.loadContacts(search_kw, false, true);
        });

        $('.chatbox-contacts__user').off('click').click(function (e) {
            if (!$(e.target).hasClass('chatbox-contacts__delele')) {
                let contactId = $(this).data('contact-id');
                _self.startDialog(contactId);
            }
            return false;
        });

        $('.chatbox-contacts__delele').off('click').click(function () {
            let contactId = $(this).data('contact-id');
            alerts.show({
                text: _self.properties.langs.noticeClearHistory,
                type: 'confirm',
                ok_callback: function () {
                    _self.deleteContact(contactId);
                }
            });
            return false;
        });

        $('.chatbox-contacts__list ul li').each(function () {
            let $message = $(this).find('.chatbox-contacts__message:not(.emoji-rendered)');
            if ($message.length) {
                $message.html(_self.properties.emojiPicker.colonToImage($message.html()));
                $message.addClass('emoji-rendered');
            }
        });

        let $contactList = $('.chatbox-contacts__list');
        $contactList.off('scroll').on('scroll', function() {
            if (_p.contactsLoaded == true) {
                return;
            }

            if ($contactList.scrollTop() >= ($contactList.prop("scrollHeight") - $contactList.height() - 1000)) {
                let search_kw = _self.trimStr($('.chatbox-contacts__filter input[type=text]').val());
                _self.loadContacts(search_kw, true);
            }
        });

        return this;
    }

    this.loadContacts = function (search_kw, load_more, is_search) {
        if (xhrLoadContacts == true) {
            return;
        }

        load_more = load_more || false;
        is_search = is_search || false;

        if (load_more && _p.contactsLoaded == true) {
            return;
        }

        let is_backend = 0;
        let l_date = '';
        let l_id = 0;
        if (load_more) {
            let $l_dialog = $('.chatbox-contacts__list li.chatbox-contacts__user:last');
            if ($l_dialog) {
                l_date = $l_dialog.data('udate');
                l_id = $l_dialog.data('id');
            }
            is_backend = 1;
        }

        xhrLoadContacts = true;
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getContactsLink,
            type: 'POST',
            data: {
                search: search_kw,
                l_date: l_date,
                l_id: l_id,
                user_id: _self.properties.userId
            },
            dataType: 'json',
            cache: false,
            async: true,
            backend: is_backend,
            success: function (resp) {
                xhrLoadContacts = false;
                if (!load_more) {
                    _self.renderContacts(resp.contacts, false, is_search);
                } else {
                    if (resp.count > 0) {
                        _self.renderContacts(resp.contacts, true, is_search);
                    } else {
                        _p.contactsLoaded = true;
                    }
                }
            }
        });

        return this;
    };

    this.renderContacts = function (contacts, load_more, is_search) {
        load_more = load_more || false;
        is_search = is_search || false;

        $('.chatbox-contacts').show();
        $('.chatbox-contacts__empty').hide();
        if (!contacts.length && !load_more) {
            $('.chatbox-contacts__empty').show();
        }

        if (!load_more) {
            $('.chatbox-contacts__list li.chatbox-contacts__user').remove();
        }

        $contacts_block = $('.chatbox-contacts__list ul');

        for (let i in contacts) {
            if (!$contacts_block.find('#chb_contact_' + contacts[i].contact_id).length) {
                $contacts_block.append(contacts[i].html);
            }
        }

        _self.initContactsActions();

        let scrollTop = $('.chatbox-contacts__list').scrollTop();
        if (is_search || scrollTop == 0) {
            $('.chatbox-contacts__list').scrollTop(0);
        }

        return this;
    }

    this.deleteContact = function (contactId) {
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.deleteContactLink,
            type: 'POST',
            data: {
                user_id: _self.properties.userId,
                contact_id: contactId
            },
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (typeof resp.success != 'undefined' && resp.success == 1) {
                    $('.chatbox-contacts__list li#chb_contact_' + contactId).remove();
                }
            }
        });

        return this;
    }

    this.startDialog = function (contactId, close_add_contact_popup) {
        close_add_contact_popup = close_add_contact_popup || false;
        if (close_add_contact_popup) {
            _self.properties.modal.hide_load_block();
        }

        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.startDialogLink,
            type: 'POST',
            data: {
                user_id: _self.properties.userId,
                contact_id: contactId
            },
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (resp.content) {
                    if (resp.user_id != _self.properties.userId) {
                        return false;
                    }

                    _self.properties.contactId = resp.contact_id;
                    // очищаем контакты
                    // _self.renderContacts([], false);
                    // $('.chatbox-contacts').hide();
                    $('.chatbox-users-empty').hide();

                    _p.historyLoaded = false;
                    $('#chb_dialog').html(resp.content);
                    $('#chb_dialog').show();
                    _self.initDialogActions();
                    _self.initMessagesAction();
                    $('#chatbox').addClass(_self.properties.dialogStateClass);

                    $('#chb_chars_written span').html(0);
                    if (_self.properties.minChars > 0) {
                        $('#chb_min_chars span').html(_self.properties.minChars);
                        $('#chb_min_chars').show();
                        $('#chb_send_msg_btn').prop('disabled', true);
                    } else {
                        $('#chb_min_chars').hide();
                        $('#chb_send_msg_btn').prop('disabled', false);
                    }
                    if (_self.properties.maxChars > 0) {
                        $('#chb_max_chars span').html(_self.properties.maxChars);
                        $('#chb_max_chars').show();
                    }

                    if (typeof resp.time_to_answer != 'undefined') {
                        let answerTime = parseInt(resp.time_to_answer);
                        if (answerTime > 0) {
                            _p.answerTime = answerTime;
                            $('#chb_timer span').html(_self.secondsToMS(_p.answerTime));
                            $('#chb_timer').show();
                            _self.answerTimeOut();
                        } else {
                            clearInterval(_answerTO);
                            $('#chb_timer').hide();
                        }
                    } else {
                        clearInterval(_answerTO);
                        $('#chb_timer').hide();
                    }
                }
            },
            error: function (resp) {
                // console.log(resp);
            }
        });

        return this;
    }

    this.closeDialog = function () {
        _self.properties.userId = 0;
        _self.properties.contactId = 0;
        _p.historyLoaded = false;
        _self.properties.attachedMediaIds = [];
        $('#chb_dialog').html('').hide();
        // _self.loadContacts();
        $('.chatbox-users-empty').show();
        $('#chatbox').removeClass(_self.properties.dialogStateClass);

        return this;
    }

    this.answerTimeOut = function () {
        clearInterval(_answerTO);

        _answerTO = setTimeout(function () {
            _p.answerTime--;
            $('#chb_timer span').html(_self.secondsToMS(_p.answerTime));
            if (_p.answerTime > 0) {
                _self.answerTimeOut();
            } else {
                // $('#chb_send_msg_btn').prop('disabled', true);

                $.ajax({
                    url: _self.properties.siteUrl + _self.properties.urls.answerTimeExpiredLink,
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    success: function (resp) {
                        if (resp.status == 1) {
                            _self.closeDialog();

                            if (resp.message != '') {
                                _self.properties.errorObj.show_error_block(resp.message, 'info');
                            }

                            if (typeof resp.next_chat.user_id != 'undefined') {
                                _self.properties.userId = parseInt(resp.next_chat.user_id);
                                _self.startDialog(parseInt(resp.next_chat.contact_id));
                            }
                        } else {
                            $('#chb_timer').hide();
                        }
                    }
                });
            }
        }, 1000);
    };

    this.initDialogActions = function () {
        $(_self.properties.actions.closeDialog).off('click').click(function (e) {
            e.preventDefault();
            _self.closeDialog();
            return false;
        });

        $(_self.properties.actions.openNotes).off('click').click(function (e) {
            e.preventDefault();
            _self.openNotes();
            return false;
        });

        $(_self.properties.actions.openTransferForm).off('click').click(function (e) {
            e.preventDefault();
            let userId = $(this).data('user-id') || 0;
            let contactId = $(this).data('contact-id') || 0;
            if (userId && contactId) {
                _self.openTransferForm(userId, contactId);
            }
            return false;
        });

        $(_self.properties.actions.sendMessage).off('click').click(function (e) {
            e.preventDefault();
            _self.sendMessage();
            return false;
        });

        $(_self.properties.actions.showAttachForm).off('click').click(function (e) {
            e.preventDefault();
            _self.showAttachForm();
            return false;
        });

        $('#chb_attaches ul').off('click', 'li i.fa-times').on('click', 'li i.fa-times', function (e) {
            e.preventDefault();
            let mediaId = $(this).closest('li').data('id') || 0;
            _self.deleteAttachMedia(mediaId);
            return false;
        });

        $('#' + _self.properties.elementsDOM.messageTextarea).off('keyup').keyup(function (e) {
            $(this).css('height', 'auto').css('height', this.scrollHeight);
            let messageLength = _self.getEnteredMessageLength();
            $('#chb_chars_written span').html(messageLength);
            $('#chb_send_msg_btn').prop('disabled', false);

            if (_self.properties.minChars > 0) {
                if (messageLength < _self.properties.minChars) {
                    $('#chb_send_msg_btn').prop('disabled', true);
                }
            }

            if (_self.properties.maxChars > 0) {
                if (messageLength > _self.properties.maxChars) {
                    $('#chb_send_msg_btn').prop('disabled', true);
                }
            }
        });

        $('#' + _self.properties.elementsDOM.messageTextarea).off('keydown').keydown(function (e) {
            if (e.ctrlKey && e.keyCode === 13) {
                $('#' + _self.properties.elementsDOM.messageTextarea).val($('#' + _self.properties.elementsDOM.messageTextarea).val() + '\n');
            } else if (e.keyCode === 13) {
                _self.sendMessage();
                return false;
            }
        });

        let scrollToVal = $('.chatbox-dialog__messages').prop('scrollHeight');
        $('.chatbox-dialog__messages').scrollTop(scrollToVal);
        // если картинки не успели прогрузится
        setTimeout(function () {
            let scrollToVal = $('.chatbox-dialog__messages').prop('scrollHeight');
            $('.chatbox-dialog__messages').scrollTop(scrollToVal);
        }, 500);

        let $historyBlock = $('.chatbox-dialog__messages');
        $historyBlock.off('scroll').on('scroll', function() {
            if (_p.historyLoaded == true) {
                return;
            }

            if ($historyBlock.scrollTop() <= 1000) {
                _self.loadHistory();
            }
        });

        _self.properties.emojiPicker.discover();
        if (typeof _self.properties.emojiPicker !== 'undefined') {
            _self.properties.emojiPicker.clearTextarea('.emoji-wysiwyg-editor', '');
        } else {
            $('#' + _self.properties.elementsDOM.messageTextarea).val('');
        }

        let $emojiEditor = $('#' + _self.properties.elementsDOM.messageTextarea).parent().find('.emoji-wysiwyg-editor');
        $emojiEditor.off('keyup blur').on('keyup blur', function (e) {
            $(this).css('height', 'auto').height(this.scrollHeight);
            let messageLength = _self.getEnteredMessageLength();
            $('#chb_chars_written span').html(messageLength);
            $('#chb_send_msg_btn').prop('disabled', false);

            if (_self.properties.minChars > 0) {
                if (messageLength < _self.properties.minChars) {
                    $('#chb_send_msg_btn').prop('disabled', true);
                }
            }

            if (_self.properties.maxChars > 0) {
                if (messageLength > _self.properties.maxChars) {
                    $('#chb_send_msg_btn').prop('disabled', true);
                }
            }
        });
        $emojiEditor.off('keydown').on('keydown', function (e) {
            if (e.ctrlKey && e.keyCode === 13) {
                _self.sendMessage();
                return false;
            }
        });

        setTimeout(function() {
            $emojiEditor.get(0).focus();
        }, 200);

        $('.js-user-images').off('click', '[data-click="view-single-media"]').on('click', '[data-click="view-single-media"]', function (e) {
            e.preventDefault();
            let src = $(this).data('gallery-src');
            if (src) {
                _self.viewSingleImage(src);
            }
            return false;
        });

        $('.js-user-images').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: true,
            arrows: false,
        });

        $('[data-action="view-my-info"]').off('click').click(function (e) {
            e.preventDefault();
            _self.changeMobileViewContainer('my_info');
            return false;
        });

        $('[data-action="view-user-info"]').off('click').click(function (e) {
            e.preventDefault();
            _self.changeMobileViewContainer('user_info');
            return false;
        });

        $('[data-action="view-messages"]').off('click').click(function (e) {
            e.preventDefault();
            _self.changeMobileViewContainer('messages');
            return false;
        });

        $('[data-action="kisses-form"]').off('click').click(function (e) {
            e.preventDefault();
            _self.getKissesForm();
            return false;
        });

        $('[data-action="like-me"]').off('click').click(function (e) {
            e.preventDefault();
            _self.actionLikeMe();
            return false;
        });

        $('[data-action="wink"]').off('click').click(function (e) {
            e.preventDefault();
            _self.actionWink();
            return false;
        });

        return this;
    }

    this.getKissesForm = function () {
        $('[data-action="kisses-form"]').prop('disabled', true);

        $.ajax({
            url: _self.properties.siteUrl + 'operator/chatbox/ajax_get_kisses_form',
            type: 'POST',
            data: {
                user_id: _self.properties.userId,
                contact_id: _self.properties.contactId,
            },
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                $('[data-action="kisses-form"]').prop('disabled', false);

                if (resp.status == 1) {
                    _self.properties.modal.show_load_block(resp.content);
                    $(document).off('click', '[data-action="kisses"]').on('click', '[data-action="kisses"]', function (e) {
                        e.preventDefault();
                        let $form = $(this).closest('form');
                        let kissId = $form.find('input[name="kiss"]:checked').val() || 0;
                        let message = $form.find('textarea[name="message"]').val() || '';

                        if (kissId) {
                            _self.actionKisses(kissId, message);
                        }
                        return false;
                    });
                }
            },
            error: function (resp) {
                $('[data-action="kisses-form"]').prop('disabled', false);
            }
        });
    };

    this.actionKisses = function (kissId, message) {
        $('[data-action="kisses"]').prop('disabled', true);

        $.ajax({
            url: _self.properties.siteUrl + 'operator/chatbox/ajax_chat_action',
            type: 'POST',
            data: {
                action: 'kisses',
                user_id: _self.properties.userId,
                contact_id: _self.properties.contactId,
                kiss_id: kissId,
                message: message,
            },
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (resp.status == 1) {
                    _self.properties.modal.hide_load_block();
                    if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.errors, 'success');
                    }
                } else {
                    $('[data-action="kisses"]').prop('disabled', false);
                        if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.errors, 'error');
                    }
                }
            },
            error: function (resp) {
                $('[data-action="kisses"]').prop('disabled', false);
            }
        });
    };

    this.actionLikeMe = function () {
        $('[data-action="like-me"]').prop('disabled', true);

        $.ajax({
            url: _self.properties.siteUrl + 'operator/chatbox/ajax_chat_action',
            type: 'POST',
            data: {
                action: 'like_me',
                user_id: _self.properties.userId,
                contact_id: _self.properties.contactId,
            },
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (resp.status == 1) {
                    if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.errors, 'success');
                    }
                } else {
                    $('[data-action="like-me"]').prop('disabled', false);
                        if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.errors, 'error');
                    }
                }
            },
            error: function (resp) {
                $('[data-action="like-me"]').prop('disabled', false);
            }
        });
    };

    this.actionWink = function () {
        $('[data-action="wink"]').prop('disabled', true);

        $.ajax({
            url: _self.properties.siteUrl + 'operator/chatbox/ajax_chat_action',
            type: 'POST',
            data: {
                action: 'winks',
                user_id: _self.properties.userId,
                contact_id: _self.properties.contactId,
            },
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (resp.status == 1) {
                    if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.errors, 'success');
                    }
                } else {
                    $('[data-action="wink"]').prop('disabled', false);
                        if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.errors, 'error');
                    }
                }
            },
            error: function (resp) {
                $('[data-action="wink"]').prop('disabled', false);
            }
        });
    };

    this.changeMobileViewContainer = function (section) {
        section = section || 'messages';

        $('[data-action="view-my-info"], [data-action="view-user-info"], [data-action="view-messages"]').addClass('c-mobile-hide');
        $('#chbx_my_info, #chbx_user_info, #chbx_main').addClass('c-mobile-hide');

        if (section == 'my_info') {
            $('[data-action="view-user-info"], [data-action="view-messages"]').removeClass('c-mobile-hide');
            $('#chbx_my_info').removeClass('c-mobile-hide');
        } else if (section == 'user_info') {
            $('[data-action="view-my-info"], [data-action="view-messages"]').removeClass('c-mobile-hide');
            $('#chbx_user_info').removeClass('c-mobile-hide');
        } else {
            $('[data-action="view-my-info"], [data-action="view-user-info"]').removeClass('c-mobile-hide');
            $('#chbx_main').removeClass('c-mobile-hide');
        }

        $('.js-user-images').slick('refresh');

        return this;
    }

    this.loadHistory = function () {
        if (xhrLoadHistory == true || _p.historyLoaded == true) {
            return;
        }

        let f_adate = '';
        let f_mid   = '';
        let $first_msg = $('.chatbox-dialog__messages li.chatbox-messages__item:first');
        if ($first_msg) {
            f_adate = $first_msg.data('date-added');
            f_mid   = $first_msg.data('message-id');
        }

        xhrLoadHistory = true;
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.loadMessagesLink,
            type: 'POST',
            data: {
                user_id: _self.properties.userId,
                contact_id: _self.properties.contactId,
                f_adate: f_adate,
                f_mid: f_mid,
            },
            dataType: 'json',
            cache: false,
            async: true,
            backend: 1,
            success: function (resp) {
                xhrLoadHistory = false;
                if (resp.count > 0) {
                    _self.renderMessages(resp.messages, true);
                } else {
                    _p.historyLoaded = true;
                }
            }
        });

        return this;
    }

    this.renderMessages = function (messages, is_history) {
        is_history = is_history || false;

        if (messages.length) {
            $('.chatbox-dialog__messages-empty').hide();
        } else {
            return;
        }

        $messages_block = $('.chatbox-dialog__messages ul');
        let prepend_html_string = '';

        for (let i in messages) {
            if (!$messages_block.find('#chb_msg_' + messages[i].id).length) {
                if (is_history) {
                    prepend_html_string += messages[i].html;
                } else {
                    last_msg = messages[i];
                    $messages_block.append(messages[i].html);
                }
            }
        }

        if (is_history && prepend_html_string != '') {
            $messages_block.prepend(prepend_html_string);
        }

        _self.initMessagesAction();

        if (!is_history) {
            let scrollToVal = $('.chatbox-dialog__messages').prop('scrollHeight');
            $('.chatbox-dialog__messages').scrollTop(scrollToVal);
            // если картинки не успели прогрузится
            setTimeout(function () {
                let scrollToVal = $('.chatbox-dialog__messages').prop('scrollHeight');
                $('.chatbox-dialog__messages').scrollTop(scrollToVal);
            }, 500);
        }

        return this;
    }

    this.initMessagesAction = function () {
        $(_self.properties.actions.viewMedia).off('click').click(function () {
            _self.initGallery($(this));
        });

        $(_self.properties.actions.deleteMessage).off('click').click(function () {
            let message_id = $(this).data('message-id');
            alerts.show({
                text: _self.properties.langs.noticeDeleteMessage,
                type: 'confirm',
                ok_callback: function () {
                    _self.deleteMessage(message_id);
                }
            });
            return false;
        });

        $('.chatbox-dialog__messages ul li').each(function () {
            let $message = $(this).find('.chatbox-messages__message:not(.emoji-rendered)');
            if (typeof $message.html() != 'undefined') {
                $message.html(_self.properties.emojiPicker.colonToImage(_self.properties.emojiPicker.codeToColon(JSON.parse(JSON.stringify($message.html()).replace(/\\\\u/g, '\\u')))));
                $message.addClass('emoji-rendered');
            }
        });

        return this;
    }

    this.sendMessage = function () {
        if (_self.properties.userId && _self.properties.contactId) {
            let messageLength = _self.getEnteredMessageLength();
            if (_self.properties.minChars > 0 && messageLength < _self.properties.minChars) {
                return false;
            }

            if (_self.properties.maxChars && messageLength > _self.properties.maxChars) {
                return false;
            }

            let message = $('#' + _self.properties.elementsDOM.messageTextarea).val();
            if (typeof _self.properties.emojiPicker !== 'undefined') {
                $('.emoji-wysiwyg-editor').find('img').each(function(){
                    var alt = $(this).attr('alt');
                    $(this).replaceWith(alt);
                });
                message = $('.emoji-wysiwyg-editor').html();
                message = _self.getMessageText(message);
            }

            let $form    = $('#chatbox_message_form');
            let attaches = [];
            $form.find('input[name="attaches[]"]').each(function () {
                attaches.push($(this).val());
            });

            if (message != ''/*  || attaches.length */) {
                let l_adate = '';
                let $last_msg = $('.chatbox-dialog__messages li.chatbox-messages__item:last');
                if ($last_msg) {
                    l_adate = $last_msg.data('date-added');
                }

                $.ajax({
                    url: _self.properties.siteUrl + _self.properties.urls.sendMessageLink,
                    type: 'POST',
                    data: {
                        user_id: _self.properties.userId,
                        contact_id: _self.properties.contactId,
                        message: message,
                        l_adate: l_adate,
                        attaches: attaches,
                    },
                    dataType: 'json',
                    cache: false,
                    async: true,
                    success: function (resp) {
                        if (typeof resp.errors != 'undefined' && resp.errors != '') {
                            _self.properties.errorObj.show_error_block(resp.errors, 'error');
                        } else {
                            // закрываем диалог. можно отправлять только одно сообщение
                            _self.properties.errorObj.show_error_block(_self.properties.langs.successMessageSent, 'success');
                            _self.closeDialog();

                            if (typeof resp.next_chat.user_id != 'undefined') {
                                _self.properties.userId = parseInt(resp.next_chat.user_id);
                                _self.startDialog(parseInt(resp.next_chat.contact_id));
                            }
                            return;
                        }
                        return false;
                    }
                });
            }

        }
        return false;
    }

    this.getMessages = function (only_new) {
        only_new = only_new || 0;
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.loadMessagesLink,
            type: 'POST',
            data: {
                user_id: _self.properties.userId,
                contact_id: _self.properties.contactId,
                only_new: only_new
            },
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (resp.messages) {
                    _self.renderMessages(resp.messages);
                }
            }
        });
        return this;
    }

    this.deleteMessage = function (message_id) {
        if (message_id) {
            $.ajax({
                url: _self.properties.siteUrl + _self.properties.urls.deleteMessageLink,
                type: 'POST',
                data: {
                    message_id: message_id
                },
                dataType: 'json',
                cache: false,
                async: true,
                success: function (resp) {
                    if (resp.success == 1) {
                        $('.chatbox-dialog__messages li#chb_msg_' + message_id).remove();

                        if (resp.msg_count === 0) {
                            $('.chatbox-dialog__messages-empty').show();
                            // $('.chatbox-contacts__list li#chb_contact_' + _self.properties.contactId).remove();
                        }
                    }
                }
            });
        }
        return this;
    }

    this.initGallery = function (image_object) {
        if (image_object) {
            _self.properties.images = [];
            $(image_object).closest('.chatbox-dialog__messages').find('img.chatbox-messages__message-image').each(function () {
                _self.properties.images.push($(this).get(0));
            });
            $(document).off('click', '.media-gallery-editor [data-click=next_media]').on('click', '.media-gallery-editor [data-click=next_media]', function () {
                _self.nextGalleryImage();
                return false;
            });
            $(document).off('click', '.media-gallery-editor [data-click=prev_media]').on('click', '.media-gallery-editor [data-click=prev_media]', function () {
                _self.prevGalleryImage();
                return false;
            });
            _self.setGalleryImage(image_object.get(0));
        }
        return this;
    }

    this.viewSingleImage = function (src) {
        let cur_html = '<img class="img-responsive" src="' + src + '" />';
        let html = '<div class="media-gallery-editor"><div class="media-gallery-editor__media-box"><div class="media-gallery-editor__media-source-box container_"><div class="inner-image">' + cur_html + '</div></div></div><div class="media-gallery-editor__photo-menu"></div></div>';
        _self.properties.gallery.changeTemplate('gallery');
        _self.properties.gallery.update_css_styles({width: '980px', margin: '0 auto'});
        _self.properties.gallery.show_load_block(html, true);

        return this;
    };

    this.setGalleryImage = function (event_object) {
        let imagesLength = _self.properties.images.length;
        if (imagesLength) {
            let next = _self.properties.images[0];
            let prev = _self.properties.images[imagesLength - 1];
            let header_count = '1 / ' + (imagesLength);
            for (let i = 0; i < imagesLength; i++) {
                if (_self.properties.images[i] == event_object) {
                    if (typeof _self.properties.images[+i + 1] !== 'undefined') {
                        next = _self.properties.images[+i + 1];
                    }
                    if (typeof _self.properties.images[+i - 1] !== 'undefined') {
                        prev = _self.properties.images[+i - 1];
                    }
                    header_count = (+i + 1) + ' / ' + (imagesLength);
                }
            }
            _self.properties.next_gallery_image = next;
            _self.properties.prev_gallery_image = prev;
            let prev_html = '<img class="hide" src="' + $(prev).attr('gallery-src') + '" />';
            let next_html = '<img class="hide" src="' + $(next).attr('gallery-src') + '" />';
            let cur_html = '<img class="img-responsive" src="' + $(event_object).attr('gallery-src') + '" />';
            let html = '<div class="media-gallery-editor"><div class="media-gallery-editor__media-box"><div class="media-gallery-editor__media-source-box container_"><div class="inner-image">' + cur_html + '<div data-click="next_media" class="load_content_right"></div><div data-click="prev_media" class="load_content_left"></div></div>' + prev_html + next_html + '</div><div class="media-gallery-editor__photo-menu">' + header_count + '</div></div></div>';
            _self.properties.gallery.changeTemplate('gallery');
            _self.properties.gallery.update_css_styles({width: '962px', margin: '0 auto'});
            _self.properties.gallery.show_load_block(html, true);
        }
        return this;
    }

    this.nextGalleryImage = function () {
        _self.setGalleryImage(_self.properties.next_gallery_image);
        return this;
    }

    this.prevGalleryImage = function () {
        _self.setGalleryImage(_self.properties.prev_gallery_image);
        return this;
    }

    this.openAddContactForm = function () {
        if (!_self.properties.userId) {
            return false;
        }

        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getAddContactForm,
            type: 'POST',
            data: {
                user_id: _self.properties.userId,
            },
            cache: false,
            async: true,
            success: function (resp) {
                _self.properties.modal.show_load_block(resp);

            }
        });

        return this;
    }

    this.openNotes = function () {
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getNotesForm,
            type: 'POST',
            data: {
                user_id: _self.properties.userId,
                contact_id: _self.properties.contactId,
            },
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (resp.content != '') {
                    _self.properties.modal.show_load_block(resp.content);
                    _p.notesPage = 1;
                    _self.initNotesActions();
                }

            }
        });

        return this;
    }

    this.initNotesActions = function () {
        $(_self.properties.actions.addNote).off('click').click(function (e) {
            e.preventDefault();
            let $form = $(this).closest('form');
            let type = $(this).data('type') || 'user';
            _self.addNote($form, type);
            return false;
        });

        $(_self.properties.actions.loadMoreNotes).off('click').click(function (e) {
            e.preventDefault();
            let type = $(this).data('type') || 'user';
            _self.getNotes(type, 1);
            return false;
        });

        $('[data-action="notes-filter"]').off('click').click(function (e) {
            e.preventDefault();
            let type = $(this).data('type') || 'user';
            _self.getNotes(type, 0);
            return false;
        });

        $('[data-action="notes_add_form"]').off('click').click(function (e) {
            e.preventDefault();
            let type = $(this).data('type') || 'user';
            _self.changeNotesForm('add', type);
            return false;
        });

        $('[data-action="notes_content"]').off('click').click(function (e) {
            e.preventDefault();
            let type = $(this).data('type') || 'user';
            _self.changeNotesForm('content', type);
            return false;
        });

        $('[data-action="notes-mobile-tabs"] > li').off('click').click(function (e) {
            e.preventDefault();
            let type = $(this).data('type') || 'user';

            $('[data-action="notes-mobile-tabs"] > li').removeClass('active');
            $(this).addClass('active');
            $('.chatbox-notes__user, .chatbox-notes__contact').removeClass('cn-xs-active');

            if (type == 'contact') {
                $('.chatbox-notes__contact').addClass('cn-xs-active');
            } else {
                $('.chatbox-notes__user').addClass('cn-xs-active');
            }

            return false;
        });

        let $notes_list_user = $('#chb_notes_' + _self.properties.userId + '_' + _self.properties.contactId + '_user');
        $notes_list_user.off('click', _self.properties.actions.deleteNote).on('click', _self.properties.actions.deleteNote, function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            _self.deleteNote(id, 'user');
            return false;
        })/* .off('click', '[data-editable]').on('click', '[data-editable]', function (e) {
            let $container = $(this);
            if ($container.data('editing')) {
                return false;
            }
            $container.data('editing', 1);
            $container.data('message', $container.html());
            let message = _self.trimStr(_self.br2nl($container.html().replace(/<br\s*\/?>\n/mg, '<br>')));
            let content = '<textarea class="form-control">' + message + '</textarea><div class="mt10"><button type="button" class="btn btn-primary" data-click="save_note">' + _self.properties.langs.btnSave + '</button><a href="javascript:;" class="ml10" data-click="cancel_edit_note">' + _self.properties.langs.btnCancel + '</a></div>';
            $container.html(content);

            return false;
        }).off('click', '[data-click="save_note"]').on('click', '[data-click="save_note"]', function (e) {
            e.preventDefault();
            let $container = $(this).closest('[data-editable]');
            let id = $container.data('id');
            $container.data('editing', 0);
            let message = $container.find('textarea').val();
            $container.html(_self.nl2br(message));
            if (id) {
                _self.saveNote(id, message);
            }

            return false;
        }).off('click', '[data-click="cancel_edit_note"]').on('click', '[data-click="cancel_edit_note"]', function (e) {
            e.preventDefault();
            let $container = $(this).closest('[data-editable]');
            $container.data('editing', 0);
            $container.html($container.data('message'));

            return false;
        }) */;

        let $notes_list_contact = $('#chb_notes_' + _self.properties.userId + '_' + _self.properties.contactId + '_contact');
        $notes_list_contact.off('click', _self.properties.actions.deleteNote).on('click', _self.properties.actions.deleteNote, function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            _self.deleteNote(id, 'contact');
            return false;
        });

        return this;
    }

    this.changeNotesForm = function (section, type) {
        $('.chatbox-notes__body').removeClass('cn-user cn-contact');

        let $cnt = $('.chatbox-notes__user');
        if (type == 'contact') {
            $cnt = $('.chatbox-notes__contact');
        }

        if (section == 'add') {
            if (type =='contact') {
                $('.chatbox-notes__body').addClass('cn-contact');
            } else {
                $('.chatbox-notes__body').addClass('cn-user');
            }

            $cnt.find('.chatbox-notes__content').hide();
            $cnt.find('.chatbox-notes__add').show();
        } else {
            $cnt.find('.chatbox-notes__add').hide();
            $cnt.find('.chatbox-notes__content').show();
        }

        return this;
    };

    this.getNotes = function (type, isLoadMore = 0) {
        if (xhrLoadNotes == true) {
            return;
        }

        let $notes_block = $('#chb_notes_' + _self.properties.userId + '_' + _self.properties.contactId + '_' + type);
        if (!$notes_block.length) {
            return;
        }

        let categoryGid = $('#chb_notes_' + _self.properties.userId + '_' + _self.properties.contactId + '_category_' + type).val();
        let $first_note = $notes_block.find('li.chatbox-notes__list-item:last');
        let f_id   = '';
        if ($first_note && isLoadMore) {
            f_id   = $first_note.data('id');
        }

        $notes_block.find('.chatbox-notes__empty').hide();
        if (isLoadMore) {
            $notes_block.find('.chatbox-notes__more button').prop('disabled', true);
        } else {
            $notes_block.find('.chatbox-notes__loader').show();
            $notes_block.find('.chatbox-notes__more').hide();
            $notes_block.find('li:not(.chatbox-notes__empty, .chatbox-notes__more, .chatbox-notes__loader)').remove();
        }

        xhrLoadNotes = true;
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getNotesLink,
            type: 'POST',
            data: {
                user_id: _self.properties.userId,
                contact_id: _self.properties.contactId,
                f_id: f_id,
                category_gid: categoryGid,
                type: type,
            },
            dataType: 'json',
            cache: false,
            async: true,
            backend: 1,
            success: function (resp) {
                xhrLoadNotes = false;
                if (resp.count > 0) {
                    _self.renderNotes(resp.notes, isLoadMore, type);
                } else if (!isLoadMore) {
                    $notes_block.find('.chatbox-notes__empty').show();
                }

                if (resp.load_more == 1) {
                    $notes_block.find('.chatbox-notes__more').show();
                } else {
                    $notes_block.find('.chatbox-notes__more').hide();
                }

                $notes_block.find('.chatbox-notes__loader').hide();
                $notes_block.find('.chatbox-notes__more button').prop('disabled', false);
            }
        });

        return this;
    }

    this.addNote = function ($form, type) {
        let message = $form.find('textarea').val();
        message = _self.trimStr(message);

        let categoryGid = $form.find('select[name="category_gid"]').val();

        let userId = $form.data('user-id') || 0;
        let contactId = $form.data('contact-id') || 0;
        let l_id = 0;

        let $notes_list = $('#chb_notes_' + _self.properties.userId + '_' + _self.properties.contactId + '_' + type);
        if (!$notes_list.length) {
            return;
        }

        let $first_note = $notes_list.find('li.chatbox-notes__list-item:first');
        if ($first_note.length) {
            l_id = $first_note.data('id') || 0;
        }

        if (message && userId && contactId) {
            $.ajax({
                url: _self.properties.siteUrl + _self.properties.urls.addNoteLink,
                type: 'POST',
                data: {
                    user_id: userId,
                    contact_id: contactId,
                    message: message,
                    category_gid: categoryGid,
                    l_id: l_id,
                    type: type,
                },
                dataType: 'json',
                cache: false,
                async: true,
                success: function (resp) {
                    if (resp.status == 1) {
                        $form.find('textarea').val('');
                        _self.changeNotesForm('content', type);

                        // let filterCategoryGid = $('#chb_notes_' + _self.properties.userId + '_' + _self.properties.contactId + '_category').val();
                        // if (_self.properties.userId == userId
                        //     && _self.properties.contactId == contactId
                        //     && (filterCategoryGid == '' || filterCategoryGid == categoryGid)
                        // ) {
                        //     _self.renderNotes(resp.notes, 'add');
                        // }

                        _self.getNotes(type);

                        if (resp.message != '') {
                            _self.properties.errorObj.show_error_block(resp.message, 'success');
                        }
                    } else if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.message, 'error');
                    }
                }
            });
        }
        return this;
    }

    this.deleteNote = function (id, type) {
        let $notes_list = $('#chb_notes_' + _self.properties.userId + '_' + _self.properties.contactId + '_' + type);

        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.deleteNoteLink,
            type: 'POST',
            data: {id: id},
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (resp.status == 1) {
                    $('#chb_note_' + id).remove();
                    if (!$notes_list.find('li.chatbox-notes__list-item').length) {
                        $('.chatbox-notes__empty').show();
                    }
                    if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.message, 'success');
                    }
                } else if (resp.message != '') {
                    _self.properties.errorObj.show_error_block(resp.message, 'error');
                }
            }
        })

        return this;
    }

    this.saveNote = function (id, message) {
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.saveNoteLink,
            type: 'POST',
            data: {id: id, message: message},
            dataType: 'json',
            cache: false,
            async: true,
            success: function (resp) {
                if (resp.status == 1) {
                    if (resp.message != '') {
                        _self.properties.errorObj.show_error_block(resp.message, 'success');
                    }
                } else if (resp.message != '') {
                    _self.properties.errorObj.show_error_block(resp.message, 'error');
                }
            }
        })

        return this;
    }

    this.renderNotes = function (notes, isLoadMore = 0, type = 'user') {
        let $notes_block = $('#chb_notes_' + _self.properties.userId + '_' + _self.properties.contactId + '_' + type);

        if (notes.length) {
            $notes_block.find('.chatbox-notes__empty').hide();
        } else {
            return;
        }

        let html_string = '';
        for (let i in notes) {
            if (!$notes_block.find('#chb_note_' + notes[i].id).length) {
                html_string += notes[i].html;
            }
        }

        if (html_string != '') {
            if (isLoadMore) {
                $notes_block.find('li.chatbox-notes__empty').before(html_string);
            } else {
                $notes_block.prepend(html_string);
            }
        }

        return this;
    }

    this.showAttachForm = function () {
        if (!_self.properties.userId) {
            return false;
        }

        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getAttachForm + '/' + _self.properties.userId + '/' + _self.properties.contactId,
            type: 'GET',
            dataType: 'html',
            cache: false,
            success: function (resp) {
                if (resp) {
                    _p.attachMediaPage = 1;
                    _self.properties.modal.show_load_block(resp);

                    $('#chb_amedia_count').html('(' + _self.properties.attachedMediaIds.length + ')');
                }
            }
        });
        return this;
    }

    this.addAttachMedia = function (mediaId, thumbSrc) {
        if (_self.properties.attachedMediaIds.includes(mediaId)) {
            return true;
        }

        if (mediaId && thumbSrc) {
            $('#chb_attaches ul').append('<li data-id="' + mediaId + '"><img src="' + thumbSrc + '"><input type="hidden" name="attaches[]" value="' + mediaId + '" /><i class="fa fa-times"></i></li>');

            _self.properties.attachedMediaIds.push(mediaId);
            $('#chb_attaches').show();
        }

        return true;
    }

    this.deleteAttachMedia = function (mediaId) {
        if (!mediaId) {
            return false;
        }

        let index = _self.properties.attachedMediaIds.indexOf(parseInt(mediaId));
        if (index !== -1) _self.properties.attachedMediaIds.splice(index, 1);

        $('#chb_attaches ul li[data-id=' + mediaId + ']').remove();
        if (!$('#chb_attaches ul li').length) {
            $('#chb_attaches').hide();
        }

        return;
    }

    this.getNextAttachMediaList = function () {
        if (xhrLoadAttachMedia == true || !_self.properties.userId) {
            return;
        }

        _p.attachMediaPage++;
        xhrLoadAttachMedia = true;

        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getAttachMediaList,
            type: 'POST',
            data: {
                'page': _p.attachMediaPage,
                'user_id': _self.properties.userId,
                'contact_id': _self.properties.contactId,
            },
            dataType: 'json',
            cache: false,
            success: function (resp) {
                xhrLoadAttachMedia = false;
                if (resp.status == 1) {
                    if (resp.items.length) {
                        for (let i = 0; i < resp.items.length; i++) {
                            const item = resp.items[i];
                            $('#chb_amedia_list').append(item.content);
                        }

                        $('#chb_amedia_list li').each(function () {
                            if (_self.properties.attachedMediaIds.indexOf(parseInt($(this).data('id'))) !== -1) {
                                $(this).addClass('selected');
                            }
                        });
                    }

                    if (resp.show_more != 1) {
                        $('[data-click="show_more_amedia"]').hide();
                    }
                }
            }
        });
        return this;
    }

    this.backendAction = function (resp) {
        _self.properties.lTime = resp.l_time;

        if (resp.user_id == _self.properties.userId) {
            // update messages
            if (_self.properties.contactId != 0 && _self.properties.contactId == resp.contact_id) {
                if (typeof (resp.data.messages) != 'undefined') {
                    _self.renderMessages(resp.data.messages);
                }
            }
        }

        if (_self.properties.contactId == 0 && typeof (resp.next_chat.user_id) != 'undefined') {
            _self.properties.userId = parseInt(resp.next_chat.user_id);
            _self.startDialog(parseInt(resp.next_chat.contact_id));
        }

        if ($('#chatbox').length) {
            // let $title = $('.page-title > .title_left > h3');
            // $title.find('span.queue').remove();
            // $title.append('<span class="queue">. ' + _self.properties.langs.messagesInQueue + ': ' + resp.chats_count + '</span>');
            $('#chb_queue span').html(resp.chats_count);
        } else {
            $('.js-messages-in-queue').html(resp.chats_count);
        }
    }

    this.getEnteredMessageLength = function () {
        if (typeof _self.properties.emojiPicker !== 'undefined') {
            let message = $('.emoji-wysiwyg-editor').html();
            message = message.replace(/<img[^>]*>/g, '1');
            message = _self.getMessageText(message);
            return message.length;
        }

        let message = $('#' + _self.properties.elementsDOM.messageTextarea).val();
        message = _self.getMessageText(message);
        return message.length;
    }

    this.trimStr = function (s) {
        s = s.replace(/^\s+/g, '');
        return s.replace(/\s+$/g, '');
    };

    this.nl2br = function (str) {
        return str.replace(/([^>])\n/g, '$1<br/>');
    }

    this.br2nl = function (str) {
        return str.replace(/<br\s*\/?>/mg,"\n");
    }

    this.getMessageText = function (str) {
        str = str.replace(/<div>/mg, '\n');
        str = str.replace(/<\/div>/mg, '');
        str = str.replace(/<br\s*\/?>/mg, '');
        str = str.replace(/&nbsp;/mg, ' ');
        return _self.trimStr(str);
    }

    this.secondsToMS = function (seconds) {
        let minutes = Math.floor(seconds / 60);
        seconds = seconds - (minutes * 60);

        return minutes + ':' + (seconds < 10 ? '0' + seconds : seconds);
    };

    this.Init(optionArr);
}