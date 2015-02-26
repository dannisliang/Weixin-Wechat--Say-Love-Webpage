(function () {
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
	});
    var onBridgeReady = function () {
        $(document).trigger('bridgeready');        
        if (!setForward()) {
            $(document).bind('invitationchanged', function () {
                setForward();
            });
        }
    };
    if (document.addEventListener) {
        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    } else if (document.attachEvent) {
        document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }

    function setForward() {
        var $body = $('body'),
            title = $body.attr('wx-title'),
            imgUrl = $body.attr('wx-icon'),
            link = $body.attr('wx-link'),
            desc = $body.attr('wx-desc') || link;	
		
        if (title && link) {
            WeixinJSBridge.on('menu:share:appmessage', function (argv) {
                WeixinJSBridge.invoke('sendAppMessage', {                    
                    'img_url': imgUrl,
                    'link': link,
                    'desc': desc,
                    'title': title
                }, function (res) {
                    if (res && res['err_msg'] && res['err_msg'].indexOf('confirm') > -1) {
                        $(document).trigger('wx_sendmessage_confirm');
                    }
                });
            });
            WeixinJSBridge.on('menu:share:timeline', function (argv) {
                $(document).trigger('wx_timeline_before');
                WeixinJSBridge.invoke('shareTimeline', {
                    'img_url': imgUrl,
                    'link': link,
                    'desc': desc,
                    'title': title
                }, function (res) {
                    
                });
            });           
            return true;
        }
        else {
            return false;
        }
    }

	})();