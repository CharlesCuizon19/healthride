
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f7f9;
        }

        #map {
            height: 500px;
            width: 100%;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            z-index: 10;
        }

        .leaflet-top.leaflet-left,
        .leaflet-top.leaflet-right {
            pointer-events: none;
        }

        .custom-control {
            pointer-events: auto;
        }

        .leaflet-routing-container {
            display: none !important;
        }

        #distance-info-left .loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #EF4444;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="w-full space-y-4">
        <div class="space-y-1">
            <!-- <h1 class="flex items-center text-xl font-semibold text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-red-500" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z" />
                </svg>
                DAVAO CITY, PHILIPPINES
            </h1>
            <p class="text-sm text-gray-500">
                Pin your desired pick-up location, then click a drop-off location <strong>over 20 miles away</strong>
                for the optimal route.
            </p> -->
        </div>

        <div id="map-container" class="relative">
            <div id="map"></div>
            <div id="mileage-display"
                class="absolute z-50 flex items-center p-2 text-white transform translate-x-1 translate-y-1 bg-gray-900 rounded-lg shadow-lg custom-control top-4 right-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-green-400" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                        d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                </svg>
                <span class="text-sm font-bold whitespace-nowrap">Optimal Mileage: 0</span>
            </div>

            <div id="legend-control"
                class="custom-control absolute top-4 left-4 bg-white p-3 rounded-lg shadow-lg space-y-1.5 text-sm text-gray-700 z-50">
                <div class="flex items-center">
                    <div class="w-3 h-3 mr-2 bg-green-500 rounded"></div><span>0 - 10 miles (Zone A)</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 mr-2 bg-yellow-500 rounded"></div><span>10 - 20 miles (Zone B)</span>
                </div>
                <div class="flex items-center pt-2 mt-2 border-t border-gray-100">
                    <div class="w-3 h-3 mr-2 border border-red-500 rounded-full"></div><span>Click Restricted Zone (&lt;
                        20 mi)</span>
                </div>
            </div>

            <div id="distance-info-left"
                class="absolute z-50 w-48 p-3 text-sm text-gray-700 bg-white rounded-lg shadow-lg custom-control left-4"
                style="top:230px; display:none;">
                <div class="mb-1 font-semibold text-gray-800">Optimal Route Distance</div>
                <div id="route-loading-indicator" class="flex justify-center py-2" style="display:none;">
                    <div class="loading-spinner"></div>
                </div>
                <div id="route-info-content">
                    <div class="flex items-center justify-between py-1 border-t border-gray-100">
                        <span class="text-xs font-medium">Miles:</span>
                        <span id="dist-miles-left" class="text-base font-bold text-red-600">0.0</span>
                    </div>
                    <div class="flex items-center justify-between py-1 border-t border-gray-100">
                        <span class="text-xs font-medium">Kilometers:</span>
                        <span id="dist-km-left" class="text-base font-bold text-red-600">0.0</span>
                    </div>
                </div>
            </div>

            <div id="straight-line-info"
                class="absolute z-50 p-2 text-xs text-gray-500 bg-white rounded-lg shadow-lg bottom-4 left-4 custom-control"
                style="display:none;">
                Straight Line Miles: <span id="straight-line-miles" class="font-bold text-gray-700">0.0</span>
            </div>

            <div id="map-fallback" class="absolute inset-0 flex items-center justify-center bg-gray-100/90 rounded-xl"
                style="display:none;">
                <p class="p-4 text-lg font-medium text-red-600">
                    Map failed to load. Please check your connection or browser settings.
                </p>
            </div>
        </div>

        <button id="clear-button"
            class="w-full py-2 font-semibold text-white transition duration-150 ease-in-out bg-red-500 rounded-lg shadow hover:bg-red-600">
            Clear Map Points
        </button>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            try {
                const map = L.map('map').setView([7.1907, 125.4553], 10);

                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/">OSM</a> contributors, &copy; CARTO',
                    maxZoom: 18
                }).addTo(map);

                const MILES_TO_METERS = 1609.34;
                const MILEAGE_THRESHOLD_B = 10;

                let firstLatLng = null;
                let secondLatLng = null;
                let routingControl = null;
                let markerA = null;
                let markerB = null;

                const distanceDisplayRight = document.getElementById('mileage-display').querySelector('span');
                const distanceInfoLeftDiv = document.getElementById('distance-info-left');
                const routeLoadingIndicator = document.getElementById('route-loading-indicator');
                const routeInfoContent = document.getElementById('route-info-content');
                const distMilesLeft = document.getElementById('dist-miles-left');
                const distKmLeft = document.getElementById('dist-km-left');
                const straightLineInfoDiv = document.getElementById('straight-line-info');
                const straightLineMilesSpan = document.getElementById('straight-line-miles');

                const customPin = (label) => L.divIcon({
                    className: 'custom-pin',
                    html: `<div class="p-1 bg-white rounded-full shadow-xl ring-2 ring-offset-2 ring-red-500" title="${label}"><div class="w-2 h-2 bg-red-600 rounded-full"></div></div>`,
                    iconSize: [20, 20],
                    iconAnchor: [10, 20]
                });

                function distanceInMiles(latlng1, latlng2) {
                    const R = 3958.8; // Earth radius in miles
                    const dLat = (latlng2.lat - latlng1.lat) * Math.PI / 180;
                    const dLon = (latlng2.lng - latlng1.lng) * Math.PI / 180;
                    const a = Math.sin(dLat / 2) ** 2 + Math.cos(latlng1.lat * Math.PI / 180) * Math.cos(latlng2
                        .lat * Math.PI / 180) * Math.sin(dLon / 2) ** 2;
                    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                    return R * c;
                }

                function updateStraightLineMileage(latlngA, latlngB) {
                    if (latlngA && latlngB) {
                        const miles = distanceInMiles(latlngA, latlngB).toFixed(1);
                        straightLineMilesSpan.textContent = miles;
                        straightLineInfoDiv.style.display = 'block';
                        return parseFloat(miles);
                    } else {
                        straightLineInfoDiv.style.display = 'none';
                        straightLineMilesSpan.textContent = '0.0';
                        return 0;
                    }
                }

                function updateOptimalRouteDisplay(distanceInMeters) {
                    const miles = (distanceInMeters / MILES_TO_METERS).toFixed(1);
                    const km = (distanceInMeters / 1000).toFixed(1);
                    routeLoadingIndicator.style.display = 'none';
                    routeInfoContent.style.display = 'block';
                    distanceDisplayRight.textContent = `Optimal Mileage: ${miles}`;
                    distMilesLeft.textContent = miles;
                    distKmLeft.textContent = km;
                    distanceInfoLeftDiv.style.display = 'block';
                }

                function calculateOptimalRoute(latlngA, latlngB) {
                    routeLoadingIndicator.style.display = 'flex';
                    routeInfoContent.style.display = 'none';
                    if (routingControl) map.removeControl(routingControl);

                    routingControl = L.Routing.control({
                        router: L.Routing.osrmv1({
                            serviceUrl: 'https://router.project-osrm.org/route/v1'
                        }),
                        waypoints: [latlngA, latlngB],
                        routeWhileDragging: false,
                        show: false,
                        lineOptions: {
                            styles: [{
                                color: 'red',
                                weight: 6,
                                opacity: 0.8
                            }]
                        }
                    }).addTo(map);

                    routingControl.on('routesfound', function(e) {
                        const route = e.routes[0];
                        updateOptimalRouteDisplay(route.summary.totalDistance);
                        map.fitBounds(route.bounds, {
                            padding: [50, 50]
                        });
                    });

                    routingControl.on('routingerror', function(e) {
                        console.error('Routing Error:', e.error.message);
                        alert('Routing failed. Check the points or try again.');
                    });
                }

                function clearMap() {
                    if (routingControl) map.removeControl(routingControl);
                    if (markerA) map.removeLayer(markerA);
                    if (markerB) map.removeLayer(markerB);
                    firstLatLng = null;
                    secondLatLng = null;
                    markerA = null;
                    markerB = null;
                    updateOptimalRouteDisplay(0);
                    distanceInfoLeftDiv.style.display = 'none';
                    straightLineInfoDiv.style.display = 'none';
                }

                map.on('click', function(e) {
                    const clicked = e.latlng;
                    if (!firstLatLng) {
                        firstLatLng = clicked;
                        markerA = L.marker(clicked, {
                            icon: customPin('Pick-up')
                        }).addTo(map).bindPopup('Pick-up').openPopup();
                        console.log('Point A (Pick-up) set. Next click must be >= 20 miles away.');
                    } else if (!secondLatLng) {
                        const dist = updateStraightLineMileage(firstLatLng, clicked);
                        if (dist < MILEAGE_THRESHOLD_B) {
                            alert(`Drop-off must be at least ${MILEAGE_THRESHOLD_B} miles from Pick-up.`);
                            return;
                        }
                        secondLatLng = clicked;
                        markerB = L.marker(clicked, {
                            icon: customPin('Drop-off')
                        }).addTo(map).bindPopup('Drop-off').openPopup();
                        calculateOptimalRoute(firstLatLng, secondLatLng);
                        console.log('Point B (Drop-off) set. Optimal route calculation started.');
                    } else {
                        clearMap();
                        firstLatLng = clicked;
                        markerA = L.marker(clicked, {
                            icon: customPin('Pick-up')
                        }).addTo(map).bindPopup('Pick-up').openPopup();
                        console.log('Map reset. New Point A set.');
                    }
                });

                document.getElementById('clear-button').addEventListener('click', clearMap);

            } catch (error) {
                console.error('Leaflet map failed to initialize:', error);
                document.getElementById('map').style.display = 'none';
                document.getElementById('map-fallback').style.display = 'flex';
            }
        });
    </script>