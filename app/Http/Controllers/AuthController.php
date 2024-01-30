<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    public function post(Request $request)
    {
        $cre = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($cre)) {
            $request->session()->regenerate();

            $checkRole = Auth::user()->role;
            // dd($checkRole);
            if($checkRole == 'admin')
            {
                return redirect()->route('projek');

            } elseif ($checkRole == 'surveyor')
            {
                return redirect()->route('tugas');
            } elseif ($checkRole == 'kabid')
            {
                return redirect()->intended('/acckontraktor');

            } elseif ($checkRole == 'kontraktor')
            {
                return redirect()->intended('/kontraktor');

            }
        }

        return back()->with('gagal', 'Login failed!');
    }


    public function index()
    {
        return view('auth.login');
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function logout()
    {
    Auth::logout();
    return redirect('/');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'nama' => 'required',
            'no_tlpn' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
            'role' => "kontraktor",
            'no_tlpn' => $request->no_tlpn
        ]);

        return redirect()->route('login')->with('sukses','Registrasi Anda Berhasi!, Silahkan Login...');
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
        //
    }
}
