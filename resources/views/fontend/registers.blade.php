@extends('fontend.inc.template')
@section('content')
<style>
    p{
        font-family: 'db_helvethaicamon_x55_regular';
        font-size: 35px;
        line-height: 0.7;
        color: #358DC9;
    }
    p span{
        font-family: 'db_helvethaicamon_x75_bd';
        font-size: 46px;
        color: #001588;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <p>กดไลค์แฟนเพจ<br>
            <span>Nexcare Thailand</span><br>
        </p>
        <p style="font-size: 22px">จะได้ไม่พลาดอัพเดตข่าวสารและกิจกรรม</p>
        <img src="{{asset('images/home_logo.png')}}" alt="logo" style="width: 50%;height: auto; ">
        <br><br>facebook <br><br>
      </div>
    </div>
  </div>
</div>
<form class="demo-form" action="{{ route('Registers.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-section text-center container">
    <br><a class="my-topic" style="color: #ffffff;">REGISTER</a><br><br>
        <div class="row">
            <div class="col-5" style="text-align: right;">
                <label for="name" >ชื่อ-นามสกุล</label><br>
                <label style="margin-top: 10px" for="phone" >เบอร์ติดต่อ</label><br>
                <label for="mail" >E-mail</label><br>
                <label for="child-name" >ชื่อเล่นลูก</label><br>
                <label for="date" >วันเกิดลูก</label><br>
                <label for="address" >ที่อยู่</label><br>
                <label style="margin-top: 18px" for="province" >จังหวัด</label><br>
                <label style="margin-top: 8px" for="post-code" >รหัสไปรษณีย์</label><br>
                <label style="margin-top: 3px" for="date_join" >วันไปร่วมกิจกรรม</label>
            </div>
            <div class="col-6">
                <input class="form-control" type="text" id="name" value="" name="name" required="required">
                <input class="form-control" type="text" id="tel" value="" name="phone" style="margin-top: 5px" required="required">
                <input class="form-control" type="mail" id="mail" value="" name="mail" style="margin-top: 5px" required="required">
                <input class="form-control" type="text" id="child-name" name="child_name" value="" style="margin-top: 5px;margin-bottom: 5px" required="required">
                <input class="form-control" type="text" id="date" name="child_date" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="date" value="" required="required">
                <textarea class="form-control" type="text" id="address" name="address" value="" style="margin-top: 5px" required="required"></textarea>                    
                <select class="form-control" name="province" placeholder="ระบุ จังหวัดที่อาศัย" style="margin-top: 5px" required="required">
                    <option value="" disabled="disabled" selected="">- กรุณาเลือกจังหวัด -</option>
                    <option value="กระบี่">กระบี่</option>
                    <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                    <option value="กาญจนบุรี">กาญจนบุรี</option>
                    <option value="กาฬสินธุ์">กาฬสินธุ์</option>
                    <option value="กำแพงเพชร">กำแพงเพชร</option>
                    <option value="ขอนแก่น">ขอนแก่น</option>
                    <option value="จันทบุรี">จันทบุรี</option>
                    <option value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
                    <option value="ชลบุรี">ชลบุรี</option>
                    <option value="ชัยนาท">ชัยนาท</option>
                    <option value="ชัยภูมิ">ชัยภูมิ</option>
                    <option value="ชุมพร">ชุมพร</option>
                    <option value="เชียงราย">เชียงราย</option>
                    <option value="เชียงใหม่">เชียงใหม่</option>
                    <option value="ตรัง">ตรัง</option>
                    <option value="ชัยภูมิ">ชัยภูมิ</option>
                    <option value="ชุมพร">ชุมพร</option>
                    <option value="เชียงราย">เชียงราย</option>
                    <option value="เชียงใหม่">เชียงใหม่</option>
                    <option value="ตรัง">ตรัง</option>
                    <option value="ตราด">ตราด</option>
                    <option value="ตาก">ตาก</option>
                    <option value="นครนายก">นครนายก</option>
                    <option value="นครปฐม">นครปฐม</option>
                    <option value="นครพนม">นครพนม</option>
                    <option value="นครราชสีมา">นครราชสีมา</option>
                    <option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
                    <option value="นครสวรรค์">นครสวรรค์</option>
                    <option value="นนทบุรี">นนทบุรี</option>
                    <option value="นราธิวาส">นราธิวาส</option>
                    <option value="น่าน">น่าน</option>
                    <option value="บุรีรัมย์">บุรีรัมย์</option>
                    <option value="บึงกาฬ">บึงกาฬ</option>
                    <option value="ปทุมธานี">ปทุมธานี</option>
                    <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
                    <option value="ปราจีนบุรี">ปราจีนบุรี</option>
                    <option value="ปัตตานี">ปัตตานี</option>
                    <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
                    <option value="พะเยา">พะเยา</option>
                    <option value="พังงา">พังงา</option>
                    <option value="พัทลุง">พัทลุง</option>
                    <option value="พิจิตร">พิจิตร</option>
                    <option value="พิษณุโลก">พิษณุโลก</option>
                    <option value="เพชรบุรี">เพชรบุรี</option>
                    <option value="เพชรบูรณ์">เพชรบูรณ์</option>
                    <option value="แพร่">แพร่</option>
                    <option value="ภูเก็ต">ภูเก็ต</option>
                    <option value="มหาสารคาม">มหาสารคาม</option>
                    <option value="มุกดาหาร">มุกดาหาร</option>
                    <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
                    <option value="ยโสธร">ยโสธร</option>
                    <option value="ยะลา">ยะลา</option>
                    <option value="ร้อยเอ็ด">ร้อยเอ็ด</option>
                    <option value="ระนอง">ระนอง</option>
                    <option value="ระยอง">ระยอง</option>
                    <option value="ราชบุรี">ราชบุรี</option>
                    <option value="ลพบุรี">ลพบุรี</option>
                    <option value="ลำปาง">ลำปาง</option>
                    <option value="ลำพูน">ลำพูน</option>
                    <option value="เลย">เลย</option>
                    <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                    <option value="สกลนคร">สกลนคร</option>
                    <option value="สงขลา">สงขลา</option>
                    <option value="สตูล">สตูล</option>
                    <option value="สมุทรปราการ">สมุทรปราการ</option>
                    <option value="สมุทรสงคราม">สมุทรสงคราม</option>
                    <option value="สมุทรสาคร">สมุทรสาคร</option>
                    <option value="สระแก้ว">สระแก้ว</option>
                    <option value="สระบุรี">สระบุรี</option>
                    <option value="สิงห์บุรี">สิงห์บุรี</option>
                    <option value="สุโขทัย">สุโขทัย</option>
                    <option value="สุพรรณบุรี">สุพรรณบุรี</option>
                    <option value="สุราษฎร์ธานี">สุราษฎร์ธานี</option>
                    <option value="สุรินทร์">สุรินทร์</option>
                    <option value="หนองคาย">หนองคาย</option>
                    <option value="หนองบัวลำภู">หนองบัวลำภู</option>
                    <option value="อ่างทอง">อ่างทอง</option>
                    <option value="อำนาจเจริญ">อำนาจเจริญ</option>
                    <option value="อุดรธานี">อุดรธานี</option>
                    <option value="อุตรดิตถ์">อุตรดิตถ์</option>
                    <option value="อุทัยธานี">อุทัยธานี</option>
                    <option value="อุบลราชธานี">อุบลราชธานี</option>
                </select>
                <input class="form-control" type="text" id="post_code" name="post_code" value="" style="margin-top: 5px" required="required">
                <input class="form-control" type="text" id="date_join" name="join_date" value="" style="margin-top: 5px" required="required">
            </div>
        </div>
    </div>
    <div class="container">
      <div class="form-section text-center choice">
        <br>
    	<p style="font-size: 40px;color: #001588;">คุณเป็น<b style="font-size: 55px">พ่อแม่แบบไหน</b> ?</p>
        <div class="row">
            <div class="col-6" style="padding-right: 2.5px">
                <div class="card choice-button border-light" style="background-color: #80C950;margin-bottom: 5px">
                    <input type="radio" name="choice" value="1">
                    <label style="line-height: 22px;">อยากให้ลูกเรียนรู้<br>แต่<b>ไม่อยากให้อยู่ห่างสายตา</b><br>ลูกทำอะไร ต้องอยู่ด้วยเสมอ</label>
                </div>              
                <div class="card choice-button border-light" style="background-color: #F99030;">
                    <input type="radio" name="choice" value="2">
                    <label style="line-height: 22px;"><b>ชอบชวนลูกผจญภัย</b><br>สนุกเรียนรู้ไปด้วยกัน<br>ลุยทำกิจกรรมทุกที่</label>
                </div>
            </div>
            <div class="col-6" style="padding-left: 2.5px">
                
                <div class="card choice-button border-light" style="background-color: #367ADD;margin-bottom: 5px">
                    <input type="radio" name="choice" value="3">
                    <label style="line-height: 22px;">อยากให้ลูกออกไปเรียนรู้<br>แต่ต้อง<b>มั่นใจว่าปลอดภัย</b><br>เครื่องป้องกันแน่น</label>
                </div>
                <div class="card choice-button border-light" style="background-color: #1CB0C4;">
                    <input type="radio" name="choice" value="4">
                    <label style="line-height: 22px;">พร้อมให้ลูกลุย<br><b>ล้มบ้าง เลอะบ้าง เจ็บบ้าง</b><br>ไม่เป็นไร อย่างน้อยก็ได้เรียนรู้</label>
                </div>
            </div>
        </div>
      </div>
      <br>
    </div>

    <div class="form-navigation text-center" style="padding-top: 10px">
        <button type="button" class="next my-btn-register">ตกลง</button>
        <input type="submit" class="my-btn" value="ตกลง">
        <span class="clearfix"></span>
    </div>
</form>
@endsection