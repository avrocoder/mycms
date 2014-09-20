<?php
Yii::import('application.modules.menu.models.*');
Yii::import('application.modules.core.helpers.model.AdjacencyList');

class MenuWidget extends CWidget   
{
    
    public $name = 'main-menu';
    public $brandLabel;
    public $order = 't.order, t.title';
    
    public function run() {

        $model=new AdjacencyList;
        $items = $model->getForMenu('MenuItem', $this->name, $this->order);
//        echo "<pre>";
//        print_r($items);
//        echo "</pre>";     

        return $this->render('index',array(
            'brandLabel'=>  $this->brandLabel,
            'items'=>$items,
        ));
    }

}
