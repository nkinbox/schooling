 <div class="super_offers1">
    <a href="index.php#offers" target="_blank" style="text-decoration: none;color: #fff;">Super Offers</a>
</div>         
    <style type="text/css">
        .super_offers1
        {
        height: 38px;
    width: 138px;
    line-height: 30px;
    font-weight: 600;
    color: #fff !important;
    transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
    text-align: center;
    border: 2px solid rgb(235,121,35);
    font-size: 17px;
    position: fixed;
    left: -47px;
    top: 45%;
    z-index: 999;
    background: rgb(235,121,35);
    /* padding-top: 10px; */
    /* padding-bottom: 10px; */
    /* color: #fff !important; */
        }
    </style>
<?php  //$ordercounter=$GFH_Admin->getOrder();
    
    //if(@mysqli_num_rows($ordercounter)>0){
       // $ordertime=@mysqli_fetch_assoc($ordercounter);
        // echo "<pre>";print_r($ordertime);die;
        //$counterdate=date('M d, Y h:i:s',strtotime('+72 hour',strtotime($ordertime['order_date'])));
        // echo "<pre>";print_r($counterdate);
 ?>
<!-- <div class="counter_play">-->
<!--    <h1 id="timing"></h1>-->
<!--</div>-->
<script>

    // Set the date we're counting down to
    //var countDownDate = new Date("<?php echo isset($counterdate)?$counterdate:''; ?>").getTime();

    
// Update the count down every 1 second
//var x = setInterval(function() {

  // Get todays date and time
  //var now = new Date().getTime();

  // Find the distance between now an the count down date
  //var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  //var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  //var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  //var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  //document.getElementById("timing").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        //if (distance < 0) {
          //  clearInterval(x);
            /*document.getElementById("demo").innerHTML = "EXPIRED";*/
            //$("#timing").css("display","none");
        //}
    //}, 1000);
