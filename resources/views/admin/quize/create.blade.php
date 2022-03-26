@extends('layouts.app')
@section('content')
	<div class="container">	
		<div class="col-md-12">
			
			<div class="card">
				<div class="card-title"><h3 class="ml-3">Add Question</h3></div>
				<div class="card-body">
					<form action="{{route('quize.store')}}" method="post">
						@csrf
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="">Question </label>
										<input type="text" name="que" id="que" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="option4">Option 1</label>
										<input type="text" name="option[0]" id="option4" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="option1">Option 2 </label>
										<input type="text" name="option[1]" id="option1" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">	
									<div class="form-group">
										<label for="option2">Option 3 </label>
										<input type="text" name="option[2]" id="option2" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">	
									<div class="form-group">
										<label for="option3">Option 4 </label>
										<input type="text" name="option[3]" id="option3" class="form-control" required>
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
									<button type="submit" class="btn ml-4 btn-primary">Save</button>
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
	.container{
		background-color: white;

	}

</style>
@endpush