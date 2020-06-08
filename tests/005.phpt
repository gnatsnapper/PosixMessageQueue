--TEST--
O_EXCL Flag Test
--SKIPIF--
<?php
if (!extension_loaded('pmq')) {
	 var_dump( 'skip';
}
?>
--FILE--
<?php
$name = '/testqueue' . bin2hex( random_bytes(8) );
$pmq1 = new PMQ($name, PMQ_CREAT|PMQ_WRONLY);
try { $pmq2 = new PMQ($name, PMQ_EXCL|PMQ_CREAT|PMQ_RDONLY); }
catch (Exception $e)
    {
        var_dump( $e->getMessage() );
    }
var_dump( $pmq1->unlink() );
?>
--EXPECT--
string(11) "File exists"
bool(true)