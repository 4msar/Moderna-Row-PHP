<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Blog</h1>
          <p>Blog Posts </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blogs</a></li>
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
                    All Blog Posts
                    <div class="button-group btn-group-sm float-right">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i> Add New Post</button>
						<a href='?page=front-end&get=category' class="btn btn-info"><i class="fa fa-info"></i> View Category</a>
					</div>
                </div>
              <div class="tile-body table-responsive">
                  <table class="table table-hover table-bordered dataTable">
                      <thead class="table_head">
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM posts NATURAL JOIN category WHERE post_type='blog_post' ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            
                                while($data = mysqli_fetch_assoc($result)) { ?>
                          <tr>
	                            <td><?php echo $data['title']; ?></td>
	                            <td><?php echo $data['cat_name']; ?></td>
                                <td><?php echo strip_tags(substr($data['details'], 0, 80)); ?>...</td>
                                <td><?php echo $data['status']==1 ? 'Published' : 'Draft'; ?></td>
                                <td><?= $data['created_at']; ?></td>
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
          window.location="index.php?action=delete_p&did="+id+"&u=front-end&get=blog";
        }
      }
    </script>
</main>


<!-- Add Modal  -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="index.php?u=front-end&get=blog" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" name="title" placeholder="Title">
            <br>
            <div id="cat_con">
	            <?php  $aa = "SELECT * FROM category WHERE cat_type='blog_post'";
	        		$q = mysqli_query($con, $aa);
	        		if(mysqli_num_rows($q) > 0){ ?>
	            <select name="category" class="form-control">
	            	<?php
	            			while ($cat = mysqli_fetch_assoc($q)) {
	            	 ?>
	            	<option value="<?= $cat['cat_id']; ?>"><?= $cat['cat_name']; ?></option>
	            	<?php } ?>
	            </select>
	            <button class="btn mb-2 btn-primary" type="button" id="addCat" data-toggle="modal" data-target="#addCate">Add New Category</button>
	            <?php }else{ ?>
	        		<button class="btn mb-2 btn-primary" type="button" id="addCat" data-toggle="modal" data-target="#addCate">Add Category</button>
	        	<?php } ?>
        	</div>
            <br>
            <select name="status" id="" class="form-control">
              <option value="1">Publish</option>
              <option value="0">Draft</option>
            </select>
            <br>
            <textarea class="form-control editor" name="details" id="" cols="50" rows="5" placeholder="Description"></textarea>
            <br>
            <input class="form-control icon-pick" type="file" accept="image/*" name="image" placeholder="Icon">
            <br>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="add_post" class="btn btn-primary" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Category Modal -->
  <div class="modal fade" id="addCate" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <form action="" method="post">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Add Category</h4>
	        </div>
	        <div class="modal-body">
	          	<input type="text" class="form-control" name="cat_name" placeholder="Name" id="cat_name">
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <button class="btn btn-success" onclick="return add_cat('add_post_cat')" id="cat_sub">Add</button>
        	</div>
        </form>
      </div>
    </div>
  </div>



  <script type="text/javascript">
  	function add_cat(arg) {
		var name = $("#cat_name").val();
		var dataString = 'name='+ name +'&'+arg+'=1';
		if (name == '') {
			alert("Please Fill All Fields");
		} else {
			// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "ajax.php?t="+arg,
				data: dataString,
				cache: false,
				success: function(result) {
					$("#addCate").modal('hide');
					if($( "#cat_con" ).has( "select" ).length){
						$('#cat_con select').append(result);
					}else{
						$('#cat_con').html(result);
					}
					// alert(result);
					$("#cat_name").val('');
				}
			});
		}
		return false;
	}
  </script>