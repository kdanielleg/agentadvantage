<?php /**Plus IDX Wrappers Fix **/

add_filter('register_post_type_args', 'idx_layout_fix', 10, 2);
function idx_layout_fix($args, $post_type){
 
    if ($post_type == 'idx-wrapper'){
        $args['show_in_nav_menus'] = true;
    }
 
    return $args;
}

