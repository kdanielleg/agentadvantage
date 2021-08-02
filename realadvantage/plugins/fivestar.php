<?php
add_filter( 'cron_schedules', 'bl_add_cron_intervals' );

function bl_add_cron_intervals( $schedules ) {

   $schedules['5seconds'] = array( // Provide the programmatic name to be used in code
      'interval' => 5, // Intervals are listed in seconds
      'display' => __('Every 5 Seconds') // Easy to read display name
   );
   return $schedules; // Do not forget to give back the list of schedules!
}

add_action( 'bl_cron_hook', 'bl_cron_exec' );

if( !wp_next_scheduled( 'bl_cron_hook' ) ) {
   wp_schedule_event( time(), '5seconds', 'bl_cron_hook' );
}

function next_update($post_id) {
   $pub = get_the_date( 'Y-m-d H:i:s', $post_id );
   $interval = get_field('auto_update_days', $post_id);;
   return date('Y-m-d H:i:s', strtotime($pub. ' + '.$interval.' days'));
}
function update_now($next) {
   $today = current_time('Y-m-d H:i:s');
   if(strtotime($today) < strtotime($next)) {
      return false;
   } else {
      return true;
   }
}
function update_post_date($run,$post_id,$new_pub) {
   $title = get_the_title($post_id);
   if ($run) {
      $args['ID'] = $post_id;
      $args['post_date'] = $new_pub; // uses 'Y-m-d H:i:s' format
      wp_update_post( $args );
   }
}
function bl_cron_exec() {
   $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'fields' => 'ids',
   );
   $posts = new WP_Query( $args );
   foreach( (array)$posts->posts as $post_id ) {
      $activated = get_field('activate_auto_updates', $post_id);
      if ($activated) {
         $new_pub = next_update($post_id);
         $run = update_now($new_pub);
         update_post_date($run,$post_id,$new_pub);
      }
   }
}