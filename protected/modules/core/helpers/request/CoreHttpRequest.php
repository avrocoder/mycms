<?php

class CoreHttpRequest extends CComponent {
    private $url='';
    
    public function setUrl($url)
    {
        $this->url=$url;
    }
    
    public function getUrl()
    {
        return $this->url;
    }

    public static function parseUrl($url)
    {
        //$request = '/backend/menu';
        //print_r(parse_url($request));
        $parseUrl = parse_url($url);
        $path = $parseUrl['path'];
        $params = array();
        if (isset($parseUrl['query'])&&count ($parseUrl['query'] > 0))
        {
            // $par = array([0]=>first=hello [1]=>second=bye)
            $par=explode('&', $parseUrl['query']);
            foreach ($par as $value) {
                preg_match('/^(.*?)=(.*?)$/', $value, $matches);
                $params[$matches[1]]=$matches[2];
            }
        }

        return Yii::app()->controller->createAbsoluteUrl($path,$params);
    }





}
