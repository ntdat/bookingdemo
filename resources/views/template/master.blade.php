<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 	 ]>    <html class="ie" lang="en"> <![endif]-->
<!--[if lt IE 9]><script src="{!! URL('public/template/js/html5.js') !!}"></script><![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Book Your Travel</title>
    <!-- Booking Calendar -->
    <link rel="stylesheet" href="{!! URL('public/template/js/dopbcp/assets/gui/css/css-reset.css') !!}" type="text/css"  />
    <link rel="stylesheet" href="{!! URL('public/template/js/dopbcp/assets/gui/css/jquery.dop.Select.css') !!}" type="text/css"  />
    <link rel="stylesheet" href="{!! URL('public/template/js/dopbcp/templates/default/css/jquery.dop.FrontendBookingCalendarPRO.css') !!}" type="text/css"  />

    <!-- //Booking Calendar -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! URL('public/template/css/style.css') !!}" type="text/css" media="screen,projection,print" />
    <link rel="stylesheet" href="{!! URL('public/template/css/prettyPhoto.css') !!}" type="text/css" media="screen" /><link rel="stylesheet" href="{!! URL('public/template/css/theme-turqoise.css') !!}" id="template-color" />
    <link rel="shortcut icon" href="{!! URL('public/template/images/favicon.ico') !!}"/>
    <link rel="stylesheet" href="{!! URL('public/template/css/styler.css') !!}" type="text/css" media="screen,projection,print" />

</head>
<body>
<!-- TEMPLATE STYLES -->
<div id="template-styles">
    <h2>Template Styles <a href="#"><img class="s-s-icon" src="{!! URL('public/template/images/settings.png') !!}" alt="Style switcher" /></a></h2>
    <div>
        <h3>Colors</h3>
        <ul class="colors" >
            <li><a href="#" class="yellow" title="yellow"></a></li>
            <li><a href="#" class="orange" title="orange"></a></li>
            <li><a href="#" class="strawberry" title="strawberry"></a></li>
            <li><a href="#" class="pink" title="pink"></a></li>
            <li><a href="#" class="purple" title="purple"></a></li>
            <li><a href="#" class="blue" title="blue"></a></li>
            <li><a href="#" class="black" title="black"></a></li>
        </ul>

        <h3>Background Image</h3>
        <ul class="colors bg" id="bg">
            <li><a href="#" class="bg1"></a></li>
            <li><a href="#" class="bg2"></a></li>
            <li><a href="#" class="bg3"></a></li>
            <li><a href="#" class="bg4"></a></li>
            <li><a href="#" class="bg5"></a></li>
            <li><a href="#" class="bg6"></a></li>
            <li><a href="#" class="bg7"></a></li>
            <li><a href="#" class="bg8"></a></li>
            <li><a href="#" class="bg9"></a></li>
            <li><a href="#" class="bg10"></a></li>
            <li><a href="#" class="bg11"></a></li>
            <li><a href="#" class="bg12"></a></li>
            <li><a href="#" class="bg13"></a></li>
            <li><a href="#" class="bg14"></a></li>
            <li><a href="#" class="bg15"></a></li>
            <li><a href="#" class="bg16"></a></li>
            <li><a href="#" class="bg17"></a></li>
            <li><a href="#" class="bg18"></a></li>
            <li><a href="#" class="bg19"></a></li>
            <li><a href="#" class="bg20"></a></li>
            <li><a href="#" class="bg21"></a></li>
            <li><a href="#" class="bg22"></a></li>
            <li><a href="#" class="bg23"></a></li>
            <li><a href="#" class="bg24"></a></li>
            <li><a href="#" class="bg25"></a></li>
            <li><a href="#" class="bg26"></a></li>
            <li><a href="#" class="bg27"></a></li>
            <li><a href="#" class="bg28"></a></li>
            <li><a href="#" class="bg29"></a></li>
            <li><a href="#" class="bg30"></a></li>
        </ul>
    </div>
</div>

<!--header-->
<header>
    <div class="wrap clearfix">
        <!--logo-->
        <h1 class="logo"><a href="{!! route('template.index') !!}" title="Book Your Travel - home"><img src="{!! URL('public/template/images/txt/logo.png') !!}" alt="Book Your Travel" /></a></h1>
        <!--//logo-->

        <!--ribbon-->
        <div class="ribbon">
            <nav>
                <ul class="profile-nav">
                    <li class="active"><a href="#" title="My Account">My Account</a></li>
                    <li><a href="login.html" title="Login">Login</a></li>
                    <li><a href="my_account.html" title="Settings">Settings</a></li>
                </ul>
                <ul class="lang-nav">
                    <li class="active"><a href="#" title="English (US)">English (US)</a></li>
                    <li><a href="#" title="English (UK)">English (UK)</a></li>
                    <li><a href="#" title="Deutsch">Deutsch</a></li>
                    <li><a href="#" title="Italiano">Italiano</a></li>
                    <li><a href="#" title="???????">???????</a></li>
                </ul>
                <ul class="currency-nav">
                    <li class="active"><a href="#" title="$US Dollar">$US Dollar</a></li>
                    <li><a href="#" title="€ Euro">€ Euro</a></li>
                    <li><a href="#" title="£ Pound">£ Pound</a></li>
                </ul>
            </nav>
        </div>
        <!--//ribbon-->

        <!--search-->
        <div class="search">
            <form id="search-form" method="get" action="search-form">
                <input type="search" placeholder="Search entire site here" name="site_search" id="site_search" />
                <input type="submit" id="submit-site-search" value="submit-site-search" name="submit-site-search"/>
            </form>
        </div>
        <!--//search-->

        <!--contact-->
        <div class="contact">
            <span>24/7 Support number</span>
            <span class="number">1- 555 - 555 - 555</span>
        </div>
        <!--//contact-->
    </div>

    <!--main navigation-->
    <nav class="main-nav" role="navigation">
        <ul class="wrap" id="nav">
            <li><a href="hotels.html" title="Hotels">Hotels</a>
                <ul>
                    <li><a href="#">Secondary navigation</a></li>
                    <li><a href="#">example links</a>
                        <ul>
                            <li><a href="#">Third level navigation</a></li>
                            <li><a href="#">example links</a>
                                <ul>
                                    <li><a href="#">Fourth level navigation</a></li>
                                    <li><a href="#">example links</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="flights.html" title="Flights">Flights</a></li>
            <li><a href="flight_and_hotels.html" title="Flight + Hotel">Flight + Hotel</a></li>
            <li><a href="self_catering.html" title="Self catering">Self catering</a></li>
            <li><a href="cruise.html" title="Cruises">Cruises</a></li>
            <li><a href="car_rental.html" title="Car rental">Car rental</a></li>
            <li><a href="hot_deals.html" title="Hot deals">Hot deals</a></li>
            <li><a href="#" title="Vacations">Vacations</a></li>
            <li><a href="#" title="Business travel">Business travel</a></li>
            <li><a href="blog.html" title="Blog">Blog</a>
                <ul>
                    <li><a href="blog_single.html" title="Single Post">Single Post</a>
                </ul>
            </li>
            <li><a href="get_inspired.html" title="Get inspired">Get inspired</a></li>
            <li><a href="#" title="Travel guides">Travel guides</a>
                <ul>
                    <li><a href="location.html">Location Details</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!--//main navigation-->
</header>
@yield('content')
<!--footer-->
<footer>
    <div class="wrap clearfix">
        <!--column-->
        <article class="one-fourth">
            <h3>Book Your Travel</h3>
            <p>1400 Pennsylvania Ave. Washington, DC</p>
            <p><em>P:</em> 24/7 customer support: 1-555-555-5555</p>
            <p><em>E:</em> <a href="#" title="booking@mail.com">booking@mail.com</a></p>
        </article>
        <!--//column-->

        <!--column-->
        <article class="one-fourth">
            <h3>Customer support</h3>
            <ul>
                <li><a href="#" title="Faq">Faq</a></li>
                <li><a href="#" title="How do I make a reservation?">How do I make a reservation?</a></li>
                <li><a href="#" title="Payment options">Payment options</a></li>
                <li><a href="#" title="Booking tips">Booking tips</a></li>
            </ul>
        </article>
        <!--//column-->

        <!--column-->
        <article class="one-fourth">
            <h3>Follow us</h3>
            <ul class="social">
                <li class="facebook"><a href="#" title="facebook">facebook</a></li>
                <li class="youtube"><a href="#" title="youtube">youtube</a></li>
                <li class="rss"><a href="#" title="rss">rss</a></li>
                <li class="linkedin"><a href="#" title="linkedin">linkedin</a></li>
                <li class="googleplus"><a href="#" title="googleplus">googleplus</a></li>
                <li class="twitter"><a href="#" title="twitter">twitter</a></li>
                <li class="vimeo"><a href="#" title="vimeo">vimeo</a></li>
                <li class="pinterest"><a href="#" title="pinterest">pinterest</a></li>
            </ul>
        </article>
        <!--//column-->

        <!--column-->
        <article class="one-fourth last">
            <h3>Don’t miss our exclusive offers</h3>
            <form id="newsletter" action="newsletter.php" method="post">
                <fieldset>
                    <input type="email" id="newsletter_signup" name="newsletter_signup" placeholder="Enter your email here" />
                    <input type="submit" id="newsletter_submit" name="newsletter_submit" value="Signup" class="gradient-button" />
                </fieldset>
            </form>
        </article>
        <!--//column-->

        <section class="bottom">
            <p class="copy">Copyright 2012 Book your travel ltd. All rights reserved</p>
            <nav>
                <ul>
                    <li><a href="#" title="About us">About us</a></li>
                    <li><a href="contact.html" title="Contact">Contact</a></li>
                    <li><a href="#" title="Partners">Partners</a></li>
                    <li><a href="#" title="Customer service">Customer service</a></li>
                    <li><a href="#" title="FAQ">FAQ</a></li>
                    <li><a href="#" title="Careers">Careers</a></li>
                    <li><a href="#" title="Terms & Conditions">Terms &amp; Conditions</a></li>
                    <li><a href="#" title="Privacy statement">Privacy statement</a></li>
                </ul>
            </nav>
        </section>
    </div>
</footer>
<!--//footer-->

<script type="text/javascript" src="{!! url('public/template/js/jquery-1.11.3.min.js') !!}"></script>
<script language="javascript">
    $(document).ready(function () {
        $("a.calendar").on('click',function()
        {
            window.booktype  = $(this).attr('data-type');
            window.token  = $(this).attr('data-token');
        });
    });
</script>
<script type="text/javascript" src="{!! url('public/template/js/jquery-ui.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/dopbcp/assets/js/jquery.dop.Select.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/dopbcp/assets/js/dop-prototypes.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/dopbcp/assets/js/jquery.dop.FrontendBookingCalendarPRO.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/jquery-migrate-1.2.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/sequence.jquery-min.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/sequence.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/selectnav.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/jquery.uniform.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/jquery.raty.min.js') !!}"></script>

<script type="text/javascript" src="{!! url('public/template/js/jquery.prettyPhoto.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/modernizr.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/template/js/scripts.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".form").hide();
        $(".form:first").show();
        $(".f-item:first").addClass("active");
        $(".f-item:first span").addClass("checked");
    });

