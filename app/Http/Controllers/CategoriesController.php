<?php

namespace App\Http\Controllers;

use App\Categories; // importing categories class
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // creating the index view for categories
        $categories = Categories::all();

        // return the index view with categories data
        return view('categories.index', ['categories' => $categories]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request data
        $validate = $request->validate([
            'title' => 'required'
        ]);

        // if request validated then
        if($validate){
            // create a category
            $category = Categories::create($request->all());

            // if category created then pass the message
            if($category){
                return redirect()->back()->with('status', "Category created succesfully");
            }else{
                return redirect()->back()->with('error', "OOPS! Something went wrong");
            }
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id); // retrieve the category by id

        // return the index view with the category data
        return $this->index()->with('category', $category);
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
        // validate the input data
        $validate = $request->validate([
            'title' => 'required'
        ]);
        
        // if data validated 
        if($validate){

            // update category where category id is $id
            $update_category = Categories::where('id', $id)->update($request->except(['_token', '_method']));

            // if category updated pass the message
            if($update_category){
                return redirect()->route('categories.index')->with('status', "Category updated successfully!");
            }

            return redirect()->back()->with(['id' => $id, 'error' => "OOPS! Something went wrong"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Categories::destroy($id)){
            return redirect()->back()->with('status', "Category deleted successfully!");
        }
    }
}
