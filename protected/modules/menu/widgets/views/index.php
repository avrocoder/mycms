<?php
// $this->widget('booster.widgets.TbNavbar',
//    array(
//        'brand' => 'Title',
//        'fixed' => false,
//    	'fluid' => true,
//        'items' => array(
//            array(
//                'class' => 'booster.widgets.TbMenu',
//            	'type' => 'navbar',
//                'items' => array(
//                    $items
//                )
//            )
//        )
//    )
//);
//echo '<pre>';
//print_r($items);
//echo '</pre>';
$this->widget('bootstrap.widgets.TbNavbar', array(
    'display' => null, // default is static to top
    'brandLabel'=> $brandLabel,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => $items
        ),
    ),
)); 
