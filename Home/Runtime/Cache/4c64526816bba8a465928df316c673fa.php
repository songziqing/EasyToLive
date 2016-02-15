<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>book</title>
	<link href="__CSS__/bootstrap.min.css" rel="stylesheet" >
	<link href="__CSS__/bootstrap-theme.min.css" rel="stylesheet" >
	<link href="__CSS__/book.css" rel="stylesheet" type="text/css">
	<link href="__CSS__/smoothness/jquery.ui.css" type="text/css" />
	<link href="__CSS__/css.css" type="text/css" />
	<link href="__CSS__/book.css" type="text/css" />
	<script type="text/javascript" src="__JS__/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="__JS__/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="__CSS__/global.css"/>
	<link rel="stylesheet" href="__CSS__/smoothness/jquery.ui.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/css.css"/>
	<script type="text/javascript">
		//多久到达下拉框动态效果
		function chg(){
			if(document.getElementById("sel").value=="txt"){
				document.getElementById("txt").style.display="";
				document.getElementById("btn").style.display="none";
			} else {
				document.getElementById("txt").style.display="none";
				document.getElementById("btn").style.display="";
			}
		}

		//表单提交的时候进行验证
		function check() {
			if (document.getElementById('exampleInputName1').value ==""){
				alert("请输入您的名字哦！！！");
				document.getElementById('exampleInputName1').focus();
				return false;
			}
			if (document.getElementById('exampleInputName2').value ==""){
				alert("请输入您的手机号哦！！！");
				document.getElementById('exampleInputName2').focus();
				return false;
			}
			if (document.getElementById('exampleInputName3').value ==""){
				alert("请输入验证码哦！！！");
				document.getElementById('exampleInputName3').focus();
				return false;
			}

			//验证填写的短信验证码是否正确
			if(!($("#message")[0].value == document.getElementById('exampleInputName3').value)||$("#message")[0].value == ""||document.getElementById('exampleInputName3').value == "") {
				alert("验证码输入不太对头哦！！！");
				document.getElementById('exampleInputName3').focus();
				return false;
			}
		}

		//验证用户名是否正确
		function checkName() {
			var str = document.getElementById('exampleInputName1').value.trim();
			if(str.length!=0){    
				var reg = /^([\u4e00-\u9fa5]+|([a-z]+\s?)+)$/;     
				var r = str.match(reg);     
				if(r==null) {
					alert("请输入格式正确的姓名！！！");
					document.getElementById('exampleInputName1').focus();
				}   
			} 
		}

		//验证手机号是否正确
		function checkTel() {
			var str = document.getElementById('exampleInputName2').value.trim();
			if(str.length!=0){    
				var reg = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;     
				var r = str.match(reg);     
				if(r==null) {
					alert("请输入格式正确的手机号码！！！");
					document.getElementById('exampleInputName2').focus();
				}   
			} 
		}

		// 点击获取验证码按钮触发，发送验证码
		function send() {
			//验证手机号输入框是否为空，为空的话，
			//结束函数执行，进行手机号输入操作
			if (document.getElementById('exampleInputName2').value ==""){
				alert("请输入您的手机号哦！！！");
				document.getElementById('exampleInputName2').focus();
				// 结束函数执行
				return;
			}
			// 对发送按钮进行禁用，防止多次发送
			$("#b").attr("disabled", "disabled");
			// 产生四位随机数			
			var Num="";
			for(var i=0;i<4;i++) 
			{ 
				Num+=Math.floor(Math.random()*10); 
			}
			// 将产生的四位随机数隐藏在隐藏的输入框中，用于将来验证
			$("#message")[0].value = Num;
			// 向控制器函数发送请求
			$.post("__URL__/sendMessage", { usertel: document.getElementById('exampleInputName2').value,num:Num},
				// 如果发送成功，利用$.post()的回调函数进行接下来的逻辑操作
				function(data){
					$flag = data;
					if($flag){
						//发送验证码按钮禁用60秒，60秒后重新启用
						alert("发送成功！！！");
						disbtn();
					}
				});
		}

		//发送验证码禁用函数，如果发送成功，禁用按钮60秒，
		var count = 60;
		function disbtn() {
			$("#b").val(count + "秒之后重新获取")
			//设置变量，进行计时
			count--;
			if (count > 0)
			{
				setTimeout(disbtn, 1000);
			}
			else{
				$("#b").val("点击获取验证码");
				$("#b").attr("disabled", false);
				count = 60;
			}
		} 
	</script>
