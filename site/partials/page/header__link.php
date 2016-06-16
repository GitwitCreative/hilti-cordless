<li>
    <?php
    if(!empty($_GET['deploy']) && $_GET['deploy'] == '1' && get_page_propery('general', 'type') == 'content') {
        $absUriPreVarHeader = get_site_propery('general', 'domain').get_page_propery('general', 'export');
    } else {
        $absUriPreVarHeader = $absUriPreVar;
    }
    ?>

  <a href="<?php echo $absUriPreVarHeader.$link->link; ?>"
      class="<?php echo get_site_propery('general', 'tracking_element_1'); ?> <?php
          if (get_page_propery('general', 'type') === 'content') :
            if ($index == 0 || $index == 4) :
              echo 'outer';
            elseif ($index == 1 || $index == 3) :
              echo 'inner';
            elseif ($index == 2) :
              echo 'middle';
            endif;
          else :
            echo 'icon icon-' . $link->icon;
          endif;
      ?>"
      <?php if ($link->background || $link->background_hover) : ?>
        style="background-image: url(<?php echo $link->background; ?>), url(<?php echo $link->background_hover; ?>);"
      <?php endif; ?>
      id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?><?php echo $link->trackingId; ?>">
    <span>
      <span class="title"><?php echo $link->text; ?></span>
      <?php if ($link->description) : ?>
        <span class="subtitle">
          <?php echo $link->description; ?>
        </span>
      <?php endif; ?>
    </span>
  </a>
</li>
