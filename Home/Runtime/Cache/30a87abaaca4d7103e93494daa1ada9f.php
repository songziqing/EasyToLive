<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>EasyToLive</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="__CSS__/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="__CSS__/bootstrap-3.3.5-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="__JS__/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="__CSS__/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
	<link rel="stylesheet" href="__CSS__/choose.css" />
	<style type="text/css">
		html,body{margin:0;padding:0;}
		.iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
		.iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".myCarousel:first").addClass("active");
		});
	</script>


</head>
<body>
	<!--导航-->
	<div class="header">
		<div class="container" >
			<div class="row" >
				<div class="col-xs-12 col-sm-6 col-md-8" id="font-1" >EsayToLive.pub</div>
				<div class="col-xs-6 col-md-4">
					<form action="__URL__/option" method="POST">
						<input name="school_name" class="form-control input-lg " type="text" placeholder="<?php echo ($school_name); ?>" />
					</form>
				</div>
			</div>
			<!--宾馆轮播，地图-->
			<div class="row" id="con-1">
				<!--宾馆-->
				<div class="col-xs-12 col-md-6">              
					<div class="content">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<?php if(is_array($publicRoomImages)): $i = 0; $__LIST__ = $publicRoomImages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item myCarousel">
										<div class="pic">
											<img style="width:550px;height:275px;" src="__IMAGE__/<?php echo ($vo["image_src"]); ?>" alt="...">
										</div>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div> 
					<div class="font-0"><?php echo ($hotel_desc); ?></div>                      
				</div>
				<!--地图-->     
				<div class="col-xs-12 col-md-6">
					<div class="row">
						<div class="col-xs-12 col-md-9">
							<div class="pic-2">
								<div style="width:425px;height:297px;border:#ccc solid 1px;" id="dituContent"></div>
							</div>
						</div>
						<div class="col-xs-10 col-md-3" id="font6">
							<?php if(is_array($hotels)): $i = 0; $__LIST__ = $hotels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row">
									<a href="__URL__/option/hotel_id/<?php echo ($vo["hotel_id"]); ?>/school_name/<?php echo ($school_name); ?>" class="col-md-12 text-center" id="font-4"><?php echo ($vo["hotel_name"]); ?></a>
								</div> 
								<hr style="background-color:#777; height:1px;" /><?php endforeach; endif; else: echo "" ;endif; ?>
							
							<div class="row">
								<div class="dropdown text-center">
									<a href="##" class="dropdown-toggle" id="fon-1" data-toggle="dropdown">更多	<span class="caret"></span></a>
									<ul class="dropdown-menu"> 
										<?php if(is_array($moreHotels)): $i = 0; $__LIST__ = $moreHotels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="__URL__/option/hotel_id/<?php echo ($vo["hotel_id"]); ?>"><?php echo ($vo["hotel_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<!--主体内容-->
			<div class="row" id="con-2">
				<!-- 遍历循环出宾馆所有房间的第一张图片 -->
				<?php if(is_array($rooms)): $i = 0; $__LIST__ = $rooms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-md-2">
						<a href="__URL__/book/room_id/<?php echo ($vo["room_id"]); ?>" class="thumbnail" >
							<img class="img-1" style="width:166px;height:100px;" src="__IMAGE__/<?php echo (roomimage($vo["room_id"])); ?>">
							<p  class="di-1">
								<span><?php echo ($vo["room_name"]); ?></span>
								<span class="glyphicon glyphicon-jpy " id="di"><?php echo ($vo["room_price"]); ?></span>
							</p>
						</a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>

		<!-- 页脚信息部分 -->
		<div class="row " id="bg">
			<div class="col-xs-12 col-md-2 ">
				<a href="##">宾馆合作</a>
			</div> 
			<div class="col-xs-12 col-md-2 ">
				<a href="##">请收录我们学校</a>
			</div> 
			<div class="col-xs-12 col-md-3 ">
				<a href="##">用户反馈&交流：QQ 2449953617</a>
			</div> 
			<div class="col-xs-12 col-md-2 ">
				<a href="##">京ICP备1108151号</a>
			</div> 
			<div class="col-xs-12 col-md-1 ">
				<a href="##">About</a>
			</div> 
			<div class="col-xs-12 col-md-2">
				<a href="##">隐私条款</a>
			</div> 
		</div>
	</div>
</div>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }

    //创建地图函数：
    //河南科技学院
    $x = <?php echo ($mapx); ?>;
    $y = <?php echo ($mapy); ?>;
    
    //新乡医学院
    // $x = 113.94052;
    // $y = 35.297299;
    
    //新乡学院
    // $x = 113.948087;
    // $y = 35.297579;
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        //var point = new BMap.Point(113.946889,35.285765);//定义一个中心点坐标
        var point = new BMap.Point($x,$y);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_SMALL});
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:0});
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_TOP_LEFT});
        map.addControl(ctrl_sca);
    }
    
	initMap();//创建和初始化地图
</script>
</body>
</html>