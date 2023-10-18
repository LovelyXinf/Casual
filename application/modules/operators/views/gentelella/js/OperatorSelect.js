function operatorSelect(optionArr) {
    this.properties = {
        siteUrl: '',
        urls: {
            getForm: 'admin/operators/ajax_get_operators_form/',
            getUsersData: 'admin/operators/ajax_get_operators_data/',
            getSelectedUsers: 'admin/operators/ajax_get_selected_operators/',
        },
        elementsDOM: {
            mainId: 'user_select',
            spanId: 'user_text',
            manageLinkId: 'user_link',
            itemsId: 'user_select_items',
            selectedItemsId: 'user_selected_items',
            searchId: 'user_search',
            userPageId: 'user_page',
            closeId: 'user_close_link',
        },
        varName: '',
        max: '',
        rand: '',
        selectedItems: [],
        checkboxClass: '',
        reloadSelectedCallback: function () {},
        contentObj: null,
    };

    var _self = this;

    this.Init = function (options) {
        _self.properties = $.extend(_self.properties, options);
        _self.properties.max = parseInt(_self.properties.max);

        if (!_self.properties.contentObj) {
            _self.properties.contentObj = new loadingContent({loadBlockWidth: '680px', closeBtnPadding: 15});
        }

        $('#' + _self.properties.elementsDOM.manageLinkId).off('click').click(function (e) {
            e.preventDefault();
            _self.openForm();
            return false;
        });

        return this;
    };

    this.openForm = function () {
        var url = _self.properties.siteUrl + _self.properties.urls.getForm + _self.properties.max;

        $.ajax({
            url: url,
            type: 'POST',
            data: {selected: _self.properties.selectedItems, rand: _self.properties.rand},
            cache: false,
            success: function (resp) {
                _self.properties.contentObj.show_load_block(resp);
                _self.loadUsers('', 1);
                $('#' + _self.properties.elementsDOM.searchId).off('keyup').keyup(function () {
                    _self.loadUsers($(this).val(), 1);
                });

                if (_self.properties.max != 1) {
                    $('#' + _self.properties.elementsDOM.selectedItemsId + ' input:checkbox').off('click').click(function () {
                        _self.unsetUser($(this).val());
                    });
                }

                $('#' + _self.properties.elementsDOM.closeId).off('click').click(function (e) {
                    e.preventDefault();
                    _self.properties.contentObj.hide_load_block();
                    return false;
                });
            }
        });

        return this;
    };

    this.loadUsers = function (search, page) {
        let postData = {selected: _self.properties.selectedItems};
        if (search != '')
        postData.search = search;
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getUsersData + page,
            dataType: 'json',
            type: 'POST',
            data: postData,
            cache: false,
            success: function (resp) {
                $('#' + _self.properties.elementsDOM.itemsId + ' option').off();
                $('#' + _self.properties.elementsDOM.itemsId).empty();
                for (let id in resp.items) {
                    const item = resp.items[id];
                    let elem = '<li index="' + item.id + '"';
                    if (in_array(item.id, _self.properties.selectedItems)) {
                        elem += 'class="hide"';
                    }
                    elem += '>' + item.nickname + '(' + item.name + ')</li>';
                    $('#' + _self.properties.elementsDOM.itemsId).append(elem);
                }
                _self.generateUserPages(resp.pages, resp.current_page, search);
                $('#' + _self.properties.elementsDOM.itemsId + ' li').off('click').click(function () {
                    _self.setUser($(this).attr('index'));
                });
            }
        });

        return this;
    };

    var printPages = function (from, to, current) {
        current = parseInt(current);
        for (let i = from; i <= to; i++) {
            if (i === current) {
                $('#' + _self.properties.elementsDOM.userPageId).append('<ins class="fleft current"><mark>' + i + '</mark></ins>');
            } else {
                $('#' + _self.properties.elementsDOM.userPageId).append('<ins class="fleft"><a href="#">' + i + '</a></ins>');
            }
        }

        return this;
    };

    this.generateUserPages = function (pages, current_page, search) {
        $('#' + _self.properties.elementsDOM.userPageId + ' a').off();
        $('#' + _self.properties.elementsDOM.userPageId).empty();
        let max_pages = 12;
        if (pages > 1) {
            let range = max_pages / 2;
            let bound = pages - max_pages;
            let from = current_page > range ? current_page - range : 1;
            if (from > bound) {
                from = bound;
            }
            if (current_page > range + 1) {
                $('#' + _self.properties.elementsDOM.userPageId).append('<ins class="fleft"><a href="#">1</a></ins>');
                $('#' + _self.properties.elementsDOM.userPageId).append('<ins class="fleft">...</ins>');
            }
            printPages(1, pages, current_page);
            if (current_page < pages - range) {
                $('#' + _self.properties.elementsDOM.userPageId).append('<ins class="fleft">...</ins>');
                $('#' + _self.properties.elementsDOM.userPageId).append('<ins class="fleft"><a href="#">' + pages + '</a></ins>');
            }
            $('#' + _self.properties.elementsDOM.userPageId + ' a').off('click').click(function () {
                _self.loadUsers(search, $(this).text());
                return false;
            });
        }

        return this;
    };

    this.setUser = function (id) {
        let in_selected = false;
        let i = 0;
        for (i in _self.properties.selectedItems) {
            if (_self.properties.selectedItems[i] == id) {
                in_selected = true;
            }
        }

        if (_self.properties.max > 1 && _self.properties.selectedItems.length >= _self.properties.max) {
            _self.properties.selectedItems = _self.properties.selectedItems.splice(0, _self.properties.max);
            _self.loadSelected();
            return;
        }
        if (_self.properties.max == 1 && _self.properties.selectedItems.length > 0) {
            _self.properties.selectedItems = [];
        }

        if (!in_selected) {
            i = parseInt(i) + 1;
            if (!_self.properties.selectedItems.length)
                i = 0;
            _self.properties.selectedItems[i] = id;
            if (_self.properties.max == 1) {
                _self.properties.contentObj.hide_load_block();
            } else {
                _self.hideOption(id);
            }
            _self.loadSelected();
        }

        return this;
    };

    this.loadSelected = function () {
        $.ajax({
            url: _self.properties.siteUrl + _self.properties.urls.getSelectedUsers,
            dataType: 'json',
            type: 'POST',
            data: {selected: _self.properties.selectedItems},
            cache: false,
            success: function (resp) {
                _self.reloadSpan(resp.selected);
                if (_self.properties.max != 1) {
                    _self.reloadSelected(resp.selected);
                }
            }
        });

        return this;
    };

    this.unsetUser = function (id) {
        let in_selected = false;
        for (let i in _self.properties.selectedItems) {
            if (_self.properties.selectedItems[i] == id) {
                in_selected = true;
                _self.properties.selectedItems.splice(i, 1);
            }
        }

        if (in_selected) {
            $.ajax({
                url: _self.properties.siteUrl + _self.properties.urls.getSelectedUsers,
                dataType: 'json',
                type: 'POST',
                data: {selected: _self.properties.selectedItems},
                cache: false,
                success: function (resp) {
                    _self.reloadSpan(resp.selected);
                    if (_self.properties.max != 1) {
                        _self.reloadSelected(resp.selected);
                    }
                    _self.showOption(id);
                }
            });
        }

        return this;
    };

    this.hideOption = function (id) {
        $('#' + _self.properties.elementsDOM.itemsId + ' li[index=' + id + ']').addClass('hide');
        return this;
    };

    this.showOption = function (id) {
        $('#' + _self.properties.elementsDOM.itemsId + ' li[index=' + id + ']').removeClass('hide');
        return this;
    };

    this.reloadSpan = function (data) {
        $('#' + _self.properties.elementsDOM.spanId).empty();
        for (let i in data) {
            const item = data[i];
            if (_self.properties.max != 1) {
                $('#' + _self.properties.elementsDOM.spanId).append(item.nickname + '(' + item.name + ')<br><input type="hidden" name="' + _self.properties.varName + '[]" value="' + item.id + '">');
            } else {
                $('#' + _self.properties.elementsDOM.spanId).append(item.nickname + '(' + item.name + ')<input type="hidden" name="' + _self.properties.varName + '" value="' + item.id + '">');
            }
        }

        return this;
    };

    this.reloadSelected = function (data) {
        $('#' + _self.properties.elementsDOM.selectedItemsId).empty();
        for (let i in data) {
            const item = data[i];
            $('#' + _self.properties.elementsDOM.selectedItemsId).append('<li><div class="user-block"><input type="checkbox" name="remove_users[]" value="' + item.id + '" class="' + _self.properties.checkboxClass + '" checked> ' + item.nickname + '</div></li>');
        }
        $('#' + _self.properties.elementsDOM.selectedItemsId + ' input:checkbox').off('click').click(function () {
            _self.unsetUser($(this).val());
        });
        _self.properties.reloadSelectedCallback();

        return this;
    };

    _self.Init(optionArr);

}