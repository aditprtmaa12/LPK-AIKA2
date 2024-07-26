


	

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
		<meta http-equiv="refresh" content="20" />
         <title>PENDAFTARAN ITTIBA DAN UK | <?= $setting['nama_sekolah'] ?></title>
		 <!-- META DISKRIPSI-->
		<meta name="description" content="Mari bergabung Bersama Kami di <?= $setting['nama_sekolah'] ?>, Pendaftaran Peserta didik Baru Tahun <?= $setting['tahun_pelajaran'] ?> Kembali dibuka ">
		<meta name="keywords" content="ppdb online,Pendaftaran Siswa Baru,"/>
		<meta name="msapplication-navbutton-color" content="#4285f4">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="msapplication-TileColor" content="#ffffff">
		
		<meta name="theme-color" content="#ffffff">
		<link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
        <link href="assets/css/front.min.css" rel="stylesheet" />
        <link rel="shortcut icon" href="<?= $setting['logo'] ?>" >		
		 <link rel="stylesheet" href="assets/css/1.css">
		 <link rel="stylesheet" href="assets/css/2.css">
		 <link rel="stylesheet" href="assets/css/3.css">
		
		 <link rel="stylesheet" href="assets/css/components2.css">
		  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>
     <link rel="stylesheet" href="assets/modules/font-awesome/css/font-awesome.css">
    
    
    <!-- Start GA -->
    
    <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('a.close').click(function(eve){
			
			eve.preventDefault();
			$(this).parents('div.popup').fadeOut('slow');
		});
	});
</script>
<style type="text/css">
	body{
		width:100%;
		height:100%;
		margin:0;
		padding:0;
	}
	div.popup{
		position:fixed;
		top:0;
		bottom:0;
		left:0;
		right:0;
		width:100%;
		height:100%;
		background: rgba(0,0,0,.8);
	}
	
	div#box{
		margin:5% auto;
		background:#fff;
		width:50%;
		height:50%;
		-webkit-box-shadow:0 0 15px #000;
		-moz-box-shadow:0 0 15px #000;
		box-shadow:0 0 15px #000;
	}
	
	a.close{
		text-decoration:none;
		color:#000;
		margin:10px 15px 0 0;
		float:right;
		font-family:tahoma;
		font-size:20px;
	}
