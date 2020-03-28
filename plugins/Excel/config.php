<?php

return [

    // Name of Plugin
    'name' => 'Excel',

    //Namespace to be used as classes/plugin folder name
    'namespace' => 'Excel',

    //Description of plugin
    'description' => '',

    //List of providers used to develop this plugin.
    'providers' => [
        Maatwebsite\Excel\ExcelServiceProvider::class,
    ]

];
