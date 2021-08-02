<?php //global styles 

$settings = get_field('ar_idx2020theme_settings', 'option');


?>
<style>
  #IDX-main {
    width: auto;
    min-width: 100%;
    margin-left: calc(var(--hundredp_padding-fallback_to_zero) * -1);
    margin-right: calc(var(--hundredp_padding-fallback_to_zero) * -1);
  }
  article.post.idx-wrapper {
    margin-bottom: 0;
  }
  div#IDX-main + img {
     display: none;
  }
  #IDX-main {
    --raplus_idx_title_align: <?php echo $settings['title']['align']; ?>;
    --raplus_idx_title_wrap: <?php echo $settings['title']['wrap']; ?>;
    --raplus_idx_title_direction: <?php echo $settings['title']['direction']; ?>;;
    --raplus_idx_title_border_width: <?php echo $settings['title']['border_width']; ?>;
    --raplus_idx_title_border_style: <?php echo $settings['title']['border_style']; ?>;
    --raplus_idx_title_border_color: <?php echo $settings['title']['border_color']; ?>;
    --raplus_idx_title_sep_width: <?php echo $settings['title']['sep_width']; ?>;
    --raplus_idx_title_sep_max_width: <?php echo $settings['title']['sep_max_width']; ?>;
    --raplus_idx_title_sep_order: <?php echo $settings['title']['sep_order']; ?>;
    --raplus_idx_tab_border_color: <?php echo $settings['tab']['border_color']; ?>;
    --raplus_idx_tab_accent_color: <?php echo ($settings['tab']['accent_color']=='primary') ? 'var(--primary_color, #000000)' : $settings['tab']['accent_color_custom']; ?>;
    --raplus_idx_tab_active_color: <?php echo $settings['tab']['active_color']; ?>;
    --raplus_idx_tab_inactive_color: <?php echo $settings['tab']['inactive_color']; ?>;
    --raplus_idx_tab_font_size: <?php echo $settings['tab']['font_size']; ?>;
    --raplus_idx_alt_content_bg_color: <?php echo $settings['general']['alt_bg']; ?>;
    --raplus_idx_btn_txt_size: <?php echo $settings['general']['button_text']; ?>;
    --raplus_idx_captcha_display: <?php echo $settings['general']['captcha']; ?>;
  }
</style>