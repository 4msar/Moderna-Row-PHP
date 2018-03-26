<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Homepage Service</h1>
          <p>Homepage Service List and Tagline</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Services</a></li>
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
                        All Service List
                      <button type="button" class="float-right btn btn-sm btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i> Add Service</button>
                </div>
              <div class="tile-body table-responsive">
                  <table class="table table-hover table-bordered dataTable">
                      <thead class="table_head">
                        <tr>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>In Front</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM posts WHERE post_type='home_service' ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            
                                while($data = mysqli_fetch_assoc($result)) { ?>
                          <tr>
                              <td><?php echo $data['title']; ?></td>
                                <td><i class="fa <?= $data['image']; ?>"></i>
                                </td>
                                <td><?php echo $data['details']; ?></td>
                                <td><?php echo $data['status']==1 ? 'True' : 'False'; ?></td>
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
          window.location="index.php?action=delete_p&did="+id+"&u=front-end";
        }
      }
    </script>
</main>


<!-- Add Modal  -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="index.php?u=front-end" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" name="title" placeholder="Title">
            <br>
            <input class="form-control icon-pick" type="text" name="image" placeholder="Icon">
            <br>
            <select name="status" id="" class="form-control">
              <option value="0">Show in Front Page</option>
              <option value="1">Active</option>
              <option value="0">Deactive</option>
            </select>
            <br>
            <textarea class="form-control" name="details" id="" cols="50" rows="5"></textarea>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="add_service" class="btn btn-primary" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>