<!DOCTYPE html>
<html lang="en">
    <?= $this->include('landingpage/partisi/head.php'); ?>
    <body>
    <style>
    #populer:hover{
        color: blue;
    }
    #populer{
        color: #3e3f42;
    }
    .blink {

    animation: blink-animation 1s steps(5, start) infinite;

        -webkit-animation: blink-animation 1s steps(5, start) infinite;

    }

    @keyframes blink-animation {

        to {

        visibility: hidden;

        }

    }

    @-webkit-keyframes blink-animation {

    to {

        visibility: hidden;

    }

}
    </style>
    <?= $this->include('landingpage/partisi/navbar.php'); ?>
    <?php use App\Models\ModelsAdmin; $modell = new ModelsAdmin(); ?>
        <div class="container px-4 px-lg-5" style="margin-bottom: 60px;">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <h1 class="font-weight-light text-center mb-3 text-bold">Sistem Informasi Kerja Praktek</h1>

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner"  style=" width:100%; height: 500px !important;">
                            <div class="carousel-item active" style="width:1223px; height:631;">
                                <img class="d-block w-100 rounded" src="<?= base_url('assets/banner/'.$banner[0]['file']); ?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="<?= base_url('assets/banner/'.$banner[1]['file']); ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="<?= base_url('assets/banner/'.$banner[2]['file']); ?>" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-black my-5 py-2 text-center shadow-lg" style="background-color:#34abeb;">
                <div class="card-body"><p class="text-white m-0"><b>
                <marquee>Selamat Datang di Sistem Informasi Kerja Praktek yang digunakan untuk mengelola kerja Prakek, mulai dari Persiapan, Pelaksanaan, Penilaian, dan Evaluasi. Silahkan dipergunakan dengan baik</marquee>
                </b></p></div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <h3 class="text-center text-bold mb-5">Agenda Kegiatan</h3>
                <br><br>
                <?php foreach($agenda as $x): ?>
                <div class="col-md-4 mb-5">
                    <div class="card h-100 border-0">
                        <img class="card-img-top" style="width:100%; height: 160px !important;" src="<?= base_url('assets/agenda/'.$x->gambar); ?>" alt="Card image cap">
                        <div class="card-body"> 
                            <a href="<?= base_url('agenda/'.$x->slug); ?>" id="populer" style="text-decoration: none;"><h5 class="card-text mb-2"><?= $x->judul; ?></h5></a>
                            <small class="text-muted" style="font-size:12px;">
                                <i class="fas fa-calendar-week"></i> <?= date('d-M-Y', strtotime($x->tgl)); ?>
                                <i class="fas fa-bolt"></i> dilihat <?= $x->dilihat; ?>
                            </small>
                            <p class="card-text mt-3">
                                <?= strip_tags(substr($x->isi, 0, 69))."..."; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="row gx-4 gx-lg-5">
                <h3 class="text-center text-bold mb-5">Industri Populer</h3>
                <br><br>
                <?php foreach($industri as $x): ?>
                    <?php $sisa = $x->kuota - $modell->getTotalKuotaPenempatanByIndustri($x->id_industri); ?>
                <div class="col-md-4 mb-5">
                    <div class="card h-100 border-0">
                        <img class="card-img-top" style="width:100%; height: 160px !important;" src="<?= base_url('assets/industri/'.$x->foto); ?>" alt="Card image cap">
                        <div class="card-body"> 
                            <span class="badge badge-primary badge-pill mb-3"><i class="far fa-circle"></i> <?= $x->bidang_kerja; ?></span><br>
                            <a href="<?= base_url('industri/'.$x->slug); ?>" id="populer" style="text-decoration: none;"><h5 class="card-text mb-2"><?= $x->nama_industri; ?></h5></a>
                            <small class="text-muted" style="font-size:12px;">
                                <i class="fas fa-user-check"></i> <?= $modell->getTotalKuotaPenempatanByIndustri($x->id_industri) ?> siswa &nbsp;
                                <i class="fas fa-bolt"></i> sisa kuota <?= $sisa; ?>
                            </small>
                            <p class="card-text mt-3">
                                <?= strip_tags(substr($x->deskripsi, 0, 69))."..."; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?= $this->include('landingpage/partisi/footer.php'); ?>
        <?= $this->include('landingpage/partisi/js.php'); ?>
    </body>
</html>
