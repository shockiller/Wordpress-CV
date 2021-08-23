<?php 

    extract( $atts );

    //custom class		
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}

$prev_post = get_previous_post();


$next_post = get_next_post();


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	
	<?php if( $pf_nav_content == 'only_pf_nav' ) : ?>

		<div class="pf-project-nav">
		    <div class="col-xs-6">
		        <div class="portfolio-details-nav <?php echo esc_attr( $pf_nav_prev_align ); ?>">
		        	<?php 
			        	if($prev_post) {
						   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
						   echo '<a rel="prev" class="button" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">'. esc_html( $prev_btn_text ) .'</a>';
						}
		        	?>
		        </div>
		    </div>
		    <div class="col-xs-6">
		        <div class="portfolio-details-nav <?php echo esc_attr( $pf_nav_next_align ); ?>">
		        	<?php 
			        	if($next_post) {
						   $prev_title = strip_tags(str_replace('"', '', $next_post->post_title));
						   echo '<a rel="next" class="button button-black" href="' . get_permalink($next_post->ID) . '" title="' . $prev_title. '" class=" ">'. esc_html( $next_btn_text ) .'</a>';
						}
		        	?>
		        </div>
		    </div>
		</div>
	
	<?php else : ?>
	
		<div class="pf-project-nav">
		    <div class="col-sm-4 col-xs-6">
		        <div class="portfolio-details-nav <?php echo esc_attr( $pf_nav_prev_align ); ?>">
		        	<?php 
			        	if($prev_post) {
						   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
						   echo '<a rel="prev" class="button" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">'. esc_html( $prev_btn_text ) .'</a>';
						}
		        	?>
		        </div>
		    </div>
		    <div class="col-sm-4 col-md-push-4 col-sm-push-4 col-xs-6">
		        <div class="portfolio-details-nav <?php echo esc_attr( $pf_nav_next_align ); ?>">
		        	<?php 
			        	if($next_post) {
						   $prev_title = strip_tags(str_replace('"', '', $next_post->post_title));
						   echo '<a rel="next" class="button button-black" href="' . get_permalink($next_post->ID) . '" title="' . $prev_title. '" class=" ">'. esc_html( $next_btn_text ) .'</a>';
						}
		        	?>
		        </div>
		    </div>
		    <div class="col-sm-4 col-md-pull-4 col-sm-pull-4 col-xs-12 ">
		        <ul class="project-details-social">
		            <li>
		                <a href="#"><i class="icofont icofont-social-facebook"></i></a>
		            </li>
		            <li>
		                <a href="#"><i class="icofont icofont-social-twitter"></i></a>
		            </li>
		            <li>
		                <a href="#"><i class="icofont icofont-social-instagram"></i></a>
		            </li>
		            <li>
		                <a href="#"><i class="icofont icofont-social-dribbble"></i></a>
		            </li>
		            <li>
		                <a href="#"><i class="icofont icofont-social-behance"></i></a>
		            </li>
		        </ul>
		    </div>

		</div>

	<?php endif; ?>
</div>