<!DOCTYPE html>
<html>
<head>
  <title>Street Books</title>
  <?php include("inc/head.php") ?>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page" style="background: #dd4b39 url(cartographer.png) repeat; color:white">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php" style="color:whitesmoke"><b>Street Books</b></a><br>
    <small>Admin Panel</small>
  </div>
  <!-- /.login-logo -->
  <div style="text-align: center; margin-bottom: 10px;">
    <small>user: 1 ~ password: 1</small>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Admin Paneline giriş yapmak için oturum açın</p>

    <form action="login.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" placeholder="Kullancı Adı">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Şifre">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block btn-flat">Giriş Yap</button>
        </div>
      </div>
    </form>

  </div>
  <p style="text-align: center; margin-top: 7px;"> Street Books © 2018 </p>
</div>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
