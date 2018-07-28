<div id="Subheader" style="background-image:url(<?= URL; ?>public/images/header/<?= $this->datoProducto['imagen_header']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
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
            <div class="column one column padding-text">
                <?= utf8_encode($this->datoProducto['contenido']); ?>
            </div>
        </div>
        <div class="sections_group">
            <div class="section the_content">
                <div class="section_wrapper">
                    <div class="the_content_wrapper">
                        <h4>Galería</h4>
                        <div class="the_content">
                            <div id="gallery-1" class="gallery gallery-columns-4 gallery-size-thumbnail">
                                <?php foreach ($this->imgProducto as $item): ?>
                                    <dl class="gallery-item">
                                        <dt class="gallery-icon landscape hover-mask">
                                            <a href="<?= URL; ?>public/images/productos/<?= $item['img']; ?>" data-gal="prettyPhoto[gallery]"><img width="300" height="300" src="<?= URL; ?>public/images/productos/thumb/<?= $item['img_miniatura']; ?>" class="attachment-thumbnail" alt="portfolio_1" style="height: auto; width: 100%;"><span class="ico"></span></a>
                                        </dt>
                                        <dd></dd>
                                    </dl>
                                <?php endforeach; ?>
                                <br style="clear: both">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .four-columns - sidebar -->
    </div>
</div>
