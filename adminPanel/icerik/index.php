<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../goremez.php");
}
else{
  ?>

  <!DOCTYPE html>
  <html>
  <head>

    <title>AdminLTE 2 | Dashboard</title>
    <?php include("../inc/head.php") ?>
  </head>
  <body class="hold-transition skin-red-light fixed sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <?php include("../inc/header.php"); ?>
      </header>

      <aside class="main-sidebar">
       <?php include("../inc/menu.php") ?>
     </aside>

     <div class="content-wrapper">    
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <section class="content"> 
        <?php include("../inc/widget.php") ?>

        <div class="row">

          <section class="col-lg-12 connectedSortable">
            
          </section>

        </div>


      </section>

    </div>

    <?php include("../inc/footer.php"); }?>
  </div>
</body>
</html>
