@extends('layouts.backoffice')

@section('content')
<div class="container">
  <div class="alert alert-info" style="text-align: center;" id="toppic" role="alert">
    Export Database จากตารางที่ต้องการ
  </div>
  <div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-info" id="user">Users(ผู้ใช้งาน)</button>
    </div>
    <div class="col-md-6">
      <button type="button" class="btn btn-info" id="photo">Photos(รูปภาพ)</button>
    </div>
{{--     <div class="col-md-3">
      <button type="button" class="btn btn-info" id="log">logs(ประวัติการโหวต)</button>
    </div>
    <div class="col-md-3">
      <button type="button" class="btn btn-info" id="barcode1">Barcode1(barcode1)</button>
    </div>
    <div class="col-md-2">
      <button type="button" class="btn btn-info" id="barcode2">Barcode2(barcode2)</button>
    </div> --}}
  </div>
</div>
@endsection
@section('js')
<script>
   $(document).ready(function(){
      $("#photo").click(function(){
          window.location.href = '/exportPhoto';
      });
      $("#user").click(function(){
          window.location.href = '/exportUser';
      });
      // $("#log").click(function(){
      //     window.location.href = '/exportLog';
      // });
      // $("#barcode1").click(function(){
      //     window.location.href = '/exportBarcode1';
      // });
      // $("#barcode2").click(function(){
      //     window.location.href = '/exportBarcode2';
      // });
  });
</script>
@endsection