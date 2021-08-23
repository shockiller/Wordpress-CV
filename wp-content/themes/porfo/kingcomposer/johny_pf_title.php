<?php 

    extract( $atts );

    //custom class		
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}

        // Get taxonomies for single portfolio posts
    $tags      = get_the_terms( get_the_ID(), 'portfolio-tag' );
    $tagsCount = count( $tags );
    $count      = 0;
    $termArr = array();

    // Loop over throuth each the terms 
    if( $tags ) {
        foreach($tags as $type) {
                $termArr[] = strtolower( $type->name ) ;
        }
    }
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<div class="portfolio-details-title">
		
		<?php if( $pf_title_top == true ) :  ?>

			<?php if( $pf_title_switch ) : ?>
				<h3><?php echo esc_html( $pf_dtl_title ); ?></h3>
			<?php else: ?>
		    	<h3><?php esc_html( the_title() ); ?></h3>
		    <?php endif; ?>
		
		<?php endif; ?>
		

			<?php if( $pf_tags_switch == 'yes' ) : ?>
			    <p class="pf_tags"><?php echo implode(', ', $termArr);  ?></p>
			<?php endif; ?>
		

		<?php if( $pf_title_top == false ) :  ?>

			<?php if( $pf_title_switch ) : ?>
				<h3><?php echo esc_html( $pf_dtl_title ); ?></h3>
			<?php else: ?>
		    	<h3><?php esc_html( the_title() ); ?></h3>
		    <?php endif; ?>
		
		<?php endif; ?>
	</div>
</div>