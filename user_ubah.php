```php
<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id='$id'"));
?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-4">
        <h3 class="font-weight-bold text-dark">
            Edit User
        </h3>
        <small class="text-muted">Perbarui informasi akun pengguna</small>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card border-0 shadow-sm rounded-lg">
                
                <div class="card-body p-4">

                    <form method="POST" action="user_update.php">

                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        <!-- USERNAME -->
                        <div class="form-group mb-3">
                            <label class="text-muted small">Username</label>
                            <input type="text" 
                                   name="username"
                                   value="<?= $data['username'] ?>"
                                   class="form-control"
                                   required>
                        </div>

                        <!-- PASSWORD -->
                        <div class="form-group mb-3">
                            <label class="text-muted small">Password</label>
                            <input type="text" 
                                   name="password"
                                   placeholder="Kosongkan jika tidak diubah"
                                   class="form-control">
                        </div>

                        <!-- LEVEL -->
                        <div class="form-group mb-4">
                            <label class="text-muted small">Level</label>
                            <select name="level" class="form-control">
                                <option value="admin" <?= $data['level']=='admin' ? 'selected' : '' ?>>
                                    Admin
                                </option>
                                <option value="user" <?= $data['level']=='user' ? 'selected' : '' ?>>
                                    User
                                </option>
                            </select>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between">

                            <a href="index.php?page=user" class="btn btn-light">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>
```
