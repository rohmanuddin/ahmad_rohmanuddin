<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data GPS</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if ($op=="edit") { foreach ($data_gps as $gps );}?>
      
        <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url('user/proses_add_data')?>" enctype="multipart/form-data">
          <?php echo $this->session->flashdata('error')?>
          <input  class="form-control col-md-7 col-xs-12"  name="op" value="<?php echo $op;?>" type="hidden">
          <input  class="form-control col-md-7 col-xs-12"  name="id_gps" value="<?php if ($op =='edit') {echo $gps->id_gps; }?>" type="hidden">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Brand GPS <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" maxlength="35" name="brand_gps" value="<?php if ($op =='edit') {echo $gps->brand_gps; }?>"  required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Model GPS <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" name="model_gps" required="required" class="form-control col-md-7 col-xs-12" value="<?php if ($op =='edit') {echo $gps->model_gps; }?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >GPS Name <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" name="gps_name"  required="required" class="form-control col-md-7 col-xs-12" value="<?php if ($op =='edit') {echo $gps->gps_name; } ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Waranty month <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control select2" style="width: 100%;" name="waranty_month">
                  <option value="" disabled <?php if($op=='add') echo 'selected';?>>Pilih Garansi Bulanan</option>
                  <option value="1 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "1 Bulan") echo 'selected';}?>>1 Bulan</option>
                  <option value="2 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "2 Bulan") echo 'selected';}?>>2 Bulan</option>
                  <option value="3 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "3 Bulan") echo 'selected';}?>>3 Bulan</option>
                  <option value="4 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "4 Bulan") echo 'selected';}?>>4 Bulan</option>
                  <option value="5 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "5 Bulan") echo 'selected';}?>>5 Bulan</option>
                  <option value="6 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "6 Bulan") echo 'selected';}?>>6 Bulan</option>
                  <option value="7 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "7 Bulan") echo 'selected';}?>>7 Bulan</option>
                  <option value="8 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "8 Bulan") echo 'selected';}?>>8 Bulan</option>
                  <option value="9 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "9 Bulan") echo 'selected';}?>>9 Bulan</option>
                  <option value="10 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "10 Bulan") echo 'selected';}?>>10 Bulan</option>
                  <option value="11 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "11 Bulan") echo 'selected';}?>>11 Bulan</option>
                  <option value="12 Bulan" <?php if($op=='edit'){if($gps->waranty_month === "12 Bulan") echo 'selected';}?>>12 Bulan</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Buy Date <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" id="name" name="buy_date" required="required"  class="form-control col-md-7 col-xs-12" value="<?php if ($op =='edit') {echo $gps->buy_date; } ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Sold Date <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" type="date" name="sold_date"  class="form-control col-md-7 col-xs-12" required="required" value="<?php if ($op =='edit') {echo $gps->sold_date; } ?>">
            </div>
          </div>
          <div class="item form-group">
            <label  class="control-label col-md-3">Sold to</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" type="text" name="sold_to" class="form-control col-md-7 col-xs-12" required="required" value="<?php if ($op =='edit') {echo $gps->sold_to; } ?>">
            </div>
          </div>
          <?php if ($op=="edit") { ?>
             <div class="item form-group">
              <label  class="control-label col-md-3"></label>
              <?php if (!empty($gps->photo)) {
                echo '<img src="'.base_url('assets/uploads/'.$gps->photo).'" height="150px" width="150px">';
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
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Description <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12"><?php if ($op =='edit') {echo $gps->description; } ?></textarea>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>