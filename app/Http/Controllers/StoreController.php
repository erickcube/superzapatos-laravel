<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stores = Store::all();

      $result = array();
      $result['stores'] = $stores;
      $result['sucess'] = true;
      $result['total_elements'] = count($stores);

      return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $attributes = request()->validate([
         'name' => ['required'],
         'address' => ['required']
      ]);
      $saved = Store::create($attributes);
      $result = array();
      $result['store'] = $saved;
      $result['sucess'] = true;
      return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
      $result = array();
      $result['store'] = $store;
      $result['sucess'] = true;
      return $result;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
      $attributes = request()->validate([
         'name' => ['required'],
         'address' => ['required']
      ]);
      $updated = $store->update($attributes);
      $result = array();
      $result['store'] = $store;
      $result['sucess'] = true;
      return $result;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
       $store->articles()->delete();
       $store->delete();
       $result = array();
       $result['store'] = $store;
       $result['sucess'] = true;
       return $result;
    }
}
