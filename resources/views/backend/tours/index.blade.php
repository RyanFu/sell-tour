@extends('backend.layouts.master')

@section('title', trans('lang_admin.tour.title_manage_tour'))
@section('content')
<div class="row">
	<h2 class="text-left">&nbsp;{{trans('lang_admin.tour.tour_list')}}</h2><br>
    <div class="box box-success">
    <div class="col-md-12" align="center"><a href="{{ route('admin.tour.create') }}" class="btn btn-primary" >{!! trans('lang_admin.tour.add_tour') !!}</a></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_tours" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('lang_admin.tour.no') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.tour.name') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.tour.edit') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.tour.delete') !!}</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($tours as $item)
                        <tr>
                            <td>{!! $index++ !!}</td>
                            <td><a href="{{ route('admin.tour.show',$item ->id) }}">{{ $item->name }}</a></td>
                            <td>
                                <a href="{{ route('admin.tour.edit',$item ->id)}}"><button class="btn btn-info">{!!trans('lang_admin.tour.edit' )!!}</button></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.tour.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                {!! Form::button(trans('lang_admin.tour.delete'), ['class' => 'btn btn-danger',
                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                'data-title' => trans('lang_admin.tour.title_delete'),
                                'data-message' => trans('lang_admin.tour.confirm')]) !!}
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