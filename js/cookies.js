function changeCookie() {
    var x = document.getElementById("languageSelected");
    document.cookie = "language=" + x.options[x.selectedIndex].text;
    if (x.options[x.selectedIndex].text == "Ro") {
        var url = "http://localhost:80/Tema1DAWCalin/indexRO.html";
        document.location.href = url;
    }
    else if (x.options[x.selectedIndex].text == "En") {
        var url = "http://localhost:80/Tema1DAWCalin/index.html";
        document.location.href = url;
    }
    //location.reload();
}
