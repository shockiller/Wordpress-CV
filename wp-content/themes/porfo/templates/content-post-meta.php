<?php
     // If the post is sticky
    if( is_sticky() ) {
        echo '<span class="featured-post"><i class="fa fa-thumb-tack"></i> '. esc_html__('Sticky ', 'porfo') .'</span><span class="sep">|</span>';
    }
?>

<?php
// Show the time
esc_html( the_time( get_option('date_format') ) ) ?>  <span class="sep">|</span>

<?php
esc_html_e('By: ', 'porfo');
// Get the author posts link
esc_url(the_author_posts_link()); ?> <span class="sep">|</span>


<?php
// Get the category list
$categories_list = get_the_category_list( esc_html__( ', ', 'porfo' ) );
if ( $categories_list ) {
    echo '<span class="categories-links"> '. esc_html_e('In: ', 'porfo')  . $categories_list . '</span> <span class="sep">|</span> ';
}

// Get the tag list
$tag_list = get_the_tag_list( '', esc_html__( ', ', 'porfo' ) );
if ( $tag_list ) {
    echo '<span class="tags-links">' . esc_html__('Tags: ', 'porfo') . $tag_list . '</span> <span class="sep">|</span> ';
}

?>

<?php comments_popup_link(
    esc_html__('No comments', 'porfo'),
    esc_html__('1 Comment', 'porfo'),
    esc_html__('% comments', 'porfo')
); ?>

<?php
    edit_post_link(
        sprintf(
            /* translators: %s: Name of current post */
            '<span class="sep">|</span>' . __( ' Edit <span class="screen-reader-text"> "%s"</span>', 'porfo' ),
            get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
    );
?>
