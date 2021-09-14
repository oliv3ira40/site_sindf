$(function() {
    var form_get_evalutations_by_date = $('#form-get_evalutations_by_date');
    var date_range = $('#date_range');
    var count_evaluations = $('#count_evaluations');
    var applyBtn = $('.applyBtn');
    var cancelBtn = $('.cancelBtn');
    var download_report = $('.download_report');

    if (form_get_evalutations_by_date.length > 0) {
        
        applyBtn.on('click', function(event) {
            actionDataRange();
        });

        cancelBtn.on('click', function() {
            actionDataRange();
        });
    }

    function actionDataRange() {
        var date_range_old = date_range.val();
        var stop = setTimeout(function() {

            if (date_range_old != date_range.val()) {
            
                var _token = form_get_evalutations_by_date.find("input[name='_token']").val();
                var type_evaluation_id = form_get_evalutations_by_date.find("input[name='type_evaluation_id']").val();
                $.post(form_get_evalutations_by_date.attr('action'), {
                    _token: _token,
                    type_evaluation_id: type_evaluation_id,
                    date_range: date_range.val()
                }, function (data, textStatus, jqXHR) {
                }).done(function(data) {
                    
                    if (data == 0) {
                        count_evaluations.addClass('text-danger');
                        download_report.attr('disabled', true);
                        count_evaluations.text(data+', não existe pesquisas com essa configuração');
                    } else {
                        count_evaluations.removeClass('text-danger');
                        download_report.attr('disabled', false);
                        count_evaluations.text(data);
                    }
                });

                clearTimeout();
            }
        }, 100);
    }
});