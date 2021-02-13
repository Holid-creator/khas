<?php

$id = $_GET['id'];

$tampil = $conn->query("DELETE FROM tb_khas WHERE kode = '$id'");

if ($tampil) {

?>

    <script>
        alert('Data Berhasil Dihapus');
        window.location.href = "?page=keluar";
    </script>

<?php
}
