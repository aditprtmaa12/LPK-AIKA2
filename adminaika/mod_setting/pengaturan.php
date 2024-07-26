<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<section class='content'>
														<div class="row">
        <div class="col-md-6">
          <div class="tile">
             <div class="tile-body">
              	<form id="form-setting">
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Pengaturan Aplikasi</h3>
										
									</div><!-- /.box-header -->
									<div class='box-body'>
										
										<div class='form-group'>
											<label>Naungan Lembaga</label>
											<input type='text' name='lembaga' value="<?= $setting['lembaga'] ?>" class='form-control' required='true' />
										</div>
										<div class='form-group'>
											<label>Nama Universitas</label>
											<input type='text' name='nama_sekolah' value="<?= $setting['nama_sekolah'] ?>" class='form-control' required='true' />
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>NSM/NSS Universitas</label>
													<input type='text' name='nsm' value="<?= $setting['nsm'] ?>" class='form-control' required='true' />
												</div>
												<div class='col-md-6'>
													<label>NPSN Universitas</label>
													<input type='text' name='npsn' value="<?= $setting['npsn'] ?>" class='form-control' required='true' />
												</div>
											</div>
										</div>
										<div class="form-group col-md-12">
                                                           <label>Pakai Kop Universitas</label>
														   <br>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadioInline1" name="_kop" class="custom-control-input" value="1" <?php if ($setting['_kop'] == '1') echo 'checked' ?>>
                                                                <label class="custom-control-label" for="customRadioInline1">YA</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadioInline2" name="_kop" class="custom-control-input" value="0" <?php if ($setting['_kop'] == '0') echo 'checked' ?>>
                                                                <label class="custom-control-label" for="customRadioInline2">Tidak</label>
                                                            </div>
                                         </div>
										 <div class="form-group col-md-12">
                                                           <label>Landingpage</label>
														   <br>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadioInline3" name="ppdb" class="custom-control-input" value="1" <?php if ($setting['ppdb'] == '1') echo 'checked' ?>>
                                                                <label class="custom-control-label" for="customRadioInline3">Lama</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadioInline4" name="ppdb" class="custom-control-input" value="0" <?php if ($setting['ppdb'] == '0') echo 'checked' ?>>
                                                                <label class="custom-control-label" for="customRadioInline4">Baru</label>
                                                            </div>
                                         </div>
										 
										
										<div class='form-group'>
											<div class='row'>
												<div class="col-sm-6 col-md-6">
													<label>Logo</label>
													<input type='file' name='logo' class='form-control' />
												</div>
												<div class="col-sm-6 col-md-6">
													&nbsp;<br />
													 <img src="../<?= $setting['logo'] ?>" class="img-thumbnail" width="100">
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class="col-sm-6 col-md-6">
													<label>TTD Ketua Panitia</label>
													<input type='file' name='ttd' class='form-control' />
												</div>
												<div class="col-sm-6 col-md-6">
													&nbsp;<br />
													 <img src="../<?= $setting['ttd'] ?>" class="img-thumbnail" width="100">
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-12'>
													<label>Kop Universitas</label>
													<input type='file' name='kop' class='form-control' />
												</div>
												<div class="col-sm-6 col-md-12">
													&nbsp;<br />
													 <img src="../<?= $setting['kop'] ?>" class="img-thumbnail" width="800">
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-12'>
													<label>Logo Pendaftaran</label>
													<input type='file' name='logo_ppdb' class='form-control' />
												</div>
												<div class="col-sm-6 col-md-12">
													&nbsp;<br />
													 <img src="../<?= $setting['logo_ppdb'] ?>" class="img-thumbnail" width="800">
												</div>
											</div>
										</div>
										
									</div><!-- /.box-body -->
								</div><!-- /.box -->
								<div class="tile-footer">
							  <button class="btn btn-primary" type='submit' id="save-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
							</div>
							</form>
						</div>
						
			</div>
						<script>
						$('.custom-file-input').on('change', function() {
							let fileName = $(this).val().split('\\').pop();
							$(this).next('.custom-file-label').addClass("selected").html(fileName);
						});
						$('#form-setting').on('submit', function(e) {
							e.preventDefault();
							$.ajax({
								type: 'post',
								url: 'mod_setting/crud_setting.php?pg=ubah',
								data: new FormData(this),
								processData: false,
								contentType: false,
								cache: false,
								beforeSend: function() {
									$('form button').on("click", function(e) {
										e.preventDefault();
									});
								},
								success: function(data) {

									swal({
									title: 'Terimakasih',
									text: 'Data Berhasil Disimpan!',
									type: 'success',
									buttons: false,
									});
									setTimeout(function() {
										window.location.reload();
									}, 1000);


								}
							});
						});
					</script>
					</div>
						<div class="col-md-6">
				  <div class="tile">
					 <div class="tile-body">
							<form id="form-setting">
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Pengaturan</h3>
										
									</div><!-- /.box-header -->
									<hr>
									<div class='box-body'>
										<div class="row">
										  
										
									 
										 
										 
									 <div class="col-lg-12">
										  <div class="widget-small info coloured-icon"><i class="icon fa fa-edit"></i>
											<div class="info">
											<h4>Info Pendaftaran</h4>
											<p>Setting pengaturan info Pendaftaran Anda disini.</p>
											<a href="?pg=pengumuman" class="card-cta">Change Setting <i class="fa fa-chevron-right"></i></a>
										  </div>
										</div>
									  </div>
									   
									 
										
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</form>
						</div>
						<hr>
						
					</div>
												

											
						
						</div>
						
</script>
	<!-- Modal -->
			<div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="form-konfirmasi">
						<div class="modal-header">
							<h5 class="modal-title">Hapus Data Siswa dan PPDB </h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							Terdapat <b><?= rowcount($koneksi, 'siswa') ?></b> Jumlah  Data Akan Di Hapus.
							

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Hapus Semua</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="col-md-12 mb-3">
               <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    
                    <div class="mt-3">
					 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusdata"><i class="sidebar-item-icon fa fa-trash"></i> Kosongkan Semua data Siswa </button>
					 
					
					
                       
                    </div>
                  </div>
                </div>
              </div>
              
		
        
		
      </div>
	  <script>
$('#form-konfirmasi').submit(function(e) {
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'mod_siswa/crud_siswa.php?pg=hapusall',
		data: $(this).serialize(),
		success: function(data) {

			swal({
					title: 'Sukses !!',
					text: 'Data  Berhasil Di Hapus',
					type: 'success',
                    });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
			$('#modal-edit<?= $no ?>').modal('hide');
			//$('#bodyreset').load(location.href + ' #bodyreset');
		}
	});
	return false;
});
</script>