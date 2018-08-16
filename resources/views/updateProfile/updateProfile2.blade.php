@extends('layouts.app')

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif
        @section('title')<b>Edit user {{ ucfirst($user->name) }}</b>@endsection
        
<div class="container">
    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="img/avatar.png" alt="User Image">
                        <span class="username">
                          <a href="#">PonnuMaapillai</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="img/photo2.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="img/photo1.png" alt="Photo">
                              <img class="img-fluid" src="img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>                        
                      </div>
                      <!-- /.row -->
                            
                      
                          <div class="row">
                          
                        <div class="col-md-12"> 
                            <h3> Title. </h3>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur deleniti deserunt doloribus, voluptas explicabo ducimus autem voluptatibus. Aperiam, odio, repudiandae. </p>
                              
                        </div>
                        <div class="col-md-12"> 
                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                        </div>                                       
        </div>
        </div>        
    </div>
@endsection



@section('scripts')
       var numOfBrothers = null;
        var numOfBrotherStatus = null;

        function render(value) {
            numOfBrothers = value;
            document.getElementById('noofbrothersstatus').innerHTML = '';
            var option = '';
            for (var i = 0;i<= value;i++) {
                option += '<option value=' + i + '>' + i + '</option>'
            }
            document.getElementById('noofbrothersstatus').innerHTML = option;
        }
        function setstatus(val){
            numOfBrotherStatus = val;
        }

       var numOfsisters = null;
        var numOfsisterStatus = null;

        function response(value) {
            numOfsisters = value;
            document.getElementById('noofsistersstatus').innerHTML = '';
            var option = '';
            for (var i = 0;i<= value;i++) {
                option += '<option value=' + i + '>' + i + '</option>'
            }
            document.getElementById('noofsistersstatus').innerHTML = option;
        }

        function setsister(val){
            numOfsisterStatus = val;
        }
              $(function() {
    $('[name=noofbrothers] option').filter(function() { 
        return ($(this).html() == '<?php echo $user->noofbrothers; ?>'); //to select value from database
    }).prop('selected', true);
})
              $(function() {
    $('[name=noofsisters] option').filter(function() { 
        return ($(this).html() == '<?php echo $user->noofsisters; ?>'); //to select value from database
    }).prop('selected', true);
})
@endsection