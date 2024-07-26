<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="section-header">
    <form style="width: 80%">
        <input type="hidden" name="pg" value="bayar">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">

                    <select class="form-control select2" style="width: 100%" name="id" required>
                        <option value="">Cari Data Siswa</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT no_daftar,id_siswa,nama_siswa FROM siswa ");
                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?= enkripsi($siswa['id_siswa']) ?>"><?= $siswa['no_daftar'] ?> <?= $siswa['nama_siswa'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                &nbsp;<button type="submit" class="btn btn-primary btn-lg p-l-10"><i class="fa fa-search    "></i> Cari</button>
            </div>
        </div>
    </form>

</div>
<?php if (isset($_GET['id']) == '') { ?>
    <?php if ($user['akses'] == 'aika' or $user['akses'] == 'admin' or $user['level'] == 'admin') { ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Belum Verifikasi</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="example" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Kode</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Kegiatan</th>
                                    <th>Tgl</th>
                                    <th>verifikasi</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT berkas.*, siswa.nama_siswa 
                                FROM berkas 
                                INNER JOIN siswa ON berkas.id_siswa = siswa.id_siswa 
                                WHERE berkas.status = FALSE";
                                $result = mysqli_query($koneksi, $query);
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $count++ ?></td>
                                        <td><?= $row['kode'] ?></td>
                                        <td><?= $row['nama_siswa'] ?></td>
                                        <td><?= $row['laporan'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td class="btn btn-warning text-center" style="padding: 2px">Belum Dicek</td>
                                        <td>
                                            <?php if (!empty($row['file_laporan'])) : ?>
                                                <img src="../assets/upload/berkas/<?= $row['file_laporan'] ?>" alt="Foto Kegiatan" style="width: 40%">
                                            <?php else : ?>
                                                <span>Belum Upload</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button data-id="<?= $row['id'] ?>" data-pg="verifikasi_kegiatan" class="verifikasi btn btn-success btn-sm"><i class="fa fa-check-circle"></i></button>
                                            <button data-id="<?= $row['id'] ?>" data-pg="hapus_kegiatan" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Sudah Verifikasi</h4>
                        <!-- <div class="card-header-action">
                        <a class="btn btn-primary" href="mod_bayar/export_bayar.php" role="button"> Download Excel</a>
                    </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="table-2" style="font-size: 12px">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Kode</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kegiatan</th>
                                        <th>Tgl</th>
                                        <th>verifikasi</th>
                                        <th>Bukti</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query untuk mengambil data dari tabel berkas dan siswa dengan kondisi status true
                                    $query = "SELECT berkas.*, siswa.nama_siswa 
                  FROM berkas 
                  INNER JOIN siswa ON berkas.id_siswa = siswa.id_siswa 
                  WHERE berkas.status = TRUE";
                                    $result = mysqli_query($koneksi, $query);
                                    $count = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $count++ ?></td>
                                            <td><?= $row['id_siswa'] ?></td>
                                            <td><?= $row['nama_siswa'] ?></td>
                                            <td><?= $row['laporan'] ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td class="btn btn-success text-center" style="padding: 2px">Sudah Dicek</td>
                                            <td>
                                                <?php if (!empty($row['file_laporan'])) : ?>
                                                    <img src="../assets/upload/berkas/<?= $row['file_laporan'] ?>" alt="Foto Kegiatan" style="width: 40%">
                                                <?php else : ?>
                                                    <span>Belum Upload</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button data-id="<?= $row['id'] ?>" data-pg="tolak_kegiatan" class="tolak btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Tolak</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php } else { ?>
    <?php $siswa = fetch($koneksi, 'siswa', ['id_siswa' => dekripsi($_GET['id'])]) ?>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card author-box card-primary">
                <div class="card-header">
                    <h4><?= $siswa['nama_siswa'] ?></h4>
                    <div class="card-header-action">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">
                            <i class="fa fa-plus-circle    "></i> Tambah Bayar
                        </button>
                    </div>
                </div>
                <div class="card-body">


                    <!-- Modal -->
                    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="form-bayar">
                                    <div class="modal-body">
                                        <input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Pembayaran Rp.</label>
                                            <input type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl">Tanggal Pembayaran</label>
                                            <input type="date" class="form-control datepicker" name="tgl" id="tgl" placeholder="">
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
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="tablebayar" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Siswa</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tgl Bayar</th>
                                    <th>Petugas</th>
                                    <th>verifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from bayar a join siswa b ON a.id_siswa=b.id_siswa where a.id_siswa='$siswa[id_siswa]'");
                                $no = 0;
                                while ($bayar = mysqli_fetch_array($query)) {
                                    $user = fetch($koneksi, 'user', ['id_user' => $bayar['id_user']]);
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $bayar['id_bayar'] ?></td>
                                        <td><?= $bayar['nama_siswa'] ?></td>
                                        <td><?= "Rp " . number_format($bayar['jumlah'], 0, ",", ".") ?></td>
                                        <td><?= $bayar['tgl_bayar'] ?></td>
                                        <td><?php if ($user) {
                                                echo $user['nama_user'];
                                            } else {
                                                echo "Online";
                                            } ?></td>
                                        <td>
                                            <?php if ($bayar['verifikasi'] == 1) { ?>
                                                <span class="badge badge-success">Sudah Dicek</span>
                                            <?php } else { ?>
                                                <span class="badge badge-warning">Belum Dicek</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <iframe name='printdaftar<?= $bayar['id_bayar'] ?>' src='mod_bayar/print_kwitansi2.php?id=<?= enkripsi($bayar['id_bayar']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar<?= $bayar['id_bayar'] ?>'].print()" class='btn btn-sm btn-flat btn-info'><i class='fa fa-print'></i></button>

                                            <a target="_blank" href="mod_bayar/print_kwitansi.php?id=<?= enkripsi($bayar['id_bayar']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download    "></i></a>
                                            <button data-id="<?= $bayar['id_bayar'] ?>" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash    "></i></button>
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
    <script>
        var cleaveI = new Cleave('.uang', {
            numeral: true
        });
    </script>
<?php } ?>
<script>
    $('#form-bayar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_bayar/crud_bayar.php?pg=tambah',
            data: $(this).serialize(),
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {
                if (data == 'OK') {
                    $('#tambahdata').modal('hide');
                    swal({
                        title: 'Terimakasih',
                        text: 'Data Berhasil Di Tambahkan ',
                        type: 'success',
                        buttons: false,
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                } else {
                    swal({
                        title: 'Maaf',
                        text: 'Data Gagal Di Tambahkan ',
                        type: 'error',
                        buttons: false,
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
</script>

<script>
    $('#example').on('click', '.cek', function() {
        var id = $(this).data('id');
        console.log(id);

        swal({
            title: "Are you sure?",
            text: "Kamu akan Memverifikasi Pembayaran ini!",
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
                    url: 'mod_bayar/crud_bayar.php?pg=verifikasi',
                    method: "POST",
                    data: 'id_bayar=' + id,
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
    $('#example').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: "Are you sure?",
            text: "Kamu akan Memverifikasi Pembayaran ini!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Konfirmasi!",
            cancelButtonText: "Batalkan",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'mod_bayar/crud_bayar.php?pg=hapus',
                    method: "POST",
                    data: 'id_bayar=' + id,
                    success: function(data) {
                        swal({
                            title: 'Terimakasih',
                            text: 'Data Berhasil Di Hapus',
                            type: 'success',
                            buttons: false,
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
</script>

<script>
    $('#table-2').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            type: 'warning',
            buttons: true,
            dangerMode: true,
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'mod_bayar/crud_bayar.php?pg=hapus',
                    method: "POST",
                    data: 'id_bayar=' + id,
                    success: function(data) {
                        swal({
                            title: 'Sukses !!',
                            text: 'Data  Berhasil Hapus',
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
    $('#table-2').on('click', '.batal', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Konfirmasi!",
            cancelButtonText: "Batalkan",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'mod_bayar/crud_bayar.php?pg=batalverifikasi',
                    method: "POST",
                    data: 'id_bayar=' + id,
                    success: function(data) {
                        swal({
                            title: 'Terimakasih',
                            text: 'Data Berhasil Di Batalkan',
                            type: 'success',
                            buttons: false,
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
    $('#tablebayar').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            type: 'warning',
            buttons: true,
            dangerMode: true,
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'mod_bayar/crud_bayar.php?pg=hapus',
                    method: "POST",
                    data: 'id_bayar=' + id,
                    success: function(data) {
                        swal({
                            title: 'Sukses !!',
                            text: 'Data  Berhasil Hapus',
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
    $(document).ready(function() {
        $('#example').on('click', '.verifikasi', function() {
            var id = $(this).data('id');
            var pg = $(this).data('pg');
            console.log(id);
            swal({
                title: "Are you sure?",
                text: "Kamu akan Memverifikasi Kegiatan ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi!",
                cancelButtonText: "Batalkan",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: 'mod_bayar/crud_bayar.php?pg=verifikasi_kegiatan',
                        method: "POST",
                        data: {
                            pg: pg,
                            id: id,
                            status: 'true'
                        },
                        success: function(data) {
                            if (data.trim() == 'success') {
                                swal({
                                    title: 'Terimakasih',
                                    text: 'Data Berhasil Di Verifikasi',
                                    type: 'success',
                                    buttons: false,
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            } else {
                                swal({
                                    title: 'Gagal',
                                    text: 'Data Gagal di Verifikasi: ' + data,
                                    type: 'error',
                                    buttons: true,
                                });
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });
        $('#table-2').on('click', '.tolak', function() {
            var id = $(this).data('id');
            var pg = $(this).data('pg');
            console.log(id);
            swal({
                title: "Are you sure?",
                text: "Kamu akan Menolak Kegiatan ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi!",
                cancelButtonText: "Batalkan",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: 'mod_bayar/crud_bayar.php?pg=tolak_kegiatan',
                        method: "POST",
                        data: {
                            pg: pg,
                            id: id,
                            status: 'true'
                        },
                        success: function(data) {
                            if (data.trim() == 'success') {
                                swal({
                                    title: 'Terimakasih',
                                    text: 'Data Berhasil Di Verifikasi',
                                    type: 'success',
                                    buttons: false,
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            } else {
                                swal({
                                    title: 'Gagal',
                                    text: 'Data Gagal di Verifikasi: ' + data,
                                    type: 'error',
                                    buttons: true,
                                });
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });

        $('#example').on('click', '.hapus', function() {
            var id = $(this).data('id');
            var pg = $(this).data('pg');
            console.log(id);
            swal({
                title: "Are you sure?",
                text: "Kamu akan Menghapus Kegiatan ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi!",
                cancelButtonText: "Batalkan",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: 'mod_bayar/crud_bayar.php?pg=hapus_kegiatan',
                        method: "POST",
                        data: {
                            pg: pg,
                            id: id,
                            status: 'false'
                        },
                        success: function(data) {
                            if (data.trim() == 'success') {
                                swal({
                                    title: 'Terimakasih',
                                    text: 'Data Berhasil Di Hapus',
                                    type: 'success',
                                    buttons: false,
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            } else {
                                swal({
                                    title: 'Gagal',
                                    text: 'Data Gagal di Hapus: ' + data,
                                    type: 'error',
                                    buttons: true,
                                });
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });
    });
</script>