@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">TEAMS Manager</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
<a class="btn btn-primary btn-mini pull-left" href="{{ route("teams.create") }}">Add New Team</a>	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					TEAMS
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
									<th>id</th>
									<th>Main</th>					
									
									<th>Thum</th>
									
									<th>name</th>
									<th>mname</th>

								
									<th>about</th>
									<th></th>
									<th></th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($teams as $team)
								<tr lass="odd gradeX">   
									<td>{{ $team->id }}</td>
									<td><img src="{{ $team->photourl1 }}" width="200" height="100"></td>
									
										<td><img src="{{ $team->photourl2 }}" width="200" height="100"></td>
									<td>{{ $team->name }}</td>
										<td>{{ $team->mname }}</td>
											<td>{{ $team->about }}</td>
									<td>
										<a class="btn btn-mini btn-primary" href="{{ route("teams.edit", $team->id ) }}">Edit</a>
									</td>
									@if(Auth::user()->roleid==1 || Auth::user()->roleid==2)
									<td>
										<form method="POST" action="{{ route("teams.destroy", $team->id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input class="btn btn-mini btn-danger" type="submit" value="Delete">
										</form>
									</td>
									@endif
								</tr>
								@endforeach
					
						</tbody>
					</table>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>



  


@stop


