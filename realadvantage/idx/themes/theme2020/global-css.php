<?php //global styles 

$settings = get_field('ar_idx2020theme_settings', 'option');


?>
<style>
  .ui-widget.ui-widget-content.IDX-registrationModal {
      position: fixed!important;
  }
  .ui-widget-overlay {
      background-color: #000000;
      opacity: 0.5;
  }
  div#regModal-closeLink a, div#regModal-closeLink a i {
      color: #ffffff!important;
  }
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
    --form_border_width: var(--form_border_width-top); 
    --nav_typography-font-family: "Open Sans";
    --nav_typography-font-weight: 400;
    --nav_typography-font-size: 1.1rem;
    --raplus_idx_title_align: center;
    --raplus_idx_title_wrap: wrap;
    --raplus_idx_title_direction: column;
    --raplus_idx_title_border_width: 0;
    --raplus_idx_title_border_style: none;
    --raplus_idx_title_border_color: transparent;
    --raplus_idx_title_sep_width: 0;
    --raplus_idx_title_sep_max_width: 0;
    --raplus_idx_title_sep_order: 0;
    --raplus_idx_tab_border_color: #e2e2e2;
    --raplus_idx_tab_accent_color: var(--primary_color, #000000);
    --raplus_idx_tab_active_color: #ffffff;
    --raplus_idx_tab_inactive_color: #f9f9fb;
    --raplus_idx_tab_font_size: 1.4rem;
    --raplus_idx_alt_content_bg_color: #f5f5f5;
    --raplus_idx_btn_txt_size: 1.4rem;
    --raplus_idx_captcha_display: none;
  }
</style>