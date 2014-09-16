<?php

class BaseController extends Controller{
    private $side;
    
    public $pageKeywords = '';
    public $pageDescription = '';
    
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }


    public function beforeRender($view) {
        Yii::app()->clientScript->registerCoreScript('jquery');
        
        return parent::beforeRender($view);
    }
    
    public function getSide()
    {
        return $this->side;
    } 
    
    public function setSide($side)
    {
        return $this->side=$side;
    } 
}
