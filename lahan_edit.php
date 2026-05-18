<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM lahan WHERE id='$id'");
$data = mysqli_fetch_array($query);

if(isset($_POST['submit'])){

    $nama_lahan = $_POST['nama_lahan'];
    $luas = $_POST['luas'];
    $lokasi = $_POST['lokasi'];

    mysqli_query($conn,"UPDATE lahan SET 
        nama_lahan='$nama_lahan',
        luas='$luas',
        lokasi='$lokasi'
        WHERE id='$id'
    ");

    echo "<script>alert('Data berhasil diubah!'); location='index.php?page=lahan';</script>";
}
?>

<div class="container-fluid">
    
    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="font-weight-bold text-gray-800">
            <i class="fas fa-edit text-warning"></i> Edit Lahan
        </h2>

        <a href="index.php?page=lahan" class="btn btn-secondary shadow">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row">

        <!-- FORM -->
        <div class="col-lg-8">

            <div class="card shadow-lg border-0">

                <div class="card-header bg-success text-white">
                    <h6 class="m-0 font-weight-bold">Form Edit Lahan</h6>
                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="form-group">
                            <label>Nama Lahan</label>
                            <input type="text" name="nama_lahan"
                                   value="<?= $data['nama_lahan'] ?>"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Luas</label>
                            <input type="text" name="luas"
                                   value="<?= $data['luas'] ?>"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi"
                                   value="<?= $data['lokasi'] ?>"
                                   class="form-control"
                                   required>
                        </div>

                        <hr>

                        <button type="submit" name="submit" class="btn btn-success btn-block shadow">
                            <i class="fas fa-save"></i> Update Data
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <!-- INFO CARD -->
        <div class="col-lg-4">
            <div class="card shadow border-left-warning">
                <div class="card-body">
                    <h6 class="font-weight-bold text-warning">Info</h6>
                    <p class="small text-gray-600">
                        Gunakan form ini untuk mengubah data lahan seperti:
                        <br>• Nama
                        <br>• Luas
                        <br>• Lokasi        
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>