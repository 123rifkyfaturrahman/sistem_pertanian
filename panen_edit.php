<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($conn,"
SELECT * FROM panen WHERE id='$id'
"));

$tanam = mysqli_query($conn,"
SELECT tanam.id, tanam.jenis_bibit, lahan.nama_lahan
FROM tanam
JOIN lahan ON tanam.id_lahan = lahan.id
");

if(isset($_POST['update'])){

$id_tanam = $_POST['id_tanam'];
$tanggal = $_POST['tanggal_panen'];
$hasil = $_POST['hasil_panen'];

mysqli_query($conn,"
UPDATE panen SET
id_tanam='$id_tanam',
tanggal_panen='$tanggal',
hasil_panen='$hasil'
WHERE id='$id'
");

echo "<script>
alert('Data berhasil diubah');
location='index.php?page=panen';
</script>";

}
?>

<div class="container-fluid">

<h3 class="mb-4">Edit Data Panen</h3>

<form method="POST">

<label>Tanam</label>

<select name="id_tanam" class="form-control">

<?php while($t=mysqli_fetch_array($tanam)){ ?>

<option value="<?= $t['id'] ?>"
<?= $data['id_tanam']==$t['id'] ? 'selected' : '' ?>>

<?= $t['nama_lahan'] ?> - <?= $t['jenis_bibit'] ?>

</option>

<?php } ?>

</select>

<br>

<label>Tanggal Panen</label>

<input type="date"
name="tanggal_panen"
value="<?= $data['tanggal_panen'] ?>"
class="form-control">

<br>

<label>Hasil Panen</label>

<input type="text"
name="hasil_panen"
value="<?= $data['hasil_panen'] ?>"
class="form-control">

<br>

<button class="btn btn-success" name="update">
Update
</button>

</form>

</div>