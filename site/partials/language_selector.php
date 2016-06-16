<?php

  $language_selector = get_site_section('language_selector');
  if( isset($language_selector) ){

?>
<div class="language_selector">
  <h2 class="block-title"><?php echo get_site_propery('general', 'language_selector_mobile_title'); ?></h2>

  <ul class="language_selector__language-list">
    <?php
      foreach( $language_selector as $language_item) {
    ?>
      <li class="language_selector__language<?php echo ( $language_item->code == get_site_propery('general', 'language_html') ) ? ' is-active' : ''?>">
          <a href="<?php echo $language_item->link ?>" title="<?php echo ($language_item->name) ?>">
            <span class="name"><?php echo ($language_item->name) ?></span>
            <span class="abbreviation"><?php echo ($language_item->abbreviation) ?></span>
          </a>
      </li>
    <?php
      }
    ?>
  </ul>

</div>
<?php
  }
?>