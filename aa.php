<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([
        ['AppName', 'Priority', 'Complexity', 'App Group',     'Effort'],
        ['Fred',    80.66,              1.67,      'North America',  33739900],
        ['Jim',    79.84,              1.36,      'Europe',         81902307],
        ['Tom',    78.6,               1.84,      'Europe',         5523095],
        ['Bert',    72.73,              2.78,      'Middle East',    79716203]
      ]);

      var options = {
        title: 'Correlation between life expectancy, fertility rate ' +
               'and population of some world countries (2010)',
        hAxis: {title: 'Life Expectancy'},
        vAxis: {title: 'Fertility Rate'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="series_chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
