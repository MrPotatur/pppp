@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fakultas.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fakultass.store") }}" encnim="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="fakultasname">{{ trans('cruds.fakultas.fields.fakultasname') }}</label>
                <input class="form-control {{ $errors->has('fakultasname') ? 'is-invalid' : '' }}"type="text" name="fakultasname" id="fakultasname" value="{{ old('fakultasname', '') }}" required>
                @if($errors->has('fakultasname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fakultasname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fakultas.fields.fakultasname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.fakultas.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fakultas.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nim">{{ trans('cruds.fakultas.fields.nim') }}</label>
                <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}" type="text" name="nim" id="nim" value="{{ old('nim', '') }}" required>
                @if($errors->has('nim'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nim') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fakultas.fields.nim_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prodi">{{ trans('cruds.fakultas.fields.prodi') }}</label>
                <input class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }}" text="text" name="prodi" id="prodi" value="{{ old('prodi', '') }}" required>
                @if($errors->has('prodi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prodi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fakultas.fields.prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection