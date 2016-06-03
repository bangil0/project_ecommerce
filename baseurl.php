<?php

#region GET PROTOCOL
$protocol = ( isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https' ) ||
( isset( $_SERVER['HTTPS']) && ( strtolower( $_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1' ) )
    ? 'https' : 'http';
#endregion

#region DOCUMENT ROOT USING REALPATH
$docroot = function_exists('realpath') ? realpath($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT'];
#endregion

#region CLEAN PATH
$docroot = str_replace( array( "\\", "\\\\" ), "/", $docroot );
#endregion

#region GETTING DOCUMENT ROOT USING REALPATH AVOID DIR SYMLINK IF PROVIDE
$base    = function_exists('realpath') ? realpath(dirname(__FILE__)) : dirname(__FILE__);
$base    = str_replace( array( "\\", "\\\\" ), "/", $base );
#endregion

#region GETTING HOST AS DOMAIN
$host    = ( isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : false );
#endregion

#region GETTING PORT
$port = $_SERVER['SERVER_PORT'];
#endregion

/**
 * if no host exits
 *  if server is not support !important
 */
if( ! $host ) :
    header( 'HTTP/1.1 400 Bad Request');
    die('Server Not Supported, HTTP_HOST / SERVER_NAME is not defined!');
endif;

$path     = str_replace( $docroot, '', $base );
$path     = '/'.trim($path, '/');
$baseurl  = rtrim( $protocol.'://'. $host.':'.$port.$path .'/');
$baseurl  = $baseurl.'../../../'.'referensi_web/ecommerce/web/';
$baseurl  = $baseurl.'../../../';
// var_dump($baseurl);
?>