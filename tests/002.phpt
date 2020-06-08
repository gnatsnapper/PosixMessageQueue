--TEST--
Default instantiation and unlink Test
--SKIPIF--
<?php
if (!extension_loaded('pmq')) {
	 var_dump( 'skip';
}
?>
--FILE--
<?php
$name = '/testqueue' . bin2hex( random_bytes(8) );
$pmq = new PMQ($name);
var_dump( $pmq->unlink() );
?>
--EXPECT--
bool(true)
