<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	$parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);
	wp_enqueue_style( 'child-style',
		get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);
}


add_action ( 'category_edit_form_fields', function( $tag ){
    $img_url = get_term_meta( $tag->term_id, '_pagetitle', true ); ?>
    <tr class='form-field'>
        <th scope='row'><label for='img_url'><?php _e('Image URL'); ?></label></th>
        <td>
            <input type='text' name='img_url' id='img_url' value='<?php echo $img_url ?>'>
            <p class='description'><?php _e('URL for Category Image '); ?></p>
        </td>
    </tr> <?php
});
add_action ( 'edited_category', function( $term_id ) {
    if ( isset( $_POST['img_url'] ) )
        update_term_meta( $term_id , '_pagetitle', $_POST['img_url'] );
});