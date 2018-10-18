<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <a href="<?php echo base_url('user/tambah_gps')?>" class="btn btn-success"> + Tambah Data </a>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
        Data GPS
      </p>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Brand GPS</th>
            <th>Model GPS</th>
            <th>GPS Name</th>
            <th>Waranty_month</th>
            <th>Buy Date</th>
            <th>Sold Date</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php $no=1; foreach ($data_gps as $gps ) : ?>
            <tr>
              <td style='text-align:center'><?php echo $no++ ?></td>   
              <td style='text-align:center'><?php echo $gps->brand_gps ?></td>   
              <td style='text-align:center'><?php echo $gps->model_gps ?></td>   
              <td style='text-align:center'><?php echo $gps->gps_name ?></td>   
              <td style='text-align:center'><?php echo $gps->waranty_month ?></td>   
              <td style='text-align:center'><?php echo $gps->buy_date ?></td>   
              <td style='text-align:center'><?php echo $gps->sold_date ?></td>   
              <td>
                  <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#View<?php echo $gps->id_gps; ?>"><span class="glyphicon glyphicon-eye-open"></span></button>

                  <a href="<?php echo base_url('user/edit_gps/'.$gps->id_gps);?>"><span data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button><span></a>
                      
                  <a href="<?php echo base_url('user/hapus_gps/'.$gps->id_gps);?>"><span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick="return confirm('Anda yakin ingin menghapus data ini ?')" class='btn btn-danger btn-xs' data-title='Delete'><span class='glyphicon glyphicon-trash'></span></button></span></a>
              </td>   

            </tr>

            <div class="modal fade bs-example-modal-lg" id="View<?php echo $gps->id_gps; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">View Detail GPS</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Detail GPS</h4>
                          Sold to : <?php echo ucwords($gps->sold_to); ?> <br>
                          Deskripsi : <?php echo $gps->description; ?><br>
                          Posted by : <?php echo ucwords($gps->nama); echo " "; ?> 
                          <?php if ($gps->role == 1) {
                            echo "(Admin)";
                          } else {
                            echo "(User)";
                          } ?> <br>
                          <center><?php if ($gps->photo!=null) {
                            echo '<img src="'.base_url('assets/uploads/'.$gps->photo).'" height="200px" width="50%">';
                          }else{ 
                            echo '<img src="'.base_url('assets/uploads/1.png').'" height="200px" width="100%">';
                          } ?></center>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
          <?php endforeach;?> 
        </tbody>
      </table>
    </div>
  </div>
</div>