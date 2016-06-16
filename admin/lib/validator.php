<?php
  function validate_field ($field) {
    $field = trim($field);

    $field = filter_var($field, FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);

    return $field;
  }

  function validate_all_fields ($fields) {
    foreach ($fields as $index => $value) {
      if (is_array($value)) {
        $fields[$index] = validate_all_fields($value);

        if (count($fields[$index]) === 0) {
          unset($fields[$index]);
        }
      } else {
        $fields[$index] = validate_field($value);

        if ($fields[$index] === '') {
          unset($fields[$index]);
        }
      }
    }

    return $fields;
  }


