<?php
$main = 1;
?>

<?php if ($main == 0) { ?>

<head>
<div class="page-error tile" align="center"> 
           
           
         
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:100%;">  
                 
                  <div class="loader-logo"><img src="update.png" width="160px" alt=""></div>
                  
                  
                
                
                <h5 align="">Klik Tombol instal Untuk Melakukan instal File PPDB </h5>
				
				<span>Patikan zip Tercentang di extensi php anda <br /> 
				<br>
                <div class="row">
				<div class="col-md-4 col-lg-4">
				
				</div>
				<div class="col-md-2 col-lg-2">
				<form id="form-update">  
						 
                    <button  class="hapus btn btn-sm btn-danger"><i class="fa fa-upload fa-lg fa-fw"></i>Intall</button>	
                    
                    
                </form> 
				</div>
				<div class="col-md-2 col-lg-2">
				<center><button  class="btn btn-sm btn-success"onClick="window.location.reload()"><i class="fa fa-refresh fa-lg fa-fw"></i>Refresh</button>	</center>
				</div>
				<div class="col-md-4 col-lg-4">
				
				</div>
				</div>
                <br />  
                <?php  
                if(isset($output))  
                {  
                     echo $output;  
                }  
                ?>  
           </div> 
          
           <br />  
		
		
<script>
$('#form-update').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
       
      	
			swal({
      		title: "Sedang Install!!",
      		text: "Proses install Memerlukan Waktu Kurang lebih 2 Menit. Mohon Menunggu Sampai Selesai",
      		type: "warning",
      		showCancelButton: false,
			showConfirmButton: false,
      		
      		cancelButtonText: "Tidak..Batalkan!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			$.ajax({
                    url: '../ppdb/cmain.php?pg=install',
                    method: "POST",
                    success: function(data) {
                        swal({
        					title: 'Sukses !!',
        					text: 'Logout Berhasil',
        					type: 'success',
                            });
                        
                    }
                });
      		} else {
      			swal("Batal !!", "Yakin Anda akan Batalkan :)", "error");
      		}
      	});
      });
</script>
	<script>
			
			$('#form-update').on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'post',
					url: '../ppdb/cmain.php?pg=install',
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
					beforeSend: function() {
						$('form-foto').on("click", function(e) {
							e.preventDefault();
						});
					},
					success: function(data) {

						swal({
							title: 'Sukses !!',
							text: 'Selamat Update Aplikasi Berhasil. Silahkan Refresh Untuk Melihat Hasil Update',
							type: 'success',
							});
						


							}
						});
					});
		    </script>  	
		
		
 
 
 
        
       
      </div>

<?php } else { ?>
					 
			 
<head>
<div class="page-error tile" align="center"> 
           
           
         
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:100%;">  
                 
                  <div class="loader-logo"><img src="update.png" width="160px" alt=""></div>
                  
                  
                
                
                <h5 align="">APLIKASI PPDB SUDAH TERINSTAL </h5>
				
				<span>Silahkan Buat subdomain Khususn untuk PENDAFTARAN ITTIBA DAN UK Anda <br /> 
				<br>
                <div class="row">
				<div class="col-md-4 col-lg-4">
				
				</div>
				<div class="col-md-4 col-lg-4">
				
						 
                    <a  href="../ppdb"  type="button" class="hapus btn btn-sm btn-danger"><i class="fa fa-upload fa-lg fa-fw"></i>Cek Web PPDB</a>	
                    
                    
               
				</div>
				
				<div class="col-md-4 col-lg-4">
				
				</div>
				</div>
                <br />  
                <?php  
                if(isset($output))  
                {  
                     echo $output;  
                }  
                ?>  
           </div> 
          
           <br />  
	  
<?php } ?>