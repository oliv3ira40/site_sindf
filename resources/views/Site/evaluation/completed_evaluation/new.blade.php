@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - {{ $data['evaluation']->name }}
@stop

@section('content')
    <main>

        <div class="container margin_60_60">
			<div class="main_title">
				<h2>{{ $data['evaluation']->name }}</h2>
			</div>
			<div class="row">
				<div class="col-md-12 ml-auto">
					<div class="box_general">
                        {{-- <h3>{{ $data['evaluation']->name }}</h3> --}}
                        @if ($errors->has('questions.*'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Falha ao enviar seu voto.</strong>
                                Por favor, responda à pergunta ao final do texto
                            </div>
                        @endif
                        @if ($errors->has('quest_w_conf_t_required_reading.*'))
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Falha ao enviar seu voto.</strong>
                                Por favor, leia o texto até o final
                            </div>
                        @endif

                        {!! Form::open(['url'=>route('site.completed_evaluations.save')]) !!}
                            {!! Form::hidden('evaluation_id', $data['evaluation']->id) !!}
                            @foreach ($data['quest_w_conf_t_required_reading'] as $quest)
                                {!! Form::hidden('quest_w_conf_t_required_reading['. $quest->id .']', null) !!}
                            @endforeach

                            <div id="questions_with_confirmation_text" class="hide">{{ implode(', ', $data['quest_with_confirm_text']) }}</div>

                            @php $count_question = 0; @endphp
                            {{-- @foreach ($data['no_topic_question'] as $no_topic_question)
                                @php
                                    $question_type = $no_topic_question->QuestionType;
                                    $possibles_question_answers = $no_topic_question->PossiblesQuestionAnswers;
                                    $count_question++;
                                @endphp

                                @if ($question_type->tag == 'select')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group m-b-10">
                                                <label class="mb-0" for="contact_form2[subject]">
                                                    <strong>
                                                        {{ $count_question.' - '.$no_topic_question->question_text }}
                                                    </strong>
                                                </label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Selecione...</option>
                                                    @foreach ($possibles_question_answers as $answer)
                                                        <option value="">{{ $answer->response_text }}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('contact_form2.subject'))
                                                    <small class="pl-0 text-danger txt-trans-initial font-12">
                                                        {{ $errors->first('contact_form2.subject') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($question_type->tag == 'radio')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group m-b-10">
                                                <strong>
                                                    {{ $count_question.' - '.$no_topic_question->question_text }}<br>
                                                </strong>
        
                                                @foreach ($possibles_question_answers as $answer)
                                                    <span class="p-r-10">
                                                        {!! Form::radio('protocol_checkbox', 'true', false, ['class'=>'form-control', 'id'=>'teste1', 'style'=>'width: auto; display: unset; min-height: auto; height: auto;']) !!}
                                                        <label for="teste1">
                                                            {{ $answer->response_text }}
                                                        </label>
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($question_type->tag == 'checkbox')
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group m-b-10">
                                                <label class="mb-0" for="message">
                                                    <strong>
                                                        {{ $count_question.' - '.$no_topic_question->question_text }}
                                                    </strong>
                                                </label>
                                                {!! Form::textarea('message', null, ['class'=>'form-control', 'id'=>'message', 'rows'=>'5', 'style'=>'height:100px;']) !!}
                                                @if ($errors->has('message'))
                                                    <small class="pl-0 text-danger txt-trans-initial font-12">
                                                        {{ $errors->first('message') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach --}}

                            @foreach ($data['question_topics'] as $question_topic)
                                <h4 style="font-size: 20px;" class="m-t-10">{{ $question_topic->name }}</h4>

                                @foreach ($question_topic->AvailableQuestions->sortBy('position') as $question)
                                    @php
                                        $question_type = $question->QuestionType;
                                        $possibles_question_answers = $question->PossiblesQuestionAnswers;
                                        $count_question++;
                                    @endphp

                                    @if ($question->confirmation_text != null)
                                        <div class="col-md-12 m-t-10">
                                            <div class="reviews-container">
                                                <div class="review-box clearfix pl-0 m-b-10">
                                                    <div class="rev-content rev_content-{{ $question->id }} {{ ($errors->has('quest_w_conf_t_required_reading.'.$question->id)) ? 'border-warning' : '' }}" style="padding: 10px 10px 10px 10px;">
                                                        <div class="rev-info font-18">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @if ($question->title_confirmation_text != null)
                                                                        <span class="float_left">
                                                                            {{ $question->title_confirmation_text }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                @if ($question->reading_the_mandatory_confirmation_text)
                                                                    @if (!Session::has('errors'))
                                                                        <div id="required_reading-{{ $question->id }}" class="col-md-6">
                                                                            <span id="warning_reading_required-{{ $question->id }}" class="float-right text-warning">
                                                                                <i class="icon-info-circled-alt" style="font-size: 24px;"></i>
                                                                                <small>
                                                                                    LEITURA OBRIGATÓRIA
                                                                                </small>
                                                                            </span>
                                                                        </div>
                                                                    @else
                                                                        @if ($errors->has('quest_w_conf_t_required_reading.'.$question->id))
                                                                            <div id="required_reading-{{ $question->id }}" class="col-md-6">
                                                                                <span id="warning_reading_required-{{ $question->id }}" class="float-right text-warning">
                                                                                    <i class="icon-info-circled-alt" style="font-size: 24px;"></i>
                                                                                    <small>
                                                                                        LEITURA OBRIGATÓRIA
                                                                                    </small>
                                                                                </span>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="rev-text content_confirmation_text-{{ $question->id }}" style="height: 300px; overflow-y: scroll; text-align: justify; padding-right: 20px;">
                                                            {!! nl2br($question->confirmation_text) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($question_type->tag == 'select')
                                        <div class="row">
                                            <div style="padding-left: 40px;" class="col-md-12">
                                                <div class="form-group m-b-20">
                                                    <label class="mb-0" for="question_{{ $question->id }}">
                                                        <p style="text-align: justify; font-weight: 500;" class="mb-0">
                                                            {{ $count_question.' - '.$question->question_text }}
                                                        </p>
                                                    </label>

                                                    @php
                                                        $option_selec = ['' => 'Selecione...'];
                                                        foreach ($possibles_question_answers as $answer) {
                                                            // array_push($option_selec, [$answer->id => $answer->response_text]);
                                                            $option_selec[$answer->id] = $answer->response_text;
                                                        }
                                                    @endphp 
                                                    {!! Form::select('questions['.$question->id.']', $option_selec, null, ['class'=>'form-control', 'id'=>'question_'.$question->id]) !!}
                                                    {{-- <select name="questions[{{ $question->id }}]" id="question_{{ $question->id }}" class="form-control">
                                                        <option value="">Selecione...</option>
                                                        @foreach ($possibles_question_answers as $answer)
                                                            <option value="{{ $answer->id }}">{{ $answer->response_text }}</option>
                                                        @endforeach
                                                    </select> --}}

                                                    @if ($errors->has('questions.'.$question->id))
                                                        <small class="pl-0 font-bold text-danger txt-trans-initial font-12">
                                                            {{ $errors->first('questions.'.$question->id) }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($question_type->tag == 'radio')
                                        <div class="row">
                                            <div style="padding-left: 40px;" class="col-md-12">
                                                <div class="form-group m-b-20">
                                                    <p style="text-align: justify; font-weight: 500;" class="mb-0">
                                                        {{ $count_question.' - '.$question->question_text }}<br>
                                                    </p>
            
                                                    {!! Form::hidden('questions['.$question->id.']', null) !!}
                                                    {{-- {!! Form::radio('questions['.$question->id.']', 0, true, ['style'=>'display:none;']) !!} --}}
                                                    @foreach ($possibles_question_answers as $answer)
                                                        <span class="p-r-10 span_question">
                                                            {!! Form::radio('questions['.$question->id.']', $answer->id, false, ['class'=>'form-control', 'id'=>$answer->id, 'style'=>'width: auto; display: unset; min-height: auto; height: auto;']) !!}
                                                            <label for="{{ $answer->id }}" class="mb-0">
                                                                {{ $answer->response_text }}
                                                            </label>
                                                        </span>
                                                    @endforeach

                                                    <br>
                                                    @if ($errors->has('questions.'.$question->id))
                                                        <small class="pl-0 font-bold text-danger txt-trans-initial font-12">
                                                            {{ $errors->first('questions.'.$question->id) }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($question_type->tag == 'checkbox')
                                    @else
                                        <div class="row">
                                            <div style="padding-left: 40px;" class="col-md-12">
                                                <div class="form-group m-b-20">
                                                    <label class="mb-0" for="question_{{ $question->id }}">
                                                        <p style="text-align: justify; font-weight: 500;" class="mb-0">
                                                            {{ $count_question.' - '.$question->question_text }}
                                                        </p>
                                                    </label>
                                                    {!! Form::textarea('textarea_questions['.$question->id.']', null, ['class'=>'form-control', 'id'=>'question_'.$question->id, 'rows'=>'5', 'style'=>'height:100px;']) !!}
                                                    @if ($errors->has('textarea_questions.'.$question->id))
                                                        <small class="pl-0 font-bold text-danger txt-trans-initial font-12">
                                                            {{ $errors->first('textarea_questions.'.$question->id) }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            
                            {{-- SALVAR --}}
							<div class="row">
								<div class="col-md-12">
									<input type="submit" value="Finalizar votação" class="btn_1 btn-block medium border-r-0 add_top_20" id="submit_evaluation">
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

    </main>
@endsection