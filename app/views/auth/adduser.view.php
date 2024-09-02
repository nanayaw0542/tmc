<title>T M C S | Add User</title>
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
            <h1>Add New User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>/manageusers">Manage Users</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
            <h3 class="card-title"><h3><b>ADD A NEW USER</b></h3></h3>
          </div>
          <div class="col-lg-4 col-md-6 mt-2">
            <label>Select Shepherd's Name</label>
            <select class="form-control" name="shepherd" id="shepherd" onchange="fetchShepherds(this);">
              <option selected disabled>-select-</option>
              <?php foreach($members as $mem) {?>
              <option value="<?=$mem["MemberId"]?>"><?=$mem["Fullname"]?></option>
            <?php } ?>
            </select>
          </div>
          <!-- /.card-header -->
          <form method="post" enctype="multipart/form-data" id="shepherd_form">
          

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
          var result = 'SHP';
          var characters = '0123456789';
          var charactersLength = characters.length;
          for (var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            // counter += 1;
          }
          var passInput = document.getElementById('passInput');
          passInput.value = result+ <?php echo date('y') .date("m")?>;
         }
         makePass(3);

         function readUrl(input) {
             // body...
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#userImage').attr('src',e.target.result).width(150).height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }

           function makeUsername(length) {
        // var classabb = document.getElementById("subname").value.replace(/\s+/g, '');
        var fname = document.getElementById("fname").value.substring(0,4).toLowerCase();
          var lname = document.getElementById("lname").value.substring(0,4).toLowerCase();
          var uname = document.getElementById('uname');
          uname.value = fname+lname+<?php echo rand(10,99) ?>;
         }

    function fetchShepherds(val) {
    var x = document.getElementById("shepherd").value;
    $.ajax({
      url: '<?=ROOT?>/usersview',
      method: "POST",
      data:{id: x},
      success: function(data){
        $("#shepherd_form").html(data);
      }
    });
  }
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
