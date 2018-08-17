@extends('fontend.inc.template')
@section('content')
<div class="share-page text-center" style="padding-top: 10px">
	<br>
	<p>ขอบคุณ<br><span>ที่ร่วมสนุกกับกิจกรรมของเรา !</span></p>
	@if($imageName)
	<img src="{{asset($imageName)}}" alt="frame" style="width: 90%;">
	@else
	<img src="{{asset('images/protect.png')}}" alt="frame" style="width: 90%;">
	@endif
	<br><br>
	<p1 style="line-height: 0.1">อย่าลืม<b style="font-size: 29px">กดแชร์รูปไปที่เฟซบุ๊กตัวเอง</b><br>ตั้งค่าเป็นสาธารณะ พร้อมติด<br><span>#TheNexventure  #ปิดจอไปเจอจริง  #ลูกแกร่งแน่แค่กล้าปล่อย</span></p1>
	<br>
	<img src="{{asset('images/share.png')}}" alt="share">
</div>
@endsection