<title>T M C S | All Attendance</title>
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
            <h1>Manage Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>">Home</a></li>
              <li class="breadcrumb-item active">Manage Attendance</li>
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
                <h3 class="card-title "><b class="badge bg-primary">First Service</b>&nbsp<span class="badge badge-warning"><?=$totalfirstservice?></span></h3>
                <h3 class="card-title px-5"><b class="badge bg-primary">Second Service</b>&nbsp<span class="badge badge-warning"><?=$totalsecondservice?></span></h3>
                <h3 class="card-title px-5"><b class="badge bg-primary">Both Services</b>&nbsp<span class="badge badge-warning"><?=$totalbothservice?></span></h3>
                <a href="<?=ROOT?>/addattendance"><button class="btn btn-primary" style="float: right;">Add New Attendance</button></a>
              </div>
              <div class="p-4">
                <form class="row float-end">
                  <div class="col-lg-3 col-md-3">
                      <label for="start">Start Date</label>
                      <input id="start" type="date" name="startdate" class="form-control" value="<?=!empty($_GET['startdate']) ? $_GET['startdate']:''?>">
                  </div>

                  <div class="col-lg-3 col-md-3">
                      <label for="end">End Date</label>
                      <input id="end" type="date" name="enddate" class="form-control" value="<?=!empty($_GET['enddate']) ? $_GET['enddate']:''?>">
                  </div>

                  <!-- <div class="col-lg-3 col-md-3">
                      <label for="limit">Rows</label>
                      <input style="max-width: 80px;" id="limit" type="number" name="limit" min="1" class="form-control" value="<?=!empty($_GET['limit']) ? $_GET['limit']:'10'?>">
                  </div> -->
                  
                  <button class="btn btn-primary">Go <i class="fa fa-chevron-right"> </i></button>
                  <input type="hidden" name="p_name" value="admin">
                <input type="hidden" name="tab" value="sales">
                </form> 
                <div class="clearfix"></div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="font-size: 12px;">#</th>
                    <th style="font-size: 12px;">Attendance ID</th>
                    <th style="font-size: 12px;">Member</th>
                    <th style="font-size: 12px;">Ministry</th>
                    <th style="font-size: 12px;">Service Type</th>
                    <th style="font-size: 12px;">Attendance</th>   
                    <th style="font-size: 12px;">Added by</th>
                    <th style="font-size: 12px;">Date added</th>
                    <th style="font-size: 12px;">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($attendance)): ?>
                    <?php $i=0; foreach($attendance as $user){$i++; ?>
                  <tr>
                    <td><?=$i?></td>
                    <td style="font-size: 12px;"><?=$user['AttendanceId']?></td>
                   <?php 
                      $members = get_member_by_id($user['MemberId']);
                      if (empty($members)) {
                        $member = "N/A";
                      }
                      else{
                      $member = $members["Fullname"];
                    }
                     ?>
                     <?php 
                      $titles = get_title_by_id($user['TitleId']);
                     ?>
                    <td style="font-size: 12px;"><?=$titles["Title"].' '.$member?></td>
                   
                    <?php 
                      $getministry = get_ministry_by_id($user['MinistryId']);
                      if (empty($getministry)) {
                        $ministry = "N/A";
                      }
                      else{
                      $ministry = $getministry["MinistryName"];
                    }
                     ?>
                    <td style="font-size: 12px;"><?=$ministry?></td>
                    <?php 
                      $getministry = get_service_by_id($user['ServiceId']);
                      if (empty($getministry)) {
                        $ministry = "N/A";
                      }
                      else{
                      $ministry = $getministry["ServiceType"];
                    }
                     ?>
                    <td style="font-size: 12px;"><?=$ministry?></td>
                     <td>
                      <?php if($user["AttendanceStatus"] === 'Present') {?>
                        <span class="badge bg-green shadow">Present</span>
                      <?php }else{
                        echo '<span class="badge bg-red shadow">Absent</span>';
                      } ?>
                    </td> 
                    <?php 
                      $getuser = get_user_by_id($user['AddedId']);
                      if (empty($getuser)) {
                        $use = "N/A";
                      }
                      else{
                      $use = $getuser["Role"];
                    }
                     ?>
                     <td style="font-size:12px"><?=$use?></td>
                     <td style="font-size: 12px;"><?=date("jS M, Y",strtotime($user['AddedDate']))?></td> 
                   
                    <td>
                    <a href="<?=ROOT?>/editattendance&attendanceid=<?=$user["AttendanceId"]?>"><img src="assets/icons/edit-5.svg"></a>
                    <!-- <a href="<?=ROOT?>/deletemember&memberid=<?=$user["MemberId"]?>"><img src="assets/icons/delete1.svg"></a> -->
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