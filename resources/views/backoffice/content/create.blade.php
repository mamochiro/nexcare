@extends('layouts.backoffice')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Content</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('content.index') }}">Content</a></li>
            <li class="breadcrumb-item active">เพิ่ม</li>
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="col-md-10 offset-md-1">
            <div class="title-text">
                <label class="text-muted">* หมายเหตุ กรุณากรอกข้อมูลให้ครบ ก่อนกดปุ่ม Submit</label>
            </div>
            <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home8" role="tab"><span><i class="flag-icon flag-icon-th"></i></span></a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="home8" role="tabpanel">
                        <div class="p-20"> 
                        	<div class="form-group">
                                <div>
                                    <label for="">Title</label>
                                </div>
                                <div class="controls">
                                     <input type="text" name="title" class="form-control" required="">
                                </div>
                            </div>  
                            <div class="form-group">
                                <div>
                                    <label for="">Content</label>
                                </div>
                                <div class="controls">
                                     <textarea id="editor1" name="content" rows="50" cols="50"></textarea>
                                </div>
                            </div>  
                            <input class="btn btn-primary m-t-20" type="submit" value="เพิ่ม">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('js')
<script src=" {{asset('templateEditor/ckeditor/ckeditor.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    try{CKEDITOR.replace('editor1')}catch{}  
</script> 

@endsection
