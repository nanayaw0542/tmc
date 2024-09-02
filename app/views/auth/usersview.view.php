<?php foreach($members as $row) {?>
<div class="card-body">
            <div class="row">
              <div class="col-md-3">
                  <label>Usercode</label>
                  <input type="text" name="userid" placeholder="Usercode" id="passInput" class="form-control" value="<?=set_value("userid",$row["MemberId"])?>" readonly>
              
              </div>
              <input type="text" name="addedid" value="<?=Auth::get('UserId')?>" hidden>
              <?php $title = get_title_by_id($row["TitleId"]);

               ?>
              <div class="col-md-3">
                <label>Title</label>
                <select class="form-control <?=!empty($errors['title']) ? 'border-danger': ''?>" name="title" disabled>
                  <option value="<?=$row["TitleId"]?>" selected ><?=$title["Title"]?></option>
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
                  <input type="text" class="form-control <?=!empty($errors['firstname']) ? 'border-danger': ''?>" name="firstname" id="fname" onkeyup="makeUsername(this);" autofocus placeholder="First Name" id="fname" value="<?=set_value("firstname",$row["Firstname"])?>" autocomplete="off">
                  <?php if(!empty($errors['firstname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['firstname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-md-3">
                  <label>Last Name</label>
                  <input type="text" class="form-control <?=!empty($errors['lastname']) ? 'border-danger': ''?>" name="lastname" id="lname" autocomplete="off" onkeyup="makeUsername(this);" placeholder="Last Name" id="lname" value="<?=set_value("lastname",$row["Lastname"])?>">
                  <?php if(!empty($errors['lastname'])) : ?>
                  <small style="font-size: 10px; font-style: italic;" class="text-danger col-12"><?=$errors['lastname']?></small>
                  <?php endif;?>
              </div>

               <div class="col-md-3">
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
                   <option <?=get_select('role',"Accountant")?> value="Accountant">Accountant</option>
                   <option <?=get_select('role',"Shepherd")?> value="Shepherd">Shepherd</option>
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
            <?php } ?>