<div id="Subheader" style="background-image:url(<?= URL; ?>public/images/header/<?= $this->contacto['imagen_header']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
    <div class="container">
        <div class="column one">
            <h1 class="title"><?= utf8_encode($this->subHeader); ?></h1>
        </div>
    </div>
</div>
<?= $this->Breadcrumbs; ?>
<!-- #Content -->
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="sections_group">
            <div class="section " style="padding:20px 0; background-color:">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one column">
                            <div style="text-align: center;">
                                <h2><?= utf8_encode($this->contacto['titulo']); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section dark" style="padding:20px 0 0px; background-image:url(<?= URL; ?>public/images/parallax/<?= $this->contacto['imagen_parallax']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one-third column" style="margin-top: 20px;" id="divForm">
                            <div role="form" class="wpcf7" id="wpcf7-f8643-p165-o1" dir="ltr">
                                <div class="screen-reader-response">
                                </div>
                                <form id="contact-form" class="contact" id="frmContacto">
                                    <input type="hidden" value="<?= URL . $this->idioma; ?>/contact/frmContacto" name="url">
                                    <input type="hidden" value="<?= $this->idioma; ?>" name="idioma">
                                    <p>
                                        <span class="wpcf7-form-control-wrap name">
                                            <input type="text"  name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="<?= utf8_encode($this->contacto['frm_nombre']); ?>"/>
                                        </span>

                                        <span class="wpcf7-form-control-wrap email">
                                            <input type="text" name="mail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="<?= utf8_encode($this->contacto['frm_email']); ?>"/>
                                        </span>

                                        <span class="wpcf7-form-control-wrap subject">
                                            <input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="<?= utf8_encode($this->contacto['frm_asunto']); ?>"/>
                                        </span>

                                        <span class="wpcf7-form-control-wrap message">
                                            <textarea  name="comment" id="comment" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="<?= utf8_encode($this->contacto['frm_mensaje']); ?>"></textarea>
                                        </span>
                                        <input type="submit" id="submit_contact" value="<?= utf8_encode($this->contacto['btn_enviar']); ?>" class="wpcf7-form-control wpcf7-submit"/>
                                    <div id="msg" class="message"></div>
                                    <p></p>
                                </form>
                            </div>
                        </div>
                        <div class="column one-third contact_box">
                            <div class="get_in_touch">
                                <div class="inside">
                                    <ul>
                                        <li class="address"><i class="fa fa-map-marker"></i>
                                            <p>
                                                <?= utf8_encode($this->direcciones['direccion']); ?><br>
                                                <?= utf8_encode($this->direcciones['ciudad']) . ' - ' . utf8_encode($this->direcciones['pais']); ?>
                                            </p>
                                        </li>
                                        <li class="phone"><i class="fa fa-phone"></i>
                                            <p>
                                                <?= utf8_encode($this->direcciones['telefono']); ?>
                                            </p>
                                        </li>
                                        <li class="mail"><i class="fa fa-envelope"></i>
                                            <p>
                                                <a href="mailto:<?= utf8_encode($this->direcciones['email']); ?>"><?= utf8_encode($this->direcciones['email']); ?></a>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section " style="padding:20px 0; background-color:">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one column">
                            <div style="text-align: center;">
                                <h2><?= utf8_encode($this->contacto['texto_ubicacion']); ?></h2>
                            </div>
                        </div>
                        <div class="column one map">
                            <div id="google-map-area" style="width:100%; height:350px;">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .four-columns - sidebar -->
    </div>
</div>
<script>
// Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: <?= utf8_encode($this->direcciones['latitud']); ?>, lng: <?= utf8_encode($this->direcciones['longitud']); ?>};
        // The map, centered at Uluru
        var map = new google.maps.Map(
                document.getElementById('google-map-area'), {zoom: <?= utf8_encode($this->direcciones['zoom']); ?>, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLTgSeS3W9YTpmKMkWK8KjN_i2YnwQPIk&callback=initMap">
</script>
