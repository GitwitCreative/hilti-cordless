<article class="slide">
  <div class="article persona persona__<?php echo $section->persona_id; ?>">

    <div class="persona--quote_statement">

      <img src="<?php echo $section->image_small; ?>" alt="<?php echo $section->image_alt; ?>" class="persona--image show-for-small-up hide-for-large-up">
      <img data-image="<?php echo $section->image_medium; ?>" alt="<?php echo $section->image_alt; ?>" class="persona--image show-for-large-up hide-for-xxlarge-up">
      <img data-image="<?php echo $section->image_large; ?>" alt="<?php echo $section->image_alt; ?>" class="persona--image show-for-xxlarge-up">

      <div class="persona--quote">
        <p><?php echo $section->quote; ?></p>
      </div>

      <div class="persona--statement">
        <p class="title"><?php echo $section->name; ?></p>
        <p><?php echo $section->statement; ?></p>
      </div>

      <div class="persona--arrow--container persona--arrow__details">
        <a class="persona--arrow icon icon-arrow-right <?php echo get_site_propery('general', 'tracking_element_1'); ?>" id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?><?php echo $section->moreLink_trackingId; ?>" href="javascript:;">
          <?php echo $section->moreLink_text; ?>
        </a>
      </div>
    </div>

    <?php if ($section->benefit) : ?>
      <div class="persona--benefit_content" style="background-image: url('<?php echo $section->benefits_background; ?>');">
        <div class="persona--statement">
          <p class="title"><?php echo $section->name; ?></p>
          <p><?php echo $section->statement; ?></p>
        </div>

        <?php $j = 0; foreach ($section->benefit as $benefit) : ?>
          <a class="persona--benefit <?php echo get_site_propery('general', 'tracking_element_1'); ?>"
              id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?><?php echo $benefit->trackingId; ?>"
              href="<?php echo $benefit->relatedlink_href; ?>"
              <?php if ($benefit->relatedlink_newWindow == 'on') : ?>
                target="_blank"
              <?php endif; ?>
              <?php if ($benefit->service_name) : ?>
                data-details="<?php echo $benefit->service_name; ?>"
              <?php endif; ?>
          >
            <span class="tile">
              <span class="front">
                <span class="h4"><?php echo $benefit->headline; ?></span>
                <span class="copy"><?php echo $benefit->copy; ?></span>
                <span class="link icon icon-arrow-right__after"><?php echo $benefit->relatedlink_shorttext; ?></span>
              </span>
              <span class="back">
                <span class="h3"><?php echo $benefit->title; ?></span>
                <span class="link icon icon-arrow-right__after"><?php echo $benefit->relatedlink_shorttext; ?></span>
              </span>
            </span>
          </a>
        <?php $j++; endforeach; ?>

        <div class="persona--arrow--container persona--arrow__profile">
          <a class="persona--arrow icon icon-arrow-left" href="javascript:;">
            <?php echo $section->backLink_text; ?>
          </a>
        </div>
      </div>
    <?php endif; ?>

  </div>
</article>