</script>
<?php //} ?>
    <!-- Footer Start -->
    <footer id="footer"> 
        <div class="">
            <div class="row">
                <div class="footer-img">
                    <img src="assets/images/footer1.png" style="height: 180px;width: 180px;position: absolute;margin-left: 71px;margin-top: 20px">
                    <img src="assets/images/footer2.png" style="height: 180px;width: 180px;float: right;    margin-right: 47px;">
                </div>
                <div class="blue-footer">
                    <div class="col-md-3">
                        <div class="footer-line">
                            <h3>About Us</h3>
                            <ul>
                                <li><a href="http://blog.schoolling.com/" target="_blank">Blog</a></li>
                                 <?php  $pages=$GFH_Admin->getActivePages('5'); 
                                    if(mysqli_num_rows($pages)>0){
                                    while($page=mysqli_fetch_assoc($pages)){
                                        // echo "<pre>";print_r($page);die;
                                   ?>
                                <li><a href="images/page/<?php echo isset($page['page_image'])?$page['page_image']:'';  ?>" target="_blank"><?php echo isset($page['page_name'])?$page['page_name']:'';  ?></a></li>

                                <?php } } ?>
                               <!--  <li><a href="assets/pdf/About_Us_Schoolling.pdf" target="_blank">Terms & Service Agreement</a></li>
                                <li><a href="" target="_blank">Disclaimer</a></li>
                                <li><a href="" target="_blank">Refund/Cancellation Policy</a></li>
 -->
                                <li><a href="https://www.google.co.in/search?q=schoolling&rlz=1C1CHBF_enIN771IN771&oq=schoolling&aqs=chrome..69i57j69i60l2j69i61.4494j0j1&sourceid=chrome&ie=UTF-8#lrd=0x390d0274f1d58e73:0x19df3ac38a31242e,1,,," target="_blank">Like Us?Rate us on Google Reviews</a></li>
                               <!--  <li><a href="" target="_blank">Sitemap</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-left: 0px;">
                        <div class="footer-line">
                            <h3>Contact Us</h3>
                            <h5 style="color: #fff !important; margin-top: 20px">Address : </h5>
                            <h5 style="color: #fff !important;"><?php echo isset($siteinfo['address'])?$siteinfo['address']:'';  ?></h5>
                            <h5 style="color: #fff !important;">Email:<?php echo isset($siteinfo['email'])?$siteinfo['email']:'';  ?></h5>
                            <h5 style="color: #fff !important;">M:+91-<?php echo isset($siteinfo['phone'])?$siteinfo['phone']:'';  ?></h5>
                            <!-- <ul>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Blog</a></li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="footer-line">
                            <h3 class="text-center" style="margin-left: -75px;">Explore</h3>
                            <div class="col-md-12">
                                <style>
                                    
                                    #limheight {
                                            height: 300px;
                                            -webkit-column-count: 2;
                                               -moz-column-count: 2;
                                                    column-count: 2; /*3 is just placeholder -- can be anything*/
                                                    width:450px;
                                        }
                                        #limheight li {
                                            display: inline-block;
                                            padding-bottom: 0px;
                                            margin-left: 20px;    
                                        }
                                        #limheight li a {
                                            color: rgb(0, 162, 232);
                                        }
                                </style>
                                <ul id="limheight">
                            <?php  $allregions=$GFH_Admin->getRegions();
                      if(mysqli_num_rows($allregions)>0){
                        while($allregion=mysqli_fetch_assoc($allregions)){
                     ?>
                            
                                <li><a href="apply-to-schools.php?region=<?php echo isset($allregion['name'])?$allregion['name']:''  ?>" target="_blank">Schools in <?php echo isset($allregion['name'])?$allregion['name']:''  ?></a></li>
                                <!-- <li><a href="apply-to-schools.php?region=North East Delhi" target="_blank">Schools in North East Delhi</a></li>
                                <li><a href="apply-to-schools.php?region=North North Delhi" target="_blank">Schools in North  Delhi</a></li>
                                <li><a href="apply-to-schools.php?region=Central Delhi" target="_blank">Schools in Central Delhi</a></li>
                                <li><a href="apply-to-schools.php?region=West Delhi" target="_blank">Schools in West Delhi</a></li>
                               
                                <li><a href="apply-to-schools.php?region=East Delhi" target="_blank">Schools in East Delhi</a></li>
                                <li><a href="apply-to-schools.php?region=South West Delhi" target="_blank">Schools in South West Delhi</a></li>
                                <li><a href="apply-to-schools.php?region=South East Delhi" target="_blank">Schools in South East Delhi</a></li>
                                <li><a href="apply-to-schools.php?region=New Delhi" target="_blank">Schools in New Delhi</a></li>
                                <li><a href="apply-to-schools.php?region=South Delhi" target="_blank">Schools in South Delhi</a></li> -->
                               
                            <?php } }?>
                             </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="footer-line">
                            <h3>Actions</h3>
                            <ul>
                                <li><a href="apply-to-schools.php" target="_blank">Apply To Schools </a></li>
                                 <?php if(isset($_SESSION['SCH_USERID'])){


                                }else{  ?>
                                <li><a href="" data-target="#cs-login" data-toggle="modal">Login</a></li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-social">
                    <h4 class="text-center" style="padding-top: 20px;">Schoolling &copy; 2017 all rights reserved</h4>
                      <div class="social_icon">
    <!-- <h5 class="text-center"> Link Accounts</h5> -->
    <ul>
     <li><a href="https://www.facebook.com/schoolling/" target="_blank"><i class="fa fa-facebook fa1" aria-hidden="true"></i></a></li>
       <li><a href="https://www.instagram.com/we_schoolling/?hl=en"  target="_blank"><i class="fa fa-instagram fa1" aria-hidden="true"></i></a></li>
      <li><a href="https://twitter.com/schoolling"  target="_blank"><i class="fa fa-twitter fa1" aria-hidden="true"></i></a></li>
       <li><a href="http://schoolling.com/"  target="_blank"><i class="fa fa-chain-broken fa1" aria-hidden="true"></i></a></li>
        <li><a href="https://youtu.be/3wOcddDLPRw"  target="_blank"><i class="fa fa-youtube-play fa1" aria-hidden="true"></i></a></li>
       <li><a href="https://www.linkedin.com/company/schoolling/" target="_blank"><i class="fa fa-linkedin fa1" aria-hidden="true"></i></a></li>
      <li><a href="https://www.quora.com/profile/Schoolling" target="_blank"><i class="fa fa-quora fa1" aria-hidden="true"></i></a></li>
      
    
    </ul>
  </div>
                </div>   
            </div>
        </div>
        
        
    </footer>
    <!-- Footer End --> 
   <a href="#0" class="cd-top">Top</a>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script src="assets\scripts\responsive.menu.js"></script> <!-- Slick Nav js --> 
<script src="assets\scripts\top.js"></script>
<script src="assets\scripts\chosen.select.js"></script> <!-- Chosen js --> 
<script src="assets\scripts\slick.js"></script> <!-- Slick Slider js --> 
<script src="assets\scripts\jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="assets\scripts\jquery.mobile-menu.min.js"></script><!-- Side Menu js -->
<!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> --> <!-- datepicker conflict -->
<script src="assets\scripts\counter.js"></script><!-- Counter js --> 

<script type="text/javascript">
  function lang1(event) {
    var target = event.target || event.srcElement;
    $('#selectedregion').val(event.target.innerHTML);

}

  function school_type(event) {  
    var target = event.target || event.srcElement;
    //alert(event.target.innerHTML);
    // alert(target);
    $('#select_school').val(event.target.innerHTML);
}


</script>
<script>
$(document).ready(function(){
    $(".search_school").keyup(function(){
        
        var autusearch=$(this).val();
        var selectedregion=$('#selectedregion').val();
        var selectschool=$('#select_school').val();
        //alert(autusearch);
        //alert(selectedregion);
       // alert(select_school);
        
        var selectedregion=$('#selectedregion').val();
        $.ajax({
            type:"POST",
            url:"ajax_auto_search.php",
            data:{'autusearch':autusearch,'selectedregion':selectedregion,'selectschool':selectschool},
            success: function(data){
                // alert(data);
                if(data=='none')
                {

                }else{
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                }
               
            }
        });
    });

  //selectedregion
  $("#region").click(function() {
  // alert('Element ' + $(this).html() + ' was clicked');

});

  $('#btnsearch').click(function(){

    var selectedregion=$('#selectedregion').val();
    var search=$('#search').val();
    var region="";
    if(search!="")
    {
       window.location.href="apply-to-schools.php?q="+search;
    }
    
    if(selectedregion!="")
    {
       region="Delhi";
       region=selectedregion;
       window.location.href="apply-to-schools.php?region="+region+"&q="+search;
    }
  });
});
</script>
<script>
function selectSchool(val) {
$(".search_school").val(val);
$("#suggesstion-box").hide();
}
</script>
<script type="text/javascript">
                $(document).ready(function(e){
          $('.search-panel .dropdown-menu').find('a').click(function(e) {
          e.preventDefault();
          var param = $(this).attr("href").replace("#","");
          var concept = $(this).text();
          $('.search-panel span#search_concept').text(concept);
          $('.input-group #search_param').val(param);
        });
      });

                 $(document).ready(function(e){
          $('.school-panel .dropdown-menu').find('a').click(function(e) {
          e.preventDefault();
          var param = $(this).attr("href").replace("#","");
          var concept = $(this).text();
          $('.school-panel span#school_concept').text(concept);
          $('.input-group #search_param').val(param);
        });
      });
</script>
<script type="text/javascript">
$('#sandbox-container input').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy'
});

