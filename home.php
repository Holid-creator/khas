<?php

$ambil = $conn->query("SELECT * FROM tb_khas");
while ($tampil = $ambil->fetch_assoc()) {

    $jml = $tampil['jumlah'];
    $tmasuk = $tmasuk + $jml;
    $jkeluar = $tampil['keluar'];
    $tkeluar = $tkeluar + $jkeluar;
    $total = $tmasuk - $tkeluar;
}

?>

<!-- /. NAV SIDE  -->
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Halaman Utama Khas Pemuda Pasir Sereh</h2>
            <h5>Pengelolaan Khas Pemuda Pasir sereh</h5>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="glyphicon glyphicon-floppy-save"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Rp. <?= number_format($tmasuk) ?></p>
                    <p class="text-muted">Total Pemasukan Khas</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-floppy-open"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Rp. <?= number_format($tkeluar) ?></p>
                    <p class="text-muted">Total Pengeluaran Khas</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="glyphicon glyphicon-floppy-disk"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Rp. <?= number_format($total) ?></p>
                    <p class="text-muted">Sisa Uang Khas</p>
                </div>
            </div>
        </div>
    </div>