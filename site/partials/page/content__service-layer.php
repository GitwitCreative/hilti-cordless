<?php if ($benefit->show_service_layer == 'on') : ?>
  <div class="service-detail" data-service="<?php echo $benefit->service_name; ?>">

    <div class="content_wrapper_outer">
      <div class="content_wrapper_inner">
        <div class="content">
          <h3><?php echo $benefit->service_headline; ?></h3>
          <h4><?php echo $benefit->service_subheadline; ?></h4>
          <?php echo $benefit->service_copy; ?>
        </div>
      </div>
    </div>

    <div class="buttons">
      <a class="link link__contact <?php echo get_site_propery('general', 'tracking_element_2'); ?>"
          id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?><?php echo $benefit->service_contactlink_trackingId; ?>"
          target="_blank"
          href="<?php echo $benefit->service_contactlink_href; ?>">
        <?php echo $benefit->service_contactlink_text; ?>
      </a>
      <a class="link link__related <?php echo get_site_propery('general', 'tracking_element_1'); ?>"
          id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?><?php echo $benefit->service_relatedlink_text; ?>"
          target="_blank"
          href="<?php echo $benefit->service_relatedlink_href; ?>">
        <?php echo $benefit->service_relatedlink_text; ?>
      </a>
    </div>

    <a href="javascript:;" class="icon icon-close"></a>

  </div>
<?php endif; ?>