$('#sandbox-container input').on('show', function(e){
    console.debug('show', e.date, $(this).data('stickyDate'));
    
    if ( e.date ) {
         $(this).data('stickyDate', e.date);
    }
    else {
         $(this).data('stickyDate', null);
    }
});

$('#sandbox-container input').on('hide', function(e){
    console.debug('hide', e.date, $(this).data('stickyDate'));
    var stickyDate = $(this).data('stickyDate');
    
    if ( !e.date && stickyDate ) {
        console.debug('restore stickyDate', stickyDate);
        $(this).datepicker('setDate', stickyDate);
        $(this).data('stickyDate', null);
    }
});
</script>
<!-- Put all Functions in functions.js --> 
<script src="assets\scripts\functions.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
  $('#play-video').on('click', function(ev) {
 
    $("#video")[0].src += "&autoplay=1";
    ev.preventDefault();
 
  });
});
</script>
<script type="text/javascript">
    $('.iframe').hide();

$('#play-video').click(function(e){
    $('.iframe').show(200);
});

$('.pardeep').show();

$('#play-video').click(function(e){
    $('.pardeep').hide(200);
});
</script>

<script type="text/javascript">
    
    /* jQuery Wiggle - http://www.class.pm/files/jquery/jquery.wiggle/demo/ */
