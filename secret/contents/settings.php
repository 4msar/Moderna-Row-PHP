<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cog"></i> Setting</h1>
            <p>Website Setting</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Setting</a></li>
        </ul>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <?php 
                flash_msg( 'msg' );
            ?>
        </div>
            <div class="col-md-12">
                <form class="form-horizontal" action="index.php?u=settings" method="post" enctype="multipart/form-data" >
                <div class="card card-primary">
                    <div class="card-header">
                         <h4>Website Settings</h4>
                        <div class="clearfix"></div>
                    </div>
                  <div class="card-body">
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Website Title </label>
                        <div class="col-sm-8">
                          <input type="text" id="name" name="ws_name" class="form-control" placeholder="Enter your website Name" value="<?php
                          $name = get_s_data('settings', 'data_key','ws_name', 'data_value');
                          echo  $name==true ? $name : APP_NAME;  ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Footer Address</label>
                        <div class="col-sm-8">
                          <input type="ws_f_add" id="ws_f_add" name='ws_address' class="form-control" placeholder="Enter Company Address" value="<?php
                          $add = get_s_data('settings', 'data_key','ws_address', 'data_value');
                          echo  $add==true ? $add : '';  ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Company Email</label>
                        <div class="col-sm-8">
                          <input type="email" id="eml" name="ws_email" class="form-control" placeholder="Enter Company Email" value="<?php
                          $eml = get_s_data('settings', 'data_key','ws_email', 'data_value');
                          echo  $eml==true ? $eml : '';  ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Company Phone</label>
                        <div class="col-sm-8">
                          <input type="number" id="phone" name="ws_phone" class="form-control" placeholder="Enter Company Phone Number" value="<?php
                          $phn = get_s_data('settings', 'data_key','ws_phone', 'data_value');
                          echo  $phn==true ? $phn : '';  ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Front Page Menu Style</label>
                        <div class="col-sm-8">
                          <select name="ws_menu" class="form-control">
                              <?php
                              $menu = get_s_data('settings', 'data_key','ws_menu', 'data_value');
                              ?>
                              <option <?php echo $menu=='static' ? 'selected' :''; ?> value="static">Static</option>
                              <option <?php echo $menu=='fixed' ? 'selected' :''; ?> value="fixed">Fixed</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Front Page Skin Style</label>
                        <div class="col-sm-8">
                          <select name="ws_skin" class="ws-skin form-control">
                              <?php
                              $menu = get_s_data('settings', 'data_key','ws_skin', 'data_value');
                              ?>
                              <option style="background:#68A4C4" <?php echo $menu=='default' ? 'selected' :''; ?> value="default">Default</option>
                              <option style="background:#FF6F00" <?php echo $menu=='amber' ? 'selected' :''; ?> value="amber">Amber</option>
                              <option style="background:#2196F3" <?php echo $menu=='blue' ? 'selected' :''; ?> value="blue">Blue</option>
                              <option style="background:#34495e" <?php echo $menu=='dark' ? 'selected' :''; ?> value="dark">Dark</option>
                              <option style="background:#FF5722" <?php echo $menu=='deep-orenge' ? 'selected' :''; ?> value="deep-orenge">Deep Orenge</option>
                              <option style="background:#3F51B5" <?php echo $menu=='indigo' ? 'selected' :''; ?> value="indigo">Indigo</option>
                              <option style="background:#E91E63" <?php echo $menu=='pink' ? 'selected' :''; ?> value="pink">Pink</option>
                              <option style="background:#9C27B0" <?php echo $menu=='purple' ? 'selected' :''; ?> value="purple">Purple</option>
                              <option style="background:#009688" <?php echo $menu=='teal' ? 'selected' :''; ?> value="teal">Teal</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Footer Credit</label>
                        <div class="col-sm-8">
                          <textarea name="ws_footer_credit" class="form-control" cols="30" rows="5" placeholder="Enter your footer credit text"><?php
                          $name = get_s_data('settings', 'data_key','ws_footer_credit', 'data_value');
                          echo  $name;  ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Social Link</label>
                        <div class="col-sm-8 social_link">
                          <div class='inputs'><i class="fa fa-facebook"></i><input class="form-control" type="text" name="ws_sl_fb" placeholder="Facebook" value="<?php echo get_s_data('settings', 'data_key', 'ws_sl_fb', 'data_value'); ?>"></div>
                          <div class='inputs'><i class="fa fa-twitter"></i><input class="form-control" type="text" name="ws_sl_tt" placeholder="Twitter" value="<?php echo get_s_data('settings', 'data_key', 'ws_sl_tt', 'data_value'); ?>"></div>
                          <div class='inputs'><i class="fa fa-linkedin"></i><input class="form-control" type="text" name="ws_sl_lin" placeholder="Linkedin" value="<?php echo get_s_data('settings', 'data_key', 'ws_sl_lin', 'data_value'); ?>"></div>
                          <div class='inputs'><i class="fa fa-pinterest"></i><input class="form-control" type="text" name="ws_sl_pin" placeholder="Pinterest" value="<?php echo get_s_data('settings', 'data_key', 'ws_sl_pin', 'data_value'); ?>"></div>
                          <div class='inputs'><i class="fa fa-google-plus"></i><input class="form-control" type="text" name="ws_sl_gp" placeholder="Google plus" value="<?php echo get_s_data('settings', 'data_key', 'ws_sl_gp', 'data_value'); ?>"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Upload</label>
                        <div class="col-sm-8">
                          <input class="form-control" type="file" name="avator" accept="image/*">
                        </div>
                      </div>
                  </div>
                  <div class="card-footer text-center">
                    <input type="submit" name="ws_submit" class="btn btn-sm btn-primary" value="Save"/>
                  </div>
                </div>
                </form>
            </div><!--col-md-12 end-->
    </div>
</main>
