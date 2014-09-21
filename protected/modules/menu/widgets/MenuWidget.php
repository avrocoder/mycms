<?php
Yii::import('application.modules.menu.models.*');
Yii::import('application.modules.core.helpers.model.AdjacencyList');

class MenuWidget extends CWidget   
{
    
    public $name = 'main-menu';
    public $brandLabel;
    public $order = 't.order, t.title';
    
    public function run() {

        $cacheId='menu_' . $this->name . '_items';
        $cache=Yii::app()->cache->get($cacheId);
        if($cache===false)
        {
            $model=new AdjacencyList;
            $items = $model->getForMenu('MenuItem', $this->name, $this->order);
            $modelMenu=new Menu;
            $menu_id=$modelMenu->getIdByName($this->name);
            $dependency=new CDbCacheDependency("SELECT MAX(`id`) FROM `{{menu_item}}` WHERE `menu_id`={$menu_id}");
            $cache_duration=Yii::app()->getModule('core')->cache_duration;
            Yii::app()->cache->set($cacheId,  serialize($items), $cache_duration, $dependency);
        }
        else
        {
            $items=unserialize($cache);
        }

        return $this->render('index',array(
            'brandLabel'=>  $this->brandLabel,
            'items'=>$items,
        ));
    }

}
