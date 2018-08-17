@extends('fontend.inc.template')
@section('content')
<div class="text-center" style="padding-top: 10px">
	<form action="{{ url('/uploadpic') }}" method="POST" id="form_upload" enctype="multipart/form-data">
	{{ csrf_field() }}
	
		<a class="my-btn" style="color: #ffffff;" id="get_file_img"> 
			เลือกรูป
			<input type="file" id="input" accept="image/*" capture="camera">
		</a>
		<input type="hidden" name="image" >
		
		<br><br>
		@if($data == 1)
		<div class="container-fluid">
		<canvas id="frame-img" width="381" height="205">	
			<img src="{{asset('images/protect.png')}}" alt="frame" id="profile-img-tag" style="width: 100%;">
			<br><br>
		</canvas>	
		</div>
		@elseif($data == 2)
		<div class="container-fluid">		
			<img src="{{asset('images/activity.png')}}" alt="frame" id="profile-img-tag"  style="width: 100%;">
			<br><br>
		</div>
		@elseif($data == 3)
		<div class="container-fluid">		
			<img src="{{asset('images/manage.png')}}" alt="frame" id="profile-img-tag" style="width: 100%;">
			<br><br>
		</div>
		@elseif($data == 4)
		<div class="container-fluid">		
			<img src="{{asset('images/opportunity.png')}}" alt="frame" id="profile-img-tag"  style="width: 100%;">
			<br><br>
		</div>
		@endif
		<div class="container-fluid">
			<div class="p-3" style="background-color: #2161BF;color: #ffffff; z-index: -1">ตกแต่งให้สวยงามด้วย Sticker
			</div><button type="button" class="d-none" id="deletesticker">Delete</button>
			<div style="background-color:#6cd9ff ; z-index: 5" class="p-3" id="sticker">
				<img src="{{asset('images/stickers/barn.png')}}" alt="sticker_panel">
			</div>
			<br><br>
			
		</div>
	</form>
	<button class="my-btn" id="upload">ตกลง</button>
</div>
@endsection

@section('js')
<style>
 input[type="file"] {
  display: none;
 }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://unpkg.com/merge-images"></script>
<script src="{{ asset('js/fabric.js') }}"></script>
<script src="{{ asset('js/canvas-to-blob.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
	window.onload = function() {
		document.getElementById('get_file_img').onclick = function() {
			document.getElementById('input').click();
		};
	}
	var canvas =  new fabric.Canvas('frame-img');
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var img = document.getElementById('profile-img-tag');
            reader.onload = function (e) {

             // fabric.Image.fromURL(e.target.result, function(img){
             // 	canvas.add(img);
             	
             // });
            var picture = e.target.result ;
            picture.width =  800;
            picture.height = 800;
            console.log(e.target)
            mergeImages([
				  { src: picture , x: 0, y: 75  },
				  { src: '{{url('images/protect.png')}}', x: 0, y: 0 },
			  	]).then(b64 => {
				  // document.querySelector('#profile-img-tag').src = b64
				  document.querySelector('input[name=image]').value= b64
				fabric.Image.fromURL(b64, function(img){
	             	img.set({
	             		left: 0,
	             		top: 0, 
	             		angle: 00,
	             		scaleX:381/img.width, 
	             		scaleY:205/img.height
	             	})

	             	canvas.add(img);
	             	
	             	// canvas.randerAll.bind();

	             	canvas.item(1).selectable = false ;

	             	canvas.add(new fabric.Text("น้องวิน", {
	             		left:50,
	             		top:145,
	             		fontSize:16,
	             		fill:"black" ,
	             	})
	             	)
	             	canvas.item(2).selectable = false ;
	             });


			});

			 // $('#profile-img-tag').attr('src', e.target.result);


            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#input").change(function(){
        readURL(this);
        
        // var c = document.getElementById('frame-img');
        // var ctx = c.getContext('2d');
        // ctx.fillStyle = "#fff";
        var rect = new fabric.Rect({
		    width: 381,
		    height: 205,
		    top: 0,
		    left: 0,
		    fill: 'rgba(255,255,255,1)'
		  });
        canvas.add(rect);
        canvas.item(0).selectable = false ;
        
    });

    $("#sticker img").click(function(){
    	console.log(canvas.getObjects().length )

    	if(canvas.getObjects().length >  2 ){
    		$('#deletesticker').removeClass('d-none')
    	}else{
    		$('#deletesticker').addClass('d-none')
    	}
    	// var img = $(this).attr("src");
    	fabric.Image.fromURL(''+$(this).attr("src")+'', function(img){
	             	canvas.add(img);
	             })
	     
    });

    $('#deletesticker').click(function(){
    	deleteObjects();
    })
    function deleteObjects(){
    	var activeObject = canvas.getActiveObject()
    	
    	if (activeObject) {
    		if (confirm('Are you sure?')) {
    			canvas.remove(activeObject);
    		}
    	}
    	
    }
    $('#upload').click(function(e){
    	e.preventDefault();
    	// console.log(canvas.toDataURL())
    	var c = document.getElementById('frame-img');
    	document.querySelector('input[name=image]').value = canvas.toDataURL();
    	$('#form_upload').submit();
    	// canvas.getElement().toBlob(function(blob){
    	// 	console.log(blob)
    	// 	var formdata = new FormData($('#form_upload')[0]);
    	// 	formdata.append('photo',blob);
    	// 	$('#form_upload').submit();
    	// })
    })
});
</script>


@endsection