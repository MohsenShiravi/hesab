<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::query()->where('owner_id', Auth::id())->get();
        return view('warehouses.warehouses-index', ['warehouses' => $warehouses]);
    }

    public function create()
    {
        return view('warehouses.warehouses-create', [
            'keepers' => User::all(),
            'provinces' => Province::all()
        ]);
    }

    public function store(WarehouseRequest $request)
    {
        Warehouse::query()->create([
            'owner_id' => Auth::id(),
            'keeper_id' => $request->keeper_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
        ]);
        return redirect(route('warehouses.index'));
    }

    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.warehouses-edit', [
            'warehouse' => $warehouse,
            'keepers' => User::all(),
            'cities' => City::all(),
            'provinces' => Province::all()
        ]);
    }

    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->update([
            'keeper_id' => $request->keeper_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
        ]);
        return redirect(route('warehouses.index'));
    }

    public function destroy(Warehouse $warehouse)
    {
        if (true) {
            $warehouse->delete();
            return redirect(route('warehouses.index'));
        }
    }
}
