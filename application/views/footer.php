  </div>
  <!-- /.container -->
</div>
<div id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-inner">
                <nav>
                    <ul class="nav nav-pills">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Properties</a></li>
                        <li><a href="#">Agencies</a></li>
                        <li><a href="#">Agents</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div><!-- /.footer-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.footer-top -->

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <div class="footer-bottom-left">
                    © 2017 Realsite - Material Real Estate Template. All rights reserved.
                </div><!-- /.footer-bottom-left -->

                <div class="footer-bottom-right">
                    Created by <a href="http://byaviators.com/">Aviators</a>
                </div><!-- /.footer-bottom-right -->
            </div><!-- /.footer-bottom-inner -->
        </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
</div><!-- /.footer -->
            </div><!-- /.page-wrapper-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.transit.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery_002.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery_003.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/collapse.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery_004.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/isotope.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUDaaABwTf-bEjKkoUbiZi2RlIf7OJ-OQ&libraries=weather,geometry,visualization,places,drawing&sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/infobox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/markerclusterer.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-google-map.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/d3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/d3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nv.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/realsite.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/charts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>







<textarea tabindex="-1" style="position: absolute; top: -999px; left: 0px; right: auto; bottom: auto; border: 0px none; padding: 0px; box-sizing: content-box; overflow-wrap: break-word; height: 0px !important; min-height: 0px !important; overflow: hidden; transition: none 0s ease 0s ; font-family: &quot;Roboto&quot;,&quot;Arial&quot;,sans-serif; font-size: 16px; font-weight: 400; font-style: normal; letter-spacing: 0px; text-transform: none; word-spacing: 0px; text-indent: 0px; white-space: pre-wrap; line-height: 24px; width: 230.5px;" class="autosizejs" id="autosizejs">Message
</textarea></body></html>


      <script>
        var map_property = $('#map-property');
         if (map_property.length) {       
             map_property.google_map({
                 markers: [{
                     latitude: <?=$property['latitude']?>,
                     longitude: <?=$property['longitude']?>
                 }]
             });
         }
      </script>