<?php
include "koneksi.php";

$panen = mysqli_query($conn,"
SELECT panen.id, lahan.nama_lahan, tanam.jenis_bibit
FROM panen
JOIN tanam ON panen.id_tanam = tanam.id
JOIN lahan ON tanam.id_lahan = lahan.id
");

if(isset($_POST['simpan'])){

$id_panen = $_POST['id_panen'];

$jumlah = $_POST['jumlah_kg'];
$harga = $_POST['harga_perkg'];

$total = $jumlah * $harga;

mysqli_query($conn,"
INSERT INTO penjualan (id_panen,jumlah_kg,harga_perkg,total_harga)
VALUES ('$id_panen','$jumlah','$harga','$total')
");

echo "<script>
alert('Data penjualan berhasil ditambahkan');
location='index.php?page=penjualan';
</script>";

}
?>

<div class="container-fluid">

<h3 class="mb-4">Tambah Penjualan</h3>

<form method="POST">

<label>Pilih Panen</label>

<select name="id_panen" class="form-control" required>

<option value="">-- Pilih Panen --</option>

<?php while($p=mysqli_fetch_array($panen)){ ?>

<option value="<?= $p['id'] ?>">
<?= $p['nama_lahan'] ?> - <?= $p['jenis_bibit'] ?>
</option>

<?php } ?>

</select>


<br>

<label>Jumlah (Kg)</label>

<input type="number" name="jumlah_kg" class="form-control" required>

<br>

<label>Harga per Kg</label>

<input type="number" name="harga_perkg" class="form-control" required>

<br>

<button class="btn btn-success" name="simpan">
Simpan
</button>

<a href="index.php?page=penjualan" class="btn btn-secondary">
Kembali
</a>

</form>

</div>