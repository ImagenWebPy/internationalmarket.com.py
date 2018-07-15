<div id="Subheader" style="background-image:url(<?= URL; ?>public/images/header/<?= $this->post['imagen_header']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
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
                        <?php if (!empty($this->post['imagen'])): ?>
                            <img src="<?= URL; ?>public/images/blog/<?= utf8_encode($this->post['imagen']); ?>" alt="<?= utf8_encode($this->post['imagen']); ?>" style=" width: 90%; margin: 0 auto; display: block;">
                        <?php elseif (!empty($this->post['video'])): ?>
                            <iframe class="scale-with-grid videoFrame" src="http://www.youtube.com/embed/<?= utf8_encode($this->post['video']); ?>?wmode=opaque" allowfullscreen>
                            </iframe>
                        <?php endif; ?>
                    </div>
                    <div class="column one column">
                        <div style="width: 90%; display: block; margin: 0px auto;">
                            <?= utf8_encode($this->post['contenido']); ?>
                            <div class="meta">
                                <div class="date">
                                    <i class="fa fa-calendar"></i> <?= utf8_encode($this->post['fecha']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>