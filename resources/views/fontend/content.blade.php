@extends('fontend.inc.template')
@section('content')
<div class="text-center">
	<br>
	<a class="my-topic article" style="color: white;">รู้ก่อนลุย</a>
	@if(count($contents) > 0 )
	@foreach ($contents as $content)
	<div class="tab-content text-left" style="padding: 15px;margin: 0px 30px 0px 30px;">
			<b>{{ $content->title }}</b><br>
			 {!! ($content->content) !!}
	</div>
	<br>
	@endforeach
	@else
	<div class="tab-content text-left" style="padding: 15px;margin: 0px 30px 0px 30px;">
			Coming Soon
	</div>
	<br>
	@endif
	<a href="{{route('Reward')}}" class="my-btn">เข้าร่วมกิจกรรม</a><br><br>
</div>
@endsection