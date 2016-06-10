
<?php include "header_admin.php"; ?>
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <!-- <button id="test">Test</button> -->
          <div class="row">
                 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua" data-target="data_1">
                <div class="inner">
                  <h4>100</h4>
                  <p>TOTAL PROFIT INV</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green" data-target="data_2">
                <div class="inner">
                  <h4>100</h4>
                  <p>TOTAL PROFIT KOPERASI</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow" data-target="data_3">
                <div class="inner">
                  <h4>44</h4>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red" data-target="data_4">
                <div class="inner">
                  <h4>100</h4>
                  <p>VALUE INVENTORY</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Summary Sales Order</h3> / 
                                                      <span style="background-color:#D2D6DE">Transaksi Pembelian</span> / 
                                                      <span style="background-color:#00A65A">Transaksi Penjualan</span>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
</section>
<script type="text/javascript" src="<?php echo base_url() ?>asset/my_js/home.js"></script>
<style type="text/css">
  .data{
    display: none;
  }
</style>
<script type="text/javascript">
  $('#test').click(function() {
    $.confirm({
        text: "This is a confirmation dialog manually triggered! Please confirm:",
        confirm: function(button) {
            alert("You just confirmed.");
        },
        cancel: function(button) {
            alert("You cancelled.");
        }
    });
});
</script>
<script type="text/javascript">
  $(function(){
       var chartData = <?php echo json_encode($summary) ?>;
       console.log(chartData);
       var pembelianValue = [];
       var penjualanValue = [];
       var label = [];
       for (var i = 0; i < chartData.length; i++) {
          label.push(chartData[i].bulan);
          pembelianValue.push(chartData[i].total_beli);
          penjualanValue.push(chartData[i].total_jual);
       };
       console.log(label);
       var areaChartData = {
            labels: label,
            datasets: [
              {
                label: "Electronics",
                fillColor: "rgba(210, 214, 222, 1)",
                strokeColor: "rgba(210, 214, 222, 1)",
                pointColor: "rgba(210, 214, 222, 1)",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: pembelianValue
              },
              {
                label: "Digital Goods",
                fillColor: "rgba(60,141,188,0.9)",
                strokeColor: "rgba(60,141,188,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: penjualanValue
              }
            ]
          };
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };
barChart.Bar(areaChartData, barChartOptions);
  });

<?php include "footer.php"; ?>