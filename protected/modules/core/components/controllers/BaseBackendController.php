<?php

class BaseBackendController extends BaseController{ 

    
   public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        $this->side = 'backend';
    }


        //Text editor uses this method for uploading images
    public function actionUpload()
    {
        $directory = Yii::app()->basePath.'/../public/images/upload/';
        $file = md5(date('YmdHis')).'.'.pathinfo(@$_FILES['file']['name'], PATHINFO_EXTENSION);

        if (move_uploaded_file(@$_FILES['file']['tmp_name'], $directory.$file)) {
             $array = array(
                            'filelink' => Yii::app()->request->baseUrl.'/public/images/upload/'.$file
             );
        }

        echo CJSON::encode($array);
        exit ;
    }    
 
}
