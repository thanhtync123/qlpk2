<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelpers;
use App\Http\Requests\PatientFormRequest;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $patients = Auth::user()
        // ->patients()
        // ->orderBy('id', 'DESC') // Sắp xếp theo id giảm dần
        // ->get();
        $patients = Patient::orderBy('id', 'DESC')->get();

        return view('patients.index', ['patients' => $patients]);
    }

    // find the  patients whose  names or last name match the query provided  
    public function findByQuery(Request $request)
    {
        $result = Patient::select('id', DB::raw("CONCAT(patients.name,' ',patients.lastname) as text"))
            ->where(
                'lastname',
                'LIKE', '%' . request('queryTerm') . '%'
            )
            ->orWhere(
                'name',
                'LIKE', '%' . request('queryTerm') . '%'
            )
            ->get(
            );
        return response()->json($result);
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
    public function store(PatientFormRequest $request)
    {
        $validated = $request->validated();
        $patient = Patient::create($validated);

        // If this patient was added by the doctor 
        // we attachPatient to the current doctor
        if (isset($request->doctor_id)) {
            ModelHelpers::attachPatient($request->doctor_id, $patient->id);

            return redirect()
                ->route(
                    'patients.show',
                    ['patient' => $patient]
                )
                ->with(
                    'success', 'patients: ' . $patient->name . ' is created '
                );
        }

        return redirect()
            ->route(
                'patients.index'
            )
            ->with(
                'success', 'patients: ' . $patient->name . ' is created '
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {

        // // current doctor ID
        // $doctor_id = Auth::user()->id;

        // // A list of doctor-patient appointments
        // $appointments = $patient->appointments()->where('user_id', $doctor_id)->get();

        // // A list of doctor-patient orientationLtrs
        // $orientationLtrs = $patient->orientationLtrs()->where('user_id', $doctor_id)->get();
        
        // // A list of doctor-patient prescriptions
        // $prescriptions = $patient->prescriptions()->where('user_id', $doctor_id)->get();
        
        // // A list of doctor-patient scans
        // $scans = $patient->scans()->where('user_id', $doctor_id)->get();

        // return view(
        //     'patients.show',
        //     [
        //         'patient' => $patient,
        //         'appointments' => $appointments,
        //         'prescriptions'=>$prescriptions,
        //         'scans'=>$scans,
        //         'orientationLtrs'=>$orientationLtrs,
        //     ]
        // );
      //  Lấy user hiện tại
        $user = Auth::user();

        // Nếu là admin, lấy tất cả dữ liệu, nếu không thì lọc theo doctor_id
        // if ($user->role === 'admin') {
            $appointments = $patient->appointments()->get();
            $orientationLtrs = $patient->orientationLtrs()->get();
            $prescriptions = $patient->prescriptions()->get();
            $scans = $patient->scans()->get();
        // } else {
        //     $doctor_id = $user->id;
        //     $appointments = $patient->appointments()->where('user_id', $doctor_id)->get();
        //     $orientationLtrs = $patient->orientationLtrs()->where('user_id', $doctor_id)->get();
        //     $prescriptions = $patient->prescriptions()->where('user_id', $doctor_id)->get();
        //     $scans = $patient->scans()->where('user_id', $doctor_id)->get();
        // }

        return view(
            'patients.show',
            [
                'patient' => $patient,
                'appointments' => $appointments,
                'prescriptions' => $prescriptions,
                'scans' => $scans,
                'orientationLtrs' => $orientationLtrs,
            ]
        );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', ['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Patient $patient, PatientFormRequest $request)
    {
        $validated = $request->validated();
        $patient->update($validated);
        return back()
        ->with(
                'success', 'patients: ' . $patient->name . ' is updated! '
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $name = $patient->name;
        $patient->delete();
        
        return redirect()->route('patients.index')->with('success', "Xóa bệnh nhân $name thành công.");
        
    }
    public function print($id)
    {
        $patient = Patient::with([
            'scans:id,type,scan_path,patient_id',
            'prescriptions:id,content,patient_id',
            'appointments:id,date,start_time,end_time,motivation,patient_id'
        ])->find($id);
    
        return view('patients.print', compact('patient'));
    }

}