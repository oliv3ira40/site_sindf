<?php

	namespace App\Helpers;

    use App\Models\Admin\User;
    use App\Helpers\HelpAdmin;

    use Carbon\Carbon;

	/**
	* HelpEvaluation
	*/
	class HelpEvaluation
	{
		public static function getDataForReporting($evaluation)
		{
            $data['evaluation'] = $evaluation;
            $data['colors'] = [
                '#00FFFF',
                '#00CED1',
                '#008080',
                '#7FFFD4',
                '#00FF7F',
                '#3CB371',
                '#ADFF2F',
                '#9ACD32',
                '#6B8E23',
                '#B8860B',
                '#8B4513',
                '#D2691E',
                '#F4A460',
                '#7B68EE',
                '#9370DB',
                '#EE82EE',
                '#DA70D6',
                '#DDA0DD',
                '#C71585',
                '#FF1493',
                '#FF69B4',
                '#DB7093',
                '#F08080',
                '#CD5C5C',
                '#DC143C',
                '#FF4500',
                '#FF8C00',
                '#FFA500',
                '#FFD700',
                '#FFFF00',
                '#F0E68C',
            ];
            $data['completed_evaluations'] = $evaluation->CompletedEvaluations;
            $data['completed_evaluations_array'] = $evaluation->CompletedEvaluations->pluck('id')->toArray();
            $data['available_questions'] = $evaluation->AvailableQuestions->sortBy('position');
            $data['responses_received'] = $data['evaluation']->ResponsesReceived;

            // dd($data);
            return $data;
        }
        
        public static function getDataForDownloadingReport($evaluation, $date_range)
		{
            $data['evaluation'] = $evaluation;
            $data['question_topics'] = $evaluation->QuestionTopics;

            $data['completed_evaluations'] = $evaluation->CompletedEvaluations->sortBy('created_at');
            if ($date_range != null) {
                $data['date_range'] = explode(' - ', $date_range);
                
                $data['completed_evaluations'] = $data['completed_evaluations']
                ->where('created_at', '>=', $data['date_range'][0])
                ->where('created_at', '<=', $data['date_range'][1]);
            }
            $data['total_completed_evaluations'] = $data['completed_evaluations']->count();
            $data['array_completed_evaluations'] = $data['completed_evaluations']->pluck('id')->toArray();
            $data['array_user_id_completed_evaluations'] = $data['completed_evaluations']->pluck('user_id')->toArray();

            $data['available_questions'] = $evaluation->AvailableQuestions->sortBy('position');
            $data['total_available_questions'] = $data['available_questions']->count();
            
            $data['participating_users'] = User::whereIn('id', $data['array_user_id_completed_evaluations'])->orderBy('created_at', 'desc')->get();
            $data['total_participating_users'] = $data['participating_users']->count();

            if ($data['completed_evaluations']->count() == 0) return false;

            $data['report_data'] = [];
            foreach ($data['question_topics'] as $topic) {
                $array_topic = [];
                $array_topic[$topic->name] = [];
                $available_questions = $topic->AvailableQuestions;
                
                foreach ($available_questions as $question) {

                    $question_type = $question->QuestionType;
                    $possibles_question_answers = $question->PossiblesQuestionAnswers->sortBy('position');;
                    $responses_received = $question->ResponsesReceived;
                    $array_question['type'] = $question_type->tag;
                    $array_question['name'] = $question->question_text;

                    if ($question_type->tag == 'select' OR $question_type->tag == 'radio') {

                        $array_answer = [];
                        foreach ($possibles_question_answers as $possible_answer) {
                            
                            $value_n = $possible_answer->ResponsesReceived->count();
                            $value_percent = HelpAdmin::calcPercent($possible_answer->ResponsesReceived->count(), $responses_received->count());
                            
                            $array_answer[$possible_answer->response_text] = $value_n.' - '.$value_percent;
                        }
                        $array_question['responses'] = $array_answer;
                        array_push($array_topic[$topic->name], $array_question);

                    } else {

                        $array_answer = [];
                        foreach ($responses_received as $key => $response_received) {                            
                            $array_answer[$key] = $response_received->created_at->format('d/m/Y H:i').' - '.$response_received->text_response;
                        }
                        $array_question['responses'] = $array_answer;
                        array_push($array_topic[$topic->name], $array_question);
                        
                    }

                }

                $data['report_data'] += $array_topic;
            }

            return $data;
        }
        
        public static function GenerateReport($file_format, $data)
        {
            if ($file_format == 'pdf') {
                HelpEvaluation::PdfReport($data);
            } else {
                HelpEvaluation::ExcelReport($file_format, $data);
            }
        }
        public static function PdfReport($data)
        {
            set_time_limit(1000000);
            $bar = DIRECTORY_SEPARATOR;
            $img_header = public_path().$bar.'assets/letterhead_header.png';
            $img_footer = public_path().$bar.'assets/letterhead_footer.png';

            // dd($data['completed_evaluations']);
            
            // HTML
                // background: url('.$reports_data['img_back_ground'].') no-repeat 0 0;
                $date_range = '';
                if (isset($data['date_range'])) {
                    $data['date_range'][0] = new Carbon($data['date_range'][0]);
                    $data['date_range'][1] = new Carbon($data['date_range'][1]);

                    $date_range = '(exibindo resultados do dia '.$data['date_range'][0]->format('d/m/Y H:i');
                    $date_range .= ' até '.$data['date_range'][1]->format('d/m/Y H:i');
                }

                $topics_and_questions = '';
                $count_question = 0;
                foreach ($data['question_topics'] as $topic) {
                    $available_questions = $topic->AvailableQuestions->sortBy('position');
                 
                    $questions_html = '';
                    foreach ($available_questions as $question) {
                        $count_question++;
                        $responses_received = $question->ResponsesReceived->sortByDesc('created_at')
                            ->whereIn('completed_evaluation_id', $data['array_completed_evaluations']);

                        $answers_html = '';
                        $trs_html = '';
                        if ($question->QuestionType->tag != 'textarea') {

                            $possibles_answers = $question->PossiblesQuestionAnswers;
    
                            $total_trs = ($possibles_answers->count() / 3);
                            $count_tds = 0;
                            for ($i = 0; $i < $total_trs; $i++) {
                                $tds_htmls = '';
                                
                                for ($n = 0; $n < 3; $n++) {
                                    if (isset($possibles_answers[$count_tds])) {
                                        $answer = $possibles_answers[$count_tds];
                                        $value_n = $answer->ResponsesReceived->whereIn('completed_evaluation_id', $data['array_completed_evaluations'])->count();
                                        // dd($value_n);

                                        $value_percent = HelpAdmin::calcPercent($value_n, $responses_received->count());
                                        $final_value = $value_n.' - '.$value_percent;
    
                                        $tds_htmls .= '
                                            <td style="width: 33%;" class="font-12">
                                                '.$answer->response_text.':
                                                <span class="text-bold">
                                                    '.$final_value.'
                                                </span>
                                            </td>
                                        ';
                                        $count_tds++;
                                    } else {
                                        $tds_htmls .= '
                                            <td style="width: 33%;"></td>
                                        ';
                                    }
                                }
    
                                $trs_html .= '
                                    <tr>
                                        '.$tds_htmls.'
                                    </tr>
                                ';
                            }
                        } else {
                            foreach ($responses_received as $key => $response) {
                                $trs_html .= '
                                    <tr>
                                        <td style="width: 33%;" class="font-12">
                                            <span class="text-bold">
                                                '.$response->created_at->format('d/m/Y H:i').'
                                            </span>:
                                            '.$response->text_response.'
                                        </td>
                                    </tr>
                                ';
                            }
                        }

                        $answers_html .= '
                            <table class="header-table none-border-table mt-0 m-b-30" cellspacing="0" cellpadding="0">
                                '.$trs_html.'
                            </table>
                        ';

                        $questions_html .= '
                            <p class="text-align mt-0 mb-0 text-bold" style="font-size: 12px;">
                                '.$count_question.' - '.$question->question_text.'
                            </p>

                            '.$answers_html.'
                        ';
                    }

                    $topics_and_questions .= '
                        <div class="content mt-0 m-b-10">
                            <span class="text-bold">
                                '.$topic->name.' 
                            </span>

                            <p class="mt-0 m-b-10">
                                '.$questions_html.'
                            </p>
                        </div>
                    ';
                }


                $completed_evaluations = '';
                foreach ($data['completed_evaluations'] as $key => $completed_evaluation) {
                    $completed_evaluations .= '
                        <tr>
                            <td class="td-border">'.HelpAdmin::completName($completed_evaluation->User).'</td>
                            <td class="td-border">'.$completed_evaluation->User->cpf.'</td>
                            <td class="td-border">'.$completed_evaluation->User->registration.'</td>
                            <td class="td-border">'.$completed_evaluation->ip_adress.'</td>
                            <td class="td-border">'.$completed_evaluation->created_at->format('d/m/Y H:i').'</td>
                        </tr>
                    ';
                }

                $reports_data['html'] = '
                    <style>
                        body {
                            font-family: Roboto, "Segoe UI", Tahoma, sans-serif;
                        }
                        .count_pages { 
                            color: black;
                            text-align: right;
                            margin-top: -20px;
                            margin-right: 30px;
                        }
                        .td-border { border: .1px solid black; }
                        table, td {
                            border-collapse: collapse;
                        }
                        td {
                            // text-align: center;
                            height: 30px;
                            padding: 8px;
                        }
                        .header-table { width: 100%; }
                        .none-border-table {
                            border: none !important;
                        }
                        .col-md-4 {
                            width: 32%;
                            float: left;
                            padding-right: 8px;
                        }
                        .col-md-6 {
                            width: 40%;
                            float: left;
                            padding-right: 8px;
                        }
                        .report_name { font-size: 17px; }
                        .content {
                            margin-left: 30px;
                            margin-right: 30px;
                        }

                        .mt-0 { margin-top: 0px !important; }
                        .mb-0 { margin-bottom: 0px !important; }
                        .pt-0 { padding-top: 0px !important; }
                        .pb-0 { padding-bottom: 0px !important; }

                        .m-t-5 { margin-top: 5px !important; }
                        .m-b-5 { margin-bottom: 5px !important; }
                        .m-t-10 { margin-top: 10px !important; }
                        .m-t-20 { margin-top: 20px !important; }
                        .m-t-30 { margin-top: 30px !important; }
                        .m-t-40 { margin-top: 40px !important; }
                        .m-b-10 { margin-bottom: 10px !important; }
                        .m-b-20 { margin-bottom: 20px !important; }
                        .m-b-30 { margin-bottom: 30px !important; }
                        .m-b-40 { margin-bottom: 40px !important; }

                        .text-bold { font-weight: bold; } 
                        .font-10 { font-size: 10px; }
                        .font-12 { font-size: 12px; }
                        .text-align { text-align: justify; }
                        .text-muted { color: #98a6ad; }
                    </style>
                    
                    <div class="content">
                        <table class="header-table">
                            <tr>
                                <td colspan="4" class="report_name td-border">
                                    <b>Questionário: '.$data['evaluation']->name.'</b>
                                    '.$date_range.'
                                </td>
                            </tr>

                            <tr>
                                <td class="td-border">
                                    <b>Pesquisas respondidas</b>
                                </td>
                                <td class="td-border">
                                    <b>Perguntas registradas</b>
                                </td>
                                <td class="td-border">
                                    <b>Usuários participantes</b>
                                </td>
                                <td class="td-border">
                                    <b>Data de emissão</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-border">'.$data['total_completed_evaluations'].'</td>
                                <td class="td-border">'.$data['available_questions']->count().'</td>
                                <td class="td-border">'.$data['participating_users']->count().'</td>
                                <td class="td-border">'.date('d/m/Y H:i').'</td>
                            </tr>
                        </table>
                    </div>
                    
                    <h3 class="content m-t-40 m-b-5">Perguntas registradas</h3>
                    '.$topics_and_questions.'
                    
                    <h3 class="content m-t-20 m-b-5">Usuários participantes</h3>
                    <div class="content">
                        <table class="header-table">
                            <tr>
                                <td class="td-border">
                                    <b>Nome</b>
                                </td>
                                <td class="td-border">
                                    <b>CPF</b>
                                </td>
                                <td class="td-border">
                                    <b>Matrícula</b>
                                </td>
                                <td class="td-border">
                                    <b>IP</b>
                                </td>
                                <td class="td-border">
                                    <b>DT de registro</b>
                                </td>
                            </tr>
                            '.$completed_evaluations.'
                        </table>
                    </div>
                    ';
            // HTML

            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'c',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 35,
                'margin_bottom' => 35,
                'margin_header' => 0,
                'margin_footer' => 0,
                'defaultPageNumStyle' => '1'
            ]);

            $mpdf->SetDisplayMode('fullpage');
            $mpdf->list_indent_first_level = 0;

            $mpdf->SetHTMLHeader('
                <img style="" src="'.$img_header.'">
                <div class="count_pages">Página {PAGENO} de {nb}</div>
            ');
            $mpdf->SetHTMLFooter('
                <img style="" src="'.$img_footer.'">
            ');

            $mpdf->WriteHTML($reports_data['html']);
            $mpdf->Output('relatorio-'.$data['evaluation']->name.'.pdf', 'D');
            // $mpdf->Output();
            // exit();
        }
        public static function ExcelReport($file_format, $data)
        {
            // dd($data);
            // dd('ExcelReport');
            set_time_limit(1000000);
            $bar = DIRECTORY_SEPARATOR;

            // $reports_data['img_top'] = public_path().$bar.'../storage/app/public/appearance_setting/logo_for_white_background.png';

            // HTML
                $html_questions = '';
                foreach ($data['report_data'] as $topic => $questions) {

                    $html_question = '';
                    foreach ($questions as $key => $question) {

                        if ($question['type'] == 'select' OR $question['type'] == 'radio') {
                            
                            $html_responses = '';
                            $html_results = '';
                            foreach ($question['responses'] as $response => $result) {
                                
                                $html_responses .= '
                                    <td style="font-size: 10px;">
                                        <b>'.$response.'</b>
                                    </td>
                                ';
                                $html_results .= '
                                    <td style="font-size: 10px;">
                                        '.$result.'
                                    </td>
                                ';
                            }


                            $html_question .= '
                                <tr>
                                    <td colspan="20" class="report_name">
                                        <b>'.$question['name'].'</b>
                                    </td>
                                </tr>

                                <tr>
                                    '.$html_responses.'
                                </tr>
                                <tr>
                                    '.$html_results.'
                                </tr>
                                <tr></tr>
                            ';
                        } else {

                            $html_responses = '';
                            foreach ($question['responses'] as $response) {
                                
                                // ['"', '!', '"', '#', '$', '%', '&', '(', ')', '*', '+', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~' ,'"']
                                $html_responses .= '
                                    <tr>
                                        <td colspan="20" style="font-size: 10px;">
                                            '. str_replace(['#', '$', '%', '&', '`', '~'], ' ', $response) .'
                                        </td>
                                    </tr>
                                    <tr></tr>
                                ';
                            }

                            $html_question .= '
                                <tr>
                                    <td colspan="20" class="report_name">
                                        <b>'.$question['name'].'</b>
                                    </td>
                                </tr>

                                '.$html_responses.'
                            ';
                        }
                    }

                    $html_questions .= '
                        <h3 class="content m-t-20 m-b-5">'.$topic.'</h3>
                        <div class="m-b-20 content">
                            <table class="header-table">
                                '.$html_question.'
                            </table>
                        </div>
                    ';
                }

                $html_trs_participants = '';
                foreach ($data['participating_users'] as $user) {

                    $html_trs_participants .= '
                        <tr>
                            <td>'.HelpAdmin::completName($user).'</td>
                            <td>'.$user->cpf.'</td>
                            <td>'.$user->registration.'</td>
                        </tr>
                    ';
                }
                $html_evaluation_participant = '
                    <tr>
                        <td>
                            <b>Nome</b>
                        </td>
                        <td>
                            <b>CPF</b>
                        </td>
                        <td>
                            <b>MATRICULA</b>
                        </td>
                    </tr>

                    '.$html_trs_participants.'
                ';

                $date_range = '';
                // if (isset($data['date_range'])) {
                //     $data['date_range'][0] = new Carbon($data['date_range'][0]);
                //     $data['date_range'][1] = new Carbon($data['date_range'][1]);

                //     $date_range = '(exibindo resultados do dia '.$data['date_range'][0]->format('d/m/Y H:i');
                //     $date_range .= ' até '.$data['date_range'][1]->format('d/m/Y H:i');
                // }
                $reports_data['html'] = '
                    <style>
                        body {
                            font-family: Roboto, "Segoe UI", Tahoma, sans-serif;
                            background-image-resize: 6;
                        }
                        .count_pages { 
                            color: black;
                            text-align: right;
                            margin-top: -50px;
                            margin-right: 10px;
                        }
                        table, td {
                            border: 1px solid black;
                            border-collapse: collapse;
                        }
                        td {
                            // text-align: center;
                            height: 30px;
                            padding: 8px;
                        }
                        .header-table { width: 100%; }
                        .report_name { font-size: 17px; }
                        .content {
                            margin-left: 10px;
                            margin-right: 10px;
                        }

                        .text-ok { color: green; }
                        .text-warning { color: red; }
                        .text-error { color: red; }
                        .text-info { color: #ecc557; }
                        .text-primary { color: blue; }

                        .mt-0 { margin-top: 0px; }
                        .mb-0 { margin-bottom: 0px; }

                        .m-t-5 { margin-top: 5px; }
                        .m-b-5 { margin-bottom: 5px; }
                        .m-t-10 { margin-top: 10px; }
                        .m-t-20 { margin-top: 20px; }
                        .m-b-10 { margin-bottom: 10px; }
                        .m-b-20 { margin-bottom: 20px; }

                        .text-bold { font-weight: bold; } 
                        .font-12 { font-size: 12px; }
                        .text-align { text-align: justify; }
                        .text-muted { color: #98a6ad; }
                    </style>
                    
                    <br><br><br><br>
                    <h3 class="content m-t-20 m-b-5">
                        <b>'.$data['evaluation']->name.'</b>
                        '.$date_range.'
                    </h3>

                    <div class="content">
                        <table class="header-table">
                            <tr>
                                <td>
                                    <b>Pesquisas respondidas</b>
                                </td>
                                <td>
                                    <b>Perguntas registradas</b>
                                </td>
                                <td>
                                    <b>Usuários participantes</b>
                                </td>
                                <td>
                                    <b>Última resposta registrada</b>
                                </td>
                            </tr>
                            <tr>
                                <td>'.$data['total_completed_evaluations'].'</td>
                                <td>'.$data['available_questions']->count().'</td>
                                <td>'.$data['participating_users']->count().'</td>
                                <td>'.$data['completed_evaluations']->last()->created_at->format('d/m/Y H:i').'</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    
                    '.$html_questions.'

                    <h3 class="content m-t-20 m-b-5">Relação de usuários participantes</h3>
                    <div class="content html_evaluation_participant">
                        <table class="header-table">
                            '.$html_evaluation_participant.'
                        </table>
                    </div>
                ';
            // HTML

            // XLS
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
                $spreadsheet = $reader->loadFromString($reports_data['html']);
                // $spreadsheet->getActiveSheet()->setTitle('Relatório '.$data['evaluation']->name);

                
                foreach(range('A','D') as $columnID) {
                    $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setWidth(25);
                }
                foreach(range('E','Z') as $columnID) {
                    $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setWidth(15);
                }
                // Adequar celular ao texto
                // $spreadsheet->getActiveSheet()->getStyle('A4:Z99')
                // ->getAlignment()->setWrapText(true);

                // ALL WIDTHS
                    // $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
                    // $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                    // $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
                    // $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
                // ALL WIDTHS

                // LOGO
                    $spreadsheet->getActiveSheet()->mergeCells('A1:B3');
                    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                    $drawing->setPath('../storage/app/public/appearance_setting/logo_for_white_background.png'); // put your path and image here
                    $drawing->setCoordinates('A1');
                    $drawing->setOffsetX(0);
                    $drawing->setOffsetY(-10);
                    
                    $drawing->setResizeProportional(false);
                    $drawing->setWidthAndHeight(230,70);
                    $drawing->setWorksheet($spreadsheet->getActiveSheet());


                // $spreadsheet->getActiveSheet()->getStyle('A1:F999')->getFont()->setSize(10);
                $spreadsheet->getActiveSheet()->getStyle('A1:F999')->applyFromArray(
                    [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                    ]
                );
            // XLS
            
            $response = response()->streamDownload(function() use ($spreadsheet) {
                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
                $writer->save('php://output');
            });
            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            $response->headers->set('Content-Disposition', 'attachment; filename="relatorio-'.$data['evaluation']->name.'.xls"');
            $response->send();
            dd('---');
        }

        public static function HandleFormConditions($radio_questions)
        {
            $data['conditions'] = [];
            foreach ($radio_questions as $key => $value) {
                $question = AvailableQuestion::find($key);

                $data['conditions']['save'] = true;
                if ($question->ConditionOfFormInput) {
                    if ($question->ConditionOfFormInput->tag == 'save' AND $value == 0) {
                        $data['conditions']['save'] = false;
                    } // OUTRAS CONDICOES
                }
            }

            // CASO NAO TENHA PERMISSAO PARA SALVAR RESULTADO
            if (!$data['conditions']['save']) {

                return redirect()->route('admin.evaluation.unregistered_search');
            }
        }
	}