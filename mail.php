<?php
bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )
?>
<?php
 
var_dump( mail( '0136954626@celcom.com', '', 'This was sent with PHP.' ) ); // bool(true)
 
?>