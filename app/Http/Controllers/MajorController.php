<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Http\Resources\MajorResource;
use App\Models\Major;
use Exception;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $major = new Major();
        return response([
            'message' => null,
            'result' => MajorResource::collection($major->get())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMajorRequest $request)
    {
        try {
            return ($major = Major::create($request->all()))
                ? response([
                    'message' => 'Data Jurusan berhasil ditambahkan.',
                    'result' => $major
                ], 201) : throw new Exception('Terjadi kesalahan server');
        }
        catch (Exception $exception){
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return response([
            'message' => null,
            'result' => new MajorResource($major)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        try {
            return ($major->update(array_filter($request->all())))
                ? response([
                    'message' => 'Data Jurusan berhasil diperbarui.',
                    'result' => $major
                ]) : throw new Exception('Terjadi kesalahan server');
        }
        catch (Exception $exception){
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        try {
            return $major->delete()
                ? response([
                    'message' => 'Data Jurusan berhasil dihapus.',
                    'result' => new MajorResource($major)
                ]) : throw new Exception('Terjadi kesalahan server');
        }
        catch (Exception $exception){
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ], 422);
        }
    }
}
