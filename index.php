<?php
include 'koneksi.php';

$menu = @$_GET['menu'];
if (!$menu) {
	echo "<script>window.location.href='?menu=input_stock'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="stylesheet" href="http://localhost/uas/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="http://localhost/uas/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
    <div class="container">
        <a class="navbar-brand">UAS</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="http://localhost/uas/">Home <span class="sr-only"></span></a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow">
                <h4 class="card-header">Data Logistik Lembar Kerja Siswa (LKS)</h4>
                <div class="card-body">
                    <h4 class="card-title">Siti Syahda Rana Areta</h4>
                    <div class="row">
                        <?php if ($menu == 'input_stock'): ?>
                            <div class="col"><button type="button" class="btn btn-primary btn-block">Input Stock</button></div>
                        <?php else: ?>
                            <div class="col"><a href="?menu=input_stock" type="button" class="btn btn-secondary btn-block">Input Stock</a></div>
                        <?php endif ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if ($menu == 'distribusi'): ?>
                            <div class="col"><button type="button" class="btn btn-primary btn-block">Distribusi</button></div>
                        <?php else: ?>
                            <div class="col"><a href="?menu=distribusi" type="button" class="btn btn-secondary btn-block">Distribusi</a></div>
                        <?php endif ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if ($menu == 'stock'): ?>
                            <div class="col"><button type="button" class="btn btn-primary btn-block">Cek Stock</button></div>
                        <?php else: ?>
                            <div class="col"><a href="?menu=stock" type="button" class="btn btn-secondary btn-block">Cek Stock</a></div>
                        <?php endif ?>
                        <?php
                            include $menu.'.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="http://localhost/uas/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="http://localhost/uas/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="http://localhost/uas/js/script.js"></script>
</html>