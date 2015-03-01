if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    }
                    else {// code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.open("GET", "xml/filme.xml", false);
                    xmlhttp.send();
                    xmlDoc = xmlhttp.responseXML;
                    var table = document.createElement("table");
                    
                    

var detailsForBooking = function() {
  var id = location.search.split('id=')[1];
  var x=xmlDoc.getElementsByTagName("film");
  for(i=0; i<x.length; i++)
  {
    if (x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue == id) {
		var code = "";
		code+="<table><tr ><th align=\"left\"><strong>Number of persons:  </strong></th>";
		code+="<th align=\"left\"><select id=\"nr\" >";
		code+="<option value=\"1\">1</option>";
		code+="<option value=\"2\">2</option>";
		code+="</select></th></tr>";

		code+="<tr><th align=\"left\"><strong>Date:  </strong></th>";
		code+="<th align=\"left\"><select id=\"date\">";
		var code3=x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue;
		var res3=code3.split("/");
		for(k=0;k < res3.length;k++){
			code+="<option value="+(k+1)+">";
			code+=res3[k];
			code+="</option>";
		}
		code+="</select></th></tr>";

		code+="<tr><th align=\"left\"><strong>Hours:  </strong></th>";
		code+="<th align=\"left\"><select id=\"hour\">";
		code3=x[i].getElementsByTagName("hour")[0].childNodes[0].nodeValue;
		res3=code3.split("/");
		for(k=0;k < res3.length;k++){
			code+="<option value="+(k+1)+">";
			code+=res3[k];
			code+="</option>";
		}
		code+="</select></th></tr></table>";
		code+="</br>";
		return code;
    }
  }
}
$('.booking').append(detailsForBooking());

function bookTicket(user, mid)
{
    var nr = $("#nr option:selected").text();
    var hour = $("#hour option:selected").text();
	var date = $("#date option:selected").text();

    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
      }
    else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) //request finished and the response is ready, 200 = OK
	  //the server response is ready to be processed
        {
            document.getElementById("booking-result").innerHTML=xmlhttp.responseText;
        }
      }

    var url = "book.php";
    var params = "user="+user+"&movie="+mid+"&nr="+nr+"&date="+date+"&hour="+hour;

    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.send(params);

}
