<footer>
  <?php for($i = 1; $i <= 2; $i++) : ?><div
      class="block" style="background-color: #000; background-image: url('<?php echo get_page_propery('footer', 'section-' . $i)->image; ?>')">
    <div class="inner">
        <a href="<?php echo url(get_page_propery('footer', 'section-' . $i)->link); ?>"
            <?php if (get_page_propery('footer', 'section-' . $i)->target == 'on') : ?>
              target="_blank"
            <?php endif; ?>
            class="icon icon-arrow-right__after <?php echo get_site_propery('general', 'tracking_element_' . $i); ?>"
            id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?><?php echo get_page_propery('footer', 'section-' . $i)->trackingId; ?>">
          <?php echo get_page_propery('footer', 'section-' . $i)->cta; ?>
        </a>

        <?php if (get_page_propery('footer', 'section-' . $i)->phone) : ?>
          <div class="phone">
            <?php echo get_page_propery('footer', 'section-' . $i)->phone; ?>
          </div>
        <?php endif; ?>
    </div>
  </div><?php endfor; ?>
</footer>
