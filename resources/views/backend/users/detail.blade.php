@extends('backend.inc.template')
@section('title', 'Detail Users')
@section('content')
	<label>ชื่อ-นามสกุล : {{ $data->name}}</label>    
    <label>เบอร์ติดต่อ : {{ $data->phone}}</label>  
    <label>อีเมลล์ : {{ $data->mail}}</label>   
    <label>ชื่อเล่นลูก : {{ $data->child_name}}</label>
    <label>วันเกิดลูก : {{ $data->child_date}}</label>
    <label>ที่อยู่ : {{ $data->address}}</label>
    <label>จังหวัด : {{ $data->province}}</label>
    <label>รหัสไปรษณีย์ : {{ $data->post_code}}</label>
    <label>วันไปร่วมกิจกรรม : {{ $data->join_date}}</label>

    <a href="{{ url()->previous() }}">
        <button type="button" class="btn btn-outline-primary" >Back</button>
    </a>
@endsection
@section('js')
@endsection

