@extends('dashboard.index')

@section('content')

<div class="row">
                <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Product Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" id="prod-form" enctype="multipart/form-data" name="productaddform" action="{{ route('productadd')}}">
            <div class="box-body">

            <input class="form-control" id="idd" name="pid" type="hidden" aria-describedby="nameHelp" value="<?php if(isset($products[0]->pid))echo $products[0]->pid; ?>">

          <div class="form-group">
                <label for="exampleInputName">Product SKU</label>
                <input class="form-control" id="psku" name="productsku" type="text" aria-describedby="nameHelp" placeholder="Enter product SKU" value="<?php if(isset($products[0]->sku))echo $products[0]->sku; ?> " required="true">
          </div>
          <div class="form-group">
                <label for="exampleInputLastName">Product name</label>
                <input class="form-control" id="pname" name="productname" type="text" aria-describedby="nameHelp" placeholder="Enter product name" value="<?php if(isset($products[0]->pname))echo $products[0]->pname; ?> " required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Product price</label>
            <input class="form-control" id="price" name="productprice" type="text" aria-describedby="emailHelp" placeholder="Enter product price" value="<?php if(isset($products[0]->price))echo $products[0]->price; ?> " required="true">
          </div>
          <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <input class="form-control" id="status" name="status" type="text" placeholder="Enter product status" value="<?php if(isset($products[0]->status))echo $products[0]->status; ?> " required="true">
              </div>
              <div class="form-group">
                <label for="exampleConfirmPassword">Product Quantity</label>
                <input class="form-control" id="quantity" name="productquantity" type="text" placeholder="Enter product quantity" value="<?php if(isset($products[0]->quantity))echo $products[0]->quantity; ?> " required="true">
              </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Product Images</label>
                <input class="form-control" id="file" type="file" name="files[]" multiple="multiple" placeholder=""  required="true">
              </div>
          </div>
          <div class="box-footer">
          <button type="submit" id="prod-pass" value="Upload File" class="btn btn-primary">Submit</button>
          </div>
        </form>
          </div>
          </div>
          </div>

@stop
<script>

$(document).ready(function() { 

 $('#prod_pass').click(function() {
    $('.error').hide();
    var psku = $('#psku').val();
    var pname = $('#pname').val();
    var price = $('#price').val();
     var status = $('#status').val();
      var quantity= $('#quantity').val();
  
  var numbers = new RegExp('/^[a-zA-Z]+$/');
  var strreg = new RegExp('/^+[0-9]$/')

    $(".error").remove();
 alert("sa");
    if ((pname.match(numbers))) {
      $('#pname').after('<span class="error">This field is not a Numeric.</span>');
      return false;
    }
    if ((price.match(strreg))) {
      $('#price').after('<span class="error">This field must be Numeric</span>');
      return false;
    } 
    if ((status.match(number))) {
      
      $('#status').after('<span class="error">This field is not a Numeric.</span>');
      return false;
    
    }
    if ((quantity.match(strreg))) {
      $('#quantity').after('<span class="error">This field must be Numeric</span>');
      return false;
    } 
    $('#prod-form').submit();
  });
 
});  

</script>