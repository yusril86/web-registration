@extends('layouts.backend.index')
@section('content')
<section class="section">
   {{--  <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('registration.create') }}" class="btn btn-primary btn-sm shadow-sm ">
            <i class="fas fa-plus"></i>
            <span>Tambah</span>
        </a>
    </div> --}}
    {{-- @if (session()->has('message')) --}}
    @if ($registrations->isEmpty())
        <p style="text-align: center; margin-top: 10%">Belum ada data</p>
    @else
        <div class="card">            
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle  table-nowrap mb-4  table-borderless">
                            <thead>
                                <tr class="bg-secondary bg-opacity-25">
                                    <th class="ps-3"
                                        style="border-top-left-radius: 10px; border-bottom-left-radius: 10px">
                                        No
                                    </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>                                    
                                    <th style="border-top-right-radius: 10px; border-bottom-right-radius: 10px">
                                        <center> Aksi </center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrations as $registration)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div style="width: max-content">{{ $registration->name }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $registration->email }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $registration->alamat }}</div>
                                        </td>                                        
                                        <td>
                                            <div class="d-flex gap-2"><a href="{{ route('admin.registration.edit', $registration->id) }}"
                                                    class="btn btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.registration.destroy', $registration->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>                                               
                                            </div> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endif
</section>
@endsection