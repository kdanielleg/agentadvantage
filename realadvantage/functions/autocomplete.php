<?php //autocomplete

/**Autocomplete Settings**/
function ar_set_google_autocomplete(){
    $search_fields = array();
    if(have_rows('ar_autocomplete','option')) :
        while(have_rows('ar_autocomplete','option')) : the_row();
            $type = get_sub_field('type');
            $key = get_sub_field('selector');
            if($type == 'name') :
                $search_fields[] = ' [name="'.trim($key).'"]';
            elseif($type == 'id') :
                if(!empty($key)) :
                    $findhash = '#';
                    if(strpos($key, $findhash) === false) :
                        $search_fields[] = ' #'.trim($key);
                    else :
                        $search_fields[] = ' '.trim($key);
                    endif;
                endif;
            elseif($type == 'class') :
                if(!empty($key)) :
                    $finddot = '.';
                    if(strpos($key, $finddot) === false) :
                        $search_fields[] = ' .'.trim($key);
                    else :
                        $search_fields[] = ' '.trim($key);
                    endif;
                endif;
            endif;
        endwhile;
    else :
        $search_fields[] =' .google_autocomplete';
    endif; 
    ?>
    <script>
        var input_fields = '<?php echo implode(',' , $search_fields);?>';
    </script>
<?php
}
add_action('wp_head', 'ar_set_google_autocomplete');