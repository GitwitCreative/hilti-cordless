<nav id="nav" role="navigation" aria-labelledby="main">
    <div class="block">
        <h2 class="block-title"><?php echo get_site_propery('general', 'navigation_title'); ?></h2>

        <ul class="primary">
            <?php

            foreach (get_site_section('navigation') as $item) :
                $navLink = $item->link;

                // if not an external URL, append general domain
                if(!preg_match('/http/',$navLink)) {
                    $navLink = get_site_propery('general', 'domain').$navLink;
                }

                ?>
                <li<?php echo ($item->real_link == get_current_page()->name) ? ' class="is-active"' : ''?>>
                    <a href="<?php echo $navLink; ?>" class="<?php echo get_site_propery('general', 'tracking_element_1'); ?>" id="<?php echo $item->trackingId; ?>">
                        <?php echo $item->title; ?>
                    </a>

                    <?php if ($item->children) : ?>
                        <ul class="secondary">
                            <?php foreach ($item->children as $child) : ?>
                                <li>
                                    <a class="icon <?php echo $child->class; ?>" href="<?php echo $child->link; ?>">
                                        <?php echo $child->title; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
            <!-- <li>
                <a href="{{i18n "navigation.share.link"}}" class="<?php echo get_site_propery('general', 'tracking_element_1'); ?>" id="{{i18n "navigation.share.trackingId"}}" data-modify="true">{{i18n "navigation.share.title"}}</a>
                <ul class="secondary">
                    <li><a class="icon icon-email" href="{{i18n "navigation.share.mail.link"}}">{{i18n "navigation.share.mail.title"}}</a></li>
                    <li><a class="icon icon-twitter" target="_blank" href="{{i18n "navigation.share.twitter.link"}}">{{i18n "navigation.share.twitter.title"}}</a></li>
                    <li><a class="icon icon-linkedin" target="_blank" href="{{i18n "navigation.share.linkedin.link"}}">{{i18n "navigation.share.linkedin.title"}}</a></li>
                    <li><a class="icon icon-facebook" target="_blank" href="{{i18n "navigation.share.facebook.link"}}">{{i18n "navigation.share.facebook.title"}}</a></li>
                </ul>
            </li> -->
        </ul>
        <a class="close-btn" id="nav-close-btn" href="#top">&times; <span><?php echo get_site_propery('general', 'navigation_close_button'); ?></span></a>
    </div>
    <?php
        include('partials/language_selector.php');
    ?>
</nav>
