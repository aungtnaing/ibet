@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">BET Manager</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row">
<a class="btn btn-primary btn-mini pull-left" href="{{ route("bets.create") }}">Add New BET</a>	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					BET
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>

								<th>id</th>
									<th>title</th>					
									
									
									<th>hometeam</th>
									<th>awayteam</th>

									<th>bet name</th>
									<th>upperteam</th>
									<th>lowerteam</th>

									<th>result</th>
									<th>about</th>
									<th>date</th>
									<th></th>
									<th></th>
								
							</tr>
						</thead>
						<tbody>

						@foreach($bets as $bet)
								<tr lass="odd gradeX">   
									<td>{{ $bet->id }}</td>
									
									<td>{{ $bet->title }}</td>
									<td>{{ $bet->hometeam->name }}</td>
									<td>{{ $bet->awayteam->name }}</td>

									<td>{{ $bet->name }}</td>
									<td>{{ $bet->upperteam->name }}</td>
									<td>{{ $bet->lowerteam->name }}</td>

									<td>{{ $bet->result }}</td>
									<td>body {{ $bet->body }} . {{ $bet->bodypercentage }} % <br> goals+ {{ $bet->goals }} . {{ $bet->goalspercentage }} %</td>
									<td>{{ $bet->created_at }}</td>


									<td>
										<a class="btn btn-mini btn-primary" href="{{ route("bets.edit", $bet->id ) }}">Edit</a>
									</td>
									@if(Auth::user()->roleid==1 || Auth::user()->roleid==2)
									<td>
										<form method="POST" action="{{ route("bets.destroy", $bet->id) }}" accept-charset="UTF-8">
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
