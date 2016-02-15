<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>无标题文档</title>
	<link rel="stylesheet" href="__CSS__/index.css" type="text/css">
	<link href="__CSS__/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="__CSS__/bootstrap-3.3.5-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="__JS__/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="__CSS__/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
	<script src="__JS__/html5shiv.js"></script>
	<script src="__JS__/npm.js"></script>
	<script src="__JS__/respond.min.js"></script>
	<script language="javascript">
		// function check(){
		// 	if (searchForm.school_name.value ==""){
		// 		alert("世界上的大学都有名字哦！！！");
		// 		return false;
		// 	}
		// 	return true;
		// }
	</script>
</head>
<body>
	<!--这是第一部分-->
	<div id="first">
		<div class="container">
			<div class="text_1">
				<h1>EasyToLive<span>.pub</span></h1>
				<h3>专注于高校市场<br>准确、快速的宾馆房间在线预订服务</h3>
			</div>

			<div class="col-ms-6 col-md-7 col-md-offset-3 col-ms-offset-3 col-xs-8 col-xs-offset-3">
				<form id="searchForm" name="searchForm" action="__URL__/option" method="POST"  onsubmit="javascript:return check();">
					<input name="school_name" type="text" placeholder="搜索学校，例如：河南科技学院">
					<div class="sousuo"><a href="#"><img src="__IMAGE__/search.png"></a></div>
				</form>
			</div>

		</div>
	</div>
	<!--这是第二部分-->
	<div id="second">
		<div class="container">
			<div class="text_2">
				<h4>介绍EasyToLive</h4>
				<h1>宾馆这么多，得挨个敲门<br>问空房、比服务&价格？</h1>
				<h3>EasyToLive提供高校周围宾馆的所有房间的价格，以及每个房间的真实照片！<br>只需要搜索你所在的高校名称，选择房间，预定即可</h3>
			</div>
		</div>
		<div class="img1" >
			<img src="__IMAGE__/hotel.png" style=" width:100%; height:180px;">
		</div>
	</div>
	<!--这是第三部分-->
	<div id="third">
		<div class="container">
			<div class="title_3">
				<h4>如何使用</h4>
			</div>
			<div class="row text-center"> 
				<div class="col-md-4 col-xs-4 about_grid">
					<h1>Step 1</h1>
					<p>搜索你所在的高校名称</p>
				</div>
				<div class="col-md-4 col-xs-4 about_grid">
					<h1>Step 2</h1>
					<p>选择宾馆和房间</p>
				</div>
				<div class="col-md-4 col-xs-4 about_grid">
					<h1>Step 3</h1>
					<p>宾馆确定</p>
				</div>
			</div>
		</div>
		<div class="list">
			<div class="container">
				<div class="row text-center"> 
					<div class="col-md-2 col-xs-6 about_grid">
						<p><a data-toggle="modal" data-target="#hotelJoin1" href="#hotelJoin1">宾馆合作</a></p>
					</div>
					<div class="col-md-2 col-xs-6 about_grid">
						<p><a data-toggle="modal" data-target="#hotelJoin2" href="#hotelJoin2">请收录我们的学校</a></p>
					</div>
					<div class="col-md-4 col-xs-6 col-md-offset-2  about_grid">
						<p><a data-toggle="modal" data-target="#hotelJoin1" href="#hotelJoin1">用户交流:QQ 2449953617</a></p>
					</div>
					<div class="col-md-2 col-xs-6 about_grid">
						<p><a data-toggle="modal" data-target="#hotelJoin1" href="#hotelJoin1">About us  隐私条款</a></p>
					</div>
				</div>
				<div class="title_4">
					<h4><a href="#">京ICP备11008151号</a></h4>
				</div>
			</div>
		</div>
	</div>
</body>