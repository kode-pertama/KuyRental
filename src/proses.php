<?php
session_start();

function hitungBiayaSewa($hargaPerHari, $lamaSewa)
{
    return $hargaPerHari * $lamaSewa;
}

function hitungBiayaSupir($denganSupir, $lamaSewa, $biayaPerHariSupir = 100000)
{
    return $denganSupir ? $lamaSewa * $biayaPerHariSupir : 0;
}

function formatRupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Initialize
$idCard         = $_POST['id_card'] ?? '';
$name           = $_POST['name'] ?? '';
$email          = $_POST['email'] ?? '';
$platNomor      = $_POST['number_plat'] ?? '';
$paymentType    = $_POST['payment_type'] ?? '';
$withDriver     = $_POST['with_driver'] ?? '';
$lengthOfLease  = (int)($_POST['length_of_lease'] ?? 1);
$address        = $_POST['address'] ?? '';
$price          = $_REQUEST['price'];
$merk           = $_REQUEST['merk'];
$phone          = $_REQUEST['phone'];

// Hitung biaya
$biayaSewa = hitungBiayaSewa($price, $lengthOfLease);
$denganSupir = ($withDriver === 'ya');
$biayaSupir = hitungBiayaSupir($denganSupir, $lengthOfLease);
$totalSewa = $biayaSewa + $biayaSupir;

// Insert To Array
$selectedCar = [
    'merk' => $merk,
    'id_card' => $idCard,
    'name' => $name,
    'email' => $email,
    'plat_nomor' => $platNomor,
    'payment_type' => $paymentType,
    'with_drive' => $withDriver,
    'length_of_lease' => $lengthOfLease,
    'address' => $address,
    'price' => $price,
    'phone' => $phone,
    'driver_charge' => $biayaSupir,
    'total_sewa' => $totalSewa
];

// Set To Session
$_SESSION['tenants'][] = $selectedCar;
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
            <div class="container d-lg-flex justify-content" <h1 class=" mb-2 mb-lg-0">INVOICE - #INV-<?= $_REQUEST['inv'] ?></h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-lg-10">
                    <div id="comment-form" class="mb-5">
                        <div class="container">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> Terima kasih kami ucapkan kepada Yth Sdr <?= $selectedCar['name'] ?> yang beralamat di <?= $selectedCar['address'] ?> dengan nomor telpon <?= $selectedCar['phone'] ?> yang telah menggunakan jasa KuyRental.
                                <br><br>
                                Berikut detail kendaraan yang anda pesan :
                            </div>
                            <div class="card">
                                <div class="card-header bg-white">
                                    <div class="text-center">
                                        <h4>DETAIL INVOICE</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table">
                                        <table class="table table-hover">
                                            <tr>
                                                <td>No Invoice :</td>
                                                <td><?= $_REQUEST['inv'] ?></td>
                                            </tr>

                                            <tr>
                                                <td>Merk/Mobil :</td>
                                                <td><?= $selectedCar['merk'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Biaya Sewa :</td>
                                                <td><?= formatRupiah($selectedCar['price']) ?> / hari</td>
                                            </tr>
                                            <tr>
                                                <td>Lama Sewa :</td>
                                                <td><?= $lengthOfLease ?> Hari</td>
                                            </tr>
                                            <tr>
                                                <td>Total Biaya Sewa :</td>
                                                <td><?= formatRupiah($biayaSewa) ?></td>
                                            </tr>

                                            <?php if ($denganSupir) : ?>
                                                <tr>
                                                    <td>Extra Supir :</td>
                                                    <td>Ya</td>
                                                </tr>
                                                <tr>
                                                    <td>Biaya Supir :</td>
                                                    <td><?= formatRupiah(100000) ?> / hari</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Biaya Supir :</td>
                                                    <td><?= formatRupiah($biayaSupir) ?></td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td>Extra Supir :</td>
                                                    <td>Tidak</td>
                                                </tr>
                                            <?php endif; ?>

                                            <tr>
                                                <td><b>Total Sewa :</b></td>
                                                <td><b><?= formatRupiah($totalSewa) ?></b></td>
                                            </tr>
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