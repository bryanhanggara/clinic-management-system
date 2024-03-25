@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Dokter</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Data Dokter</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-header">
                            <a href="{{route('user-management.create')}}" class="btn btn-primary">
                                Tambah Dokter
                            </a>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{route('user-management.index')}}" method="get">
                                @csrf
                                <input class="form-control"
                                name="name"
                                type="search"
                                placeholder="Search"
                                aria-label="Search"
                                data-width="250">
                            <button class="btn"
                                type="submit"></button>
                            </form>
                            <div class="table-responsive">
                                <table class="table-striped table"
                                    id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>Foto</th>
                                            <th>Sip</th>
                                            <th>Spesialis</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Lainnya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($doctors as $doctor)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>{{$doctor->name}}</td>
                                            <td>
                                                <img src="{{$doctor->photo}}" alt="foto" width="100" height="100">
                                            </td>
                                            <td>{{$doctor->sip}}</td>
                                            <td>{{$doctor->specialist}}</td>
                                            <td>{{$doctor->email}}</td>
                                            <td>
                                                <a href=""
                                                    class="btn btn-secondary">Update</a>
                                            </td>
                                            <td>
                                                {{-- <form action="{{route('user-management.destroy', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form> --}}
                                            </td>
                                                
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12">
                                                    Data Kosong
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                {{$doctors->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
