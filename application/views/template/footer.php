<!--FOOTER 1-->
<footer class="footer1">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
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
                <div class="col-xs-6">
                    <style>
                        #map {
                            width: 550px;
                            height: 300px;
                            background-color: #CCC;
                        }
                    </style>
                    <script src="https://maps.googleapis.com/maps/api/js"></script>
                    <script>
                        function initialize() {
                            var myLatLng = {lat: -7.62069, lng: 109.24183};
                            var mapCanvas = document.getElementById('map');
                            var mapOptions = {
                                center: new google.maps.LatLng(myLatLng),
                                zoom: 14,
                                mapTypeId: google.maps.MapTypeId.MAP
                            };
                            var map = new google.maps.Map(mapCanvas, mapOptions);
                            var marker = new google.maps.Marker({
                                position: myLatLng,
                                map: map,
                                title: 'Randu Jati'
                            });
                        }
                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>
                    <div id="map"></div>
                </div>
                <style type="text/css">
                    .container .jumbotron{
                        padding: 1px 25px 1px 25px;
                    }

                    .jumbotron p {
                        font-size: 10px;
                    }
                </style>
                <div class="col-xs-3 jumbotron">
                    <h3 class="text-info">Testimoni</h3> <hr>
                    <?php foreach ($testimonis_footer as $testimoni_foot): ?>
                        <p><?php echo $testimoni_foot->name; ?> - <?php echo $testimoni_foot->kota; ?></p>
                        <p><?php echo $testimoni_foot->pesan; ?></p>
                        <hr>
                    <?php endforeach ?>
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