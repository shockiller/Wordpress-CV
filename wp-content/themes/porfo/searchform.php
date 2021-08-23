<?php
/**
 * Template for displaying search forms in Porfo
 *
 * @package WordPress
 * @subpackage Porfo
 * @since Porfo 1.0
 */
?>

<section class="johny-search-form">
     <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
    	<label class="screen-reader-text" for="s"><?php esc_html_e('Search',  'porfo') ?></label>
     	<input type="search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type to search here...', 'porfo'); ?>" />
     	<button type="submit" id="searchsubmit"><i class="ti-search"></i></button>
     </form>
</section>
