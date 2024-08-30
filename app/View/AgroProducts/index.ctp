<h1 class="title_line_color blue">Agropartes</h1>
<div id="product_index" class="contain product_catalogo product clearfix">
    <?php echo $this->element('form-search-catalogo-agro'); ?>
    <div class="product_index_container clearfix">
        <?php if (empty($products)) : ?>
            <p class="center">No hay productos encontrados</p>
        <?php else : ?>
            <div class="table-responsive">
    <table class="table">
        <?php
        // Inicializa un array para rastrear qué columnas tienen contenido
        $columns = [
            'id_catalano' => false,
            'modelo' => false,
            'marca' => false,
            'dtes' => false,
            'med_cub' => false,
            'diam_ex' => false,
            'esp_mm' => false,
            'diam_int' => false,
            'can_diam' => false,
            'observacion' => false,
            'imagen' => false
        ];

        // Recorre los productos para verificar qué columnas tienen contenido
        foreach ($products as $product) {
            foreach ($columns as $key => $value) {
                if (!empty($product['AgroProduct'][$key])) {
                    $columns[$key] = true;
                }
            }
            // Verificar la existencia de la imagen
            if (!empty($product['AgroProduct']['imagen']) && file_exists(WWW_ROOT . 'img/productImg/' . $product['AgroProduct']['imagen'])) {
                $columns['imagen'] = true;
            }
        }
        ?>
        <thead>
            <tr>
                <?php if ($columns['id_catalano']) : ?><th>Código Catalano</th><?php endif; ?>
                <?php if ($columns['modelo']) : ?><th>Modelo</th><?php endif; ?>
                <?php if ($columns['marca']) : ?><th>Marca</th><?php endif; ?>
                <?php if ($columns['dtes']) : ?><th>Dientes</th><?php endif; ?>
                <?php if ($columns['med_cub']) : ?><th>Med Cub</th><?php endif; ?>
                <?php if ($columns['diam_ex']) : ?><th>Diám E.C.</th><?php endif; ?>
                <?php if ($columns['esp_mm']) : ?><th>Esp (mm)</th><?php endif; ?>
                <?php if ($columns['diam_int']) : ?><th>Diam Int (MM)</th><?php endif; ?>
                <?php if ($columns['can_diam']) : ?><th>CantxDiámAg</th><?php endif; ?>
                <?php if ($columns['observacion']) : ?><th>Observación</th><?php endif; ?>
                <?php if ($columns['imagen']) : ?><th>Imagen</th><?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <?php if ($columns['id_catalano']) : ?><td><?php echo h($product['AgroProduct']['id_catalano']); ?></td><?php endif; ?>
                    <?php if ($columns['modelo']) : ?><td><?php echo h($product['AgroProduct']['modelo']); ?></td><?php endif; ?>
                    <?php if ($columns['marca']) : ?><td style="max-width: 200px; overflow-wrap: break-word;"><?php echo h($product['AgroProduct']['marca']); ?></td><?php endif; ?>
                    <?php if ($columns['dtes']) : ?><td><?php echo h($product['AgroProduct']['dtes']); ?></td><?php endif; ?>
                    <?php if ($columns['med_cub']) : ?><td><?php echo h($product['AgroProduct']['med_cub']); ?></td><?php endif; ?>
                    <?php if ($columns['diam_ex']) : ?><td><?php echo h($product['AgroProduct']['diam_ex']); ?></td><?php endif; ?>
                    <?php if ($columns['esp_mm']) : ?><td><?php echo h($product['AgroProduct']['esp_mm']); ?></td><?php endif; ?>
                    <?php if ($columns['diam_int']) : ?><td><?php echo h($product['AgroProduct']['diam_int']); ?></td><?php endif; ?>
                    <?php if ($columns['can_diam']) : ?><td><?php echo h($product['AgroProduct']['can_diam']); ?></td><?php endif; ?>
                    <?php if ($columns['observacion']) : ?><td style="max-width: 200px; overflow-wrap: break-word;"><?php echo h($product['AgroProduct']['observacion']); ?></td><?php endif; ?>
                    <?php if ($columns['imagen']) : ?>
                        <td>
                            <?php if (!empty($product['AgroProduct']['imagen']) && file_exists(WWW_ROOT . 'img/productImg/' . $product['AgroProduct']['imagen'])) : ?>
                                <a class="brw_image" href="<?php echo $this->Html->url('/img/productImg/' . $product['AgroProduct']['imagen']); ?>">imagen</a>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php endif; ?>

    </div>
</div>