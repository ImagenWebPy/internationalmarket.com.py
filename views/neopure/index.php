<div id="Subheader" style="background-image:url(<?= URL; ?>public/images/header/<?= $this->datoNeo['imagen_header']; ?>); background-repeat:no-repeat; background-position:center; background-attachment:fixed; -webkit-background-size:cover; background-size:cover">
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
                        <?= utf8_encode($this->datoNeo['contenido']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>