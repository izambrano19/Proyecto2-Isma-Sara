google.charts.load("current", {packages: ["corechart"]});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Meses', 'Percentatge in grams', {role: 'style'}, {role: 'annotation'}],
    ['Cereals', 33, '#ffff56', 'Cereals'],
    ['Meats', 5, '#fd5757', 'Meats'],
    ['Milk Products', 12, '#8af6ff', 'Milk Products'],
    ['Fish', 4, 'color: #68f895', 'Fish'],
    ['Others', 3, 'color: #bb68f8', 'Others']
  ]);


  var options = {
    title: "FORECAST OF DAILY PROTEIN INTAKE PER CAPITA IN UNDERDEVELOPED COUNTRIES IN 2024, BY TYPE OF CALORIC SOURCE (IN GRAMS)",
    bar: {
        groupWidth: "95%",
    },
    legend: {
      position: "none"
    },
  };
  var chart = new google.visualization.ColumnChart(document.getElementById("jscolumnas2"));
  chart.draw(data, options);
    
}