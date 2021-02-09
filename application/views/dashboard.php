        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>pages">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content" id="dashboard">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>PINTU</h3>
                                    <span id="status_pintu"></span>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-options"></i>
                                </div>
                                <!-- Default switch -->
                                <div class="custom-control custom-switch small-box-footer">
                                    <!-- <input type="checkbox" class="custom-control-input" id="customSwitches">
                                    <label class="custom-control-label" for="customSwitches">BUKA/TUTUP</label> -->
                                </div>
                            </div>
                        </div>           
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>STATUS WATER LEVEL</h3>
                                    <span id="status_ketinggian"></span>
                                </div>
                                 <div class="icon">
                                    <i class="ion ion-connection-bars"></i>
                                </div>
                                <div class="custom-control custom-switch small-box-footer"></div>
                            </div>           
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-4 mb-3">
                            <input id="toggle-one" checked type="checkbox">
                            <input id="toggle-two" checked type="checkbox">
                            <input id="toggle-three" checked type="checkbox">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Ketinggian Air</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Ketinggian</th>
                                                    <th>Tanggal</th>
                                                    <th>Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_sensor">
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- LINE CHART -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Water Level Chart</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="canvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            tampil_water_level();

            // $('#tbl_sensor').dataTable();

            function tampil_water_level(){
                $.ajax({
                    type : 'GET',
                    url     : '<?php echo base_url();?>Dashboard/tampildata',
                    dataType    : 'JSON',
                    async   : true,
                    success : function(data){          
                        var html =''; 
                        var i;
                        var no=0;
                        for(i=0; i<data.length; i++){
                            no++;
                            html = html +'<tr>'
                                    +'<td>'+no+'</td>'
                                    +'<td>'+ data[i].ketinggian+' cm</td>'
                                    +'<td>'+ data[i].tanggal+'</td>'
                                    +'<td>'+data[i].waktu;+'</td>'
                                    +'</tr>';
                        }
                        $("#tbl_sensor").html(html);
                },
                complete    : function () {
                    setTimeout(tampil_water_level,1000);
                }
                });
            }
        })
    </script>
    <script>
    $(document).ready(function () {
        setInterval(function(){
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */
        
            $.ajax({
            type        : 'GET',
            url         : '<?php echo base_url();?>Dashboard/dataChart',
            dataType    : 'JSON',
            async       : true,
            success     : function(data) {
                // console.log([data[8].ketinggian]);
                        var i;
                        var labels = [];
                        var datatabel = [];
                        for(i=0; i < data.length; i++){
                            datatabel.push(data[i].ketinggian);
                            labels.push(data[i].waktu);
                        }

            var areaChartData = {
                labels:labels,
                datasets: [{
                        label: 'Water Level',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: true,
                        pointColor: '#FF0000',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: datatabel,
                        }]
                    }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true,
                        }
                    }]
                }
            }
        

                //-------------
                //- LINE CHART -
                //--------------
                var lineChartCanvas = $('#canvas').get(0).getContext('2d')
                var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
                var lineChartData = jQuery.extend(true, {}, areaChartData)
                lineChartData.datasets[0].fill = false;
                lineChartOptions.datasetFill = true

                var lineChart = new Chart(lineChartCanvas, {
                    type: 'line',
                    data: lineChartData,
                    options: lineChartOptions
                });
            },
            });
        }, 1000);
    });
    </script>
    <script>
        
        var status_ketinggian = document.getElementById("status_ketinggian");
        var status_pintu = document.getElementById("status_pintu");
        $(document).ready(function(){
        setInterval(function(){
            $.ajax({
                url:"<?php echo base_url();?>Dashboard/status_pintu",
                dataType : 'json',
                success:function(data){
                    status_pintu.innerHTML = "";
                    $.each(data, function(key,val){
                        if(val.status == 1){
                            status_pintu.innerHTML = "<p class='badge badge-danger'>TERBUKA</p>";
                        }else if(val.status == 2){
                            status_pintu.innerHTML = "<p class='badge badge-info'>TERBUKA 1/2</p>";
                        }else if(val.status == 0){
                            status_pintu.innerHTML = "<p class='badge badge-success'>Tertutup</p>";
                        }
                    });
                }
            });

            $.ajax({
                url:"<?php echo base_url();?>Dashboard/status_ketinggian",
                dataType : 'json',
                success:function(data){
                    status_ketinggian.innerHTML = "";
                    if(data == false){
                        status_ketinggian.innerHTML = "<p id='statusWater' class='badge badge-secondary'>BELUM ADA DATA MASUK</p>";
                    }else{ 
                        if(parseFloat(data[2]) <= parseFloat(data[1])){
                            status_ketinggian.innerHTML = "<p id='statusWater' class='badge badge-success'>Aman</p>";
                        }

                        if(parseFloat(data[2]) > parseFloat(data[1]) && parseFloat(data[2]) < parseFloat(data[0])){
                            status_ketinggian.innerHTML = "<p id='statusWater' class='badge badge-warning'>Hati-Hati</p>";
                        }

                        if(parseFloat(data[2]) >= parseFloat(data[0])){
                            status_ketinggian.innerHTML = "<p id='statusWater' class='badge badge-danger'>Bahaya</p>";
                        }
                    }
                }
            });
        }, 1000);
    });
    
    </script>
    </body>
</html>
       
