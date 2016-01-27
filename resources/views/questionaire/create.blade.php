@extends('app')

@section('content')

<h1>Feedback</h1>		

{!! Form::open(['url' => 'feedback' ,'class' => 'form-horizontal']) !!}

	@foreach ($questions as $topicId => $topicQuestions)

	<h3>{{ $topics[$topicId] }}</h3>

	<section>
		
		@foreach ($topicQuestions as $question)

		<strong>{{ $question->text }}</strong>

			@if ($question->type === 0)

				<div class="form-group">
					<label>
						@for ($i = 0; $i < 5; $i++)
						{!! Form::radio('radio_question['.$question->id.']', $i) !!}
						@endfor
					</label>
				</div>

			@elseif ($question->type === 1)

				<div class="form-group">
					{{ Form::textarea('text_question['.$question->id.']') }}
				</div>

			@endif

		@endforeach

	</section>

	@endforeach

	<div class="form-group">
		{!! Form::submit("Abschicken", ['class' => 'form-control']) !!}
	</div>

	{!! Form::close() !!}

	@include('errors.list')

	@stop