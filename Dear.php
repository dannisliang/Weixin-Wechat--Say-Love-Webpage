<?php
@header('Content-type: text/html;charset=GBK');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title><?php echo $_GET["title"]; ?></title>
<link type="text/css" rel="stylesheet" href="source/default.css">
			<script type="text/javascript" src="source/jquery.min.js"></script>
		<script type="text/javascript" src="source/jscex.min.js"></script>
		<script type="text/javascript" src="source/jscex-parser.js"></script>
		<script type="text/javascript" src="source/jscex-jit.js"></script>
		<script type="text/javascript" src="source/jscex-builderbase.min.js"></script>
		<script type="text/javascript" src="source/jscex-async.min.js"></script>
		<script type="text/javascript" src="source/jscex-async-powerpack.min.js"></script>
		<script type="text/javascript" src="source/functions.js" charset="utf-8"></script>
		<script type="text/javascript" src="source/init.js" charset="utf-8"></script>
		<script type="text/javascript" src="source/love.js" charset="utf-8"></script>
<style type="text/css">
<!--
.STYLE1 {color: #666666}
-->
</style>
</head>
  <body wx-icon="http://www.vidalatin.com/love/logo.jpg" wx-title="<?php echo $_GET["me"];?>����������һ�����˽ڿ�ƬӴ��" wx-desc="�װ���<?php echo $_GET["you"]; ?>��\n��򿪿�Ƭ������ TA ������ɣ�" wx-link="<?php echo "http://".$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" >
	<audio autoplay="autopaly">
					<source src="Love-Music.mp3" type="audio/mp3" />
			</audio>  	 
        <div id="main">
            <div id="error">��ҳ�����HTML5�༭��Ŀǰ����������޷���ʾ���뻻�ɹȸ�(<a href="http://rj.baidu.com/soft/detail/14744.html">Chrome</a>)���߻��(<a href="http://rj.baidu.com/soft/detail/11843.html">Firefox</a>)��������������������������°汾��</div>
             <div id="wrap">
                <div id="text">
			        <div id="code">
			    <font color="#FF0000">
			    <span class="say">�װ���<?php echo $_GET["you"]; ?></span><br/>
			    <br/>
				  <span class="say"><?php echo $_GET["yi"]; ?></span><br/>
					<span class="say"><?php echo $_GET["er"]; ?></span><br/>
					<span class="say"> </span><br/>
			    <span class="say"><?php echo $_GET["san"]; ?></span><br/>
					<span class="say"><?php echo $_GET["si"]; ?></span><br/>
					<span class="say"><?php echo $_GET["wu"]; ?></span><br/>
					<span class="say"> </span><br/>
 					<span class="say">�������������˵������</span><br/>
					<span class="say"></span><br/>
          <span class="say"><span class="space"></span><?php echo $_GET["final"]; ?></span><br/>
          <span class="say"></span><br/>
					<span class="say">���� <?php echo $_GET["me"]; ?></span>
			  </font></p>
      </div>
                </div>
                <div id="clock-box">
                    <span class="STYLE1"></span><font color="#33CC00">�������������Ѿ�</font>
<span class="STYLE1"> ĬĬ�߹���</span>
                  <div id="clock"></div>
              </div>
                <canvas id="canvas" width="1100" height="680"></canvas>
            </div>
            
        </div>

    <script>
    (function(){
        var canvas = $('#canvas');
		
        if (!canvas[0].getContext) {
            $("#error").show();
            return false;        }

        var width = canvas.width();
        var height = canvas.height();        
        canvas.attr("width", width);
        canvas.attr("height", height);
        var opts = {
            seed: {
                x: width / 2 - 20,
                color: "rgb(190, 26, 37)",
                scale: 2
            },
            branch: [
                [535, 680, 570, 250, 500, 200, 30, 100, [
                    [540, 500, 455, 417, 340, 400, 13, 100, [
                        [450, 435, 434, 430, 394, 395, 2, 40]
                    ]],
                    [550, 445, 600, 356, 680, 345, 12, 100, [
                        [578, 400, 648, 409, 661, 426, 3, 80]
                    ]],
                    [539, 281, 537, 248, 534, 217, 3, 40],
                    [546, 397, 413, 247, 328, 244, 9, 80, [
                        [427, 286, 383, 253, 371, 205, 2, 40],
                        [498, 345, 435, 315, 395, 330, 4, 60]
                    ]],
                    [546, 357, 608, 252, 678, 221, 6, 100, [
                        [590, 293, 646, 277, 648, 271, 2, 80]
                    ]]
                ]] 
            ],
            bloom: {
                num: 700,
                width: 1080,
                height: 650,
            },
            footer: {
                width: 1200,
                height: 5,
                speed: 10,
            }
        }

        var tree = new Tree(canvas[0], width, height, opts);
        var seed = tree.seed;
        var foot = tree.footer;
        var hold = 1;

        canvas.click(function(e) {
            var offset = canvas.offset(), x, y;
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            if (seed.hover(x, y)) {
                hold = 0; 
                canvas.unbind("click");
                canvas.unbind("mousemove");
                canvas.removeClass('hand');
            }
        }).mousemove(function(e){
            var offset = canvas.offset(), x, y;
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            canvas.toggleClass('hand', seed.hover(x, y));
        });

        var seedAnimate = eval(Jscex.compile("async", function () {
            seed.draw();
            while (hold) {
                $await(Jscex.Async.sleep(10));
            }
            while (seed.canScale()) {
                seed.scale(0.95);
                $await(Jscex.Async.sleep(10));
            }
            while (seed.canMove()) {
                seed.move(0, 2);
                foot.draw();
                $await(Jscex.Async.sleep(10));
            }
        }));

        var growAnimate = eval(Jscex.compile("async", function () {
            do {
    	        tree.grow();
                $await(Jscex.Async.sleep(10));
            } while (tree.canGrow());
        }));

        var flowAnimate = eval(Jscex.compile("async", function () {
            do {
    	        tree.flower(2);
                $await(Jscex.Async.sleep(10));
            } while (tree.canFlower());
        }));

        var moveAnimate = eval(Jscex.compile("async", function () {
            tree.snapshot("p1", 240, 0, 610, 680);
            while (tree.move("p1", 500, 0)) {
                foot.draw();
                $await(Jscex.Async.sleep(10));
            }
            foot.draw();
            tree.snapshot("p2", 500, 0, 610, 680);

            // ������˸������������, (���n��)
            canvas.parent().css("background", "url(" + tree.toDataURL('image/png') + ")");
            canvas.css("background", "#ffe");
            $await(Jscex.Async.sleep(300));
            canvas.css("background", "none");
        }));

        var jumpAnimate = eval(Jscex.compile("async", function () {
            var ctx = tree.ctx;
            while (true) {
                tree.ctx.clearRect(0, 0, width, height);
                tree.jump();
                foot.draw();
                $await(Jscex.Async.sleep(25));
            }
        }));

        var textAnimate = eval(Jscex.compile("async", function () {
		    var together = new Date();
		    together.setFullYear(<?php echo $_GET["year"]; ?>,<?php echo $_GET["yue"]; ?>-1,<?php echo $_GET["ri"]; ?>); 			//ʱ��������
		    together.setHours(0);						//Сʱ	
		    together.setMinutes(53);					//����
		    together.setSeconds(0);					//��ǰһλ
		    together.setMilliseconds(2);				//��ڶ�λ

		    $("#code").show().typewriter();
            $("#clock-box").fadeIn(500);
            while (true) {
                timeElapse(together);
                $await(Jscex.Async.sleep(1000));
            }
        }));

        var runAsync = eval(Jscex.compile("async", function () {
            $await(seedAnimate());
            $await(growAnimate());
            $await(flowAnimate());
            $await(moveAnimate());

            textAnimate().start();

            $await(jumpAnimate());
        }));

        runAsync().start();
        
        
    })();

</script>
</body>
</html>