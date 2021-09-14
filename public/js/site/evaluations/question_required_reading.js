$(function() {
    var quest_with_confirm_text = $('#questions_with_confirmation_text').text(); 
    
    if (quest_with_confirm_text.length) {
        quest_with_confirm_text = quest_with_confirm_text.split(', ');

        quest_with_confirm_text.forEach(question_id => {
            var required_reading = $('#required_reading-'+question_id);

            if (required_reading.length) {
                var content_confirmation_text = $('.content_confirmation_text-'+question_id);
                var warning_reading_required = $('#warning_reading_required-'+question_id);
                var input_quest_w_conf_t_required_reading = $("input[name='quest_w_conf_t_required_reading["+question_id+"]']");
                var rev_content = $(".rev_content-"+question_id);

                content_confirmation_text.on('scroll', function(){
                    
                    var current_scroll_position = Math.ceil(content_confirmation_text.scrollTop());
                    var maximum_scroll_position = content_confirmation_text[0].scrollHeight - content_confirmation_text.outerHeight() - 5;
                    
                    if (current_scroll_position >= maximum_scroll_position) {
                        
                        content_confirmation_text.off('scroll');
                        warning_reading_required.addClass('hide');
                        input_quest_w_conf_t_required_reading.val(1);
                        rev_content.removeClass('border-warning');
                    }
                });
            }
        });
    }
})