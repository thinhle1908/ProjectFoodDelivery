<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variations = Variation::all();
        return view('viewVariation')->with('variations',$variations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('createVariation')->with('categories',$categories);
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
            'name' => 'required|string',
            'category_id' => 'required|alpha_num'
        ]);
        $category = Category::find($request->category_id);
        if(!$category){
            return redirect()->back()->withErrors(['msg'=>'The category does not exist']);
        }

        try {
            Variation::create([
                'name'=>$request->name,
                'category_id'=>$request->category_id
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect(route('variation.get'))->withSuccess('Create Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $variation = Variation::find($id);
        return view('editVariation')->with('categories',$categories)->with('variation',$variation);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variation = Variation::find($id);
        if(!$variation){
            return redirect()->back()->withErrors(['msg'=>'Varation does not exist
            ']); 
        }
        try 
        {
            $variation->delete();
        } catch (\Exception $ex) 
        {
            return $ex;
        }
        return redirect()->back()->withSuccess('Delete Successfuly');
    }
}
