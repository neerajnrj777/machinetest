@extends('dashboard.index')
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
</style>
@section('content')

<div class="row">
                <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="pasaword-form" action="{{ route('changepassword') }}" method="POST">
              <div class="box-body">
                <input type="hidden" class="form-control" name="id" id="ids" value="<?php if(isset($id))echo $id; ?>" placeholder="Name">
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control psw" id="psw" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="" required>
                </div>
              
              <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" name="cpassword" class="form-control psw" id="psw-dup" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="" required>
                </div>
                <span>
                <div id="message">
                                    <h3> Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                    <p id="specialchar" class="invalid">A <b>Special character</b></p>
                                    <p id="confirmpass" class="invalid">Must <b>Match to Password</b></p>
                                </div></span>
              </div>
              <div class="box-footer">
                <button type="submit" id="change_pass" class="btn btn-primary">Submit</button>
              </div>
              </div>
              <!-- /.box-body -->

              
            </form>
          </div>
          </div>
          </div>

@stop
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
    
    var password = $('#psw').val();
 
    $(".error").remove();
 
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