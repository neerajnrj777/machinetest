@extends('dashboard.index')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>email</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td> <?php echo $user->name; ?> </td>
                    <td><?php echo $user->email; ?></td>
                    <td><a href="{{ route('useredit') }}?id=<?php echo $user->id; ?>">edit</a></td>
                  </tr>
                  <?php } ?>
                
                  
            
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@stop
