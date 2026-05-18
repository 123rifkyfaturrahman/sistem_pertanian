<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($conn,"
SELECT * FROM pengeluaran WHERE id='$id'
"));

if(isset($_POST['update'])){


$ket = $_POST['keterangan'];
$jumlah = $_POST['jumlah'];

mysqli_query($conn,"
UPDATE pengeluaran SET
keterangan='$ket',
jumlah='$jumlah'
WHERE id='$id'
");

echo "<script>
alert('Data berhasil diubah');
location='index.php?page=pengeluaran';
</script>";

}
?>

<div class="container-fluid">

<h3 class="mb-4">Edit Pengeluaran</h3>

<form method="POST">



<br>

<label>Keterangan</label>

<input type="text"
name="keterangan"
value="<?= $data['keterangan'] ?>"
class="form-control">

<br>

<label>Jumlah</label>

<input type="number"
name="jumlah"
value="<?= $data['jumlah'] ?>"
class="form-control">

<br>

<button class="btn btn-success" name="update">
Update
</button>

<a href="index.php?page=pengeluaran" class="btn btn-secondary">
Kembali
</a>

</form>

</div>