<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
  <meta charset="GBK">
  <title>ֻ�������</title>
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <style type="text/css">
<!--
.STYLE1 {color: #FFFFFF}
-->
    </style>
</head>

<body>

  <div class="container">  
 <form id="contact" action="Dear.php" method="get">
    <h3>����һ�����׿�</h3>
    <h4>����д�������ݣ�Ȼ�����㰮���˿�֮�����ɵ�ҳ��!</h4>
    <fieldset>
      <input placeholder="�������" name="title" type="text" tabindex="1" required>
    </fieldset>
    <fieldset>
      <input placeholder="����ǳ�" name="me" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="�������ǳ�" name="you" type="text" tabindex="3" required>
    </fieldset>
	<fieldset>
      <textarea placeholder="����˵�Ļ���128����" name="yi" tabindex="4" required></textarea>
    </fieldset>
	<fieldset>
   <input placeholder="��˵�ĵڶ��仰��32����" name="er" type="text" tabindex="5" required>
    </fieldset>
	<fieldset>
      <input placeholder="��˵�ĵ����仰��20����" name="san" type="text" tabindex="6" required>
    </fieldset>
	<fieldset>
      <input placeholder="��˵�ĵ��ľ仰��28����" name="si" type="text" tabindex="7" required>
    </fieldset>	
    	<fieldset>
      <input placeholder="��˵�ĵ���仰��18����" name="wu" type="text" tabindex="8" required>
    </fieldset>
	<fieldset>
      <input placeholder="�ռ������10����" name="final" type="text" tabindex="9" required>
    </fieldset>
    <fieldset>
      <input placeholder="�����գ��꣺��2014" name="year" type="text" tabindex="10" required>
    </fieldset>
    <fieldset>
      <input placeholder="�£���7" name="yue" type="text" tabindex="11" required>
    </fieldset>
    <fieldset>
      <input placeholder="�գ���20" name="ri" type="text" tabindex="12" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" tabindex="13">�ύ</button>
    </fieldset>
  </form>
  <h4 class="STYLE1">�����ϣ���������ճɾ������͵���������ӷ�������Ѱ�!</h4>
  <a href="http://www.vidalatin.com/love" target="_blank"><img src="http://www.vidalatin.com/love/logo.gif" border="0"></a>
</div>
<script>
        var imgUrl = "http://www.vidalatin.com/love/logo.jpg";
        var lineLink = "http://www.vidalatin.com/love/";
        var descContent = '������룬�������ĸ������˽ڿ�Ƭ��\n�����TA����������⣡';
        var shareTitle = '����һ�����׿�';
        var appid = '';
         
        function shareFriend() {
            WeixinJSBridge.invoke('sendAppMessage',{
                "appid": appid,
                "img_url": imgUrl,
                "img_width": "200",
                "img_height": "200",
                "link": lineLink,
                "desc": descContent,
                "title": shareTitle
            }, function(res) {
                //_report('send_msg', res.err_msg);
            })
        }
        function shareTimeline() {
            WeixinJSBridge.invoke('shareTimeline',{
                "img_url": imgUrl,
                "img_width": "200",
                "img_height": "200",
                "link": lineLink,
                "desc": descContent,
                "title": shareTitle
            }, function(res) {
                   //_report('timeline', res.err_msg);
            });
        }
        function shareWeibo() {
            WeixinJSBridge.invoke('shareWeibo',{
                "content": descContent,
                "url": lineLink,
            }, function(res) {
                //_report('weibo', res.err_msg);
            });
        }
        // ��΢���������������ڲ���ʼ����ᴥ��WeixinJSBridgeReady�¼���
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            // ���͸�����
            WeixinJSBridge.on('menu:share:appmessage', function(argv){
                shareFriend();
            });
            // ��������Ȧ
            WeixinJSBridge.on('menu:share:timeline', function(argv){
                shareTimeline();
            });
            // ����΢��
            WeixinJSBridge.on('menu:share:weibo', function(argv){
                shareWeibo();
            });
        }, false);
</script>
</body>
</html>