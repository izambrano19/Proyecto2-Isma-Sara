google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Continentes', 'Porciento'],
          ['Vacuna Covid-19 (Pfizer)', 25],
          ['Humira (AbbVie)', 18],
          ['Keytruda (Merck & Co.)',  15],
          ['Eliquis (BMS/Pfizer)',  20],
          ['Revlimid (BMS)',  11],
          ['Stelara (J&J)',  11]
        ]);
          
          
         var options = {
          title: 'RANKING OF THE MOST SELLING PHARMACEUTICAL PRODUCTS WORLDWIDE IN 2022 (IN BILLIONS OF DOLLARS)',
          is3D: true,};
         var chart = new google.visualization.PieChart(document.getElementById('jscolumnas'));
         chart.draw(data, options);
      }

      