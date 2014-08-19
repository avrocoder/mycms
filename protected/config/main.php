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
        'bootstrap' => realpath(__DIR__ . '/../extensions/yiistrap'), // change this if necessary
    ),
       // 'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My CMS',
        'language'          => 'ru',               // язык по умолчанию
        'sourceLanguage'    => 'en',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'bootstrap.helpers.*',
                'bootstrap.behaviors.*',
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
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
                'showScriptName'=>false,
			'rules'=>array(
                '/<action:\w+>'=>'site/<action>',
                                'page/<slug>'                                   =>  'page/page/index',
                                //'backend/<module>/<controller>/<action>'        =>  '<module>/<controller>backend/<action>',
                                'backend/pages'                                 =>  'page/pagebackend/index',
                                'backend/pages/<action>'                        =>  'page/pagebackend/<action>',
				
                                //general
                                '<controller:\w+>/<id:\d+>'                     =>  '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'        =>  '<controller>/<action>',
				'<controller:\w+>/<action:\w+>'                 =>  '<controller>/<action>',
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
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
                /*'bootstrap'=>array(
                    'class'=>'bootstrap.components.Bootstrap',
                ),*/
            
                'bootstrap' => array(
                    'class' => 'bootstrap.components.TbApi',   
                ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);