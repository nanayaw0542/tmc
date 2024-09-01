<title>T M C S | Edit Member</title>
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
            <h1>Edit Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ROOT?>/addmember">Add Member</a></li>
              <li class="breadcrumb-item active">Edit Member</li>
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
            <h3 class="card-title"><h3><b>EDIT MEMBER</b></h3></h3>
          </div>
          <!-- /.card-header -->
          <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3" hidden>
                  <label>Member Code</label>
                  <input type="text" name="memberid" placeholder="Member Code" id="passInput" class="form-control" value="<?=set_value("memberid")?>" readonly>
              
              </div>
              <input type="text" name="updatedid" value="<?=Auth::get('UserId')?>" hidden>
              <!-- <input type="text" name="userid" value="<?=Auth::get('UserId')?>" hidden> -->
              <div class="col-xl-4 col-md-6">
                <label>Title</label>
                <select class="form-control <?=!empty($errors['titleid']) ? 'border-danger': ''?>" name="titleid">
                  <?php $tit = get_title_by_id($row["TitleId"]);
                    $tits = $tit["Title"];
                   ?>
                  <option selected value="<?=$row["TitleId"]?>"><?=$tits?></option>
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
                  <input type="text" class="form-control <?=!empty($errors['firstname']) ? 'border-danger': ''?>" name="firstname" autofocus placeholder="First Name" value="<?=set_value("firstname",$row["Firstname"])?>" autocomplete="off">
                  <?php if(!empty($errors['firstname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['firstname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-xl-4 col-md-6">
                  <label>Last Name</label>
                  <input type="text" class="form-control <?=!empty($errors['lastname']) ? 'border-danger': ''?>" name="lastname" id="lname" autocomplete="off" placeholder="Last Name"  value="<?=set_value("lastname",$row["Lastname"])?>">
                  <?php if(!empty($errors['lastname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['lastname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-xl-4 col-md-6">
                  <label>Gender</label>
                  <select class="form-control <?=!empty($errors['gender']) ? 'border-danger': ''?>" name="gender">
                      <option value="<?=$row["Gender"]?>" selected ><?=$row["Gender"]?></option>
                     <option <?=get_select('gender',"Male")?> value="Male">Male</option>
                     <option <?=get_select('gender',"Female")?> value="Female">Female</option>
                  </select>
                  <?php if(!empty($errors['gender'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['gender']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                  <label>Date of Birth</label>
                  <input type="text" name="dob" value="<?=set_value("dob",$row["DOB"])?>" autocomplete="off" class="form-control <?=!empty($errors['dob']) ? 'border-danger': ''?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm" data-mask >
                  <?php if(!empty($errors['dob'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['dob']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                <label>Age Range (Bracket)</label>
                <select class="form-control <?=!empty($errors['agerange']) ? 'border-danger': ''?>" name="agerange">
                  <option selected value="<?=$row["AgeRange"]?>"><?=$row["AgeRange"]?></option>
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
                <label>Member Type</label>
                <select class="form-control <?=!empty($errors['membertype']) ? 'border-danger': ''?>" name="membertype" >
                 <option value="<?=$row["MemberType"]?>" selected ><?=$row["MemberType"]?></option>
                  <option <?=get_select('membertype',"Normal Member")?> value="Normal Member">Normal Member</option>
                  <option <?=get_select('membertype',"Shepherd")?> value="Shepherd">Shepherd</option>
                  <option <?=get_select('membertype',"Church Worker")?> value="Church Worker">Church Worker</option>
                  <option <?=get_select('membertype',"Pastor")?> value="Pastor">Pastor</option>
                </select>
                <?php if(!empty($errors['membertype'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['membertype']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                <label>Marital Status</label>
                <select class="form-control <?=!empty($errors['maritalstatus']) ? 'border-danger': ''?>" name="maritalstatus">
                  <option value="<?=$row["MaritalStatus"]?>" selected ><?=$row["MaritalStatus"]?></option>
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
                      <option value="<?=$row["Country"]?>" selected><?=$row["Country"]?></option>
                      <option value="Ghanaian">Ghanaian</option>
                      <option value="Togolese">Togolese</option>
                  </select>
              </div>

                <div class="col-xl-4 col-md-6">
                  <label>Region</label>
                  <select class="form-control" name="region">
                      <option selected value="<?=$row["Region"]?>"><?=$row["Region"]?></option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Ashanti">Ashanti</option>
                  </select>
              </div>

              <div class="col-xl-4 col-md-6">
                  <label>Location</label>
                  <input type="text" name="address" value="<?=set_value("address",$row["Address"])?>" class="form-control <?=!empty($errors['address']) ? 'border-danger': ''?>" placeholder="Address of Location">
                  <?php if(!empty($errors['address'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['address']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                  <label>Email</label>
                  <input type="email" class="form-control rounded <?=!empty($errors['email']) ? 'border-danger': ''?>" placeholder="Email Address" name="email" value="<?=set_value('email',$row["Email"])?>"/>
                  <?php if(!empty($errors['email'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['email']?></small>
                <?php endif;?>
              </div>

              <div class="col-xl-4 col-md-6">
                  <label>Telephone # (Whatsapp)</label>
                  <input type="text" name="telephone1" class="form-control <?=!empty($errors['telephone1']) ? 'border-danger': ''?>" value="<?=set_value("telephone1",$row["Telephone1"])?>" placeholder="Telephone # (Whatsapp)">
                  <?php if(!empty($errors['telephone1'])) : ?>
                <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['telephone1']?></small>
                <?php endif;?>
              </div>
              <div class="col-xl-4 col-md-6">
                  <label>Telephone Number 2</label>
                  <input type="text" name="telephone2" class="form-control" value="<?=set_value("telephone2",$row["Telephone2"])?>" placeholder="Telephone Number">
              </div>

              <div class="col-xl-4 col-md-6">
                <label>Education Level:</label>
                <select class="form-control <?=!empty($errors['educationid']) ? 'border-danger': ''?>" name="educationid">
                  <?php $level = get_edu_by_id($row["EducationId"]);
                    $edus = $level["Category"];
                   ?>
                  <option selected value="<?=$row["EducationId"]?>"><?=$edus?></option>
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
                  <?php $level = get_cert_by_id($row["CertificateId"]);
                    $certs = $level["CertificateName"];
                   ?>
                  <option selected value="<?=$row["CertificateId"]?>"><?=$certs?></option>
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
                <input type="text" name="occupation" class="form-control <?=!empty($errors['occupation']) ? 'border-danger': ''?>" value="<?=set_value("occupation",$row["Occupation"])?>" placeholder="Occupation">
                <?php if(!empty($errors['occupation'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['occupation']?></small>
              <?php endif;?>
            </div>

            <div class="col-xl-4 col-md-6">
              <label>Occupation Description</label>
              <textarea class="form-control" name="description" placeholder="Please enter the nature of your work"></textarea>
            </div>

            <div class="col-xl-4 col-md-6">
                <label>Ministry</label>
                <select class="form-control <?=!empty($errors['ministryid']) ? 'border-danger': ''?>" name="ministryid" >
                   <?php $level = get_ministry_by_id($row["MinistryId"]);
                    $mini = $level["MinistryName"];
                   ?>
                  <option selected value="<?=$row["MinistryId"]?>"><?=$mini?></option>
                    <?php foreach($ministry as $min) {?>
                   <option value="<?=$min["MinistryId"]?>"><?=$min["MinistryName"]?></option>
                 <?php } ?>
                </select>
                <?php if(!empty($errors['ministryid'])) : ?>
              <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['ministryid']?></small>
              <?php endif;?>
            </div>

            <div class="col-xl-4 col-md-6">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="<?=$row["Status"]?>" selected ><?=$row["Status"]?></option>
                   <option <?=get_select('status',"Active")?>value="Active">Active</option>
                   <option <?=get_select('status',"Inactive")?> value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="col-xl-4 col-md-6">
                   <label>Member's Image<span class="required">*</span></label>
                   <input type="file" name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger': ''?>" onchange="readUrl(this);">
                   <?php if(!empty($errors['image'])) : ?>
                    <small style="font-size: 10px;font-style: italic;" class="text-danger"><?=$errors['image']?></small>
                    <?php endif;?>
                  </div><img src="<?=$row["Image"]?>" id="userImage" alt="image" class="rounded-circle shadow" style="width: 15%; display: inline-block;"><br>

                  <div class="col-md-12"><br>
                    <button class="btn btn-success">UPDATE</button>
                    <a href="<?=ROOT?>/managemembers"><button type="button" class="btn btn-warning">RESET</button></a>
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
           
          var passInput = document.getElementById('passInput');
          passInput.value = "TMCS"+ <?php echo date('y') .date("m") . rand(100,999)?>;
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
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 
<!-- jQuery -->
<?php require viewsPath("partials/script"); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

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

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

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
<footer class="main-footer">
    <?php require viewsPath("partials/footer"); ?>
  </footer>
