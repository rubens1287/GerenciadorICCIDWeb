 <?php
	
	//Retorna quantidade de iccid de acordo com a consulta
	$consultaQtdIccidPorRegionaleTecnologia = new GerenciaDashboard();
	
	
																																																							
?>
<div class="container theme-showcase" role="main">
	  
	<div class="page-header">
        <h3>Gráfico</h3>
    </div>	
	<div>	
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		  google.charts.load('current', {'packages':['bar']});
		  google.charts.setOnLoadCallback(drawStuff);

			  function drawStuff() {
				var data = new google.visualization.arrayToDataTable([
				  ['Regional', '3G (SIM)', '4G (USIM)'],
				  <?php echo "['11 ao 19'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('11', 1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('11',1,'USIM')."]";?>,
				  <?php echo "['21 ao 29'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('21',1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('21',1,'USIM')."]";?>,
				  <?php echo "['31 ao 39'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('31',1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('31',1,'USIM')."]";?>,
				  <?php echo "['41 ao 49'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('41',1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('41',1,'USIM')."]";?>,
				  <?php echo "['51 ao 59'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('51',1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('51',1,'USIM')."]";?>,
				  <?php echo "['61 ao 69'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('61',1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('61',1,'USIM')."]";?>,
				  <?php echo "['71 ao 79'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('71',1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('71',1,'USIM')."]";?>,
				  <?php echo "['81 ao 89'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('81',1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('81',1,'USIM')."]";?>,
				  <?php echo "['91 ao 99'," .$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('91',1,'SIM').",".$consultaQtdIccidPorRegionaleTecnologia->pegaQtdPorRegionaleTecnologia('91',1,'USIM')."]";?>				  
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
		<div id="dual_x_div" style="width: 900px; height: 400px;"></div>
	</div>
	<br />
	<p style="margin-left:400px; font-size:11px">Quantidade</p>
	
</div> <!-- /container -->
<?php
	$conn = null;
?>