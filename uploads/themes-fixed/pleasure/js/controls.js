window.onload = function() {
	$('#current_language').on('click', function(event) {
		event.stopPropagation();
        event.preventDefault();

		if($('#lang-block').width() == 0) {
			$('#lang-block').animate({
				width: "+=275"
			}, 200, function() {
				
			});
		}
		
	}); 
	$('body').on('click', function(){

		if($('#lang-block').width() > 0)
		{
			$('#lang-block').animate({
				width: "0"
			}, 200, function() {
				
			});
		}
		
	}); 
}

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return 1;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

