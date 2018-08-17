<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Listing;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function showParent($parent)
    {
        $category = Category::where('slug', $parent)->first();
        if(!$category){
            return view('category.404');
        }

        $ids = Category::where('category_id', $category->id)->get()->pluck('id')->toArray();
        $listings = Listing::where('status', 'publish')->whereIn('category_id', $ids)->get();

        return view('category.show', compact('category', 'listings'));
    }

    public function showChild($parent, $child)
    {
        $category = Category::where('slug', $child)->first();
        if(!$category){
            return view('category.404');
        }

        $listings = $category->listings()->where('status', 'publish')->get();//Listing::where('category_id', $category->id)->get();

        return view('category.show', compact('category', 'listings'));
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
