<?php
class IndexAction extends Action {
	// 网站首页页面
	public function index(){
		$this->display();
	}

	//选择宾馆和房间页面
	public function  option(){
		$m = M("Schools");
		if($_POST['school_name']) {
			$map['school_name'] = array('like',"%{$_POST['school_name']}%");
		} else {
			$map['school_name'] = array('like',"%{$_GET['school_name']}%");
		}
		$result=$m->where($map)->field('school_name,mapx,mapy')->limit(1)->select();
		if($result>0) {
			// 向模板中分配查找到的学校地址信息
			$this->assign('mapx',$result[0][mapx]);
			$this->assign('mapy',$result[0][mapy]);
			// 向模板中分配查找到的学校信息
			$this->assign('school_name',$result[0][school_name]);
			//向下拉列表中分配所有宾馆信息
			$m = M("Hotels");
			$hotels = $m->limit(3)->select();
			$this->assign('hotels',$hotels);
			$map['hotel_id']  = array('GT',3);
			$moreHotels = $m->where($map)->select();
			$this->assign('moreHotels',$moreHotels);

			//查找宾馆信息
			if($_GET['hotel_id']){
				$condition['hotel_id'] = $_GET['hotel_id'];
			} else {
				$condition['hotel_id'] = 2;
			}
			$hotel = M("Hotels");
			$hotels = $hotel->where($condition)->field('hotel_name,hotel_wifi,hotel_shower,hotel_park')->find();
			// var_dump($hotels);
			// echo $hotels['hotel_wifi'];
			// echo $hotels['hotel_shower'];
			// echo $hotels['hotel_park'];
			$hotel_desc = "本宾馆";
			if($hotels['hotel_wifi']) {
				$hotel_desc = $hotel_desc."WIFE全覆盖";
			}
			if($hotels['hotel_shower']){
				$hotel_desc = $hotel_desc."&nbsp;&nbsp;24小时热水淋浴";
			}
			if($hotels['hotel_park']){
				$hotel_desc = $hotel_desc."&nbsp;&nbsp;免费停车";
			}
			$this->assign('hotel_desc',$hotel_desc);
			
			
			
			



		 	//查找某个宾馆的所有房间，分配到模板中去
			$m = M("Rooms");
			if($_GET['hotel_id']){
				$condition['hotel_id'] = $_GET['hotel_id'];
				$condition['room_statu'] = 2;
			} else {
				$condition['hotel_id'] = 1;
				$condition['room_statu'] = 2;
			}
			$rooms = $m->where($condition)->select();
			$this->assign('rooms',$rooms);

		 	//查找某个宾馆的公共区域编号
			$condition['room_statu'] = 1;
			$publicRoomID = $m->where($condition)->field('room_id')->select();
			$m = M("Room_images");
			$condition['room'] = $publicRoomID[0]['room_id'];
			$publicRoomImages = $m->where($condition)->select();
			$this->assign('publicRoomImages',$publicRoomImages);

		 	//调用模板
			$this->display();
		} else {
			$this->show("<script>alert('对不起,请输入以下三个学校中的一个:河南科技学院，新乡学院，新乡医学院')</script>");
			echo "<script>location.href='".U('index')."'</script>";
		}
	}




	public function book(){
		//向前台分配将要预订房间的id号
		$this->assign('room_id',$_GET['room_id']);
		//向前台分配订单号
		$date = date('ymd');
		$book = M("Books");
		$map['book_id'] = array('like',"%{$date}%");
		$count = $book->where($map)->count();
		$nweID = date('ymd').str_pad(($count+1),6,'0',STR_PAD_LEFT);
		$this->assign('book_id',$nweID);

		$m = M("Rooms");
		$roomInfo = $m -> select($_GET['room_id']);
		$this->assign('room_floor',$roomInfo[0][room_floor]);
		$this->assign('room_name',$roomInfo[0][room_name]);
		$this->assign('room_price',$roomInfo[0][room_price]);
		$this->assign('hotel_id',$roomInfo[0][hotel_id]);
		
		$this->display();
	}

	
	#向用户手机发送验证码，验证手机是否可用
	public function sendMessage(){
		// if($_POST['usertel']){
		// 	//导入第三方类库文件
		// 	import('ORG.Util.MyClass.send');
		// 	$url = 'http://sms.jiangukj.com/SendSms.aspx?';
		// 	$data = array('action' => 'code',
		// 		'username' => 'cizky',
		// 		'userpass' => '111111',
		// 		'mobiles' => $_POST['usertel'],
		// 		'content' => $_POST['num'],
		// 		'codeid' => '3396',
		// 	);
		// 	echo $result = Util::request($url, 'Get',$data);
		// }

		if($_POST['usertel']){
			echo 1;
		}
	}




	public function info() {
		echo "入住房间id号：".$_POST['room_id']."<br>";
		echo "订单号：".$_POST['book_id']."<br>";
		echo "入住日期：".$_POST['startDate']."<br>";
		echo "离开日期：".$_POST['endDate']."<br>";
		echo "房价：".$_POST['room_price']."<br>";
		echo "用户名：".$_POST['username']."<br>";
		echo "用户手机号：".$_POST['usertel']."<br>";
	}

	public function wait(){
		var_dump($_POST);
		$m = M("Books"); // 实例化User对象
		$data['book_id'] = $_POST['book_id'];
		$data['start_date'] = $_POST['startDate'];
		$data['end_date'] = $_POST['endDate'];
		$data['room_id'] = $_POST['room_id'];
		$data['hotel_id'] = $_POST['hotel_id'];
		$data['last_time_arrive'] = $_POST['howLongArrive'];
		$data['user_tel'] = $_POST['usertel'];
		$data['user_name'] = $_POST['username'];
		
		$m->add($data);

		$this->assign('book_id',$_POST['book_id']);
		$this->display();
	}

	public function query(){
		//echo "hello qing ge";
		if($_POST['book_id']) {
			//echo "hello".$_POST['book_id'];
			$book = M("Books");
			$idea = $book->field('bosse_idea')->find($_POST['book_id']);
			echo $idea[bosse_idea];
		}
	}

	public function result(){
		$m = M('Books');
		$result = $m -> find($_GET['book_id']);
		//var_dump($result);
		$this->assign('hotel_id',$result['hotel_id']);
		$this->assign('room_id',$result['room_id']);
		$this->assign('username',$result['user_name']);
		$this->assign('usertel',$result['user_tel']);
		$this->assign('start_date',$result['start_date']);
		$this->assign('end_date',$result['end_date']);

		import('ORG.Util.Date');// 导入日期类
		$Date = new Date($result['start_date']);
		$day = $Date->dateDiff($result['end_date'],'D');  // 比较日期差
		//echo $day;
		$this->assign('day',$day);



		$this->display();


	}

	public function test() {
		$book = M("Books");
		//$idea = $book->field('bosse_idea')->find($_POST['book_id']);
		$idea = $book->find(150827000012);
		var_dump($idea);

	}

	

	
}