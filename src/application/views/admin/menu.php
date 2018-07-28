<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
<a class="navbar-brand" href="<?php echo base_url("admin"); ?>"><?php echo $title; ?></a>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menu_rsp" aria-controls="menu_rsp" aria-expanded="false" aria-label="Menü">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="menu_rsp">
<ul class="navbar-nav navbar-sidenav" id="acilir_menu">
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Anasayfa">
<a class="nav-link" href="<?php echo base_url("admin"); ?>">
<i class="fa fa-fw fa-home"></i>
<span class="nav-link-text">Anasayfa</span>
</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="İtiraflar">
<a class="nav-link" href="<?php echo base_url("admin/itiraflar"); ?>">
<i class="fa fa-fw fa-sticky-note"></i>
<span class="nav-link-text">İtiraflar</span>
</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Yöneticiler">
<a class="nav-link" href="<?php echo base_url("admin/yoneticiler"); ?>">
<i class="fa fa-fw fa-users"></i>
<span class="nav-link-text">Yöneticiler</span>
</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Yorumlar">
<a class="nav-link" href="<?php echo base_url("admin/yorumlar"); ?>">
<i class="fa fa-fw fa-comments"></i>
<span class="nav-link-text">Yorumlar</span>
</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="İletişim Mesajları">
<a class="nav-link" href="<?php echo base_url("admin/iletisim"); ?>">
<i class="fa fa-fw fa-support"></i>
<span class="nav-link-text">İletişim Mesajları</span>
</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ayarlar">
<a class="nav-link" href="<?php echo base_url("admin/ayarlar"); ?>">
<i class="fa fa-fw fa-cog"></i>
<span class="nav-link-text">Ayarlar</span>
</a>
</li>
</ul>
<ul class="navbar-nav sidenav-toggler">
<li class="nav-item">
<a class="nav-link text-center" id="sidenavToggler">
<i class="fa fa-fw fa-angle-left"></i>
</a>
</li>
</ul>
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-fw fa-sign-out"></i>Çıkış yap</a>
</li>
</ul>
</div>
</nav>