</head>

<body>
	<!-- 页面头部 -->
	<div id="head">
		<div class="container">
			<h1>EasyToLive.pub</h1>
		</div>
	</div>

	<!-- 页面主体部分 -->
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-md-7">
				<div class="left">
					<img style="width:425px;height:310px;" src="__IMAGE__/<?php echo (roomimage($room_id)); ?>">
				</div>
			</div>
			<div class="col-xs-8 col-md-5">
				<div class="right">
					<img src="__IMAGE__/progress1.png">
				</div>
			</div>
		</div>

		<!-- 订单信息填写部分 -->
		<div class=" main">
			<div class="word">
				<p class="p1"><b>预定信息</b></p>
				<p class="p2"><b>入住信息</b></p>
			</div>
			<form action="__URL__/wait" method="POST" onsubmit="javascript:return check();">
				<div class="tablea">
					<!-- 将要入住房间的id号 -->
					<input type="hidden" name="room_id" value="<?php echo ($room_id); ?>">
					<input type="hidden" name="hotel_id" value="<?php echo ($hotel_id); ?>">

					<!-- 订单号 -->
					<p class="pa1">订单号：  <?php echo ($book_id); ?></p>
					<input type="hidden" name="book_id" value="<?php echo ($book_id); ?>">

					<!-- 日期选择部分 -->
					<div class="sea-div">
						<div class="a">
							<label class="search-lab">入离日期：</label>
						</div>
						<input type="text" readonly name="startDate" id="startDate"/>
					</div>
					<div class="sea-div">
						<div class="b">
							<label class="search-lab">到：</label>
						</div>
						<input type="text" readonly name="endDate" id="endDate" onBlur="test()"/>
					</div>

					<!-- 多久时间到达 -->
					<select id="sel" name="howLongArrive" onChange="chg()">
						<option value="30">30分钟</option>
						<option value="60">1小时</option>
						<option value="90">1.5小时</option>
						<option value="120">2小时</option>
					</select>
					<p class="pa2">多久到达：</p>
					<p class="pa4">房间号： <b><?php echo ($room_floor); ?>楼&nbsp;&nbsp;<?php echo ($room_name); ?></b></p>
					<p class="pa5">房费总计： <b style="color:red;"><span id="room_price1"><?php echo ($room_price); ?></span>元</b></p>
					<input type="hidden" name="room_price" id="room_price" value="<?php echo ($room_price); ?>">

				</div>

				<div class="tableb">
					<div class="form-group">
						<label class="labela">房客姓名：</label>
						<input type="text" name="username" class="texta" id="exampleInputName1" placeholder="请输入姓名" onBlur="checkName()">
					</div>
					<div class="form-group">
						<label class="labelb">手机号：</label>
						<input type="text" name="usertel" class="textb" id="exampleInputName2" placeholder="18238635535" onBlur="checkTel()">
					</div>
					<div class="form-group">
						<label class="labelc">安全验证：</label>
						<input type="text" class="textc" id="exampleInputName3">
						<input type="button" class="btn btn-default" value="点击获取验证码" id="b" onclick="send()">

					</div>
					<button type="submit" class="yuding">预定</button>
					<!-- <input type="hidden" id="message"> -->
					<input type="text" id="message">
				</div>
			</form>

		</div>
	</div>

	<div class="line"></div>
	
	<div class="container">
		<div class="foot">
			<div class="row">
				<div class="col-xs-9 col-md-6">
					<p>
						<a href="#">宾馆合作</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#">请收录我们的学校</a>
					</p>
				</div>
				<div class="col-xs-8 col-md-6">
					<p>
						<a href="#">用户反馈&交流：QQ 2449953617</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#">About</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#">隐私条款</a>
					</p>
				</div>
			</div>
			<p class="xinxi">
				<a href="#">京ICP备11008151号</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				京公网安备11010802014853
			</p>
		</div>
	</div>
	<script type="text/javascript" src="__JS__/jquery-1.11.1.js"></script> 
	<script type="text/javascript" src="__JS__/jquery.ui.js"></script> 
	<script type="text/javascript" src="__JS__/moment.min.js"></script> 
	<script type="text/javascript" src="__JS__/stay.js"></script>
</body>
</html>