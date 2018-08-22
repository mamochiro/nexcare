@extends('fontend.inc.template')
@section('js')
<script src="{{ asset('js/bootstrap-datepicker-thai.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
     <script type="text/javascript">
        $( document ).ready(function() {
            $( "#fb-login" ).click(function() {
                window.location.href = "/redirect";
            });
        // $('.datepicker').datepicker({language:'th-th',format:'dd/mm/yyyy'})
        });  
        $(document).ready(function() {
            // $('.datepicker').datepicker({
            //     format: 'dd/mm/yyyy'
            // });
        });
    </script>
@endsection
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=289711824944032&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Modal -->
<div class="modal fade mx-4 modal-register" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">&nbsp;</h5>
            <button type="button" class="close" style="margin-left:0;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body text-center">
        <p>กดไลค์แฟนเพจ<br>
            <span>Nexcare Thailand</span><br>
        </p>
        <p style="font-size: 22px">จะได้ไม่พลาดอัพเดตข่าวสารและกิจกรรม</p>
        <img src="{{asset('images/home_logo.png')}}" alt="logo" style="width: 50%;height: auto; " class="mb-3">
        <div style="width: 100%; overflow: hidden;">
            <div class="fb-page" 
                data-href="https://www.facebook.com/NexcareThailand/" 
                data-tabs="timeline" 
                data-small-header="true" 
                data-adapt-container-width="true" 
                data-hide-cover="false" 
                data-show-facepile="true"
                data-height="150">
                <blockquote cite="https://www.facebook.com/NexcareThailand/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/NexcareThailand/">Nexcare</a>
                </blockquote>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<form class="demo-form" action="{{ route('Registers.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-section text-center container">
        <br>
        <a class="my-topic" style="color: #ffffff;">REGISTER</a>
        <div class="row align-items-center justify-content-center my-3">
            <button id="fb-login" class="btn btn-facebook col-6 d-flex align-items-center justify-content-center" type="button">
                <i class="fab fa-facebook-square mr-1"></i>
                Login ด้วย Facebook
            </button>
        </div>
        <div class="row">
            <div class="col-5" style="text-align: right;">
                <label for="name" >ชื่อ-นามสกุล</label>
            </div>
            <div class="col-7">
                <input class="form-control" type="text" id="name" value="" name="name" required="required">
            </div>
            <div class="col-5">
                <label style="" for="phone" >เบอร์ติดต่อ</label>
            </div>
            <div class="col-7">
                <input class="form-control" type="text" id="tel" value="" name="phone" required="required">
                
            </div>
            <div class="col-5">
                <label for="mail" >E-mail</label>
            </div>
            <div class="col-7">
                <input class="form-control" type="mail" id="mail" value="" name="mail" required="required">
            </div>
            <div class="col-5">
                <label for="child-name" >ชื่อเล่นลูก</label>
            </div>
            <div class="col-7">
                <input class="form-control" type="text" id="child-name" name="child_name" value="" required="required">
            </div>
            <div class="col-5">
                <label for="date" >วันเกิดลูก</label>
            </div>
            <div class="col-7">
                <input class="form-control" type="datetime-local" name="child_date" id="testdate3" required="required">
                {{-- <input type="datetime-local" value="02/16/12" data-date-format="mm/dd/yy" class="datepicker" > --}}
            </div>
            <div class="col-5">
                <label for="address" >ที่อยู่</label>
            </div>
            <div class="col-7">
                <textarea 
                    class="form-control mb-2" 
                    type="text" id="address" 
                    name="address" 
                    value="" 
                    required="required"></textarea>              
            </div>
            <div class="col-5">
                <label for="province" >จังหวัด</label>
            </div>
            <div class="col-7">
                <select class="form-control" name="province" placeholder="ระบุ จังหวัดที่อาศัย" required="required">
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
            </div>
            <div class="col-5">
                <label for="date_join" >รหัสไปรษณีย์</label>
            </div>
            <div class="col-7">
                <input class="form-control" type="text" id="post_code" name="post_code" value="" required="required">
            </div>
            <div class="col-5">
                <label for="date_join" >วันไปร่วมกิจกรรม</label>
            </div>
            <div class="col-7">
                {{-- <input class="form-control" type="text" id="date_join" name="join_date" value="" required="required"> --}}
                <select class="form-control" id="date_join" name="join_date" required="required">
                    <option value="2018-10-20">เสาร์ 20 ตุลาคม</option>
                    <option value="2018-10-27">เสาร์ 27 ตุลาคม</option>
                </select>
            </div>
            <div class="col-6">
                
            </div>
        </div>
    </div>

    <!-- select type theme -->
    <div class="container">
      <div class="form-section text-center choice">
        <br>
        <p style="font-size: 40px;color: #001588;">คุณเป็น<b style="font-size: 55px">พ่อแม่แบบไหน</b> ?</p>
        <div class="row">
            <div class="col-6 pr-2 mb-3 choice-button border-light">
                    <label style="line-height: 22px; background-color: #80C950; height: 100%; border-radius: 10px;" class="p-3">
                        <input type="radio" name="choice" value="1" class="d-none">
                        อยากให้ลูกเรียนรู้<br>
                        แต่<b>ไม่อยากให้อยู่ห่างสายตา</b><br>
                        ลูกทำอะไร ต้องอยู่ด้วยเสมอ
                    </label>
            </div>
            <div class="col-6 pl-2 mb-3 choice-button border-light">           
                    <label style="line-height: 22px; background-color: #F99030; height: 100%; border-radius: 10px;" class="p-3">
                        <input type="radio" name="choice" value="2" class="d-none">
                        <b>ชอบชวนลูกผจญภัย</b><br>
                        สนุกเรียนรู้ไปด้วยกัน<br>
                        ลุยทำกิจกรรมทุกที่
                    </label>
            </div>
            <div class="col-6 pr-2 choice-button border-light">
                    <label style="line-height: 22px; background-color: #367ADD; height: 100%; border-radius: 10px;" class="p-3">
                        <input type="radio" name="choice" value="3" class="d-none">
                        อยากให้ลูกออกไปเรียนรู้<br>
                        แต่ต้อง<b>มั่นใจว่าปลอดภัย</b><br>
                        เครื่องป้องกันแน่น
                    </label>
            </div>
            <div class="col-6 pl-2 choice-button border-light">
                    <label style="line-height: 22px; background-color: #1CB0C4; height: 100%; border-radius: 10px;" class="p-3">
                        <input type="radio" name="choice" value="4" class="d-none">
                        พร้อมให้ลูกลุย<br>
                        <b>ล้มบ้าง เลอะบ้าง เจ็บบ้าง</b><br>
                        ไม่เป็นไร อย่างน้อยก็ได้เรียนรู้
                    </label>
            </div>
        </div>
      </div>
      <br>
    </div>

    <div class="form-navigation text-center" style="padding-top: 10px">
        <button type="button" class="next my-btn-register btn-custom">ตกลง</button>
        <input type="submit" class="my-btn btn-custom" value="ตกลง">
        <span class="clearfix"></span>
    </div>
</form>
@endsection