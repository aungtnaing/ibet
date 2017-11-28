@extends('layouts.default')
@section('content')


<div id="content">
	<div id="content-header">
		<!-- <div id="breadcrumb"> <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">edit mainslie</a> </div> -->
		<h3>BET</h3>

	</div>
	<div class="container-fluid">

		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif  
		<hr>

		<div class="row-fluid">

		<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>bet-infoe</h5>
					</div>
					<div class="widget-content">

					<form action="{{ route("bets.update", $bet->id) }}" method="POST" enctype="multipart/form-data">
							<input name="_method" type="hidden" value="PATCH">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							

					        <div class="form-group">
					        <label>Match Title :</label>
					          <select name="title" lass="form-control">
					          	<option value="{{ $bet->title }}">{{ $bet->title }}</option>
					            <option>Premier League</option>
					            <option>Serie A</option>
					            <option>Bundesliga</option>
					            <option>LaLiga</option>
					            <option>Champions League</option>
					           	<option>World Cup</option>
					            <option>UEFA Qualification</option>
					            <option>Asia Cup</option>
					            <option>Asia Cup Qualification</option>
					           

					          </select>
					        </div>
							
							

							<div class="form-group">
								<label>Bet Name :</label>

								<input type="text" class="form-control" value="{{ $bet->name }}" name="name" placeholder="Enter bet name">

							</div>


							<div class="form-group">
								<label>Bet Name Myanamr:</label>

								<input type="text" class="form-control" value="{{ $bet->mname }}" name="mname" placeholder="Enter bet name myanmar">

							</div>


					        <div class="form-group">
					        <label>Home team :</label>
					          <select name="hometeam" lass="form-control">
					          	<option value="{{ $bet->hometeamid }}">{{ $bet->hometeam->name }}</option>

					          	@foreach($teams as $team)
					            <option value="{{ $team->id }}">{{ $team->name }}</option>
					           
					           @endforeach

					          </select>
					        </div>


					        <div class="form-group">
					        <label>Away team :</label>
					          <select name="awayteam" lass="form-control">
					          	<option value="{{ $bet->awayteamid }}">{{ $bet->awayteam->name }}</option>
					          	@foreach($teams as $team)
					            <option value="{{ $team->id }}">{{ $team->name }}</option>
					           
					           @endforeach

					          </select>
					        </div>



					        <div class="form-group">
					        <label>Upper team :</label>
					          <select name="upperteam" lass="form-control">
					          	<option value="{{ $bet->upperteamid }}">{{ $bet->upperteam->name }}</option>
					          	@foreach($teams as $team)
					            <option value="{{ $team->id }}">{{ $team->name }}</option>
					           
					           @endforeach

					          </select>
					        </div>



					        <div class="form-group">
					        <label>Lower team :</label>
					          <select name="lowerteam" lass="form-control">
					          	<option value="{{ $bet->lowerteamid }}">{{ $bet->lowerteam->name }}</option>
					          	@foreach($teams as $team)
					            <option value="{{ $team->id }}">{{ $team->name }}</option>
					           
					           @endforeach

					          </select>
					        </div>

					        <div class="form-group">
					        <label>Mainslide :</label>
					          <select name="mainslide" lass="form-control">
					          	<option value="{{ $bet->mainslideid }}">{{ $bet->mainslide->photourl1 }}</option>
					          	@foreach($mainslides as $mainslide)
					            <option value="{{ $mainslide->id }}">{{ $mainslide->photourl1 }}</option>
					           
					           @endforeach

					          </select>
					        </div>

					        <div class="form-group">
								<label>Result :</label>

								<input type="text" class="form-control" value="{{ $bet->result }}" name="result" placeholder="Enter result">

							</div>



					        <div class="form-group">
					        <label>win body :</label>

					       

					          <select name="body" lass="form-control">
					          	 <option value="{{ $bet->body }}">{{ $bet->body }}</option>
					      		<option value="equal">equal</option>
					            <option value="upper">upper</option>
					           <option value="lower">lower</option>
					          

					          </select>
					        </div>

							<div class="form-group">
								<label>body %:</label>

								<input type="text" class="form-control" name="bodypercentage" value="{{ $bet->bodypercentage }}" placeholder="Enter body percentage">

							</div>

							 <div class="form-group">
					        <label>win goals +:</label>


					          <select name="goals" lass="form-control">
					          		<option value="{{ $bet->goals }}">{{ $bet->goals }}</option>

					      		<option value="equal">equal</option>
					            <option value="upper">upper</option>
					           <option value="lower">lower</option>
					          

					          </select>
					        </div>

							<div class="form-group">
								<label>goals+ %:</label>

								<input type="text" class="form-control" name="goalspercentage" value="{{ $bet->goalspercentage }}" placeholder="Enter goals percentage">

							</div>





							<div class="form-group">

							@if($bet->active==0)
									<input type="checkbox" name="active" value="">Active<br>  
									@else   
									<input type="checkbox" name="active" value="" checked>Active<br>
									@endif
         
        </div>

							
							




								<div class="form-actions">
									<input class="btn btn-primary" type="submit" value="Save"> 
								</div>
							</form>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>



	<script src="<?php echo url(); ?>/assets/js/jquery.min.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/jquery.ui.custom.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/bootstrap.min.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/bootstrap-colorpicker.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/bootstrap-datepicker.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/jquery.toggle.buttons.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/masked.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/jquery.uniform.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/select2.min.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/matrix.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/matrix.form_common.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/wysihtml5-0.3.0.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/jquery.peity.min.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/bootstrap-wysihtml5.js"></script> 

	<script>
		$('.textarea_editor').wysihtml5();
	</script>

	<script type="text/javascript">




// $(document).ready(function(){
//     $("#file-input1").on('change',function(){
//         //do whatever you want
//         document.getElementById("preview1").src = $(this).src;
//     });
// });
function readURL(input) {


	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah')
			.attr('src', e.target.result)
			.width(100)
			.height(100);

		};

		reader.readAsDataURL(input.files[0]);
	}
}


function readURL1(input) {


	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah1')
			.attr('src', e.target.result)
			.width(100)
			.height(100);

		};

		reader.readAsDataURL(input.files[0]);
	}
}


</script>
@stop

