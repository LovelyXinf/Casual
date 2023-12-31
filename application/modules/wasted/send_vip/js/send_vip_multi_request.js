if (typeof MultiRequest !== 'undefined') {
    MultiRequest.initAction({
        gid: 'send_vip_request',
        params: {module: 'send_vip', model: 'Send_vip_model', method: 'get_request_vip'},
        paramsFunc: function () {
            return {};
        },
        callback: function (resp) {
            if (resp) {
                for (var i in resp.notifications) {
                     var options = {
                        title: resp.notifications[i].title,
                        text: resp.notifications[i].text,
                        image: resp.notifications[i].user_icon,
                        image_link: resp.notifications[i].link,
                        useGritter: true,
                        sticky: true,
                        time: 15000,
                        link: resp.notifications[i].link,
                        more: resp.notifications[i].more
                    };
                    notifications.show(options);
                }
            }
        },
        period: 300,
        status: 1
    });
}
