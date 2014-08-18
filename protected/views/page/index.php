<?php

        $this->pageTitle=Yii::app()->name . " - {$data->title}";
        $this->pageKeywords = $data->keywords;
        $this->pageDescription = $data->description;

        echo '<h2 class="page_header">' . $this->pageTitle . '</h2>';
        echo $data->content;
?>
