<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product_Category;
use App\Models\Variation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
         return view('viewCategory')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string'
        ]);
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect(route('categories.get'))->withSuccess('Create Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('editCategory')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string'
        ]);
        $category = Category::find($id);
        if(!$category){
            return redirect()->back()->withErrors(['msg'=>'The category does not exist']);
        }
        try {
            $category->update([
                'name'=>$request->name,
                'description'=>$request->description
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
        
        return redirect(route('categories.get'))->withSuccess('Edit Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect()->back()->withErrors(['msg'=>'The category does not exist']);
        }
        $product_categroy = Product_Category::where('category_id',$id)->first();
        if($product_categroy){
            return redirect()->back()->withErrors(['msg'=>'Can not delete a category with products']);
        }
        $variation = Variation::where('category_id',$id)->first();
        if($variation){
            return redirect()->back()->withErrors(['msg'=>'Can not delete a category with variation']);
        }
        $category->delete();
        return redirect()->back()->withSuccess('Delete Successfuly');
    }
}
