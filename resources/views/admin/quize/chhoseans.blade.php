@extends('layouts.app')
@section('content')
	<div class="container">	
		<div class="col-md-12">
			
			<div class="card">
				<div class="card-title"><h3 class="ml-3">Select Answer</h3></div>
				<div class="card-body">
					<form action="{{route('quize.store.ans')}}" method="post">
						@csrf
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="">Question </label>
										<input type="text" value="{{$quize->que}}" name="que" id="que" class="form-control" required>
										<input type="hidden" value="{{$quize->id}}" name="que_id" required>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<select class="form-control selected2" name="ans_id" required>
											<option value="">Options</option>
											@foreach($quize->getOptionsQuizer as $key => $value)
												<option value="{{$value->id}}">{{$value->option}}</option>
											@endforeach
										</select>

									</div>
									<div class="row col">
										<button type="submit" class="btn ml-4 btn-primary">Save</button>
									</div>
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