@extends('fontend.inc.template')
@section('style')
<link rel="stylesheet" type="text/css" href="{{  asset('css/cropper.min.css') }}">
<style>
   /* .container {
      max-width: 640px;
      margin: 20px auto;
    }
    img {
      max-width: 100%;
    }
    .cropper-view-box,
    .cropper-face {
      border-radius: 50%;
    }*/
</style>
@endsection
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
		<div class="container-fluid" id="profile-img-tag"><img src="{{asset('images/' . $image)}}" alt="frame"  style="width: 100%;">
			<br><br>
		</div>
		<div class="container-fluid frame-img d-none">
		
		<canvas id="frame-img" width="381" height="205" >	
			
		</canvas>
		<br><br>	
		</div>
		
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

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">ครอบตัดรูปภาพของท่าน</h5>
				<button type="button" class="close" style="margin-left:0;" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
	  </button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<img id="image" src="">
				</div>
			</div>
			<div class="modal-footer">
				<div class="col-md-6 col-6">
					<button type="button" class="btn btn-default" style="width:100%;" data-dismiss="modal">ยกเลิก</button>
				</div>
				<div class="col-md-6 col-6">
					<button type="button" class="btn btn-primary" style="width:100%;" id="crop">ครอบตัด</button>
				</div>
			</div>
		</div>
	</div>
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
<script src="<?=asset('js/cropper.min.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	window.onload = function() {
		document.getElementById('get_file_img').onclick = function() {
			document.getElementById('input').click();
		};
		
	}
	var wHeight = $(window).height()
    var wWidth = $(window).width()-30
	var size = resize(381, 205, wHeight, wWidth)
	var $modal = $('#modal');
	var cropper;
	var cropBoxData;
	var canvasData;
	var images = document.getElementById('image')

	var done = function(url) {
				images.src = url;
				$('#image').hide();
				$modal.modal('show');
			};


	$('#frame-img').attr('width' , size.width).attr('height' , size.height);
	var canvas =  new fabric.Canvas('frame-img');
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var img = document.getElementById('profile-img-tag');
            reader.onload = function (e) {
            		done(reader.result);
	        }
	        reader.readAsDataURL(input.files[0]);
        }
    }

    $("#input").change(function(){
        readURL(this);
        
        var rect = new fabric.Rect({
		    width: size.width,
		    height: size.height,
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
    		canvas.remove(activeObject);
    	}
    	
    }
    $('#upload').click(function(e){
    	e.preventDefault();
    	var c = document.getElementById('frame-img');
    	document.querySelector('input[name=image]').value = canvas.toDataURL();
    	$('#form_upload').submit();

    })
    

    function resize(srcWidth, srcHeight, maxHeight, maxWidth) {

        var ratio = [maxWidth / srcWidth, maxHeight / srcHeight ];
        ratio = Math.min(ratio[0], ratio[1]);

        return { width:srcWidth*ratio, height:srcHeight*ratio };
     }

     $('#modal').on('shown.bs.modal', function () {
     	cropper = new Cropper(image, {
     		dragMode: 'move',
     		aspectRatio: 1 / 1,
     		autoCropArea: 1,
     		restore: false,
     		guides: false,
     		center: false,
     		highlight: false,
     		cropBoxMovable: false,
     		cropBoxResizable: false,
     		toggleDragModeOnDblclick: false,
     		ready: function () {
				//Should set crop box data first here
				cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
			}
		});
     }).on('hidden.bs.modal', function () {
     	cropBoxData = cropper.getCropBoxData();
     	canvasData = cropper.getCanvasData();
     	cropper.destroy();
     });

    function merge(picture) {

     	canvas.add(new fabric.Text('{{ $data2 }}', {
         		left:50,
         		top:145,
         		fontSize:60,
         		fill:"black" ,
         	})
     	)
     	canvas.item(1).selectable = false ;
     	
    	mergeImages([
		  { src: picture , x: 0, y: 75  },
		  { src: '{{url('images/' . $image)}}', x: 0, y: 0 },
		  { src: canvas.item(1).toDataURL() ,x:300 ,y:720},
	  	])
    	.then(b64 => {

			$('#profile-img-tag').remove()
			$('.frame-img').removeClass('d-none')
			document.querySelector('input[name=image]').value= b64
			fabric.Image.fromURL(b64, function(img) {
             	img.set({
             		left: 0,
             		top: 0, 
             		angle: 00,
             		scaleX:size.width/img.width, 
             		scaleY:size.height/img.height
             	})
				canvas.add(img);
				canvas.item(2).selectable = false;
        	});
		});
    }

    document.getElementById('crop').addEventListener('click', function() {
		var initialAvatarURL;
		var cropperCavas;
		$modal.modal('hide');
		if (cropper) {
			cropperCavas =  cropper.getCroppedCanvas({
								width: 800,
								height: 800,
								// minWidth: 256,
								//  minHeight: 256,
								//  maxWidth: 4096,
								//  maxHeight: 4096,
								 fillColor: '#fff',
								 imageSmoothingEnabled: false,
								 imageSmoothingQuality: 'low',
							});
			merge(cropperCavas.toDataURL())
		}
	})


});
</script>


@endsection