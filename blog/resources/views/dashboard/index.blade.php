<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('../assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">


<link href="{{ asset('../assets/bower_components/Ionicons/css/ionicons.min.css')}}" rel="stylesheet">
<link href="{{ asset('../assets/css/AdminLTE.min.css')}}" rel="stylesheet">
<link href="{{ asset('../assets/css/skins/_all-skins.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
#pasaword-form #message { display: none; background: #f1f1f1; color: #000; position: relative; padding: 20px; margin-top: 10px; }
#pasaword-form #message p { padding: 10px 35px; font-size: 18px; }
/* Add a green text color and a checkmark when the requirements are right */
#pasaword-form .valid { color: green; }
#pasaword-form .valid:before { position: relative; left: -35px; content: "✔"; }
/* Add a red text color and an "x" when the requirements are wrong */
#pasaword-form .invalid { color: red; }
#pasaword-form .invalid:before { position: relative; left: -35px; content: "✖"; }
.sub-logo-img { margin-top: 10px !important; }



    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
</style>


</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
        <a href="../../index2.html" class="logo">
          <!-- LOGO -->
          AdminLTE
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{ asset('../assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sender Name
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Message Excerpt</p>
                        </a>
                      </li><!-- end message -->
                      ...
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="ion ion-ios-people info"></i> Notification title
                        </a>
                      </li>
                      ...
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      ...
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('../assets/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('../assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->name }}
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
        
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ route('changepassword') }}?ids={{ Auth::user()->id }}" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                     <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                      
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <div class="main-sidebar">
        <!-- Inner sidebar -->
        <div class="sidebar">
          <!-- user panel (Optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('../assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div><!-- /.user-panel -->

          <!-- Search Form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form><!-- /.sidebar-form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Menus</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{route('dashboard')}}"><span>Dashboard</span></a></li>
            @if(Auth::user()->is_admin ==1)
            <li><a href="{{route('userlist')}}"><span>Admin List</span></a></li>
            <li><a href="{{route('productlist')}}"><span>Product List</span></a></li>
            @endif
          </ul><!-- /.sidebar-menu -->

        </div><!-- /.sidebar -->
      </div>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php if(session('status') ) { 
      if(session('status')=='Success' ) { ?>
    <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?php echo session('message'); ?>
              </div>
<?php } } ?>
<?php if(session('statsus') ) { 
 if(session('status')=='error' ) {  ?>
    <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                <?php echo session('message'); ?>
              </div>
<?php } } ?>
      @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('../assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('../assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('../assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('../assets/js/demo.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function() { 
             
          $('#change_pass').click(function(e) {
    changevalidate();
});   


 myInput = $("#psw");
 myInput1 = $("#psw-dup");
 letter = $("#letter");
 capital = $("#capital");
 number = $("#number");
 length = $("#length");
 specialchar = $("#specialchar");
 confirmpass = $("#confirmpass");

// When the user clicks on the password field, show the message box
myInput.focus(function() {
    $("#message").css('display','block');
});
myInput1.focus(function() {
    $("#message").css('display','block');
});

// When the user clicks outside of the password field, hide the message box
myInput.blur(function() {
    $("#message").css('display','none');
});

// When the user starts to type something inside the password field
myInput1.blur(function() {
    $("#message").css('display','none');
});

myInput.keyup(function() { 
  passvalidate1();
});

myInput1.keyup(function() { 
  passvalidate2();
});

 $('#change_pass').click(function() {
    
    var first_name = $('#name').val();
    var email = $('#email').val();
    var password = $('#psw').val();
 
    $(".error").remove();
 
    if (first_name.length < 1) {
      $('#name').after('<span class="error">This field is required</span>');
      return false;
    }
    if (email.length < 1) {
      $('#email').after('<span class="error">This field is required</span>');
      return false;
    } else {
      var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
      var validEmail = regEx.test(email);
      
      if (validEmail) {
        $('#email').after('<span class="error">Enter a valid email</span>');
        return false;
      }
    }
    if (password.length != '') {
      var re=changevalidate();
      if(re==false){
      $('#password').after('<span class="error">Password does not match the requirements.</span>');
      return false;
    }
    }
    $('#pasaword-form').submit();
  });
 
});  

function passvalidate1() {
    
var val3=0;    

var upperCase= new RegExp('[A-Z]');
var lowerCase= new RegExp('[a-z]');
var numbers = new RegExp('[0-9]');
  // Conform Password Check
  if(myInput.val()==myInput1.val()) {
    confirmpass.removeClass("invalid");
    confirmpass.addClass("valid");
    val3=1;
    } else {
    confirmpass.removeClass("valid");
    confirmpass.addClass("invalid");
    val3=0;
    }

    // Validate lowercase letters
  
  if(myInput.val().match(lowerCase)) {  
    letter.removeClass("invalid");
    letter.addClass("valid");
    val3=1;
  } else {
    letter.removeClass("valid");
    letter.addClass("invalid");
    val3=0;
  }
  
  // Validate capital letters
  
  if(myInput.val().match(upperCase)) {  
    capital.removeClass("invalid");
    capital.addClass("valid");
    val3=1;
  } else {
    capital.removeClass("valid");
    capital.addClass("invalid");
    val3=0;
  }

  // Validate numbers
  
  if(myInput.val().match(numbers)) {  
    number.removeClass("invalid");
    number.addClass("valid");
    val3=1;
  } else {
    number.removeClass("valid");
    number.addClass("invalid");
    val3=0;
  }
  
  // Validate length
  if(myInput.val().length >= 8) {
    length.removeClass("invalid");
    length.addClass("valid");
    val3=1;
  } else {
    length.removeClass("valid");
    length.addClass("invalid");
    val3=0;
  }
  
  // Validate Special Character
  if(/^[a-zA-Z0-9- ]*$/.test(myInput.val()) == false) {
    specialchar.removeClass("invalid");
    specialchar.addClass("valid");
    val3=1;
} else {
    specialchar.removeClass("valid");
    specialchar.addClass("invalid");
    val3=0;
} 

if(val3==1) {
    return '1';
} else {
    return '0';
}

}

function passvalidate2() {
    
    // Conform Password Check
  if(myInput1.val()==myInput.val()) {
    confirmpass.removeClass("invalid");
    confirmpass.addClass("valid");
    return '1';
} else {
    confirmpass.removeClass("valid");
    confirmpass.addClass("invalid");
    return '0';
}
    
}

function changevalidate() {
//    $("#passchange1").submit(function(e){
//        e.preventDefault();
//    });
    var val1=passvalidate1();
    var val2=passvalidate2();
    if(val1==1 && val2==1) {
        //alert("yes");
     return true;
   
    } else {
        
       return false;
    }

}
</script>
</body>
</html>
