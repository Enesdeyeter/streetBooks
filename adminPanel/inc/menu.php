 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="../inc/avatar04.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Admin</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Ara...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
      </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="active">
      <a href="index.php"><i class="fa fa-dashboard"></i> <span>Anasayfa</span></a>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>Üye İşlemleri</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="uyeler.php"><i class="fa fa-circle-o"></i> Üyeler</a></li>
        <li><a href="uyeSil.php"><i class="fa fa-circle-o"></i> Üye Sil</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-book"></i> <span>Kitap İşlemleri</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="kitaplar.php"><i class="fa fa-circle-o"></i> Kitaplar</a></li>
        <li><a href="kitapSil.php"><i class="fa fa-circle-o"></i> Kitap Sil</a></li>
        <li><a href="kitapEkle.php"><i class="fa fa-circle-o"></i> Kitap Ekle</a></li>
        <li><a href="kitapGuncelle.php"><i class="fa fa-circle-o"></i> Kitap Güncelle</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-list-alt"></i> <span>Kitap Listeleri</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href=""><i class="fa fa-circle-o"></i> Kitap Listeleri</a></li>
        <li><a href=""><i class="fa fa-circle-o"></i> Kitap Listesini Sil</a></li>
        <li><a href=""><i class="fa fa-circle-o"></i> Yeni Kitap Listesi Ekle</a></li>
        <li><a href=""><i class="fa fa-circle-o"></i> Kitap Listesini Güncelle</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-files-o"></i> <span>Eksik Kitaplar</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="eksikKitap.php"><i class="fa fa-circle-o"></i> Eksik Kitaplar</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-question-circle"></i> <span>SSS İşlemleri</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="sss.php"><i class="fa fa-circle-o"></i> SSS Listele</a></li>
        <li><a href="sssSil.php"><i class="fa fa-circle-o"></i> SSS Sil</a></li>
        <li><a href="sssEkle.php"><i class="fa fa-circle-o"></i> Yeni SSS Ekle</a></li>
        <li><a href="sssGuncelle.php"><i class="fa fa-circle-o"></i> SSS Güncelle</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-bolt"></i> <span>Araçlar</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href=""><i class="fa fa-circle-o"></i> Okuma Listeleri</a></li>
      </ul>
    </li>
    <hr>
  </ul>
</section>
      <!-- /.sidebar -->