<!DOCTYPE html>
<html>
<head>
  <title>Street Books | Şifre Yanlış</title>
  <?php include("inc/head.php") ?>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page" style="background: #dd4b39 url(cartographer.png) repeat; color:white">
<div class="login-box" style="width: 600px;">
  <div class="login-logo">
    <a href="index.php" style="color:whitesmoke"><b>Kullanıcı Adı veya Şifre Hatalı</b></a><br>
    <small>Yönlendiriliyorsunuz.</small>
    <?php header("Refresh: 10; url=index.php"); ?>
  </div>
</div>
</body>
</html>
