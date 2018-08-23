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
	<ul class="nav nav-pills d-flex justify-content-center" role="tablist" style="font-size: 36px;">
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
			  <li>กรอกข้อมูลลงทะเบียนและสมัครร่วมกิจกรรมครบทุกช่อง</li>
			  <li>เลือกว่าอยากพาลูกไปลุยกิจกรรม<span> The Nexventure</span> แบบไหน
			  <li>อัพโหลดภาพลูก 1 ภาพ เลือกเฟรมภาพ แคปชั่นใต้ภาพ และสติ๊กเกอร์ตกแต่ง <span style="font-size: 21px">(1 Account สมัครได้ไม่จำกัด แต่นับเป็น 1 สิทธิ์)</span></li>
			  <li>เพื่อยืนยันสิทธิ์ในการไปลุยกับเราด้วยการ Share ภาพไปที่เฟซบุ๊กตัวเอง ตั้งค่าเป็นสาธารณะ พร้อมติดHashtag <span>#Nexcare  #NexcareThailand  #Thenexventurebynexcare  #ลูกแกร่งแน่แค่กล้าปล่อย</span></li>
			  <li>คัดเลือกครอบครัวที่ได้เข้าร่วมกิจกรรมผ่านการ Random</li>
			  <li>ประกาศผลครอบครัวที่ได้รับสิทธิ์พาลูกไปลุย(จำนวน 60 ครอบครัว/แหล่งเรียนรู้) ในวันที่ 15 ตุลาคม 2561</li>
			  <li>พร้อมรับของรางวัลพิเศษจาก 3M Nexcare<sup>TM</sup>  จำนวน 500 รางวัล</li>
			</ol>
			<br>
		</div>
		<div id="prize" class="container tab-pane fade"><br>
		  	<ul>
		  	<li>กิจกรรมวิถีชาวนา บ้านครูธานี จ.ปทุมธานี <span>(เสาร์ 20 ต.ค. 2561)</span></li>
			 <li>กิจกรรมชีวิตฟาร์มเมอร์ Farm de Lek จ.นครนายก <span>(เสาร์ 27 ต.ค. 2561)</span></li>
			 <li>ของรางวัลพิเศษจาก <b>3M Nexcare<sup>TM</sup></b> 500 รางวัล</li>
			</ul>
			<br>
		</div>
	</div>
	<div class="text-center pt-2 pb-4">		
		<a href="{{ route('Registers') }}" class="my-btn btn-custom">ส่งรูป</a>
	</div>
</div>
@endsection