

@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Table</h1>
                <div class="section-header-button">
                    <a href="{{ route('soal.create') }}"
                        class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">All Posts</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Table</h2>
                <p class="section-lead">
                    You can manage all posts, such as editing, deleting and more.
                </p>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('soal.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="search" name="pertanyaan">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <thead>
                                                <tr>
                                                    <th scope="col">id</th>
                                                    <th scope="col">Soal</th>
                                                    <th scope="col">Jawaban A</th>
                                                    <th scope="col">Jawaban A</th>
                                                    <th scope="col">Jawaban B</th>
                                                    <th scope="col">Jawaban B</th>
                                                    <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($soals as $soal)
                                                <tr>
                                                    <td>{{ $soal->id }}</td>
                                                    <td>{{ $soal->pertanyaan }}</td>
                                                    <td>{{ $soal->jawaban_a }}</td>
                                                    <td>{{ $soal->jawaban_b }}</td>
                                                    <td>{{ $soal->jawaban_c }}</td>
                                                    <td>{{ $soal->jawaban_d }}</td>
                                                    <td>{{ $soal->created_at }}</td>
                                                    {{-- <td>
                                                        <div class="d-flex justify-centent-center">
                                                            <a href="{{ route('user.edit', $user->id) }}"
                                                                class="btn btn-sm btn-info btn-icon"><i class="fas fa-edit">
                                                                    </i>Edit
                                                                </a>

                                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="ml-2">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE" />
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}"/>
                                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                            <i class="fas fa-times"></i>Delete
                                                                        </button>
                                                                </form>

                                                        </div>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="float-right">
                                        {{ $soals->withQueryString()->Links() }}
                                    </div>
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

