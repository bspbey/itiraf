<?php
$metin = $itiraf_icerik->itiraf_icerik;
$uzunluk = strlen($metin);
$sinir = 120;
if ($uzunluk> $sinir) {
$itiraf_icerik_v2 = substr($metin,0,$sinir);
}
else if($uzunluk<$sinir){
$itiraf_icerik_v2 = $metin;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo strip_tags($itiraf_icerik->itiraf_rumuz); ?> İtirafı | <?php echo strip_tags($ayarlar->site_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Burak Dündar" />
<meta name="description" content="<?php echo strip_tags($itiraf_icerik_v2); ?>...">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="Burak Dündar" />
<meta name="copyright" content="Copyright Burak Dündar - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@desponres"/>
<meta name="twitter:url" content="<?php echo base_url(strip_tags("itiraf/".$itiraf_icerik->id)); ?>">
<meta name="twitter:title" content="<?php echo strip_tags($itiraf_icerik->itiraf_rumuz); ?> İtirafı">
<meta name="twitter:description" content="<?php echo strip_tags($itiraf_icerik_v2); ?>...">
<meta name="twitter:image" content="site_resmi_gelecek">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo strip_tags($itiraf_icerik->itiraf_rumuz); ?> İtirafı">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url(strip_tags("itiraf/".$itiraf_icerik->id)); ?>">
<meta property="og:image" content="site_resmi_gelecek">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($itiraf_icerik_v2); ?>...">
<link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/itiraf.css"); ?>" rel="stylesheet">
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
<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>">Anasayfa</a></li>
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
<div class="card-header">
<strong><?php echo strip_tags($itiraf_icerik->itiraf_rumuz); ?></strong>
<strong style="float:right;"><a href="#" data-toggle="modal" data-target="#paylas<?php echo $itiraf_icerik->id; ?>"><i data-toggle="tooltip" data-placement="top" title="Sosyal Medyada Paylaş" class="fa fa-share-alt-square"></i></a></strong>
<div class="modal fade" id="paylas<?php echo $itiraf_icerik->id; ?>" tabindex="-1" role="dialog" aria-labelledby="paylas<?php echo $itiraf_icerik->id; ?>" aria-hidden="true">
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
<div class="btnsylfa facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("itiraf/".$itiraf_icerik->id); ?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
<div class="btnsyl twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo base_url("itiraf/".$itiraf_icerik->id); ?>&text=<?php echo strip_tags($itiraf_icerik->itiraf_icerik); ?>" target="_blank"><i class="fa fa-twitter"></i></a></div>
<div class="btnsyl whatsapp"><a href="whatsapp://send?text=<?php echo base_url("itiraf/".$itiraf_icerik->id); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></div>
<div class="btnsyl linkedin"><a href="https://www.linkedin.com/shareArticle?url=<?php echo base_url("itiraf/".$itiraf_icerik->id); ?>&title=<?php echo strip_tags($itiraf_icerik->itiraf_icerik); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></div>
<div class="btnsyl google-plus"><a href="https://plus.google.com/share?url=<?php echo base_url("itiraf/".$itiraf_icerik->id); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></div>
</div>
<div class="input-group mb-3">
<input id="itiraf_url" type="text" class="form-control" value="<?php echo base_url("itiraf/".$itiraf_icerik->id); ?>">
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
<p class="card-text"><?php echo strip_tags($itiraf_icerik->itiraf_icerik); ?></p>
</div>
<div class="card-footer text-muted"><?php $tarih = $itiraf_icerik->createdAt; echo $this->fonksiyonlar->timeConvert($tarih); ?> - <?php if($itiraf_icerik->itiraf_cinsiyet=='1'){echo "Erkek"; } else if($itiraf_icerik->itiraf_cinsiyet=='2'){echo "Kadın"; } else { echo "Cinsiyet Belirtilmemiş";} ?></div>
</div>
</div>
</div>
<div class="card my-4">
<h5 class="card-header">Yorum yaz:</h5>
<div class="card-body">
<form method="post" action="<?php echo base_url("yorum-ekle"); ?>">
<input type="hidden" name="itiraf_id" value="<?php echo $itiraf_icerik->id; ?>">
<div class="form-group">
<input name="yorum_rumuz" type="text" class="form-control" placeholder="Rumuz">
</div>
<div class="form-group">
<input name="yorum_email" type="text" class="form-control" placeholder="E-Mail Adresiniz">
<small class="form-text text-muted">E-Mail adresiniz yorumda gözükmeyecektir.</small>
</div>
<div class="form-group">
<select name="yorum_cinsiyet" class="form-control">
<option selected="" disabled="">Cinsiyet</option>
<option value="1">Erkek</option>
<option value="2">Kadın</option>
</select>
</div>
<div class="form-group">
<textarea name="yorum_icerik" class="form-control" rows="4" placeholder="Yorumunuz"></textarea>
</div>
<button type="submit" class="btn btn-primary">Gönder</button>
</form>
</div>
</div>
<?php foreach ($yorumlar as $yorum) : ?>
<div class="yorum media mb-4">
<img class="d-flex mr-3 rounded-circle" src="<?php if($yorum->yorum_cinsiyet=='1'){echo base_url("assets/images/user_erkek.png"); } else if($yorum->yorum_cinsiyet=='2'){echo base_url("assets/images/user_kadin.png"); } else { echo base_url("assets/images/user.png"); } ?>" width="50" height="50">
<div class="media-body">
<h5 class="mt-0"><?php echo strip_tags($yorum->yorum_rumuz); ?></h5>
<?php echo strip_tags($yorum->yorum_icerik); ?>
</div>
</div> 
<?php endforeach; ?>
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
