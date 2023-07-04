<?php

namespace App\Http\Controllers\api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFakultasRequest;
use App\Http\Requests\UpdateFakultasRequest;
use App\Http\Resources\Admin\FakultasResource;
use App\Models\Fakultas;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FakultasController extends Controller
{
    public function index()
    {
        try {
            $fakultas = Fakultas::all();
            return response()->json($fakultas, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(), [
                'fakultasname'          => 'required',
                'nama'                  => 'required',
                'nim'                   => 'required',
                'prodi'                 => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            Fakultas::create($request->all());
            $response = [
                'Success' => 'New Data Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show($id)
    {
        try {
            $fakultas = Fakultas::findOrFail($id);
            $response = [
                $fakultas
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $fakultas = Fakultas::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'fakultasname'          => 'required',
                'nama'                  => 'required',
                'nim'                   => 'required',
                'prodi'                 => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['succeed' => false, 'Message' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $fakultas->update($request->all());
            $response = [
                'Success' => 'fakultas Updated'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'no result',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function destroy($id)
    {
        try {
            Fakultas::findOrFail($id)->delete();
            return response()->json(['success' => 'Fakultas deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}