@extends('backend.layouts.master')

@section('title', trans('admin_manager_food.title_manage_food'))
@section('header')
   <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-star-rating/css/star-rating.css') }}">		
	<link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-star-rating/css/theme-krajee-fa.css') }}">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
	<script type="text/javascript" src="{{ asset('bower/bootstrap-star-rating/js/star-rating.js') }}" ></script>
@endsection
@section('content')
	<h2 class="text-left">&nbsp;{{trans('lang_admin.food.add_food')}}</h2><br>
    <div class="box box-success">
    	<div class="mg-top-20px">
	    	<form action="{{ route('admin.food.update',$list ->id) }}" method="post">
	    		{{ csrf_field() }}
	    		{{ method_field('PUT') }}
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="place">Địa điểm:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<select name="place_id" id="place" class="form-control">
								@foreach($places as $place)
									<option value="{{ $place->id }}" {!! $list->place_id === $place->id ? 'selected=selected' : '' !!}>{{ $place->name }}</option>
		    					@endforeach
		    				</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="name">Tên thực đơn:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<input type="text" class="form-control" name="name"	id="name" value="{{ $list->name }}">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="address">Address:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<input type="text" class="form-control" name="address" id="address" value="{{ $list-> address }}">
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="price">Giá thực đơn:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<input type="text" class="form-control" name="price" id="price" value="{{ $list->price }}">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="description">Mô tả về thực đơn:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<textarea type="text" class="form-control" name="description" id="content" rows="2" cols="30" style="resize: none;">{{ $list->description }}</textarea>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="rating">Đánh giá:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<input id="input-id" type="text" class="rating" data-size="sm" name="rating" value="{{ $list->rating }}">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="meta_keywords">Nhập từ khóa SEO cho foods:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<textarea name="meta_keywords" rows="5" cols="73"  style="resize: none;">{{ old('meta_keywords') }}</textarea>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="meta_descriptions">Nhập miêu tả SEO cho foods:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<textarea name="meta_descriptions" rows="5" cols="73"  style="resize: none;">{{ old('meta_descriptions') }}</textarea>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<div class="col-md-offset-4">
						<input type="submit" value="Cập nhât" class="btn btn-primary"> 
						<input type="reset" value="Nhập lại" class="btn btn-danger mg-left-20px"> 
					</div>
				</div>
	    	</form>
    	</div>
    </div>                      
         
@section('script')
    
    
@endsection
@endsection
