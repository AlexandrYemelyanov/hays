$(document).ready(function() {
  google.maps.event.addDomListener(window, 'load', init);
  var map;
  function init() {
    var mapOptions = {
      center: new google.maps.LatLng(54.76267,-4.77173),
      zoom: 5,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL,
      },
      disableDoubleClickZoom: true,
      mapTypeControl: false,
      scaleControl: false,
      scrollwheel: true,
      panControl: false,
      streetViewControl: false,
      draggable : true,
      overviewMapControl: false,
      overviewMapControlOptions: {
        opened: false,
      },
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [
      {
       "featureType": "administrative",
       "elementType": "labels.text.fill",
       "stylers": [
       {
        "color": "#444444"
      }
      ]
    },
    {
      "featureType": "landscape",
      "elementType": "all",
      "stylers": [
      {
       "color": "#009fda"
     }
     ]
   },
   {
     "featureType": "poi",
     "elementType": "all",
     "stylers": [
     {
      "visibility": "off"
    }
    ]
  },
  {
   "featureType": "road",
   "elementType": "all",
   "stylers": [
   {
    "saturation": -100
  },
  {
    "lightness": 45
  },
  {
   "visibility": "off"
 }
 ]
},
{
 "featureType": "road.highway",
 "elementType": "all",
 "stylers": [
 {
  "visibility": "off"
}
]
},
{
 "featureType": "road.arterial",
 "elementType": "labels.icon",
 "stylers": [
 {
  "visibility": "off"
}
]
},
{
 "featureType": "transit",
 "elementType": "all",
 "stylers": [
 {
  "visibility": "off"
}
]
},
{
 "featureType": "water",
 "elementType": "all",
 "stylers": [
 {
  "color": "#002776"
},
{
  "visibility": "on"
}
]
}
],
}
var mapElement = document.getElementById('haysmap');

var map = new google.maps.Map(mapElement, mapOptions);
var locations = [
['Aberdeen', '<p>4th Floor,<br /> Union Terrace,<br /> Aberdeen, AB10 1NJ</p>', 'undefined', 'undefined', 'undefined', 57.146627, -2.103747, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Birmingham', '<p>St Philip\'s House,<br /> 4 St Philip\'s Place,<br /> Birmingham, B3 2SL</p>', 'undefined', 'undefined', 'undefined', 52.481912,  -1.897693, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Brighton', '<p>2nd Floor,<br /> International House,<br /> 78/81 Queens Road,<br /> Brighton, BN1 3XE</p>', 'undefined', 'undefined', 'undefined', 50.828142,  -0.141278, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Bristol', '<p>Hartwell House,<br /> 55-61 Victoria Street,<br /> Bristol, BS1 6AD</p>', 'undefined', 'undefined', 'undefined', 51.452119,  -2.588478, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Cambridge', '<p>Terrington House,<br />  13-15 Hills Road,<br />  Cambridge, CB2 1NL</p>', 'undefined', 'undefined', 'undefined', 52.198056,  0.129216, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Canterbury', '<p>81-82 Castle Street,<br />  Canterbury,<br />  Kent, CT1 2QD</p>', 'undefined', 'undefined', 'undefined', 51.277677,  1.077553, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Cardiff', '<p>1st Floor,<br />  5 Callaghan Square,<br />  Cardiff, CF10 5BT</p>', 'undefined', 'undefined', 'undefined', 51.475228,  -3.176288, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Chelmsford', '<p>2nd Floor, French\'s Gate,<br /> 18-22 Springfield Road,<br />  Chelmsford CM2 6FA</p>', 'undefined', 'undefined', 'undefined', 51.732406,  0.475590, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Cheltenham', '<p>53-57 Rodney Road,<br />  Cheltenham, GL50 1HX</p>', 'undefined', 'undefined', 'undefined', 51.899017,  -2.075006, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Coventry', '<p>2nd Floor,<br />  188-190 Spon Street, <br /> Coventry, CV1 3BB</p>', 'undefined', 'undefined', 'undefined', 52.408585,  -1.517837, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Dundee', '<p>Unit 6a, City Quay,<br />  Camperdown Street, <br /> Dundee, DD1 3JA</p>', 'undefined', 'undefined', 'undefined', 56.462424, -2.960098, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Edinburgh', '<p>24 Charlotte Square, <br /> Edinburgh, EH2 4ET</p>', 'undefined', 'undefined', 'undefined', 55.951162, -3.207211, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Enfield', '<p>2nd Floor, Cecil Court,<br /> 49-55 London Road,<br /> Enfield EN2 6DS</p>', 'undefined', 'undefined', 'undefined', 51.650005,  -0.080747, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Exeter', '<p>11-15 Dix\'s Field,<br /> Exeter, EX1 1QA</p>', 'undefined', 'undefined', 'undefined', 50.724166,  -3.524380, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Midlands PA', '<p>St Philip\'s House,<br /> 4 St Philip\'s Place,<br /> Birmingham, B3 2SL</p>', 'undefined', 'undefined', 'undefined', 52.481853,  -1.897682, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Glasgow', '<p>Spectrum Building, <br /> 55 Blythswood Street,<br />  Glasgow, G2 7AT</p>', 'undefined', 'undefined', 'undefined', 55.860910, -4.263819, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Huddersfield', '<p>3rd Floor, <br /> 14 St George\'s Square,<br />  Huddersfield, HD1 1JF</p>', 'undefined', 'undefined', 'undefined', 53.647637,  -1.784959, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Hull', '<p>Permanent House,<br />  25 South Street,<br />  Hull, HU1 3QD</p>', 'undefined', 'undefined', 'undefined', 53.743988,  -0.343448, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Inverness', '<p>Moray House,<br />  16 to 18 Bank Street,<br />  Inverness, IV1 1QY</p>', 'undefined', 'undefined', 'undefined', 57.479281, -4.228442, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Leeds', '<p>Sovereign House, <br /> South Parade, <br /> Leeds, LS1 5QL</p>', 'undefined', 'undefined', 'undefined', 53.799519,  -1.547464, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Leicester', '<p>1st Floor, 2 Colton Square,<br /> Leicester, LE1 1QH</p>', 'undefined', 'undefined', 'undefined', 52.634018,  -1.126161, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Leicester Compliance', '<p>1st Floor, 2 Colton Square,<br /> Leicester, LE1 1QH</p>', 'undefined', 'undefined', 'undefined', 52.634018,  -1.126161, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Lincoln', '<p>1st Floor,<br /> 247 High Street,<br /> Lincoln, LN2 1HW</p>', 'undefined', 'undefined', 'undefined', 53.231233,  -0.539887, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Liverpool', '<p>Silkhouse Court,<br /> Tithebarn Street, <br />Liverpool, L2 2LZ</p>', 'undefined', 'undefined', 'undefined', 53.408885,  -2.991758, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['London Victoria', '<p>Ebury Gate,<br /> 23 Lower Belgrave Street<br />, London, SW1W 0NT</p>', 'undefined', 'undefined', 'undefined', 51.495898,  -0.146700, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['London (International)', '<p>Ebury Gate, <br />23 Lower Belgrave Street, <br />London, SW1W 0NT</p>', 'undefined', 'undefined', 'undefined', 51.495925,  -0.146807, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Luton', '<p>3rd Floor, <br />Raglan House,<br /> Alma Street,<br /> Luton, LU1 2PL</p>', 'undefined', 'undefined', 'undefined', 51.880882,  -0.419441, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Maidstone', '<p>6th Floor,<br />  Kent House,<br />  Romney Place,4th Floor, City Tower, Piccadilly Plaza, Manchester,       M1 4BT Maidstone ME15 6LH</p>', 'undefined', 'undefined', 'undefined', 51.271459,  0.525881, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Manchester', '<p>4th Floor, <br /> City Tower, <br /> Piccadilly Plaza,<br />  Manchester, M1 4BT</p>', 'undefined', 'undefined', 'undefined', 53.480573,  -2.238990, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Marketing', '<p>1st Floor, <br /> 5 Lloyds Avenue, <br /> London, EC3N 3AE</p>', 'undefined', 'undefined', 'undefined', 51.512131,  -0.077691, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Middlesbrough', '<p>Sun Alliance House,<br /> 16-26 Albert Road, <br />Middlesbrough, TS1 1QA</p>', 'undefined', 'undefined', 'undefined', 54.577850,  -1.234001, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Newcastle', '<p>Kelburn House, <br />7-19 Mosley Street,<br /> Newcastle upon Tyne, <br />Tyne and Wear, NE1 1YE</p>', 'undefined', 'undefined', 'undefined', 54.971426,  -1.610192, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Northampton', '<p>Suite C, <br />3rd Floor, <br />Charles House,<br /> 61-69 Derngate, <br />Northampton, NN1 1UE</p>', 'undefined', 'undefined', 'undefined', 52.236377,  -0.891480, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Norwich', '<p>Suite C, <br />Suite A, <br />Ground Floor,<br /> 1 Prince of Wales Road,<br /> Norwich, NR1 1BD</p>', 'undefined', 'undefined', 'undefined', 52.629419,  1.299789, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Nottingham', '<p>2nd Floor,<br /> 5 Alan House,<br /> Clumber Street,<br /> Nottingham, NG1 3ED</p>', 'undefined', 'undefined', 'undefined', 52.954430,  -1.147908, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Plymouth', '<p>Royal London House, <br /> 153-155 Armada Way, <br /> Plymouth,<br />  Devon, PL1 1HX</p>', 'undefined', 'undefined', 'undefined', 50.372278,  -4.142932, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Portsmouth', '<p>12 Edinburgh Road,<br />   Portsmouth PO1 1BE</p>', 'undefined', 'undefined', 'undefined', 50.372278,  -4.142932, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Preston', '<p>6th Floor, Norwest Court,<br />  Guildhall Street,<br />  Preston, PR1 3NU</p>', 'undefined', 'undefined', 'undefined', 53.757457,  -2.700043, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Reading', '<p>The Blade,<br /> 6th Floor,<br /> Abbey Square,<br /> Reading RG1 3BE</p>', 'undefined', 'undefined', 'undefined', 51.455909,  -0.967341, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Sheffield', '<p>1st Floor The Ruskin Buildings,<br />  Tudor Square,<br />  Sheffield, S1 2LA</p>', 'undefined', 'undefined', 'undefined', 53.380983,  -1.467533, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Stafford', '<p>1st Floor, Unit 8, <br />Greyfriars Business Park, <br />Frank Foley Way,<br /> Greyfriars, <br />Stafford, ST16 2RF</p>', 'undefined', 'undefined', 'undefined', 52.813040,  -2.125673, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Swindon', '<p>SN1, Part 3rd Floor,<br /> Station Road,<br /> Swinson, SN1 1DG</p>', 'undefined', 'undefined', 'undefined', 51.565167,  -1.784780, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Wigan', '<p>Unit 91,<br /> The Galleries,<br /> 1 Hindley Walk, <br />Wigan, WN1 1AY</p>', 'undefined', 'undefined', 'undefined', 53.547670,  -2.632105, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Woking', '<p>1st Floor,<br /> Griffin House, <br />West Street, <br />Woking, GU21 6BS</p>', 'undefined', 'undefined', 'undefined', 51.320896,  -0.558211, 'http://www1.hays.co.uk/eshots/map-pin.png'],

['Wolverhampton', '<p>Derwent House,<br /> 42-46 Waterloo Road,<br /> Wolverhampton, WV1 4XB</p>', 'undefined', 'undefined', 'undefined', 52.587635,  -2.132352, 'http://www1.hays.co.uk/eshots/map-pin.png']
];
for (i = 0; i < locations.length; i++) {
 if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
 if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
 if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
 if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
 if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
 marker = new google.maps.Marker({
  icon: markericon,
  position: new google.maps.LatLng(locations[i][5], locations[i][6]),
  map: map,
  title: locations[i][0],
  desc: description,
  tel: telephone,
  email: email,
  web: web
});
 link = '';            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
}
function bindInfoWindow(marker, map, title, desc, telephone, email, web, link) {
  var infoWindowVisible = (function () {
    var currentlyVisible = false;
    return function (visible) {
      if (visible !== undefined) {
        currentlyVisible = visible;
      }
      return currentlyVisible;
    };
  }());
  iw = new google.maps.InfoWindow();
  google.maps.event.addListener(marker, 'click', function() {
   if (infoWindowVisible()) {
     iw.close();
     infoWindowVisible(false);
   } else {
     var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><p>"+desc+"<p></div>";
     iw = new google.maps.InfoWindow({content:html});
     iw.open(map,marker);
     infoWindowVisible(true);
   }
 });
  google.maps.event.addListener(iw, 'closeclick', function () {
    infoWindowVisible(false);
  });
}
}

});