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

                                        <label for="country" class="">Country *</label>
                                        <input type="text" name="country" class="form-control" required maxlength="40"
                                               value="{{ old('country') }}">
                                        @error('country')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        <label for="language" class="mt-3">language *</label>
                                        <input type="text" name="language" class="form-control" required maxlength="40"
                                                value="{{ old('language') }}">
                                        @error('language')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        <label for="lang_code" class="mt-4">Language code *</label>
                                        <input type="text" name="lang_code" class="form-control" maxlength="5" required
                                               value='{{old("lang_code")}}'>
                                        @error("lang_code")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        <label for="country_phone_code" class="mt-4">Country phone code * </label>
                                        <input type="text" name="country_phone_code" class="form-control" maxlength="7" required
                                               value='{{old("country_phone_code")}}'>
                                        @error("country_phone_code")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        <label for="flag_class" class="">Flag class *</label>
                                        <input type="text" name="flag_class" class="form-control" required maxlength="20"
                                               value="{{ old('flag_class') }}">
                                        @error('flag_class')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        <label for="status" class="mt-4">Status</label>
                                        <select class="custom-select form-control" id="status" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                        <p class="text-danger  mt-4 mb-1">{{ $message }}</p>
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
