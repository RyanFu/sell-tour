@extends('backend.layouts.master')

@section('title', trans('admin_manager_food.title_add_tour'))
@section('header')
   
@endsection
@section('content')
	<h2 class="text-left">&nbsp;{{trans('lang_admin.tour.add_tour')}}</h2><br>
    <div class="box box-success">
    	<div class="mg-top-20px">
	    	<form action="{{ route('admin.tour.update',$tour->id) }}" method="post">
	    		{{ csrf_field() }}
	    		{{ method_field('PUT') }}
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="category">Danh mục tour:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<select name="category" id="category" class="form-control">
								<option value="">Chọn tất cả</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}" {!! old('category') === $category->id ? 'selected=selected' : '' !!}>{{ $category->name }}</option>
		    					@endforeach
		    				</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="place">Địa điểm:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<select name="place" id="place" class="form-control">
								@foreach($places as $place)
									<option value="{{ $place->id }}" {!! old('place') === $place->id ? 'selected=selected' : '' !!}>{{ $place->name }}</option>
		    					@endforeach
		    				</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="content">Nhập nội dung cho tours:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<textarea name="content" rows="5" cols="73" id="content">{{ old('content', $tour->content) }}</textarea>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="name">Tên Tour:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<input type="text" class="form-control" name="name"	id="name" value="{{ old('name', $tour->name) }}">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="meta-keywords">Nhập từ khóa SEO cho tours:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<textarea name="meta-keywords" rows="5" cols="73">{{ old('meta-keywords', $tour->meta_keywords) }}</textarea>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="pull-right">
								<label for="meta-descriptions">Nhập miêu tả SEO cho tours:</label>
							</div>
						</div>
						
						<div class="col-md-6">
							<textarea name="meta-descriptions" rows="5" cols="73">{{ old('meta-descriptions', $tour->meta_description) }}</textarea>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<div class="col-md-offset-4">
						<input type="submit" value="Cập Nhật" class="btn btn-primary"> 
						<input type="reset" value="Nhập lại" class="btn btn-danger mg-left-20px"> 
					</div>
				</div>
	    	</form>
    	</div>
    </div>                      
	
         
@section('script')
    
    
@endsection
@endsection
