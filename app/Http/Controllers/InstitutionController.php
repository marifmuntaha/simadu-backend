<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use App\Http\Resources\InstitutionResource;
use App\Models\Institution;
use Exception;
use Illuminate\Support\Arr;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {
        return response([
            'message' => null,
            'result' => new InstitutionResource($institution)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        try {
            return $institution->update(array_filter($request->all()))
                ? response([
                    'message' => 'Data Lembaga berhasil diperbarui',
                    'result' => $request
                ]) : throw new Exception('Terjadi kesalahan server.');
        }catch (Exception $exception){
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        //
    }
}
