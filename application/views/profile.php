        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>pages">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?= $user->nama; ?></h3>

                                    <p class="text-muted text-center"><?= $user->jabatan; ?></p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Bendungan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi</strong>

                                    <p class="text-muted">Bendungan Banjir Kanal Barat</p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Keterangan</strong>

                                    <p class="text-muted">Terdapat 1 pintu bendungan yang dapat dilakukan pengaturan pada ketinggian air serta pintu dibuka secara manual melalui Website ini.</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Profil</h3>
                                </div>
                                <div class="card-body">
                                    <?= $this->session->flashdata('ubahprofil'); ?>
                                    <form class="form-horizontal" method="POST" id="profile" action="<?= base_url() . 'profile/ubahProfil'; ?>">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" value="<?= $user->nama; ?>"disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="<?= $user->email; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $user->alamat; ?>"disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenkel" id="jenkel" disabled>
                                                    <option value="" >--Jenis kelamin--</option>
                                                    <option value="1" <?php if($user->jenkel == 1) echo 'selected';?>>Laki-laki</option>;
                                                    <option value="1" <?php if($user->jenkel == 2) echo 'selected';?>>Perempuan</option>;
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">No Handphone</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="nomor" name="nomor" placeholder="No telp" value="<?= $user->no; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="button" id="close-edit-profile" class="btn btn-danger">Tutup</button>
                                                <button type="submit" id="edit-profile" data-btn="edit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ubah Kata Sandi</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="POST" id="ubah-password" action="<?= base_url() . 'profile/ubahPassword'; ?>">
                                    <?= $this->session->flashdata('password'); ?>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Kata Sandi Lama</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="Katasandi lama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputpassword" class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="Katasandi Baru" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <!-- <button type="button" id="close-ubah-password" class="btn btn-danger">Tutup</button> -->
                                                <button type="submit" data-btn="edit" id="tombol-ubah" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- load footer -->
    <?php $this->load->view('templates/footer') ?>
    <!-- load script -->
    <?php $this->load->view('templates/script') ?>
    <script>
        $(document).ready(function () {
            $("#edit-profile").click(function(e) {
                if ($(this).data("btn") == "edit") {
                    e.preventDefault();
                    $(this).val("Simpan Profil");
                    $(this).removeClass("btn-primary");
                    $(this).addClass("btn-success");
                    $("#profile #nama").removeAttr("disabled");
                    $("#profile #alamat").removeAttr("disabled");
                    $("#profile #jenkel").removeAttr("disabled");
                    $("#profile #nomor").removeAttr("disabled");
                    $(this).data("btn", "save");
                }
            });

            $("#close-edit-profile").click(function() {
                $("#edit-profile").val("Ubah Profil");
                $("#edit-profile").removeClass("btn-success");
                $("#edit-profile").addClass("btn-primary");
                $("#edit-profile").data("btn", "edit");
                $("#profile #nama").attr("disabled", true);
                $("#profile #alamat").attr("disabled", true);
                $("#profile #jenkel").attr("disabled", true);
                $("#profile #nomor").attr("disabled", true);
            });
        })
        // $("#tombol-ubah").click(function(e) {
        //             if ($(this).data("btn") == "edit") {
        //                 e.preventDefault();
        //                 $(this).val("Simpan Password");
        //                 $(this).removeClass("btn-primary");
        //                 $(this).addClass("btn-success");
        //                 $("#ubah-password #passwordlama").removeAttr("disabled");
        //                 $("#ubah-password #passwordbaru").removeAttr("disabled");
        //                 $(this).data("btn", "save");
        //             }
        //         });

        //     $("#close-ubah-password").click(function() {
        //         $("#tombol-ubah").val("Ubah Password");
        //         $("#tombol-ubah").removeClass("btn-success");
        //         $("#tombol-ubah").addClass("btn-primary");
        //         $("#tombol-ubah").data("btn", "edit");
        //         $("#ubah-password #passwordlama").attr("disabled", true);
        //         $("#ubah-password #passwordbaru").attr("disabled", true);
        // });
    </script>
    </body>
</html>
