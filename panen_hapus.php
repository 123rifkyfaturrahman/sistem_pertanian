```php
<?php
include "koneksi.php";

$id = $_GET['id'];

// cek apakah panen dipakai di penjualan
$cek = mysqli_query($conn,"SELECT * FROM penjualan WHERE id_panen='$id'");

if(mysqli_num_rows($cek) > 0){

echo "<script>
alert('Data panen tidak bisa dihapus karena sudah ada data penjualan');
location='index.php?page=panen';
</script>";

}else{

mysqli_query($conn,"DELETE FROM panen WHERE id='$id'");

echo "<script>
alert('Data panen berhasil dihapus');
location='index.php?page=panen';
</script>";

}
?>
```
