<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Microsite-Nexcare</title>
	<!-- Fonts -->
	<link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}}" type="text/css" />
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css" />
	<style>
		body{
		    background-image: url(images/home_bg.png) !important;
		    width: 100%;
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    background-position: center;
		    background-size: cover;
		    font-family: 'db_helvethaicamon_x55_regular';
		}
		span{
			font-family: 'db_helvethaicamon_x75_bd';
		}
	</style>
</head>
<body>
	<div class="wrapper">		
		<div class="">
				<div class="row">
					<div class="col-12" id="sidebar" style="z-index: 2">
						<div class="toggle-btn" onclick="toggleSidebar()">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<ul style="padding-left: 20px;">
							<a href="{{route('Home')}}"><li>หน้าหลัก</li></a>
							<a href="{{route('Reward')}}"><li>กติกาและรางวัล</li></a>
							<a href="{{route('Registers')}}"><li>ส่งภาพ</li></a>
							<a href="{{route('Gallery')}}"><li>แกลเลอรี่</li></a>
							<a href="{{route('Content')}}"><li>รู้ก่อนลุย</li></a>
							<a href="{{route('Result')}}"><li>ประกาศผล</li></a>
						</ul>
					</div>
				</div>
				<div class="container text-center" style="padding-top: 50px;position: relative;">
					<p style="color: #3E75A2;font-size: 30px;line-height: 30px;margin-bottom: 0px;">ปิดเทอมนี้ ชวนลูก<b> ‘ปิดจอ’</b>
						<br>ไปเจอประสบการณ์จริง กับกิจกรรม</p>
					<img src="{{asset('images/home_logo.png')}}" alt="Microsite-Nexcare" style="width: 100%;margin-bottom: 10px;">
					<p style="color: #3E75A2;font-size: 25px;line-height: 25px;margin-bottom: 10px;">ลุย เล่น ลอง เรียนรู้ สร้างประสบการณ์ 
						<br>ใน<span style="color: #F24678;"> กิจกรรม วันเดย์ แคมป์ สัมผัสวิถีเอาท์ดอร์</span>
						<br>ที่<span style="color: #F24678;"> ฟาร์ม เดอ เล็ก </span>และ<span style="color: #F24678;"> บ้านครูธานี </span>
					</p>
					<p style="color: #3E75A2;font-size: 30px;line-height: 30px;margin-bottom: 0px;">แล้วจะรู้ว่า<b>โลกนอกจอ</b><br>
					มีอะไรให้สนุก ลงมือทำ และเรียนรู้ อีกมากมาย</p>
					<img src="{{asset('images/home_tag.png')}}" alt="home_tag" style="width: 70%;position: absolute;right: 0px;top: 400px;">
					<a href="{{route('Reward')}}" style="background-color: transparent;">
						<img src="{{asset('images/join.png')}}" alt="join" style="width: 30%;position: relative;top: 100px">
					</a>
					<img src="{{asset('images/home_girl.png')}}" alt="girl" style="width: 30%;position: absolute;left: 2px;top: 428px;">
					<img src="{{asset('images/home_boy.png')}}" alt="boy" style="width: 30%;position: absolute;right: 0px;top: 458px;">
				</div>
		</div>
	</div>
	<!-- PC mode -->
	<!-- <div class="d-none d-lg-block">
		<div class="container-fluid text-center">
			<h1>รองรับเฉพาะ mobile นะ</h1>
		</div>
	</div> -->

	<!-- script -->
	<script src="{{asset('js/script.js')}}"></script>
	<script src="{{asset('js/jquery.js')}}"></script>
</body>
</html>