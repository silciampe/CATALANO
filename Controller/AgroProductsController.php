<?php

class AgroProductsController extends AppController
{

    var $name = 'AgroProducts';


    function search_filter_redirect()
    {
        $grupo = $grupoDirecta = $id_catalano = $codigo_original = $marca = $marcaDirecta = $modelo = $modeloDirecta  = $dtes =  $cad = $diam_int = $diam_ex = $can_diam = $diam_rod = $paso_esp = $est_x_esp = null;
        if (!empty($this->data['AgroProduct']['grupo']) and ($this->data['AgroProduct']['grupo'] == 'CORONA' or $this->data['AgroProduct']['grupo'] == 'PIÑON')) {
            $grupo = $this->data['AgroProduct']['grupo'];
        }

        if (!empty($this->data['AgroProduct']['grupoDirecta']) and ($this->data['AgroProduct']['grupoDirecta'] == 'CORONA' or $this->data['AgroProduct']['grupoDirecta'] == 'PIÑON')) {
            $grupoDirecta = $this->data['AgroProduct']['grupoDirecta'];
        }

        if (!empty($this->data['AgroProduct']['id_catalano'])) {
            $id_catalano = $this->data['AgroProduct']['id_catalano'];
        }

        if (!empty($this->data['AgroProduct']['codigo_original'])) {
            $codigo_original = $this->data['AgroProduct']['codigo_original'];
        }

        if (!empty($this->data['AgroProduct']['marca'])) {
            $marca = $this->data['AgroProduct']['marca'];
        }

        if (!empty($this->data['AgroProduct']['marcaDirecta'])) {
            $marcaDirecta = $this->data['AgroProduct']['marcaDirecta'];
        }

        if (!empty($this->data['AgroProduct']['modelo'])) {
            $modelo = $this->data['AgroProduct']['modelo'];
        }

        if (!empty($this->data['AgroProduct']['modeloDirecta'])) {
            $modeloDirecta = $this->data['AgroProduct']['modeloDirecta'];
        }

        if (!empty($this->data['AgroProduct']['dtes'])) {
            $dtes = $this->data['AgroProduct']['dtes'];
        }

        if (!empty($this->data['AgroProduct']['cad'])) {
            $cad = $this->data['AgroProduct']['cad'];
        }

        if (!empty($this->data['AgroProduct']['diam_int'])) {
            $diam_int = $this->data['AgroProduct']['diam_int'];
        }

        if (!empty($this->data['AgroProduct']['diam_ex_corona'])) {
            $diam_ex = $this->data['AgroProduct']['diam_ex_corona'];
        }

        if (!empty($this->data['AgroProduct']['diam_ex_pinion'])) {
            $diam_ex = $this->data['AgroProduct']['diam_ex_pinion'];
        }

        if (!empty($this->data['AgroProduct']['can_diam'])) {
            $can_diam = $this->data['AgroProduct']['can_diam'];
        }

        if (!empty($this->data['AgroProduct']['diam_rod'])) {
            $diam_rod = $this->data['AgroProduct']['diam_rod'];
        }

        if (!empty($this->data['AgroProduct']['paso_esp'])) {
            $paso_esp = $this->data['AgroProduct']['paso_esp'];
        }

        if (!empty($this->data['AgroProduct']['est_x_esp'])) {
            $est_x_esp = $this->data['AgroProduct']['est_x_esp'];
        }

        $this->redirect(array(
            'controller' => 'agro_products',
            'action' => 'index',
            'grupo' => $grupo,
            'grupoDirecta' => $grupoDirecta,
            'id_catalano' => $id_catalano,
            'codigo_original' => $codigo_original,
            'marca' => $marca,
            'marcaDirecta' => $marcaDirecta,
            'modelo' => $modelo,
            'modeloDirecta' => $modeloDirecta,
            'dtes' => $dtes,
            'cad' => $cad,
            'diam_int' => $diam_int,
            'diam_ex' => $diam_ex,
            'can_diam' => $can_diam,
            'diam_rod' => $diam_rod,
            'paso_esp' => $paso_esp,
            'est_x_esp' => $est_x_esp,
        ));
    }


