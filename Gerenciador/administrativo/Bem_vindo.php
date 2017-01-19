<?php
	
	//Retorna quantidade de iccid de acordo com a consulta
	//STATUS = 1 INATIVOS / STATUS = 2 ATIVOS
	$pegaQtdStatusUsuario = new GerenciaDashboard();
	
	//Retorna quantidade de iccid de acordo com a consulta
	$consultaQtdIccidPorRegional = new GerenciaDashboard();
		
?>
<div class="container theme-showcase" role="main">
	
      <!-- Main jumbotron for a primary marketing message or call to action -->
     
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
			<img src="img\SlideArt1.png" alt="First slide" class="img-responsive">
          </div>
          <div class="item">
			<img src="img\SlideArt2.png" alt="First slide" class="img-responsive">
          </div>
          <div class="item">
            <img src="img\SlideArt3.png" alt="First slide" class="img-responsive">
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> 
	  
	<br />
	
	<div class="row">	
		<div align="right" class="col-6">
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
		
				var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				['Ativos', <?php echo $pegaQtdStatusUsuario->pegaStatusUsuario(2);?>],
				['Inativos', <?php echo $pegaQtdStatusUsuario->pegaStatusUsuario(1);?>],
				]);
		
				var options = {
				title: 'Gestão de Usuários'
				};
		
				var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		
				chart.draw(data, options);
			}
			</script>
			<div id="piechart" style="width: 100%; min-height: 450px; float:right;"></div>
		</div>
		<div align="left" class="col-6">
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				<?php echo "['11 a 19'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('11',1). "]";?>,
				<?php echo "['21 a 29'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('21',1). "]";?>,
				<?php echo "['31 a 39'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('31',1). "]";?>,
				<?php echo "['41 a 49'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('41',1). "]";?>,
				<?php echo "['51 a 59'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('51',1). "]";?>,
				<?php echo "['61 a 69'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('61',1). "]";?>,
				<?php echo "['71 a 79'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('71',1). "]";?>,
				<?php echo "['81 a 89'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('81',1). "]";?>,
				<?php echo "['91 a 99'," .$consultaQtdIccidPorRegional->pegaQuantidadePorRegional('91',1). "]";?>]);
	
				var options = {
				title: 'Volume de Iccid Por Regional',
				pieHole: 0.4,
				};
	
				var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
				chart.draw(data, options);
			}
			</script>
			<div id="donutchart" style="width: 100%; min-height:450px;" ></div>
		</div>
	</div>
	<div>	
	</div>	
</div> <!-- /container -->
<?php
	$conn = null;
	include_once('administrativo/roda-pe.php');
?>
