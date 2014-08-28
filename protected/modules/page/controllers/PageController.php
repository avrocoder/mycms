<?php

class PageController extends BaseFrontendController
{
    public function actionIndex($slug)
    {
        $page = new Page;
        $dependency = new CDbCacheDependency("SELECT `updated_at` FROM `tbl_page` WHERE `slug`='{$slug}'");
        $data = $page::model()->cache(Yii::app()->getModule('core')->cache_duration, $dependency)->published()->find('slug=:slug',array(':slug'=>$slug));
        if ($data == null)
            throw new CHttpException(404);

        $this->render('index',array('data'=>$data)); 
        
    }
    
}
