@extends('layouts.backend.master')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <a href="{{route('languages.index')}}" class="btn btn-success mb-xxl-0 mb-4 ">
                            <i class="fa fa-list-alt" aria-hidden="true"></i> List of language
                        </a>
                    </div>
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->

                                <form action="{{route('languages.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="container mt-4">

                                        language *<br>
                                        <input type="text" name="language" class="form-control mb-3" required
                                                value="{{ old('language') }}">
                                        @error('language')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        Language code *<br>
                                        <input type="text" name="lang_code" class="form-control mb-4" maxlength="3"
                                               value='{{old("lang_code")}}'>
                                        @error("lang_code")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror


                                        Status<br>
                                        <select class="custom-select form-control mb-3" id="status" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                        <button type="submit" class="form-control btn btn-primary mt-4">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
