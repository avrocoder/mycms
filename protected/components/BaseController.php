<?php

class BaseController extends Controller{
    public $pageKeywords = '';
    public $pageDescription = '';
    
    public function beforeRender($view) {
        Yii::app()->clientScript->registerCoreScript('jquery');
        
        return parent::beforeRender($view);
    }
}
