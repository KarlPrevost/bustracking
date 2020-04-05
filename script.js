var busmap = L.map('busmap');
        busmap.setView([48.115878, -1.688513], 11);
        L.tileLayer('https://tile.jawg.io/jawg-sunny/{z}/{x}/{y}.png?access-token=ZCRZqgTAiL483vriJAaGibOuktKYIJW42dyAJL2Qn6HAMClDMnZU9zOnlqyiGeax', {
          attribution: '<a href="https://www.jawg.io" target="_blank">&copy; Jawg</a> | <a href="https://www.openstreetmap.org" target="_blank">&copy; OpenStreetMap</a>&nbsp;contributors',
          minZoom: 1,
          maxZoom: 22,
          name: 'tiles'
        }).addTo(busmap);
        var busmarkers = {};
window.onload = initApi;

const apiurl = "https://data.explore.star.fr/api/records/1.0/search/?dataset=tco-bus-vehicules-position-tr&lang=fr&rows=446&facet=numerobus&facet=nomcourtligne&facet=sens&facet=destination";       

async function initApi(){

  const response = await fetch(apiurl);
  const busdata = await response.json();
  const {nhits} = busdata;
  // const busselectbutton = document.getElementById("busselectbutton");
  // busselectbutton.onclick = displayMarker;
  const selector = document.getElementById("busselect");


  selector.onchange = displayMarker;


  function displayMarker(){
    var busselected = document.getElementById("busselect").value;
    if(busmarkers != undefined){
      busmap.eachLayer(function (layer) {
        if(layer.options.name != 'tiles'){
          busmap.removeLayer(layer);
        }
      });
    }
    for (let i=0; i<nhits; i++){
      if(busdata['records'][i]['fields']['idligne'] != undefined){
        const nomcourtligne = busdata['records'][i]['fields']['nomcourtligne'];
        const destination = busdata['records'][i]['fields']['destination'];
        const etat = busdata['records'][i]['fields']['etat'];
        const longitude = busdata['records'][i]['fields']['coordonnees'][0];
        const latitude = busdata['records'][i]['fields']['coordonnees'][1];
        console.log(busdata['records'][i]['fields']);
        if(nomcourtligne == busselected){
          busmarkers = L.marker([longitude, latitude]).addTo(busmap)
          busmarkers.bindPopup("<strong>Ligne: "+nomcourtligne+"</strong><p>Destination: "+destination+" </p>")
        }
      }
    }
  };
}

$(document).ready(function(){
  $.get("capturedata.json", function(jsonData){ // requete le fichier json avec AJAX
    var len = jsonData.length;

    if(busmarkers != undefined){
      busmap.eachLayer(function (layer) {
        if(layer.options.name != 'tiles'){
          busmap.removeLayer(layer);
        }
      });
      if(len > 0){
        for (let i=0; i<len; i++){  
          long = jsonData[i].longitude;
          lat = jsonData[i].latitude;
          destination1 = jsonData[i].destination;
          nomcourtligne1 = jsonData[i].busline;
          busmarkers = L.marker([long, lat]).addTo(busmap);
          busmarkers.bindPopup("<strong>Ligne: "+nomcourtligne1+"</strong><p>Destination: "+destination1+" </p>");
        }
      }
    }
  });
  $.get("clear.php", function(){ // requete le fichier PHP avec AJAX qui delete le contenu du fichier Json
  });
});
