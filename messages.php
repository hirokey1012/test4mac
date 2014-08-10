<?php
header( 'Content-type: text/xml' );
mysql_connect( '157.112.147.201', 'herbivore_root', '1qaz2wsx' );
mysql_select_db( 'herbivore_chat' );
if ( $_REQUEST['past'] ) {
    $result = mysql_query('SELECT * FROM chatitems WHERE id > '.
        mysql_real_escape_string( $_REQUEST['past'] ).
        ' ORDER BY added LIMIT 50');
} else {
    $result = mysql_query('SELECT * FROM chatitems ORDER BY added LIMIT 50' );    
}
?>
<chat>


<?php
while ($row = mysql_fetch_assoc($result)) {
?>
<message added="<?php echo( $row['added'] ) ?>" id="<?php echo( $row['id'] ) ?>">
    <user><?php 
	mb_language("uni"); 
	mb_internal_encoding("sjis");  
	mb_http_input("auto");  
	mb_http_output("sjis");  
    echo( htmlentities( $row['user'] ) ) ?></user>
    <text><?php 
	mb_language("uni"); 
	mb_internal_encoding("sjis");  
	mb_http_input("auto");  
	mb_http_output("sjis");  
    echo( htmlentities( $row['message'] ) ) ?></text>
</message>
<?php
}
mysql_free_result($result);
?>
</chat>