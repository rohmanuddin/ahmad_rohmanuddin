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
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>User Report <small>Activity report</small></h2>
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
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                  <div class="profile_img">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <?php foreach ($data_user as $user ) : ?>   
                      <img class="img-responsive avatar-view" src="<?php echo base_url('assets/uploads/'.$user->foto)?>" alt="Avatar" title="Change the avatar">
                    </div>
                  </div>

                  <a href="<?php echo base_url('user/edit_profile/'.$user->id_user)?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                  <br />
                  </div>
                <div class="col-md-9 col-sm-9 col-xs-12">  
                  <table class="table table-striped">
                    <tr>
                      <td width="100px">Email</td>
                      <td width="100px">:</td>
                      <td><?php echo $user->email ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><?php echo $user->nama ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td>:</td>
                      <td><?php if ($user->status == "1") {echo "Aktif";}  ?></td>
                    </tr>
                  </table>   
                <?php endforeach; ?>      
                </div>
              </div>
            </div>
          </div>
        </div>      
      </div>
    </div>
  </div>
</div>