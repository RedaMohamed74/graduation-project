<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!--required meta for mobile-->
        <title>أجزخانه</title>
        <link rel="stylesheet" href="{{URL::to('src/css/bootstrap.css')}}"/>
        <link rel="stylesheet" href="{{URL::to('src/css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{URL::to('src/css/magnific-popup.css')}}"/>
        <link rel="stylesheet" href="{{URL::to('src/css/jquery-ui.css')}}"/>
        <link rel="stylesheet" href="{{URL::to('src/css/hover.css')}}">
        <link rel="stylesheet" href="{{URL::to('src/css/Animate.css')}}">
        <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}"/>
        <link rel="stylesheet" href="{{URL::to('src/css/profile.css')}}"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=El+Messiri" > <!--elmessiri font-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

        <style>
            .white-popup {
                position: relative;
                background:#fff;
                padding: 20px;
                width: auto;
                max-width: 500px;
                margin: 20px auto;
                }
        </style>
    </head>

    <body>
@include('pages/header')
 

     <!-- validation -->
     <div style="position: absolute;z-index:99999999;margin:auto;right: 0;left: 0;width: 50%;">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <i style="cursor:pointer" class="fa fa-times-circle-o" aria-hidden="true"></i>
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">
                <i style="cursor:pointer" class="fa fa-times-circle-o" aria-hidden="true"></i>
                {{Session::get('fail')}}
            </div>
        @endif
    </div>
    <div style="position: absolute;z-index:99999999;margin:auto;right: 0;left: 0;width: 50%;">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <i style="cursor:pointer" class="fa fa-times-circle-o" aria-hidden="true"></i>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

     <!-- end validation -->


     <div id="home" class="loadedContent">
         @yield('content')
     </div>

    @include('pages/footer')
     <!--start-scroll-top-->
        <div class="top">
            <i class="fa fa-arrow-up fa-2x" style="padding-top:7px"></i>
        </div>
     <!--end-scroll-top

      <!--jquery-->
        <script src="{{URL::to('js/jquery-1.12.4.min.js')}}"></script>  
        <script src="{{URL::to('js/bootstrap.min.js')}}"></script> 
        <script src="{{URL::to('js/jquery.magnific-popup.min.js')}}"></script> 
        <script src="{{URL::to('js/jquery-ui.js')}}"></script>
        <script src="{{URL::to('js/jquery.nicescroll.min.js')}}"></script>
        <script src="{{URL::to('js/wow.min.js')}}"></script>
        <script src="{{URL::to('js/style.js')}}"></script>
        <script src="{{URL::to('js/locationpicker.jquery.js')}}"></script>
        <script>
        var map, infoWindow;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                radius: 100,
                zoom: 12,
            });
            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    $('#lat').val(position.coords.latitude);
                    $('#lng').val(position.coords.longitude);

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }
            
            $(document).ready(function() {
                
                $('.open-popup-link').magnificPopup({
                   type:'inline',
                   midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
                });
                $( function() {
                   $( "#datepicker" ).datepicker();
                });
                $( function() {
                   $( "#datepicker1" ).datepicker();
                });
                $( function() {
                   $( "#datepicker2" ).datepicker();
                });        
            });
            
            
            
        </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6AxLHGqIYfiFRkC3ijEKdjZIX47J9Vis&callback=initMap">
    </script>    
         <!--wow-->
        <script>
            new WOW().init();
        </script>

 </body>
 </html>