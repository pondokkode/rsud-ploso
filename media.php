<?php
session_start();
if(isset($_SESSION['NamaPengguna']) or isset($_SESSION['IdUser']) and isset($_SESSION['Sandi']) and isset($_SESSION['Level'])){
    require("_koneksi.php");
    $IdUser = $_SESSION['IdUser'];
    $Level = 3;
    $NamaPengguna = $_SESSION['NamaPengguna'];
    $Sandi = $_SESSION['Sandi'];
    $qry = "SELECT * FROM users WHERE IdUser = '$IdUser' OR NamaPengguna = '$NamaPengguna' AND Sandi = '$Sandi' AND IdLevel = '$Level'";
    $rs = mysqli_query($mysqli, $qry);
    $rw = mysqli_fetch_array($rs);
    if(( $IdUser == $rw['IdUser'] OR $NamaPengguna == $rw['NamaPengguna'] ) and $Sandi == $rw['Sandi'] and $Level == $rw['IdLevel']){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Software Inventori Obat </title>
        <link rel="stylesheet" href="css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap-fileupload.min.css" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" type="text/css" />
        <script type="text/javascript" src="prettify/prettify.js"></script>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.flot.min.js"></script>
        <script type="text/javascript" src="js/jquery.flot.resize.min.js"></script> 
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/bootstrap-fileupload.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="js/jquery.alerts.js"></script>
        <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script><!-- Validate Form -->
        <script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="js/jquery.autogrow-textarea.js"></script>
        <script type="text/javascript" src="js/charCount.js"></script>
        <script type="text/javascript" src="js/ui.spinner.min.js"></script>
        <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/detectizr.min.js"></script>
        <script type="text/javascript" src="prettify/prettify.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
		<!-- <script src="js/jquery.min.js" type="text/javascript"></script> -->
        <script type="text/javascript" src="js/custom.js"></script><!-- date picter -->
        <!-- <link rel="stylesheet" href="css/style.default.css" type="text/css" /> -->
        <script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="js/slider.js"></script>
        <script type="text/javascript" src="js/forms.js"></script><!-- Validasi untuk FORM -->
		 <!-- <script type="text/javascript" src="js/highcharts.js"></script>
        <link rel="stylesheet" href="css/bootstrap-fileupload.min.css" type="text/css" /> -->


<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-fileupload.min.js"></script>

<script type="text/javascript" src="js/jquery.uniform.min.js"></script>

<script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>

<script type="text/javascript" src="js/charCount.js"></script>

<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>

		 <script type="text/javascript">
	
	var chart1;
	$(document).ready(function() {
		chart1 = new Highcharts.Chart({
			chart: {
            	renderTo: 'garfik',
	            type: 'column'
    	    },   
        	title: {
            	text: 'Grafik Penjualan Barang '
	        },
    	    xAxis: {
        	    categories: ['Barang']
	        },
    	    yAxis: {
        	    title: {
            	text: 'Barang Keluar'
            }
        },
		series:             
            
			[
				<?php 
				include "../_koneksi.php";	//memanggil koneksi
				$sql = "SELECT * FROM barang where BarangKeluar > 0";
				$rs = mysqli_query($mysqli, $sql);
				while ($data = mysqli_fetch_array($rs)) {
					$namabarang = $data['NamaBarang'];
					$jumlah = $data['BarangKeluar'];
					
				?>
					{
						name: '<?php echo $namabarang; ?>',
						data: [<?php echo $jumlah; ?>]
					},
				<?php
				}
				?>
            ]
		});
	});	
</script>
    </head>

    <body>
        
        <!-- START OF WRAPPER -->
        <div class="mainwrapper fullwrapper">
            
            <!-- START OF LEFT PANEL -->
            <div class="leftpanel">
                
                <div class="logopanel">
                    <h1><a href="media.php?module=home">Inventori Obat</a></h1>
                </div><!--logopanel-->
                
                <div class="datewidget"><SCRIPT language=JavaScript src="js/almanak.js"></SCRIPT></div>
                
                <div class="searchwidget">
                    <div class="input-append">
                        <input type="text" class="span2 search-query" value="Menu Utama" disabled>
                        <button type="submit" class="btn" disabled><span class="icon-th-list"></span></button>
                    </div>
                </div><!--searchwidget-->
                
                <!-- SIDEBAR -->
                <div class="leftmenu">        
                    <ul class="nav nav-tabs nav-stacked">
                        <li class="<?php if (!isset($_GET['module']) or $_GET['module']=="home" or $_GET['module']==""){echo"active";}else{echo"";}?>"><a href="media.php?module=home"><span class="iconsweets-home"></span>Beranda</a></li>
                        <li class="<?php if($_GET['module']=="obat" or $_GET['module']=="unitmutasi" ){ echo"active";}else{ echo"";}?> dropdown"><a href="#"><span class="iconsweets-book-large"></span>Tabel Master</a>
                            <ul style="<?php if($_GET['module']=="obat" or $_GET['module']=="unitmutasi" ){ echo"display: block;";}else{ echo"";}?>">
                                <li><a href="media.php?module=obat">Obat</a></li>
                                <!--<li><a href="media.php?module=produsen">Produsen</a></li>
                                <li><a href="media.php?module=unitmutasi">Unit Mutasi</a></li>-->
                            </ul>
                        </li>
                        <!--<li class="<?php if($_GET['module']=="transpembelian" or $_GET['module']=="statustranspembelian"){ echo"active";}else{ echo"";}?> dropdown"><a href="#"><span class="iconsweets-cart"></span>Pembelian</a>
                            <ul style="<?php if($_GET['module']=="transpembelian" or $_GET['module']=="statustranspembelian"){ echo"display: block;";}else{ echo"";}?>">
                                <li><a href="media.php?module=transpembelian">Transaksi Pembelian</a></li>
                                <li><a href="media.php?module=statustranspembelian">Status Transaksi Pembelian</a></li>
                            </ul>
                        </li>-->
                       <!--  <li class="<?php if($_GET['module']=="transpenjualan" or $_GET['module']=="statustranspenjualan"){ echo"active";}else{ echo"";}?> dropdown"><a href="#"><span class="iconsweets-track"></span>Unit Mutasi</a>
                            <ul style="<?php if($_GET['module']=="transpenjualan" or $_GET['module']=="statustranspenjualan"){ echo"display: block;";}else{ echo"";}?>">
                            <?php
                            $qunit = "SELECT * FROM unitmutasi ";
                            $rsunit = mysqli_query($mysqli, $qunit);
                            while ( $rwunit = mysqli_fetch_array($rsunit)) {
                               echo "
                                    <li><a href='media.php?module=".$rwunit['NamaUnit']."'>".$rwunit['NamaUnit']."</a></li>
                               ";
                            }
                            

    ?>
                                
                            </ul>
                        </li> -->
                        <li class="<?php $aktif = $_GET['module']=="transaksimutasi"?"active":""; echo $aktif;?>"><a href="media.php?module=transaksimutasi"><span class="iconsweets-track"></span>Transaksi Mutasi</a></li>
                        <li class="<?php $aktif = $_GET['module']=="mutasiapotik"?"active":""; echo $aktif;?>"><a href="media.php?module=mutasiapotik"><span class="iconsweets-dropbox"></span>Apotik Rawat Jalan</a></li>
                        <li class="<?php $aktif = $_GET['module']=="mutasiunit"?"active":""; echo $aktif;?>"><a href="media.php?module=mutasiunit"><span class="iconsweets-dropbox"></span>Apotik Rawat Inap</a></li>
                        <li class="<?php $aktif = $_GET['module']=="mutasiunit"?"active":""; echo $aktif;?>"><a href="media.php?module=mutasiunit"><span class="iconsweets-dropbox"></span>Unit Laboratorium</a></li>
                        <li class="<?php $aktif = $_GET['module']=="mutasiunit"?"active":""; echo $aktif;?>"><a href="media.php?module=mutasiunit"><span class="iconsweets-dropbox"></span>Instalasi Gawat Darurat</a></li>
                        <li class="<?php $aktif = $_GET['module']=="stok"?"active":""; echo $aktif;?>"><a href="media.php?module=stok"><span class="iconsweets-dropbox"></span>Stok Terkini</a></li>
                        <li><a href="media.php?module=pengguna"><span class="icon-wrench"></span>Ubah Sandi</a></li>
                        <li><a href="logout.php"><span class="icon-off"></span>Keluar</a></li>
                        <!--<li class="<?php $aktif = $_GET['module']=="laporankeuangan"?"active":""; echo $aktif;?>"><a href="media.php?module=laporankeuangan"><span class="iconsweets-money2"></span>Laporan Keuangan & Grafik</a></li>-->
                    </ul>
                </div><!--leftmenu-->
                
            </div><!--mainleft-->
            <!-- END OF LEFT PANEL -->
    
            <!-- START OF RIGHT PANEL -->
            <div class="rightpanel">
                <div class="headerpanel">
                    <a href="#" class="showmenu"></a>
                    <div class="headerright">
                        <div class="dropdown userinfo">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">Selamat datang <?php echo $rw['NamaPengguna']; ?> </a>
                            
                        </div><!--dropdown-->
                    </div><!--headerright-->
                </div><!--headerpanel-->
                <div class="breadcrumbwidget">
                    <ul class="breadcrumb">
                    </ul>
                </div><!--breadcrumbwidget-->
                <?php
                    $module = (isset($_REQUEST['module'])&& $_REQUEST['module'] != NULL)?$_REQUEST['module']:'';
                    if(file_exists("module/".$module.".php"))
                    {
                        include("module/".$module.".php");
                    }else{
                        include("module/home.php");
                    }
		?>
                
            </div><!--mainright-->
            <!-- END OF RIGHT PANEL -->
            <!--Footer-->
            <div class="clearfix"></div>
            <div class="footer">
                <div class="footerleft"><a href="http://portalphantom.blogspot.com/" target="_self">&copy; <?php echo date("Y"); ?> | FT SI Unipdu 2013</a></div>
                <div class="footerright">Hubungi kami 085852024269 atau <a href="" target="_self">Muhammad Zidni Mubarok </a></div>
            </div>
            <!--End Footer-->
        </div><!--mainwrapper-->

    </body>

</html>
<?php
    }else{
        header("location:logout.php");
    }
}else{
    header("location:logout.php");
}
?>