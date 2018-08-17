@extends('backend.inc.template')
@section('title', 'Users Slide')
@section('content')
@if(Session::has('delete'))
    <div class="alert alert-success">
        {{Session::get('delete')}}
    </div>
@endif
	<div class="table-responsive">
		{{ $data->links() }} 
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Child</th>
                    <th>Join date</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
      		<tbpdy>
      			@foreach ( $data as $d)
				<tr>
					<td>
						{{ $d->id}}
					</td>
					<td>
						{{ $d->name }}
					</td>
					<td>
						{{ $d->child_name}}
					</td>
					<td>
						{{ $d->join_date}}
					</td>
					<td>
						<div class="form-group d-flex">
							<a href="{{ route('users.edit',$d->id) }}">
								<button type="button" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-pencil"></i> </button>
							</a>
							<form action="{{ route('users.destroy', $d->id) }}" method="post" onSubmit="return confirm_before_submit()">
								{{method_field('DELETE')}}
	    						{{ csrf_field() }}
								<button type="submit" value="submit" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-times"></i> </button>
							</form>
							
						</div>
					</td>
				</tr>
				@endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});

	function confirm_before_submit(){
		if(!confirm('Is the form filled out correctly?'))
		{
			return false;
		}
	}
</script>
@endsection