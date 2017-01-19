 <?php
	
	//Retorna quantidade de iccid de acordo com a consulta
	$pegaQtdUsoPorTecnologiaeMes = new GerenciaDashboard();	

?>
<div class="container theme-showcase" role="main">
	  
	<div class="page-header">
        <h3>Gráficos</h3>
    </div>	
	<div>	
		<div align="right" >
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
			      google.charts.load('current', {'packages':['line', 'corechart']});
				  google.charts.setOnLoadCallback(drawChart);

				function drawChart() {

				  var button = document.getElementById('change-chart');
				  var chartDiv = document.getElementById('chart_div');

				  var data = new google.visualization.DataTable();
				  data.addColumn('date', 'Month');
				  data.addColumn('number', "3G (SIM)");
				  data.addColumn('number', "4G (USIM)");

				  data.addRows([
					[new Date(<?php echo date('Y')?>, 0), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','01'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','01'); ?>],
					[new Date(<?php echo date('Y')?>, 1), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','02'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','02'); ?>],
					[new Date(<?php echo date('Y')?>, 2), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','03'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','03'); ?>],
					[new Date(<?php echo date('Y')?>, 3), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','04'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','04'); ?>],
					[new Date(<?php echo date('Y')?>, 4), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','05'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','05'); ?>],
					[new Date(<?php echo date('Y')?>, 5), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','06'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','06'); ?>],
					[new Date(<?php echo date('Y')?>, 6), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','07'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','07'); ?>],
					[new Date(<?php echo date('Y')?>, 7), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','08'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','08'); ?>],
					[new Date(<?php echo date('Y')?>, 8), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','09'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','09'); ?>],
					[new Date(<?php echo date('Y')?>, 9), <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','10'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','10'); ?>],
					[new Date(<?php echo date('Y')?>, 10),<?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','11'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','11'); ?>],
					[new Date(<?php echo date('Y')?>, 11),<?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('SIM','12'); ?>,  <?php echo $pegaQtdUsoPorTecnologiaeMes->pegaIndicadorTedenciaUso('USIM','12'); ?>]]);

				  var materialOptions = {
					chart: {
					  title: 'Indicador tendência de uso de iccid por tecnologia',
					  subtitle: 'Este indicador apresenta a tendência de uso de iccid por tecnologia de forma mensal'
					},
					width: 1200,
					height: 500,
					series: {
					  // Gives each series an axis name that matches the Y-axis below.
					  
					},
					axes: {
					  // Adds labels to each axis; they don't have to match the axis names.
					  y: {
						Temps: {label: 'Temps (Celsius)'},
						Daylight: {label: 'Daylight'}
					  }
					}
				  };

				  var classicOptions = {
					title: 'Average Temperatures and Daylight in Iceland Throughout the Year',
					width: 900,
					height: 500,
					// Gives each series an axis that matches the vAxes number below.
					series: {
					  0: {targetAxisIndex: 0},
					  1: {targetAxisIndex: 1}
					},
					vAxes: {
					  // Adds titles to each axis.
					  0: {title: 'Temps (Celsius)'},
					  1: {title: 'Daylight'}
					},
					hAxis: {
					  ticks: [new Date(2014, 0), new Date(2014, 1), new Date(2014, 2), new Date(2014, 3),
							  new Date(2014, 4),  new Date(2014, 5), new Date(2014, 6), new Date(2014, 7),
							  new Date(2014, 8), new Date(2014, 9), new Date(2014, 10), new Date(2014, 11)
							 ]
					},
					vAxis: {
					  viewWindow: {
						max: 30
					  }
					}
				  };

				  function drawMaterialChart() {
					var materialChart = new google.charts.Line(chartDiv);
					materialChart.draw(data, materialOptions);
					button.innerText = 'Change to Classic';
					button.onclick = drawClassicChart;
				  }

				  function drawClassicChart() {
					var classicChart = new google.visualization.LineChart(chartDiv);
					classicChart.draw(data, classicOptions);
					button.innerText = 'Change to Material';
					button.onclick = drawMaterialChart;
				  }

				  drawMaterialChart();

				}
			</script>
			<div id="chart_div"></div>
		</div>
	</div>
	
	
</div> <!-- /container -->
<?php
	$conn = null;
?>