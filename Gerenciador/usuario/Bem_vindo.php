<?php
		
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
	
	<div align="center" class="row">	
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		  google.charts.load('current', {'packages':['bar']});
		  google.charts.setOnLoadCallback(drawStuff);

			  function drawStuff() {
				var data = new google.visualization.arrayToDataTable([
				  ['Regional', '3G (SIM)', '4G (USIM)'],
				  <?php echo "['11 ao 19',"  .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('11',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('11',1,'USIM')."]";?>,
				  <?php echo "['21 ao 29'," .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('21',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('21',1,'USIM')."]";?>,
				  <?php echo "['31 ao 39'," .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('31',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('31',1,'USIM')."]";?>,
				  <?php echo "['41 ao 49'," .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('41',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('41',1,'USIM')."]";?>,
				  <?php echo "['51 ao 59'," .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('51',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('51',1,'USIM')."]";?>,
				  <?php echo "['61 ao 69'," .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('61',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('61',1,'USIM')."]";?>,
				  <?php echo "['71 ao 79'," .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('71',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('71',1,'USIM')."]";?>,
				  <?php echo "['81 ao 89'," .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('81',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('81',1,'USIM')."]";?>,
				  <?php echo "['91 ao 99'," .$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('91',1,'SIM').",".$consultaQtdIccidPorRegional->pegaQtdPorRegionaleTecnologia('91',1,'USIM')."]";?>				  
				]);

				var options = {
				  width: 900,
				  chart: {
					title: 'Quantidade de iccid por Regional e Tecnologia (3G/4G)',
					subtitle: 'Este gráfico apresenta a quantidade de iccid por regional e tecnologia, sendo esse o estoque utilizavél'
				  },
				  bars: 'horizontal', // Required for Material Bar Charts.
				  series: {
					 
				  },
				  axes: {
					x: {
					  distance: {label:'Quantidade'}, // Bottom x-axis.
					  brightness: {side: 'top', label: ''} // Top x-axis.
					}
				  }
				};

			  var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
			  chart.draw(data, options);
			};
		</script>
		<div id="dual_x_div" style="width: 100%; min-height: 450px;"></div>
	</div>
	<br />
	<p style="margin-left:500px; font-size:11px">Quantidade</p>
</div> <!-- /container -->
<?php
	$conn = null;
	include_once('usuario/roda-pe.php');
?>
