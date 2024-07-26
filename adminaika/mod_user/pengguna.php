<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Pengguna</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <button type="button" id="btnhapus" class="btn btn-danger"><i class="fa fa-trash    "></i> Hapus Data</button>
        </ul>
      </div>
	  
	  
	

<div class="row">
<div class="col-md-8">
   <div class="card">
	<div class="card-header bg-primary text-white" >
	   <h4>Data Pengguna</h4>
		
	</div>
	<div class="card-body">
		<div class="table-responsive">
			 <table style="font-size: 12px" class="table table-striped table-sm" id="example">
				<thead>
					<tr>
						<th><input type='checkbox' id='ceksemua'></th>
						<th class="text-center">
							No
						</th>
						<th>Nama Pengguna</th>
						<th>Akses</th>
						<th>Username</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					 $query = mysqli_query($koneksi, "select * from user where status='2'");
					$no = 0;
					while ($user = mysqli_fetch_array($query)) {
						$no++;
					?>
						<tr>
							<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $user['id_user'] ?>"></td>
							<td><?= $no; ?></td>
							<td><?= $user['nama_user'] ?></td>
							<td><?php if ($user['akses'] == 'admin') { ?> Administrator <?php } ?>
								<?php if ($user['akses'] == 'ppdb') { ?> Panitia PPDB <?php } ?>
								
							</td>
							
							<td><?= $user['username'] ?></td>
							
							
							<td>
								
								<a data-toggle="tooltip" data-placement="top" title="" data-original-title="ubah post" href="?pg=edit_pengguna&id=<?= enkripsi($user['id_user']) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit    "></i></a>
								

								<!-- Modal -->
								
							</td>
						</tr>
						
					<?php }
					?>


				</tbody>
			</table>
		</div>
	</div>
	
</div> 
</div>

	<div class="col-md-4 mb-3">
	  <form id="form-tambah">
				
						<div class="tile ">
						<h3 class='box-title'>Tambah Data Pengguna</h3>
						<hr>
						<div class="tile-body">					
						<div class='form-group'>
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" required="">
						</div>
						<div class='form-group'>
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="">
						</div>
						<div class='form-group'>
							<div class='row'>
								<div class='col-md-12'>
									<label>Password</label>
									 <input type="password" name="password" class="form-control" required="">
								</div>
								
							</div>
						</div>
						<div class="form-group">
							<label for="level">Level Akses</label>
							<select class="form-control" name="akses" id="level" required>
								<option value="ppdb">Panitia PPDB</option>
								
								
							</select>
						</div>

						
						<div class="tile-footer">
						  <button class="btn btn-primary" type='submit' id="save-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
						</div>
									</div></div><!-- /.box-body -->
								</div><!-- /.box -->
								
				</form>
  
  </div>

  

<script>
    //CEKBOX DAN HAPUS  
    $('#ceksemua').change(function() {
        $(this).parents('#example:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });
    $(function() {
        $("#btnhapus").click(function() {
            id_array = new Array();
            i = 0;
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
            $.ajax({
                url: "mod_user/crud_user.php?pg=hapususercheck",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
						swal({
						title: 'Terimakasih',
						text: 'Status Telah Diperbaharui!',
						type: 'success',
					
                        });
						setTimeout(function() {
							window.location.reload();
						}, 1000);
                        })
                    }
                }
            });
            return false;
        })
    });
    $(function() {
        $("#txtConfirmPassword").keyup(function() {
            var password = $("#txtNewPassword").val();
            $("#divCheckPasswordMatch").html(password == $(this).val() ? "Passwords match." : "Passwords do not match!");
        });

    });
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_user/crud_user.php?pg=tambahpengguna',
            data: $(this).serialize(),
            success: function(data) {
                if (data == 'OK') {
                    swal({
						title: 'Terimakasih',
						text: 'Status Telah Di Tambah',
						type: 'success',
					
                        });
						setTimeout(function() {
							window.location.reload();
						}, 1000);
                    $('#tambahdata').modal('hide');
                } else {
                    swal({
						title: 'Maaf',
						text: 'Data Gagal di Tambahkan!',
						type: 'success',
					
                        });
						setTimeout(function() {
							window.location.reload();
						}, 1000);
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    $('#example').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_user/crud_user.php?pg=hapus',
                    method: "POST",
                    data: 'id_user=' + id,
                    success: function(data) {

                        iziToast.success({
                            title: 'Horee!',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    }
                });
            }
        })

    });
</script>