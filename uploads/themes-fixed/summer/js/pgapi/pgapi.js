var PgApi = (function (siteUrl) {
    var token = '';
    
    var self = this;
    
    this.siteUrl = siteUrl;
    
    this.requests = [];
    
    this.tokenRefreshTimeout = 0;
    
    this.isLS = false;
    
    this.init = function() {
        self.isLS = ('localStorage' in window && window['localStorage'] !== null);
        self.token = self.getOption('token', true) || '';
    }
    
    this.request = function(url, data, callback) {
        self.requests.push({url: url, data: data, callback: callback});
        if (!self.token) {
            self.refreshToken();
        }else {
            self.queue();
        }
    }
    
    this.queue = function() {
        while (self.requests.length > 0) {
            var request = self.requests.splice(0, 1)[0];
            request.data.token = self.token;
            self.query(request.url, request.data, request.callback);
        }
    }
    
    this.query = function(url, data, callback) {
        $.ajax({
            url: self.siteUrl + url, 
            data: data, 
            method: 'post',
            dataType: 'json',
            success: function(data) {
                callback(data.data);
            },
            error: function(data) {
                self.refreshToken();
            }
        });
    }
    
    this.getToken = function(callback) {
        $.getJSON(self.siteUrl + 'api/get_token', {}, function(data){
            self.setOption('token', data.data.token, true);
            callback(data.data.token);
        });
    }
    
    this.refreshToken = function() {
        if (self.tokenRefreshTimeout) {
            return false;
        }
        
        self.tokenRefreshTimeout = 1;
        
        self.getToken(function(token){
            self.token = token;
            self.queue();
        });
    }

    this.getUsers = function(callback) {
        self.request('api/users/get_users_data', {}, function(data){
            var users = [];
			for (var i in data.items) {
				users.push(data.items[i]);
			}
            callback(users);
        });
    } 
	
	this.getNews = function(callback) {
        self.request('api/news/news_list', {}, function(data){
            var news = [];
			var count = 0;
            for (var i in data.news) {
				if (count >= 3) {
					break;
				}
                news.push(data.news[count]);
				count++;
            }
            callback(news);
        });
    }
    
    this.getOption = function(key, isCompressed) {
		if (!key) return;

        isCompressed = isCompressed || false;

		var value;
	
		if(self.isLS){
			value = localStorage[key];
		}else{
			value = self.getCookie(key);
			if (isCompressed) {
				value = LZString.decompress(value);
			}
		}

		if (typeof(value) !== 'string') {
            return null;
        }

		try{
            return JSON.parse(value);
        }catch(e){
            return value;
        }
	};
    
    this.setOption = function(key, value, needCompress) {
        if (!key) return;
        
        needCompress = needCompress || false;
        
        if (typeof value === 'object') {
			for (var i in value) {
				if (!value.hasOwnProperty(i)) {
					delete value[i];
				}
			}
			value = JSON.stringify(storage);
		} else {
			value = value.toString();
		}

		if (typeof value !== 'undefined') {
			if (self.isLS) {
				localStorage[key] = value;
            }else{
				if (needCompress) {
					value = LZString.compress(value);
				}
				self.setCookie(key, value);
			}
		}
	};
    
    this.getCookie = function(name) {
        var cookie = " " + document.cookie;
        var search = " " + name + "=";
        var setStr = null;
        var offset = 0;
        var end = 0;
        if (cookie.length > 0) {
            offset = cookie.indexOf(search);
            if (offset != -1) {
                offset += search.length;
                end = cookie.indexOf(";", offset)
                if (end == -1) {
                    end = cookie.length;
                }
                setStr = unescape(cookie.substring(offset, end));
            }
        }
        return(setStr);
    }
    
    this.setCookie = function(name, value, expires, path, domain, secure) {
        document.cookie = name + "=" + escape(value) +
            ((expires) ? "; expires=" + expires : "") +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
    }
    
    self.init();
    
    return self;
})(siteUrl || '');

window.pgapi = PgApi;
