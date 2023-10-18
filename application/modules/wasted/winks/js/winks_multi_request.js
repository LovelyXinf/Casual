if (typeof MultiRequest !== 'undefined') {
    MultiRequest.initAction({
        gid: 'winks',
        params: {module: 'winks', model: 'Winks_model', method: 'winks_count'},
        paramsFunc: function () {
            return {};
        },
        callback: function (resp) {
            if (resp.count) {
                $('.winks_count').html(resp.count);
            } else {
                $('.winks_count').html('');
            }
        },
        period: 300,
        status: 0
    });

    if (id_user) {
        MultiRequest.enableAction('winks');
    }
    $(document).on('users:login', function () {
        MultiRequest.enableAction('winks');
    }).on('users:logout, session:guest', function () {
        MultiRequest.disableAction('winks');
    });
}
