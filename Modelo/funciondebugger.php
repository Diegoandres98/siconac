<?php
function debug_to_console( $data ) { if ( is_array( $data ) ) $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>"; else $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>"; echo $output; }
?>
