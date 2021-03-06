<?php

include_once "../../proses/koneksi.php";
session_start();

$Id = $_SESSION['Id'];
$Nama = $_SESSION['Nama_Admin'];

if ($Id == "" || $Nama == "") {

    header("location:../");

}

$id = $_GET['id'];

$sql_penduduk = mysqli_query($conn, "SELECT * from tb_penduduk where NIK='$id'");
$data_penduduk = mysqli_fetch_array($sql_penduduk);
?>

<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Evaluasi Guru</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
         <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="index.html">Sistem Penentuan Penerima Raskin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">
                        <div id="custom-search" class="top-search-bar">
                            <input class="form-control" type="text" placeholder="Search..">
                        </div>
                    </li>

                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name"><?php echo $Nama; ?></h5>
                                <span class="status"></span><span class="ml-2"><?php echo $Id; ?>
</span>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                            <a class="dropdown-item" href="../../"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
             <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="tabel-penduduk.php" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Data Penduduk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tabel Kategori Penilaian</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="tabel-kriteria.php">Tabel Kategori AHP</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="tabel-perhitungan-ahp.php">Tabel Bobot Kategori</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tabel Ranking</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="tabel-rangking.php">Tabel Ranking Penerima Raskin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="tabel-penilaian.php">Tabel Penilaian</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Form Tambah Penduduk </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Tambah Penduduk</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Form Tambah Penduduk</h5>
                                <div class="card-body">
                                    <form action="../../proses/edit_penduduk.php" method="post" id="basicform" data-parsley-validate="">
                                        <div class="form-group">
                                            <label for="inputNIK">NIK</label>
                                            <input id="inputNIK" type="text" name="NIK" data-parsley-trigger="change" required="" placeholder="Masukan NIK" autocomplete="off" class="form-control" value="<?php echo $data_penduduk['NIK']; ?>
