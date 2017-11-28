	@extends('layouts.defaultfull')
	@section('content')
	<div id="content">
		<div id="content-header">
			<!-- <h3></h3> -->
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif	
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>{{ $bet->title }}</h5>
						</div>
						<div class="widget-content nopadding">
						<form action="{{ route("betitems.store") }}" method="POST" enctype="multipart/form-data">

								<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<ul class="thumbnails">
										<li>{{ $bet->hometeam->name }}</li>

										<li class="span3">
												<img src= "{{ $bet->hometeam->photourl1 }}" width="100" height="100">
												
										</li>
										<li>vs</li>
										
										<li class="span3">
											<img src= "{{ $bet->awayteam->photourl1 }}" width="100" height="100">

										</li>

										<li>{{ $bet->awayteam->name }}</li>

									</ul>
									<div class="form-group">
									<label>{{ $bet->name }}</label>
									</div>

									<div class="form-group">
									<label>{{ $error }}</label>

									</div>
								      <div class="form-group">
	                                            <label>Bet Type</label>
	                                            <label class="radio-inline">
	                                                <input type="radio" name="bettype" value="bodyup" checked>body up
	                                            </label>
	                                            <label class="radio-inline">
	                                                <input type="radio" name="bettype" value="bodydown">body down
	                                            </label>
	                                          
	                                        </div>


								<div class="form-group">
									<label>Amount : at least 5000 kyats</label>

								
									<input name="amount" value="0" type="number" onkeypress="return isNumberKey(event)"/>

								</div>

								 <div class="form-group">
	                                            <label>Bet Type</label>
	                                            <label class="radio-inline">
	                                                <input type="radio" name="gbettype" value="goalover" checked>goal over
	                                            </label>
	                                            <label class="radio-inline">
	                                                <input type="radio" name="gbettype" value="goalunder">goal under
	                                            </label>
	                                          
	                                        </div>


								<div class="form-group">
									<label>Amount : at least 5000 kyats</label>

									<input name="gamount" value="0" type="number" onkeypress="return isNumberKey(event)"/>


								</div>

								<div style="display: none;">
								<input name="betid" type="text" value="{{ $bet->id }}" />
								</div>




								<div class="form-group" style="display: none;">
									<input type="checkbox" name="active" value="1" checked>Active
								</div>




								<div class="form-actions">
									<input class="btn btn-primary" type="submit" value="Bet"> 
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
		function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
	</script>
	@stop