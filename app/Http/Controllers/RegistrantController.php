<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrantRequest;
use App\Http\Requests\UpdateRegistrantRequest;
use App\Http\Resources\RegistrantResource;
use App\Models\Registrant;
use Exception;
use Illuminate\Http\Request;

class RegistrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $registrants = new Registrant();
        $registrants = $request->user ? $registrants->whereUser($request->user) : $registrants;
        return response([
            'message' => null,
            'result' => RegistrantResource::collection($registrants->get())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrantRequest $request)
    {
        try {
            return ($registrant = Registrant::create($request->all()))
                ? response([
                    'message' => 'Data berhasil disimpan.',
                    'result' => $registrant
                ], 201) : throw new Exception('Terjadi kesalahan server.');
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Registrant $registrant)
    {
        return response([
            'message' => null,
            'result' => new RegistrantResource($registrant)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrantRequest $request, Registrant $registrant)
    {
        try {
            return $registrant->update(array_filter($request->all()))
                ? response([
                    'message' => 'Data berhasil diperbarui.',
                    'result' => $registrant
                ]) : throw new Exception('Terjadi kesalahan server.');
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registrant $registrant)
    {
        try {
            return $registrant->delete()
                ? response([
                    'message' => 'Data berhasil dihapus.',
                    'result' => $registrant
                ]) : throw new Exception('Terjadi kesalahan server.');
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ], 422);
        }
    }
}
