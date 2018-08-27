@extends('fontend.inc.template')
@section('style')
	<meta property="og:url" content="https://www.nexventure2018.com/content/{{ $content->id }}" />
	<meta property="fb:app_id" content="287103768746468" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="{{ $content->title }}" />
	<meta property="og:description" content="Nexventure2018 ครอบครัวผจญภัย" />
	<meta property="og:image" content="{{ (!empty($content->img)) ? asset('uploads/' .$content->img) : asset('images/logo.png') }}" />
	<style>
		.tab-content p img {
			max-width: 100%;
			height: auto !important;
		}
	</style>
@endsection
@section('content')
<div class="text-center">
	<br>
	<a class="my-topic article" style="color: white;">รู้ก่อนลุย</a>
		<div class="tab-content text-left mb-3" style="padding: 15px;margin: 0px 30px 0px 30px; ">
			<b>{{ $content->title }}</b><br>
			 {!! ($content->content) !!}
		</div>
	<a href="{{route('Reward')}}" class="my-btn">เข้าร่วมกิจกรรม</a><br><br>
</div>
@endsection