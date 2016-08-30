<div class="top-menu">
    <ul>
        <?php

        foreach (get_site_section('navigation') as $item) :
            $navLink = $item->link;

            // if not an external URL, append general domain
            if (!preg_match('/http/', $navLink)) {
                $navLink = get_site_propery('general', 'domain') . $navLink;
            }

            $navLink = $item->link;

            // if not an external URL, append general domain
            if (!preg_match('/http/', $navLink)) {
                $navLink = get_site_propery('general', 'domain') . $navLink;
            }

            ?>
            <li<?php echo ($item->real_link == get_current_page()->name) ? ' class="is-active active"' : '' ?>>
                <a href="<?php echo $navLink; ?>"
                   class="<?php echo get_site_propery('general', 'tracking_element_1'); ?>"
                   id="<?php echo $item->trackingId; ?>">
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
    </ul>
</div>