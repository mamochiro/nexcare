@extends('layouts.backoffice')

@section('content')

<div class="col-12">
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h3 class="text-themecolor">Content</h3>
        </div>
         <div class="col-md-6 align-self-center text-right d-none d-md-block">
            <a href="{{ route('content.create') }}">
                <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> เพิ่ม</button>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="row m-t-5 m-l-15 text-right">
           {{--  {!! Form::open(['method' => 'GET', 'route' => ['location.index'],'class' => 'form-material text-left col-4 p-r-40']) !!}
                {{ Form::text('s',isset($s) ? $s : '',['placeholder' => 'ค้นหา','class' => 'form-control col-10' ]) }}
                {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-inverse waves-effect waves-light'] )  }}
            {!! Form::close() !!} --}}
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{ $item->title }}</td>
                            <td>{!! $item->content !!}</td>
                            <td>{!! $item->created_at !!}</td>
                            <td class="d-flex">
                                <a href="{{ route('content.edit',$item->id) }}" class="btn btn-sm btn-warning btn-circle m-r-10"><i class="fa fa-pencil"></i></a>
                                <form method="POST" action="{{ route('content.destroy',$item->id) }}">
                                     {!! method_field('DELETE') !!}
                                     @csrf
                                    <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm_delete()">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div>
                    Showing {{($careers->currentpage()-1)*$careers->perpage()+1}} to {{$careers->currentpage()*$careers->perpage()}}
                    of  {{$careers->total()}} entries
                </div>
                <div class="pull-right pagination">
                    {{ $careers->appends(\Request::except('page'))->render() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function confirm_delete() {
  return confirm('ท่านแน่ใจว่าต้องการลบข้อมูลออกจากระบบ ?');
}
</script>
@endsection