</script>

<script type="text/javascript">
    $(document).ready(function() {
        var baseUrl = window.location.origin;
        $('dt').each(function() {
            var tis = $(this), state = false, answer = tis.next('dd').hide().css('height','auto').slideUp();
            tis.click(function() {
                state = !state;
                answer.slideToggle(state);
                tis.toggleClass('active',state);
            });
        });

        $('.view-type li:first-child').addClass('active');

        $('#star').raty({
            score    : 3,
            starOff : baseUrl+'/public/template/images/ico/star-rating-off.png',
            starOn  : baseUrl+'/public/template/images/ico/star-rating-on.png',
            click: function(score, evt) {
                alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
            }
        });
    });

    $(window).load(function () {
        var maxHeight = 0;

        $(".three-fourth .one-fourth").each(function(){
            if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
        });
        $(".three-fourth .one-fourth").height(maxHeight);
    });
</script>
<script>selectnav('nav'); </script>
<script type="text/javascript">
    /* Template Styles-----------------------------------------------------------------------------------*/

    window.console = window.console || (function(){
                var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
                return c;
            })();


    jQuery(document).ready(function($) {

        // Color Changer
        $(".yellow" ).click(function(){
            $("#template-color" ).attr("href", "{!! URL('public/template/css/theme-yellow.css') !!}" );
            return false;
        });

        $(".orange" ).click(function(){
            $("#template-color" ).attr("href", "{!! URL('public/template/css/theme-orange.css') !!}" );
            return false;
        });

        $(".strawberry" ).click(function(){
            $("#template-color" ).attr("href", "{!! URL('public/template/css/theme-strawberry.css') !!}" );
            return false;
        });

        $(".pink" ).click(function(){
            $("#template-color" ).attr("href", "{!! URL('public/template/css/theme-pink.css') !!}" );
            return false;
        });

        $(".purple" ).click(function(){
            $("#template-color" ).attr("href", "{!! URL('public/template/css/theme-purple.css') !!}" );
            return false;
        });

        $(".blue" ).click(function(){
            $("#template-color" ).attr("href", "{!! URL('public/template/css/theme-blue.css') !!}" );
            return false;
        });

        $(".black" ).click(function(){
            $("#template-color" ).attr("href", "{!! URL('public/template/css/theme-black.css') !!}" );
            return false;
        });




        $("#template-styles h2 a").click(function(e){
            e.preventDefault();
            var div = $("#template-styles");
            console.log(div.css("left"));
            if (div.css("left") === "-135px") {
                $("#template-styles").animate({
                    left: "0px"
                });
            } else {
                $("#template-styles").animate({
                    left: "-135px"
                });
            }
        })


        $(".colors li a").click(function(e){
            e.preventDefault();
            $(this).parent().parent().find("a").removeClass("active");
            $(this).addClass("active");
        })

        $(".bg li a").click(function(e){
            e.preventDefault();
            $(this).parent().parent().find("a").removeClass("active");
            $(this).addClass("active");
            var bg = $(this).css("backgroundImage");
            $("body,.main").css("backgroundImage",bg)
        })



    });

</script>

</body>
</html>