    function index()
    {
        $grupo = $id_catalano = $codigo_original = $modelo = $marca = $dtes = $cad = $diam_int = $diam_ex = $can_diam = $diam_rod = $paso_esp = $est_x_esp = null;

        if (!empty($this->params['named']['grupo'])) {
            $this->request->data['AgroProduct']['grupo'] = $grupo = $this->params['named']['grupo'];
        }

        if (!empty($this->params['named']['grupoDirecta'])) {
            $this->request->data['AgroProduct']['grupoDirecta'] = $grupo = $this->params['named']['grupoDirecta'];
        }

        if (!empty($this->params['named']['id_catalano'])) {
            $this->request->data['AgroProduct']['id_catalano'] = $id_catalano = $this->params['named']['id_catalano'];
        }

        if (!empty($this->params['named']['codigo_original'])) {
            $this->request->data['AgroProduct']['codigo_original'] = $codigo_original = $this->params['named']['codigo_original'];
        }

        if (!empty($this->params['named']['marca'])) {
            $this->request->data['AgroProduct']['marca'] = $marca = $this->params['named']['marca'];
        }

        if (!empty($this->params['named']['marcaDirecta'])) {
            $this->request->data['AgroProduct']['marcaDirecta'] = $marca = $this->params['named']['marcaDirecta'];
        }

        if (!empty($this->params['named']['modelo'])) {
            $this->request->data['AgroProduct']['modelo'] = $modelo = $this->params['named']['modelo'];
        }

        if (!empty($this->params['named']['modeloDirecta'])) {
            $this->request->data['AgroProduct']['modeloDirecta'] = $modelo = $this->params['named']['modeloDirecta'];
        }

        if (!empty($this->params['named']['dtes'])) {
            $this->request->data['AgroProduct']['dtes'] = $dtes = $this->params['named']['dtes'];
        }

        if (!empty($this->params['named']['cad'])) {
            $this->request->data['AgroProduct']['cad'] = $cad = $this->params['named']['cad'];
        }

        if (!empty($this->params['named']['diam_int'])) {
            $this->request->data['AgroProduct']['diam_int'] = $diam_int = $this->params['named']['diam_int'];
        }

        if (!empty($this->params['named']['diam_ex']) and !empty($this->params['named']['grupo']) and $this->params['named']['grupo'] == 'CORONA') {
            $this->request->data['AgroProduct']['diam_ex_corona'] = $diam_ex = $this->params['named']['diam_ex'];
        }

        if (!empty($this->params['named']['diam_ex']) and !empty($this->params['named']['grupo']) and $this->params['named']['grupo'] == 'PIÑON') {
            $this->request->data['AgroProduct']['diam_ex_pinion'] = $diam_ex = $this->params['named']['diam_ex'];
        }

        if (!empty($this->params['named']['can_diam'])) {
            $this->request->data['AgroProduct']['can_diam'] = $can_diam = $this->params['named']['can_diam'];
        }

        if (!empty($this->params['named']['diam_rod'])) {
            $this->request->data['AgroProduct']['diam_rod'] = $diam_rod = $this->params['named']['diam_rod'];
        }

        if (!empty($this->params['named']['paso_esp'])) {
            $this->request->data['AgroProduct']['paso_esp'] = $paso_esp = $this->params['named']['paso_esp'];
        }

        if (!empty($this->params['named']['est_x_esp'])) {
            $this->request->data['AgroProduct']['est_x_esp'] = $est_x_esp = $this->params['named']['est_x_esp'];
        }

        $products = $this->AgroProduct->getAll($grupo, $id_catalano, $codigo_original, $marca, $modelo, $dtes, $cad, $diam_int, $diam_ex, $can_diam, $diam_rod, $paso_esp, $est_x_esp);

        $this->set(array(
            'products' => $products,
            // 'haveAnyCorona' => $this->AgroProduct->haveAny($products, 'CORONA'),
            // 'haveAnyPiñon' => $this->AgroProduct->haveAny($products, 'PIÑON'),
        ));
        $this->_setGrupos();
    }

    function marcas($grupo)
    {
        $this->layout = 'ajax';
        $this->set(array(
            'marcas' => $this->AgroProduct->marcasList($grupo),
        ));
    }

    function modelos($grupo, $marca)
    {
        $this->layout = 'ajax';
        $this->set(array(
            'modelos' => $this->AgroProduct->modelosList($grupo, $marca),
        ));
    }


    function hightlighted()
    {
        $products = $this->AgroProduct->HighlightedProduct->find('all', array(
            'contain' => array(
                'AgroProduct' => array(
                    'conditions' => array('AgroProduct.enabled' => 1),
                    'BrwImage',
                ),
            )
        ));
        foreach ($products as $i => $product) {
            $products[$i]['BrwImage'] = $product['AgroProduct']['BrwImage'];
        }
        /*pr($products);

		$conditions = array(
			'AgroProduct.enabled' => 1,
			'AgroProduct.hightlighted' => 1,
		);

		$this->paginate = array(
			'conditions' => $conditions,
			'limit' => 12,
			'contain' => array('BrwImage'),
		);
		$products = $this->paginate('AgroProduct');
		pr($products);*/
        $this->set('products', $products);

        $crumb = array(
            __('Productos destacados', true) => array('controller' => 'products', 'action' => 'hightlighted'),
            //			$info_client['Client']['title'], array()
        );
        $this->set('crumb', $crumb);
    }


    function catalogo()
    {
        $this->_setGrupos();
    }

    function _setGrupos()
    {
        $grupos = $this->AgroProduct->find('all', array(
            'fields' => array('DISTINCT grupo'),
            'order' => array('grupo ASC'),
        ));
        $this->set(compact('grupos'));
    }
}
