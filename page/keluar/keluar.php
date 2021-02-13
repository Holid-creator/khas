<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Khas Keluar Pemuda pasir sereh
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
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $ambil = $conn->query("SELECT * FROM tb_khas WHERE jenis = 'keluar'");
                            while ($tampil = $ambil->fetch_assoc()) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?= $i++ ?></td>
                                    <td><?= $tampil['kode'] ?></td>
                                    <td><?= date('d F Y', strtotime($tampil['tgl'])) ?></td>
                                    <td><?= $tampil['ket'] ?></td>
                                    <td align="right">Rp. <?= number_format($tampil['keluar']) ?></td>
                                    <td>
                                        <button class="btn btn-warning" id="ubah" data-toggle="modal" data-target="#edit" data-id="<?= $tampil['kode'] ?>" data-ket="<?= $tampil['ket'] ?>" data-tgl="<?= $tampil['tgl'] ?>" data-jml="<?= $tampil['keluar'] ?>"><i class="glyphicon glyphicon-edit"></i> Ubah</button>

                                        <a onclick="return confirm('Apakah Anda ingin Menghapusnya ?')" href="?page=keluar&aksi=hapus&id=<?= $tampil['kode'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $total = $total + $tampil['keluar'];
                            } ?>
                        </tbody>
                        <tr>

                            <th style="text-align: center;" colspan="4"><strong>Total Khas Keluar</strong></th>
                            <td align="right"><strong>Rp. <?= number_format($total) ?></strong></td>
                            <td></td>

                        </tr>
                    </table>
                </div>

                <!--  Halaman Tambah-->
                <div class="panel-body">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                        Tambah Khas Keluar
                    </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Input Khas Pengeluaran</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post">

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" placeholder="Masukkan Kode" name="code">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Keterangan</label><br>
                                            <textarea cols="70" rows="5" class="form-control" name="ket"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Tanggal</label>
                                            <input type="date" class="form-control" name="tgl">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Jumlah</label>
                                            <input type="number" class="form-control" name="jml">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    if (isset($_POST['simpan'])) {

                        $kode = $_POST['code'];
                        $ket = $_POST['ket'];
                        $tgl = $_POST['tgl'];
                        $jml = $_POST['jml'];

                        $ambil = $conn->query("INSERT INTO tb_khas (kode, ket, tgl, jumlah, jenis, keluar) VALUES ('$kode', '$ket', '$tgl', 0, 'Keluar', '$jml')");

                        if ($ambil) {

                    ?>

                            <script>
                                alert('Khas Keluar Berhasil Ditambahkan');
                                window.location.href = "?page=keluar";
                            </script>


                    <?php
                        }
                    }
                    ?>

                    <!-- End Halaman Tambah-->
                    <!-- Halaman Ubah -->
                    <div class="panel-body">
                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
                                    </div>
                                    <div class="modal-body" id="modal_edit">
                                        <form method="post">

                                            <div class="form-group">
                                                <label for="">Kode</label>
                                                <input type="text" class="form-control" placeholder="Masukkab Kode" name="code" id="code" readonly="">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Keterangan</label><br>
                                                <textarea cols="70" rows="5" class="form-control" name="ket" id="ket"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Tanggal</label>
                                                <input type="date" class="form-control" name="tgl" id="tgl">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Jumlah</label>
                                                <input type="number" class="form-control" name="jml" id="jml">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                <input type="submit" class="btn btn-success" name="ubah" value="Ubah">
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['ubah'])) {

                                            $kode = $_POST['code'];
                                            $ket = $_POST['ket'];
                                            $tgl = $_POST['tgl'];
                                            $jml = $_POST['jml'];

                                            $ambil = $conn->query("UPDATE tb_khas SET ket = '$ket', tgl = '$tgl', jumlah = 0, jenis = 'Keluar', keluar = '$jml' WHERE kode = '$kode'");

                                            if ($ambil) {

                                        ?>

                                                <script>
                                                    alert('Data Berhasil DiUbah');
                                                    window.location.href = "?page=keluar";
                                                </script>


                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JQUERY SCRIPTS -->
                        <script src="assets/js/jquery-1.10.2.js"></script>
                        <script>
                            $(document).on('click', '#ubah', function() {

                                var code = $(this).data('id');
                                var ket = $(this).data('ket');
                                var tgl = $(this).data('tgl');
                                var jml = $(this).data('jml');

                                $('#modal_edit #code').val(code);
                                $('#modal_edit #ket').val(ket);
                                $('#modal_edit #tgl').val(tgl);
                                $('#modal_edit #jml').val(jml);
                            })
                        </script>

                        <!-- End Halaman Ubah -->
                    </div>
                </div>
            </div>
        </div>