<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Listing;
use App\Category;
use App\Libraries\Category as CategoryTools;
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
    public function show($slug)
    {
        $categories = Category::whereNull('category_id')->get();
        $categories = CategoryTools::makeListSlugs($categories);

        $category = Category::where('slug', $slug)->first();
        if(!$category){
            return view('category.404', compact('categories'));
        }

        if($category->category_id){
            $listings = Listing::where('category_id', $category->id)->get();
        } else {
            $ids = Category::where('category_id', $category->id)->get()->pluck('id')->toArray();
            $listings = Listing::whereIn('category_id', $ids)->get();
        }

        return view('category.show', compact('category', 'categories', 'listings'));
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
