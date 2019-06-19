<?php
class Layout
{
    public static function Header($judul)
    {
        return '
        <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>'.$judul.'</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      
      
        <!-- Google Font -->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      </head>';
    }

    public static function Footer()
    {
        if (!isset($_COOKIE['hello'])) {
            $content = "Swal.fire({
                title: 'Welcome!',
                text: '50 Data Google Scholar in University of Indonesia',
                type: '',
                confirmButtonText: 'Yeay!'
              })";
            setcookie('hello', '1', time() + 60 * 60, '/', null, null, null);
        } else {
            $content = "";
        }
        if (isset($_COOKIE['notif'])) {
            $content1 = $_COOKIE['notif'];
        } else {
            $content1 = ' ';
        }
        $script = "<script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>";
        return '
        <script>' . $content . ' ' . $content1 . '</script>
      
        <!-- jQuery 3 -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        '.$script.'
        <!-- Bootstrap 3.3.7 -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="bower_components/raphael/raphael.min.js"></script>
        <script src="bower_components/morris.js/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="bower_components/moment/min/moment.min.js"></script>
        <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        ';
    }
    public static function Message($msg, $judul, $type, $tombol)
    {
        if ($msg != '') {
            if ($type == 1) {
                $msg = "
                Swal.fire({
                    title: '" . $judul . "',
                    animation: false,
                    type: 'success',
                    html: '" . $msg . "',
                    showCloseButton: true,
                    confirmButtonText:'" . $tombol . "',
                    customClass: {
                        popup: 'animated tada'
                    }
                })
                ";
            } else if ($type == 2) {
                $msg = "
                Swal.fire({
                    title: '" . $judul . "',
                    animation: false,
                    type: 'warning',
                    html: '" . $msg . "',
                    showCloseButton: true,
                    confirmButtonText:'" . $tombol . "',
                    customClass: {
                        popup: 'animated tada'
                    }
                })
                ";
            } else if ($type == 3) {
                $msg = "
                    Swal.fire({
                        title: '" . $judul . "',
                        animation: false,
                        type: 'error',
                        html: '" . $msg . "',
                        showCloseButton: true,
                        confirmButtonText:'" . $tombol . "',
                        customClass: {
                          popup: 'animated tada'
                        }
                    })
                ";
            }
        } else {
            return  '';
        }
        return '<script> ' . $msg  . '</script>';
    }
    public static function Page($judul, $msg, $judul_notif, $type, $tombol, $isi)
    {
        return '
       

        <!DOCTYPE html>
        <html>
        ' . self::Header($judul) . '
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
          <header class="main-header">
          ' . self::Navbar() . '
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
          ' . self::Sidebar() . '
          </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            ' . self::Message($msg, $judul_notif, $type, $tombol) . '
            ' . $isi . '
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
              <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
              </div>
              <strong>Copyright &copy; 2019 Akbar Nima Gita.</strong> All rights
              reserved.
            </footer>
          
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        ' . self::Footer() . '
        </body>
        </html>
        ';
    }
    public static function Sidebar()
    {
        return '
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="./index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                    <span class="pull-right-container">
                   
                  </span>
                    </a>
                    <ul class="treeview-menu">
                    <li><a href="./index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    </ul>
                </li> 
                <li class="treeview">
                <a href="#">
                  <i class="fa fa-group"></i> <span>Cluster</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="./cluster.php?gol=3"><i class="fa fa-circle-o"></i>Cluster 3</a></li>
                  <li><a href="./cluster.php?gol=2"><i class="fa fa-circle-o"></i>Cluster 2</a></li>
                  <li><a href="./cluster.php?gol=1"><i class="fa fa-circle-o"></i>Cluster 1</a></li>
                  <li><a href="./cluster.php"><i class="fa fa-circle-o"></i>Semua</a></li>
                </ul>
              </li>
            </ul>
        </nav>
       
        ';
    }
    public static function Navbar()
    {
        return '
        <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>UGM</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Civitas</b>UGM</span>
      </a>
      <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
           
            <ul class="dropdown-menu">
              <!-- User image -->
              
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
      </nav>
        ';
    }
    public static function IndexHTML()
    {
        $query = "SELECT * FROM user ";
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == "name") {
                $query .= "ORDER BY name ASC";
            } elseif ($sort == "affiliation") {
                $query .= "ORDER BY affiliation ASC";
            } elseif ($sort == "total_cites") {
                $query .= "ORDER BY total_cites ASC";
            } elseif ($sort == "h_index") {
                $query .= "ORDER BY h_index ASC";
            } elseif ($sort == "i10_index") {
                $query .= "ORDER BY i10_index ASC";
            } elseif ($sort == "fields") {
                $query .= "ORDER BY fields ASC";
            }
        } else {
            $query .= "ORDER BY total_cites DESC";
        }

        $datauser = DB::query($query);
        $renderer = '';
        $iterasi = 1;
        foreach ($datauser as $i) {
            if ($i['homepage'] == NULL) {
                $home = '';
            } else {
                $home = '<a href="' . $i['homepage'] . '">' . substr($i['homepage'], 7) . '</a>';
            }
            $renderer .= '
            <tr>
            <td>' . $iterasi . '</td>
            <td> <img src="https://scholar.google.co.id/citations?view_op=small_photo&user=' . $i['id'] . '&citpid=1" alt="foto google scholar" /></td>
            <td><a href="./user.php?id=' . $i['id'] . '" class="text-black"> &nbsp ' . $i['name'] . '</a></td>
            <td>' . setLimitString($i['affiliation']) . '</td>
            <td>' . $i['total_cites'] . '</td>
            <td>' . $i['h_index'] . ' </td>
            <td>' . $i['i10_index'] . ' </td>
            <td>' . substr($i['fields'], 17) . ' </td>
            <td>' . $home . ' </td>
            </tr>

            ';
            $iterasi++;
        }
        $civitas = count(DB::query('SELECT * FROM user'));
        $publikasi = count(DB::query('SELECT * FROM publikasi'));
        $sitasi = DB::query("SELECT SUM(total_cites) FROM user")[0][0];
        $avgh_index = DB::query('SELECT AVG(h_index) FROM user')[0][0];
        $content = '
        <section class="content">
        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-clone"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Sitasi</span>
            <span class="info-box-number">'.$sitasi.'</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="fa fa-stack-overflow"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Publikasi</span>
            <span class="info-box-number">'.$publikasi.'</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
          <span class="info-box-icon "><i class="fa fa-group"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Civitas Terdaftar</span>
            <span class="info-box-number">'.$civitas.'</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
          <span class="info-box-icon "><i class="fa fa-level-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">H Index rata-rata</span>
            <span class="info-box-number">'.$avgh_index.'</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                    <div class="box box-primary">
                        <div class="box-header bg-aqua">
                            Cluster Civitas
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div> 
                        </div>       
                        <div class="box-body p-4">
                        '.self::Klaster().'
                        </div>
                    </div>
 
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
            <div class="box box-primary">
                   
                <div class="box-header bg-aqua">
                    Tren Publikasi
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="box-body">
                        
                    
                                '.self::Diagram('all').'
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header bg-aqua">
            Civitas Teregistrasi
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
                 <div class="table-responsive">    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th></th>
                                <th>Affiliation</th>
                                <th>Total Cites</th>
                                <th>H</th>
                                <th>i10</th>
                                <th>fields</th>
                                <th>Homepage</th>
                                    
                            </tr>
                        </thead>
                        <tbody>

                            ' . $renderer . '
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        </section>';
        //} else { }

        return $content;
    }
    public static function Pencarian($pencarian)
    {
        $datauser = DB::query('SELECT * FROM user WHERE name LIKE :name LIMIT 500', array(':name' => '%' . $pencarian . '%'));
        $datapublikasi = DB::query('SELECT * FROM publikasi WHERE title LIKE :name LIMIT 500', array(':name' => '%' . $pencarian . '%'));
        $renderuser = '';
        $renderpublikasi = '';
        if (count($datauser) >= 1) {
            $iterasi = 1;
            foreach ($datauser as $i) {
                if ($i['homepage'] == NULL) {
                    $home = '';
                } else {
                    $home = '<a href="' . $i['homepage'] . '">' . substr($i['homepage'], 7) . '</a>';
                }
                $renderuser .= '
                <tr>
                <td>' . $iterasi . '</td>
                <td><a href="./user.php?id=' . $i['id'] . '" class="text-black"> <img src="https://scholar.google.co.id/citations?view_op=small_photo&user=' . $i['id'] . '&citpid=1" alt="foto google scholar" /> &nbsp ' . $i['name'] . '</a></td>
                <td>' . setLimitString($i['affiliation']) . '</td>
                <td>' . $i['total_cites'] . '</td>
                <td>' . $i['h_index'] . ' </td>
                <td>' . $i['i10_index'] . ' </td>
                <td>' . substr($i['fields'], 17) . ' </td>
                <td>' . $home . ' </td>
                </tr>
    
                ';
                $iterasi++;
            }
            $renderuser = '
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                Hasil pencarian civitas dengan kata kunci "' . $pencarian . '" dengan hasil ' . count($datauser) . '
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                
                                <th>No</th>
                                <th>Nama</th>
                                <th>Affiliation</th>
                                <th>Total Cites</th>
                                <th>H</th>
                                <th>i10</th>
                                <th>fields</th>
                                <th>Homepage</th>
                                </tr>
                            </thead>
                            <tbody>
                            ' . $renderuser . '
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        if (count($datapublikasi) >= 1) {
            $iterasi = 1;
            foreach ($datapublikasi as $i) {
                if($i['year']=='0'){
                    $tahun= 'Tidak Bertahun';
                }else{
                    $tahun= $i['year'];     
                }
                $author = '<a href="./user.php?id=' . $i['id'] . '">' . DB::query('SELECT * FROM user WHERE id = :id', array(':id' => $i['id']))[0]['name'] . '</a>';
                $renderpublikasi .= "<tr><td>" . $iterasi . "</td><td>" . setLimitString($i['title'], 50) . "</td><td>" . $author . "</td><td>" . $i['cites'] . "</td><td>" . $tahun . "</td></tr>";
                $iterasi++;
            }
            $renderpublikasi = '
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                Hasil pencarian publikasi dengan kata kunci "' . $pencarian . '" dengan hasil ' . count($datapublikasi) . '
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Jumlah Dikutip</th>
                                <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                            ' . $renderpublikasi . '
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        return '
            <div  class= "row">
                ' . $renderuser . '
                ' . $renderpublikasi  . '
            </div>';
    }
    public static function Diagram($iduser){
        if($iduser=='all'){
            $datatahunpublikasi  = DB::query('SELECT DISTINCT year FROM publikasi ORDER BY year ASC');
        }else{
            $datatahunpublikasi  = DB::query('SELECT DISTINCT year FROM publikasi WHERE id = :id ORDER BY year ASC',array(':id'=>$iduser));
        }
        $year = "";
        $jumlah = "";
        $warna = "";
        $jumlahdata = count($datatahunpublikasi);
        if($jumlahdata > 0){
            $hijau = 255;
            $peningkatan = 255 / $jumlahdata ;
            $jumlahpublikasi = 0;
            for($i = 0 ; $i < $jumlahdata ;$i++){
                if($iduser=='all'){
                    $jumlahpublikasipertahun = DB::query('SELECT count(id) FROM publikasi WHERE year = :year', array(':year'=>$datatahunpublikasi[$i][0]))[0][0];
                }else{
                    $jumlahpublikasipertahun = DB::query('SELECT count(id) FROM publikasi WHERE year = :year AND id = :id', array(':id'=>$iduser,':year'=>$datatahunpublikasi[$i][0]))[0][0];
                }
                if($i+1 != $jumlahdata){
                    if($datatahunpublikasi[$i][0]=='0'){
                        $year .= " 'Tidak Bertahun',"; 
    
                    }else{
                        $year .= " '".$datatahunpublikasi[$i][0]."',"; 
                        $jumlahpublikasi = $jumlahpublikasi + $jumlahpublikasipertahun;
                    }
                    $jumlah .= " ".$jumlahpublikasipertahun.",";    
                    $warna .= " 'rgba(0,".$hijau.", 255, 1)',";
                }else{
                    $year .= " ".$datatahunpublikasi[$i][0];
                    $jumlah .= " ".$jumlahpublikasipertahun;
                    $warna .= " 'rgba(0, ".$hijau.", 255, 1)' ";        
                    
                }
                $hijau = $hijau - $peningkatan;
            }
            if(isset($_GET['d'])){
                if($_GET['d']=="line"){
                    $switch = "line";
                }else{
                    $switch = $_GET['d'];
                }
            }else{
                $switch = 'bar';
            }
            if($datatahunpublikasi[0][0]=='0'){
               $jumlahpublikasi = $jumlahpublikasi / ($jumlahdata-1);
                $jumlahdata = $jumlahdata-1;
    
            }else{
                $jumlahpublikasi = $jumlahpublikasi / $jumlahdata;
            }
           $canvas = '
    
           <canvas id="chartpub" width="100%" height="30%" style="width:10px;height:10px"></canvas>';
            return                     $canvas."
                                        <script>
                                        var ctx = document.getElementById('chartpub').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: [".$year."],
                                                datasets: [{
                                                    label: 'Total Publikasi',
                                                    data: [". $jumlah."],
                                                    backgroundColor: [
                                                        ". $warna."
                                                    ],
                                                    borderColor: [
                                                       ".$warna."
                                                    ],
                                                    borderWidth: 10
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
            ";
        }
        else{
            return '<p class="text-center">Tidak ada data</p>';
        }
    }
    public static function User($iduser){
        $datadb  = DB::query('SELECT * FROM user WHERE id = :id', array(':id' => $iduser));
        //pretty($datadb);
        $id = $_GET['id'];
        $nama = $datadb[0][1];
        $affiliation = $datadb[0][2];
        $total_cites = $datadb[0][3];
        $h_index = $datadb[0][4];
        $i10_index = $datadb[0][5];
        $fields = $datadb[0][6];
        $homepage = $datadb[0][7];
        $jumlah_pub = DB::query('SELECT Count(id) FROM publikasi WHERE id = :id', array(":id" => $id))[0][0];
        $i = DB::query('SELECT cluster FROM user WHERE id = :id ', array(':id'=>$id))[0];
        if ($i['cluster'] == 'cluster_0') {
            $golongan = 'Golongan Civitas Cluster 1';
            $gol = '1';
        }else if ($i['cluster'] == 'cluster_1') {
            $golongan = 'Golongan Civitas Cluster 2';
            $gol = '2';
        }else if ($i['cluster'] == 'cluster_2') {
            $golongan = 'Golongan Civitas Cluster 3';
            $gol = '3';
        }else {
            $golongan = 'Tak Tergolongakan';
            $gol = '';
        }
        $profil ='
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-9">Data Profil</div>  
                        <div class="col-lg-3" ><a class="float-right" href="./cluster?gol='.$gol.'">'.$golongan.'</a></div>
                    </div>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <img src="https://scholar.google.co.id/citations?view_op=small_photo&user='.$id.'&citpid=1" alt="foto google scholar" />
                            &nbsp;<strong class="h1"> <a class="" href="./user.php?id='.$id.'">'.$nama.' </a>
                            </strong>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="float-right row">
                                <i class="col-12 text-right">'.$affiliation.' </i>
                                <a class="col-12  text-link text-right" href="'.$homepage.'">'.$homepage.'</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        if(isset($_GET['view'])){
            if($_GET['view']=="publikasi"){
                $datapublikasi = DB::query('SELECT * FROM publikasi WHERE id = :id', array(':id' => $id));
                //pretty($datapublikasi);
                $iterasi = 1;
                $data_publikasi = "";
                foreach ($datapublikasi as $i) {
                    if($i['year']=='0'){
                        $tahun= 'Tidak Bertahun';
                    }else{
                        $tahun= $i['year'];     
                    }
                    $data_publikasi .= "<tr><td>" . $iterasi . "</td><td>" . setLimitString($i['title'], 100) . "</td><td>" . $i['cites'] . "</td><td>" . $tahun . "</td></tr>";
                    $iterasi++;
                }

                return 
                    '<section class="content"><div class="row">'
                    
                    .$profil.'
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="box box-primary">
                                <div class="box-header">
                                    Daftar Publikasi
                                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                                </div>
                                <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Jumlah Dikutip</th>
                                                <th>Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            '.$data_publikasi.'
                                        </tbody>
                                    </table>
                                    </table>
                          </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </section>
                    ';
                }
        }else{
          
            $datapublikasi = DB::query('SELECT * FROM publikasi WHERE id = :id Limit 6', array(':id' => $id));
            $stringdatapublikasi = "";
            //pretty($datapublikasi);
            foreach ($datapublikasi as $i) {
                if($i['year']=='0'){
                    $tahun= 'Tidak Bertahun';
                }else{
                    $tahun= $i['year'];     
                }
                $stringdatapublikasi.= "<tr><td>" . setLimitString($i['title'], 100) . "</td><td>" . $i['cites'] . "</td><td>" . $tahun . "</td></tr>";
            }
            if (DB::query('SELECT count(id) FROM  publikasi WHERE id = :id', array(':id' => $id))[0][0] > 6) {
                $stringdatapublikasi .= '<tr><td colspan="3" align="center"> <a href="./user.php?id=' . $id . '&view=publikasi" class="">Lihat Semua</a>  </td></tr>';
            }
       
        }
        $chart = "
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['i10 Index', 'H Index', 'Jumlah Publikasi'],
                    datasets: [{
                        label: 'Data',
                        data: [".$i10_index .",". $h_index ."," . $jumlah_pub ."],
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 10
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
            ";
        $dashboardprofil = '
        '.$profil.' 
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-clone"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Sitasi</span>
                    <span class="info-box-number">'.$total_cites.'</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-caret-square-o-up"></i></span>
        
                <div class="info-box-content">
                    <span class="info-box-text">H index</span>
                    <span class="info-box-number">'.$h_index.'</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-clone"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">i10 Index</span>
                    <span class="info-box-number">'.$i10_index.'</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-stack-overflow"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Publikasi</span>
                    <span class="info-box-number">'.$jumlah_pub.'</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 ">
                <div class="box box-primary">
                <div class="box-header">
                    Diagram Profil
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                    <div class="box-body">
                    
                        <canvas id="myChart" width="100px" height="110px" style="width:10px;height:10px"></canvas>
                    </div>
            </div>
            </div>
           
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 ">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row"> 
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                Diagram Publikasi 
                            </div>
                        </div>
                        <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                    </div>
                    <div class="box-body">
                        '.self::Diagram($id).'
                    </div>    
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
            <div class="box box-primary">
                <div class="box-header">
                Publikasi
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Dikutip Oleh</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                '.$stringdatapublikasi.'
                            </tbody>
                        </table>
                        </table>
                    </div>


                </div>
            </div>
        </div>
           
            ';
       
            return '<section class="content"><div class="row">'. $dashboardprofil . $chart.'</div></section>';
    }
    public static function Klaster(){
        $dataclaster0 = DB::query('SELECT COUNT(id) from user WHERE cluster = :cluster', array(":cluster"=>'cluster_0'))[0][0];
        $dataclaster1 = DB::query('SELECT COUNT(id) from user WHERE cluster = :cluster', array(":cluster"=>'cluster_1'))[0][0];
        $dataclaster2 = DB::query('SELECT COUNT(id) from user WHERE cluster = :cluster', array(":cluster"=>'cluster_2'))[0][0];
        $jumlahdata = $dataclaster0 + $dataclaster1 + $dataclaster2;
        $persenclaster0 = $dataclaster0 / $jumlahdata * 100 ; 
        $persenclaster1 = $dataclaster1 / $jumlahdata * 100 ; 
        $persenclaster2 = $dataclaster2 / $jumlahdata * 100 ; 
      
        return '
            <div class="d-flex justify-content-between">
              <p class="">Golongan 1</p>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width:'.$persenclaster0.'%" aria-valuenow="'.$persenclaster0.'"aria-valuemin="0" aria-valuemax="100">    <p class="mb-2 text-white">'.$persenclaster0.'%</p>
              </div>
            </div> 
            <div class="d-flex justify-content-between">
                <p class="mb-2">Golongan 2</p>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-green progress-bar-striped progress-bar-animated" role="progressbar" style="width:'.$persenclaster1.'%" aria-valuenow="'.$persenclaster1.'"aria-valuemin="0" aria-valuemax="100">     <p class="mb-2 text-black">'.$persenclaster1.'%</p>
                </div>
            </div> 
            
            <div class="d-flex justify-content-between">
                <p class="mb-2">Golongan 3</p>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-red progress-bar-striped progress-bar-animated" role="progressbar" style="width:'.$persenclaster2.'%" aria-valuenow="'.$persenclaster2.'"aria-valuemin="0" aria-valuemax="100">     <p class="mb-2 text-white">'.$persenclaster2.'%</p>
           </div>
            </div> 
            <div class="box">
            </div> 
  
        ';
    }
    public static function KlasterSearch(){
        $tombol = '';
        if(isset($_GET['gol'])){
            if($_GET['gol']==1){
                $data = DB::query('SELECT * FROM user WHERE  cluster = :gol ORDER BY cluster ASC',array(':gol'=>'cluster_0'));
                $gol = 'Golongan 1';
                $tombol .= '
                <a href="./cluster.php?gol=3" class="btn btn-success  mr-2 float-right">Gol 3</a>
                <a href="./cluster.php?gol=2" class="btn btn-primary  mr-2 float-right">Gol 2</a>
                <a href="./cluster.php?gol=1" class="btn btn-info  mr-2 float-right">Gol 1</a>
                <a href="./cluster.php" class="btn btn-warning  mr-2 float-right">Semua</a>';
            }else if($_GET['gol']==2){
                $data = DB::query('SELECT * FROM user WHERE  cluster = :gol ORDER BY cluster ASC',array(':gol'=>'cluster_1'));
                $gol = 'Golongan 2';
                $tombol .= '
                <a href="./cluster.php?gol=3" class="btn btn-success  mr-2 float-right">Gol 3</a>
                <a href="./cluster.php?gol=2" class="btn btn-primary  mr-2 float-right">Gol 2</a>
                <a href="./cluster.php?gol=1" class="btn btn-info  mr-2 float-right">Gol 1</a>
                <a href="./cluster.php" class="btn btn-warning  mr-2 float-right">Semua</a>';
            }else if($_GET['gol']==3){
                $data = DB::query('SELECT * FROM user WHERE cluster = :gol ORDER BY cluster ASC',array(':gol'=>'cluster_2'));
                $gol = 'Golongan 3';
                $tombol .= '
                <a href="./cluster.php?gol=3" class="btn btn-success  mr-2 float-right">Gol 3</a>
                <a href="./cluster.php?gol=2" class="btn btn-primary  mr-2 float-right">Gol 2</a>
                <a href="./cluster.php?gol=1" class="btn btn-info  mr-2 float-right">Gol 1</a>
                <a href="./cluster.php" class="btn btn-warning  mr-2 float-right">Semua</a>';
            }else {
                $data = DB::query('SELECT * FROM user   ORDER BY cluster ASC');
                $gol = 'Semua';
                $keterangan = '';
                $tombol .= '
                <a href="./cluster.php?gol=3" class="btn btn-success  mr-2 float-right">Gol 3</a>
                <a href="./cluster.php?gol=2" class="btn btn-primary  mr-2 float-right">Gol 2</a>
                <a href="./cluster.php?gol=1" class="btn btn-info  mr-2 float-right">Gol 1</a>
                <a href="./cluster.php" class="btn btn-warning  mr-2 float-right">Semua</a>';
                }
        }else{
            $data = DB::query('SELECT * FROM user ORDER BY cluster ASC');
            $gol = 'Semua';
            $keterangan ='' ; 
            $tombol .= ' 
                 <a href="./cluster.php?gol=3" class="btn btn-success  mr-2 float-right">Gol 3</a>
                <a href="./cluster.php?gol=2" class="btn btn-primary  mr-2 float-right">Gol 2</a>
                <a href="./cluster.php?gol=1" class="btn btn-info  mr-2 float-right">Gol 1</a>
                <a href="./cluster.php" class="btn btn-warning  mr-2 float-right">Semua</a>'
         
                ;
        }
        $renderer = "";
        $iterasi = 1;
        foreach ($data as $i) {
            if ($i['cluster'] == 'cluster_0') {
                $golongan = '1';
            }else if ($i['cluster'] == 'cluster_1') {
                $golongan = '2';
            }else if ($i['cluster'] == 'cluster_2') {
                $golongan = '3';
            }else {
                $golongan = 'Tak Tergolongakan';
            }
            $renderer .= '
            <tr>
            <td>' . $iterasi . '</td>
            <td><a href="./user.php?id=' . $i['id'] . '" class="text-black"> <img src="https://scholar.google.co.id/citations?view_op=small_photo&user=' . $i['id'] . '&citpid=1" alt="foto google scholar" /> &nbsp ' . $i['name'] . '</a></td>
            <td>' . $i['total_cites'] . '</td>
            <td>' . $i['h_index'] . ' </td>
            <td>' . $i['i10_index'] . ' </td>
            <td>' . $golongan . '</td>
            </tr>

            ';
            $iterasi++;
        }
        return 
       '
        <div class="box box-primary">
            <div class="box-header">
                <div class="row"> 
                    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                        <div>Civitas '.$gol.'
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                       '.$tombol.'
                    </div>
                </div>
            </div>
            <div class="box-body">
                 <div class="table-responsive">    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Total Cites</th>
                                <th>H</th>
                                <th>i10</th>
                                <th>Golongan</th>
                            </tr>
                        </thead>
                        <tbody>
                            ' . $renderer . '
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>'; 
    }
    public static function warpCard($param = array()){
        $jumlah = count($param);
        $renderer = "";
        for ($i = 0 ; $i < $jumlah ; $i++){
            if($param[$i] != ''){
                $renderer.= '     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
                '.$param[$i].'</div>';    
            }
        }
        return '<section class="content"><div class="row">
            '.$renderer.'
        </div>
        </section>';
    }
}
