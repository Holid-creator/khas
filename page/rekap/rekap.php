<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Rekapitulasi
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th style="text-align: center;">Tanggal</th>
                                <th>Keterangan</th>
                                <th>Masuk</th>
                                <th>Jenis</th>
                                <th>Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $ambil = $conn->query("SELECT * FROM tb_khas");
                            while ($tampil = $ambil->fetch_assoc()) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?= $i++ ?></td>
                                    <td><?= $tampil['kode'] ?></td>
                                    <td><?= date('d F Y', strtotime($tampil['tgl'])) ?></td>
                                    <td><?= $tampil['ket'] ?></td>
                                    <td align="right">Rp. <?= number_format($tampil['jumlah']) ?></td>
                                    <td><?= $tampil['jenis'] ?></td>
                                    <td align="right">Rp. <?= number_format($tampil['keluar']) ?></td>
                                </tr>
                            <?php
                                $total = $total + $tampil['jumlah'];
                                $tkeluar = $tkeluar + $tampil['keluar'];
                                $sakhir = $total + $tkeluar;
                            } ?>
                        </tbody>
                        <tr>
                            <th style="text-align: center;" colspan="4"><strong>Total Khas Masuk dan Khas Keluar</strong></th>
                            <th align="right"><strong>Rp. <?= number_format($total) ?></strong></th>
                            <th></th>
                            <th align="right"><strong>Rp. <?= number_format($tkeluar) ?></strong></th>
                        </tr>
                        <tr>
                            <th style="text-align: center; font-size:20px; font-weight:bold; font-family: san-serif;" colspan="4">Saldo Akhir</th>
                            <th style="text-align: center; font-size:20px; font-weight:bold; font-family: san-serif;" colspan="3">Rp. <?= number_format($sakhir) ?></th>
                        </tr>
                    </table>
                </div>