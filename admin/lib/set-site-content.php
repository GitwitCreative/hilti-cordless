<?php
$SITE['languages']           = get_languages();
$SITE['sites']               = get_sites();
$SITE['current-site']        = $SITE['sites'][get_current_site()];
$SITE['current-site']->pages = get_pages();
$SITE['page']                = get_current_page();
$SITE['category']            = get_current_category();
$SITE['product']             = get_current_product();
$SITE['tile']                = get_tile();
