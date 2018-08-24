<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<title>Microsite-Nexcare</title>
	<!-- Fonts -->
	<link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}}" type="text/css" />
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/jquery.datetimepicker2.css')}}" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/app.css')}}?v=0.0.2" type="text/css" />
	<script src="{{ asset('js/jquery.js') }}"></script>
	@yield('style')
	@yield('js')	
</head>

<body>
		<div id="header" class="d-lg-none">
				<div id="sidebar" style="z-index: 2">
					<div class="toggle-btn" onclick="toggleSidebar()">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<ul style="padding-left: 20px;">
						<a href="{{route('Home')}}"><li>หน้าหลัก</li></a>
						<a href="{{route('Reward')}}"><li>กติกาและรางวัล</li></a>
						<a href="{{route('Registers')}}"><li>ส่งภาพ</li></a>
						<a href="{{route('Gallery')}}"><li>แกลเลอรี่</li></a>
						<a href="{{route('Content')}}"><li>รู้ก่อนลุย</li></a>
						<a href="{{route('Result')}}"><li>ประกาศผล</li></a>
					</ul>
				</div>
				<div>
					<br>
					<img src="{{asset('images/logo.png')}}" alt="header" style="width: 100%;height: auto;">
				</div>
		</div>
		<div id="tmp"  class="d-lg-none" style="background-image: url({{ asset('images/main_bg.png') }});">
			@yield('content')			
		</div>
		<div id="footer" class="d-lg-none">
			<img src="{{asset('images/footer_nexcare.png')}}" alt="footer" style="width: 100%;height: auto;">	
		</div>



	<!-- PC mode -->
	<div class="d-none d-lg-block">
		<div class="text-center pc">
			<h1>รองรับเฉพาะ mobile นะ</h1>
		</div>
	</div>
	<!-- script -->
	<script src="https://www.ninenik.com/js/jquery.datetimepicker.full.js"></script>
	<script src="{{ asset('js/script.js') }}?v=0.0.1"></script>

	<script src="{{ asset('js/moment.min.js') }}"></script>
	<script src="{{ asset('js/combodate.js') }}"></script>
	<script src="{{ asset('js/parsley.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<!-- modal auto show -->
	<script>
		$( document ).ready(function() {
		    $('#myModal').modal({show:true});		  
		}); 
	</script>
	<!-- combodate -->
	<!-- <script>
	    $(function(){
	        $('#date').combodate();    
	    });
	</script> -->
	<!-- parsley form -->
	<script>
	    $(function () {
	        var $sections = $('.form-section');
	      function navigateTo(index) {
	        // Mark the current section with the class 'current'
	        $sections
	          .removeClass('current')
	          .eq(index)
	            .addClass('current');
	        // Show only the navigation buttons that make sense for the current section:
	        $('.form-navigation .previous').toggle(index > 0);
	        var atTheEnd = index >= $sections.length - 1;
	        $('.form-navigation .next').toggle(!atTheEnd);
	        $('.form-navigation [type=submit]').toggle(atTheEnd);
	      }
	      function curIndex() {
	        // Return the current index by looking at which section has the class 'current'
	        return $sections.index($sections.filter('.current'));
	      }
	      // Previous button is easy, just go back
	      $('.form-navigation .previous').click(function() {
	        navigateTo(curIndex() - 1);
	      });
	      // Next button goes forward iff current block validates
	      $('.form-navigation .next').click(function() {
	        if ($('.demo-form').parsley().validate({group: 'block-' + curIndex()}))
	          navigateTo(curIndex() + 1);
	      });
	      // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
	      $sections.each(function(index, section) {
	        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
	      });
	      navigateTo(0); // Start at the beginning
	    });
	</script>
</body>
</html>