<?php

class BaseBackendModel extends CActiveRecord {
    const PUBLISHED = 1;
    const DRAFT = 0;
    
    protected $statusList = array(
                    '0'=>'draft',
                    '1'=>'published',
                );

    public function getStatusList()
    {
        return $this->statusList;
    }

    public function getStatusName($number)
    {
        return $this->statusList[$number];
    }

    public function scopes() {
        return array(
            'published'=>array(
                'condition'=>'status='.self::PUBLISHED,
            ),
            'draft'=>array(
                'condition'=>'status='.self::DRAFT,
            ),
        );
    }
}
