<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

	<div class="<?php echo esc_attr( $pf_meta_style ) ; ?>">
		<div class="project-info">

			<?php
				if( $pf_metas ) :
					foreach( $pf_metas as $meta ) :
			?>

				<?php echo '<p><span>'. esc_html( $meta->title ) .' :</span> '. esc_html( $meta->info ) .'</p>' ?>

			<?php
					endforeach;
				endif;
			?>
		</div>
	</div>
</div>
