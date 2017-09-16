<!DOCTYPE html>
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
      <a class="navbar-brand" href="index2.php?id_kategori=1">DVD Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index2.php?id_kategori=1">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="admin">Admin</a>
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
					<a class='page-link' href='index2.php?id_kategori=$data[0]'>$data[1]</a>
					</li>";
			}
		?>
		</ul>
		<hr>
		
      <?php
		include "config.php";
		$hasil=mysql_query("SELECT * FROM kaset WHERE kategori_id='$_GET[id_kategori]'");
		while($data=mysql_fetch_row($hasil))
		{
			echo "$data[2]
			<div class='col-md-5'>
			<a class='btn btn-primary' href='buy.php?tombol=tambah&kode_kaset=$data[0]'>Click here to buy</a>
			</div><hr>";
		}
		
	  ?>

     

      
      

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; DVD Shop 2017. All right reserved. <br>Distributed by Vision</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
