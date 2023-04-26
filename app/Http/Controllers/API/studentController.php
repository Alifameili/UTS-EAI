<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\student;
use Exception;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = student::all();
        
        if($data){
            return ApiFormatter::createApi(200, 'berhasil', $data);
        } else {
            return ApiFormatter::createApi(400, 'gagal');
        }

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
        try {
            $request->validate([
                'username' => 'required',
                'address' => 'required',
            ]);

            $student = Student::create([
                'username' => $request->username,
                'address' => $request->address
            ]);

            $data = Student::where('id', '=',$student->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'berhasil', $data);
            } else {
                return ApiFormatter::createApi(400, 'gagal');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'gagal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $data = Student::where('id', '=',$id)->get();

        if($data){
            return ApiFormatter::createApi(200, 'berhasil', $data);
        } else {
            return ApiFormatter::createApi(400, 'gagal');
        }
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
        try {
            $request->validate([
                'username' => 'required',
                'address' => 'required',
            ]);

            $student = student::findOrFail($id);

            $student-> update([
                'username' => $request->username,
                'address' => $request->address
            ]);

            $data = Student::where('id', '=',$student->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'berhasil', $data);
            } else {
                return ApiFormatter::createApi(400, 'gagal');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $student = Student::findOrFail($id);

            $data = $student->delete();

            if($data){
                return ApiFormatter::createApi(200, 'data berhasil dihapus!');
            } else {
                return ApiFormatter::createApi(400, 'gagal');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'gagal');
        }      
    }


    public function searchByAddress($search)
    {

        try {
            $data = Student::where('address', 'LIKE', '%'.$search.'%')->get();

            if($data){
                return ApiFormatter::createApi(200, 'berhasil!' , $data);
            } else {
                return ApiFormatter::createApi(400, 'gagal');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'gagal');
        }


    }


    public function searchByUsername($username)
    {

        try {
            $data = Student::where('username', 'LIKE', '%'.$username.'%')->get();
            if($data){
                return ApiFormatter::createApi(200, 'berhasil' , $data);
            } else {
                return ApiFormatter::createApi(400, 'gagal');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'gagal');
        }

    }
}
