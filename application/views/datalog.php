        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data Log</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>pages">Home</a></li>
                                <li class="breadcrumb-item active">Data Log</li>
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
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                    <input type="text" name="start_date" class="form-control" id="start_date" value="<?= set_value('start_date'); ?>" placeholder="Start Date" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                    <input type="text" name="start_date" class="form-control" id="end_date" value="<?= set_value('end_date'); ?>" placeholder="End Date" readonly>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button id="filter" type="submit" class="btn btn-outline-info btn-sm" name="filter">Filter</button>
                        <button id="reset" type="submit" class="btn btn-outline-warning btn-sm" name="reset">Reset</button>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="card card-info">
                                <div class="card-header">Tabel Data Log</div>
                                <!-- /.card-header -->
                                <!-- <button class="card-tittle">tt</button> -->
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datalog" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Waktu</th>
                                                    <th>Ketinggian</th>
                                                    <th>Jenis Operasi</th>
                                                    <th>Posisi Pintu</th>
                                                    <th>Pemicu</th>
                                                    <th>Treshold Terbuka</th>
                                                    <th>Treshold Tertutup</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- load footer -->
        <?php $this->load->view('templates/footer') ?>
        <!-- load script -->
        <?php $this->load->view('templates/script') ?>
    <script>
        $(function() {
            $( "#start_date" ).datepicker({
                "dateFormat" : "yy-mm-dd"
            });
            $( "#end_date" ).datepicker({
                "dateFormat" : "yy-mm-dd"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
        $("#start_date").on("change", function() {
        $("#end_date").attr("min", $(this).val());
        });
        $("#end_date").on("change", function() {
        $("#start_date").attr("max", $(this).val());
        });
    });
        function fetch(start_date, end_date){
            var h=1;
            $.ajax({
                url: "<?php echo base_url();?>datalog/ambilDatatanggal",
                type: "POST",
                data:{
                    start_date : start_date,
                    end_date : end_date
                },
                dataType:"JSON",
                success: function(data){
                    // console.log(start_date);
                    // console.log(end_date);
                    
                    $('#datalog').DataTable({
                        // "data": data,
                        "lengthChange": true,
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "buttons": [
                            'csv', 'excel', 'pdf'
                        ],
                        "data": data,
                        "responsive" : true,
                        "columns": [{
                                    "data" : "nomor",
                                    "render": function ( data, type, row, meta ) {
                                    return h++;
                                },
                            },
                            {
                                "data" : "tanggal",
                                "render": function ( data, type, row, meta ) {
                                    return `${row.tanggal}`;
                                },
                            },
                            {
                                "data" : "waktu",
                                "render": function ( data, type, row, meta ) {
                                    return `${row.waktu}`;
                                },
                            },
                            {
                                "data" : "ketinggian",
                                "render": function ( data, type, row, meta ) {
                                    return `${row.ketinggianair}cm`;
                                },
                            },
                            {
                                "data" : "jenisoperasi",
                                "render": function ( data, type, row, meta ) {
                                    for(i=0; i<data.length; i++){
                                        var jenisoperasi = '';
                                    if( `${row.jenisoperasi}` == 1){
                                        jenisoperasi ='Otomatis';
                                    }else if( `${row.jenisoperasi}` == 0){
                                        jenisoperasi ='Manual';
                                    }
                                };
                                    return jenisoperasi;
                                },
                            },
                            {
                                "data" : "posisipintu",
                                "render": function ( data, type, row, meta ) {
                                    for(i=0; i<data.length; i++){
                                        var posisipintu = '';
                                    if( `${row.posisipintu}` == 1){
                                        posisipintu ='Terbuka';
                                    }else if( `${row.posisipintu}` == 2){
                                        posisipintu ='Terbuka Sebagian';
                                    }else if( `${row.posisipintu}` == 0){
                                        posisipintu ='Tertutup';
                                    }
                                };
                                    return posisipintu;
                                },
                            },
                            {
                                "data" : "pemicu",
                                "render": function ( data, type, row, meta ) {
                                    var pemicu = '';
                                    if( `${row.pemicu}` == 1){
                                        pemicu ='Sensor';
                                    }else if( `${row.pemicu}` == 0){
                                        pemicu ='Pengguna';
                                    }
                                    return pemicu;
                                },
                            },
                            {
                                "data" : "Terbuka",
                                "render": function ( data, type, row, meta ) {
                                    // for(i=0; i<data.length; i++){
                                        var terbuka = '';
                                        if(`${row.terbuka}` === null){
                                            terbuka ='-';
                                        }else{
                                            terbuka = `${row.terbuka}`;
                                        }
                                    // };        
                                    return terbuka;
                                },
                            },
                            {
                                "data" : "Tertutup",
                                "render": function ( data, type, row, meta ) {
                                    // for(i=0; i<data.length; i++){
                                    var tertutup = '';
                                        if(`${row.tertutup}` === null){
                                            tertutup ='-';
                                        }else{
                                            tertutup = `${row.tertutup}`;
                                        }
                                    // };
                                    return tertutup;
                                },
                            },
                        ]
                    });
                    i=1;
                    //location.reload();
                }
            });
        }
        // console.log(data);
        fetch();

        // Filter

    $(document).on("click", "#filter", function(e) {
        e.preventDefault();

        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        if (start_date == "" || end_date == "") {
            alert("Tolong isi keduanya");
        } else {
            $('#ketinggian_air').DataTable().destroy();
            fetch(start_date, end_date);
        }
    });

    // Reset

    $(document).on("click", "#reset", function(e) {
        e.preventDefault();

        $("#start_date").val(''); // empty value
        $("#end_date").val('');

        $('#ketinggian_air').DataTable().destroy();
        fetch();
    });
    </script>
    </body>
</html>