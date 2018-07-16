<?php
$helper = new Helper();
$footer = $helper->footer_content($this->idioma);
?>
<!-- #Footer -->
<footer id="Footer" class="clearfix">
    <!-- .Our_clients_slider -->
    <div class="Our_clients_slider">
        <div class="container">
            <div class="column one">
                <a href="#" class="slider_control slider_control_prev"></a>
                <a href="#" class="slider_control slider_control_next"></a>
                <div class="inside">
                    <?= $helper->cargarCertificacionesPie($this->idioma); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="widgets_wrapper">
        <div class="container">
            <div class="one-second column">
                <aside id="text-2" class="widget widget_text">
                    <h4><?= $footer['titulo_nosotros']; ?></h4>
                    <div class="textwidget">
                        <p><?= $footer['nosotros']; ?>...</p>
                    </div>
                </aside>
            </div>
            <div class="one-second column">
                <aside id="widget_mfn_recent_comments-2" class="widget widget_mfn_recent_comments">
                    <h4><?= $footer['titulo_blog']; ?></h4>
                    <div class="Recent_comments">
                        <ul>
                            <?php foreach ($footer['entradas'] as $item): ?>
                                <li>
                                    <div class="text">
                                        <a href="<?= $helper->armaUrl($item['id'], 'blog', $this->idioma . '_titulo', $this->idioma); ?>" style="color: #fff;"><?= utf8_encode($item['titulo']); ?></a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <div class="copyrights">
        <div class="container">
            <div class="column one">
                <p>
                    <span class="author">Powered by <a target="_blank" rel="nofollow" href="https://imagenwebhq.com"><img class="iwebLogo" src="<?= URL; ?>public/images/iweb-logo.png" alt="ImagenWeb"></a></span>
                </p>
                <div class="social">
                    <?= $helper->cargarRedesSociales(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>



<script type='text/javascript' src='<?= URL; ?>public/js/jquery/jquery.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/rs-plugin/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/hoverIntent.js'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var uberMenuSettings = {"speed": "300", "trigger": "hoverIntent", "orientation": "horizontal", "transition": "slide", "hoverInterval": "20", "hoverTimeout": "400", "removeConflicts": "on", "autoAlign": "off", "noconflict": "off", "fullWidthSubs": "off", "androidClick": "off", "iOScloseButton": "off", "loadGoogleMaps": "off", "repositionOnLoad": "off"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?= URL; ?>public/js/ubermenu.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery.form.min.js'></script>

<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/core.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/widget.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/mouse.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/sortable.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/tabs.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/accordion.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/sliders/responsiveslides.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/sliders/jquery.jcarousel.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/mfn.menu.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery.plugins.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/scripts.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/twitter.js'></script>


<script type="text/javascript">

    /******************************************
     -	PREPARE PLACEHOLDER FOR SLIDER	-
     ******************************************/


    var setREVStartSize = function () {
        var tpopt = new Object();
        tpopt.startwidth = 1200;
        tpopt.startheight = 480;
        tpopt.container = jQuery('#rev_slider_3_1');
        tpopt.fullScreen = "off";
        tpopt.forceFullWidth = "off";

        tpopt.container.closest(".rev_slider_wrapper").css({height: tpopt.container.height()});
        tpopt.width = parseInt(tpopt.container.width(), 0);
        tpopt.height = parseInt(tpopt.container.height(), 0);
        tpopt.bw = tpopt.width / tpopt.startwidth;
        tpopt.bh = tpopt.height / tpopt.startheight;
        if (tpopt.bh > tpopt.bw)
            tpopt.bh = tpopt.bw;
        if (tpopt.bh < tpopt.bw)
            tpopt.bw = tpopt.bh;
        if (tpopt.bw < tpopt.bh)
            tpopt.bh = tpopt.bw;
        if (tpopt.bh > 1) {
            tpopt.bw = 1;
            tpopt.bh = 1
        }
        if (tpopt.bw > 1) {
            tpopt.bw = 1;
            tpopt.bh = 1
        }
        tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
        if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on")
            tpopt.height = tpopt.startheight;
        if (tpopt.fullScreen == "on") {
            tpopt.height = tpopt.bw * tpopt.startheight;
            var cow = tpopt.container.parent().width();
            var coh = jQuery(window).height();
            if (tpopt.fullScreenOffsetContainer != undefined) {
                try {
                    var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                    jQuery.each(offcontainers, function (e, t) {
                        coh = coh - jQuery(t).outerHeight(true);
                        if (coh < tpopt.minFullScreenHeight)
                            coh = tpopt.minFullScreenHeight
                    })
                } catch (e) {
                }
            }
            tpopt.container.parent().height(coh);
            tpopt.container.height(coh);
            tpopt.container.closest(".rev_slider_wrapper").height(coh);
            tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
            tpopt.container.css({height: "100%"});
            tpopt.height = coh;
        } else {
            tpopt.container.height(tpopt.height);
            tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
            tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
        }
    };

    /* CALL PLACEHOLDER */
    setREVStartSize();


    var tpj = jQuery;
    tpj.noConflict();
    var revapi3;

    tpj(document).ready(function () {

        if (tpj('#rev_slider_3_1').revolution == undefined) {
            revslider_showDoubleJqueryError('#rev_slider_3_1');
        } else {
            revapi3 = tpj('#rev_slider_3_1').show().revolution(
                    {
                        dottedOverlay: "none",
                        delay: 6000,
                        startwidth: 1200,
                        startheight: 480,
                        hideThumbs: 200,

                        thumbWidth: 100,
                        thumbHeight: 50,
                        thumbAmount: 3,

                        simplifyAll: "off",

                        navigationType: "none",
                        navigationArrows: "solo",
                        navigationStyle: "round",

                        touchenabled: "on",
                        onHoverStop: "on",
                        nextSlideOnWindowFocus: "off",

                        swipe_threshold: 0.7,
                        swipe_min_touches: 1,
                        drag_block_vertical: false,

                        keyboardNavigation: "off",

                        navigationHAlign: "center",
                        navigationVAlign: "bottom",
                        navigationHOffset: 0,
                        navigationVOffset: 20,

                        soloArrowLeftHalign: "left",
                        soloArrowLeftValign: "center",
                        soloArrowLeftHOffset: 20,
                        soloArrowLeftVOffset: 0,

                        soloArrowRightHalign: "right",
                        soloArrowRightValign: "center",
                        soloArrowRightHOffset: 20,
                        soloArrowRightVOffset: 0,

                        shadow: 0,
                        fullWidth: "on",
                        fullScreen: "off",

                        spinner: "spinner0",

                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,

                        shuffle: "off",

                        autoHeight: "off",
                        forceFullWidth: "off",

                        hideTimerBar: "on",
                        hideThumbsOnMobile: "off",
                        hideNavDelayOnMobile: 1500,
                        hideBulletsOnMobile: "off",
                        hideArrowsOnMobile: "off",
                        hideThumbsUnderResolution: 0,

                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        startWithSlide: 0});



        }
    });	/*ready*/

</script>

</body>
</html>
