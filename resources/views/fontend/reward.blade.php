@extends('fontend.inc.template')
@section('content')
<style>
	div.container {
		font-family: 'db_helvethaicamon_x55_regular';
	}
	span {
		font-family: 'db_helvethaicamon_x75_bd';
	}
	/*rule*/
	ol li {
		color: #0B69B7;
		font-size: 24px;
		line-height: 30px;
	}
	/*prize*/
	ul li {
		color: #0B69B7;
		font-size: 29.5px;
	}
	ul li span {
		font-family: 'db_helvethaicamon_x55_regular';
		color: #F24678;
	}
</style>
<div class="container" style="padding-top: 5px">
	<br>
	<ul class="nav nav-pills" role="tablist" style="font-size: 36px;">
	    <li class="nav-item">
	      <a class="nav-link active" data-toggle="pill" href="#rule">กติกา</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-toggle="pill" href="#prize">รางวัล</a>
	    </li>
	</ul>
	<br>

	<!-- Tab panes -->
	<div class="tab-content">
		<div id="rule" class="container tab-pane active"><br>
		  	<ol>
			  <li>ครอบครัวที่มีสิทธิสมัครต้อง<span><b>มีลูกวัย 3-9 ปี</b></span> (เข้าร่วมกิจกรรมได้ครอบครัวละ 3 คน) <span><b>กรอกข้อมูลลงทะเบียนและสมัครร่วมกิจกรรมครบทุกช่อง</b></span></li>
			  <li>เลือกกิจกรรม <span>The Nexventure</span> ที่อยากพาลูกไปลุย</li>
			  <li>อัพโหลดภาพลูก 1 ภาพ (ภาพชัด ขนาด... ) เลือกเฟรมภาพ แคปชั่นใต้ภาพ และสติกเกอร์ตกแต่ง <span style="font-size: 21px">(1 Account สมัครได้ไม่จำกัด แต่นับเป็น 1 สิทธิ์)</span></li>
			  <li>คัดเลือกครอบครัวที่ได้เข้าร่วมกิจกรรมผ่านการ <span>Random</span></li>
			  <li>ประกาศผลครอบครัวที่ได้รับสิทธิพาลูกไปลุย ในวันที่ <span>15 ต.ค. 2561</span></li>
			</ol>
			<br>
		</div>
		<div id="prize" class="container tab-pane fade"><br>
		  	<ul>
			  <li><b>กิจกรรมชีวิตฟาร์มเมอร์ที่  Farm de Lek</b> จ.นครนายก <span>(เสาร์ 20 ต.ค. 2561)</span> <b>60 ครอบครัว</b></li>
			  <li><b>กิจกรรมวิถีชาวนาที่บ้านครูธานี</b> จ.ปทุมธานี <span>(เสาร์ 27 ต.ค. 2561)</span><br><b>60 ครอบครัว</b></li>
			  <li>ของรางวัลพิเศษจาก <b>3M NexcareTM 500 รางวัล</b></li>
			</ul>
			<br>
		</div>
	</div>
	<br>
	<div class="text-center">		
		<a href="{{route('Registers')}}" class="my-btn">ส่งรูป</a>
	</div>
</div>
@endsection