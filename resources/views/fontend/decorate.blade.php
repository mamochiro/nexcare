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
    input[type="file"] {
	  display: none;
	}
</style>
@endsection
@section('content')
<div class="text-center" style="padding-top: 10px">
	<form action="{{ url('/uploadpic') }}" method="POST" id="form_upload" enctype="multipart/form-data">
	{{ csrf_field() }}
		<input type="file" id="input" accept="image/*" capture="camera">
		<label class="my-btn btn-custom" style="color: #ffffff;" for="input"> 
			เลือกรูป
		</label>
		<input type="hidden" name="image" >
		
		<br><br>
		<div class="container-fluid" id="profile-img-tag">
			<img src="{{asset('images/' . $image)}}" alt="frame"  style="width: 100%;">
			<br><br>
		</div>
		<div class="container-fluid frame-img d-none mb-3">
			<canvas id="frame-img">	
		</canvas>
		</div>
		<button type="button" class="d-none my-btn mx-auto btn-custom flex-column align-items-center" id="deletesticker">
			ลบสติกเกอร์
			<span>* เลือกสติกเกอร์ที่ต้องการลบ แล้วกดปุ่มนี้</span>
		</button>
		<div class="container-fluid sticker d-flex flex-column align-items-center">
			<div class="px-3 py-2 sticker-title">
				ตกแต่งให้สวยงามด้วย Sticker
			</div>
			<div class="py-2 sticker-item col-12" id="sticker">
				@for($i=1; $i <= 13; $i++)
				<img src="{{ asset('images/stickers/'.$i.'.png') }}" alt="sticker_panel">
				@endfor
			</div>
		</div>
		<div class="remark d-flex my-1">* กด Sticker ที่ต้องการเพิ่ม</div>
	</form>
	<button class="my-btn btn-custom my-3" id="upload" disabled="disabled">ตกลง</button>
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
					<button type="button" class="btn btn-primary" style="width:100%;" id="crop" onclick="">ครอบตัด</button>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
<script src="https://unpkg.com/merge-images"></script>
<script src="{{ asset('js/fabric.js') }}"></script>
<script src="{{ asset('js/cropper.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	var wHeight = $(window).height()
    var wWidth = $(window).width() - 30
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
        
    });

    $("#sticker img").click(function(){
    	console.log(canvas.getObjects().length )

    	posX = (size.width / 2) * Math.random();
	    posY = (size.height / 2) * Math.random();
    	fabric.Image.fromURL(''+$(this).attr("src")+'', function(img) {
    				img.set({
    					left : posX,
    					top : posY,
    					scaleY: 0.5,
				        scaleX: 0.5,
				        originX: "center", 
				        originY: "center"
    				})
	             	canvas.add(img).setActiveObject(img);
	             })

    	if(canvas.getObjects().length >  2 ){
    		$('#deletesticker').removeClass('d-none').addClass('d-flex')
    	}else{
    		$('#deletesticker').addClass('d-none').removeClass('d-flex')
    	}
    });

    $('#deletesticker').click(function(){
    	deleteObjects();
    })
    function deleteObjects(){
    	var activeObject = canvas.getActiveObject()
    	if (activeObject) {
    		canvas.remove(activeObject);
    	}
    	setTimeout(function() {
    		if(canvas.getObjects().length-1 >  2 ){
	    		$('#deletesticker').removeClass('d-none').addClass('d-flex')

	    	}else{
	    		$('#deletesticker').addClass('d-none').removeClass('d-flex')
	    	}
    	},100)
    	
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
     		aspectRatio: 6 / 6,
     		autoCropArea: 1,
     		restore: false,
     		guides: false,
     		center: true,
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

     canvas.on('object:added', )

    function merge(picture) {
    	canvas.clear()
    	var rect = new fabric.Rect({
		    width: size.width,
		    height: size.height,
		    top: 0,
		    left: 0,
		    fill: 'rgba(255,255,255,1)'
		  });
        canvas.add(rect);
        canvas.item(0).selectable = false ;

     	canvas.add(new fabric.Text('{{ $data2 }}', {
         		// left:50,
         		// top:145,
         		id: 'name',
         		fontSize: 84,
         		fontFamily: 'db_helvethaicamon_x75_bd',
         		fill:"black" ,
         	})
     	)
     	canvas.item(1).selectable = false ;
     	console.log(canvas.item(1).width)
    	mergeImages([
		  { src: picture , x: 40, y: 60  },
		  { src: '{{url('images/' . $image)}}', x: 0, y: 0 },
		  { src: canvas.item(1).toDataURL() ,
		  	x: (234 + (canvas.item(1).width / 2) / 2),
		  	y: 700
		  },
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

        	$('label[for=input]').text('เลือกรูปใหม่')

        	$('#upload').attr('disabled', false)
		});
    }

    $('#crop').on('click', function() {
		var initialAvatarURL;
		var cropperCavas;
		$modal.modal('hide');
		if (cropper) {
			cropperCavas =  cropper.getCroppedCanvas({
								width: 800,
								height: 2000,
								// minWidth: 256,
								// minHeight: 256,
								// maxWidth: 1000,
								// maxHeight: 1000,
								fillColor: '#fff',
								imageSmoothingEnabled: false,
								imageSmoothingQuality: 'low',
							});
			merge(cropperCavas.toDataURL())
		}
	})
  //   function objectMovedListener(ev) {
  //   let target = ev.target;
  //   console.log('left', target.left, 'top', target.top, 'width', target.width * target.scaleX, 'height', target.height * target.scaleY);
  // }
  // function objectAddedListener(ev) {
  //   let target = ev.target;
  //   // console.log('left', target.left, 'top', target.top, 'width', target.width, 'height', target.height);
  //   console.log(target)
  // }
	 //  canvas.on('object:added', objectAddedListener);
  //   canvas.on('object:modified', objectMovedListener);

});
</script>


@endsection