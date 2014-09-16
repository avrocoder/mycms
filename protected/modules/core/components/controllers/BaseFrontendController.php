<?php
class BaseFrontendController extends BaseController{
    
   public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        $this->side = 'frontend';
    }

    
    public function getBreadCrumbs()
    {
        return array(
            'Please, override the method ' . __METHOD__
        );
    }

}
