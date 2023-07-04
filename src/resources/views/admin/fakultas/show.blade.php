@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fakultas.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fakultass.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fakultas.fields.id') }}
                        </th>
                        <td>
                            {{ $fakultas->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fakultas.fields.fakultasname') }}
                        </th>
                        <td>
                            {{ $fakultas->fakultasname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fakultas.fields.nama') }}
                        </th>
                        <td>
                            {{ $fakultas->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fakultas.fields.nim') }}
                        </th>
                        <td>
                            {{ $fakultas->nim }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fakultas.fields.prodi') }}
                        </th>
                        <td>
                            {{ $fakultas->prodi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fakultass.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection