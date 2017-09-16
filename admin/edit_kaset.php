<!DOCTYPE html>
<?php
  session_start();
  $nama=$_SESSION['user'];
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
			<li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Transaksi</a></li>
			<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Customer</a></li>
			<li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> User</a></li>
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
if(!isset($_GET['button']))
	$_GET['button']="";
if(!isset($_GET['id']))
	$_GET['id']="";	


include "config.php";
$hasil=mysql_query("SELECT * FROM kaset WHERE kode_kaset='$_GET[id]'");
$data=mysql_fetch_row($hasil);

?>
<form method="post" action="menu_admin.php" target="_parent">
  <table width="100%" border="1" align="center">
    <tr bgcolor="#30a5ff">
      <td colspan="2"><div align="center" class="style1">Update Data Kaset </div></td>
    </tr>
    <tr bgcolor="#cccccc">
      <td width="113">Kode Kaset </td>
      <td width="164"><input type="text" name="1"  
						<?php
							echo "value='$data[0]'";
						?> /></td>
    </tr>
    <tr bgcolor="#dddddd">
      <td>Judul</td>
      <td><input type="text" name="2" value="<?php echo"$data[1]";?>"/></td>
    </tr>
    <tr bgcolor="#cccccc">
      <td>Deskripsi</td>
      <td><textarea name="3"><?php echo "$data[2]";?></textarea></td>
    </tr>
    <tr bgcolor="#cccccc">
      <td>Kategori Id </td>
      <td><input type="text" name="4"
						<?php
							echo "value='$data[3]'";
						?>
	  /></td>
    </tr>
    <tr bgcolor="#dddddd">
      <td>Harga</td>
      <td><input type="text" name="5"
						<?php
							echo "value='$data[4]'";
						?>
	  /></td>
       </tr>
    <tr bgcolor="#dddddd"> </tr>
    <tr bgcolor="#30a5ff">
      <td colspan="2" align="right"><input type="submit" name="tombol_update" value="Submit" />
          <input type="reset" name="reset" value="Reset" />
	</div></td>
    </tr>
  </table>
  <br>
  <a class='btn btn-primary' href="menu_admin.php">Batal Edit</a>
</form>

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