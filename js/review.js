function postReview(uid, mid)
{
    var text = document.getElementById("textarea").value;
	var date = new Date(); 
	date.toString('dd-MMM-yyyy');
    if (text=="")
    {
        $("#text-review").append("");
        return;
    }

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
            $("#text-review").append(xmlhttp.responseText);
        }
      }

    var url = "review.php";
    var params = "q="+text+"&uid="+uid+"&mid="+mid+"&date="+date;

    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.send(params);
}