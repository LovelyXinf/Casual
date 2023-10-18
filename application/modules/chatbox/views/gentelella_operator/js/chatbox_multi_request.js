if (typeof MultiRequest !== 'undefined') {
    MultiRequest.initAction({
        gid: 'chatbox',
        params: {module: 'chatbox', model: 'Chatbox_operator_model', method: 'checkNewMessages'},
        paramsFunc: function () {
            if (!$('#chatbox').length) {
                return {
                    no_chat_page: 1
                };
            }
            if (typeof window.chatbox != 'undefined' && typeof window.chatbox.properties != 'undefined') {
                return {
                    user_id: window.chatbox.properties.userId,
                    contact_id: window.chatbox.properties.contactId,
                    l_time: window.chatbox.properties.lTime
                };
            }
            return {};
        },
        callback: function (resp) {
            if (resp) {
                if (typeof (resp.logout) != 'undefined') {
                    locationHref(site_url + 'operator/start', 'hard');
                }

                if (typeof window.chatbox != 'undefined' && typeof window.chatbox.properties != 'undefined') {
                    window.chatbox.backendAction(resp);
                }
            }
        },
        period: 5,
        status: 1
    });
}
