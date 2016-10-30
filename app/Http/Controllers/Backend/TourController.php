<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TourRepositoryEloquent;
use Exception;
use Session;
use Validator;

use App\Models\Category;
use App\Models\Place;
use App\Models\Tour;

class TourController extends Controller
{
    protected $tourrepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param TourRepositoryEloquent       $tour      the tour repository
     *
     * @return void
     */
    public function __construct(TourRepositoryEloquent $tour)
    {
        $this->tourrepo = $tour;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours=$this->tourrepo->all();
        return view('backend.tours.index',compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $places = Place::all();
        return view('backend.tours.create', compact('categories', 'places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required'
        ], [
            'name.required' => 'Bạn phải nhập tên tour',
            'price.required' => 'Bạn phải nhập giá cho tour'
        ]);

        if($validator->fails()){
            return redirect('/admin/tour/create')
                ->withErrors($validator)
                ->withInput();
        }

        $place = Place::find($request->get('place'));
        $tour = new Tour();
        $tour->name = $request->get('name');
        $tour->price = $request->get('price');
        $tour->meta_keywords = $request->get('meta-keywords');
        $tour->meta_description = $request->get('meta-descriptions');
        $tour->save();
        
        return redirect('/admin/tour')
                    ->with(array('success' => 'Thêm mới thành công'))
                    ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.tours.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $places = Place::all();
        $tour = Tour::find($id);
        return view('backend.tours.edit', compact('categories', 'places', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required'
            //'meta-keywords' => 'required',
            //'meta-descriptions' => 'required'
        ], [
            'name.required' => 'Bạn phải nhập tên tour',
            'price.required' => 'Bạn phải nhập giá cho tour'
            //'meta-keywords.required' => 'Bạn phải nhập SEO keywords cho tour',
            //'meta-décriptions.required' => 'Bạn phải nhập SEO descriptions cho tour'
        ]);

        if($validator->fails()){
            return redirect('/admin/tour/create')
                ->withErrors($validator)
                ->withInput();
        }

        $tour = $this->tourrepo->update($request->all(), $id);
        return redirect('/admin/tour')
                    ->with(array('success' => 'Cập nhật thành công'))
                    ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tourrepo->delete($id);
        return redirect('/admin/tour')
                    ->with(array('success' => 'Xóa tour thành công'))
                    ->withInput();
    }
}
