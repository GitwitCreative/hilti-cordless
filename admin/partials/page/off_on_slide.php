<div class="__content__page-type __form__radio-button">
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="<?php echo $slideName;?>_switch_off">
        <input type="radio"
               id="<?php echo $slideName;?>_switch_off"
               class="mdl-radio__button"
               name="<?php echo $slideName;?>[switch]"
               value="0"
            <?php if ($slide->switch == '0' || is_null($slide->switch)) {
                echo 'checked';
            } ?>>
        <span class="mdl-radio__label">Off</span>
    </label>

    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="<?php echo $slideName;?>_switch_on">
        <input type="radio"
               id="<?php echo $slideName;?>_switch_on"
               class="mdl-radio__button"
               name="<?php echo $slideName;?>[switch]"
               value="1"
            <?php if ($slide->switch == '1') {
                echo 'checked';
            } ?>>
        <span class="mdl-radio__label">On</span>
    </label>
</div>