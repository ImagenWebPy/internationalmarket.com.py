<div id="Subheader" style="background-image:url(<?= URL; ?>public/images/header/<?= $this->dataHeader['imagen_header']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
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
            <div class="section">
                <div class="section_wrapper clearfix">
                    <?php foreach ($this->listado['listado'] as $item): ?>
                        <div class="clearfix post column one post-519 type-post status-publish format-standard has-post-thumbnail hentry category-applications category-print tag-css3 tag-framework tag-wordpress">
                            <?php if (empty($item['video'])): ?>
                                <div class="photo">
                                    <a href="<?= $item['url']; ?>"><img width="566" height="372" src="<?= URL; ?>public/images/blog/<?= $item['imagen']; ?>" class="scale-with-grid wp-post-image" alt="<?= $item['imagen']; ?>"/></a>
                                </div>
                            <?php else: ?>
                                <div class="photo">
                                    <iframe class="scale-with-grid" src="http://www.youtube.com/embed/<?= $item['video']; ?>?wmode=opaque" allowfullscreen>
                                    </iframe>
                                </div>
                            <?php endif; ?>
                            <div class="desc">
                                <h3><a href="<?= $item['url']; ?>"><?= $item['titulo']; ?></a></h3>
                                <div class="meta">
                                    <div class="date">
                                        <i class="fa fa-calendar"></i> <?= utf8_encode($item['fecha']); ?>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <?= substr(strip_tags($item['contenido']), 0, 180); ?>
                                </div>
                                <?php if ($this->idioma == 'en'): ?>
                                    <a href="<?= $item['url']; ?>" class="button">Read more →</a>
                                <?php else: ?>
                                    <a href="<?= $item['url']; ?>" class="button">Leer más →</a>
                                <?php endif; ?>
                                <div class="footer">
                                    <p class="tags">
                                        <i class="fa fa-tags"></i><?= $item['tags']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Blog Post -->
                    <div class="column one pager_wrapper">
                        <?= $this->listado['paginador']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>