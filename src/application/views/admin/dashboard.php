<?php $admin = $this->session->userdata("admin"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?></title>
<link href="<?php echo base_url("assets/a/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/css/sb-admin.css"); ?>" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
<?php $this->load->view("admin/menu");?>
<div class="content-wrapper">
<div class="container-fluid">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?php echo base_url("admin"); ?>">Panel</a>
</li>
<li class="breadcrumb-item active">Anasayfa</li>
</ol>
<!-- Icon Cards-->
<div class="row">
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-primary o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-sticky-note"></i>
</div>
<div class="mr-5"><?php echo $istatistikler['itiraf_sayisi']; ?> İtiraf</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url("admin/itiraflar"); ?>">
<span class="float-left">Detayları görüntüle</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-warning o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-support"></i>
</div>
<div class="mr-5"><?php echo $istatistikler['iletisim_mesaj_sayisi']; ?> İletişim Mesajı</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url("admin/iletisim"); ?>">
<span class="float-left">Detayları görüntüle</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-success o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-comments"></i>
</div>
<div class="mr-5"><?php echo $istatistikler['yorum_sayisi']; ?> Yorum</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url("admin/yorumlar"); ?>">
<span class="float-left">Detayları görüntüle</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-danger o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-eye"></i>
</div>
<div class="mr-5"><?php echo $istatistikler['itiraf_goruntulenme']; ?> İtiraf Görüntülenme Sayısı</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="#">
<span class="float-left">Detayları görüntülemeee</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-lg-12">
<!-- son yazilar-->
<div class="mb-0 mt-4">
<i class="fa fa-newspaper-o"></i> Son gönderilen itiraflar</div>
<hr class="mt-2">
<div class="card-columns">
<?php foreach ($itiraf_listesi as $row) { ?>
<?php
$metin = $row->itiraf_icerik;
$uzunluk = strlen($metin);
$sinir = 250;
if ($uzunluk>$sinir) {
$itiraf_icerik_v2 = substr($metin,0,$sinir);
}
else if($uzunluk<$sinir){
$itiraf_icerik_v2 = $metin;
}
?>
<!-- son itiraflar -->
<div class="card mb-2">
<div class="card-body">
<h6 class="card-title mb-1">Rumuz: <a target="_blank" href="<?php echo base_url("itiraf/$row->id"); ?>"><?php echo strip_tags($row->itiraf_rumuz); ?></a></h6>
<p class="card-text small"><?php echo strip_tags($itiraf_icerik_v2); ?></p>
</div>
</div>
<!-- son itiraflar -->
<?php } ?>
</div>
</div>
</div>
<footer class="sticky-footer">
<div class="container">
<div class="text-center">
<small>Copyright © Burak Dündar 2018</small>
</div>
</div>
</footer>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>
<?php $this->load->view("admin/cikis_yap");?>
</div>
</body>
<script src="<?php echo base_url("assets/a/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin-datatables.min.js"); ?>"></script>
</html>