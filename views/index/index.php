<div id="mfn-rev-slider">
    <div id="rev_slider_3_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;padding:px;margin-top:0px;margin-bottom:0px;max-height:480px;">
        <!-- START REVOLUTION SLIDER 4.6.9 fullwidth mode -->
        <div id="rev_slider_3_1" class="rev_slider fullwidthabanner" style="display:none;max-height:480px;height:480px;">
            <ul>
                <?php foreach ($this->slider as $item): ?>
                    <li data-transition="slidehorizontal" data-slotamount="7" data-masterspeed="300" data-delay="5000" data-saveperformance="off">
                        <!-- MAIN IMAGE -->
                        <img src="<?= URL; ?>public/images/slider/<?= utf8_encode($item['imagen']); ?>" alt="<?= utf8_encode($item['imagen']); ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <?php if (!empty($item['texto1'])): ?>
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption boxed_large_light tp-fade" data-x="<?= $item['data_x_1']; ?>" data-y="<?= $item['data_y_1']; ?>" data-speed="<?= $item['data_speed_1']; ?>" data-start="<?= $item['data_start_1']; ?>" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-end="4700" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                                <?= utf8_encode($item['texto1']); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($item['texto2'])): ?>
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption boxed_medium_light tp-fade" data-x="<?= $item['data_x_2']; ?>" data-y="<?= $item['data_y_2']; ?>" data-speed="<?= $item['data_speed_2']; ?>" data-start="<?= $item['data_start_2']; ?>" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-end="4700" data-endspeed="300" style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">
                                <?= utf8_encode($item['texto2']); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($item['boton'])): ?>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-fade" data-x="<?= $item['boton_x']; ?>" data-y="<?= $item['boton_y']; ?>" data-speed="<?= $item['boton_speed']; ?>" data-start="<?= $item['boton_start']; ?>" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-end="4700" data-endspeed="300" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
                                <a href='<?= utf8_encode($item['url']); ?>' class='tp-button green small'><?= utf8_encode($item['boton']); ?><i class="icon-hand-up"></i></a>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;">
            </div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->
</div>

<!-- #Content -->
<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group">
            <?php if (!empty($this->seccion1)): ?>
                <div class="section " style="padding:0px 0; background-color:">
                    <div class="section_wrapper clearfix">
                        <div class="items_group clearfix">
                            <div class="column one column">
                                <div style="text-align: center;">
                                    <h2><?= utf8_encode($this->seccion1['titulo']); ?></h2>
                                    <?= utf8_encode($this->seccion1['contenido']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($this->seccion2)): ?>
                <div class="section " style="padding:40px 0 20px; background-color:#F5F9F9">
                    <div class="section_wrapper clearfix">
                        <div class="items_group clearfix">
                            <div class="column one divider">
                                <hr style="margin: 0 0 0px; border:none; width:0; height:0;"/>
                            </div>
                            <div class="column one-second image">
                                <div class="scale-with-grid aligncenter wp-caption no-hover">
                                    <div class="photo">
                                        <div class="photo_wrapper">
                                            <img class="scale-with-grid" src="<?= URL; ?>public/images/<?= utf8_encode($this->seccion2['imagen']); ?>" alt="<?= utf8_encode($this->seccion2['imagen']); ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column one-second column">
                                <?= utf8_encode($this->seccion2['contenido']); ?>
                                <a href="<?= utf8_encode($this->seccion2['url']); ?>" class="button button_large"><?= utf8_encode($this->seccion2['boton']); ?></a>
                            </div>
                            <div class="column one divider">
                                <hr style="margin: 0 0 0px; border:none; width:0; height:0;"/>
                            </div>
                            <div class="column one divider">
                                <hr style="margin: 0 0 0px; border:none; width:0; height:0;"/>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($this->seccion3)): ?>
                <div class="section dark" style="padding:40px 0 20px; background-image:url(<?= URL; ?>public/images/parallax/<?= utf8_encode($this->seccion3['imagen']); ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
                    <div class="section_wrapper clearfix">
                        <div class="icon_box marginSection60">
                            <h2><?= utf8_encode($this->seccion3['titulo']); ?></h2>
                            <?= utf8_encode($this->seccion3['contenido']); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($this->seccion4)): ?>
                <div class="section " style="padding:40px 0 20px; background-color:#F5F9F9">
                    <div class="section_wrapper clearfix">
                        <div class="items_group clearfix">
                            <div class="column one-second youtube">
                                <div class="article_video">
                                    <iframe class="scale-with-grid" width="700" height="420" src="http://www.youtube.com/embed/<?= $this->seccion4['video']; ?>?wmode=opaque" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                            <div class="column one-second column">
                                <h2><?= utf8_encode($this->seccion4['titulo']); ?></h2>
                                <hr/>
                                <?= utf8_encode($this->seccion4['contenido']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($this->seccion5)): ?>
                <div class="section " style="padding:20px 0; background-color:">
                    <div class="section_wrapper clearfix">
                        <div class="items_group clearfix">
                            <div class="column one-second info_box">
                                <div class="info_box">
                                    <h4><?= utf8_encode($this->seccion5['titulo']); ?></h4>
                                    <div class="inside">
                                        <?php if (!empty($this->seccion5_items)): ?>
                                            <ul>
                                                <?php foreach ($this->seccion5_items as $item): ?>
                                                    <li><?= utf8_encode($item['item']); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="column one-second image">
                                <div class="scale-with-grid aligncenter wp-caption no-hover">
                                    <div class="photo">
                                        <div class="photo_wrapper">
                                            <img class="scale-with-grid" src="<?= URL; ?>public/images/<?= utf8_encode($this->seccion5['imagen']); ?>" alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- .four-columns - sidebar -->
    </div>
</div>

