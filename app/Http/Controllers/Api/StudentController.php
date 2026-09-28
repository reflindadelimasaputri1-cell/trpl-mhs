<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // ========================================
    // GET SEMUA DATA
    // ========================================
    public function index()
    {
        $data = Student::orderBy('nim', 'asc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }


    // ========================================
    // GET DATA BERDASARKAN ID
    // ========================================
    public function show(string $id)
    {
        $data = Student::find($id);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }


    // ========================================
    // POST / TAMBAH DATA
    // ========================================
    public function store(Request $request)
    {
        $rules = [
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tanggal_lahir' => 'date',
            'email' => 'email|nullable',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal simpan data',
                'data' => $validator->errors()
            ], 422);
        }

        $dataStudent = new Student;

        $dataStudent->nim = $request->nim;
        $dataStudent->nama = $request->nama;
        $dataStudent->prodi = $request->prodi;
        $dataStudent->tanggal_lahir = $request->tanggal_lahir;
        $dataStudent->email = $request->email;
        $dataStudent->alamat = $request->alamat;

        $dataStudent->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses menyimpan data',
            'data' => $dataStudent
        ], 201);
    }


    // ========================================
    // PUT / UPDATE DATA
    // ========================================
    public function update(Request $request, string $id)
    {
        $dataStudent = Student::find($id);

        if (empty($dataStudent)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tanggal_lahir' => 'date',
            'email' => 'email|nullable',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal update data',
                'data' => $validator->errors()
            ], 422);
        }

        $dataStudent->nim = $request->nim;
        $dataStudent->nama = $request->nama;
        $dataStudent->prodi = $request->prodi;
        $dataStudent->tanggal_lahir = $request->tanggal_lahir;
        $dataStudent->email = $request->email;
        $dataStudent->alamat = $request->alamat;

        $dataStudent->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses update data',
            'data' => $dataStudent
        ], 200);
    }


    // ========================================
    // DELETE DATA
    // ========================================
    public function destroy(string $id)
    {
        $dataStudent = Student::find($id);

        if (empty($dataStudent)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $dataStudent->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses hapus data'
        ], 200);
    }
}