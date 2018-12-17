<div id="Subheader" style="background-image:url(<?= URL; ?>public/images/header/<?= $this->datoPagina['imagen_header']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
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
        <div class="section " style="padding:20px 0; background-color:">
            <!-- .sections_group -->
            <div class="sections_group">
                <div class="items_group clearfix">
                    <div class="column one column">
                        <?= utf8_encode($this->datoPagina['contenido']); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($this->galeria)): ?>
            <div class="sections_group">
                <div class="section the_content">
                    <div class="section_wrapper">
                        <div class="the_content_wrapper">
                            <div class="the_content">
                                <div id="gallery-1" class="gallery gallery-columns-4 gallery-size-thumbnail">
                                    <?php foreach ($this->galeria as $item): ?>
                                        <dl class="gallery-item">
                                            <dt class="gallery-icon landscape hover-mask">
                                                <?php if (!empty($item['imagen'])): ?>
                                                    <a href="<?= URL; ?>public/images/neopure/<?= $item['imagen']; ?>" data-gal="prettyPhoto[gallery]"><img width="300" height="300" src="<?= URL; ?>public/images/neopure/thumb/<?= $item['img_miniatura']; ?>" class="attachment-thumbnail" alt="portfolio_1" style="height: auto; width: 100%;"><span class="ico"></span></a>
                                                <?php elseif (!empty($item['id_youtube'])): ?>
                                                    <iframe  class="scale-with-grid" width="270" height="202" src="http://www.youtube.com/embed/<?= utf8_encode($item['id_youtube']) ?>?wmode=opaque" allowfullscreen=""></iframe>
                                                <?php endif; ?>
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
        <?php endif; ?>
    </div>
</div>