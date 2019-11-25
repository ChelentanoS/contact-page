;(function () {
    'use strict';
    testBrightechMap();
    formValidate();
    validateFormOnSubmit();

    function testBrightechMap() {
        let templateUrl = object_name.templateUrl,
            marker,
            map;

        function initMap() {
            let styles = [
                {
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
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
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
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
                            "color": "#000000"
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
                            "color": "#000000"
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
                            "color": "#000000"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                }
            ];

            let styledMap = new google.maps.StyledMapType(styles, {
                name: "Styled Map"
            });
            let mapProp = {
                center: new google.maps.LatLng(50.4547, 30.5238),
                zoom: 13,
                panControl: false,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: true,
                streetViewControl: false,
                overviewMapControl: false,
                rotateControl: true,
                scrollwheel: false,
                fullscreenControl: false
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), mapProp);

            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(50.4547, 30.5238),
                animation: google.maps.Animation.DROP,
                icon: templateUrl + '/img/map-marker.png',
            });

            marker.setMap(map);
            map.panTo(marker.position);
        }

        window.onload = function () {
            let doc = document,
                el1 = doc.getElementById('loc1'),
                el2 = doc.getElementById('loc2'),
                el3 = doc.getElementById('loc3'),
                el4 = doc.getElementById('loc4');

            if (el1) {
                el1.addEventListener("click", function () {
                    changeMarkerPos(50.4547, 30.5238);
                });
            }
            if (el2) {
                el2.addEventListener("click", function () {
                    changeMarkerPos(40.730610, -73.935242);
                });
            }
            if (el3) {
                el3.addEventListener("click", function () {
                    changeMarkerPos(41.390205, 2.154007);
                });
            }
            if (el4) {
                el4.addEventListener("click", function () {
                    changeMarkerPos(41.902782, 12.496366);
                });
            }
        };

        function changeMarkerPos(lat, lon) {
            let myLatLng = new google.maps.LatLng(lat, lon)
            marker.setPosition(myLatLng);
            map.panTo(myLatLng);
        }

        google.maps.event.addDomListener(window, 'load', initMap);

    }

    function formValidate() {
        let toValidate = document.getElementsByClassName('to_validate'),
            valErrors = Array(toValidate.length).fill(true),
            foundError = true;

        for (let i = 0; i < toValidate.length; ++i) {
            toValidate[i].addEventListener('input', function (event) {
                let type = toValidate[i].type;
                if (type === 'checkbox') {
                    valErrors[i] = !this.checked;
                } else {
                    valErrors[i] = this.value.length < 1;
                }

                foundError = valErrors.find(function (element) {
                    return element === true;
                });

                document.getElementById("submit").disabled = foundError;
            });
        }
    }

    function validateFormOnSubmit() {
        let form = document.getElementById('contact'),
            submit = document.getElementById('submit');

        if (!form || !submit) return false;

        form.onsubmit = function () { // Prevent page refresh
            return false;
        };
        submit.addEventListener('click', function (event) {
            if (form === undefined) return false;

            let valErrors = "";
            valErrors += validateName(form.name);
            valErrors += validateEmail(form.email);
            valErrors += validatePhone(form.phone);
            valErrors += validateTerms(form.terms);

            if (valErrors.length > 0) {
                console.log(valErrors);
                event.preventDefault();
                return false;
            } else {
                let xmlhttp = window.XMLHttpRequest ?
                    new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200)
                        console.log('Status: ' + this.responseText);
                };

                let name = form.name.value,
                    email = form.email.value,
                    phone = form.phone.value;

                xmlhttp.open("POST", "http://httpbin.org/post", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("name=" + name + "&email=" + email + "&phone=" + phone);
                form.reset();
                document.getElementById("submit").disabled = true;
                alert('Success!');
            }
        });
    }

    function validateName(name) {
        let error = "";

        if (name.value.length === 0) {
            name.style.color = 'Red';
            error = "1";
        } else {
            name.style.color = '';
        }
        return error;
    }

    function trim(s) {
        return s.replace(/^\s+|\s+$/, '');
    }

    function validateEmail(email) {
        let error = "",
            temail = trim(email.value),
            emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/,
            illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/,
            emailError = document.getElementById('contact_email-error');

        if (email.value === "") {
            email.style.color = 'Red';
            emailError.innerHTML = "Please enter an email address.";
            error = "2";
        } else if (!emailFilter.test(temail)) {
            email.style.color = 'Red';
            emailError.innerHTML = "Please enter a valid email address.";
            error = "3";
        } else if (email.value.match(illegalChars)) {
            email.style.color = 'Red';
            emailError.innerHTML = "Email contains invalid characters.";
            error = "4";
        } else {
            email.style.color = '';
            emailError.innerHTML = '';
        }
        return error;
    }

    function validatePhone(phone) {
        let error = "",
            stripped = phone.value.replace(/[\(\)\.\-\ ]/g, ''),
            phoneError = document.getElementById('contact_phone-error');

        if (phone.value === "") {
            phone.style.color = 'Red';
            phoneError.innerHTML = "Please enter a phone number";
            error = '5';
        } else if (isNaN(parseInt(stripped))) {
            error = "6";
            phoneError.innerHTML = "The phone number contains illegal characters.";
            phone.style.color = 'Red';
        } else if (stripped.length < 10) {
            error = "7";
            phoneError.innerHTML = "The phone number is too short.";
            phone.style.color = 'Red';
        } else {
            phone.style.color = '';
            phoneError.innerHTML = '';
        }
        return error;
    }

    function validateTerms(terms) {
        let error = "",
            termsError = document.getElementById('contact_terms-error');
        if (terms.checked === false) {
            document.getElementById("input_checkbox").style.borderColor = 'Red';
            termsError.innerHTML = "Required";
            error = "8";
        } else {
            document.getElementById("input_checkbox").style.borderColor = '';
            termsError.innerHTML = "";
        }
        return error;
    }

})();
