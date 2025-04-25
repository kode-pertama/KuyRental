<?php
session_start();

$tenants = $_SESSION['tenants'];

function formatRupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<?php
include('layouts/navbar.php');
?>

<!-- 
  Nama : Roni Surya
  Kelas : IF4A Karyawan
  License : Developed By : Ronii Surya 
-->

<body class="blog-details-page">
    <?php
    include('layouts/header.php');
    ?>

    <main class="main">
        <!-- Page Title -->
        <div class="page-title">
            <div class="container d-lg-flex justify-content"
                <h1 class=" mb-2 mb-lg-0">Daftar Tenant</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-lg-10">
                    <div id="comment-form" class="mb-5">
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <div class="text-center">
                                        <h4>Daftar Tenat - <?= date('d F Y') ?></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Lama Sewa</th>
                                                <th>Total Biaya Sewa</th>
                                            </tr>
                                            <?php foreach ($tenants as $key => $item) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $item['name'] ?></td>
                                                    <td><?= $item['length_of_lease'] ?> Hari</td>
                                                    <td><?= formatRupiah($item['total_sewa']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include('layouts/footer.php');
    ?>