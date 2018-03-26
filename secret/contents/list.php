<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Users List</h1>
          <p>All User List </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">User List</a></li>
        </ul>
      </div>
		<div class="row">
            <div class="col-md-12">
                <?php 
                    flash_msg( 'msg' );
                ?>
            </div>
                <div class="col-md-12">
                	<div class="tile ">
                        <div class="tile-title">
                                All Users View
                             	<a href="?page=add" class="float-right btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add User</a>
                        </div>
                      <div class="tile-body table-responsive">
                          <table class="table table-hover table-bordered dataTable">
                          		<thead class="table_head">
                            		<tr>
                                    	<th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <?php if($_SESSION['user_role']=='admin'){ ?>
                                        <th>Username/Role</th>
                                        <?php } ?>
                                        <th>Register Time</th>
                                        <th>Action</th>
                                    </tr>
                            	</thead>
                                <tbody>
                                    <?php 
                                    $sql = "SELECT * FROM users ORDER BY id DESC";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                    
                                        while($data = mysqli_fetch_assoc($result)) { ?>
                                	<tr>
                                    	<td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['phone']; ?></td>
                                        <?php if($_SESSION['user_role']=='admin'){ ?>
                                        <td><?php echo $data['username'].' / '.$data['role']; ?></td>
                                        <?php } ?>
                                        <td><?php echo date("d M Y - g:i A", strtotime( $data['created_at'])); ?></td>
                                        <td>
											<div class="btn-group btn-sm" role="group">
												<a class="btn btn-sm btn-info" href="?page=view&id=<?php echo $data['id']; ?>"><i class="fa fa-eye fa-lg"></i></a>
												<?php if($_SESSION['user_role']=='admin'){ ?>
												<a class="btn btn-sm btn-warning" href="?page=edit&id=<?php echo $data['id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
												<a class="btn btn-sm btn-danger" href="javascript:delete_confirm(<?php echo $data['id']; ?>)" ><i class="fa fa-trash fa-lg"></i></a>
												<?php } ?>
											</div>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                          </table>
                        </div>
                      <div class="tile-footer">
                        <div class="col-md-4">
                        	<a href="#" class="btn btn-sm btn-warning">EXCEL</a>
                            <a href="#" class="btn btn-sm btn-primary">PDF</a>
                            <a href="#" class="btn btn-sm btn-danger">SVG</a>
                            <a href="#" class="btn btn-sm btn-success">PRINT</a>
                        </div>
                        <div class="col-md-8">
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                </div><!--col-md-12 end-->
			</div>
    <script type="text/javascript">
    function delete_confirm(id)
    	{
    	var r=confirm("Do you really want to delete?");
    		if (r==true)
    		{
    			window.location="index.php?action=delete_u&id="+id+"&u=list";
    		}
    	}
    </script>
</main>