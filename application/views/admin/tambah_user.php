<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data User</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if ($op=="edit") { foreach ($data_user as $user );}?>
      
        <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url('admin/proses_add_user')?>" enctype="multipart/form-data">
          <?php echo $this->session->flashdata('error')?>
          <input type="hidden" id="name" name="op"  class="form-control col-md-7 col-xs-12" value="<?php echo $op; ?>">
          <input type="hidden" id="name" name="id_user"  class="form-control col-md-7 col-xs-12" value="<?php if ($op =='edit') {echo $user->id_user; }?>">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Email <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php if ($op =='edit') {echo $user->email; }?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Password <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" name="password" required="required" class="form-control col-md-7 col-xs-12" value="<?php if ($op =='edit') {echo $user->password; }?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Role <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control select2" style="width: 100%;" name="role">
                  <option value="" disabled <?php if($op=='add') echo 'selected';?>>Pilih Role</option>
                  <option value="1" <?php if($op=='edit'){if($user->role === "1") echo 'selected';}?>>Admin</option>
                  <option value="2" <?php if($op=='edit'){if($user->role === "2") echo 'selected';}?>>User</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="nama"  required="required" type="text" value="<?php if ($op =='edit') {echo $user->nama; }?>">
            </div>
          </div>
          <?php if ($op=="edit") { ?>
             <div class="item form-group">
              <label  class="control-label col-md-3"></label>
              <?php if (!empty($user->foto)) {
                echo '<img src="'.base_url('assets/uploads/'.$user->foto).'" height="150px" width="150px">';
              }else{ 
                echo '<img src="base_url(); ?>assets/image/1.png" height="150px" width="150px">';
              } ?>
            </div>
          <?php }?>
          <div class="item form-group">
            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input  class=" col-md-7 col-xs-12" type="file" name="filefoto">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button id="send" type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>