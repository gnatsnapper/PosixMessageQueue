--TEST--
Default send and receive Test
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
var_dump( $pmq->send("hello") );
var_dump( $pmq->receive() );
var_dump( $pmq->unlink() );
?>
--EXPECT--
bool(true)
string(5) "hello"
bool(true)