</style>

  
    
	 
    </head>
    
    <body data-spy="scroll" data-target="#menu" data-offset="100">
        <div class="home-wrapper" id="home">
            <div class="home-header">
                <div class="container p-0">
                    <nav class="navbar navbar-expand-lg navbar-light" id="navbar-header">
                        <a class="navbar-brand" href="javascript:;">
                            <img src="<?= $setting['logo'] ?>" height="75" />
                            <div class="home-header-text d-none d-sm-block">
                                <h5>PENDAFTARAN ITTIBA DAN UK</h5>
                                <h6><?= $setting['nama_sekolah'] ?></h6>
                                <h6>Tahun Pelajaran <?= $setting['tahun_pelajaran'] ?></h6>
                            </div>
                            <span class="logo-mini-unbk d-block d-sm-none">PPDB </span>
                            <span class="logo-mini-tahun d-block d-sm-none">_ONLINE</span>
                        </a>
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="menu">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#home" id="link-home">Home</a>
                                </li>
                                
								<li class="nav-item">
                                    <a class="nav-link" href="datadaftar.php" id="link-persyaratan">Data Pendaftar</a>
                                </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="./adminaika" id="link-persyaratan">Admin</a>
                                </li>
								
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
		
            <div class="home-banner">
                <div class="home-banner-bg home-banner-bg-color"></div>
                <div class="home-banner-bg home-banner-bg-img"></div>
                <div class="container mt-5">
                    <div class="row">
                        
						<div class="col-sm-8">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel" data-slide-to="1"></li>
                                    <li data-target="#carousel" data-slide-to="2"></li>
                                   
                                    
                                </ol>
                                <div class="carousel-inner">
                                    <?php if ($hariini <= $buka) { ?>	
									<div class="carousel-item active">
                                        <div>
                                            <h5 data-animation="animated fadeInDownBig">
                                                Selamat Datang Di PENDAFTARAN ITTIBA DAN UK
                                            </h5>
                                            <ul>
                                                <li data-animation="animated fadeInDownBig" data-delay="1s">
                                                    Aplikasi pendaftaran ITTIBA DAN UK baru Tahun Pelajaran <?= $setting['tahun_pelajaran'] ?> <?= $setting['nama_sekolah'] ?> 
												 </li>
												  <li data-animation="animated flipInX" data-delay="3s">
												 Pendaftaran Mahasiswa dan Mahasiswi Baru Tahun <?= $setting['tahun_pelajaran'] ?> ini Belum Dibuka. Silahkan Menunggu Jadwal
                                                </li>
											</ul>
											
                                                <p data-animation="animated flipInX" data-delay="4s">
                                                <a href="#" class="btn btn-warning nav-link">
                                                    Pendaftaran Dibuka pada Tanggal <?php echo tgl_indo("$tgl_buka");?>
                                                    
                                                </a>
                                            </p>
                                        </div>
                                    </div>
									<?php } ?>
									<?php if ($hariini >= $tutup) { ?>	
									<div class="carousel-item active">
                                        <div>
                                            <h5 data-animation="animated fadeInDownBig">
                                                Selamat Datang Di web PENDAFTARAN ITTIBA DAN UK
                                            </h5>
                                            <ul>
                                                <li data-animation="animated fadeInDownBig" data-delay="1s">
                                                    Menjadikan Lulusan Islami dengan menempatkan Iman dan Ilmu, Teknologi dan Seni sebagai piranti kekhalifahan menuju World Class Univercity yang Green Industri <?= $setting['tahun_pelajaran'] ?> <?= $setting['nama_sekolah'] ?> 
												 </li>
												  <!-- <li data-animation="animated flipInX" data-delay="3s">
												 Pendaftaran Mahasiswa dan Mahasiswi Baru Tahun <?= $setting['tahun_pelajaran'] ?> ini telah Di Tutup.. Silahkan Tunggu Gelombang Berikutnya.
                                                </li> -->
											</ul>
											
                                                <p data-animation="animated flipInX" data-delay="4s">
                                                <a href="#" class="btn btn-warning nav-link">
                                                    Pendaftaran Sudah Di Tutup Tanggal <?php echo tgl_indo("$tgl_tutup");?>
                                                    
                                                </a>
                                            </p>
                                        </div>
                                    </div>
									<?php } else { ?> 

									<?php if ($hariini >= $buka )  { ?>	
									<div class="carousel-item active">
                                        <div>
                                            <h5 data-animation="animated fadeInDownBig">
                                                Selamat Datang Di web PENDAFTARAN ITTIBA DAN UK
                                            </h5>
                                            <ul>
                                                <li data-animation="animated fadeInDownBig" data-delay="1s">
                                                    Menjadikan Lulusan Islami dengan menempatkan Iman dan Ilmu, Teknologi dan Seni sebagai piranti kekhalifahan menuju World Class Univercity yang Green Industri<?= $setting['tahun_pelajaran'] ?> <?= $setting['nama_sekolah'] ?> 
												 </li>
												  <li data-animation="animated flipInX" data-delay="3s">
												 Pendaftaran Mahasiswa dan Mahasiswi Baru Tahun <?= $setting['tahun_pelajaran'] ?> ini telah dibuka. Silahkan Segera Daftar dan lengkapi Formulir
                                                </li>
											</ul>
											
                                                <p data-animation="animated flipInX" data-delay="4s">
                                                <a href="/#tentang" class="btn btn-warning nav-link">
                                                    Lihat Alur Pendaftaran
                                                    
                                                </a>
                                            </p>
                                        </div>
                                    </div>
									<?php } ?>	
									<?php } ?>
                                    <!-- <div class="carousel-item">
                                        <div>
                                            <h5 data-animation="animated fadeInDownBig">
                                                Syarat Pendaftaran  ITTIBA DAN UK
                                            </h5>
                                            <h5 data-animation="animated fadeInDownBig">
                                                Tahun Pelajaran <?= $setting['tahun_pelajaran'] ?>
                                            </h5>
                                            <ul>
                                                <li data-animation="animated fadeInDownBig" data-delay="1s">
                                                    Surat Keterangan Lulus
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="2s">
                                                    Ijazah Jenjang Sebelumnya
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="3s">
                                                    Kartu Keluarga
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="4s">
                                                    Akta Kelahiran
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="5s">
                                                    Scan Raport
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <div class="carousel-item">
                                        <div>
                                            <h5 data-animation="animated fadeInDownBig">
                                                Alur pendaftaran ITTIBA DAN UK 
                                            </h5>
                                            <h5 data-animation="animated fadeInDownBig">
                                                Tahun Pelajaran <?= $setting['tahun_pelajaran'] ?>
                                            </h5>
                                            <ul>
                                                <li data-animation="animated fadeInDownBig" data-delay="1s">
                                                    Pembayaran
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="2s">
                                                    Daftar Akun
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="3s">
                                                    Lengkapi Formulir
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="4s">
                                                    Pengambil Form Pendaftaram
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="5s">
                                                    Verifikasi Pendaftaran
                                                </li>
                                                <li data-animation="animated flipInX" data-delay="5s">
                                                    Siap Menjadi Peserta ITTIBA & UK
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                   
                                    
                                    
                                </div>
                            </div>
							
                        </div>
                        <div class="col-sm-4">
						
                            <div class="card card-login bg-info">
							
                                <div class="card-body">
								<img src="<?= $setting['logo_ppdb'] ?>" alt=""  width="85%">
									<br>
                                   <form id="form-login">
                                        <div class="form-group">
                                            <span class="fa fa-user"></span>
                                           <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" name="username" placeholder="Masukkan NIM" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <span class="fa fa-key"></span>
                                           <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                                        </div>
                                       
                                        <button type="submit" class="btn btn-primary btn-block btn-login" id="btnsimpan">
                                            Masuk
                                        </button>
										 
										  
                                    </form>
									
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-content">
                <section id="tentang">
                    <div class="container">
                        
                        <div class="row">
                            
                            <div class="col-sm-6 d-flex align-items-center">
							<div class="col-md-12 animated bounceInLeft">
								<div class="card mt-2">
                                    <div class="card-header text-white" style="background-color: #005f6b">
								   <h4>Alur Proses Pendaftaran</h4>
									
								</div>
                                    <div class="card-body">
									 <div class="col-12 animated bounceIn">
										<p>Silahkan Simak Alur Pendaftaran sebelum Melakukan Pendaftaran ITTIBA DAN UK <?= $setting['nama_sekolah'] ?></p>
										<div class="activities">
											<div class="activity">
												<div class="activity-icon bg-primary text-white shadow-primary">
													1
												</div>
												
												<div class="activity-detail">
												<?php if ($hariini <= $buka) { ?>														
													<p>Calon Siswa mendaftar di web pendaftaran.</p>
													<p><a href="#" class="btn btn-warning btn-block btn-login">
                                                    Belum Dibuka</a>.</p>
												<?php } ?>
												<?php if ($hariini >= $tutup) { ?>	
													<p>Calon Siswa mendaftar di web pendaftaran.</p>
													<p><a href="https://ppdb.mtsn1wonogiri.sch.id/daftar.php" class="btn btn-danger btn-block btn-login">
                                                    KLIK DISINI UNTUK DAFTAR</a>.</p>
												<?php } else { ?> 
												<?php if ($hariini >= $buka )  { ?>		
													<p>Calon Siswa mendaftar di web pendaftaran.</p>
													<p><a href="./daftar.php" class="btn btn-primary btn-block btn-login">
                                                    Daftar Sekarang</a>.</p>
												<?php } ?>	
												<?php } ?>
													
												</div>
												
											</div>

										</div>
										<div class="activities">
											<div class="activity">
												<div class="activity-icon bg-primary text-white shadow-primary">
													2
												</div>
												<div class="activity-detail">
													<p>Jika selesai pendaftaran silahkan login dengan username dan password saat pendaftaran</p>
													<p><a href="./ppdb"class="btn btn-success btn-block btn-login">
                                                    Login</a></p>
												</div>
												
											</div>
										</div>
										<div class="activities">
											<div class="activity">
												<div class="activity-icon bg-primary text-white shadow-primary">
													3
												</div>
												<div class="activity-detail">
													<p>Lengkapi Formulir yang diberikan dengan data yang benar.</p>

												</div>
											</div>
										</div>
									</div>
                                    </div>
                                </div>
							</div>
                            </div>
							<div class="col-sm-6">
							
                                <div class="container">
                        
                    </div>	
                            </div>
                        </div>
                    </div>
                </section>
				

                <section class="bg-light statistik" id="statistik">
                    <div class="container">
                        <h5 class="text-center">Data Pendaftar </h5>
                        <h6 class="text-center">Pendaftaran ITTIBA DAN UK <?= $setting['nama_sekolah'] ?> Tahun <?= $setting['tahun_pelajaran'] ?></h6>
                        <div class="row mt-12">
                            <div class="col-sm-6">
                                <div class="card mt-2">
                                    <div class="card-header bg-primary">Data Pendaftar</div>
                                    <div class="card-body">
                                        <h2 class="text-center"><?= rowcount($koneksi, 'siswa', ['jenis' => 1]) ?></h2>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-sm-4">
                                <div class="card mt-2">
                                    <div class="card-header bg-secondary">Data Diterima</div>
                                    <div class="card-body">
                                        <h2 class="text-center"><?= rowcount($koneksi, 'siswa', ['status' => 4]) ?></h2>
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-sm-6">
                                <div class="card mt-2">
                                    <div class="card-header bg-success">Kuota</div>
                                    <div class="card-body">
                                        <h2 class="text-center"><?php $kuota = mysqli_fetch_array(mysqli_query($koneksi, "select *, sum(kuota) as kuota from jurusan"));
                    echo $kuota['kuota']; ?></h2>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                       
                       
                    </div>
                </section>
                 <section class="bg-light statistik" id="persyaratan">
                    <div class="container">
                       
                    </div>
                </section>
				
				
				
				
				

				
				
				
            </div>
			
			
			
            
        </div>
		<div class="home-footer"><div class="container text-center">Copyright ©<?= date('Y') ?> <?= $setting['nama_sekolah'] ?> </div>
        <script>
            var baseURL = '/';
            
        </script>
		
		<script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/jquery.form.min.js"></script>
        <script src="vendor/bootstrap.min.js"></script>
        <script src="vendor/popper.min.js"></script>
		<script src="assets/modules/izitoast/js/iziToast.min.js"></script>
		<script src="assets/modules/sweetalert/sweetalert.min.js"></script>
		<script src="assets/modules/izitoast/js/iziToast.min.js"></script>
		<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript">$('#sampleTable').DataTable();</script>
			
		
		
		
        <!-- Vendor -->
        
        
        
        <script src="vendor/wow.min.js"></script>
        
        <!-- Assets -->
        <script src="vendor/front.min.js"></script>
        
	
	</div>
       
    </body>
