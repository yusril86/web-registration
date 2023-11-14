<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationEmail;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registration::all();
        return view('pages.backend.register.index',compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.frontend.register.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:registrations'],
            'alamat' => ['required', 'string', 'max:255']
        ]);

        try {
            $savetoDb  = Registration::create($validation);

            if ($savetoDb) {
                $data = [
                    'name' => $request->name,
                    'body' => 'Terima kasih telah register di website kami '
                ];

                Mail::to($request->email)->send(new RegistrationEmail($data));
            }

            return redirect(route('home'))->with([
                'status' => 'Register Berhasil',
                'type'   => 'success'
            ]);
        } catch (\Exception $e) {
            // return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
            return redirect(route('home'))->with([
                'status' => $e->getMessage(),
                'type'   => 'error'
            ]);
        }


       /*  return redirect(route('home'))->with([
            'status' => 'Register Berhasil',
            'type'   => 'success'
        ]); */
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
        $registration = Registration::findOrFail($id);
        return view('pages.backend.register.edit',compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255'],           
            'alamat' => ['required', 'string', 'max:255']
        ]);
        $register = Registration::findOrFail($id);

        $register->update($validation);

        return redirect(route('admin.registration.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $register = Registration::findOrFail($id);

        $register->delete();

        return redirect(route('admin.registration.index'));
    }
}
