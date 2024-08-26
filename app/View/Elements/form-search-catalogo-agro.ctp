<script>
    var APP_BASE = '<?php echo Router::url('/') ?>';
</script>
<div class="row">
    <div class="col-sm-4">
        <div class="img_moto_fija"><img src="<?php echo Router::url('/img/img-moto-fija.png'); ?>" class="img-responsive" /></div>
    </div>
    <div class="col-sm-4">
        <ul class="catalogo line">
            <li>
                <h3>VER PRODUCTOS POR CATEGORÍA</h3>
                <div class="PorCategoria">
                    <ul class="ulporcategoria">
                        <?php foreach ($grupos as $grupo) : ?>
                            <li><a href="<?php echo $this->Html->url(array(
                                                'controller' => 'agro_products',
                                                'action' => 'index',
                                                'grupo' => $grupo['AgroProduct']['grupo'],
                                            )) ?>">
                                    <?= $grupo['AgroProduct']['grupo']; ?>
                                </a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>

        </ul>
    </div>

    <div class="col-sm-4">
        <ul class="catalogo">
            <li>
                <h3>BÚSQUEDA POR CÓDIGO</h3>
                <div class="BusquedaCodigo clearfix">
                    <?php
                    echo $this->Form->create('AgroProduct', array('url' => array('controller' => 'agro_products', 'action' => 'search_filter_redirect')));
                    echo $this->Form->input('id_catalano', array('type' => 'string', 'label' => 'Código Catalano'));
                    ?>
                    <?php echo $this->Form->end('Buscar'); ?>
                </div>
            </li>

        </ul>
    </div>
</div>