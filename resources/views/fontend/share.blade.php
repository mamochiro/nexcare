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
	<p1 style="line-height: 0.1">อย่าลืม<b style="font-size: 29px">กดแชร์รูปไปที่เฟซบุ๊กตัวเอง</b><br>ตั้งค่าเป็นสาธารณะ พร้อมติด<br><span>#Nexcare(TM)  #NexcareThailand(TM)  #thenexventurebynexcare #ลูกแกร่งแน่แค่กล้าปล่อย</span></p1>
	<br>
	<img src="{{asset('images/share.png')}}" alt="share" id='shareBtn'>
</div>
@endsection

@section('js')
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '287103768746468',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>
	$(document).ready(function(){
        $( "#shareBtn" ).click(function(e) {
            e.preventDefault()

            console.log($(this).data("image"));
            $('#shareBtn').attr('disabled','disabled')
            FB.ui({
            method: 'share',
            mobile_iframe: true,
            // hashtag : "#nexventure2018",
            href: 'http://www.nexventure2018.com/share/'+'{{$image_name}}'+'.png',
            // description: 'your_description',
            action_properties: JSON.stringify({
              object: {
                'og:description': 'nexventure2018',
                'og:image': 'http://www.nexventure2018.com/imgs/'+'{{$image_name}}'+'.png',
              }
            })
            }, function(response){
                console.log(response);
                // window.location.href = "/";
            });

        });
    })
</script>

@endsection