<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostTypeRequest;
use App\Models\CostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cost_types = CostType::all();
        return view('cost-types.cost-types-index',compact('cost_types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('cost-types.cost-types-create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostTypeRequest $request)
    {
        $cost_type = new CostType();
        $cost_type->name = $request->title;
        $user = Auth::user();
        if ($request->cost_type=='general' AND $user->hasRole(['super_admin']))
        {
            $cost_type->user_id = null;
        }else{
            $cost_type->user_id = Auth::id();
        }
        $cost_type->save();
        return redirect()->route('cost-types.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CostType  $cost_type
     * @return \Illuminate\Http\Response
     */
    public function show(CostType $cost_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CostType  $cost_type
     * @return \Illuminate\Http\Response
     */
    public function edit(CostType $cost_type)
    {
        return view('cost-types.cost-types-edit',compact('cost_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CostType  $cost_type
     * @return \Illuminate\Http\Response
     */
    public function update(CostTypeRequest $request, CostType $cost_type)
    {
        $cost_type->name = $request->title;
        $user = Auth::user();
        if ($request->cost_type=='general' AND $user->hasRole(['super_admin']))
        {
            $cost_type->user_id = null;
        }else{
            $cost_type->user_id = Auth::id();
        }
        $cost_type->save();
        return redirect()->route('cost-types.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CostType  $cost_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(CostType $cost_type)
    {
        if (true)
        {
            $cost_type->delete();
        }

        return redirect()->route('cost-types.index');
    }
}
