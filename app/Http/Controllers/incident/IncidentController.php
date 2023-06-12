<?php

namespace App\Http\Controllers\incident;

use App\Models\Service;
use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth::user()->roles->name == 'admin')
            $incidents = Incident::all();

        if(Auth::user()->roles->name == 'user')
            $incidents = Incident::all()->where('id_user','=',Auth::id());
        
        // dump($incidents);
        return view('incident.index',[
            'incidents' => $incidents,
        ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('incident.create',[
            'incident' => new Incident,
            'services' => Service::select('id','name')->get(),
            'selectIdService' => $request->selectIdService,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filePath = '';
        if($request->file()){
            $fileName = $request->file('file-upload')->getClientOriginalName();
            $fileExtension = $request->file('file-upload')->getClientOriginalExtension();
            if(in_array($fileExtension,['jpg','png','jpeg'])){
                $filePath =  '/storage/'.$request->file('file-upload')->storeAs('uploads/img',$fileName,'public');
            }
            if(in_array($fileExtension,['pdf'])){
                $filePath =  '/storage/'.$request->file('file-upload')->storeAs('uploads/files',$fileName,'public');
            }
        }

        # esta es una asignación en masa
        $incident = new Incident([
            'id_user' => Auth::id(),
            'id_service' => $request->id_service,
            'subject' => $request->subject,
            'location' => $request->location,
            'file_path' => $filePath,
            'urgency' => $request->urgency,
            'impact' => $request->impact,
            'description' => $request->description
        ]);
        $incident->save();

        return redirect()->route('incidents.index');
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
    public function edit(Incident $incident)
    {  
       return view('incident.edit',[
            'incident' => $incident,
            'services' => Service::select('id','name')->get(),

        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Incident $incident, Request $request)
    {
        Incident::where('id',$incident->id)->update([
            'id_service' => $request->id_service,
            'subject' => $request->subject,
            'location' => $request->location,
            'urgency' => $request->urgency,
            'impact' => $request->impact,
            'description' => $request->description
        ]);
        return redirect()->route('incidents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->route('incidents.index');
    }
}
