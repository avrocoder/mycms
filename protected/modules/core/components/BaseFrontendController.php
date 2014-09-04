<?php
class BaseFrontendController extends BaseController{
    public function getBreadCrumbs()
    {
        return array(
            'Please, override the method ' . __METHOD__
        );
    }

}
