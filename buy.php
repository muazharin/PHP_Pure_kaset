<!DOCTYPE html>
<?php
  session_start();
  if(!@$_SESSION['id_temp'])
     $_SESSION['id_temp']=date("ymdHis");
  $sesi=$_SESSION['id_temp'];
  //echo "$sesi";   mengetest
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DVD Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php?id_kategori=1">DVD Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?id_kategori=1">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" >Contact +62 822-4330-9590</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">DVD Shop<br>
        <small>The most complete and reliable online DVD selling site</small>
      </h1>
	  <hr>
	  
	  <!-- Pagination -->
	  <ul class="pagination justify-content-center">
	  <?php
			include "config.php";
			$hasil=mysql_query("SELECT * FROM kategori");
			while($data=mysql_fetch_row($hasil))
			{
				echo "<li class='page-item'>
					<a class='page-link' href='index.php?id_kategori=$data[0]'>$data[1]</a>
					</li>";
			}
		?>
		</ul>
		<hr>
		
      <?php
		include "config.php";
		if(@$_GET['kode_kaset'])
		{
			$perintah="SELECT * FROM temp WHERE id_temp = '$sesi'
					   AND kode_kaset ='$_GET[kode_kaset]'";
			$hasil=mysql_query($perintah);
			$jml_data=mysql_num_rows($hasil);
			if ($jml_data==0 and $_GET['tombol']=="tambah")
			{
				$perintah="INSERT INTO temp (id_temp,kode_kaset,jumlah)  
						   VALUES('$sesi','$_GET[kode_kaset]','1')";
				mysql_query($perintah);
			}
		}
		if ($_GET['tombol']=="batal")  
		   {    
		   $perintah="DELETE FROM temp WHERE id_temp='$sesi'";
		   mysql_query($perintah);
		   echo "<script>
		         window.location='index.php?id_kategori=1'
		         </script>";
		   }
		   
		if ($_GET['tombol']=="simpan")  
		   {    		   			  
			$jml=$_GET['qwe'];
		    $i=0;
		    $perintah="SELECT * FROM temp WHERE id_temp='$_SESSION[id_temp]'";
		    $hasil=mysql_query($perintah);
		    while ($data=mysql_fetch_row($hasil))
		    {
		       	$perintah="UPDATE temp SET jumlah='$jml[$i]' 
 				           WHERE kode_kaset='$data[1]' AND
				           id_temp='$_SESSION[id_temp]'";
                mysql_query($perintah);						   
				$i++;
  		    }		   			  
		   }
		$perintah="SELECT judul, harga , jumlah , harga*jumlah as total 
                   FROM temp t,kaset k
                   WHERE k.kode_kaset=t.kode_kaset AND 
				   id_temp='$sesi'";
		$hasil=mysql_query($perintah);		   		
		echo "<form method='get' ><br><table border='1' width='100%'>";
		echo "<tr align='center' style='strong'>";
		echo "<td width='300'><b>PAKET</b></td>";
		echo "<td width='200'><b>HARGA</b></td>";
		echo "<td width='200'><b>JUMLAH PESAN</b></td>";
		echo "<td width='200'><b>TOTAL</b></td>";
		echo "</tr>";
		$total=0;
		while($data=mysql_fetch_row($hasil))
		{
		    echo "<tr align='center'>";
			echo "<td width='300'>$data[0]</td>";
			echo "<td width='200'>Rp $data[1]</td>";
			echo "<td width='200'>
		         <input type=text name=qwe[] value=$data[2] size=10></td>";
			echo "<td width='200'>Rp $data[3]</td>";
			echo "</tr>";
			$total=$total+$data[3];
		}
		echo "<tr align='center'>";
		echo "<td width='300'></td>";
		echo "<td width='200'></td>";
		echo "<td width='200'>JUMLAH TOTAL</td>";
		echo "<td width='200'>Rp $total</td>";
		echo "</tr>";
		echo "</table><hr>";
		
		echo "<center>";
		echo "<a class='btn btn-primary' href='index.php?id_kategori=1'>Tambah</a> ";
		echo "<a class='btn btn-primary' href='buy.php?tombol=batal'>Batal</a> ";
		echo "<input type=hidden name=tombol value='simpan'>";
		echo "<input class='btn btn-primary' type=image src='images/gambar/simpan.png'> ";
		echo "<a class='btn btn-primary' href='customer.php'>Checkout</a> ";
		echo "</center> <hr>";
		echo "</form>";
		
	  ?>

     

      
      

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
