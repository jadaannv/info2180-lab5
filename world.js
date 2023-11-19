function labStarter(){
    let countrybtn = document.getElementById("lookup");

    countrybtn.addEventListener("click", function(e){
        e.preventDefault();

        var lookupCountry = document.getElementById("country").value;
        var httprequest = new XMLHttpRequest();
        var getrequest = "world.php?country=" +lookupCountry;
        

        httprequest.onreadystatechange = function(){
            if (httprequest.readyState == XMLHttpRequest.DONE){
                if(httprequest.status == 200){
                    var countryInfo = httprequest.responseText;
                    var resultdiv = document.getElementById("result");
                    resultdiv.innerHTML = countryInfo;
                }
                else{
                    alert("An Error Occurred.")
                }
            }
        };
        httprequest.open("GET", getrequest, true);
        httprequest.send();
    });
}

window.onload = labStarter;