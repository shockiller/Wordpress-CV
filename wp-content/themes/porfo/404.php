<?php 
get_header();
?>

<div class="container err_area">
	<div class="row">
		<div class="col-md-12">
			<article class="no-post">

				<div class="post_content">
				    <a href="<?php the_permalink(); ?>" class="h3 post__title">
						<h3><?php esc_html_e('Sorry, no posts found!', 'porfo'); ?></h3>
				    </a>


					<p><?php esc_html_e('Please create a post from', 'porfo'); ?> <a href="<?php echo esc_url(home_url('/')); ?>wp-admin/post-new.php"><?php esc_html_e('here', 'porfo'); ?></a>  <?php esc_html_e(' or try search something instead', 'porfo'); ?> </p>

					<div class="no-post-search-form">
						<?php get_search_form(); ?>
					</div>

				</div>
			</article>
		</div>

	</div>
</div>


<?php
get_footer();
?>
