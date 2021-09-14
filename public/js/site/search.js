$(function() {
    var menu_search = $("#menu_search");
    var mm_menu_search = $("#mm-menu_search");
    
    if (menu_search.length || mm_menu_search.length) {
        var screen_size = $(window).width();

        if (screen_size <= 768) {
            var input_search = mm_menu_search.find("input[name=search]");
            var default_li = $('.default_li');
            var btn_search = $("#mm-btn_search");
            
            btnSearchClick(mm_menu_search, btn_search, btn_search.closest('li'));
            mouseUp(mm_menu_search, btn_search.closest('li'));
        } else {
            
            var input_search = menu_search.find("input[name=search]");
            var default_li = $('.default_li');
            var btn_search = $("#btn_search");
            
            btnSearchClick(menu_search, btn_search, default_li);
            mouseUp(menu_search, default_li);
        }



        function mouseUp(menu_search, li) {
            $(document).mouseup(function(e) { 
                var container = $(".search_bar_list");

                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    menu_search.addClass('hide');
                    li.removeClass('hide');
                }
            });
        }
        function btnSearchClick(menu_search, btn_search, li) {
            btn_search.on('click', function() {
                event.preventDefault()
    
                menu_search.removeClass('hide');
                li.addClass('hide');
    
                input_search.focus();
            });
        }
    }
})