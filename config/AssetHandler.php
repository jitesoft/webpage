<?php
return [

    /*
    |----------------------------------------------------------------
    | Asset containers.
    |----------------------------------------------------------------
    |
    | Asset containers to be loaded.
    |
    */
    "containers" => array(
        "images" => [
            "print_pattern" => '<img src="{{URL}}">',
            "file_regex"    => "/\\.(jpg|jpeg|tiff|gif|png|bmp|ico)$/i",
            "path"          => "/public/images",
            "url"           => "/images",
            "versioned"     => false
        ],
        "scripts" => [
            "print_pattern" => '<script src="{{URL}}" type="application/javascript"></script>',
            "file_regex"    => "/\\.js$/i",
            "path"          => "/public/js",
            "url"           => "/js",
            "versioned"     => true
        ],
        "styles" => [
            "print_pattern" => '<link rel="stylesheet" type="text/css" href="{{URL}}" title="{{NAME}}">',
            "file_regex"    => "/\\.css$/i",
            "path"          => "/public/css",
            "url"           => "/css",
            "versioned"     => true
        ],
        //
        // Add your own custom containers here.
        //
    )
];
