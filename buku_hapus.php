<?php
    $id = $_GET['id'];
    
    $query_delete_relasi = mysqli_query($koneksi, "DELETE FROM kategoribuku_relasi WHERE buku_id = $id");

    if ($query_delete_relasi) {
        $query_delete_buku = mysqli_query($koneksi, "DELETE FROM buku WHERE buku_id = $id");

        if ($query_delete_buku) {
            echo '<script>alert("Hapus buku berhasil.");</script>';
            echo '<script>location.href = "index.php?page=buku";</script>';
        } else {
            echo '<script>alert("Gagal menghapus buku.");</script>';
            echo '<script>history.back();</script>';
        }
    } else {
        echo '<script>alert("Gagal menghapus relasi kategori buku.");</script>';
        echo '<script>history.back();</script>';
    }
