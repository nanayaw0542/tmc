<title>T M C S | Add Service</title>
<?php require viewsPath("partials/header"); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php require viewsPath("partials/preloader"); ?>
  <!-- /.navbar -->
  <?php require viewsPath("partials/topnav"); ?>

  <!-- Main Sidebar Container -->
  
    <!-- /.sidebar -->
 <?php require viewsPath("partials/sidebar"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Service</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>/manageservice">Manage Service</a></li>
              <li class="breadcrumb-item active">Add Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><h3><b>ADD A NEW SERVICE</b></h3></h3>
          </div>
          <!-- /.card-header -->
          <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                  <label>Service Code</label>
                  <input type="text" name="serviceid" placeholder="Usercode" id="passInput" class="form-control" value="<?=set_value("ministryid")?>" readonly>
              
              </div>
              <input type="text" name="addedid" value="<?=Auth::get('UserId')?>" hidden>
              <input type="text" name="userid" value="<?=Auth::get('UserId')?>" hidden>
              
              <!-- <div class="col-md-3">
                  <label>Service Name</label>
                  <input type="text" class="form-control" name="servicename" autofocus placeholder="Service Name" value="<?=set_value("servicename")?>" autocomplete="off">
                  <?php if(!empty($errors['servicename'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['servicename']?></small>
                  <?php endif;?>
              </div> -->
              <div class="col-lg-4 col-md-6">
                <label>Service Type</label>
                <select class="form-control <?=!empty($errors['servicetype']) ? 'border-danger': ''?>" name="servicetype">
                  <option <?=get_select('servicetype',"")?> disabled selected>-select-</option>
                  <option <?=get_select('servicetype',"First Service")?> value="First Service">First Service</option>
                  <option <?=get_select('servicetype',"Second Service")?> value="Second Service">Second Service</option>
                  <option <?=get_select('servicetype',"Joint Service")?> value="Joint Service">Joint Service</option>
                </select>
                <?php if(!empty($errors['servicetype'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['servicetype']?></small>
                  <?php endif;?>
              </div>
              <div class="col-lg-4 col-md-6">
                  <label>Duration</label>
                  <input type="number" class="form-control" name="duration" autofocus placeholder="Service Duration" value="<?=set_value("duration")?>" min="1">
                  <?php if(!empty($errors['duration'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['duration']?></small>
                  <?php endif;?>
              </div>

            <div class="col-md-3" hidden>
                <label>Status</label>
                <select class="form-control" name="status">
                    <option <?=get_select('status',"")?>  disabled>-select-</option>
                   <option <?=get_select('status',"Active")?>selected value="Active">Active</option>
                   <option <?=get_select('status',"Inactive")?> value="Inactive">Inactive</option>
                </select>
            </div>

                  <div class="col-md-12"><br>
                    <button class="btn btn-primary">SUBMIT</button>
                    <a href="<?=ROOT?>/manageservice"><button type="button" class="btn btn-warning">RESET</button></a>
                </div>

            </div>
            <!-- /.row -->
         </form><br>
          <!-- /.card-body -->
          <div class="card-footer">
            
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
     function makePass(length) {
            var mydate = new Date();
            var month = mydate.getMonth()+1;
            var day = mydate.getDay();
          var result = '';
          var characters = '0123456789abc';
          var charactersLength = characters.length;
          for (var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            // counter += 1;
          }
          var passInput = document.getElementById('passInput');
          passInput.value = "SER" + <?php echo date('y') .  date("m") . rand(100,999)?>;
         }
         makePass(3);
</script>
<script type="text/javascript" src="vendors/sweetalert2.min.js"></script>
<?php 
      if(isset($_SESSION['userstatus']))
      { ?>
        
        <script>
        
        swal({
        title: "<?php echo $_SESSION['userstatus'] ?>",
        text: "You have successfully saved a new Subject!",
        icon: "success",
        button: "Ok!",
      });
      </script>
      <?php
      unset($_SESSION['userstatus']);
      }
     ?>
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

 
<!-- jQuery -->
<?php require viewsPath("partials/script"); ?>
