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
                                        <?= $this->session->unset_userdata('ubahTerbuka');?>
                                        <?= $this->session->flashdata('ubahTertutup'); ?>
                                        <?= $this->session->unset_userdata('ubahTertutup');?>
                                        <div class="row">
                                            <div class="col-6">
                                                <h3>Terbuka</h3>
                                                <form method="POST" action="<?= base_url(); ?>pengaturan/ubahTerbuka">
                                                    <input type="number" name="ketinggianterbuka" class="form-control"
                                                        placeholder="Silahkan diisi" min="0" max="100" required>
                                                    <div class="small-box-footer mt-2">
                                                        <button class="btn btn-info" type="submit">Ubah</button>
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
                                                <form method="POST" action="<?= base_url(); ?>pengaturan/ubahTertutup">
                                                    <input type="number" name="ketinggiantertutup" class="form-control"
                                                        placeholder="Silahkan diisi" min="0" max="100" required>
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
                                                    <select class="form-control" name="otomatisasi" id="otomatisasi"
                                                        onchange="ubahOtomatisasi(this.value)"
                                                        onclick="ubahStatusotomatisasi(this.value)">
                                                        <option value="">--Pilih--</option>
                                                        <option value="0">Manual</option>
                                                        <option value="1">otomatis</option>
                                                        <!-- <?php if ($otomatisasi['status'] == 0) { echo "selected=\"selected\""; } ?>? -->
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row" id="otomatisasipintu" style="display: none;">
                                            <div class="col-md-4">
                                                <h3>Terbuka</h3>
                                                <input class="btn btn-success" onclick="ubahStatus(1)" id="terbuka"
                                                    value="ON"></input>
                                                <!-- <input type="checkbox" checked class="terbuka" data-toggle="toggle" id="terbukadong" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light" onclick = "ubahStatus()"> -->
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Terbuka Sebagian</h3>
                                                <input class="btn btn-success" onclick="ubahStatus(2)"
                                                    id="terbuka_sebagian" value="ON"></input>
                                                <!-- <input type="checkbox" checked class="terbuka_sebagian" data-toggle="toggle" id="terbuka_sebagian" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light" onclick = "ubahStatus()"> -->
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Tertutup</h3>
                                                <input class="btn btn-success" onclick="ubahStatus(0)" id="tertutup"
                                                    value="ON"></input>
                                                <!-- <input type="checkbox" checked class="tertutup" data-toggle="toggle" id="tertutup" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="light" onclick = "ubahStatus()"> -->
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
    if (value == 0) {
        document.getElementById("otomatisasipintu").style.display = "";
    } else {
        document.getElementById("otomatisasipintu").style.display = "none";
    }
}

setInterval(function() {
    $.ajax({
        url: "<?php echo base_url(); ?>Pengaturan/ambilDataPintu",
        dataType: 'json',
        success: function(data) {
            //console.log(data);
            if (data == 0) { //tertutup
                document.getElementById("tertutup").disabled = true;
                document.getElementById("tertutup").className = "btn btn-success";
                document.getElementById("tertutup").value = "ON";
                document.getElementById("terbuka").disabled = false;
                document.getElementById("terbuka").className = "btn btn-secondary";
                document.getElementById("terbuka").value = "OFF";
                document.getElementById("terbuka_sebagian").disabled = false;
                document.getElementById("terbuka_sebagian").className = "btn btn-secondary";
                document.getElementById("terbuka_sebagian").value = "OFF";
            } else if (data == 1) { // terbuka
                document.getElementById("tertutup").disabled = false;
                document.getElementById("tertutup").className = "btn btn-secondary";
                document.getElementById("tertutup").value = "OFF";
                document.getElementById("terbuka").disabled = true;
                document.getElementById("terbuka").className = "btn btn-success";
                document.getElementById("terbuka").value = "ON";
                document.getElementById("terbuka_sebagian").disabled = false;
                document.getElementById("terbuka_sebagian").className = "btn btn-secondary";
                document.getElementById("terbuka_sebagian").value = "OFF";
            } else if (data == 2) { //terbuka_sebagian
                document.getElementById("tertutup").disabled = false;
                document.getElementById("tertutup").className = "btn btn-secondary";
                document.getElementById("tertutup").value = "OFF";
                document.getElementById("terbuka").disabled = false;
                document.getElementById("terbuka").className = "btn btn-secondary";
                document.getElementById("terbuka").value = "OFF";
                document.getElementById("terbuka_sebagian").disabled = true;
                document.getElementById("terbuka_sebagian").className = "btn btn-success";
                document.getElementById("terbuka_sebagian").value = "ON";
            }
        }
    });
}, 1000);
        </script>

        <script>
function ubahStatus(value) {
    var status1 = value;
    $.ajax({
        url: "<?php echo base_url(); ?>Pengaturan/ubahStatusPintu",
        type: "POST",
        data: {
            status: status1
        },
        dataType: 'json',
        success: function(data) {}
    });
}
        </script>
        <script>
function ubahStatusotomatisasi(value) {
    var status = value
    $.ajax({
        url: "<?php echo base_url(); ?>Pengaturan/ubahOtomatisasi",
        type: "POST",
        data: {
            status: value
        },
        dataType: 'json',
        success: function(data) {
            console.log(value);
        }
    });
}
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>