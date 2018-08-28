@extends('layouts.backoffice')
<style type="text/css">
    h6.card-subtitle.mb-2.text-muted{
    color: #212529 !important;
}
</style>
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">User Count</h5>
            <h6 class="card-subtitle mb-2 text-muted">สมาชิกที่เข้ามาลงทะเบียนทั้งหมด</h6>
            <p class="card-text">{{ $usersCount }} ท่าน</p>
       <!--  <a href="#" class="card-link">Card link</a>
       <a href="#" class="card-link">Another link</a> -->
   </div>
</div>
</div>
<div class="col-sm-6">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Photo Count</h5>
        <h6 class="card-subtitle mb-2 text-muted">มีผู่เล่นที่ร่วมกิจกรรมโดยการอัพโหลดรูปภาพ</h6>
        <p class="card-text">{{ $photosCount }} ภาพ</p>
       <!--  <a href="#" class="card-link">Card link</a>
       <a href="#" class="card-link">Another link</a> -->
        </div>
    </div>
</div>
</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="card" style="width: 18rem; background-color: #80C950; ">
            <div class="card-body">
                <h5 class="card-title" style="color:#fff;">มีผู้ที่เลือกพ่อแม่ในแบบที่ 1 </h5>
                <h6 class="card-subtitle mb-2 text-muted" style="color:#fff;">อยากให้ลูกเรียนรู้
                        แต่ไม่อยากให้อยู่ห่างสายตา
                        ลูกทำอะไร ต้องอยู่ด้วยเสมอ</h6>
                <p class="card-text" style="color:#fff;">{{ $choice1 }}  ท่าน</p>
                <!--  <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card" style="width: 18rem; background-color: #F99030;">
            <div class="card-body">
                <h5 class="card-title" style="color:#fff;">มีผู้ที่เลือกพ่อแม่ในแบบที่ 2</h5>
                <h6 class="card-subtitle mb-2 text-muted" style="color:#fff;">ชอบชวนลูกผจญภัย
                        สนุกเรียนรู้ไปด้วยกัน
                        ลุยทำกิจกรรมทุกที่
                        </h6>
                <p class="card-text" style="color:#fff;">{{ $choice2 }} ท่าน</p>
                <!--  <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card" style="width: 18rem; background-color: #367ADD;">
            <div class="card-body">
                <h5 class="card-title" style="color:#fff;">มีผู้ที่เลือกพ่อแม่ในแบบที่ 3</h5>
                <h6 class="card-subtitle mb-2 text-muted" style="color:#fff;">
                        อยากให้ลูกออกไปเรียนรู้
                        แต่ต้องมั่นใจว่าปลอดภัย
                        เครื่องป้องกันแน่น
                </h6>
                <p class="card-text" style="color:#fff;">{{ $choice3 }} ท่าน</p>
                <!--  <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card" style="width: 18rem; background-color: #1CB0C4;">
            <div class="card-body">
                <h5 class="card-title" style="color:#fff;">มีผู้ที่เลือกพ่อแม่ในแบบที่ 4</h5>
                <h6 class="card-subtitle mb-2 text-muted" style="color:#fff;">พร้อมให้ลูกลุย
                        ล้มบ้าง เลอะบ้าง เจ็บบ้าง
                        ไม่เป็นไร อย่างน้อยก็ได้เรียนรู้</h6>
                <p class="card-text" style="color:#fff;">{{ $choice4 }} ท่าน</p>
                <!--  <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
        </div>
    </div>
</div>

<h2 style="color:blue;">ค้นหา User</h2>
<p style="color:blue;" >ค้นหา user โดยใส่ชื่อที่ต้องการค้นหา</p>  
<input style="color:blue;" class="form-controller" id="search" name="search" type="text" placeholder="Search..">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">โทรศัพท์</th>
      <th scope="col">อีเมลล์</th>
      <th scope="col">ชื่อของลูก</th>
      <th scope="col">วันเกิดของลูก</th>
      {{-- <th scope="col">ที่อยู่</th> --}}
      <th scope="col">จังหวัด</th>
      <th scope="col">วันที่เข้าร่วม</th>
      <th scope="col">หัวข้อที่เลือก</th>
      <th scope="col">รูปภาพ</th>
  </tr>
</thead>
<tbody>
    @foreach( $users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->mail }}</td>
      <td>{{ $user->child_name }}</td>
      <td>{{ $user->child_date }}</td>
      {{--  <td>{{ $user->address }}</td> --}}
      <td>{{ $user->province }}</td>
      <td>{{ $user->join_date }}</td>
      <td>{{ $user->choice }}</td>
      @if(isset($user->image))
      <td><a href="https://www.nexventure2018.com/images/imgs/{{$user->image}}">
        View</a></td>
        @else
        <td>ไม่ได้อัพโหลดรูปภาพ</td>
        @endif
    </tr>
    @endforeach
</tbody>
</table>
<div class="container text-center" >
    {{ $users->links() }}
</div>
{{-- </div> --}}


<script type="text/javascript">
    $('#search').on('keyup',function(){     
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : 'https://www.nexventure2018.com/search',
            data:{'search':$value},
            success:function(data){
                $('tbody').html(data);
                // console.log($value);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection