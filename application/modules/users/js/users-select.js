function usersSelect(optionArr) {
    this.properties = {
        siteUrl: '',
        rand: '',
        load_user_link: 'users/ajax_get_users_data/',
        load_form: 'users/ajax_get_users_form/',
        load_selected_data_link: 'users/ajax_get_selected_users',
        id_main: '',
        id_span: '',
        id_manage_link: '',
        id_items: 'user_select_items',
        id_selected_items: 'user_selected_items',
        id_search: 'user_search',
        id_user_page: 'user_page',
        id_close: 'user_close_link',
        user_type: 0,
        var_name: '',
        max: '',
        selected_items: [],
        checkboxClass: '',
        reloadSelectedCallback: function () {},
        contentObj: null,
    };

    var _self = this;

    this.errors = {
    };

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
        _self.properties.id_main = 'user_select_' + _self.properties.rand;
        _self.properties.id_span = 'user_text_' + _self.properties.rand;
        _self.properties.id_manage_link = 'user_link_' + _self.properties.rand;
        _self.properties.max = parseInt(_self.properties.max);

        if (!_self.properties.contentObj) {
            _self.properties.contentObj = new loadingContent({loadBlockWidth: '680px', closeBtnPadding: 15});
        }

        $('#' + _self.properties.id_manage_link).bind('click', function () {
            _self.open_form();
            return false;
        });
    };

    this.open_form = function () {
        var url = _self.properties.siteUrl + _self.properties.load_form + _self.properties.max;

        $.ajax({
            url: url,
            type: 'POST',
            data: {selected: _self.properties.selected_items},
            cache: false,
            success: function (data) {
                _self.properties.contentObj.show_load_block(data);
                _self.load_users('', 1);
                $('#' + _self.properties.id_search).unbind().bind('keyup', function () {
                    _self.load_users($(this).val(), 1);
                });

                if (_self.properties.max != 1) {
                    $('#' + _self.properties.id_selected_items + ' input:checkbox').bind('click', function () {
                        _self.unset_user($(this).val());
                    });
                }

                $('#' + _self.properties.id_close).bind('click', function () {
                    _self.properties.contentObj.hide_load_block();
                    return false;
                });
            }
        });
    };

    this.load_users = function (search, page) {
        var send_data = {selected: _self.properties.selected_items, user_type: _self.properties.user_type};
        if (search != '')
            send_data.search = search;
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.load_user_link + page,
            dataType: 'json',
            type: 'POST',
            data: send_data,
            cache: false,
            success: function (data) {
                $('#' + _self.properties.id_items + ' option').unbind();
                $('#' + _self.properties.id_items).empty();
                for (var id in data.items) {
                    var elem = '<li index="' + data.items[id].id + '"';
                    if (in_array(data.items[id].id, _self.properties.selected_items)) {
                        elem += 'class="hide"';
                    }
                    elem += '>' + data.items[id].nickname + '(' + data.items[id].output_name + ')</li>';
                    $('#' + _self.properties.id_items).append(elem);
                }
                _self.generate_user_pages(data.pages, data.current_page, search);
                $('#' + _self.properties.id_items + ' li').bind('click', function () {
                    _self.set_user($(this).attr('index'));
                });
            }
        });
    };

    var print_pages = function (from, to, current) {
        current = parseInt(current);
        for (var i = from; i <= to; i++) {
            if (i === current) {
                $('#' + _self.properties.id_user_page).append('<ins class="fleft current"><mark>' + i + '</mark></ins>');
            } else {
                $('#' + _self.properties.id_user_page).append('<ins class="fleft"><a href="#">' + i + '</a></ins>');
            }
        }
    };

    this.generate_user_pages = function (pages, current_page, search) {
        $('#' + _self.properties.id_user_page + ' a').unbind();
        $('#' + _self.properties.id_user_page).empty();
        var max_pages = 12;
        if (pages > 1) {
            var range = max_pages / 2;
            var bound = pages - max_pages;
            var from = current_page > range ? current_page - range : 1;
            if (from > bound) {
                from = bound;
            }
            if (current_page > range + 1) {
                $('#' + _self.properties.id_user_page).append('<ins class="fleft"><a href="#">1</a></ins>');
                $('#' + _self.properties.id_user_page).append('<ins class="fleft">...</ins>');
            }
            print_pages(1, pages, current_page);
            if (current_page < pages - range) {
                $('#' + _self.properties.id_user_page).append('<ins class="fleft">...</ins>');
                $('#' + _self.properties.id_user_page).append('<ins class="fleft"><a href="#">' + pages + '</a></ins>');
            }
            $('#' + _self.properties.id_user_page + ' a').bind('click', function () {
                _self.load_users(search, $(this).text());
                return false;
            });
        }
    };

    this.set_user = function (id) {

        var in_selected = false;
        var i = 0;
        for (i in _self.properties.selected_items) {
            if (_self.properties.selected_items[i] == id) {
                in_selected = true;
            }
        }

        if (_self.properties.max > 1 && _self.properties.selected_items.length >= _self.properties.max) {
            _self.properties.selected_items = _self.properties.selected_items.splice(0, _self.properties.max);
            _self.load_selected();
            return;
        }
        if (_self.properties.max == 1 && _self.properties.selected_items.length > 0) {
            _self.properties.selected_items = [];
        }

        if (!in_selected) {
            i = parseInt(i) + 1;
            if (!_self.properties.selected_items.length)
                i = 0;
            _self.properties.selected_items[i] = id;
            if (_self.properties.max == 1) {
                _self.properties.contentObj.hide_load_block();
            } else {
                _self.hide_option(id);
            }
            _self.load_selected();
        }
    };

    this.load_selected = function () {
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.load_selected_data_link,
            dataType: 'json',
            type: 'POST',
            data: {selected: _self.properties.selected_items},
            cache: false,
            success: function (data) {
                _self.reload_span(data.selected);
                if (_self.properties.max != 1) {
                    _self.reload_selected(data.selected);
                }
            }
        });
    };

    this.unset_user = function (id) {
        var in_selected = false;
        for (var i in _self.properties.selected_items) {
            if (_self.properties.selected_items[i] == id) {
                in_selected = true;
                _self.properties.selected_items.splice(i, 1);
            }
        }

        if (in_selected) {
            $.ajax({
                url: _self.properties.siteUrl + _self.properties.load_selected_data_link,
                dataType: 'json',
                type: 'POST',
                data: {selected: _self.properties.selected_items},
                cache: false,
                success: function (data) {
                    _self.reload_span(data.selected);
                    if (_self.properties.max != 1) {
                        _self.reload_selected(data.selected);
                    }
                    _self.show_option(id);
//					_self.load_users(search, page);
                }
            });
        }
    };

    this.hide_option = function (id) {
        $('#' + _self.properties.id_items + ' li[index=' + id + ']').addClass('hide');
    };

    this.show_option = function (id) {
        $('#' + _self.properties.id_items + ' li[index=' + id + ']').removeClass('hide');
    };

    this.reload_span = function (data) {
        $('#' + _self.properties.id_span).empty();
        for (var i in data) {
            if (_self.properties.max != 1) {
                $('#' + _self.properties.id_span).append(data[i].nickname + '(' + data[i].output_name + ')<br><input type="hidden" name="' + _self.properties.var_name + '[]" value="' + data[i].id + '">');
            } else {
                $('#' + _self.properties.id_span).append(data[i].nickname + '(' + data[i].output_name + ')<input type="hidden" name="' + _self.properties.var_name + '" value="' + data[i].id + '">');
            }
        }
    };

    this.reload_selected = function (data) {
        $('#' + _self.properties.id_selected_items).empty();
        for (var i in data) {
            $('#' + _self.properties.id_selected_items).append('<li><div class="user-block"><input type="checkbox" name="remove_users[]" value="' + data[i].id + '" class="' + _self.properties.checkboxClass + '" checked> ' + data[i].nickname + '</div></li>');
        }
        $('#' + _self.properties.id_selected_items + ' input:checkbox').bind('click', function () {
            _self.unset_user($(this).val());
        });
        _self.properties.reloadSelectedCallback();
    };

    _self.Init(optionArr);

}
