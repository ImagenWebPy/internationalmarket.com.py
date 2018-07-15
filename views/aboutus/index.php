<div id="Subheader" style="background-image:url(<?= URL; ?>public/upload/<?= $this->nosotros['imagen_header']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
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
                                <?= utf8_encode($this->nosotros['contenido']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section " style="padding:110px 0 90px; background-image:url(<?= URL; ?>public/images/parallax/<?= $this->nosotros['imagen_parallax']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one column">
                            <div style="text-align: center;">
                                <h2 style="margin-bottom: 40px;"><span style="background-color:#0aac7c; color:#FFFFFF;" class="highlight"><?= utf8_encode($this->nosotros['texto_parallax']); ?></span></h2>
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
                                <?= utf8_encode($this->nosotros['contenido_adicional']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .four-columns - sidebar -->
</div>