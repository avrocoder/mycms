<?php
    $this->breadcrumbs=$this->getBreadCrumbs();
    
    $this->pageTitle=Yii::app()->name . " - {$data->title}";
    $this->pageKeywords = $data->keywords;
    $this->pageDescription = $data->description;

    echo '<h2 class="page_header">' . $data->title . '</h2>';
    echo $data->content;
?>
