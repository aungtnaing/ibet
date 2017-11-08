@extends('layouts.default')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">profile</a> </div>
    <!-- <h1>USER LISTS</h1> -->
  </div>
  <div class="container-fluid">
    <!--  <h1>Edit Profile</h1> -->

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
            <h5>Personal-info</h5>
          </div>
          <div class="widget-content nopadding">
            <form method="POST" action="{{ route("profiles.update", 0) }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" role="form">
              <input name="_method" type="hidden" value="PATCH">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a> 
                <i class="fa fa-coffee"></i>
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
              </div>
              <div class="text-center">

                <!-- <div class="image-upload"> -->
                <input style="display:none;" id="file-input" name="photourl" type='file' onchange="readURL(this);" />                    
                <label for="file-input">
                 <!--  -->
                 <i class="lnr lnr-camera"></i>...photo<br>
                 @if($user->photourl!="")
                 <img id="blah" src= "{{ $user->photourl }}" width="100" height="100">
                 @else
                 <img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
                 @endif
               </label>


             </div>


             <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">

               <input name="name" class="span11" value="{{ $user->name }}" placeholder="Enter Your Name" type="text" required>
             </div>
           </div>


          
          <div class="control-group">
            <label class="control-label">Email:</label>
            <div class="controls">
             <input class="span11" name="email" value="{{ $user->email }}" placeholder="Enter Your email" type="text" required>

           </div>
         </div>

         <div class="control-group">
         <label class="control-label">Phone1:</label>
          <div class="controls">
            <input class="span11" name="ph1" value="{{ $user->ph1 }}" placeholder="Enter Your phone1" type="text">
            
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">Address:</label>
          <div class="controls">

            <textarea name="address" placeholder="Enter your address" class="span11" rows="3">{{ $user->address }}</textarea>
          </div>
        </div>

       <div class="control-group">
          <label class="control-label">Bio:</label>
          <div class="controls">

            <textarea name="bio" placeholder="Enter your bio" class="span11" rows="3">{{ $user->bio }}</textarea>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">Password:</label>
          <div class="controls">
            <input class="span11" id="password1" name="password" type="password">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Confirm password:</label>
          <div class="controls">
            <input class="span11" id="password2" name="password_confirmation" type="password">
          </div>
        </div>



        <div class="form-actions">
         <input class="btn btn-primary" type="submit" value="Save Changes"> 
       </div>
     </form>
   </div>
 </div>


</div>
</div>
</div>
</div>


<script type="text/javascript">
 function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah')
      .attr('src', e.target.result)
      .width(150)
      .height(150);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

</script>
<script type="text/javascript">
  window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
  }
  function validatePassword(){
    var pass2=document.getElementById("password2").value;
    var pass1=document.getElementById("password1").value;
    if(pass1!=pass2)
      document.getElementById("password2").setCustomValidity("Passwords Don't Match");
    else
      document.getElementById("password2").setCustomValidity('');  
//empty string means no validation error
}
</script>
@stop