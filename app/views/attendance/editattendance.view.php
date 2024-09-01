<title>T M C S | Attendance</title>
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
            <h1>Mark Attendance</h1>
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
          <form method="post">
            <div class="card">
              
              <div class="card-header">
                <h3 class="card-title"><b>Mark Attendance</b><span class="p-3" style="font-size: 20px; font-weight: bolder; color: green;">Today is <?php echo date("D, jS M Y"); ?> <span class="p-3">The time is <?php echo date("h:i:s") ?></span></span></h3>
                
              </div>
              <!-- /.card-header -->

              <div class="row p-3">
                 <div class="col-xl-3 col-md-6" hidden>
                  <label>Convert Code</label>
                  <input type="text" name="attendanceid" id="passInput" placeholder="Convert Code" class="form-control" readonly>
              </div>
              <input type="text" name="addedid" value="<?=Auth::get('UserId')?>" hidden>
              <input type="text" name="userid" value="<?=Auth::get('UserId')?>" hidden>
                <div class="col-xl-3 col-md-6 mt-3">
                  <label>Sort By</label>
                  <select class="form-control" name="sortby" disabled>
                    <option selected disabled>-select-</option>
                    <option value="All">All</option>
                    <option value="Ministry">Ministry</option>
                    <option value="Bacenta">Bacenta</option>
                  </select>
                </div>
                <?php 
                    $getservice = get_service_by_id($row['ServiceId']);
                    if (empty($getservice)) {
                      $serves = "N/A";
                    }
                    else{
                    $serves = $getservice["ServiceType"];
                  }
                   ?>
                <div class="col-xl-3 col-md-6 mt-3">
                  <label>Service Type</label>
                  <select class="form-control" disabled>
                    <option selected value="<?=$row["ServiceId"]?>"><?=$serves?></option>
                    <?php foreach($services as $serve){ ?>
                    <option value="<?=$serve["ServiceId"]?>"><?=$serve["ServiceType"]?></option>
                    <?php } ?>
                  </select>
                  
                </div>
                <?php 
                    $getministries = get_ministry_by_id($row['MinistryId']);
                    if (empty($getministries)) {
                      $ministries = "N/A";
                    }
                    else{
                    $ministries = $getministries["MinistryName"];
                  }
                   ?>
                <div class="col-xl-3 col-md-6 mt-3">
                  <label>Ministry</label>
                  <select class="form-control" name="sortby" id="ministryname" onchange="fetchministry(this);" disabled>
                    <option selected value="<?=$row["MinistryId"]?>"><?$ministries?></option>
                    <?php foreach($ministry as $min){ ?>
                    <option value="<?=$min["MinistryId"]?>"><?=$min["MinistryName"]?></option>
                  <?php } ?>
                  </select>
                </div>
                <?php 
                    $getmember = get_member_by_id($row['MemberId']);
                    if (empty($getmember)) {
                      $memer = "N/A";
                    }
                    else{
                    $memer = $getmember["Fullname"];
                  }
                   ?>
              <div class="col-xl-3 col-md-6 mt-2">
                <label class="p-1">Select a member</label>
                  <select class="js-example-basic-single mt-3 form-control" id="member" onchange="fetchmembers(this);" disabled>
                    <option selected value="<?=$row["MemberId"]?>"><?$memer?></option>
                    <?php foreach($members as $mem) {?>
                  <option value="<?=$mem["MemberId"]?>"><?=trim($mem["Fullname"])?></option>
                <?php } ?>
                </select>
               
              </div>
            </div>
              <div class="card-body">
                <div class="row">
                <div class="col-xl-8 col-md-6">
                <table id="example" class="table table-bordered table-striped" style="width:100%;">
                  <thead>
                  <tr>
                    <!-- <th>#</th> -->
                    <th>Member Code</th>
                    <th>Name</th>
                    <th>Ministry</th>
                  </tr>
                  </thead>
                  <tbody>
                   
                  <tr>
                      <td><label><?=$row['MemberId']?></label></td>
                        <?php 
                        $getministry = get_title_by_id($row['TitleId']);
                        if (empty($getministry)) {
                          $title = "N/A";
                        }
                        else{
                        $title = $getministry["Title"];
                      }
                       ?>
                       <?php 
                        $getministry = get_member_by_id($row['MemberId']);
                        if (empty($getministry)) {
                          $name = "N/A";
                        }
                        else{
                        $name = $getministry["Fullname"];
                      }
                       ?>
                      <td><input type="text" value="<?=$row["TitleId"]?>" hidden><label><?=$title.'. '.$name?></label></td>
                      <?php 
                        $ministries = get_ministry_by_id($row['MinistryId']);
                        if (empty($ministries)) {
                          $ministry = "N/A";
                        }
                        else{
                        $ministry = $ministries["MinistryName"];
                      }
                       ?>
                      <td>
                        <input type="text"  value="<?=$row["MinistryId"]?>" hidden><label><?=$ministry?></label>
                      </td>
                      <!-- <td><?=$ministry?></td> -->
                    </tr>
              
                  </tbody>
                  </table>
              </div>
              <div class="col-xl-4">
            <table class="table table-bordered table-striped">
              <thead>
                <th class="text-center" style="color: green;">MARK ATTENDANCE</th>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select class="form-control <?=!empty($errors['attendancestatus']) ? 'border-danger': ''?>" name="attendancestatus">
                      <option selected value="<?=$row["AttendanceStatus"]?>"><?=$row["AttendanceStatus"]?></option>
                      <option value="Present">Present</option>
                      <option value="Absent">Absent</option>
                    </select>
                    <?php if(!empty($errors['attendancestatus'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['attendancestatus']?></small>
                <?php endif;?>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
            </div>
              <!-- /.card-body -->
             
            </div> 
            
          </div>
          <div class="col-xl-4 col-md-6">
            <button class="btn btn-success">UPDATE</button>
            <a href="<?=ROOT?>/manageattendance"><button type="button" class="btn btn-warning">RESET</button></a>
          </div>
        </form>
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

<?php require viewsPath("partials/script"); ?>
<script>
   $(document).ready(function() {
    $('.js-example-basic-single').select2();
});

   function makePass(length) {
           var result = '';
          var characters = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
          var charactersLength = characters.length;
          for (var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            // counter += 1;
          }
          var passInput = document.getElementById('passInput');
          passInput.value = "ATT"+ <?php echo date('y') .date("m")?> + result;
         }
         makePass(4);

 function fetchministry(val) {
    var x = document.getElementById("ministryname").value;
    $.ajax({
      url: '<?=ROOT?>/ministryview',
      method: "POST",
      data:{ids: x},
      success: function(data){
        $("#member").html(data);
      }
    });
  }
function fetchmembers(val) {
      var x = document.getElementById("member").value;
      $.ajax({
        url: '<?=ROOT?>/tblmember',
        method: "POST",
        data:{id: x},
        success: function(data){
          $("#memberBody").html(data);
        }
      });
    }

</script>