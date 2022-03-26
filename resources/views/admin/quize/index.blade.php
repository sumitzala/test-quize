@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-md-12 col-sm-6">
			<div class="row">
				<a href="{{route('quize.create')}}" class="btn btn-sm btn-primary mb-2">Add Question </a>
				<table class="table table-bordered">
					<thead>
						<tr>
						  <th scope="col">Index</th>
						  <th scope="col">Question</th>
						  <th scope="col">Options</th>
						  <th scope="col">Answer</th>
						  <th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($quize as $key => $data)
							@php $opts = []; @endphp
							@foreach($data->getOptions as $options)
							@php 
							$opts[] = isset($options->option) ? $options->option : '' ;
							@endphp
							@endforeach
							@php 
							    $qid = encrypt($data->id);  
								$optStr = implode(",",$opts);
							@endphp
							<tr>
							  	<td>{{++$key}}</td>
							  	<td>{{$data->que}}</td>
							  	<td>{{$optStr}}</td>
							  	<td>{{ isset($data->getOptionsAns->option) ? $data->getOptionsAns->option : ''}}</td>
							  	<td>
							  		<div class="row">
								  		<a class="btn btn-sm " href="{{route('quize.edit',$qid)}}"><i class="fa fa-edit"></i></a>
								  		<form  class="question_delete" onsubmit="return false"> 
								  			@csrf
								  			<input type="hidden" name="id" value="{{$qid}}">
								  			<button class="btn  btn-sm" type="submit"><i class="fa fa-trash"></i></button> 
								  		</form>
							  		</div>
							  	</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@push('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.question_delete').submit(function(){
			$.ajax({
		        url: 'http://localhost:8000/quize/delete',
		        data: $(".question_delete").serialize(),
		        type:'post',
		        beforeSend: function () {
		            
		        },
		        success: function (res) {
		            if(res.status){
		            	alert(res.message);
		            }else{
		            	alert(res.message);
		            }
		        }
		    });		
		});
	});
	
</script>
@endpush