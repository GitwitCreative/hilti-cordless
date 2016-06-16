(function ($) {

  var toggle = function (event) {
    var $element = $(this);
    var selector = $element.data('js-target');
    var dataSelector = $element.data('js-data-selector');
    var data = $element.data('js-data');

    if (!$element.is('input')) {
      event.preventDefault();
    }

    if ($element.data('js-toggle') === 'show') {
      $(selector).removeClass('hidden');
    } else {
      $(selector).toggleClass('hidden');
    }

    if ($(selector).hasClass('hidden')) {
      $element.find('.__list__item__toggle-button').text('keyboard_arrow_right');
    } else {
      $element.find('.__list__item__toggle-button').text('keyboard_arrow_down');
    }

    if (dataSelector) {
      $(selector).find(dataSelector).each(function () {
        if ($(this).is('input')) {
          $(this).val(data);
        } else {
          $(this).text(data);
        }
      });
    }
  };

  var remove = function (event) {
    var selector = $(this).data('js-target');

    event.preventDefault();

    $(this).closest(selector).remove();
  };

  var contentToggle = function () {
    var selector = $(this).data('js-content-toggle');
    var input = $(this).data('js-content-toggle-input');
    var value = $('[name="' + input + '"]:checked').val();
    var target = $(this).data('js-content-toggle-target');
    var $targets = $(target);

    $targets
      .addClass('hidden')
      .filter(function () {
        return $(this).data('js-content-toggle-value') === value;
      })
        .removeClass('hidden');
  };

  var copy = function () {
    var $element = $(this);
    var selector = $element.data('js-element');
    var target = $element.data('js-target');
    var index = $element.data('js-index');
    var html = $(selector).html();

    event.preventDefault();

    html = html
      .replace(/{{id}}/g, index)
      .replace(/{{title}}/g, 'New element');

    $(target).append(html);

    $(target).find('.mdl-js-textfield:not(.is-upgraded)').each(function () {
      componentHandler.upgradeElement(this);
    });

    // Increase index
    $element.data('js-index', index + 1);
  };

  var showText = function () {
    var text = $(this).data('js-text');

    swal({
      title: 'File link',
      type: 'input',
      animation: 'slide-from-top',
      allowOutsideClick: true,
      inputValue: text
    });
  };

  var watch = function () {
    var $element = $(this);
    var value = $element.val();
    var target = $element.data('js-watch-target');
    var filter = $element.data('js-watch-filter');
    var $target = $(target);

    if (filter) {
      filter = filter.split(' ');
    }

    if (value !== '') {
      filter.forEach(function (filter) {
        if (filter === 'machinereadable') {
          value = value.toLowerCase().replace(/[^A-Z0-9._-]/ig, '-');
        } else if (filter === 'append') {
          value += $element.data('js-watch-filter-append');
        }
      });
    }

    if ($target.is('input')) {
      $target.val(value);
    } else {
      $target.text(value);
    }
  };

  var add = function () {
    var $element = $(this);
    var target = $element.data('js-target');
    var parent = $element.data('js-parent');
    var $parent = $element.parent();

    if (parent) {
      $parent = $element.parents(parent);
    }

    $parent.find(target).removeClass('hidden');
  };

  var preventDelete = function (event) {
    var $element = $(this);

    if ($element.data('js-prevent-delete') === false) {
      return;
    }

    event.preventDefault();

    swal({
      title: 'Are you sure?',
      text: 'You will not be able to recover this data!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#dd6b55",
      confirmButtonText: 'Yes, delete it!',
      animation: 'slide-from-top',
      allowOutsideClick: true
    }, function () {
      $element
        .data('js-prevent-delete', false)
        .trigger('click');
    });
  };

  var copyPage = function () {
    var pages = $(this).data('js-action-data').split(',');

    pages = pages.map(function (page) {
      var element = '<form action="' + location.href + '" method="post">' +
      '  <button class="__sweetalert__button" name="add[copy-from]" value="' + page + '">' + page + '</button>' +
      '</form>';

      return element;
    });

    swal({
      title: 'Copy existing page',
      text: pages.join(' '),
      animation: 'slide-from-top',
      allowOutsideClick: true,
      showConfirmButton: false,
      html: true,
      customClass: '__sweetalert'
    });
  }

  $(document)
    .on('click', '[data-js-toggle]', toggle)
    .on('click', '[data-js-remove]', remove)
    .on('click', '[data-js-content-toggle]', contentToggle)
    .on('click', '[data-js-copy]', copy)
    .on('click', '[data-js-show-text]', showText)
    .on('input', '[data-js-watch]', watch)
    .on('click', '[data-js-add]', add)
    .on('click', '[data-js-prevent-delete]', preventDelete)
    .on('click', '[data-js-action="copy-page"]', copyPage);

  var showUploadError = function () {
    $('[data-upload-message]').removeClass('hidden');

    setTimeout(function () {
      $('[data-upload-message]').addClass('hidden');
    }, 10000);
  };

  // Fileupload
  Dropzone.options.uploadDropzone = {
    init: function () {
      this.on( 'error', function (file) {
        showUploadError();
      });

      this.on( 'success', function (file) {
        window.location.reload();
      });
    }
  };

  // Editor
  Simditor.locale = 'en-US';
  $('[data-js-textarea]').each(function () {
    new Simditor({
      textarea: this,
      upload: false,
      tabIndent: false,
      toolbar: [
        'bold',
        'italic',
        'ol',
        'ul',
        'link'
      ]
    });
  })

}(jQuery));
