<title>T M C S | Delete Ministry</title>
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
            <h1>Delete Ministry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>/editministry">Edit Ministry</a></li>
              <li class="breadcrumb-item active">Delete Ministry</li>
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
            <h3 class="card-title"><h3><b>DELETE MINISTRY</b></h3></h3>
            <h6 class="alert alert-danger text-center">Do you really want to delete <?=$row["MinistryName"]?>'s records?</h6>
          </div>
          <!-- /.card-header -->
          <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                  <label>Ministry Code</label>
                  <input type="text" name="ministryid" placeholder="Usercode" class="form-control" value="<?=set_value("ministryid",$row["MinistryId"])?>" readonly>
              
              </div>
              <input type="text" name="updatedid" value="<?=Auth::get('UserId')?>" hidden>
              <!-- <input type="text" name="userid" value="<?=Auth::get('UserId')?>" hidden> -->
              
              <div class="col-md-3">
                  <label>Ministry Name</label>
                  <input type="text" class="form-control" name="ministryname" autofocus placeholder="Ministry Name" value="<?=set_value("ministryname",$row["MinistryName"])?>" autocomplete="off" readonly>
                  <?php if(!empty($errors['ministryname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['ministryname']?></small>
                  <?php endif;?>
              </div>
              <div class="col-md-2">
                <label>Title</label>
                <select class="form-control <?=!empty($errors['titleid']) ? 'border-danger': ''?>" name="titleid" readonly>
                  <?php 
                    $gettitle = get_title_by_id($row["TitleId"]);
                    // $title = $gettitle["Title"];
                   ?>
                  <option  selected value="<?=$row["TitleId"]?>"><?=$gettitle["Title"]?></option>
                  <?php foreach($titles as $title){ ?>
                    <option value="<?=$title["TitleId"]?>"><?=$title["Title"]?></option>
                     <?php } ?>
                </select>
                <?php if(!empty($errors['titleid'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['titleid']?></small>
                  <?php endif;?>
              </div>
              <div class="col-md-3">
                  <label>Ministry Head</label>
                  <input type="text" class="form-control" name="ministryhead" autofocus placeholder="Ministry Head" value="<?=set_value("ministryhead",$row["MinistryHead"])?>" autocomplete="off" readonly>
                  <?php if(!empty($errors['ministryhead'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['ministryhead']?></small>
                  <?php endif;?>
              </div>

            <div class="col-md-3">
                <label>Status</label>
                <select class="form-control" name="status" readonly>
                    <option <?=get_select('status',"")?> selected value="<?=$row["Status"]?>"><?=$row["Status"]?></option>
                   <option <?=get_select('status',"Active")?>value="Active">Active</option>
                   <option <?=get_select('status',"Inactive")?> value="Inactive">Inactive</option>
                </select>
            </div>

                  <div class="col-md-12"><br>
                    <button class="btn btn-danger">DELETE</button>
                    <a href="<?=ROOT?>/manageministry"><button type="button" class="btn btn-warning">RESET</button></a>
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
          var characters = '0123456789';
          var charactersLength = characters.length;
          for (var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            // counter += 1;
          }
          var passInput = document.getElementById('passInput');
          passInput.value = "MIN" + <?php echo date('y') .  date("m") . rand(100,999)?>;
         }
         makePass(3);
</script>
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
<script type="text/javascript" src="vendors/sweetalert2.min.js"></script>
 
<!-- jQuery -->
<?php require viewsPath("partials/script"); ?>
