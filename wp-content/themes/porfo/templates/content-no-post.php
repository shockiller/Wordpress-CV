
<article class="no-post">

    <?php if( has_post_thumbnail() ) : ?>
		<a href="<?php esc_url( the_permalink() ); ?>" class="post_img">
            <?php the_post_thumbnail('shape-post-img-large'); ?>
        </a>
    <?php  endif; ?>

	<div class="post_content">
	    <a href="<?php the_permalink(); ?>" class="h3 post__title">
			<h3><?php esc_html_e('Sorry, no posts found!', 'porfo'); ?></h3>
	    </a>

        <?php
            if( current_user_can('manage_options') ) :
        ?>
		      <p>
                  <?php esc_html_e('Please create a post from', 'porfo'); ?>
                      <a href="<?php echo esc_url(home_url('/')); ?>wp-admin/post-new.php"><?php esc_html_e('here', 'porfo'); ?></a>
                  <?php esc_html_e(' or try search something instead', 'porfo'); ?>
              </p>
        <?php endif; ?>

		<div class="no-post-search-form">
			<?php get_search_form(); ?>
		</div>

	</div>
</article>
