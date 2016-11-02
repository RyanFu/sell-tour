<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\FoodRepositoryEloquent;
use App\Repositories\Eloquent\PlaceRepositoryEloquent;
use Exception;
use Session;
class FoodController extends Controller
{
    protected $foodrepo;
    protected $placerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param HotelRepositoryEloquent       $food      the food repository
     * @param PlaceRepositoryEloquent       $place      the place repository
     *
     * @return void
     */
    public function __construct(FoodRepositoryEloquent $food, PlaceRepositoryEloquent $place)
    {
        $this->foodrepo = $food;
        $this->placerepo = $place;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods= $this->foodrepo->all();
        return view('backend.foods.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places =$this->placerepo->all();
        return view('backend.foods.create',compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $this->foodrepo->create($request->all());
            Session::flash(trans('lang_admin.success'), trans('lang_admin.food.successful_message'));
            return redirect()->route('admin.food.index');
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin.danger'), trans('lang_admin.food.error_message'));
            return redirect()->route('admin.food.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.foods.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $list = $this->foodrepo->find($id);
            $places =$this->placerepo->all();
            return view('backend.foods.edit', compact('list','places'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin.danger'), trans('lang_admin.no_id'));
            return redirect()->route('admin.food.index');
        }
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
        $data = $request->all();
        $list = $this->foodrepo->find($id);
        if (empty($list)) {
            Session::flash(trans('lang_admin.danger'), trans('lang_admin.food.danger_edit'));
        } else {
            $this->foodrepo->update($data, $id);
            Session::flash(trans('lang_admin.success'), trans('lang_admin.edit_success'));
        }
        return redirect() -> route('admin.food.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $count = $this->foodrepo->find($id);
            if (!empty($count)) {
                $result = $this->foodrepo->delete($id);
                if ($result) {
                    Session::flash(trans('lang_admin.success'), trans('lang_admin.food.delete_success'));
                } else {
                    Session::flash(trans('lang_admin.danger'), trans('lang_admin.food.delete_fail'));
                }
            } else {
                Session::flash(trans('lang_admin.danger'), trans('lang_admin.food.delete_fail'));
            }
            return redirect() -> route('admin.food.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('lang_admin.danger'), trans('lang_admin.no_id'));
            return redirect() -> route('admin.food.index');
        }
    }
}
