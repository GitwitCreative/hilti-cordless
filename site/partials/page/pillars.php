<?php
  array_push($section_names, get_page_propery($page_secion_name, 'pillars')->navigation_name);
  array_push($section_tooltips, get_page_propery($page_secion_name, 'pillars')->navigation_title);
?>
<div class="article pillars">

  <h3><?php echo get_page_propery('content', 'pillars')->headline; ?></h3>

  <?php if (get_page_propery('content', 'pillars')->pillars) : ?>
    <div class="pillars--container">

      <?php foreach (get_page_propery('content', 'pillars')->pillars as $pillar) : ?>
        <div class="pillars--content">

          <h4><?php echo $pillar->headline; ?></h4>

          <?php if ($pillar->{'solutions-1'}) : ?>
            <p><?php echo $pillar->{'solutions-1'}; ?></p>
          <?php endif; ?>

          <?php if ($pillar->{'solutions-2'}) : ?>
            <p><?php echo $pillar->{'solutions-2'}; ?></p>
          <?php endif; ?>

          <?php if ($pillar->{'solutions-3'}) : ?>
            <p><?php echo $pillar->{'solutions-3'}; ?></p>
          <?php endif; ?>

        </div>
      <?php endforeach; ?>

    </div>
  <?php endif; ?>

</div>
