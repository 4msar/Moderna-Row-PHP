<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Homepage Slider</h1>
          <p>Homepage Slider List </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Slider</a></li>
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
                        All Slider List
                      <button type="button" class="float-right btn btn-sm btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i> Add Slider</button>
                </div>
              <div class="tile-body table-responsive">
                  <table class="table table-hover table-bordered dataTable">
                      <thead class="table_head">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM posts WHERE post_type='home_slider' ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            
                                while($data = mysqli_fetch_assoc($result)) { ?>
                          <tr>
                              <td><?php echo $data['title']; ?></td>
                                <td><?php echo $data['details']; ?></td>
                                <td><img style="width: 200px" src="../uploads/<?= $data['image']; ?>"></td>
                                <td>
                                  <div class="btn-group btn-sm" role="group">
                                    <a class="btn btn-sm btn-danger" href="javascript:delete_confirm(<?php echo $data['id']; ?>)" ><i class="fa fa-trash fa-lg"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                  </table>
                </div>
              <div class="tile-footer">
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
          window.location="index.php?action=delete_p&did="+id+"&u=front-end&get=slider";
        }
      }
    </script>
</main>


<!-- Add Modal  -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="index.php?u=front-end&get=slider" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" name="title" placeholder="Title">
            <br>
            <textarea class="form-control" name="details" id="" cols="50" rows="5" placeholder="Description"></textarea>
            <br>
            <input class="form-control icon-pick" type="file" accept="image/*" name="image" placeholder="Icon">
            <br>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="add_slider" class="btn btn-primary" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>