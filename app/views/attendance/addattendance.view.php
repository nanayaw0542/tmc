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
                <div class="col-xl-3 col-md-6 mt-3">
                  <label>Sort By</label>
                  <select class="form-control" name="sortby">
                    <option selected disabled>-select-</option>
                    <option value="All">All</option>
                    <option value="Ministry">Ministry</option>
                    <option value="Bacenta">Bacenta</option>
                  </select>
                </div>
                <div class="col-xl-4 col-md-6 mt-3">
                  <label>Ministry</label>
                  <select class="form-control" name="sortby" id="ministryname" onchange="fetchministry(this);">
                    <option selected disabled>-select-</option>
                    <?php foreach($ministry as $min){ ?>
                    <option value="<?=$min["MinistryId"]?>"><?=$min["MinistryName"]?></option>
                  <?php } ?>
                  </select>
                </div>
              <div class="col-xl-4 col-md-6 mt-2">
                <label class="p-1">Select a member</label>
                  <select class="js-example-basic-single mt-3 form-control" name="state" id="member" onchange="fetchmembers(this);">
                    <option selected disabled>-select-</option>
                    <?php foreach($members as $mem) {?>
                  <option value="<?=$mem["MemberId"]?>"><?=$mem["Fullname"]?></option>
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
                    <th>#</th>
                    <th>Member Code</th>
                    <th>Name</th>
                    <th>Ministry</th>
                  </tr>
                  </thead>
                  <tbody id="memberBody">
                  
                  </tbody>
                  </table>
              </div>
              <div class="col-xl-4">
            <table class="table table-bordered table-striped">
              <thead>
                <th style="color: green;">MARK ATTENDANCE</th>
                <!-- <th>ABSENT</th> -->
                <!-- Present <td><input type="radio" class="form-control" name=""></td> -->
              </thead>
              <tbody>
                <tr>
                  <td><input type="radio" class="" value="1" name=""> Present </td>
                 
                </tr>
              </tbody>
            </table>
          </div>
            </div>
              <!-- /.card-body -->
             
            </div> 
            
          </div>
          <div class="col-xl-4 col-md-6">
            <button class="btn btn-primary">Submit</button>
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