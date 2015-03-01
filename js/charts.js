      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      
      google.setOnLoadCallback(drawChart2);
      google.setOnLoadCallback(drawChart);
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
function drawChart() {

    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp.open("GET","../Tema2DAWCalin/xml/filme.xml",false);
    xmlhttp.send();
    xmlDoc=xmlhttp.responseXML;
    var x=xmlDoc.getElementsByTagName("film");

    var h1 = 0;
    var h2 = 0;
    var h3 = 0;
    var h4 = 0;
    var h5 = 0;
    var h6 = 0;


    for (i=0;i<x.length;i++)
    {
      hours = x[i].getElementsByTagName("hour")[0].childNodes[0].nodeValue;
      var res = hours.split("/");

      for (j=0;j<res.length;j++) {
        if (res[j].search("17.00") != -1) {
            h1++;
        }
        if (res[j].search("18.00") != -1) {
            h2++;
        }
        if (res[j].search("19.00") != -1) {
            h3++;
        }
        if (res[j].search("20.00") != -1) {
            h4++;
        }
        if (res[j].search("21.00") != -1) {
            h5++;
        }
        if (res[j].search("22.00") != -1) {
            h6++;
        }
      }
    }
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Movies');
        data.addRows([
          ['17.00', h1],
          ['18.00', h2],
          ['19.00', h3],
          ['20.00', h4],
          ['21.00', h5],
          ['22.00', h6]
        ]);

        // Set chart options
        var options = {'title':'Movie running hour',
                       'width':600,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
}

function drawChart2() {

     // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Bookings');
        data.addRows([
          ['17.00', b17],
          ['18.00', b18],
          ['19.00', b19],
          ['20.00', b20],
          ['21.00', b21],
          ['22.00', b22]
        ]);

        // Set chart options
        var options = {'title':'Daily bookings',
                       'width':600,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);

}