<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edit User</h1>
            <p>Edit a Exiting User </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Add User</a></li>
        </ul>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <?php 
                flash_msg( 'msg' );
            ?>
        </div>
        <div class="col-md-8 offset-md-2">
            <form class="form-horizontal" action="index.php?u=view&id=<?= $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                <div class="card ">
                    <div class="card-header">
                        <h4>Edit User 
                            <a href="?page=list" class="float-right btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User </a>
                        </h4>
                    </div>
                    <input type="hidden" name="edit_id" value="<?php echo (isset($_GET['id']) && $_GET['id']!=null ? $_GET['id'] : '' ) ?>">
                  <div class="card-body">
                    <?php 
                        $id = (isset($_GET['id']) && $_GET['id']!=null ? $_GET['id'] : '' );
                        $sql = "SELECT * FROM users WHERE id=$id";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        $data = mysqli_fetch_assoc($result);  ?>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Name </label>
                        <div class="col-sm-8">
                          <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                          <input type="email" name='email' class="form-control" value="<?php echo $data['email']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-8">
                          <input type="number" name="phone" class="form-control" value="<?php echo $data['phone']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">UserName</label>
                        <div class="col-sm-8">
                          <input type="text" disabled="disabled" class="form-control" value="<?php echo $data['username']; ?>">
                        </div>
                      </div>
                      
                      <?php if($_SESSION['user_id']==$data['id']) { ?>
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-8">
                          <input type="password" id="pass" name="pwd" class="form-control" placeholder="Enter Password">
                          <span class="err" id="pwd-err"><?php flash_msg( 'pwdErr') ; ?></span>
                        </div>
                      </div>
                      <?php } ?>
                      
                      <?php if($_SESSION['user_role']=='admin') { ?>
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">User Role</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="role">
                                <option <?php echo ($data['role']=='user' ? 'selected="selected"' : ''); ?> value="user">User</option>
                                <option <?php echo ($data['role']=='admin' ? 'selected="selected"' : ''); ?> value="admin">Admin</option>
                            </select>
                        </div>
                      </div>
                      <?php } ?>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Upload</label>
                        <div class="col-sm-8">
                          <input class="form-control" type="file" name="avator" accept="image/*">
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="card-footer text-center">
                    <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Update"/>
                  </div>
                </div>
                </form>
            </div><!--col-md-12 end-->
    </div>
</main>
            