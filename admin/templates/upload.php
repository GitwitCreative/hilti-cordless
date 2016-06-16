<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width">
  <?php
    $title__back = '?action=site&amp;site=' . get_current_site();
    $title__title = 'File manager';

    include('partials/title.php');
  ?>

  <?php if ($index__message) : ?>
    <div class="mdl-grid __layout__max-width">
      <div class="mdl-cell mdl-cell--12-col">
        <?php
          $message__text = $index__message;
          include('partials/message.php');
        ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="mdl-grid __layout__max-width">
    <?php $files = get_site_files() ?>
    <?php if (empty($files)) : ?>
      <div class="mdl-cell mdl-cell--12-col">
        <p class="mdl-typography--title">No files uploaded yet.</p>
      </div>
    <?php else : ?>
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp __table-full-width">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th>Size</th>
            <th class="mdl-data-table__cell--non-numeric">Type</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            <?php foreach(get_site_files() as $file) : ?>
              <tr>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $file['name']; ?></td>
                <td><?php echo $file['size']; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $file['type']; ?></td>
                <td>
                  <form action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>"
                      method="POST">

                    <a href="#"
                        class="mdl-button mdl-js-button mdl-button--icon __table__icon"
                        data-js-show-text data-js-text="<?php echo $SITE['current-site']->general->asset_domain; ?>files/<?php echo get_current_site(); ?>/<?php echo $file['name']; ?>">
                      <i class="material-icons" role="presentation">link</i>
                      <span class="visuallyhidden">Get file link</span>
                    </a>

                    <a href="../dist/files/<?php echo get_current_site(); ?>/<?php echo $file['name']; ?>"
                        class="mdl-button mdl-js-button mdl-button--icon __table__icon"
                        target="_blank">
                      <i class="material-icons" role="presentation">remove_red_eye</i>
                      <span class="visuallyhidden">View file</span>
                    </a>

                    <input type="hidden" name="file" value="<?php echo $file['name']; ?>">
                    <button class="mdl-button mdl-js-button mdl-button--icon __table__icon"
                        data-js-prevent-delete
                        name="delete">
                      <i class="material-icons" role="presentation">delete</i>
                      <span class="visuallyhidden">Delete file</span>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>

  <div class="mdl-grid __layout__max-width">
    <div class="mdl-cell mdl-cell--12-col hidden" data-upload-message>
      <?php
        $message__text = 'Upload files. Please try again.';
        include('partials/message.php');
      ?>
    </div>

    <form action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>"
          class="dropzone mdl-cell mdl-cell--12-col __dropzone"
          id="upload-dropzone"></form>
  </div>
</div>
