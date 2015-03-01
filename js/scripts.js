function addMovieRow(movie) {
    var tr1 = document.createElement("tr");

    var td11 = document.createElement("td");
    var p11 = document.createElement("p");
    p11.innerHTML = x[i].getElementsByTagName("title")[0].innerHTML;
    td11.appendChild(p11);

    var p12 = document.createElement("p");
    p12.innerHTML = "<img src=\""+x[i].getElementsByTagName("poster")[0].childNodes[0].nodeValue+"\">";
    td11.appendChild(p12);
    tr1.appendChild(td11);

	var td2 = document.createElement("td");
	var link1 = document.createElement("a");
	var link1Text = document.createTextNode("Book tickets");
	var l = "bookings.php?id="+x[i].getElementsByTagName("id")[0].innerHTML;
	link1.setAttribute('href', l);
	link1.appendChild(link1Text);	
	td2.appendChild(link1);	
	
	var space = document.createTextNode(" | ");
	td2.appendChild(space);

	var link2 = document.createElement("a");
	var link2Text = document.createTextNode("Check reviews");
	var l = "reviews.php?id="+x[i].getElementsByTagName("id")[0].innerHTML;
	link2.setAttribute('href', l);
	link2.appendChild(link2Text);	
	td2.appendChild(link2);
	
	var space1 = document.createTextNode(" | ");
	td2.appendChild(space1);
	
	var but = document.createElement("b");
	var butText = document.createTextNode("Rate:");
	but.appendChild(butText);
	td2.appendChild(but);
	
	//var v1  = document.createElement("q");
	//var q = "<option value=\1>1</option>" +x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
	
	//td2.appendChild(v1);
	
	var optn1 = document.createElement("option");
	optn1.text="1";
	optn1.value="1";
	
	var optn2 = document.createElement("option");
	optn2.text="2";
	optn2.value="2";
	
	var  optn3 = document.createElement("option");
	optn3.text="3";
	optn3.value="3";
	
	var optn4 = document.createElement("option");
	optn4.text="4";
	optn4.value="4";
	
	var optn5 = document.createElement("option");
	optn5.text="5";
	optn5.value="5";


	//var a = box.selectedIndex.value;
	var box = document.createElement("select");
	box.innerHTML = "<id = rating>";
	box.appendChild(optn1);
	box.appendChild(optn2);
	box.appendChild(optn3);
	box.appendChild(optn4);
	box.appendChild(optn5);
	td2.appendChild(box);
	
	

	var but = document.createElement("button");
	var buttext = document.createTextNode("Rate");
	but.setAttribute("type", "submit");
	but.setAttribute("id", "rate_button."+id);
	but.setAttribute("onClick", "rate(\'"+id+"\', \'<?php echo \"\'\" . $_SESSION[\'email\'] . \"\'\" ?>\')");
	but.appendChild(buttext);
	td2.appendChild(but);
	
	var id =x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
	box.setAttribute("id", "rating."+id);
	
    var p1 = document.createElement("p");
    p1.innerHTML = "Genre: " + x[i].getElementsByTagName("genre")[0].childNodes[0].nodeValue;
	td2.appendChild(p1);

    var p3 = document.createElement("p");
    p3.innerHTML = x[i].getElementsByTagName("description")[0].childNodes[0].nodeValue;
    td2.appendChild(p3);

    var p4 = document.createElement("p");
    p4.innerHTML = "Dates: " + x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue;
	td2.appendChild(p4);

    var p5 = document.createElement("p");
    p5.innerHTML = "Hours: " + x[i].getElementsByTagName("hour")[0].childNodes[0].nodeValue;
	td2.appendChild(p5);

    var p6 = document.createElement("p");
    p6.innerHTML = '<iframe width="420" height="345" src='+x[i].getElementsByTagName("trailer")[0].childNodes[0].nodeValue+'"> </iframe>';
    td2.appendChild(p6);

    tr1.appendChild(td2);
    return tr1;
}


function rate(ratebutton, userid){

	var movieid = ratebutton;
	var value = $("#rating."+movieid+":selected").text();
	
	if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
      }
    else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            alert("Your rating has been recorded! Thank you");
        }
      }

    var url = "rating.php";
	alert(movieid);
	alert(userid);
	alert(value);
    var params = "movieid"+movieid+"&userid="+userid+"&value="+value;

    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.send(params);
}
