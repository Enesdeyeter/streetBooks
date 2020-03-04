<!DOCTYPE html>
<html>
<head>
  <title>Street Books| Görmeye Yetkiniz Yok</title>
  <?php include("inc/head.php") ?>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page" style="background: #dd4b39 url(cartographer.png) repeat; color:white">
<div class="login-box" style="width: 600px;">
  <div class="login-logo">
    <a href="index.php" style="color:whitesmoke"><b>Bu Sayfayı Görmeye Yetkiniz Yoktur !</b></a><br>
    <small>Yönlendiriliyorsunuz.</small>
    <?php header("Refresh: 5; url=index.php"); ?>
  </div>
</div>
</body>
</html>
