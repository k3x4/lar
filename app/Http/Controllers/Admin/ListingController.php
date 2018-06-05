<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Listing;
use App\Category;
use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.listings.index');
    }

    public function data()
    {
        $listings = Listing::all();
        return Datatables::of($listings)
            ->addColumn('action', function ($listing) {
                $html  = '<div class="dtable-td-wrapper">';
                $html .= \Form::checkbox('action', $listing->id, false, ['class' => 'select']);
                $html .= '</div>';
                return $html;
            })
            ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('admin.listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        
        $categories = Category::get();
        $listingCategories = DB::table("category_listing")->where("category_listing.listing_id", $id)
            ->pluck('category_listing.category_id', 'category_listing.category_id')->toArray();

        return view('admin.listings.edit', compact('listing', 'categories', 'listingCategories'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $ids = explode(',', $request->input('ids'));
        Listing::destroy($ids);
        return redirect()->route('admin.listings.index')
                        ->with('success','Listings deleted successfully');
    }

}
