<?php
$slides = (array)$SITE['product']->slide_content;

if (count($slides) > 0) {
    foreach ($slides as $slideIndex => $section) {
        $slide = $section;
        list($tmp, $i) = explode('_', $slideIndex);

        $contentSlideTitle = "Content slide ({$i})";

        include 'partials/page/product__slide_content_item.php';
    }
} else {
    $i = 1;

    $slideIndex = 'slide_' . $i;
    $slide = $section = null;

    $contentSlideTitle = 'New content slide';

    include 'partials/page/product__slide_content_item.php';
}
?>

<button
    id="add_slide_content"
    style="position: fixed; display: block; right: 0; bottom: 0; margin-right: 40px; margin-bottom: 40px; z-index: 900;"
    class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent __card__add"
    type="button"
    title="Add new content slide"
    data-js-copy
    data-js-target=".product_page"
    data-js-element=".js-copy-content-element"
    data-js-index="<?php echo $i + 1; ?>">
    <i class="material-icons mdl-color-text--white" role="presentation">add</i>
    <span class="visuallyhidden">add</span>
</button>

<script type="x/template" class="js-copy-content-element hidden">
    <?php
    $i = '{{id}}';
    $slideIndex = 'slide_{{id}}';
    $section = null;
    $contentSlideTitle = 'New content slide';

    include 'partials/page/product__slide_content_item.php';
    ?>
</script>