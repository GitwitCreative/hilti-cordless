<?php
if (!is_null($category_id)) :
    $products = get_products_by_category_id($category_id);
    $category = get_category_by_id($category_id);
    ?>
    <div class="submenu">
        <ul>
            <li>
                <a href="<?php echo url($category['general']['export']); ?>">
                    <div class="header black hiltiSmallHeavyExtended"><?php echo $category['main']['title']; ?></div>
                    <div class="text gray hiltiSmall"><?php echo $category['main']['description']; ?></div>
                </a>
            </li>
            <?php
            $i = 0;
            foreach ($products as $product):
                if ($i++ > 4) break;
                ?>

                <li class="<?php echo $product['general']['id'] == $product_id ? 'active' : ''; ?>">
                    <a href="<?php echo url($product['general']['export']); ?>"><img
                            src="<?php echo $product['general']['main_image']; ?>"/>
                        <div
                            class="header red hiltiSmallHeavyExtended spaced"><?php echo $product['general']['title']; ?></div>
                        <div
                            class="text black hiltiSmall label spaced"><?php echo $product['general']['description']; ?></div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
endif;
?>