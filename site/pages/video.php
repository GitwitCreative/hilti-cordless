<?php
  $pagecontent = (array) get_page_section('video');
  $section_keys = array_filter(array_keys($pagecontent), function ($key) {
    return substr($key, 0, 8) == 'section-';
  });
?>

<div class="video-scroll__wrapper js-video-scroll__wrapper">
  <article class="slide">
    <?php include('partials/page/header.php'); ?>
  </article>

  <?php for ($i = 0; $i < count($section_keys); $i++) : ?>
    <div class="slide animation--wrapper animation__scene-<?php echo $i ?>"></div>
  <?php endfor; ?>

  <article class="slide footer">
    <?php include('partials/page/products.php'); ?>
    <?php include('partials/page/footer.php'); ?>
  </article>
</div>

<div class="video-scroll__content">
  <div class="video-scroll__header">
    <article class="slide">
      <?php include('partials/page/header.php'); ?>
    </article>
  </div>
  <?php $i = 1; foreach ($section_keys as $key) : ?>
    <?php
      $section = $pagecontent[$key];

      if (!empty($section)) {

        array_push($section_names, $section->name);
        array_push($section_tooltips, $section->navigation_title);

        include('partials/page/video__section.php');
      }
    ?>
  <?php $i++; endforeach; ?>

  <article class="slide footer">
    <?php
      array_push($section_names, 'products');
      array_push($section_tooltips, get_page_propery($page_secion_name, 'products')->navigation_title);
    ?>
    <?php include('partials/page/products.php'); ?>
    <?php include('partials/page/footer.php'); ?>
  </article>
</div>

<?php include('partials/page/video__video.php'); ?>
