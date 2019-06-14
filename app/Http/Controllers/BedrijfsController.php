<?php

namespace App\Http\Controllers;

use App\bedrijf;
use Illuminate\Http\Request;
use Redirect;

class BedrijfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bedrijfs'] = bedrijf::paginate(10);

        return view('bedrijfs.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bedrijfs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'email' => 'required',
            'logo' => 'required',
            'website' => 'required',
        ]);

        bedrijf::create($request->all());

        return Redirect::to('bedrijfs')
            ->with('success','Great! Note created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['bedrijf_info'] = bedrijf::where($where)->first();

        return view('bedrijfs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $update = ['title' => $request->title, 'description' => $request->description];
        bedrijf::where('id',$id)->update($update);

        return Redirect::to('bedrijfs')
            ->with('success','Great! Notes updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        bedrijf::where('id',$id)->delete();

        return Redirect::to('bedrijfs')->with('success','Note deleted successfully');
    }
}
