@extends('dashboard.index')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="alert alert-success alert-dismissible" id="msg-msg" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Product Deleted Successfully...!
              </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <a href="{{ route('productadd')}}" style="float:right;" class="btn btn-primary">+ Add Product</a>
              <table class="table table-hover">
                <tr>
                  <th>Product SKU</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Status</th>
                  <th>Product Quantity</th>
                  <th>Images</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($products as $product) { ?>
                <tr id="<?php echo $product->pid; ?>">
                    <td><?php echo $product->sku; ?></td>
                    <td> <?php echo $product->pname; ?> </td>
                    <td><?php echo $product->price; ?></td>
                    <td><?php echo $product->status; ?></td>
                    <td><?php echo $product->quantity; ?></td>
                    <td><buttontype="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" onclick="return viewImage(<?php echo $product->pid; ?>)">View Images</button></td>
                    <td>
                      <a href="{{ route('productadd') }}?id=<?php echo $product->pid; ?>" class="btn btn-info">edit</a>
                      <a href="javascript:;" class="btn btn-danger" onclick="return productdelete(<?php echo $product->pid; ?>)">delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                
                  
            
                
              </table>

              <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
               <table class="table table-hover" id="imagetable">
              
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>



@stop
<script>
function productdelete(id) {
 
  $('#msg-msg').hide();
   $.ajax({
   
        type:"POST",
         url: "{{ route('productdelete') }}",
        data: {data1:id},
        success:function(responsedata){
               responsedata.trim();
              if(responsedata != '    no data') {
       $("#"+id).remove();
       $('#msg-msg').show();
     }
   }
});
    
    }

    function viewImage(id) {
 
  $("#imagetable").html('');  
   $.ajax({
   
        type:"POST",
         url: "{{ route('viewimage') }}",
        data: {data1:id},
        success:function(responsedata){
             
          if(responsedata != '    no data') {
      
              responsedata=JSON.parse(responsedata);
              
          
              var content="<tr><th>Image Name</th><th>Image</th><th>Action</th></tr>";
              var i;
              for (i = 0; i < responsedata.length; i++) {
                 content=content+"<tr class='"+responsedata[i].id+"' ><td>"+responsedata[i].imagename+"</td><td><img class='img-circle' style='width:50px; height:50px;' src='{{ url("/") }}/uploads/images/"+responsedata[i].imagename+"' /></td> <td><a href='javascript:;' class='btn btn-danger'  onclick='return imagedelete("+responsedata[i].id+")''>delete</a></td></tr>";
              }
                 $('#imagetable').append(content);
            } else {
            $("#imagetable").html('');          
                    
            }
        
     }
     
   
});
    
    }

    function imagedelete(id) {
 
  
   $.ajax({
   
        type:"POST",
         url: "{{ route('imgdelete') }}",
        data: {data1:id},
        success:function(responsedata){
               responsedata.trim();
              if(responsedata != '    no data') {
       $("."+id).remove();
     }
   }
});
    
    }
</script>