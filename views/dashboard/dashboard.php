<?php include('../../layout/header.php') ?>
<?php include('../../layout/sidebar.php') ?>
<?php include('../../library/connect.php') ?>
<?php include('getData.php') ?>


<script src="../../assets/js/highcharts.js"></script>

<?php 
    // <!-- COUNT MEMBERS -->
    $sql = $dbConn->query("SELECT COUNT(member_id) FROM tbl_members");
    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
      $members = $row['COUNT(member_id)'];
    }
    // COUNT LOAN
    $sql = $dbConn->query("SELECT SUM(loan_amount),SUM(interest),COUNT(loan_id) FROM tbl_loan");
    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
      $moneyBorrowed  = $row['SUM(loan_amount)'];
      $profit         = $row['SUM(interest)'];
      $loanQuantity   = $row['COUNT(loan_id)'];
    }

 ?>
<!-- DASHBOARD CONTENT -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  
                <div class="m-b-md">
                <div class="row">
                  <div class="col-sm-6">
                    
                    
                  </div>
                  <div class="col-sm-6">
                    <!-- <div class="text-right text-left-xs">
                      <div class="sparkline m-l m-r-lg pull-right" data-type="bar" data-height="35" data-bar-width="6" data-bar-spacing="2" data-bar-color="#fb6b5b"><canvas width="86" height="35" style="display: inline-block; width: 86px; height: 35px; vertical-align: top;"></canvas></div>
                      <div class="m-t-md">
                        <span class="text-uc">Registered Members</span>
                        <div class="h4 m-n"><strong><?php echo $members ?></strong></div>
                      </div>                      
                    </div> -->
                  </div>
                </div>
              </div>


                  <!--GRAPH-->
                  <section class="panel panel-default">
                <header class="panel-heading font-bold"><h4 class="m-b-none">Statistics</h4></header>
                <div class="panel-body">
                  <div id="loadData" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                  <script type="text/javascript">
        $(function () {
            var chart;
            $(document).ready(function() {
            
                var colors = Highcharts.getOptions().colors,
                    categories = ['Total Loan','Total Profit','Total Amount'],
                    name = 'Statistics 1',
                    data = [{

                            y: <?php echo (isset($loan_amount) ? $loan_amount : 0); ?>,
                            color: colors[0]

                        },{

                            y: <?php echo (isset($interest) ? $interest : 0); ?>,
                            color: colors[1]

                        },{

                            y: <?php echo (isset($total) ? $total : 0); ?>,
                            color: colors[2]

                        }];
            
                function setChart(name, categories, data, color) {
              chart.xAxis[0].setCategories(categories, false);
              chart.series[0].remove(false);
              chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
              }, false);
              chart.redraw();
                }
            
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'loadData',
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: categories
                    },
                    yAxis: {
                        title: {
                            text: 'Amount'
                        }
                    },
                    plotOptions: {
                        column: {
                            cursor: 'pointer',
                            point: {
                                events: {
                                    click: function() {
                                        var drilldown = this.drilldown;
                                        if (drilldown) { // drill down
                                            setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                        } else { // restore
                                            setChart(name, categories, data);
                                        }
                                    }
                                }
                            },
                            dataLabels: {
                                enabled: true,
                                color: colors[0],
                                style: {
                                    fontWeight: 'bold'
                                },
                                formatter: function() {
                                    return this.y;
                                }
                            }
                        }
                    },
                    tooltip: {
                        formatter: function() {
                            var point = this.point,
                                s = this.x +':<b>'+ this.y;
                             
                                return s;
                        }
                    },
                    series: [{
                        name: name,
                        data: data,
                        color: 'white'
                    }],
                    exporting: {
                        enabled: false
                    }
                });
            });
            
        });
    </script>



                </div>
                <footer class="panel-footer bg-white">
                  <div class="row text-center no-gutter">
                    <div class="col-xs-3 b-r b-light">
                      <p class="h3 font-bold m-t"><?php echo "₱ ".$moneyBorrowed ?></p>
                      <p class="text-muted">Total Money Borrowed from Customers</p>
                    </div>
                    <div class="col-xs-3 b-r b-light">
                      <p class="h3 font-bold m-t"><?php echo "₱ ".$profit ?></p>
                      <p class="text-muted">Total Profit</p>  
                    </div>
                    <div class="col-xs-3 b-r b-light">
                      <p class="h3 font-bold m-t"><?php echo $loanQuantity ?></p>
                      <p class="text-muted">Total No. of Loans by Customers</p>
                    </div>
                    <div class="col-xs-3">
                      <p class="h3 font-bold m-t"><?php echo $members ?></p>
                      <p class="text-muted">Total No. of Customers Registered</p>                        
                    </div>
                  </div>
                </footer>
              </section>
                 
                  

                  
                    
                	<!-- CONTENT HERE -->
                    
                  
              </section>
            </section>

</body>



<!-- <div id="flot-1ine" style="height: 250px; padding: 0px; position: relative;">
                  <canvas class="flot-base" width="1054" height="250" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1054px; height: 250px;"></canvas>

                  <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">

                  <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">

                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 100px; top: 232px; left: 15px; text-align: center;">0</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 51px; top: 232px; left: 108px; text-align: center;">1</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 100px; top: 232px; left: 201px; text-align: center;">2</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 51px; top: 232px; left: 295px; text-align: center;">3</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 100px; top: 232px; left: 388px; text-align: center;">4</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 51px; top: 232px; left: 482px; text-align: center;">5</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 100px; top: 232px; left: 575px; text-align: center;">6</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 51px; top: 232px; left: 669px; text-align: center;">7</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 100px; top: 232px; left: 762px; text-align: center;">8</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 51px; top: 232px; left: 856px; text-align: center;">9</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 100px; top: 232px; left: 947px; text-align: center;">10</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 51px; top: 232px; left: 1040px; text-align: center;">11</div>
                  </div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">

                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">25</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 219px; left: 7px; text-align: right;">0</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 175px; left: 7px; text-align: right;">5</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 131px; left: 1px; text-align: right;">10</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 88px; left: 1px; text-align: right;">15</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 44px; left: 1px; text-align: right;">20</div>


                  </div>

                  </div>

                  <canvas class="flot-overlay" width="1054" height="250" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1054px; height: 250px;"></canvas>

                  </div> -->