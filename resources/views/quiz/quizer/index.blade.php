@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-12">
		@if($questions->count() == 10)
		<form action="{{route('quize.submit')}}" method="POST">
			@csrf
			<div class="row">
				<div class="card-body">
					<nav aria-label="Page navigation example">
					  <ul class="pagination">
					    <li class="page-item"><h4 id="que-index-1">1</h4></li>
					    <li class="page-item"><h4 id="que-index-2">2</h4></li>
					    <li class="page-item"><h4 id="que-index-3">3</h4></li>
					    <li class="page-item"><h4 id="que-index-4">4</h4></li>
					    <li class="page-item"><h4 id="que-index-5">5</h4></li>
					    <li class="page-item"><h4 id="que-index-6">6</h4></li>
					    <li class="page-item"><h4 id="que-index-7">7</h4></li>
					    <li class="page-item"><h4 id="que-index-8">8</h4></li>
					    <li class="page-item"><h4 id="que-index-9">9</h4></li>
					    <li class="page-item"><h4 id="que-index-10">10</h4></li>
					    
					  </ul>
					</nav>
					@foreach($questions as $key => $question)
					<div id="que-{{++$key}}" class="d-none">
						<h2><span id="que_no"> {{$key}}</span> {{$question->que}}</h2>
						<div class="row">
							<div class="col-md-8">
								@foreach($question->getOptionsQuizer as $key => $value)
								<div class="col-md-4">
									<div class="form-check">
										<input class="form-check-input que_option_sel que-ans-{{$question->id}}" type="radio" name="que[{{$question->id}}]" id="que-ans-{{$question->id}}" value="{{$value->id}}" >
										  <label class="form-check-label" for="">
										     {{$value->option}}
										  </label>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					@endforeach
					<button type="button" id="next_question" class="btn btn-sm btn-primary" data-no="1">Next</button>
				</div>
			</div>
			<input type="hidden" name="skip_point" id="skip_point">
			<button type="submit" id="submit_quiz" class="btn btn-sucess btn-sm d-none" disabled="true">Submit Quiz</button>	
		</form>
		@else
		<p>
			<h3>Admin Not Added 10 or more Questions Please Wait</h3>
		</p>
		@endif
	</div>
</div>
@endsection
@push('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#que-1').removeClass('d-none');
			var skipPoint = 1;
			$('#next_question').click(function(){
				var no = parseInt($(this).attr('data-no'));
				var check = $('.que-ans-'+ no ).is(":checked");
				if(check){
					$('#que-index-'+no).css('color','green');
				}else{
					// console.log(skipPoint++);
					$('#que-index-'+no).css('color','red');
					$('#skip_point').val(skipPoint++);
				}
				var no_que =  no + 1;
				console.log(no_que);
				if(no_que == 10){
					$('#next_question').addClass('d-none');
					$('#submit_quiz').removeClass('d-none');
					$('#submit_quiz').prop('disabled',false);
				}else{	
					$('#que_option_sel').prop('checked', false);
				}
				$('#que-'+no_que).removeClass('d-none');
					var removeQue = no_que - 1;
					$('#que-'+removeQue).addClass('d-none');
				$('#next_question').attr('data-no',no_que);
			});
		});
	</script>
@endpush