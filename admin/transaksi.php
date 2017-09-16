<!DOCTYPE html>
<?php
  error_reporting(0);
  session_start();
  $nama=$_SESSION['user'];
  include "batasan.php";
  
 ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="menu_admin.php"><span>Admin</span></a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="menu_admin.php"><em class="fa fa-dashboard">&nbsp;</em> Data Produk</a></li>
			<li><a href="transaksi.php"><em class="fa fa-calendar">&nbsp;</em> Transaksi</a></li>
			<li><a href="#"><em class="fa fa-bar-chart">&nbsp;</em> Customer</a></li>
			<li><a href="#><em class="fa fa-toggle-off">&nbsp;</em> User</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Transaksi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Transaksi</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<?php
		if(!isset($_GET['tombol']))
		$_GET['tombol']="";
		?>
		<h1><center>DATA TRANSAKSI</center></h1>
		<br />
		<?php
		include "config.php";

		if ($_GET['tombol']=="lunas")
		{
			$perintah=" UPDATE transaksi SET status='lunas' WHERE id_transaksi='$_GET[id]' AND kode_dvd='$_GET[kode]'";
			mysql_query($perintah);
		}

		if ($_GET['tombol']=="delete")
		{
		echo "<script type = 'text/javascript'>
				x=window.confirm('Apakah mau dihapus?');
		if(x)
			window.location.href='transaksi.php?tombol=jadi_delete&id=$_GET[id]';
		else
			window.alert('Data tidak jadi dihapus');
		</script>";
		
		}
	
		if ($_GET['tombol']=="jadi_delete")
		{
			$perintah=" DELETE FROM transaksi WHERE id_transaksi='$_GET[id]'";
			mysql_query($perintah);
		}
	
	echo"
	<table width=100% border=0 align=center>
		<tr bgcolor=#30a5ff>
		<th>Id Transaksi</th>
		<th>Kode DVD</th>
		<th>Jumlah</th>
		<th>Kode Customer</th>
		<th>Status</th>
		<th colspan=2 align=center> Aksi</th>
		</tr>";
	$hasil=mysql_query("SELECT * FROM transaksi");
	
	while($data=mysql_fetch_row($hasil))
	{
	echo "<tr align='center'>";

	echo"
    <td>$data[0]</td>
    <td>$data[1]</td>
    <td>$data[2]</td>
    <td>$data[3]</td>
    <td>$data[4]</td>
    <td width='34' align='center'> <a title='Tandai sudah lunas' href='transaksi.php?tombol=lunas&id=$data[0]&kode=$data[1]'> <img src='checklist.png' /> </td>
	<td width='39' align='center'> <a title='Hapus data ini' href='transaksi.php?tombol=delete&id=$data[0]'> <img src='delete.png' /> </a> </td>
	</tr>";
	
	}
	echo "</table>";
	
?>
	
	</form>
	
		</div>
	</div>	<!--/.main-->
	<a class='btn btn-primary' href="menu_admin.php">Kembali</a>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>