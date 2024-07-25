<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>T M C S | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendors/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vendors/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendors/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color: lightgrey;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <b class="h1">T M C S <img src="assets/image/logo.jpg" style="width: 50px;" class="rounded-circle"></b>
    </div>
    <div class="card-body">
      <h4 class="mb-2 text-purple-500 dark:text-purple-500 text-center">Welcome Back !</h4>
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control <?=!empty($errors['username']) ? 'border-danger': ''?>" value="<?=set_value('username')?>" name="username" placeholder="Username" autocomplete="off" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <?php if(!empty($errors['username'])) : ?>
          <small style="float: left;" class="text-danger col-12"><?=$errors['username']?></small>
          <?php endif;?>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control <?=!empty($errors['passwords']) ? 'border-danger': ''?>" value="<?=set_value('passwords')?>" name="passwords" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?php if(!empty($errors['passwords'])) : ?>
          <small style="float: left;" class="text-red col-12"><?=$errors['passwords']?></small>
          <?php endif;?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="vendors/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vendors/dist/js/adminlte.min.js"></script>
</body>
</html>
