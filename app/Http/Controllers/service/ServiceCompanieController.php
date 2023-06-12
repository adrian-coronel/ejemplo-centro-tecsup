<?php

namespace App\Http\Controllers\service;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceCompanie;
use App\Http\Controllers\Controller;

class ServiceCompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceCompanies = ServiceCompanie::all();
        return view('services.companies.index',compact('serviceCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.companies.create',[
            'services' => Service::select('id','name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serviceCompanie = new ServiceCompanie([
                'name' => $request->name,
                'id_service' => $request->id_service,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'description' => $request->description
        ]);
        $serviceCompanie->save();

        return redirect()->route('servicecompanies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ServiceCompanie::destroy($id);
        return redirect()->route('servicecompanies.index');
    }
}
