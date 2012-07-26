<?php
$this->layout = 'ajax';
foreach( $results as $result ) {
	print( $result['domains']['name'] )."\n";
}
?>
