<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cog"></i> Frontend Setting</h1>
            <p>Website Content Setting</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Front Setting</a></li>
        </ul>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <?php 
                flash_msg( 'msg' );
            ?>
        </div>
            <div class="col-md-12">
                <form class="form-horizontal" action="index.php?u=front-end&get=setting" method="post" enctype="multipart/form-data" >
                <div class="card card-primary">
                    <div class="card-header">
                         <h4>Frontend Settings</h4>
                        <div class="clearfix"></div>
                    </div>
                  <div class="card-body">
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Homepage CTA Text</label>
                        <div class="col-sm-8">
                          <input type="text" id="name" name="ws_hcta" class="form-control" placeholder="Enter CTA Text" value="<?php
                          $name = get_s_data('settings', 'data_key','ws_hcta', 'data_value');
                          echo  $name;  ?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Flickr User Id</label>
                        <div class="col-sm-8">
                          <input type="text" id="name" name="ws_flickr" class="form-control" placeholder="147688899@N03" value="<?php
                          $name = get_s_data('settings', 'data_key','ws_flickr', 'data_value');
                          echo  $name;  ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Google Maps API Key</label>
                        <div class="col-sm-8">
                          <input type="text" id="name" name="ws_gmap_api" class="form-control" placeholder="Maps API Key" value="<?php
                          $name = get_s_data('settings', 'data_key','ws_gmap_api', 'data_value');
                          echo  $name;  ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Contact Page Lattitude & Longtitude</label>
                        <div class="col-sm-8">
                          <input type="text" id="name" name="ws_c_lat" class="form-control" placeholder="Lattitude" value="<?php
                          $name = get_s_data('settings', 'data_key','ws_c_lat', 'data_value');
                          echo  $name;  ?>">
                          &nbsp;
                          <input type="text" id="name" name="ws_c_lng" class="form-control" placeholder="Longtitude" value="<?php
                          $name = get_s_data('settings', 'data_key','ws_c_lng', 'data_value');
                          echo  $name;  ?>">
                        </div>
                      </div>

                      

                  </div>
                  <div class="card-footer text-center">
                    <input type="submit" name="ws_content" class="btn btn-sm btn-primary" value="Save"/>
                  </div>
                </div>
                </form>
            </div><!--col-md-12 end-->
    </div>
</main>