" >
                                        </div>
                                         <div class="form-group">
                                            <label for="inputNama">Nama Lengkap</label>
                                            <input id="inputNama" type="text" name="Nama" data-parsley-trigger="change" required="" placeholder="Masukan Nama" autocomplete="off" class="form-control" value="<?php echo $data_penduduk['Nama']; ?>"  >

                                        </div>
                                        <div class="form-group">
                                            <label for="inputAlamat">Alamat</label>
                                            <input id="inputAlamat" type="text" name="Alamat" data-parsley-trigger="change" required="" placeholder="Masukan Alamat" autocomplete="off" class="form-control" value="<?php echo $data_penduduk['Alamat']; ?>" >

                                        </div>
                                        <div class="form-group">
                                        <label for="input-select" name="JenisKelamin">Jenis Kelamin</label>
                                        <select name="JenisKelamin" class="form-control" id="input-select">
                                        <option <?php if ($data_penduduk['Jenis_Kelamin'] == "L") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>   value="L">Laki-Laki</option>
                                        <option <?php if ($data_penduduk['Jenis_Kelamin'] == "P") {
                                            echo "selected = 'selected'";
                                        }
                                        ?> value="P">Perempuan</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUmur">Umur</label>
                                            <input id="inputUmur" type="number" name="Umur" data-parsley-trigger="change" required="" placeholder="Masukan Umur" autocomplete="off" class="form-control" value="<?php echo $data_penduduk['Umur']; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="input-select" name="Pendidikan">Pendidikan</label>
                                        <select  name="Pendidikan" class="form-control" id="input-select">
                                        <option
                                        <?php if ($data_penduduk['Pendidikan'] == "Tidak Sekolah") {
                                            echo "selected = 'selected'";
                                        }
                                        ?> 
                                        value="Tidak Sekolah">Tidak Sekolah</option>
                                        <option 
                                        <?php if ($data_penduduk['Pendidikan'] == "SD") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        value="SD">Sekolah Dasar</option>
                                        <option value="SMP"
                                        <?php if ($data_penduduk['Pendidikan'] == "SMP") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        >Sekolah Menengah Pertama</option>
                                        <option
                                        <?php if ($data_penduduk['Pendidikan'] == "SMA") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="SMA">Sekolah Menengah Atas (Sederajat)</option>
                                        <option 
                                        <?php if ($data_penduduk['Pendidikan'] == "Sarjana") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        value="Sarjana">Sarjana (S1)</option>
                                        </select>
                                        </div>
                                         <div class="form-group">
                                        <label for="input-select" name="Pekerjaan">Pekerjaan</label>
                                        <select name="Pekerjaan" class="form-control" id="input-select">
                                        <option value="Petani"
                                        <?php if ($data_penduduk['Pekerjaan'] == "Petani") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        >Petani</option>
                                        <option
                                        <?php if ($data_penduduk['Pekerjaan'] == "Pekerja Bangunan") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Pekerja Bangunan">Pekerja Bangunan</option>
                                        <option
                                        <?php if ($data_penduduk['Pekerjaan'] == "Peternak") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Peternak">Peternak</option>
                                        <option value="Pedagang"
                                        <?php if ($data_penduduk['Pekerjaan'] == "Pedagang") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        >Pedagang</option>
                                        <option
                                        <?php if ($data_penduduk['Pekerjaan'] == "PNS") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="PNS">PNS</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputJumlahKeluarga">Jumlah Keluarga</label>
                                            <input id="inputJumlahKeluarga" type="number" name="JumlahKeluarga" data-parsley-trigger="change" required="" placeholder="Jumlah Keluarga" autocomplete="off" class="form-control" value="<?php echo $data_penduduk['Jumlah_Keluarga']; ?>" >
                                        </div> <div class="form-group">
                                            <label for="inputPendapatan">Pendapatan</label>
                                            <input id="inputPendapatan" type="text" name="Pendapatan" data-parsley-trigger="change" required="" placeholder="Masukan Pendapatan" autocomplete="off" class="form-control" value="<?php echo $data_penduduk['Pendapatan']; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="input-select" name="Rumah">Kepemilikan Rumah</label>
                                        <select name="Rumah" class="form-control" id="input-select">
                                        <option value="Kontrak"  <?php if ($data_penduduk['Kepemilikan_Rumah'] == "Kontrak") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>>Kontrak</option>
                                        <option value="Milik Sendiri"
                                         <?php if ($data_penduduk['Kepemilikan_Rumah'] == "Milik Sendiri") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        >Milik Sendiri</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="LuasRumah">Luas Rumah</label>
                                            <input id="LuasRumah" type="number" name="LuasRumah" data-parsley-trigger="change" required="" placeholder="Luas Rumah" autocomplete="off" class="form-control" value="<?php echo $data_penduduk['Luas_Rumah']; ?>">
                                        </div> <div class="form-group">
                                            <label for="LuasTanah">Luas Tanah</label>
                                            <input id="LuasTanah" type="number" name="LuasTanah" data-parsley-trigger="change" required="" placeholder="Luas Tanah" autocomplete="off" class="form-control"
                                            value="<?php echo $data_penduduk['Luas_Tanah']; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="input-select" name="JanisLantai">Janis Lantai</label>
                                        <select name="JanisLantai" class="form-control" id="input-select">
                                        <option value="Tanah"
                                         <?php if ($data_penduduk['Jenis_Lantai'] == "Tanah") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        >Tanah</option>
                                        <option
                                         <?php if ($data_penduduk['Jenis_Lantai'] == "Semen/Bata Merah") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Semen/Bata Merah">Semen/Bata Merah</option>
                                        <option
                                        <?php if ($data_penduduk['Jenis_Lantai'] == "Keramik") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Keramik">Keramik</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="input-select" name="JanisDinding">Janis Dinding</label>
                                        <select name="JanisDinding" class="form-control" id="input-select">
                                        <option
                                        <?php if ($data_penduduk['Jenis_Dinding'] == "Anyaman Bambu") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Anyaman Bambu">Anyaman Bambu</option>
                                        <option
                                        <?php if ($data_penduduk['Jenis_Dinding'] == "Tembok Bata") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Tembok Bata">Tembok Bata</option>
                                        <option value="Tembok Semen"
                                        <?php if ($data_penduduk['Jenis_Dinding'] == "Tembok Semen") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        >Tembok Semen</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="input-select" name="JanisAtap">Janis Atap</label>
                                        <select name="JanisAtap" class="form-control" id="input-select">
                                        <option
                                         <?php if ($data_penduduk['Jenis_Atap'] == "Seng") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Seng">Seng</option>
                                        <option
                                         <?php if ($data_penduduk['Jenis_Atap'] == "Asbes") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Asbes">Asbes</option>
                                        <option
                                         <?php if ($data_penduduk['Jenis_Atap'] == "Genteng") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Genteng">Tanah Liat</option>
                                        <option
                                         <?php if ($data_penduduk['Jenis_Atap'] == "Beton") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Beton">Beton</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="input-select" name="FasilitasToilet">Fasilitas Toilet</label>
                                        <select name="FasilitasToilet" class="form-control" id="input-select">
                                        <option
                                         <?php if ($data_penduduk['Fasilitas_Toilet'] == "Bersama") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Bersama">Bersama</option>
                                        <option
                                        <?php if ($data_penduduk['Fasilitas_Toilet'] == "Milik Sendiri") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Milik Sendiri">Milik Sendiri</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="Pembuangan Toilet">Pembuangan Toilet</label>
                                        <select name="PembuanganToilet" class="form-control" id="input-select">
                                        <option 
                                        <?php if ($data_penduduk['Tempat_Pembuangan_Tinja'] == "Kolam/Sawah/Sungai/Danau") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                        value="Kolam/Sawah/Sungai/Danau">Kolam/Sawah/Sungai/Danau</option>
                                        <option
                                        <?php if ($data_penduduk['Tempat_Pembuangan_Tinja'] == "Lubang Tanah") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Lubang Tanah">Lubang Tanah</option>
                                        <option
                                        <?php if ($data_penduduk['Tangki'] == "Kolam/Sawah/Sungai/Danau") {
                                            echo "selected = 'selected'";
                                        }
                                        ?>
                                         value="Tangki">Tangki</option>
                                        </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 pl-0">
                                                <p class="text-center mt-5">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form -->
                        <!-- ============================================================== -->
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/parsley/parsley.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>

</html>
