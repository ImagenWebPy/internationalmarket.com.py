<?php
$lngTxt = 'Languages';
$classLngEng = 'class="font-bold"';
$classLngEs = '';
if ($this->idioma == 'es') {
    $lngTxt = 'Idiomas';
    $classLngEs = 'class="font-bold"';
    $classLngEng = '';
}
$helper = new Helper();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="<?= $this->idioma; ?>"> 
    <!-- head -->
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!-- meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="Description" CONTENT="<?= $this->description; ?>">

        <title><?= $this->title; ?></title>
        <meta name="robots" content="noindex,nofollow">

        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />	

        <script>
            //<![CDATA[
            window.mfn_slider_portfolio = {visible: 4, auto: 6};
            window.mfn_slider_clients = {visible: 6, auto: 0};
            //]]>
        </script>


        <link rel='stylesheet' href='<?= URL; ?>public/css/cform.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/js/doptg/libraries/gui/css/jquery.jscrollpane.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/js/doptg/assets/gui/css/jquery.dop.ThumbnailGallery.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/tp_twitter_plugin.css' type='text/css' media='screen' />
        <link rel='stylesheet' href='<?= URL; ?>public/rs-plugin/css/settings.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/ubermenu.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/style.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/prettyPhoto.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/responsiveslides.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/jcarousel/skine.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/ui/jquery.ui.all.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/responsive.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/skins/green/imagese.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/style-colors.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= URL; ?>public/css/style-2.css' type='text/css' media='all' />
        <link rel="stylesheet" href="<?= URL; ?>public/css/custom.css" media="all" />

        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C400italic%2C700&amp;ver=4.2.2' type='text/css' media='all' />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One&amp;ver=4.2.2' type='text/css' media='all' />



        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="http://themes.muffingroup.com/rocco/wp-content/themes/rocco/css/ie8.css" />
        <![endif]-->



    </head>

    <!-- body -->
    <body class="page page-child page-template-default template-slider  sticky-header layout-full-width">

        <!-- #Wrapper -->
        <div id="Wrapper">
            <!-- .header_placeholder 4sticky  -->
            <div class="header_placeholder">
            </div>

            <!-- #Header -->
            <header id="Header">
                <div class="container">
                    <div class="column one">
                        <div class="addons">
                            <form method="get" id="searchform" action="#">
                                <a class="icon" href="#"><i class="fa fa-search"></i></a>
                                <input type="text" class="field" name="s" id="s" placeholder="Enter your search"/>
                                <input type="submit" class="submit" value="" style="display:none;"/>
                            </form>
                            <!-- .social -->
                            <div class="social">
                                <ul>
                                    <li class="facebook"><a target="_blank" href="https://www.facebook.com/" title="Facebook">F</a></li>
                                    <li class="googleplus"><a target="_blank" href="https://plus.google.com/" title="Google+">G</a></li>
                                    <li class="twitter"><a target="_blank" href="https://twitter.com/" title="Twitter">L</a></li>
                                    <li class="vimeo"><a target="_blank" href="https://vimeo.com/" title="Vimeo">V</a></li>
                                    <li class="youtube"><a target="_blank" href="http://www.youtube.com/" title="YouTube">X</a></li>
                                    <li class="flickr"><a target="_blank" href="http://www.flickr.com/" title="Flickr">N</a></li>
                                    <li class="linked_in"><a target="_blank" href="http://www.linkedin.com/" title="LinkedIn">I</a></li>
                                    <li class="pinterest"><a target="_blank" href="https://pinterest.com/" title="Pinterest">:</a></li>
                                    <li class="dribbble"><a target="_blank" href="http://dribbble.com/" title="Dribbble">D</a></li>
                                    <li class="instagram"><a target="_blank" href="http://dribbble.com/" title="Dribbble"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="language">
                                <a href="#"><i class="fa fa-globe"></i><?= $lngTxt; ?></a>
                                <div class="language_select">
                                    <span class="arrow"></span>
                                    <ul id="menu-languages" class="">
                                        <li class="menu-item"><a href="#" <?= $classLngEng; ?>>English</a></li>
                                        <li class="menu-item"><a href="#" <?= $classLngEs; ?>>Español</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .logo -->
                        <div class="logo">
                            <h1><a id="logo" href="<?= $helper->urlInicio($this->idioma); ?>" title="International Market">
                                    <img class="scale-with-grid" src="<?= URL; ?>public/images/logo-short.png" alt="International Market Logo"/>
                                </a>
                            </h1>
                        </div>

                        <!-- #mega menu -->
                        <div id="megaMenu" class="megaMenuContainer megaMenu-nojs megaResponsive megaResponsiveToggle wpmega-withjs megaMenuOnHover megaMenuHorizontal wpmega-noconflict megaMinimizeResiduals megaResetStyles">
                            <div id="megaMenuToggle" class="megaMenuToggle">
                                Menu&nbsp; <span class="megaMenuToggle-icon"></span>
                            </div>
                            <?= $helper->cargarMenu($this->idioma); ?>
                        </div>
                        <a class="responsive-menu-toggle" href="#"><i class='fa fa-reorder'></i></a>
                    </div>
                </div>
            </header>