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

    <div class="col-sm-4">
        <ul class="catalogo">
            <li>
                <h3>DISCOS DENTADOS</h3>
                <div class="BusquedaModelo clearfix">
                    <?php
                    echo $this->Form->create('AgroProduct', array('url' => array('controller' => 'agro_products', 'action' => 'search_filter_redirect')));
                    echo $this->Form->input('modelo', array('type' => 'select', 'label' => 'tipo', 'options' =>array (
                        'empty' => 'Seleccionar', 
                        'DISCOS DENT ASA 40' => 'DISCOS DENT ASA 40', 
                        'DISCOS DENT ASA 50' => 'DISCOS DENT ASA 50', 
                        'DISCOS DENT ASA 60' => 'DISCOS DENT ASA 60', 
                        'DISCOS DENT ASA 80' => 'DISCOS DENT ASA 80', 
                        'DISCOS DENT ASA 100' => 'DISCOS DENT ASA 100', 

                    )));
                    
                    ?>              
                    <br>      
                    <?php echo $this->Form->end('Buscar'); ?>
                </div>
            </li>
            <li>
                <h3>DISCOS Y CUCHILLAS</h3>
                <div class="BusquedaModelo clearfix">
                    <?php
                    echo $this->Form->create('AgroProduct', array('url' => array('controller' => 'agro_products', 'action' => 'search_filter_redirect')));
                    echo $this->Form->input('modelo', array('type' => 'select', 'label' => 'tipo', 'options' =>array (
                        'empty' => 'Seleccionar', 
                        'DISCOS PLANOS LISOS' => 'DISCOS PLANOS LISOS',
                        'CUCHILLAS PLANAS LISAS' => 'CUCHILLAS PLANAS LISAS',
                        'DISCOS PLANOS DENTADOS' => 'DISCOS PLANOS DENTADOS',
                        'CUCHILLAS PLANAS DENTADAS' => 'CUCHILLAS PLANAS DENTADAS',
                        'DISCOS CONCAVOS DENTADOS' => 'DISCOS CONCAVOS DENTADOS',
                        'DISCOS LLANTAS TAPADORES' => 'DISCOS LLANTAS TAPADORES',
                        'CUCHILLAS HELICOIDAL 18 ONDAS' => 'CUCHILLAS HELICOIDAL 18 ONDAS',
                        'CUCHILLAS HELICOIDAL 31 ONDAS' => 'CUCHILLAS HELICOIDAL 31 ONDAS',
                        'CUCHILLAS DURAFLUT 50 ONDAS' => 'CUCHILLAS DURAFLUT 50 ONDAS',
                        'DISCOS DE RASTRA' => 'DISCOS DE RASTRA',
                        'CUCHILLAS DURAFLUT FILO LISO' => 'CUCHILLAS DURAFLUT FILO LISO',
                        'DISCOS Y CUCHILLAS ESPECIALES' => 'DISCOS Y CUCHILLAS ESPECIALES',
                            
                    )));
                    
                    ?>
                    <br>
                    <?php echo $this->Form->end('Buscar'); ?>
                </div>
            </li>
        </ul>
    </div>


</div>