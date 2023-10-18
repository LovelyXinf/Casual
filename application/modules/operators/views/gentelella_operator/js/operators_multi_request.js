var user_session_id = null;
if (typeof MultiRequest !== 'undefined') {
    MultiRequest.initAction({
        gid: 'balance',
        params: {module: 'operators', model: 'Operators_model', method: 'balance'},
        paramsFunc: function () {
            return {};
        },
        callback: function (resp) {
            if (typeof (resp.account) != 'undefined') {
                if ($('.js-curr-balance').data('account') != resp.account) {
                    const $container = $('.js-curr-balance');
                    $container.animate({
                        opacity: '0.2',
                    }, function () {
                        $container.data('account', resp.account);
                        $container.prop('data-account', resp.account);
                        $container.html(resp.account_html);
                        $container.animate({
                            opacity: '1',
                        }, function () {});
                    });
                }
            }
        },
        period: 10,
        status: 1
    });
}