</html>
<script>
    $('#form-login').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'crud_web.php?pg=login',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#btnsimpan').prop('disabled', true);
            },
            success: function(data) {
                var json = $.parseJSON(data);
                $('#btnsimpan').prop('disabled', false);
                if (json.pesan == 'ok') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Login Berhasil',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.href = "aika";
                    }, 2000);

                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: json.pesan,
                        position: 'topCenter'
                    });
						
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
	
    
    
</script>


	
	

<script>
  $(document).ready(function() {
	var elapsedTime = 0;
	var interval = setInterval(function() {
	  timer()
	}, 10);

	function progressbar(percent) {
	  document.getElementById("bar1").style.width = percent + '%';
	  document.getElementById("percent1").innerHTML = percent + '%';
	}

	function timer() {
	  if (elapsedTime > 100) {
      var RDMData = decodeURIComponent(getCookie("rdmData"));
      if(RDMData !==""){
        var login = JSON.parse(RDMData);
        if(login.status !==""){
          clearInterval(interval);
         
        }
      }
      if (elapsedTime >= 107) {
        clearInterval(interval);
        $(".pre-loader").hide();
      }
	  } else {
		  progressbar(elapsedTime);
	  }
	  elapsedTime++;
	}
	//setTimeout(function(){ $(".pre-loader").hide(); }, 2000);
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }	


});


  </script>
  <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "<?= $setting['nolivechat'] ?>", // WhatsApp number
            email: "<?= $setting['email'] ?>", // Email
            call_to_action: "Hubungi Kami!!!", // Call to action
            button_color: "#129BF4", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "whatsapp,email", // Order of buttons
            pre_filled_message: "<?= $setting['livechat'] ?>", // WhatsApp pre-filled message
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
	 </script>

