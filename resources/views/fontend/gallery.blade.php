@extends('fontend.inc.template')
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
 	function share($name){
 		FB.ui({
            method: 'share',
            mobile_iframe: false,
            // hashtag : "#nexventure2018",
            href: 'https://www.nexventure2018.com/share/'+$name,
            // description: 'your_description',
            action_properties: JSON.stringify({
              object: {
                'og:description': 'อวยพรวันแม่',
                'og:image': 'http://www.nexventure2018.com/imgs/'+$name,
              }
            })
            }, function(response){
                console.log(response);
                window.location.href = "/gallery";
            });
 	}
</script>
@endsection
@section('content')
<style>
	*{
		font-family: 'db_helvethaicamon_x75_bd';
		font-size: 22px;
		color: #001588;
	}
</style>
<div class="text-center" style="padding-top: 10px">
	<a class="my-topic" style="color: #ffffff;">GALLERY</a>
	<br>
	<div class="wrap tab-content" style="margin: 0px 30px 0px 30px;">
		<br>
<!-- Search button -->
		<form action="{{ route('Gallery') }}" method="GET" role="search" class="mb-3">
			<div class="input-group" style="width: 75%;margin-left: 12.5%">
				<input type="text" class="form-control" name="q" placeholder="Search..."> 
				<span class="input-group-btn">
					<button type="submit" class="btn btn-outline-default" style="height: 34px">
						<span class="fas fa-search"></span>
					</button>
				</span>
			</div>
		</form>
		
		@if(isset($users))
<!-- Pagination bar -->
			{{ $users->links('vender.pagination.custom') }}
			@foreach($users as $u)
				@if(!empty($u->image->image))
				<div class="row align-items-center mb-3">
					<div class="col-12 text-center">
						<img src="{{ asset('images/imgs/'.$u->image->image) }}" alt="frame" style="width: 90%; margin-bottom: 10px">
					</div>
					<div class="col-6">
						<p class="mb-0 pl-4 text-left" style="font-size: 24px;">น้อง {{ $u->child_name }}</p>				
					</div>
					<div class="col-6">
						<img src="{{ asset('images/share.png') }}" id='shareBtn' alt="share" style="width: 60%" onclick="share('{{ $u->image->image }}')">
					</div>
				</div>
				@endif
			@endforeach
		@else
			<p class="text-center">ไม่พบข้อมูล</p>
		@endif
	</div>
</div>
@endsection