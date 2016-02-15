<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>无标题文档</title>


  <link href="__CSS__/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="__CSS__/bootstrap-3.3.5-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="__JS__/jquery-2.1.4.js"></script>
  <script type="text/javascript" src="__CSS__/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
  <link href="__CSS__/wait2.css" rel="stylesheet" type="text/css">

</head>

<body>


	<div id="head">
   <div class="container">
     <h1>EasyToLive.pub</h1>
   </div>
 </div>


 <div class="container">
  <div class="main">
   <div class="row">
     <div class=" col-xs-10 col-md-7">
       <h4><span><b>宾馆：</b></span>您好，<?php echo (getroom($room_id)); ?>号房间已经给您预留，欢迎入住！</h4>
     </div>
     <div class=" col-xs-8 col-md-5 ">
      <img src="__IMAGE__/progress3.png">
     </div>
   </div>

   <div class="linea"></div>

 </div>
 <div class="maina">
  <div class="row">
    <div class="ma">
      <div class="col-xs-9 col-md-7">
       <p class="p1"><span><b><?php echo (gethotel($hotel_id)); ?></b></span></p> 	<p class="p3">房间：<?php echo (getroom($room_id)); ?></p>
       <p class="p2"><b><?php echo (getweek($start_date)); ?></b></p>  <p class="p4">到</p>  <p class="p5"><b><?php echo (getweek($end_date)); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;共<?php echo ($day); ?>晚</b></p>

     </div>
   </div>

   <div class="mb">
    <div class=" col-xs-7 col-md-5 ">
     <p class="name">姓名：<?php echo ($username); ?></p>
     <p class="num">联系方式：<?php echo ($usertel); ?></p>
   </div>
 </div>

</div>
<div class="linec"></div>
<p class="sm">说明：1.由于宾馆经营行业的性质，我们最长只能将房间为您预留3小时.请体谅我们在本店利益与方便消费者之间取舍的难处</p>
<p class="sm2">2.我们承诺，如果您到达时该房间已经被占用，我们将以原价向您提供更高档次的房间</p>
</div>

<div class="foot">

 <div class="row">
   <div class="col-xs-9 col-md-6">
     <p><a href="#">宾馆合作</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">请收录我们的学校</a></p>
   </div>
   <div class="col-xs-8 col-md-6">
     <p><a href="#">用户反馈&交流：QQ 2449953617</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">About</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">隐私条款</a></p>
    </div>  
  </div>
  <p class="xinxi"><a href="#">京ICP备11008151号</a>  &nbsp;&nbsp;&nbsp;&nbsp;京公网安备11010802014853</p>
</div>


</div>

</body>
</html>