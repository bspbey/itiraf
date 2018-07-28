<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="author" content="Burak Dündar" />
<meta name="robots" content="all"/>
<meta name="description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="Burak Dündar" />
<meta name="copyright" content="Copyright Burak Dündar - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@desponres"/>
<meta name="twitter:url" content="<?php echo base_url(); ?>">
<meta name="twitter:title" content="Burak Dündar">
<meta name="twitter:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="twitter:image" content="<?php echo base_url("assets/images/bd.png"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="Burak Dündar">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url(); ?>">
<meta property="og:image" content="<?php echo base_url("assets/images/bd.png"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/itiraf_anasayfa.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand" href="<?php echo base_url();?>"><?php echo strip_tags($ayarlar->site_title); ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">
<li class="nav-item active"><a class="nav-link" href="<?php echo base_url();?>">Anasayfa<span class="sr-only">(current)</span></a></li>
<li class="nav-item"><a class="nav-link" href="<?php echo base_url("iletisim");?>">İletişim</a></li>
</ul>
</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-12">
<br>
<?php $alert = $this->session->userdata("alert");
if($alert){ ?>
<div class="alert alert-<?php echo $alert["type"]; ?>">
<strong><?php echo $alert["title"]; ?></strong> <?php echo $alert["message"]; ?>
</div>
<?php } ?>
<div class="card mb-4">
<div class="card-body">
<form action="<?php echo base_url("itiraf/ekle"); ?>" method="post">
<div class="form-group">
<textarea name="itiraf_icerik" class="form-control" rows="3" placeholder="Neyi itiraf ediyorsun ? :)"></textarea>
</div>
<div class="row">
<div class="col-5">
<input name="itiraf_rumuz" type="text" class="form-control" placeholder="Rumuz">
</div>
<div class="col-5">
<select name="itiraf_cinsiyet" class="form-control">
<option selected disabled>Cinsiyet</option>
<option value="1">Erkek</option>
<option value="2">Kadın</option>
</select>
</div>
<div class="col-2">
<input type="submit" class="btn btn-success btn-block" value="İtirafı gönder">
</div>
</div>
</form>
</div>
</div>
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
<div class="card mb-4">
<div class="card-header">
<strong>Rumuz: <?php echo $row->itiraf_rumuz; ?></strong>
<strong style="float:right;"><a href="#" data-toggle="modal" data-target="#paylas"><i data-toggle="tooltip" data-placement="top" title="Sosyal Medyada Paylaş" class="fa fa-share-alt-square"></i></a></strong>
<div class="modal fade" id="paylas" tabindex="-1" role="dialog" aria-labelledby="paylas" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">İtirafı Sosyal Medyada Paylaş</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="col-12">
<div class="input-group mb-4 sosyal_paylas">
<div class="btnsylfa facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("itiraf/".$row->id); ?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
<div class="btnsyl twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo base_url("itiraf/".$row->id); ?>&text=<?php echo $row->itiraf_icerik; ?>" target="_blank"><i class="fa fa-twitter"></i></a></div>
<div class="btnsyl whatsapp"><a href="whatsapp://send?text=<?php echo base_url("itiraf/".$row->id); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></div>
<div class="btnsyl linkedin"><a href="https://www.linkedin.com/shareArticle?url=<?php echo base_url("itiraf/".$row->id); ?>&title=<?php echo $row->itiraf_icerik; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></div>
<div class="btnsyl google-plus"><a href="https://plus.google.com/share?url=<?php echo base_url("itiraf/".$row->id); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></div>
</div>
<div class="input-group mb-3">
<input id="itiraf_url" type="text" class="form-control" value="<?php echo base_url("itiraf/".$row->id); ?>">
<div class="input-group-append">
<button data-clipboard-target="#itiraf_url" class="btn btn-outline-secondary" type="button">Kopyala</button>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
</div>
</div>
</div>
</div>
</div>
<div class="card-body">
<p class="card-text"><?php echo $itiraf_icerik_v2; ?>...</p>
<a href="<?php echo base_url("itiraf/".$row->id); ?>" class="btn btn-primary">Devamını oku &rarr;</a>
</div>
<div class="card-footer text-muted"><?php $tarih = $row->createdAt; echo $this->fonksiyonlar->timeConvert($tarih); ?> - <?php if($row->itiraf_cinsiyet=='1'){echo "Erkek"; } else if($row->itiraf_cinsiyet=='2'){echo "Kadın"; } else { echo "Cinsiyet Belirtilmemiş";} ?></div>
</div>
<?php } ?>
<nav>
<?php echo $this->pagination->create_links(); ?>
</nav>
</div>
</div>
</div>
<footer class="py-5 bg-dark">
<div class="container">
<p class="m-0 text-center text-white">Copyright &copy; 2018 - <a target="_blank" href="https://www.burakdundar.com/">Burak Dündar</a> tarafından masada kodlanmıştır :)</p>
</div>
</footer>
<script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/jquery/clipboard.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/jquery/clipboard.dm.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>