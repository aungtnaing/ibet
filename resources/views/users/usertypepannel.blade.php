@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->

<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">user lists</a> </div>
		<!-- <h1>USER LISTS</h1> -->
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">


				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
						<h5>USERS</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>#</th>

									<th>Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Ph1</th>
									<!-- <th>Ph2</th> -->
									<th>Address</th>
									<th>Fb</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach($users as $user)
								<tr lass="gradeX">   
									<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									@if($user->roleid==1)
									<td>Admin</td>
									@elseif($user->roleid==2)
									<td>Editor</td>
									@elseif($user->roleid==3)
									<td>Designer</td>
									@elseif($user->roleid==4)
									<td>Author</td>
									@elseif($user->roleid==5)
									<td>Circulator</td>
									@elseif($user->roleid==6)
									<td>Ad Manager</td>
									@else
									<td>User</td>
									@endif
									<td>{{ $user->ph1 }}</td>
									<!-- <td>{{ $user->ph2 }}</td> -->
									<td>{{ $user->address }}</td>
									<td>{{ $user->fburl }}</td>
									<td><a class="btn btn-mini btn-info" href="{{ route("profiles.show", $user->id ) }}">Role</a></td>
									@if(Auth::user()->roleid==1)

									<td class="center">
										<form method="POST" action="{{ route("profiles.destroy", $user->id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input class="btn btn-mini btn-danger" type="submit" value="Delete">
										</form>
									</td>
									@else
									<td></td>
									@endif

								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>


<script src="<?php echo url(); ?>/assets/js/jquery.min.js"></script> 
<script src="<?php echo url(); ?>/assets/js/jquery.ui.custom.js"></script> 
<script src="<?php echo url(); ?>/assets/js/bootstrap.min.js"></script> 
<script src="<?php echo url(); ?>/assets/js/jquery.uniform.js"></script> 
<script src="<?php echo url(); ?>/assets/js/select2.min.js"></script> 
<script src="<?php echo url(); ?>/assets/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo url(); ?>/assets/js/matrix.js"></script> 
<script src="<?php echo url(); ?>/assets/js/matrix.tables.js"></script>s
@stop