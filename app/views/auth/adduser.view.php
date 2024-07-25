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
          <!-- /.card-header -->
          <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                  <label>Usercode</label>
                  <input type="text" name="userid" placeholder="Usercode" id="passInput" class="form-control" value="<?=set_value("userid")?>" readonly>
              
              </div>
              <input type="text" name="addedid" value="<?=Auth::get('UserId')?>" hidden>
              <div class="col-md-3">
                <label>Title</label>
                <select class="form-control <?=!empty($errors['title']) ? 'border-danger': ''?>" name="title">
                  <option <?=get_select('title',"")?> selected disabled>-select-</option>
                   <option <?=get_select('title',"Mr")?> value="Mr">Mr</option>
                   <option <?=get_select('title',"Mrs")?> value="Mrs">Mrs</option>
                   <option <?=get_select('title',"Pastor")?> value="Pastor">Pastor</option>
                   <option <?=get_select('title',"Reverend")?> value="Reverend">Reverend</option>
                </select>
                <?php if(!empty($errors['title'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['title']?></small>
                <?php endif;?>
              </div>
              <div class="col-md-3">
                  <label>First Name</label>
                  <input type="text" class="form-control <?=!empty($errors['firstname']) ? 'border-danger': ''?>" name="firstname" id="fname" onkeyup="makeUsername(this);" autofocus placeholder="First Name" id="fname" value="<?=set_value("firstname")?>" autocomplete="off">
                  <?php if(!empty($errors['firstname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['firstname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-md-3">
                  <label>Last Name</label>
                  <input type="text" class="form-control <?=!empty($errors['lastname']) ? 'border-danger': ''?>" name="lastname" id="lname" autocomplete="off" onkeyup="makeUsername(this);" placeholder="Last Name" id="lname" value="<?=set_value("lastname")?>">
                  <?php if(!empty($errors['lastname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['lastname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-md-3">
                  <label>Gender</label>
                  <select class="form-control <?=!empty($errors['gender']) ? 'border-danger': ''?>" name="gender">
                      <option <?=get_select('gender',"")?> selected disabled>-select-</option>
                     <option <?=get_select('gender',"Male")?> value="Male">Male</option>
                     <option <?=get_select('gender',"Female")?> value="Female">Female</option>
                  </select>
                  <?php if(!empty($errors['gender'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['gender']?></small>
                <?php endif;?>
              </div>

              <div class="col-md-3">
                  <label>Date of Birth</label>
                  <input type="date" name="dob" value="<?=set_value("dob")?>" class="form-control <?=!empty($errors['dob']) ? 'border-danger': ''?>">
                  <?php if(!empty($errors['dob'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['dob']?></small>
                <?php endif;?>
              </div>

              <div class="col-md-3">
                  <label>Nationality</label>
                  <select class="form-control <?=!empty($errors['nationality']) ? 'border-danger': ''?>" name="nationality" >
                      <option disabled selected>-select-</option>
                      <option value="Ghanaian">Ghanaian</option>
                      <option value="Togolese">Togolese</option>
                  </select>
              </div>

                <div class="col-md-3">
                  <label>Region</label>
                  <select class="form-control" name="region">
                      <option selected disabled>-select-</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Ashanti">Ashanti</option>
                  </select>
              </div>

              <div class="col-md-3">
                  <label>Address</label>
                  <input type="text" name="address" value="<?=set_value("address")?>" class="form-control <?=!empty($errors['address']) ? 'border-danger': ''?>" placeholder="Address of Location">
                  <?php if(!empty($errors['address'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['address']?></small>
                <?php endif;?>
              </div>

              <div class="col-md-3">
                  <label>Email</label>
                  <input type="email" class="form-control rounded <?=!empty($errors['email']) ? 'border-danger': ''?>" placeholder="Email Address" name="email" value="<?=set_value('email')?>"/>
                  <?php if(!empty($errors['email'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['email']?></small>
                <?php endif;?>
              </div>

              <div class="col-md-3">
                  <label>Telephone # (Whatsapp)</label>
                  <input type="text" name="telephone1" class="form-control <?=!empty($errors['telephone1']) ? 'border-danger': ''?>" value="<?=set_value("telephone1")?>" placeholder="Telephone # (Whatsapp)">
                  <?php if(!empty($errors['telephone1'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['telephone1']?></small>
                <?php endif;?>
              </div>
              <div class="col-md-3">
                  <label>Telephone Number 2</label>
                  <input type="text" name="telephone2" class="form-control" value="<?=set_value("telephone2")?>" placeholder="Telephone Number">
              </div>

              <div class="col-md-3">
                <label>Username:</label>
                <input type="text" name="username" class="form-control <?=!empty($errors['username']) ? 'border-danger': ''?>" value="<?=set_value("username")?>" id="uname" placeholder="Username" onkeyup="makeUsername(this);" readonly>
                <?php if(!empty($errors['username'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['username']?></small>
              <?php endif;?>
            </div>

            <div class="col-md-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control <?=!empty($errors['password']) ? 'border-danger': ''?>" value="<?=set_value("password")?>" placeholder="Enter Password">
                <?php if(!empty($errors['password'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['password']?></small>
              <?php endif;?>
            </div>

            <div class="col-md-3">
                <label>Retype Password</label>
                <input type="password" name="retypepassword" class="form-control <?=!empty($errors['retypepassword']) ? 'border-danger': ''?>" value="<?=set_value("retypepassword")?>" placeholder="Retype Password">
                <?php if(!empty($errors['retypepassword'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['retypepassword']?></small>
              <?php endif;?>
            </div>

            <div class="col-md-3">
                <label>Role</label>
                <select class="form-control <?=!empty($errors['role']) ? 'border-danger': ''?>" name="role" >
                    <option <?=get_select('role',"")?> selected disabled>-select-</option>
                   <option <?=get_select('role',"Admin")?> value="Admin">Admin</option>
                   <option <?=get_select('role',"Super Admin")?> value="Super Admin">Super Admin</option>
                </select>
                <?php if(!empty($errors['role'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['role']?></small>
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

            <div class="col-md-4">
                   <label>User's Image<span class="required">*</span></label>
                   <input type="file" name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger': ''?>" onchange="readUrl(this);">
                   <?php if(!empty($errors['image'])) : ?>
                    <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['image']?></small>
                    <?php endif;?>
                  </div><img src="assets/image/no-image.png" id="userImage" alt="image" class="shadow" style="width: 15%; display: inline-block;"><br> 

                  <div class="col-md-12"><br>
                    <button class="btn btn-primary">SUBMIT</button>
                    <a href="<?=ROOT?>/manageusers"><button type="button" class="btn btn-warning">RESET</button></a>
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
