<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $nama_lahan = $_POST['nama_lahan'];
    $luas = $_POST['luas'];
    $lokasi = $_POST['lokasi'];

    mysqli_query($conn, "INSERT INTO lahan (nama_lahan, luas, lokasi)
    VALUES ('$nama_lahan','$luas','$lokasi')");

    echo "<script>
            alert('Data berhasil ditambahkan');
            location.href='?page=lahan';
          </script>";
}
?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="font-weight-bold text-gray-800">
            <i class="fas fa-map-marked-alt text-success"></i> Tambah Data Lahan
        </h2>
        <a href="?page=lahan" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- CARD FULL WIDTH -->
    <div class="card shadow-lg border-0">
        
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Form Input Lahan</h5>
        </div>

        <div class="card-body">

            <form method="post">

                <div class="row">

                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Lahan</label>
                            <input type="text" name="nama_lahan" 
                                   class="form-control form-control-lg"
                                   placeholder="Masukkan nama lahan"
                                   required>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Luas</label>
                            <input type="text" name="luas" 
                                   class="form-control form-control-lg"
                                   placeholder="Contoh: 2 Hektar"
                                   required>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Lokasi</label>
                    <input type="text" name="lokasi" 
                           class="form-control form-control-lg"
                           placeholder="Masukkan lokasi lahan"
                           required>
                </div>

                <hr>

                <div class="text-right">
                    <button type="submit" name="simpan" 
                            class="btn btn-success btn-lg px-5">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>