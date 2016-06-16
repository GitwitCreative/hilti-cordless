<?php
  $pagecontent = (array) get_page_section('content');
  $section_keys = array_filter(array_keys($pagecontent), function ($key) {
    return substr($key, 0, 8) == 'section-';
  });
?>

<article class="slide">
  <?php include('partials/page/header.php'); ?>
</article>

<?php for ($i = 1; $i <= count($section_keys); $i++) : ?>
  <?php
    $section = $pagecontent[$section_keys[$i]];

    array_push($section_names, $section->persona_id);
    array_push($section_tooltips, $section->name);

    include('partials/page/content__section.php');
  ?>
<?php endfor; ?>

<article class="slide footer" role="main">
  <?php include('partials/page/pillars.php'); ?>
  <?php include('partials/page/footer.php'); ?>
</article>

<?php
  for ($i = 1; $i <= count($section_keys); $i++) {
    $section = $pagecontent[$section_keys[$i]];

    foreach ($section->benefit as $benefit) {
      if ($benefit->service_name) {
        include('partials/page/content__service-layer.php');
      }
    }
  }
?>