(function($) {
    $.fn.wiggle = function(method, options) {
        options = $.extend({
            degrees: ['2','4','2','0','-2','-4','-2','0'], /* Movement Measurements */
            delay: 30, /* Wiggle Speed */
            limit: null,
            randomStart: true,
            onWiggle: function(o) {},
            onWiggleStart: function(o) {},
            onWiggleStop: function(o) {}
        }, options);
        var methods = {
            wiggle: function(o, step){
                if (step === undefined) {
                    step = options.randomStart ? Math.floor(Math.random() * options.degrees.length) : 0;
                }
                if (!$(o).hasClass('wiggling')) {
                    $(o).addClass('wiggling');
                }
                var degree = options.degrees[step];
                $(o).css({
                    '-webkit-transform': 'rotate(' + degree + 'deg)',
                    '-moz-transform': 'rotate(' + degree + 'deg)',
                    '-o-transform': 'rotate(' + degree + 'deg)',
                    '-sand-transform': 'rotate(' + degree + 'deg)',
                    'transform': 'rotate(' + degree + 'deg)'
                });
                if (step == (options.degrees.length - 1)) {
                    step = 0;
                    if ($(o).data('wiggles') === undefined) {
                        $(o).data('wiggles', 1);
                    }
                    else {
                        $(o).data('wiggles', $(o).data('wiggles') + 1);
                    }
                    options.onWiggle(o);
                }
                if (options.limit && $(o).data('wiggles') == options.limit) {
                    return methods.stop(o);
                }
                o.timeout = setTimeout(function() {
                    methods.wiggle(o, step + 1);
                }, options.delay);
            },
            stop: function(o) {
                $(o).data('wiggles', 0);
                $(o).css({
                    '-webkit-transform': 'rotate(0deg)',
                    '-moz-transform': 'rotate(0deg)',
                    '-o-transform': 'rotate(0deg)',
                    '-sand-transform': 'rotate(0deg)',
                    'transform': 'rotate(0deg)'
                });
                if ($(o).hasClass('wiggling')) {
                    $(o).removeClass('wiggling');
                }
                clearTimeout(o.timeout);
                o.timeout = null;
                options.onWiggleStop(o);
            },
            isWiggling: function(o) {
                return !o.timeout ? false : true;
            }
        };
        if (method == 'isWiggling' && this.length == 1) {
            return methods.isWiggling(this[0]);
        }
        this.each(function() {
            if ((method == 'start' || method === undefined) && !this.timeout) {
                methods.wiggle(this);
                options.onWiggleStart(this);
            }
            else if (method == 'stop') {
                methods.stop(this);
            }
        });
        return this;
    }
})(jQuery);

function wiggleForOneSecond(el){
    el.wiggle();
    setTimeout(function(){el.wiggle('stop')},2000)
}

setInterval(function(){wiggleForOneSecond($('.wiggle'))},5000);

</script>
<script>
function deletecart(prodid)
    {
        $.ajax({
            type:'post',
            url:'ajax_update_cart.php',
            data:{'prodid1':prodid,'delete':'delete'},
            success:function(response1){
                
                   window.location.href="";
              
            }

        });
    }
</script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js&libraries?sensor=false"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC2KYyQkN7XSjDRc9jk5pXOapCe3zxUVDc"></script>
<script type="text/javascript">
      google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('start'));
      var places = new google.maps.places.Autocomplete(document.getElementById('end'));
        google.maps.event.addListener(places, 'place_changed', function () {
        });
    });
</script>
    <style type="text/css">
      #map_canvas { 
            position: relative;
    display: list-item;
    margin-top: 20px;
    height: 306px;
    overflow: hidden;
    width: 54%;
      }
      #hide{position: relative;}
    </style>
    <script type="text/javascript">
    var directionDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;
    
    function initialize() {
      directionsDisplay = new google.maps.DirectionsRenderer();
      var melbourne = new google.maps.LatLng(28.7040592, 77.10249019999992);
      var myOptions = {
        zoom:12,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: melbourne
      }

      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
      directionsDisplay.setMap(map);
    }

    function calcRoute(x) {
  
      var start = document.getElementById("start").value;
      var end = document.getElementById("end").value;
      var distanceInput = document.getElementById("distance");
      
      var request = {
        origin:start, 
        destination:end,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
      };
      
      directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          directionsDisplay.setDirections(response);
          distanceInput.value = response.routes[0].legs[0].distance.value / 1000;
          $('$dis_cal').apend('<input type="text" name="distance" id="distance" readonly="true" />'
);
        }
      });
    }
    </script>
  </head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
  $('.main_container').hide()
  $('.dis_cal').hide();
    $("#hide").click(function(){
    
        $(".main_container").toggle();
        $('.dis_cal').show();
    });
});
</script>
</body>
<?php include 'pop.php'; ?>
</html>