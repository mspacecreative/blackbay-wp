<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMjm_0er-ybuWcVoPXYLSr82mn6bvNqCY"></script> <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 15,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(44.641832, -63.577730), // BlackBay Group

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#e9e9e9"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dedede"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "saturation": 36
                                },
                                {
                                    "color": "#333333"
                                },
                                {
                                    "lightness": 40
                                }
                            ]
                        },
                        {
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f2f2f2"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        }
                    ]
                };
                
                function pinSymbol(color) {
                    return {
                        path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
                        fillColor: color,
                        fillOpacity: 1,
                        strokeColor: '#fff',
                        strokeWeight: 1,
                        scale: 1,
                   };
                }

                // Get the HTML DOM element that will contain your map
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(44.641832, -63.577730),
                    map: map,
                    icon: pinSymbol("#000000"),
                });
				
				var contentString = '<div id="content">'+
				      '<div id="siteNotice">'+
				      '</div>'+
				      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
				      '<div id="bodyContent">'+
				      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
				      'sandstone rock formation in the southern part of the '+
				      'Northern Territory, central Australia.</p>'+
				      '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
				      'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
				      '(last visited June 22, 2009).</p>'+
				      '</div>'+
				      '</div>';
				
				  var infowindow = new google.maps.InfoWindow({
				    content: contentString
				  });
				
				marker.addListener('click', function() {
				    infowindow.open(map, marker);
				  });
            }
        </script>
<div id="map" style="width: 100%; height: 300px; margin-bottom: 50px;"></div>