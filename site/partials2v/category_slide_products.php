<?php
$products = get_products_by_category_id($category_id);

$i = 1;

foreach ($products as $product) :
    ?>

    <div class="section fp-auto-height">
        <div class="ultimateTextImg <?php echo ($i++ % 2 == 0) ? 'right' : 'left'; ?>">
            <div class="text">
                <h1><?php echo $product['category_description']['title']; ?></h1>
                <h2 class="red uppercase"><?php echo $product['category_description']['sub_title']; ?></h2>
                <p>"<?php echo $product['category_description']['description']; ?>"</p>
                <button class="uppercase"
                        onclick="document.location='<?php echo $product['general']['export']; ?>';">
                    3d demo
                </button>
            </div>
            <div class="img bg-SD_8M-A">
                <?php if (isset($product['category_description']['image_link'])) : ?>
                    <img src="<?php echo $product['category_description']['image_link']; ?>"/>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>