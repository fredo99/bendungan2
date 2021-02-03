        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Pengaturan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>pages">Home</a></li>
                                <li class="breadcrumb-item active">Pengaturan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fa fa-tint"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Terbuka</span>
                                <span class="info-box-number"><?= $terbuka ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="fa fa-tint"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tertutup</span>
                                <span class="info-box-number"><?= $tertutup ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Pengaturan Ketinggian</h3>
                                        </div>
                                        <div class="card-body">
                                        <?= $this->session->flashdata('ubahTerbuka'); ?>
                                            <div class="row">
                                            <div class="col-6">
                                                <h3>Terbuka</h3>
                                                <form method="POST" action="<?= base_url(); ?>pengaturan/ubahTerbuka">
                                                    <input type="number" name="ketinggianterbuka" class="form-control" placeholder="Silahkan diisi" min="0" max="100">
                                                <div class="small-box-footer mt-2">
                                                    <button class="btn btn-info" type="submit" >Ubah</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- <div class="col-4">
                                                <h3>Terbuka Sebagian</h3>
                                                <form method="POST" action="<?= base_url(); ?>pengaturan/ubahTerbukasebagian">
                                                <input type="number" name="ketinggianterbukasebagian" class="form-control" placeholder="Silahkan diisi" min="0" max="100">
                                                <div class="small-box-footer mt-2">
                                                    <button class="btn btn-info" type="submit">Ubah</button>
                                                </div>
                                                </form>
                                            </div> -->
                                            <div class="col-6">
                                                <h3>Tertutup</h3>
                                                <?= $this->session->flashdata('ubahTertutup'); ?>
                                                <form method="POST" action="<?= base_url(); ?>pengaturan/ubahTertutup">
                                                    <input type="number" name="ketinggiantertutup" class="form-control" placeholder="Silahkan diisi" min="0" max="100">
                                                <div class="small-box-footer mt-2">
                                                    <button class="btn btn-info" type="submit">Ubah</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        </div>
                                        <!-- /.card --> 
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                <!-- /.row -->
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="otomatisasipintu">
                             <div class="card card-warning">
                                <div class="card-header">
                                            <h3 class="card-title">Pengaturan Pintu</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-3">
                                                <h3>Terbuka</h3>
                                                <input type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light">
                                            </div>
                                            <div class="col-4">
                                                <h3>Terbuka Sebagian</h3>
                                                <input type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light">
                                            </div>
                                            <div class="col-5">
                                                <h3>Tertutup</h3>
                                                <input type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light">
                                            </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <!-- </div> -->
                                        <!-- /.card --> 
                                <!-- </div> -->
                                <!-- /.card -->
                            <!-- </div> -->
                        <!-- </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Pengaturan Otomatisasi</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <form method="POST" action="">
                                                    <select class="form-control" name="otomatisasi" id="otomatisasi" onchange="ubahOtomatisasi(this.value)">
                                                        <option value="2" >--Pilih--</option>
                                                        <option value="0">Manual</option>
                                                        <option value="1">otomatis</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                            <div class="row" id="otomatisasipintu" style="display: none;">
                                                <div class="col-md-4">
                                                    <h3>Terbuka</h3>
                                                    <input type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light">
                                                </div>
                                                <div class="col-md-4">
                                                    <h3>Terbuka Sebagian</h3>
                                                    <input type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light">
                                                </div>
                                                <div class="col-md-4">
                                                    <h3>Tertutup</h3>
                                                    <input type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light">
                                                </div>
                                            <!-- </div> -->
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- load footer -->
    <?php $this->load->view('templates/footer') ?>
    <!-- load script -->
    <?php $this->load->view('templates/script') ?>
    <script>
        function ubahOtomatisasi(value) {
            console.log(value);
            if (value == 0){
                document.getElementById("otomatisasipintu").style.display = "";
            }else{
                document.getElementById("otomatisasipintu").style.display = "none";
            }
        
        // document.getElementById("simpan_kelembaban").style.display = "block";
    }

    function simpan_kelembaban() {
        var status = document.getElementById("otomatiasi").value;
        $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>pengaturan/ubahOtomatisasi",
        data: {
            status: status
        },
        dataType: "json",
        success: function(response) {
            console.log(response);
            document.getElementById("ukur_kelembaban").innerHTML = status;
            document.getElementById("otomatisasipintu").style.display = "none";
            Swal.fire(
            'Selamat',
            'Otomatisasi berhasi diubah',
            'success'
            )
        }
        });
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>