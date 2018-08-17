@extends('fontend.inc.template')
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
		<form action="{{route('Gallery')}}" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group" style="width: 75%;margin-left: 12.5%">
				<input type="text" class="form-control" name="q" placeholder="Search..."> 
				<span class="input-group-btn">
					<button type="submit" class="btn btn-outline-default" style="height: 34px">
						<span class="fas fa-search"></span>
					</button>
				</span>
			</div>
		</form>
		
		@if(isset($details))
<!-- Pagination bar -->
			{{ $details->links('vender.pagination.custom') }}
			@foreach($details as $u)
				<img src="{{asset('images/protect.png')}}" alt="frame" style="width: 80%; margin-bottom: 10px">
				<div class="row">
					<div class="col-6">
						<p style="font-size: 35px;">น้อง {{ $u->child_name }}</p>				
					</div>
					<div class="col-6">
						<img src="{{asset('images/share.png')}}" alt="share" style="width: 60%">
					</div>
				</div>
			@endforeach
		@elseif(isset($message))
			<p>{{ $message }}</p>
		@endif
	</div>
</div>
@endsection