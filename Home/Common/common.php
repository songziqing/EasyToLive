<?php
function RoomImage($room_id){

		$m = D("Room_images"); // ÊµÀý»¯User¶ÔÏó
		$condition['room'] = $room_id;
		
		
		$image = $m->where($condition)->limit(1)->field('image_src')->select();
		return $image[0]['image_src'];
	}

	function Post($data, $target) {
		$url_info = parse_url($target);
		$httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
		$httpheader .= "Host:" . $url_info['host'] . "\r\n";
		$httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
		$httpheader .= "Content-Length:" . strlen($data) . "\r\n";
		$httpheader .= "Connection:close\r\n\r\n";
    	//$httpheader .= "Connection:Keep-Alive\r\n\r\n";
		$httpheader .= $data;

		$fd = fsockopen($url_info['host'], 80);
		fwrite($fd, $httpheader);
		$gets = "";
		while(!feof($fd)) {
			$gets .= fread($fd, 128);
		}
		fclose($fd);
		return $gets;
	}

	function queryBook($book_id) {
		
		// $m = D("Books"); // ÊµÀý»¯User¶ÔÏó
		// $condition['book_id'] = $book_id;
		
		
		// $bosse_idea = $m->where($condition)->limit(1)->field('bosse_idea')->select();
		// //return $image[0]['image_src'];
		// var_dump($bosse_idea);
		// return 1;
		// 
		$m = D("Books"); // ÊµÀý»¯Books¶ÔÏó
		$condition['book_id'] = $book_id;
		$bosse_idea = $m->where($condition)->limit(1)->field('bosse_idea')->select();

		//return $bosse_idea[0]['bosse_idea']; 
		return $bosse_idea[0]['bosse_idea']; 
	}

	function getRoom($book_id){
		$m = M('Rooms');
		$roomname = $m->field('room_name')->find($book_id);
		//var_dump($roomname);
		return $roomname['room_name'];

	}

	function getHotel($hotel_id){
		$m = M('Hotels');
		$hotelname = $m->field('hotel_name')->find($hotel_id);
		//var_dump($hotelname);
		return $hotelname['hotel_name'];

	}

	function getWeek($date){
		$start = strtotime($date);
		$w=date("w",$start); 
		$week=array( 
			"0"=>"日", 
			"1"=>"一", 
			"2"=>"二", 
			"3"=>"三", 
			"4"=>"四", 
			"5"=>"五", 
			"6"=>"六" 
			); 
		return $date."(周".$week[$w].")";    


		

	}  

	

	
	?>