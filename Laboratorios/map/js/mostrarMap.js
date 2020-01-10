var mymap = L.map('mapid').setView([9.7579575, -83.9016162], 15);

var OpenStreetMap_DE = L.tileLayer('https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    accessToken: 'pk.eyJ1Ijoic3RlcGhiZDIyIiwiYSI6ImNrNTQzanVhZzBmZnYzbG53a2RiYmw2MzAifQ.t8U9pqo4-ZOvpTYk-FDUJA'
}).addTo(mymap);


rutas = [{
    "puntos": [9.85519, -83.89962],
    "lugar": "Mi Casa",
    "icono": "iconos/palacio.png"
}, {
    "puntos": [9.85830, -83.91325],
    "lugar": "TEC",
    "icono": "iconos/escuela-secundaria.png"
}, {
    "puntos": [9.85780, -83.91920],
    "lugar": "Estadio Fello Mesa",
    "icono": "iconos/estadio.png"
}, {
    "puntos": [9.85822, -83.92556],
    "lugar": "Polideportivo",
    "icono": "iconos/polideportivo.png"
}, {
    "puntos": [9.86178, -83.93535],
    "lugar": "Italpan",
    "icono": "iconos/panaderia.png"
}, {
    "puntos": [9.86382, -83.93956],
    "lugar": "Casa Madrina",
    "icono": "iconos/casa.png"
}
]

var listaRutas = [];


rutas.forEach(ruta => {
    var [lati, longi] = ruta.puntos;
    listaRutas.push([lati, longi]);
    var nombre = ruta.lugar;
    var img = ruta.icono;
    var marcaIcono = L.icon({ iconUrl: img });
    var marker = L.marker([lati, longi], { icon: marcaIcono }).bindPopup(nombre).addTo(mymap);

});

var polygon = L.polygon(listaRutas).addTo(mymap);

var rutaLatLng = [];
listaRutas.forEach(ruta => {
    rutaLatLng.push(L.latLng(ruta[0], ruta[1]));
})

L.Routing.control({
    waypoints: rutaLatLng
}).addTo(mymap);


