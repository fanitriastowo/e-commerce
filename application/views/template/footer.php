<!--FOOTER 1-->
<footer class="footer1">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="footer-desc">
                        <img class="img-thumbnail" src="<?php echo site_url('assets/images/logo.png') ?>" width="82" height="48" alt="">
                        <p class="text-muted">
                            Aplikasi pemesanan online (e-commerce) furniture <br>
                            seperti kursi, meja, bedset, kithcen set dan banyak lainnya.
                        </p>
                        <p>Buka setiap hari pukul 09.00 - 17.45</p>
                    </div>
                    <ul class="social">
                        <li><a href="https://www.facebook.com/meublerandujati"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-xs-4">
                    <style>
                        #map {
                            width: 400px;
                            height: 250px;
                            background-color: #CCC;
                        }
                    </style>
                    <script src="https://maps.googleapis.com/maps/api/js"></script>
                    <script>
                        function initialize() {
                            var mapCanvas = document.getElementById('map');
                            var mapOptions = {
                                center: new google.maps.LatLng(-7.641227, 109.242690),
                                zoom: 16,
                                mapTypeId: google.maps.MapTypeId.SATELLITE
                            }
                            var map = new google.maps.Map(mapCanvas, mapOptions);
                        }
                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>
                    <div id="map"></div>
                </div>
            </div> <!--/.row--> 
        </div> <!--/.container--> 
    </div> <!--/.footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <div class="pull-left"> Copyright © RANDU JATI - Jalan Bhayangkara RT 02 RW 04 Desa Karangmangu Kroya. (0815-4266-6676) - <?php echo date('Y'); ?></div>
        </div>
    </div> <!--/.footer-bottom--> 
</footer>