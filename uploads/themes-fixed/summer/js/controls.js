window.onload = function() {
	// Video
	var video = document.getElementById("bgvid");
	// Buttons
	var playButton = document.getElementById("play-pause");
  
	// Event listener for the play/pause button
	playButton.addEventListener("click", function() {
		if (video.paused == true) {
			video.play();
			playButton.classList.remove("icon-play");
			playButton.classList.add("icon-pause");
		} else {
			video.pause();
			playButton.classList.remove("icon-pause");
			playButton.classList.add("icon-play");			
		}
	}); 

	$('#current_language').click(function() { 
		if($('#lang-block').width() == 0) {
			$('#lang-block').animate({
				width: "+=275"
			}, 200, function() {
				
			});
		}
	}); 
	$('body').click(function(){
		if($('#lang-block').width() > 0)
		{
			$('#lang-block').animate({
				width: "0"
			}, 200, function() {
				
			});
		}
	}); 
    
    var ratio = 1920/1080;
    var wnd = $(window);
    var w = wnd.width();
    var h = wnd.height(); 
    if ((w/h) > ratio) {
        document.body.style.maxHeigth = '100%';
    } else {
        document.body.style.maxWidth = '100%';
    }
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

