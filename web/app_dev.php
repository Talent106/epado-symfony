<?php
date_default_timezone_set('Europe/Warsaw');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;


if(isset($_GET['cc']) && $_GET['cc']==1)
{
  $cache_dir = dirname(__FILE__) . '/../app/cache';
  echo "<b>cache_dir : $cache_dir</b>";
  
  function rrmdir($dir) {
  	if (is_dir($dir)) {
  		$objects = scandir($dir);
  		foreach ($objects as $object) {
  			if ($object != "." && $object != "..") {
  				$o = $dir . "/" . $object;
  				if (filetype($o) == "dir") {
  					rrmdir($dir."/".$object);
  				}
  				else {
  					echo "<br/>" . $o;
  					unlink($o);
  				}
  			}
  		}
  		reset($objects);
  		rmdir($dir);
  	}
  }
  function cc($cache_dir, $name) {
  	$d = $cache_dir . '/' . $name;
  	if (is_dir($d)) {
  		echo "<br/><br/><b>clearing " . $name . ' :</b>';
  		rrmdir($d);
  	}
  }
  if (is_dir($cache_dir)) {
  	if (basename($cache_dir) == "cache") {
  		echo "<br/><br/><b>clearing cache :</b>";
  		cc($cache_dir, "dev");
  		cc($cache_dir, "prod");
  		cc($cache_dir, "test");
  		echo "<br/><br/><b>done !</b>";
  	}
  	else {
  		die("<br/> Error : cache_dir not named cache ?");
  	}
  }
  else {
  	die("<br/> Error : cache_dir is not a dir");
  }
  die();
}


if(isset($_GET['translate']) && $_GET['translate']=='1'){
    
$translate = require_once __DIR__.'/../app/Resources/translations/template.php';   

echo '<?xml version="1.0"?>
<xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">
    <file source-language="pl" datatype="plaintext" original="file.ext">
        <body>
      ';
      //<target>'.$name.'</target>
$temp=array();
foreach ($translate as $id=>$name){

    if(!key_exists($name, $temp)){
        $temp[$name]=true;
    }else{
        //echo('\''.$name.'\''.PHP_EOL);
        
        //die('aaa');
    }
    
    $name_short=''; 
    if(strlen($name)>0) $name_short.=$name[0];
    if(strlen($name)>1) $name_short.=$name[1];
    if(strlen($name)>2) $name_short.=$name[2];
    if(strlen($name)>3) $name_short.=$name[3];
//<target>'.$name_short.'XXX</target>
echo '      <trans-unit id="'.$id.'">
                <source>'.$name.'</source>
                <target></target>
            </trans-unit>
      ';
  
}
//var_dump($temp);


echo '  </body>
    </file>
</xliff>
';
die();
}

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
/*
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1')) || php_sapi_name() === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}
*/

/*
function mergePasswordAndSalt($password, $salt)
    {
        if (empty($salt)) {
            return $password;
        }

        if (false !== strrpos($salt, '{') || false !== strrpos($salt, '}')) {
            die('niedozwolone znaki w salt');
        }

        return $password.'{'.$salt.'}';
    }
    
function encodePassword($raw, $salt)
    {
        $encodeHashAsBase64=true;
        $algorithm='sha512';
        $iterations=5000;

        $salted = mergePasswordAndSalt($raw, $salt);
        $digest = hash($algorithm, $salted, true);

        // "stretch" hash
        for ($i = 1; $i < $iterations; $i++) {
            $digest = hash($algorithm, $digest.$salted, true);
        }

        return $encodeHashAsBase64 ? base64_encode($digest) : bin2hex($digest);
    }
    
echo encodePassword('www','b4ch95y3hfk0sskowg4oo0040kcwcow'); 


dziala i zwraca prawidlowo
JkSlIJJMh++PDx2myUApzQRtAfwj5QVRADHfky4WgChO9KDpX4b3UIarFemRJoedcldhDoxGWO4GL6XoOLN/Xw==
JkSlIJJMh++PDx2myUApzQRtAfwj5QVRADHfky4WgChO9KDpX4b3UIarFemRJoedcldhDoxGWO4GL6XoOLN/Xw==
*/



$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
