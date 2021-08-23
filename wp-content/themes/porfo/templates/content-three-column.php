<?php

$porfo = get_option('porfo');

?>

<div <?php esc_attr( post_class() ); ?>>

	<?php if( has_post_thumbnail() ) : ?>
		<div class="post_thumbnail">
			<div class="post_img">
				<?php
					echo '<a href="'. esc_url( get_the_permalink() ) . '">';
					the_post_thumbnail('porfo-post-img-large');
					echo '</a>';
				?>
			</div>
		</div>
	<?php  endif; ?>



	<div class="porfo_post_meta">
		<h3 class="post__title">
			<a href="<?php esc_url( the_permalink() ); ?>">
				<?php esc_url(  the_title() ); ?>
			</a>
		</h3>

		<div class="entry_header ">

			<ul>

				<?php
					 // If the post is sticky
					if( is_sticky() ) {
						echo '<li><span class="featured-post"><i class="ti pin-alt"></i> '. esc_html__('Sticky ', 'porfo') .'</span></li>';
					}
				?>

				<li>
					<?php
					echo '<i class="ti-user"></i>';
					esc_html_e('By: ', 'porfo');
					// Get the author posts link
					esc_url(the_author_posts_link());
					?>
				</li>

				<?php

					// Get the category list
					$categories_list = get_the_category_list( esc_html__( ', ', 'porfo' ) );
					if ( $categories_list ) {
						echo '<li>';
						echo '<span class="categories-links">' . esc_html__('In: ', 'porfo') . $categories_list . '</span>';
						echo '</li>';
					}

				?>
				<li>

					<?php // Show the time
					 echo '<i class="ti-calendar"></i>';
					 esc_html( the_time( get_option('date_format') ) );
					 ?>
				</li>
				<li>
					<?php
					echo '<i class="ti-comment"></i>';
					comments_popup_link(
						esc_html__('No comments', 'porfo'),
						esc_html__('1 Comment', 'porfo'),
						esc_html__('% comments', 'porfo')
					); ?>
				</li>
				<li>
					<?php
						echo '<i class="ti-pencil"></i>';

						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								__( ' Edit <span class="screen-reader-text"> "%s"</span>', 'porfo' ),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</li>
			</ul>




		</div>
	</div>



	<div class="post_text">

		<div class="post-content clearfix">
			<?php

				the_excerpt();

			?>
		</div>


		<?php

			// Get the tag list
			$tag_list = get_the_tag_list( '', esc_html__( ', ', 'porfo' ) );
			if ( $tag_list ) {
				echo '<div class="johny-post-tags">';
				echo '<span class="tags-label">' . esc_html__('Tags: ', 'porfo') . '</span> ';
				echo '<span class="tags-links">' . $tag_list . '</span> ';
				echo '</div>';
			}


			$read_more_btn_text = isset( $porfo['rmb_text'] ) ? $porfo['rmb_text'] : esc_html__('Continue reading...', 'porfo');
			echo '<div class="read-more-wrapper">';
			echo '<a href="'. esc_url( get_the_permalink() ) .'" class="read-more-btn">'. $read_more_btn_text .'</a>';
			echo '</div>';


		?>


	</div>


</div>
