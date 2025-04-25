<?php
session_start();

$cars = [
  [
    'name' => 'Bugatti Chiron',
    'rental_option' => ['Tidak Termasuk Supir', 'Tidak Termasuk BBM', 'Tidak Termasuk Parkir', 'Tidak Termasuk BBM'],
    'path' => 'assets/img/bugati.jpg',
    'price' => [
      'base_price' => '900000',
      'detail' => 'Rp900.000/Hari'
    ],
    'slug' => 'bugatti-chiron',
    'description' => 'Bugatti Chiron bukan cuma mobil, ini definisi “flex level dewa”. Desainnya super sporty tapi tetap classy, cocok banget buat kamu yang suka tampil beda di jalan. Mesin galak tapi handling-nya lembut—nyaman buat city cruising atau long trip bareng bestie. Emang belum termasuk supir, BBM, dan parkir, tapi percaya deh... begitu kamu duduk di balik kemudinya, semua effort itu jadi worth it banget. Sekali bawa, auto dapet tatapan kagum sepanjang jalan.',
    'rating' => '4.5/5',
    'passengers' => '1200'
  ],
  [
    'name' => 'Koenigsegg Agera',
    'rental_option' => ['Tidak Termasuk Supir', 'Tidak Termasuk BBM', 'Tidak Termasuk Parkir', 'Tidak Termasuk BBM'],
    'path' => 'assets/img/koenigsegg.jpg',
    'price' => [
      'base_price' => '1500000',
      'detail' => 'Rp1.500.000/Hari'
    ],
    'slug' => 'koenigsegg-agera',
    'description' => 'Koenigsegg Agera itu ibarat jet pribadi yang bisa nempel di aspal. Tenaganya brutal, desainnya super elegan, dan performanya... fix bikin kamu susah move on. Mobil ini cocok banget buat kamu yang suka tantangan dan pengen sensasi berkendara beda dari yang lain. Emang sih nggak dapet supir dan BBM, tapi siapa peduli kalau kamu bisa punya kontrol penuh atas mobil seganteng ini? Bawaannya pengen gas terus ke mana pun kamu pergi.',
    'rating' => '4.2/5',
    'passengers' => '1000'
  ],
  [
    'name' => 'Rolls Royce Wraith',
    'rental_option' => ['Tidak Termasuk Supir', 'Tidak Termasuk BBM', 'Tidak Termasuk Parkir', 'Tidak Termasuk BBM'],
    'path' => 'assets/img/rollsroyce.jpg',
    'price' => [
      'base_price' => '1000000',
      'detail' => 'Rp1.000.000/Hari'
    ],
    'slug' => 'rolls-royce-wraith',
    'description' => 'Kalau kamu suka yang kalem tapi tetep classy, Rolls Royce Wraith ini pilihan paling cocok. Interior-nya super cozy, tiap detailnya dibuat buat memanjakan kamu. Nyetir sendiri? Gak masalah, malah makin terasa aura bangsawannya. Meskipun belum termasuk supir, BBM, dan parkir, tapi kenyamanan yang ditawarin Rolls ini udah cukup bikin kamu betah duduk berjam-jam tanpa bosan. Cocok buat jalan santai, pre-wed vibes, atau sekadar flex tipis-tipis di timeline.',
    'rating' => '5/5',
    'passengers' => '1500'
  ]
];

// Save Data To Session
$_SESSION['cars'] = $cars;
?>

<?php
include('layouts/navbar.php');
?>

<!-- 
  Nama : Roni Surya
  Kelas : IF4A Karyawan
  License : Developed By : Ronii Surya 
-->

<body class="index-page">

  <?php
  include('layouts/header.php');
  ?>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <img src="assets/img/hero.png" class="img-fluid animated" alt="" style="height: 400px;">
        <h1>Selamat Datang Di <span>KuyRental</span></h1>
        <p>Rental Mobil Kapan Aja Tanpa Ribet.</p>
      </div>

    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Rental Sekarang</h2>
        <p>Pilih Mobil Harapan Kamu Untuk Flexing!</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">
          <?php foreach ($cars as $key => $item) : ?>
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
              <div class="service-item">
                <div class="img">
                  <img src="<?= $item['path'] ?>" class="img-fluid" alt="" style="height: 300px; width: 100%; object-fit: cover;">
                </div>

                <div class="details position-relative">
                  <div class="icon">
                    <i class="bi bi-activity"></i>
                  </div>

                  <a href="order.php?vehicle=<?= $item['slug'] ?>" class="stretched-link">
                    <h3><?= $item['name'] ?></h3>
                  </a>
                  <p>

                  <ul style="text-align: left;">
                    <?php foreach ($item['rental_option'] as $option) : ?>
                      <li><span><?= $option ?></span></li>
                    <?php endforeach; ?>
                  </ul>
                  </p>

                  <div>
                    <b><?= $item['price']['detail'] ?></b>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section><!-- /Services Section -->
  </main>

  <?php
  include('layouts/footer.php');
  ?>