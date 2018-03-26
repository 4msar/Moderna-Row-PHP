<?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
     ?> 
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-eye"></i> View User</h1>
            <p>Information of a User</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">View User</a></li>
        </ul>
    </div>
    <div class="row ">        
        <div class="col-md-12">
            <?php 
                flash_msg( 'msg' );
            ?>
        </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Personal Information
                        <a href="?page=list" class="float-right btn btn-sm btn btn-primary"><i class="fa fa-users"></i> All Users</a></h4>
                    </div>
                  <div class="card-body">
                      <div class="col-md-8 offset-md-2">
                        <div class="user-img view-img">
                            <img class="user-img" src="<?php 
                            if($data['avator']==null) {
                                echo "assets/images/avatar.png"; 
                            } else{ 
                                if(file_exists('uploads/'.$data['avator'])) {
                                    echo "uploads/".$data['avator']; 
                                }else{ 
                                    echo "assets/images/avatar.png"; 
                                }
                            } ?>">
                        </div>
                        <table style="margin-top: 15px" class="table table-hover table-striped ">

                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><?= $data['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $data['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><?= $data['phone']; ?></td>
                            </tr>
                            <?php if($_SESSION['user_role']=='admin' || $_SESSION['user_id']==$data['id']){ ?>
                            <tr>
                                <td>UserName</td>
                                <td>:</td>
                                <td><?= $data['username']; ?></td>
                            </tr>
                            <tr>
                                <td>User Role</td>
                                <td>:</td>
                                <td><?= $data['role']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td>Registration Time</td>
                                <td>:</td>
                                <td><?= date("d M Y - g:i A", strtotime( $data['created_at'])); ?></td>
                            </tr>
                            <?php }else{ ?>
                                <h3>Not Found</h3>
                            <?php } ?>
                        </table>
                      </div>
                  </div>
                  <div class="card-footer">
                    <div class="col-md-12 text-right">
                        <?php if($_SESSION['user_role']=='admin' || $_SESSION['user_id']==$data['id']){ ?>
                            <a class="btn btn-sm btn-warning" href="?page=edit&id=<?php echo $data['id']; ?>"><i class="fa fa-pencil-square fa-lg"></i> Edit</a>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
            </div><!--col-md-12 end-->
    </div>
</main>
