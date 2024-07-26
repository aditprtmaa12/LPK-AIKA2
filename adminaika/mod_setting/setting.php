<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<section class='content'>
<div class="tile bg-danger">					
						<div class='col-md-12'>
							
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title' style='color:azure'>PENTING !!!</h3>
										
									</div><!-- /.box-header -->
									<hr>
									<h4 style='color:yellow'>Jangan Lupa Untuk Mengganti Nomor Wa live Admin</h4>						
								</div><!-- /.box -->
								
							
						</div>
						</div>

						<div class="row">
		
        <div class="col-md-6">
          <div class="tile">
             
						
						<div class="tile-body">
              	<form id="form-setting">
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Jadwal Pendaftaran</h3>
										
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div class='form-group'>
											<label>Tahun Pelajaran</label>
											<input type='text' name='tahun_pelajaran' value="<?= $setting['tahun_pelajaran'] ?>" class='form-control' required='true' />
										</div>
										<div class='form-group'>
											<label>Tanggal Buka</label>
											<input type='date' name='tgl_pengumuman' value="<?= $setting['tgl_pengumuman'] ?>" class='form-control' required='true' />
										</div>
										<div class='form-group'>
											<label>Tanggal Tutup</label>
											<input type='date' name='tgl_tutup' value="<?= $setting['tgl_tutup'] ?>" class='form-control' required='true' />
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
								url: 'mod_setting/crud_setting.php?pg=jadwal',
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
						<div class='col-md-12'>
							<form id="form-live">
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Pengaturan WhatsApp Live Admin</h3>
										
									</div><!-- /.box-header -->
									<hr>
									<div class='box-body'>
										<div class='form-group'>
											<label>Text Live Chat Manual</label>
											<textarea class="form-control" name="livechat"><?= $setting['livechat'] ?></textarea>
										</div>
										<div class='form-group'>
											<label>No WA Live Cha admin</label>
											<input type="text" name="nolivechat" class="form-control" value="<?= $setting['nolivechat'] ?>" required>
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
   
    $('#form-live').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_setting/crud_setting.php?pg=live',
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