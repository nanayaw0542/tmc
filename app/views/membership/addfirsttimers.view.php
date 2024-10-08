<title>T M C S | Add First Timers</title>
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
            <h1>Add First Timers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>/managefirsttimers">Manage First Timers</a></li>
              <li class="breadcrumb-item active">Add First Timers</li>
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
            <h3 class="card-title"><h3><b>ADD A FIRST TIMER</b></h3></h3>
            <div align="">
              <div class="col-xl-3 col-xl-6 col-md-6" >
              <input type="file" name="" id="excel_file" class="form-control">
              <div id="excel_data" class="mt-2"></div>
            </div>
            </div>
            
          </div>
          <!-- /.card-header -->
          <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-3 col-md-6" hidden>
                  <label>Convert Code</label>
                  <input type="text" name="firsttimersid" id="passInput"  placeholder="Convert Code" class="form-control" readonly>
              </div>
              <input type="text" name="addedid" value="<?=Auth::get('UserId')?>" hidden>
              <input type="text" name="userid" value="<?=Auth::get('UserId')?>" hidden>
              <div class="col-xl-4 col-md-6">
                <label>Title</label>
                <select class="form-control <?=!empty($errors['titleid']) ? 'border-danger': ''?>" name="titleid">
                  <option <?=get_select('titleid',"")?> selected disabled>-select-</option>
                  <?php foreach($titles as $title) {?>
                   <option value="<?=$title["TitleId"]?>"><?=$title["Title"]?></option>
                 <?php } ?>
                </select>
                <?php if(!empty($errors['titleid'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['titleid']?></small>
                <?php endif;?>
              </div>
              <div class="col-xl-4 col-md-6">
                  <label>First Name</label>
                  <input type="text" class="form-control <?=!empty($errors['firstname']) ? 'border-danger': ''?>" name="firstname" autofocus placeholder="First Name" value="<?=set_value("firstname")?>" autocomplete="off">
                  <?php if(!empty($errors['firstname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['firstname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-xl-4 col-md-6">
                  <label>Last Name</label>
                  <input type="text" class="form-control <?=!empty($errors['lastname']) ? 'border-danger': ''?>" name="lastname" id="lname" autocomplete="off" placeholder="Last Name"  value="<?=set_value("lastname")?>">
                  <?php if(!empty($errors['lastname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['lastname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-xl-4 col-md-6">
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

              <div class="col-xl-4 col-md-6">
                  <label>Date of Birth (Enter Day and Month)</label>
                  <input type="text" name="dob" value="<?=set_value("dob")?>" autocomplete="off" class="form-control <?=!empty($errors['dob']) ? 'border-danger': ''?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm" data-mask >
                  <?php if(!empty($errors['dob'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['dob']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                <label>Age Range (Bracket)</label>
                <select class="form-control <?=!empty($errors['agerange']) ? 'border-danger': ''?>" name="agerange">
                  <option <?=get_select('agerange',"")?> selected disabled>-select-</option>
                     <option <?=get_select('agerange',"13-19")?> value="13-19">13-19</option>
                     <option <?=get_select('agerange',"20-29")?> value="20-29">20-29</option>
                     <option <?=get_select('agerange',"30-39")?> value="30-39">30-39</option>
                     <option <?=get_select('agerange',"40-49")?> value="40-49">40-49</option>
                     <option <?=get_select('agerange',"50-59")?> value="50-59">50-59</option>
                     <option <?=get_select('agerange',"60-69")?> value="60-69">60-69</option>
                     <option <?=get_select('agerange',"70-79")?> value="70-79">70-79</option>
                </select>
                <?php if(!empty($errors['agerange'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['agerange']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                <label >Inviter's Name</label>
                  <select class="js-example-basic-single form-control <?=!empty($errors['memberid']) ? 'border-danger': ''?>" name="memberid">
                    <option selected disabled>-select-</option>
                    <?php foreach($member as $mem) {?>
                  <option value="<?=$mem["MemberId"]?>"><?=$mem["Fullname"]?></option>
                <?php } ?>
                </select>
                <?php if(!empty($errors['memberid'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['memberid']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                <label>Marital Status</label>
                <select class="form-control <?=!empty($errors['maritalstatus']) ? 'border-danger': ''?>" name="maritalstatus">
                  <option <?=get_select('maritalstatus',"")?> selected disabled>-select-</option>
                   <option <?=get_select('maritalstatus',"Single")?> value="Single">Single</option>
                   <option <?=get_select('maritalstatus',"Married")?> value="Married">Married</option>
                   <option <?=get_select('maritalstatus',"Seperated")?> value="Seperated">Seperated</option>
                </select>
                <?php if(!empty($errors['maritalstatus'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['maritalstatus']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                  <label>Nationality</label>
                  <select class="form-control <?=!empty($errors['country']) ? 'border-danger': ''?>" name="country" >
                      <option disabled selected>-select-</option>
                      <option value="Ghanaian">Ghanaian</option>
                      <option value="Togolese">Togolese</option>
                  </select>
              </div>

                <div class="col-xl-4 col-md-6">
                  <label>Region</label>
                  <select class="form-control" name="region">
                      <option selected disabled>-select-</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Ashanti">Ashanti</option>
                  </select>
              </div>

              <div class="col-xl-4 col-md-6">
                  <label>Location</label>
                  <input type="text" name="address" value="<?=set_value("address")?>" class="form-control <?=!empty($errors['address']) ? 'border-danger': ''?>" placeholder="Address of Location">
                  <?php if(!empty($errors['address'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['address']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                  <label>Email</label>
                  <input type="email" class="form-control rounded <?=!empty($errors['email']) ? 'border-danger': ''?>" placeholder="Email Address" name="email" value="<?=set_value('email')?>"/>
                  <?php if(!empty($errors['email'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['email']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                  <label>Telephone # (Whatsapp)</label>
                  <input type="text" name="telephone1" class="form-control <?=!empty($errors['telephone1']) ? 'border-danger': ''?>" value="<?=set_value("telephone1")?>" placeholder="Telephone # (Whatsapp)">
                  <?php if(!empty($errors['telephone1'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['telephone1']?></small>
                <?php endif;?>
              </div>
              <div class="col-xl-4 col-md-6">
                  <label>Telephone Number 2</label>
                  <input type="text" name="telephone2" class="form-control" value="<?=set_value("telephone2")?>" placeholder="Telephone Number">
              </div>

              <div class="col-xl-4 col-md-6">
                <label>Education Level:</label>
                <select class="form-control <?=!empty($errors['educationid']) ? 'border-danger': ''?>" name="educationid">
                  <option selected disabled>-select-</option>
                  <?php foreach($education as $edu) {?>
                    <option value="<?=$edu["EducationId"]?>"><?=$edu["Category"]?></option>
                    <?php } ?>
                </select>
                <?php if(!empty($errors['educationid'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['educationid']?></small>
              <?php endif;?>
            </div>

            <div class="col-xl-4 col-md-6">
                <label>Certificate Attained:</label>
                <select class="form-control <?=!empty($errors['certificateid']) ? 'border-danger': ''?>" name="certificateid">
                  <option selected disabled>-select-</option>
                  <?php foreach($certificate as $cert) {?>
                    <option value="<?=$cert["CertificateId"]?>"><?=$cert["CertificateName"]?></option>
                    <?php } ?>
                </select>
                <?php if(!empty($errors['certificateid'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['certificateid']?></small>
              <?php endif;?>
            </div>

            <div class="col-xl-4 col-md-6">
                <label>Occupation</label>
                <input type="text" name="occupation" class="form-control <?=!empty($errors['occupation']) ? 'border-danger': ''?>" value="<?=set_value("occupation")?>" placeholder="Occupation">
                <?php if(!empty($errors['occupation'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['occupation']?></small>
              <?php endif;?>
            </div>

            <div class="col-xl-4 col-md-6">
              <label>Occupation Description</label>
              <input class="form-control" name="jobdescription" placeholder="Please enter the nature of your work">
            </div>

            <div class="col-xl-4 col-md-6" hidden>
                <label>Status</label>
                <select class="form-control" name="status">
                    <option <?=get_select('status',"")?>  disabled>-select-</option>
                   <option <?=get_select('status',"Active")?>selected value="Active">Active</option>
                   <option <?=get_select('status',"Inactive")?> value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="col-xl-4 col-md-6">
                   <label>Member's Image<span class="required">*</span></label>
                   <input type="file" name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger': ''?>" onchange="readUrl(this);">
                   <?php if(!empty($errors['image'])) : ?>
                    <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['image']?></small>
                    <?php endif;?>
                  </div><img src="assets/image/no-image.png" id="userImage" alt="image" class="shadow" style="width: 15%; display: inline-block;"><br> 

                  <div class="col-xl-12"><br>
                    <button class="btn btn-primary">SUBMIT</button>
                    <a href="<?=ROOT?>/managefirsttimers"><button type="button" class="btn btn-warning">RESET</button></a>
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
          passInput.value = "FTS"+ <?php echo date('y') .date("m")?> + result;
         }
         makePass(4);

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
     <script>
       $(document).ready(function(){
        $('#birth-date').mask('00/00');
        // $('#phone-number').mask('0000-0000');
      });
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

<script>


  $(function () {
    //Initialize Select2 Elements
    // $('.select2').select2()

    //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)


  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
