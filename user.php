
<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM user");
$total = mysqli_num_rows($query);
?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="font-weight-bold text-dark">
            <i class="fas fa-users text-success"></i> Manajemen User
        </h3>
    </div>

    <!-- CARD TOTAL -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-lg">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-1">Total User</h6>
                    <h2 class="font-weight-bold text-success"><?= $total ?></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD TABLE -->
    <div class="card border-0 shadow-lg rounded-lg">

        <!-- HEADER -->
        <div class="card-header bg-white border-0">
            <h5 class="mb-0 font-weight-bold text-dark">
                <i class="fas fa-list text-primary"></i> Daftar User
            </h5>
        </div>

        <!-- BODY -->
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table align-items-center mb-0">

                    <thead class="bg-light">
                        <tr>
                            <th class="text-muted small">No</th>
                            <th class="text-muted small">User</th>
                            <th class="text-muted small">Level</th>
                            <th class="text-center text-muted small">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $no = 1;
                        while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr class="border-bottom">

                            <!-- NO -->
                            <td class="pl-4"><?= $no++ ?></td>

                            <!-- USER -->
                            <td>
                                <div class="d-flex align-items-center">

                                    <!-- AVATAR -->
                                    <div class="bg-success text-white rounded-circle mr-3"
                                        style="width:45px;height:45px;
                                        display:flex;align-items:center;
                                        justify-content:center;
                                        font-weight:bold;font-size:18px;">
                                        <?= strtoupper(substr($data['username'],0,1)) ?>
                                    </div>

                                    <div>
                                        <div class="font-weight-bold">
                                            <?= $data['username'] ?>
                                        </div>
                                        <small class="text-muted">
                                            ID: <?= $data['id'] ?>
                                        </small>
                                    </div>

                                </div>
                            </td>

                            <!-- LEVEL -->
                            <td>
                                <?php if($data['level']=='admin'){ ?>
                                    <span class="badge badge-success px-3 py-2">
                                        <i class="fas fa-user-shield"></i> Admin
                                    </span>
                                <?php } else { ?>
                                    <span class="badge badge-secondary px-3 py-2">
                                        <i class="fas fa-user"></i> User
                                    </span>
                                <?php } ?>
                            </td>

                            <!-- AKSI -->
                            <td class="text-center">

                                <a href="index.php?page=user_ubah&id=<?= $data['id'] ?>" 
                                   class="btn btn-sm btn-info shadow-sm mr-1">
                                   <i class="fas fa-edit"></i>
                                </a>

                                <a href="user_hapus.php?id=<?= $data['id'] ?>" 
                                   class="btn btn-sm btn-danger shadow-sm"
                                   onclick="return confirm('Yakin hapus user ini?')">
                                   <i class="fas fa-trash"></i>
                                </a>

                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

