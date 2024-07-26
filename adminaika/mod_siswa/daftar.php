<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php if (isset($_GET['jurusan']) == '') { ?>



    <div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-import">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Import File Excel</label>
                            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
                            <small id="helpfile" class="form-text text-muted">File harus .xls</small>
                        </div>

                        <p><a href="template_excel/importdaftar.xls">Download Format</a></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Pendaftar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nisn" class="form-control " required="">
                        </div>
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="nama_siswa" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>No Hp (Wahatsapp)</label>
                            <input type="text" name="no_hp" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control "="">
                        </div>

                        <div class="form-group">
                            <label for="jenis">Jenis Kelamin</label>
                            <select class='form-control' name='jk'>
                                <option value=''>Pilih Jenis Kelamin</option>";
                                <?php foreach ($jeniskelamin as $val => $key) { ?>
                                    <?php if ($siswa['jk'] == $val) { ?>
                                        <option value='<?= $val ?>' selected><?= $key ?> </option>
                                    <?php  } else { ?>
                                        <option value='<?= $val ?>'><?= $key ?> </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class='form-control' name='jurusan'>
                                <option value="">Pilih Jurusan</option>
                                <?php $qu = mysqli_query($koneksi, "select * from jurusan where status='1'");
                                while ($jur = mysqli_fetch_array($qu)) {
                                ?>
                                    <option value="<?= $jur['id_jurusan'] ?>"> <?= $jur['nama_jurusan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="asal">Program Studi</label>
                            <input type="text" name="asal_sekolah" class="form-control"="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pendaftar</h4>

                    <div class="card-header-action">

                        <button type="button" class="btn btn-icon icon-left btn-sm btn-primary" data-toggle="modal" data-target="#tambahdata">
                            <i class="fa fa-edit"></i> Tambah Data
                        </button>

                        &nbsp;
                        <button type="button" id="btnhapus" class="btn btn-sm btn-danger"><i class="fa fa-trash    "></i> Hapus Mahasiswa</button>&nbsp;
                        <a class="btn btn-sm btn-info" href="mod_siswa/export_excel.php" role="button"><i class="fa fa-download"></i></a>
                        <iframe name='printdaftar2' src='mod_siswa/alldaftar.php' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar2'].print()" class='btn btn-sm btn-flat btn-info'><i class='fa fa-print'></i></button></td>

                    </div>

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
                                    <th>No Daftar</th>
                                    <th>NIM</th>
                                    <th>Password</th>
                                    <th>Nama Pendaftar</th>
                                    <th>L/P</th>
                                    <th>Program Studi</th>
                                    <!--<th>Rapor</th>-->
                                    <th>No Hp</th>
                                    <th>Kelas</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                    <!--<th>SKL</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from siswa where status in(0,1) and jenis in(1)");
                                $no = 0;
                                while ($daftar = mysqli_fetch_array($query)) {
                                    $no++;

                                ?>
                                    <tr>
                                        <td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $daftar['id_siswa'] ?>"></td>
                                        <td><?= $no; ?></td>
                                        <td><?= $daftar['no_daftar'] ?></td>
                                        <td><?= $daftar['nisn'] ?></td>
                                        <td><?= $daftar['password'] ?></td>
                                        <td><?= $daftar['nama_siswa'] ?></td>
                                        <td><?= $daftar['jk'] ?></td>
                                        <td><?= $daftar['akademik_prodi'] ?></td>
                                        <!--<td><?= $daftar['npsn'] ?></td>-->

                                        <td>
                                            <i class="fa fa-whatsapp text-success   "></i>
                                            <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima kasih telah mendaftar di <?= $setting['nama_sekolah'] ?>. Silahkan Login untuk melengkapi formulir pendaftaran dengan username *<?= $daftar['nisn'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password'] ?>%2A">
                                                <?= $daftar['no_hp'] ?></a>
                                        </td>
                                        <td><?= $daftar['kelas'] ?></td>
                                        <td>
                                            <?php if ($daftar['status'] == 1) {

                                            ?>
                                                <button data-id="<?= $daftar['id_siswa'] ?>" class="aktif btn-sm btn btn-success">✔</i></button>





                                            <?php } else { ?>
                                                <button data-id="<?= $daftar['id_siswa'] ?>" class="tidakaktif btn-sm btn btn-danger">Pending</i></button>

                                            <?php } ?>
                                        </td>

                                        <td>
                                            <!-- <a data-toggle="tooltip" data-placement="top" title="EDIT DATA" data-original-title="detail siswa" href="?pg=ubahsiswa&id=<?= enkripsi($daftar['id_siswa']) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit    "></i></a> -->
                                            <!-- <iframe name='printdaftar<?= $daftar['nisn'] ?>' src='mod_siswa/print_daftar.php?id=<?= enkripsi($daftar['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-warning'><i class='fa fa-print'></i>Formulir</button> -->
                                            <iframe name='printdaftar_kartu<?= $daftar['nisn'] ?>' src='../assets/tanda_terima.pdf' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar_kartu<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-secondary'><i class='fa fa-print'></i>Tanda Terima</button>
                                            <iframe name='printdaftar_surat<?= $daftar['nisn'] ?>' src='../assets/surat_pernyataan.pdf' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar_surat<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-success'><i class='fa fa-print'></i>Cetak SP</button>
                                            <!-- <iframe name='printdaftar_kartu<?= $daftar['nisn'] ?>' src='mod_siswa/print_daftar_kartu.php?id=<?= enkripsi($daftar['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar_kartu<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-secondary'><i class='fa fa-print'></i>Tanda Terima</button>
                                        <iframe name='printdaftar_surat<?= $daftar['nisn'] ?>' src='mod_siswa/print_surat_pernyataan.php?id=<?= enkripsi($daftar['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar_surat<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-success'><i class='fa fa-print'></i>Cetak SP</button>                                      -->
                                        </td>

                                        <!-- Button trigger modal -->



                                        </td>
                                        <!--<td><?= $daftar['skl'] ?></td>-->
                                    </tr>

                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else {  ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pendaftar Jurusan <?= $_GET['jurusan'] ?></h4>



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
                                    <th>No Daftar</th>
                                    <th>NIM</th>
                                    <th>Password</th>
                                    <th>Nama Pendaftar</th>
                                    <th>L/P</th>
                                    <!--<th>No Hp</th>-->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from siswa where jurusan='$_GET[jurusan]'and jenis in(1)");
                                $no = 0;
                                while ($daftar = mysqli_fetch_array($query)) {
                                    $no++;

                                ?>
                                    <tr>
                                        <td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $daftar['id_siswa'] ?>"></td>
                                        <td><?= $no; ?></td>
                                        <td><?= $daftar['no_daftar'] ?></td>
                                        <td><?= $daftar['nisn'] ?></td>
                                        <td><?= $daftar['password'] ?></td>
                                        <td><?= $daftar['nama_siswa'] ?></td>
                                        <td><?= $daftar['jk'] ?></td>
                                        <!--<td>
                                        <i class="fa fa-whatsapp text-success   "></i>
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima kasih telah mendaftar di <?= $setting['nama_sekolah'] ?>. Silahkan Login untuk melengkapi formulir pendaftaran dengan username *<?= $daftar['nisn'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password'] ?>%2A">
                                            <?= $daftar['no_hp'] ?></a>
                                    </td>-->

                                        <td>
                                            <?php if ($daftar['status'] == 1) { ?>
                                                <button data-id="<?= $daftar['id_siswa'] ?>" class="aktif btn-sm btn btn-success">Diterima</i></button>




                                            <?php } else { ?>
                                                <button data-id="<?= $daftar['id_siswa'] ?>" class="tidakaktif btn-sm btn btn-danger">Pending</i></button>

                                            <?php } ?>
                                        </td>

                                        <td>
                                            <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=ubahsiswa&id=<?= enkripsi($daftar['id_siswa']) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit    "></i></a>
                                            <!-- Button trigger modal -->
                                            <iframe name='printdaftar<?= $daftar['nisn'] ?>' src='mod_siswa/print_daftar.php?id=<?= enkripsi($daftar['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-warning'><i class='fa fa-print'></i>Cetak Formulir</button>
                                            <iframe name='printdaftar_kartu<?= $daftar['nisn'] ?>' src='mod_siswa/print_daftar_kartu.php?id=<?= enkripsi($daftar['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar_kartu<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-secondary'><i class='fa fa-print'></i>Cetak Kartu</button>
                                            <iframe name='printdaftar_surat<?= $daftar['nisn'] ?>' src='mod_siswa/print_surat_pernyataan.php?id=<?= enkripsi($daftar['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar_surat<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-success'><i class='fa fa-print'></i>Cetak Surat Pernyataan</button>
                                        </td>

                                        <!-- Button trigger modal -->



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
    </div>


<?php } ?>
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
                url: "mod_siswa/crud_daftar.php?pg=hapusdaftarcheck",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
                            $.notify({
                                title: "Hapus Berhasil : ",
                                message: "Silahkan Lanjut Kerja...",
                                icon: 'fa fa-check'
                            }, {
                                type: "info"
                            });
                        })
                    }
                }
            });
            return false;
        })
    });
    //IMPORT FILE PENDUKUNG 
    $('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_siswa/crud_siswa.php?pg=import2',
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

                $('#importdata').modal('hide');
                iziToast.success({
                    title: 'Mantap!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<script>
    $('#form-tambah').submit(function(e) {
        var id = $(this).data('id');
        console.log(id);


        swal({
            title: "Sedang Memeriksa!!",
            text: "Proses Pendaftaran Memerlukan Waktu Kurang lebih 1 Menit. Mohon Menunggu Sampai Selesai",
            type: "warning",
            showCancelButton: false,
            showConfirmButton: false,

            cancelButtonText: "Tidak..Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'mod_siswa/crud_daftar.php?pg=tambah',
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


    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_siswa/crud_daftar.php?pg=tambah',
            data: $(this).serialize(),
            success: function(data) {

                swal({
                    title: 'Sukses !!',
                    text: 'Data  Berhasil disimpan',
                    type: 'success',
                });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
</script>
<script>
    $('#example').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'mod_siswa/crud_daftar.php?pg=hapus',
                    method: "POST",
                    data: 'id_daftar=' + id,
                    success: function(data) {
                        swal({
                            title: 'Sukses !!',
                            text: 'Data  Berhasil disimpan',
                            type: 'success',
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
</script>
<script>
    $('#example').on('click', '.aktif', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Pringatan !!!',
            text: 'Anda Akan Merubah Status Siswa',
            type: 'info',

            showCancelButton: true,
            confirmButtonText: "Yes, Rubah!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'mod_siswa/crud_daftar.php?pg=tidakaktif',

                    method: "POST",
                    data: 'id_siswa=' + id,
                    success: function(data) {
                        swal({
                            title: 'Sukses !!',
                            text: 'Data  Berhasil di rubah',
                            type: 'success',
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
</script>
<script>
    $('#example').on('click', '.tidakaktif', function() {
        var id = $(this).data('id');
        console.log(id);

        swal({
            title: "Are you sure?",
            text: 'Anda Akan Merubah Status Siswa?? ',

            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Konfirmasi!",
            cancelButtonText: "Batalkan",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: 'Mohon Tunggu !!!',
                    text: 'Perubahan membutuhkan Waktu 1 Menit. Mohon Bersabar !!.',
                    type: 'info',

                });
                $.ajax({
                    url: 'mod_siswa/crud_daftar.php?pg=aktif',
                    method: "POST",
                    data: 'id_siswa=' + id,
                    success: function(data) {
                        swal({
                            title: 'Sukses !!',
                            text: 'Data  Berhasil di rubah',
                            type: 'success',
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
</script>