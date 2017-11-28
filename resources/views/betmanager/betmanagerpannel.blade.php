@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<!-- <h1 class="page-header">BET MANAGER</h1> -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					BET MANAGER
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>

							
									<th>id</th>
									<th>Date</th>
									<th>Your Bet</th>					
									<th>About</th>
									<th>Total</th>

									<th>Userinfo</th>
									<th></th>
									<!-- <th></th>
									<th></th> -->
								
								
							</tr>
						</thead>
						<tbody>


							@foreach($betitems as $betitem)
								<tr lass="odd gradeX">   
									<td>{{ $betitem->id }}</td>
									<td>{{ $betitem->matchdate->name }}</td>

									@if($betitem->bettype==="goals")
									<td><b>{{ $betitem->betmatch->upperteam->name }} g {{ $betitem->bet }} {{ $betitem->amount }}</b> <br>	{{ $betitem->betmatch->name }} <br> {{ $betitem->betmatch->hometeam->name }} vs {{ $betitem->betmatch->awayteam->name }} {{ $betitem->betmatch->result }} </td>
									@else
										@if($betitem->bet==="upper")
											<td><b>{{ $betitem->betmatch->upperteam->name }} {{ $betitem->amount }} </b><br>	{{ $betitem->betmatch->name }} <br> {{ $betitem->betmatch->hometeam->name }} vs {{ $betitem->betmatch->awayteam->name }} {{ $betitem->betmatch->result }} </td>
										@else
											<td><b>{{ $betitem->betmatch->lowerteam->name }} {{ $betitem->amount }} </b><br> {{ $betitem->betmatch->name }} <br> {{ $betitem->betmatch->hometeam->name }} vs {{ $betitem->betmatch->awayteam->name }} {{ $betitem->betmatch->result }} </td>

										@endif
									@endif
									<!-- <td>{{ $betitem->betmatch->name }}</td>
									<td>{{ $betitem->betmatch->hometeam->name }} vs {{ $betitem->betmatch->awayteam->name }} {{ $betitem->betmatch->result }}</td> -->
									
									<td>body {{ $betitem->betmatch->body }} . {{ $betitem->betmatch->bodypercentage }} % <br> goals+ {{ $betitem->betmatch->goals }} . {{ $betitem->betmatch->goalspercentage }} %</td>

									

									@if($betitem->result==="win")
									<td style="background-color: green;"> + {{ $betitem->balance }}</td>
									@elseif($betitem->result==="lose")
									<td style="background-color: red;"> - {{ $betitem->balance }}</td>
									@else
									<td>{{ $betitem->balance }}</td>
									@endif

									<td>{{ $betitem->user->name }}<br>{{ $betitem->user->ph1 }}</td>
									
									<td><a class="btn btn-mini btn-primary" href="{{ route("betitems.edit", $betitem->id ) }}">Update</a></td>

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



