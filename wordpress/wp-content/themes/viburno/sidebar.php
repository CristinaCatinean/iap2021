<?php
/**
* The sidebar containing the main widget area
*
* If no active widgets are in the sidebar, hide it completely.
*
* @package viburno
*/
?>


<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : /* display widget of primary sidebar */ ?>


<?php endif; ?>
