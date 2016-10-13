;(function($){
    $.fn.tab = function(options){
        var tabClick = function(e) {
            $(this).parent().parent().parent('ol').find('li').removeClass('active');
            $(this).parent().parent('li').addClass('active');
            var gear = $(this).data('gear');
            var $dest=$(this).parent().parent().parent().parent().parent().find('.gear-switch-animation').children('img').first();
            $dest.attr('src', $('.'+gear).children('img').last().attr('src'));
            /*
            * todo animate
            */
        }
        var $li=$(this).find('ol>li');
        $li.removeClass('active');
        $li.first().addClass('active');
        return this.each(function () {
            var $this = $(this);
            var $ol = $this.find('ol');
            var $tabs = $ol.find('h1');
            $tabs.on('click', tabClick)
        });
    }
    $.fn.tab.defaults = {
        count_tab : 4,
        tab_1 : 'title 1 ',
        tab_2 : 'title 2 ',
        tab_3 : 'title 3 ',
        tab_4 : 'title 4 ',
        content_tab_1 : 'text 1',
        content_tab_2 : 'text 2',
        content_tab_3 : 'text 3',
        content_tab_4 : 'text 4',
        active_class : 'active_tab'
    }
})(jQuery);