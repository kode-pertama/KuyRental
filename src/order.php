<?php
session_start();

// Initilaize
$slug = $_GET['vehicle'] ?? null;
$cars = $_SESSION['cars'] ?? [];
$selectedCar = null;

foreach ($cars as $car) {
    if ($car['slug'] === $slug) {
        $selectedCar = $car;

        break;
    }
}

function generatePlatNomor()
{
    $angka = rand(1000, 9999);
    $huruf1 = chr(rand(65, 90));
    $huruf2 = chr(rand(65, 90));

    return "D $angka $huruf1 $huruf2";
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
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Pesan Mobil - <?= $selectedCar['name'] ?></h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-lg-10">
                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">
                                <div class="post-img">
                                    <img src="<?= $selectedCar['path'] ?>" alt="" class="img-fluid" style="height: 600px;object-fit: cover;width: 100%;">
                                </div>

                                <h2 class="title"><?= $selectedCar['name'] ?></h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-star-fill"></i> <?= $selectedCar['rating'] ?>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-person-hearts"></i> <?= $selectedCar['passengers'] ?> Penumpang
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-person-x-fill"></i> <b>14 Penumpang Meninggal</b>
                                        </li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content">
                                    <?= $selectedCar['description'] ?>
                                </div><!-- End meta bottom -->
                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->

                    <div id="comment-form" class="mb-5">
                        <div class="container">
                            <div class="alert alert-info">
                                <i class="bi bi-exclamation-triangle"></i> Kamu akan mendapatkan biaya tambahan <b>Rp100.000/Per Hari</b> jika menambahkan supir.
                            </div>
                            <div class="card">
                                <div class="card-header bg-white">
                                    <div class="text-center">
                                        <h4>IDENTITAS PENYEWA</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="proses.php" method="POST">
                                        <input type="hidden" value="<?= $selectedCar['name'] ?>" name="merk">
                                        <input type="hidden" value="<?= rand(10000, 99999) ?>" name="inv">
                                        <div class=" row">
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">No KTP <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control mt-1" name="id_card" placeholder="28xxxxxxx" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">Nama <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control mt-1" name="name" placeholder="Masukkan Nama" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">Nomor Telpon/HP <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control mt-1" name="phone" placeholder="Masukkan Nama" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">Email <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control mt-1" name="email" placeholder="Cth : seiara.az@gmail.com" require>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">Plat Nomor <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control mt-1" name="number_plat" value="<?php echo generatePlatNomor() ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">Lama Sewa <span class="text-danger">*</span></label>
                                                    <select name="length_of_lease" id="" class="form-control">
                                                        <?php for ($i = 1; $i <= 7; $i++) : ?>
                                                            <option value="<?= $i ?>"><?= $i ?> Hari</option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">Jenis Pembayaran <span class="text-danger">*</span></label>
                                                    <p>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="payment_type" id="radio-transfer" value="option2" checked>
                                                        <label class="form-check-label" for="radio-transfer">Transfer</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="payment_type" id="radio-tunai" value="option1">
                                                        <label class="form-check-label" for="radio-tunai">Tunai</label>
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">Dengan Supir? <span class="text-danger">*</span></label>

                                                    <p>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="with_driver" id="radio-driver-yes" value="ya">
                                                        <label class="form-check-label" for="radio-driver-yes">Ya</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="with_driver" id="radio-driver-no" value="tidak" checked>
                                                        <label class="form-check-label" for="radio-driver-no">Tidak</label>
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group pt-2">
                                                    <label for="">Harga Sewa :</label>
                                                    <p class="pt-2">
                                                        <b><?= $selectedCar['price']['detail'] ?></b>
                                                        <input type="hidden" name="price" value="<?= $selectedCar['price']['base_price'] ?>">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group pt-2">
                                            <label for="">Alamat <span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control mt-1" rows="4" name="address" placeholder="Cth : Jl. Saritem No.49, Kb. Jeruk, Kec. Andir, Kota Bandung, Jawa Barat 40181" require></textarea>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button class="btn" type="submit" style="background-color: #0ea2bd; color: white;">Proses</button>
                                        </div>
                                    </form>
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