<?php

    global $maxiveObj;

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}

    // Get the post id
    $portfolio_id = get_the_ID();

    // Get the post Title
    $portfolio_title = get_the_title();


    // Get the post media
    $attachment_id = get_post_thumbnail_id( $portfolio_id );
    $portfolio_media = wp_get_attachment_image_src( $attachment_id, 'maxive-portfolio-img-large');

    // get the post url
    $portfolio_url = get_the_permalink();

    $share_media = array(
        array(
            'type'  => 'facebook',
            'icon'  => 'facebook',
        ),
        array(
            'type'  => 'twitter',
            'icon'  => 'twitter',
        ),
        array(
            'type'  => 'pinterest',
            'icon'  => 'pinterest',
        ),
        array(
            'type'  => 'googleplus',
            'icon'  => 'google-plus',
        ),
        array(
            'type'  => 'linkedin',
            'icon'  => 'linkedin',
        )
    );
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

    <div class="pf-social-share">

        <?php foreach( $share_media as $media  ) : ?>

            <a href="#"
                data-type="<?php echo esc_attr( $media['type'] ); ?>"
                data-url="<?php echo esc_url( $portfolio_url ); ?>"
                data-title="<?php echo esc_attr( $portfolio_title ); ?>"
                data-description="<?php echo esc_attr( $portfolio_description ); ?>"
                data-media="<?php echo esc_url( $portfolio_media[0] ); ?>"
            >
                <i class="fa fa-<?php echo esc_attr($media['icon']); ?>"></i>
            </a>

        <?php endforeach; ?>
    </div>

</div>
