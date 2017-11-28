@extends('layouts.defaultfull')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
		<!-- <h4 class="page-header">Your's Betting</h4> -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $betitems[0]->matchdate->name }}  Total = {{ $currentbet }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>

								<th style="display: none;">id</th>

								<th>Your Bet</th>					
									
									<th>Match</th>	
									<th>Total</th>
									<!-- <th>Date</th> -->
								
							</tr>
						</thead>
						<tbody>
							@foreach($betitems as $betitem)
								<tr lass="odd gradeX">   
									<td style="display: none;">{{ $betitem->id }}</td>
									@if($betitem->bettype==="goals")
									<td>{{ $betitem->betmatch->upperteam->name }} g {{ $betitem->bet }} {{ $betitem->amount }} <br> {{ $betitem->betmatch->name }}</td>
									@else
										@if($betitem->bet==="upper")
											<td>{{ $betitem->betmatch->upperteam->name }} {{ $betitem->amount }} <br> {{ $betitem->betmatch->name }}</td>
										@else
											<td>{{ $betitem->betmatch->lowerteam->name }} {{ $betitem->amount }} <br> {{ $betitem->betmatch->name }}</td>

										@endif
									@endif
									
									<td>{{ $betitem->betmatch->hometeam->name }} vs {{ $betitem->betmatch->awayteam->name }} {{ $betitem->betmatch->result }}</td>
									

									@if($betitem->result==="win")
									<td style="background-color: green;"> + {{ $betitem->balance }}</td>
									@elseif($betitem->result==="lose")
									<td style="background-color: red;"> - {{ $betitem->balance }}</td>
									@else
									<td>{{ $betitem->balance }}</td>

									@endif
									<!-- <td>{{ $betitem->matchdate->name }}</td> -->


							
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
