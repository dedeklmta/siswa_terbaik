<?php
include_once 'includes/header.inc.php';

include_once 'includes/nilai.inc.php';
$pro3 = new Nilai($db);
$stmt3 = $pro3->readAll();

include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt4 = $pro1->readByFilter();

include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();

include_once 'includes/bobot.inc.php';
$pro5 = new Bobot($db);
$stmt5 = $pro5->readAll();

?>
<link rel="stylesheet" href="assets/css/style.css">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="jumbotron">
			     <!-- slider -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/slider/slider1.png" alt="...">
      <div class="carousel-caption">
        <h2>WARNET EQUATOR</h2>
        <p class="lead">Jl. Plumbon No.Raya, Jomblangan, Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198</p>
      </div>
    </div>
    <div class="item">
      <img src="img/slider/slider2.png" alt="...">
      <div class="carousel-caption">
        <h2>WARNET EQUATOR</h2>
        <p class="lead">Jl. Plumbon No.Raya, Jomblangan, Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198</p>
      </div>
    </div>
    <div class="item">
      <img src="img/slider/slider3.png" alt="...">
      <div class="carousel-caption">
       <h2>WARNET EQUATOR</h2>
        <p class="lead">Jl. Plumbon No.Raya, Jomblangan, Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198</p>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <!-- end slider -->

			</div>
			<div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
			<br/>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Nilai Preferensi</h3>
						</div>
						<div class="panel-body">
							<ol>
								<?php while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
									<li><?php echo $row3['ket_nilai'] ?> (<?php echo $row3['jum_nilai'] ?>)</li>
								<?php endwhile; ?>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Kriteria & Bobot</h3>
						</div>
						<div class="panel-body">
							<ol>
							<?php while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
								<li><?php echo $row2['nama_kriteria'] ?></li>
							<?php endwhile; ?>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Skor Alternatif & Hasil</h3>
						</div>
						<div class="panel-body">
							<ol>
							<?php while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) :?>
								<li><?php echo $row1['nama'] ?></li>
							<?php endwhile; ?>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>
	<footer class="text-center">Copyright &copy; 2019 Warnet Equator</footer>

	</div>

	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/highcharts.js"></script>
	<script src="assets/js/exporting.js"></script>
	<script>
		var chart1; // globally available
		$(document).ready(function() {
			chart1 = new Highcharts.Chart({
			chart: {
				renderTo: 'container2',
				type: 'column'
			},
			title: {
				text: 'Grafik Usulan100'
			},
			xAxis: {
				categories: ['Alternatif']
			},
			yAxis: {
				title: {
					text: 'Jumlah Nilai'
				}
			},
			series: [
				<?php while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) : ?>
					//data yang diambil dari database dimasukan ke variable nama dan data
					{
						name: '<?php echo $row4['nama'] ?>',
						data: [<?php echo $row4['hasil_akhir'] ?>]
					},
				<?php endwhile; ?>
			]
			});
		});
	</script>
</body>
</html>
