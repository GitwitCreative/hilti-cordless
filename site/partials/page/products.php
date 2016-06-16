<div class="article products" id="products">
  <div class="products--container">

    <div class="content">
      <h2><?php echo get_page_propery('video', 'products')->subline; ?></h2>
      <span class="h1"><?php echo get_page_propery('video', 'products')->headline; ?></span>
    </div>

    <?php if (get_page_propery('video', 'products')->products) : ?>

      <div class="products--slider products--slider__monitor">

        <?php $i = 0; foreach (get_page_propery('video', 'products')->products as $product) : $i++; ?>

          <!-- <div{{#if side}} class="hasSideItem"{{/if}}> -->
          <div>

            <div class="products--item products--item__main">
              <div>
                <a href="<?php echo $product->link_link; ?>"
                    class="<?php echo get_site_propery('general', 'tracking_element_1'); ?>"
                    id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?>FullProductLine<?php echo $i; ?>"
                    target="_blank">
                  <img src="<?php echo $product->image_slider; ?>" alt="<?php echo $product->headline; ?>"></a></div>
              <div class="products--content">
                <h3>
                  <?php echo $product->headline; ?>

                  <?php if ($product->subheadline) : ?>
                    <br><?php echo $product->subheadline; ?>
                  <?php endif; ?>
                </h3>
                <a href="<?php echo $product->link_link; ?>"
                    class="<?php echo get_site_propery('general', 'tracking_element_1'); ?>"
                    id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?>FullProductLine<?php echo $i; ?>"
                    target="_blank"><?php echo $product->link_text; ?></a>
              </div>
            </div>

            <!-- {{#if side}}
            <div class="products--item products--item__side">
              <div><img src="{{side.image}}"></div>
              <h4>{{side.headline}}</h4>
            </div>
            {{/if}} -->

          </div>

        <?php endforeach; ?>

      </div>
    <?php endif; ?>

    <?php if (get_page_propery('video', 'products')->side_element_headline) : ?>
      <div class="products--slider products--slider__sideElement">
        <div><img src="<?php echo get_page_propery('video', 'products')->side_element_image; ?>"></div>
        <h4><?php echo get_page_propery('video', 'products')->side_element_headline; ?></h4>
      </div>
    <?php endif; ?>


    <?php if (get_page_propery('video', 'products')->products) : ?>
      <div class="products--slider products--slider__navigation">
        <?php foreach (get_page_propery('video', 'products')->products as $product) : ?>
          <div><span><img src="<?php echo $product->image_thumbnail; ?>"></span></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>


    <?php if (get_page_propery('video', 'products')->makeitfit_text) : ?>
      <a href="<?php echo get_page_propery('video', 'products')->makeitfit_link; ?>"
          target="_blank"
          class="products--teaser products--teaser__makeitfit <?php echo get_site_propery('general', 'tracking_element_1'); ?>"
          id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?><?php echo get_page_propery('video', 'products')->makeitfit_trackingId; ?>">
        <span class="products--teaser--content"
            style="background-image: url(<?php echo get_page_propery('video', 'products')->makeitfit_image; ?>);">
          <?php echo get_page_propery('video', 'products')->makeitfit_text; ?>
        </span>
      </a>
    <?php endif; ?>

  </div>
</div>
