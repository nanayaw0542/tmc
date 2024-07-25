<title>T M C S | Edit User</title>
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
            <h1>Delete User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>/edituser">Edit User</a></li>
              <li class="breadcrumb-item active">Delete User</li>
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
            <h5 class="card-title"><b class="alert alert-danger text-center">Are you sure you want to delete <?=$row["Fullname"]?>'s records</b></h5>
          </div>
          <!-- /.card-header -->
          <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                  <label>Usercode</label>
                  <input type="text" name="userid" placeholder="Usercode" class="form-control" value="<?=set_value("userid",$row['UserId'])?>" readonly>
              
              </div>
              <input type="text" name="updatedid" value="<?=Auth::get('UserId')?>" hidden>
              <div class="col-md-3">
                <label>Title</label>
                <select class="form-control <?=!empty($errors['title']) ? 'border-danger': ''?>" name="title" readonly>
                  <option <?=get_select('title',"")?> selected value="<?=$row["Title"]?>"><?=$row["Title"]?></option>
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
                  <input type="text" class="form-control" name="firstname" id="fname" onkeyup="makeUsername(this);" autofocus placeholder="First Name" id="fname" value="<?=set_value("firstname",$row['Firstname'])?>" autocomplete="off" readonly>
                  <?php if(!empty($errors['firstname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['firstname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-md-3">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="lastname" id="lname" autocomplete="off" onkeyup="makeUsername(this);" placeholder="Last Name" id="lname" value="<?=set_value("lastname",$row['Lastname'])?>" readonly>
                  <?php if(!empty($errors['lastname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['lastname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-md-3">
                  <label>Gender</label>
                  <select class="form-control <?=!empty($errors['gender']) ? 'border-danger': ''?>" name="gender" readonly>
                      <option <?=get_select('gender',"")?> selected value="<?=$row['Gender']?>"><?=$row["Gender"]?></option>
                     <option <?=get_select('gender',"Male")?> value="Male">Male</option>
                     <option <?=get_select('gender',"Female")?> value="Female">Female</option>
                  </select>
                  <?php if(!empty($errors['gender'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['gender']?></small>
                <?php endif;?>
              </div>

              <div class="col-md-3">
                  <label>Date of Birth</label>
                  <input type="date" name="dob" value="<?=set_value("dob",$row['DOB'])?>" class="form-control <?=!empty($errors['dob']) ? 'border-danger': ''?>" readonly>
                  <?php if(!empty($errors['dob'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['dob']?></small>
                <?php endif;?>
              </div>

              <div class="col-md-3">
                  <label>Nationality</label>
                  <select class="form-control <?=!empty($errors['country']) ? 'border-danger': ''?>" name="country" readonly>
                      <option disabled selected>-select-</option>
                      <option value="Ghanaian">Ghanaian</option>
                      <option value="Togolese">Togolese</option>
                  </select>
              </div>

                <div class="col-md-3">
                  <label>Region</label>
                  <select class="form-control" name="region" readonly>
                      <option selected disabled>-select-</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Ashanti">Ashanti</option>
                  </select>
              </div>

              <div class="col-md-3">
                  <label>Address</label>
                  <input type="text" name="address" value="<?=set_value("address",$row["Address"])?>" class="form-control <?=!empty($errors['address']) ? 'border-danger': ''?>" placeholder="Address of Location" readonly>
                  <?php if(!empty($errors['address'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['address']?></small>
                <?php endif;?>
              </div>

              <div class="col-md-3">
                  <label>Email</label>
                  <input type="email" class="form-control rounded <?=!empty($errors['email']) ? 'border-danger': ''?>" placeholder="Email Address" name="email" value="<?=set_value('email',$row["Email"])?>" readonly/>
                  <?php if(!empty($errors['email'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['email']?></small>
                <?php endif;?>
              </div>

              <div class="col-md-3">
                  <label>Telephone # (Whatsapp)</label>
                  <input type="text" name="telephone1" class="form-control <?=!empty($errors['telephone1']) ? 'border-danger': ''?>" value="<?=set_value("telephone1",$row["Telephone1"])?>" placeholder="Telephone # (Whatsapp)" readonly>
                  <?php if(!empty($errors['telephone1'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['telephone1']?></small>
                <?php endif;?>
              </div>
              <div class="col-md-3">
                  <label>Telephone Number 2</label>
                  <input type="text" name="telephone2" class="form-control" value="<?=set_value("telephone2",$row["Telephone2"])?>" placeholder="Telephone Number" readonly>
              </div>

              <div class="col-md-3">
                <label>Username:</label>
                <input type="text" name="username" class="form-control <?=!empty($errors['username']) ? 'border-danger': ''?>" value="<?=set_value("username",$row["Username"])?>" id="uname" placeholder="Username" onkeyup="makeUsername(this);" readonly>
                <?php if(!empty($errors['username'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['username']?></small>
              <?php endif;?>
            </div>

            <div class="col-md-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control <?=!empty($errors['password']) ? 'border-danger': ''?>" value="<?=set_value("password")?>" placeholder="Enter Password" readonly>
                <?php if(!empty($errors['password'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['password']?></small>
              <?php endif;?>
              <small class="text-danger" style="font-size: 10px; font-style: italic;">Please leave empty, if you do not want to change the password</small>
            </div>

            <div class="col-md-3">
                <label>Retype Password</label>
                <input type="password" name="retypepassword" class="form-control <?=!empty($errors['retypepassword']) ? 'border-danger': ''?>" value="<?=set_value("retypepassword")?>" placeholder="Retype Password" readonly>
                <?php if(!empty($errors['retypepassword'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['retypepassword']?></small>
              <?php endif;?>
              <small class="text-danger" style="font-size: 10px; font-style: italic;">Please leave empty, if you do not want to change the password</small>
            </div>

            <div class="col-md-3">
                <label>Role</label>
                <select class="form-control <?=!empty($errors['role']) ? 'border-danger': ''?>" name="role" readonly>
                    <option <?=get_select('role',"")?> selected value="<?=$row["Role"]?>"><?=$row["Role"]?></option>
                   <option <?=get_select('role',"Admin")?> value="Admin">Admin</option>
                   <option <?=get_select('role',"Super Admin")?> value="Super Admin">Super Admin</option>
                </select>
                <?php if(!empty($errors['role'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['role']?></small>
              <?php endif;?>
            </div>

            <div class="col-md-3">
                <label>Status</label>
                <select class="form-control" name="status" readonly>
                    <option <?=get_select('status',"")?>selected value="<?=$row["Status"]?>"><?=$row["Status"]?></option>
                   <option <?=get_select('status',"Active")?> value="Active">Active</option>
                   <option <?=get_select('status',"Inactive")?> value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="col-md-3">
               <label>User's Image<span class="required">*</span></label>
               <input type="file" name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger': ''?>" onchange="readUrl(this);" readonly>
               <?php if(!empty($errors['image'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['image']?></small>
                <?php endif;?>
              </div><img src="<?=$row["Image"]?>" id="userImage" alt="image" class="shadow" style="width: 15%; display: inline-block;"> 

                  <div class="col-md-12"><br>
                    <button class="btn btn-danger">DELETE</button>
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
