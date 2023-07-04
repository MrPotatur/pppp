<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFakultasRequest;
use App\Http\Requests\StoreFakultasRequest;
use App\Http\Requests\UpdateFakultasRequest;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FakultasController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('fakultas_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Fakultas::query()->select(sprintf('%s.*', (new Fakultas)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'fakultas_show';
                $editGate      = 'fakultas_edit';
                $deleteGate    = 'fakultas_delete';
                $crudRoutePart = 'fakultass';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('fakultasname', function ($row) {
                return $row->fakultasname ? $row->fakultasname : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('nim', function ($row) {
                return $row->nim ? $row->nim : '';
            });
            $table->editColumn('prodi', function ($row) {
                return $row->prodi ? $row->prodi : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.fakultas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('fakultas_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fakultas.create');
    }

    public function store(Request $request)
    {
        $fakultas = Fakultas::create($request->all());

        return redirect()->route('admin.fakultass.index');
    }

    
    public function edit($id)
    {
        // Retrieve the fakultas data from the database based on the given ID
        $fakultas = Fakultas::findOrFail($id);

        // Pass the fakultas data to the view
        return view('admin.fakultas.edit', compact('fakultas'));
    }

    // AdminController.php
    public function update(Request $request, $id)
{
    $fakultas = Fakultas::find($id);
    $fakultas->update($request->all());
    return redirect()->route('admin.fakultass.update', ['fakultass' => $fakultas]);
}

    //public function update(UpdateFakultasRequest $request, Fakultas $fakultas)
    

    public function show(Fakultas $fakultas)
    {
        abort_if(Gate::denies('fakultas_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fakultas.show', compact('fakultas'));
    }

    public function destroy(Fakultas $fakultas)
    {
        abort_if(Gate::denies('fakultas_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fakultas->delete();

        return back();
    }

    public function massDestroy(MassDestroyFakultasRequest $request)
    {
        $fakultass = Fakultas::find(request('ids'));

        foreach ($fakultass as $fakultas) {
            $fakultas->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
