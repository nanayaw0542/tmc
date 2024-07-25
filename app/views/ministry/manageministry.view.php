<title>T M C S | All Ministry</title>
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
            <h1>Manage Ministry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>">Home</a></li>
              <li class="breadcrumb-item active">Manage Ministry</li>
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
                <h3 class="card-title"><b>ADD, EDIT AND  DELETE MINISTRY</b></h3>
                <a href="<?=ROOT?>/addministry"><button class="btn btn-primary" style="float: right;">Add New Ministry</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="font-size: 12px;">#</th>
                    <th style="font-size: 12px;">Ministry Code</th>
                    <th style="font-size: 12px;">Ministry Name</th>
                    <th style="font-size: 12px;">Ministry Head</th>
                    <th style="font-size: 12px;">Added by</th>
                    <th style="font-size: 12px;">Date added</th>
                    <th style="font-size: 12px;">Status</th>
                    <th style="font-size: 12px;">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($ministry)): ?>
                    <?php $i=0; foreach($ministry as $user){$i++; ?>
                  <tr>
                    <td><?=$i?></td>
                    <td style="font-size: 12px;"><?=$user['MinistryId']?></td>
                    <td style="font-size: 12px;"><?=$user['MinistryName']?></td>
                      <?php 
                      $getministry = get_title_by_id($user['TitleId']);
                      if (empty($getministry)) {
                        $title = "N/A";
                      }
                      else{
                      $title = $getministry["Title"];
                    }
                     ?>
                    <td style="font-size: 12px;"><?=$title.'. '.$user['MinistryHead']?></td>
                    <?php 
                      $getministry = get_user_by_id($user['AddedId']);
                      if (empty($getministry)) {
                        $use = "N/A";
                      }
                      else{
                      $use = $getministry["Username"];
                    }
                     ?>
                  
                    <td style="font-size: 12px;"><?=$use?></td>
                    
                     <td style="font-size: 12px;"><?=date("jS M, Y",strtotime($user['AddedDate']))?></td> 
                    <td >
                      <?php if($user["Status"] === 'Active') {?>
                        <span class="badge badge-success shadow">Active</span>
                      <?php }else{
                        echo '<span class="badge badge-danger shadow">Inactive</span>';
                      } ?>
                    </td>
                    <td>
                    <a href="<?=ROOT?>/editministry&ministryid=<?=$user["MinistryId"]?>"><img src="assets/icons/edit-5.svg"></a>
                    <a href="<?=ROOT?>/deleteministry&ministryid=<?=$user["MinistryId"]?>"><img src="assets/icons/delete1.svg"></a>
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