<?php

class PageController extends BaseFrontendController
{
    public function actionIndex($slug)
    {
        $page = new Page;
        $data = $page::model()->find('slug=:slug',array(':slug'=>$slug));
        if ($data == null)
            throw new CHttpException(404, 'Страницы "'. $this->createAbsoluteUrl('page/index/' . $slug) . '" не существует');

        $this->render('index',array('data'=>$data)); 
        
    }
    
}
