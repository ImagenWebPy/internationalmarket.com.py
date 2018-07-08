<div id="Subheader" style="background-image:url(<?= URL; ?>public/images/header/<?= $this->datoCertificacion['imagen_header']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
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
            <div class="items_group clearfix">
                <div class="column one-third image">
                    <div class="scale-with-grid aligncenter wp-caption">
                        <div class="photo">
                            <div class="photo_wrapper">
                                <a href="<?= URL; ?>public/images/certificaciones/<?= $this->datoCertificacion['img_certificacion']; ?>" class="prettyphoto"><img class="scale-with-grid" src="<?= URL; ?>public/images/certificaciones/<?= $this->datoCertificacion['img_certificacion']; ?>" alt="Image frame">
                                    <div class="mask">
                                    </div>
                                    <i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column two-third column">
                    <?= utf8_encode($this->datoCertificacion['contenido']); ?>
                </div>
            </div>
        </div>
    </div>
</div>