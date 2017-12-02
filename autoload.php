<?php
spl_autoload_register( function( $class ) {
    $path = (str_replace( '\\', '/', $class));
    $path = dirname(__FILE__) . DIRECTORY_SEPARATOR . $path;
    require_once $path . '.php';
});