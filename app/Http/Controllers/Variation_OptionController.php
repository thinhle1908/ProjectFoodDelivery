<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Models\Variation_Option;
use Illuminate\Http\Request;

class Variation_OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $variation = Variation::find($id);
        if(!$variation)
        {
            return redirect()->back()->withErrors(['msg'=>'The category does not exist']);
        }
        return view('createVariationOption')->with('variation',$variation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$variation_id)
    {
        $validated = $request->validate([
            'value' => 'required'
        ]);
        $variation =  Variation::find($variation_id);
        if(!$variation){
            return redirect()->back()->withErrors(['msg'=>'The category does not exist']);
        }
        Variation_Option::create([
            'value'=>$request->value,
            'variation_id'=>$variation_id
        ]);
        return redirect('saler/variation/'.$variation_id.'/variation-option')->withSuccess('Create Sucessfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($variation_id)
    {
        $variation = Variation::find($variation_id);
        if(!$variation)
        {
            return redirect()->back()->withErrors(['msg'=>'The variation does not exist']);
        }
        $variation_options = Variation_Option::where('variation_id',$variation_id)->get();
        return view('viewVariationOption')->with('variation_options',$variation_options)->with('variation',$variation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($variation_id,$id)
    {
        $variation = Variation::find($variation_id);
        if(!$variation)
        {
            return redirect()->back()->withErrors(['msg'=>'The category does not exist']);
        }
        $variation_option = Variation_Option::find($id);
        return view('editVariationOption')->with('variation_option',$variation_option)->with('variation',$variation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$variation_id ,$id)
    {
        $validated = $request->validate([
            'value' => 'required'
        ]);
        $variation = Variation_Option::find($id);
        if(!$variation){
            return redirect()->back()->withErrors(['msg'=>'Varation does not exist']); 
        }
        try {
            $variation->update([
                'value'=>$request->value
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect('saler/variation/'.$variation_id.'/variation-option')->withSuccess('Create Sucessfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($variation_id,$id)
    {
        $variation_option = Variation_Option::find($id);
        if(!$variation_option){
            return redirect()->back()->withErrors(['msg'=>'Varation does not exist
            ']); 
        }
        try 
        {
            $variation_option->delete();
        } catch (\Exception $ex) 
        {
            return $ex;
        }
        return redirect()->back()->withSuccess('Delete Successfuly');
    }
}
