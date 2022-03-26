@extends('layouts.app')
@section('content')
	<div class="container">	
		<div class="col-md-12">
			<div class="card">
				<div class="card-title"><h3 class="ml-3">Edit Question</h3></div>
				<div class="card-body">
					<form action="{{route('quize.update',$quize->id)}}" method="post">
						@csrf
						<div class="col-md-12">
							@php 
							$opts = [];
							foreach($quize->getOptions as $options){
								$opts[] = $options->option;
							}
							 @endphp
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="">Question </label>
										<input type="text" name="que" id="que" value="{{$quize->que}}" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="answer">Answer</label>
										<input type="text" name="option[3]" value="{{$opts[0]}}" id="answer" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="option1">Option 1 </label>
										<input type="text" name="option[0]" id="option1" value="{{$opts[1]}}" class="form-control" required>
									</div>
								</div>

								<div class="col-md-4">	
									<div class="form-group">
										<label for="option2">Option 2 </label>
										<input type="text" name="option[1]" value="{{$opts[2]}}" id="option2" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">	
									<div class="form-group">
										<label for="option3">Option 3 </label>
										<input type="text" name="option[2]" id="option3" value="{{$opts[2]}}" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">	
									<div class="form-group">
										<div class="form-group">
											<label for="answer">Select Answer</label>
											<select class="form-control selected2" name="answer" id="answer" required>
												<option value="">Options</option>
												<option value="0">Option 1</option>
												<option value="1">Option 2</option>
												<option value="2">Option 3</option>
												<option value="3">Option 4</option>
											</select>

										</div>
									</div>
								</div>
								</div>
									<div class="row">
										<button type="submit" class="btn ml-4 btn-primary">Update</button>
									</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
@endsection
@push('css')
<style type="text/css">
	

</style>
@endpush