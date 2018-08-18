<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Listing;
use App\Media;
use App\Category;
use App\Libraries\Category as CategoryTools;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $listing = Listing::where('status', 'publish')->where('slug', $slug)->first();

        if(!$listing){
            return view('listings.404');
        }

        $gallery = $listing->meta()->where('meta_key', 'gallery')->first();
        if($gallery){
            $galleryIds = unserialize($gallery->meta_value);
            $gallery = Media::getUnsorted($galleryIds);
        } else {
            $gallery = collect();
        }

        if($listing->image){
            $gallery->prepend($listing->image);
        }

        return view('listings.show', compact('listing', 'gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        
    }

}
