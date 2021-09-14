$(function() {
    var MorrisCharts = function() {};
    var form_bar_by_question = $('#form-bar_by_question');
    var form_donut_by_question = $('#form-donut_by_question');

    // console.log(form_donut_by_question);

    if (form_bar_by_question.length) {
        var _token = form_bar_by_question.find("input[name='_token']").val();
        var evaluation_id = form_bar_by_question.find("input[name='evaluation_id']").val();
        $.post(form_bar_by_question.attr('action'), {
            _token: _token,
            evaluation_id: evaluation_id
        }, function (data, textStatus, jqXHR) {
        }).done(function(data) {
            $.each(data['available_questions'], function(key, question) {
                bar_morris = data['bar_morris']['question_'+question['id']];    
                var bar_by_question = $('#bar_by_question_'+question['id']);
                // console.log(bar_morris);

                $.each(bar_morris['data'], function (possible_answer_id, possible_answer) { 
                    $('.dbq_'+question['id']+'_'+possible_answer_id).text(
                        $('.dbq_'+question['id']+'_'+possible_answer_id).text()+' ('+possible_answer+')'
                    );
                });

                // creates Bar chart
                MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
                    Morris.Bar({
                        element: element,
                        data: data,
                        xkey: xkey,
                        ykeys: ykeys,
                        labels: labels,
                        hideHover: 'auto',
                        resize: true, //defaulted to true
                        gridLineColor: '#2f3e47',
                        gridTextColor: '#98a6ad',
                        barSizeRatio: 0.4,
                        barColors: lineColors,
                        hoverCallback: function(index, options, content, row) {
                            delete row['question'];
                            var new_row = [];
                            $.each(row, function (key, value) { new_row.push(value) });

                            var labels = options.labels;
                            var content = '';

                            $.each(labels, function (key, value) { 
                                if (new_row[key] != '0 - 0.00%') {
                                    content += value+': ';
                                    content += new_row[key]+'<br>';
                                }
                            });

                            return(content);
                        },
                    });
                }

                MorrisCharts.prototype.init = function() {
                    //creating bar chart
                    this.createBarChart(
                        bar_by_question,
                        [bar_morris['data']], 'question', bar_morris['ids_answers_array'], bar_morris['text_answers_array'], data['bar_morris']['colors']
                    );
                },

                //init
                $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
                $.MorrisCharts.init();
            });
        });
    }

    if (form_donut_by_question.length) {
        var _token = form_donut_by_question.find("input[name='_token']").val();
        var evaluation_id = form_donut_by_question.find("input[name='evaluation_id']").val();
        $.post(form_donut_by_question.attr('action'), {
            _token: _token,
            evaluation_id: evaluation_id
        }, function (data, textStatus, jqXHR) {
        }).done(function(data) {

            $.each(data['data'], function (question_id, data_chart) {
                var donut_by_question = $('#donut_by_question_'+question_id);

                var reset_data_morris = []; // INDICES DEVERAM SER ZERADOS PARA QUE O GRAFICO FUNCIONE
                $.each(data_chart, function (response_available_id, responses) { 
                    $('.dbq_'+question_id+'_'+response_available_id).text(
                        $('.dbq_'+question_id+'_'+response_available_id).text()+' ('+responses['value']+')'
                    );
                    reset_data_morris.push(responses);
                });
                data['data'][question_id] = reset_data_morris;

                MorrisCharts.prototype.createDonutChart = function(element, data, colors) {
                    Morris.Donut({
                        element: element,
                        data: data,
                        resize: true, //defaulted to true
                        colors: colors,
                        backgroundColor: '#2f3e47',
                        labelColor: '#98a6ad',
                        formatter: function(data) {
                            return data;
                        }
                    });
                },
        
                MorrisCharts.prototype.init = function() {
                    //creating donut chart
                    this.createDonutChart(
                        donut_by_question,
                        data['data'][question_id],
                        data['colors']
                    );
                },
                $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
                $.MorrisCharts.init();
            });
        });
    }
});