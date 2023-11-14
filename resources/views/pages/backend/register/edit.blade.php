@extends('layouts.backend.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route("admin.registration.update",$registration->id)}}">
                        @method("PUT")
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>
                            <div class="col-12 col-md-6">
                                <input type="name" id="name" name="name" class="form-control form-control-sm @error('name')
                                            is-invalid
                                        @enderror" style="border-radius: .8rem !important"
                                    value="{{ old('name', $registration->name) }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                       
                        
                        
                      
                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>
                            <div class="col-12 col-md-6">
                                <input type="text" id="alamat" name="alamat" class="form-control form-control-sm @error('alamat')
                                            is-invalid
                                        @enderror" style="border-radius: .8rem !important"
                                    value="{{ old('alamat', $registration->alamat) }}" required>
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a  class="btn btn-outline-danger" href="{{route("admin.registration.index")}}">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ubah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection