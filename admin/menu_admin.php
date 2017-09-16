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
				<li class="active">Data Produk</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Produk</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
<?php
if(!isset($_GET['tombol']))
	$_GET['tombol']="";
if(!isset($_POST['tombol_update']))
	$_POST['tombol_update']="";
?>
		<form method="get">
		<table width="100%" border="1" align="center">
			<tr bgcolor="#30a5ff">
				<td colspan="2"><div align="center" class="style1">Data DVD </div></td>
			</tr>
			<tr bgcolor="#cccccc">
				<td width="30%">Kode Kaset </td>
				<td width="70%"><input type="text" name="1" style="width:100%; height:auto;" /></td>
			</tr>
			<tr bgcolor="#cccccc">
				<td>Judul</td>
				<td><input type="text" name="2" style="width:100%; height:auto;" /></td>
			</tr>
			<tr bgcolor="#cccccc">
				<td>Deskripsi</td>
				<td><textarea name="3" style="width:100%; height:auto;"></textarea></td>
			</tr>
			<tr bgcolor="#cccccc">
				<td>Kategori_Id</td>
				<td><input type="text" name="4" style="width:100%; height:auto;" /></td>
			<tr bgcolor="#cccccc">
				<td>Harga</td>
				<td><input type="text" name="5" style="width:100%; height:auto;"/></td>
			</tr>
			<tr bgcolor="#dddddd">
			</tr>
			<tr bgcolor="#30a5ff">
				<td colspan="2" align="right">
				<input type="submit" name="tombol" value="Submit" />
				<input type="reset" name="reset" value="Reset" />
				</td>
			</tr>
		</table>
<br />
<br />
<br />
<?php
	include "config.php";
	if($_GET['tombol']=="Submit")
	{
		$perintah="INSERT INTO kaset (kode_kaset, judul, deskripsi, kategori_id, harga)
					VALUES(	NULL,
							'$_GET[2]',
							'$_GET[3]',
							'$_GET[4]',
							'$_GET[5]')";
		mysql_query($perintah);
	}

	if ($_GET['tombol']=="delete")
	{
		echo "<script type = 'text/javascript'>
				x=window.confirm('Apakah mau dihapus?');
		if(x)
			window.location.href='menu_admin.php?tombol=jadi_delete&id=$_GET[id]';
		else
			window.alert('Data tidak jadi dihapus');
		</script>";
		
	}
	
	if ($_GET['tombol']=="jadi_delete")
	{
		$perintah=" DELETE FROM kaset WHERE kode_kaset='$_GET[id]'";
		mysql_query($perintah);
	}
	
	if ($_POST['tombol_update']=="Submit")
	{
		$perintah="UPDATE kaset SET
					judul='$_POST[2]',
					deskripsi='$_POST[3]',
					kategori_id='$_POST[4]',
					harga='$_POST[5]'
					WHERE kode_kaset='$_POST[1]'
					";
		mysql_query($perintah);
	}
	echo"
	<table width=100% border=1 align=center>
		<tr bgcolor=#30a5ff>
			<td align='center'><b>Kode Kaset</b></td>
			<td align='center'><b>Judul</b></td>
			<td align='center'><b>Deskripsi</b></td>
			<td align='center'><b>Kategori Id</b></td>
			<td align='center'><b>Harga</b></td>
			<td colspan=2 align=center> <b>Aksi</b></td>
		</tr>";
	$hasil=mysql_query("SELECT * FROM kaset");
	while($data=mysql_fetch_row($hasil))
	{
		echo "<tr bgcolor=#dddddd>";
		echo"
			<td align='center'>$data[0]</td>
			<td>$data[1]</td>
			<td>$data[2]</td>
			<td align='center'>$data[3]</td>
			<td>Rp $data[4]</td>
			<td width='34' align='center'> <a href=edit_kaset.php?id=$data[0]>Edit</td>
			<td width='39' align='center'> <a href=menu_admin.php?tombol=delete&id=$data[0]> Hapus </a> </td>
		</tr>";
	}
	echo "</table>";
?>

	</form>
		</div>
	</div>	<!--/.main-->
	
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