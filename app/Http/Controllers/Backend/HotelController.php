<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\HotelRepositoryEloquent;
use App\Repositories\Eloquent\PlaceRepositoryEloquent;
use Exception;
use Session;
class HotelController extends Controller
{
    protected $hotelrepo;
    protected $placerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param HotelRepositoryEloquent       $hotel      the hotel repository
     * @param PlaceRepositoryEloquent       $place      the place repository
     *
     * @return void
     */
    public function __construct(HotelRepositoryEloquent $hotel, PlaceRepositoryEloquent $place)
    {
        $this->hotelrepo = $hotel;
        $this->placerepo = $place;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$hotels =$this->hotelrepo->all();
        return view('backend.hotels.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$places =$this->placerepo->all();
        return view('backend.hotels.create',compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try {
           	$this->hotelrepo->create($request->all());
            Session::flash(trans('lang_admin.success'), trans('lang_admin.hotel.successful_message'));
            return redirect()->route('admin.hotel.index');
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin.danger'), trans('lang_admin.hotel.error_message'));
            return redirect()->route('admin.hotel.create');
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
        return view('backend.hotel.show');
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
            $list = $this->hotelrepo->find($id);
            $places =$this->placerepo->all();
            return view('backend.hotels.edit', compact('list','places'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin.danger'), trans('lang_admin.no_id'));
            return redirect()->route('admin.hotel.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request request
     * @param  int  $id id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $request->all();
        $list = $this->hotelrepo->find($id);
        if (empty($list)) {
            Session::flash(trans('lang_admin.danger'), trans('lang_admin.hotel.danger_edit'));
        } else {
            $this->hotelrepo->update($data, $id);
            Session::flash(trans('lang_admin.success'), trans('lang_admin.edit_success'));
        }
        return redirect() -> route('admin.hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         try {
            $count = $this->hotelrepo->find($id);
            if (!empty($count)) {
                $result = $this->hotelrepo->delete($id);
                if ($result) {
                    Session::flash(trans('lang_admin.success'), trans('lang_admin.hotel.delete_success'));
                } else {
                    Session::flash(trans('lang_admin.danger'), trans('lang_admin.hotel.delete_fail'));
                }
            } else {
                Session::flash(trans('lang_admin.danger'), trans('lang_admin.hotel.delete_fail'));
            }
            return redirect() -> route('admin.hotel.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('lang_admin.danger'), trans('lang_admin.no_id'));
            return redirect() -> route('admin.hotel.index');
        }
    }
}
