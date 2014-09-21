<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

// Define a path alias for the Bootstrap extension as it's used internally.
// In this example we assume that you unzipped the extension under protected/extensions.

return array(
    // path aliases   
    'aliases' => array(
        'core' => realpath(__DIR__ . '/../modules/core'), // change this if necessary
        'bootstrap' => realpath(__DIR__ . '/../extensions/style/yiistrap'), // change this if necessary
//        'booster' => realpath(__DIR__ . '/../extensions/style/yiibooster'), // change this if necessary
    ),
    
    
       // 'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My CMS',
        'language'          => 'ru',               // язык по умолчанию
        'sourceLanguage'    => 'ru',

	// preloading 'log' component
	'preload'=>array('log'/*, 'booster'*/),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'core.components.controllers.*',
                'core.models.*',
                'core.*',
                'bootstrap.helpers.*',
                'bootstrap.behaviors.TbWidget',
                'bootstrap.widgets.*',

	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345678',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array(
                            'bootstrap.gii',
                        ),
		),
                'page',
                'core'=>array(
                    //default value for cache duration 
                    'cache_duration' => 20,
                ),
                'category',
                'menu',
	),

	// application components
	'components'=>array(
                
//                'booster' => array(
//                    'class' => 'booster.components.Booster',
//                ),
            
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',                    
                'showScriptName'=>false,
			'rules'=>array(
                                'site/<action>'                                 => 'site/<action>',
                                'page/<slug>'                                   =>  'page/page/index',
                                //'backend/<module>/<controller>/<action>'        =>  '<module>/<controller>backend/<action>',
                                'backend/pages'                                 =>  'page/pagebackend/index',
                                'backend/pages/<action>'                        =>  'page/pagebackend/<action>',
                                'backend/categories'                            =>  'category/categorybackend/index',
                                'backend/categories/<action>'                   =>  'category/categorybackend/<action>',
                                'backend/menu/items'                            =>  'menu/menuItembackend/index',
                                'backend/menu/items/<action>'                   =>  'menu/menuItembackend/<action>',
                                'backend/menu'                                  =>  'menu/menubackend/index',
                                'backend/menu/<action>'                         =>  'menu/menubackend/<action>',
				
                                //general
                                '<controller:\w+>/<id:\d+>'                     =>  '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'        =>  '<controller>/<action>',
				'<controller:\w+>/<action:\w+>'                 =>  '<controller>/<action>',
                                //'/<action:\w+>'=>'site/<action>',
			),
		),
                
                /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
                 * 
                 */
		
                // uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mycms.dev',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '12345678',
			'charset' => 'utf8',
                        'tablePrefix' => 'tbl_',
                        'enableProfiling' => true,  //report in the bottom of page
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
//                                      'class'=>'CFileLogRoute',       //default
//					'levels'=>'error, warning',     //default
					'class'=>'CProfileLogRoute',    //report in the bottom of page
					'report'=>'summary',            //report in the bottom of page
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
                            
                'bootstrap'=>array(
                    'class'=>'bootstrap.components.TbApi',   
                ),
                
                'cache'=>array(
                    'class'=>'system.caching.CFileCache',
              ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);