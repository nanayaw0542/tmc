<title>T M C S | All Users</title>
<?php require viewsPath("partials/header"); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php require viewsPath("partials/preloader"); ?>
  <!-- /.navbar -->
  <?php require viewsPath("partials/topnav"); ?>
  <!-- Main Sidebar Container -->
  <?php require viewsPath("partials/sidebar"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>">Home</a></li>
              <li class="breadcrumb-item active">Manage Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>ADD, EDIT AND  DELETE USERS</b></h3>
                <a href="<?=ROOT?>/adduser"><button class="btn btn-primary" style="float: right;">Add New User</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th style="font-size: 12px;">#</th>
                    <th style="font-size: 12px;">Image</th>
                    <th style="font-size: 12px;">ID</th>
                    <th style="font-size: 12px;">Username</th>
                    <th style="font-size: 12px;">Fullname</th>
                    <th style="font-size: 12px;">Gender</th>
                    <th style="font-size: 12px;">Role</th>
                    <th style="font-size: 12px;">Added</th>
                    <th style="font-size: 12px;">Date</th>
                    <th style="font-size: 12px;">Status</th>
                    <th style="font-size: 12px;">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($users)): ?>
                    <?php $i=0; foreach($users as $user){$i++; ?>
                  <tr>
                    <td><?=$i?></td>
                    <td style="font-size: 12px;"><img src="<?=crop($user['Image'],300,$user['Gender'])?>" style="width: 50%;max-width: 50px;" class="rounded-circle shadow"></td>
                    <td style="font-size: 12px;"><?=$user['UserId']?></td>
                    <td style="font-size: 12px;"><?=$user['Username']?></td>
                    <td style="font-size: 12px;"><?=$user['Fullname']?></td>
                    <td style="font-size: 12px;"><?=$user['Gender']?></td>
                    <td style="font-size: 12px;"><?=$user['Role']?></td>
                    <?php 
                      $getuser = get_user_by_id($user['AddedId']);
                      if (empty($getuser)) {
                        $use = "N/A";
                      }
                      else{
                      $use = $getuser["Username"];
                    }
                     ?>
                     <td style="font-size:12px"><?=$use?></td>
                     <td style="font-size: 12px;"><?=date("jS M, Y",strtotime($user['AddedDate']))?></td> 
                    <td style="font-size: 12px;">
                      <?php if($user["Status"] === 'Active') {?>
                        <span class="badge bg-green shadow">Active</span>
                      <?php }else{
                        echo '<span class="badge bg-red shadow">Inactive</span>';
                      } ?>
                    </td>
                    <td>
                    <a href="<?=ROOT?>/edituser&userid=<?=$user["UserId"]?>"><img src="assets/icons/edit-5.svg"></a>
                    <a href="<?=ROOT?>/deleteuser&userid=<?=$user["UserId"]?>"><img src="assets/icons/delete1.svg"></a>
                  </td>
                  </tr>
                 <?php } ?>
               <?php endif; ?>
                  </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php require viewsPath("partials/footer"); ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php require viewsPath("partials/tblscript"); ?>