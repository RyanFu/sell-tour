@extends('backend.layouts.master')

@section('title', trans('lang_admin.hotel.title_manage_hotel'))
@section('header')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-star-rating/css/star-rating.css') }}">       
    <link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-star-rating/css/theme-krajee-fa.css') }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('bower/bootstrap-star-rating/js/star-rating.js') }}" ></script>
@endsection
@section('content')
<div class="row">
	<h2 class="text-left">&nbsp;{{trans('lang_admin.hotel.hotel_list')}}</h2><br>
    <div class="box box-success">
    <div class="col-md-12" align="center"><a href="{{ route('admin.hotel.create') }}" class="btn btn-primary" >{!! trans('lang_admin.hotel.add_hotel') !!}</a></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_hotel" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('lang_admin.hotel.no') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.hotel.name') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.hotel.price') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.hotel.address') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.hotel.rating') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.hotel.edit') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.hotel.delete') !!}</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($hotels as $item)
                        <tr>
                            <td>{!! $index++ !!}</td>
                            <td><a href="{{ route('admin.hotel.show',$item ->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->address }}</td>
                            <td><input id="rating-system" type="number" class="rating" min="1" max="5" name="rating" value="{{ $item->rating }}" readonly="true" data-size="xs"></td>
                            <td>
                                <a href="{{ route('admin.hotel.edit',$item ->id)}}"><button class="btn btn-info">{!!trans('lang_admin.hotel.edit' )!!}</button></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.hotel.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                {!! Form::button(trans('lang_admin.hotel.delete'), ['class' => 'btn btn-danger',
                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                'data-title' => trans('lang_admin.hotel.title_delete'),
                                'data-message' => trans('lang_admin.hotel.confirm')]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
    </div>                      
</div>
@endsection