<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Category</h1>
          <p>Category List </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                        All Category List
                      <button type="button" class="float-right btn btn-sm btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i> Add Category</button>
                </div>
              <div class="tile-body table-responsive">
                  <table class="table table-hover table-bordered dataTable">
                      <thead class="table_head">
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM category ORDER BY cat_id DESC";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            
                                while($data = mysqli_fetch_assoc($result)) { ?>
                          <tr>
                              <td><?php echo $data['cat_name']; ?></td>
                              <td><?php echo $data['cat_type']; ?></td>
                              <td>
                                <div class="btn-group btn-sm" role="group">
                                  <a class="btn btn-sm btn-danger" href="javascript:delete_confirm(<?php echo $data['cat_id']; ?>)" ><i class="fa fa-trash fa-lg"></i></a>
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
          window.location="index.php?action=delete_c&cid="+id+"&u=front-end&get=category";
        }
      }
    </script>
</main>


<!-- Add Category Modal -->
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <form action="" method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Category</h4>
          </div>
          <div class="modal-body">
              <input type="text" class="form-control" name="cat_name" placeholder="Name">

              <br>
              <select name="cat_type" id="" class="form-control">
                <option value="blog_post">Blog Post</option>
                <option value="portfolio">Portfolio</option>
              </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="add_cat" id="cat_sub">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>