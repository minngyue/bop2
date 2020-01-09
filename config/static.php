<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/9
 * Time: 17:07
 */
$version = 1.0;

return [
    'default_css' =>[
        'plugins/bootstrap/css/bootstrap.min.css',              // Bootstrap Core CSS
        'plugins/fontawesome/css/font-awesome.min.css',         //Awesome Fonts
        'plugins/validform/v5.3.2.min.css?v='.$version,         //ValidateForm
        'css/app.min.css',
        'css/install.min.css',
    ],
    'default_js'=>[
        'js/jquery2.1.0.min.js',
        'plugins/validform/v5.3.2.min.js'
    ]
];