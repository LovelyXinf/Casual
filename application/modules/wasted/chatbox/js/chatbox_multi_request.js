if(typeof MultiRequest !== 'undefined'){
    MultiRequest.initAction({
        gid: 'chatbox',
        params: {module: 'chatbox', model: 'Chatbox_contact_list_model', method: 'checkNewMessages'},
        paramsFunc: function() {
            if (typeof window.chatbox != 'undefined' && typeof window.chatbox.properties != 'undefined') {
                return {l_time: window.chatbox.properties.l_time, contact_id: window.chatbox.properties.contactId};
            }
            return {};
        },
        callback: function(resp) {
            if (resp) {
                if (typeof window.chatbox != 'undefined' && typeof window.chatbox.properties != 'undefined') {
                    if (resp.l_time) {
                        window.chatbox.properties.l_time = resp.l_time;
                    }

                    if (typeof (resp.contacts) != 'undefined')  {
                        if (resp.contacts.length) {
                            $('.chatbox-users__list .empty').hide();
                        }
                        for (var i in resp.contacts) {
                            if (resp.contacts[i].html != '') {
                                // if (resp.contacts[i].count_new != 0) {
                                    if ($('li#chb_user_' + resp.contacts[i].id).length) {
                                        $('li#chb_user_' + resp.contacts[i].id).remove();
                                    }
                                    $('.chatbox-users__list ul').prepend(resp.contacts[i].html);
                                // } else {
                                //     /*$('li#chb_user_' + resp.contacts[i].id).find('.chatbox-users__new_msg').html('');*/
                                //     $('li#chb_user_' + resp.contacts[i].id).replaceWith(resp.contacts[i].html);
                                // }
                            }
                        }

                        if (window.chatbox.properties.contactId) {
                            $('#chb_user_' + window.chatbox.properties.contactId).addClass('active');
                            setTimeout(function() {
                                $('#chb_user_' + window.chatbox.properties.contactId).find('.chatbox-users__new_msg').fadeOut('slow', function() {
                                    $(this).html('');
                                });
                            }, 2000);
                        }
                        window.chatbox.initUsersActions();
                    }

                    if (window.chatbox.properties.contactId != 0 && window.chatbox.properties.contactId == resp.contact_id) {
                        if (typeof (resp.messages) != 'undefined')  {
                            window.chatbox.renderMessages(resp.messages);
                        }
                    }

                    if (resp.count_new) {
                        $('.chatbox-mobile-msg-counter').html('<span>' + resp.count_new + '</span>');
                    } else {
                        $('.chatbox-mobile-msg-counter').html('');
                    }

                    
                }

                var messboxBlock = $('#activities_chatbox_item, #activities_chatbox_item_xs, [data-id="activities_chatbox_item_xs"]');    

                if (resp.count_new) {
                    if (!messboxBlock.find('.badge').length) {
                        messboxBlock.append('<span class="badge">' + resp.count_new + '</span>');
                    } else {
                        messboxBlock.find('.badge').html(resp.count_new);
                    }
                } else {
                    messboxBlock.find('.badge').html('');
                }    

                for (var i in resp.notifications) {
                    var options = {
                        title: resp.notifications[i].title,
                        text: resp.notifications[i].text,
                        image: resp.notifications[i].user_icon,
                        image_link: resp.notifications[i].user_link,
                        sticky: false,
                        time: 15000,
                        link: resp.notifications[i].user_link,
                        more: resp.notifications[i].more
                    };
                    notifications.show(options);
                }

                if (resp.new_message_alert_html) {
                    //console.log(resp);
                   
                    //messboxBlock.find('.menu-alerts-more-items').html(resp.new_message_alert_html);

                    // if(resp.count_new > resp.max_messages_count) {
                    //     messboxBlock.find('.menu-alerts-view-all').removeClass('hide');
                    // } else {
                    //     messboxBlock.find('.menu-alerts-view-all').addClass('hide');
                    // }
                }

                $('.inbox_new_message').html(resp.count_new);
                $('.ind_inbox_new_message').html('('+resp.count_new+')');
                if (resp.count_new) {
                    $('.ind_inbox_new_message').show();
                } else {
                    $('.ind_inbox_new_message').hide();
                }
            }
        },
        period: 3,
        status: 1
    });
}
