;
(function($) {
    var $scale = $('.progress-bar-scale:first');
    var pos = 0;
    var segmentsGray = 21;
    var segmentsRed = 6;
    var segmentsCnt = segmentsGray + segmentsRed + segmentsGray;
    var $graySegment = $('<div class="segment-gray segment"></div>');
    var $redSegment = $('<div class="segment-red segment"></div>');
    var $progression = $('<div class="segment-progression animate-one"><div>progression</div><div class="pointer"></div></div>');
    var $anim = $($progression);
    var $shake = $($('.shake-container').first());
    var $vawes = $($('.shake-vawes').first());
    $progression.on('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(e) {
        if($anim.hasClass('animate-one')) {
            $anim.removeClass('animate-one');
            $anim.addClass('animate-red-alert');
            $shake.removeClass('shake').addClass('shake-hard');
            $vawes.addClass('red-alert-vawe');
            return;
        }
        if($anim.hasClass('animate-red-alert')) {
            $anim.removeClass('animate-red-alert');
            $anim.addClass('animate-two');
            $shake.removeClass('shake-hard').addClass('shake');
            $vawes.removeClass('red-alert-vawe');
            return;
        }
        if($anim.hasClass('animate-two')) {
            $anim.removeClass('animate-two');
            $anim.addClass('animate-one');
            $vawes.removeClass('red-alert-vawe');
            return;
        }

    });
    var restartTween = function() {
        $anim.removeClass('animate-one')
            .removeClass('animate-two')
            .removeClass('animate-red-alert');
        $shake.removeClass('shake-hard').addClass('shake');
        $vawes.removeClass('red-alert-vawe');
        setTimeout(function(){$anim.addClass('animate-one');});
    }
    var initSegments = function() {
        for (var i = 0; i <= segmentsGray; i++) {
            $scale.append($graySegment.clone());
        }
        for (var i = 0; i <= segmentsRed; i++) {
            $scale.append($redSegment.clone());
        }
        for (var i = 0; i <= segmentsGray; i++) {
            $scale.append($graySegment.clone());
        }
        $scale.prepend($progression);

    }

    initSegments();

    $('.progress-bar').on('click', restartTween);
})(jQuery);