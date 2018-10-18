<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <a href="<?php echo base_url('admin/tambah_User')?>" class="btn btn-success"> + Tambah Data </a>
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
        Data User
      </p>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style='text-align:center'>No</th>
            <th style='text-align:center'>Email</th>
            <th style='text-align:center'>Name</th>
            <th style='text-align:center'>Role</th>
            <th style='text-align:center'>Status</th>
            <th style='text-align:center'>Photo</th>
            <th style='text-align:center'>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php $no=1; foreach ($data_user as $user ) : ?>
            <tr>
              <td style='text-align:center'><?php echo $no++ ?></td>   
              <td style='text-align:center'><?php echo $user->email ?></td>   
              <td style='text-align:center'><?php echo $user->nama ?></td>   
              <td style='text-align:center'><?php if ($user->role == "1") { echo "Admin"; } else { echo "User"; } ?></td>   
              <td style='text-align:center'><?php if ($user->status == "1") { echo "Aktif"; } else { echo "Tidak Aktif"; }  ?></td>      
              <td style='text-align:center'><img src="<?php echo base_url().'assets/uploads/'.$user->foto;?>" height="50px" width="50px">
              </td>
              <td style='text-align:center'>
                <?php if($user->status == "2") { ?>
                  <a href="<?php echo base_url('admin/set_aktif/'.$user->id_user);?>"><span data-placement='top' data-toggle='tooltip' title='Aktifkan'><button onclick="return confirm('Anda yakin ingin mengaktifkan user ?')" class='btn btn-warning btn-xs' data-title='Aktifkan'><span class='glyphicon glyphicon-ok'></span></button></span></a>
                <?php }else { ?>
                  <a href="<?php echo base_url('admin/set_nonaktif/'.$user->id_user);?>"><span data-placement='top' data-toggle='tooltip' title='Nonaktifkan'><button onclick="return confirm('Anda yakin ingin menonaktifkan user ?')" class='btn btn-success btn-xs' data-title='Nonaktifkan'><span class='glyphicon glyphicon-remove'></span></button></span></a>
                  <?php } ?>
                  <a href="<?php echo base_url('admin/edit_user/'.$user->id_user);?>"><span data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button><span></a>
                      
                  <a href="<?php echo base_url('admin/hapus_user/'.$user->id_user);?>"><span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick="return confirm('Anda yakin ingin menghapus data ini ?')" class='btn btn-danger btn-xs' data-title='Delete'><span class='glyphicon glyphicon-trash'></span></button></span></a>
              </td>   

            </tr>
          <?php endforeach;?> 
        </tbody>
      </table>
    </div>
  </div>
</div>