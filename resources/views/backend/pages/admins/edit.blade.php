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
                        <a href="{{route('admin.index')}}" class="btn btn-success mb-xxl-0 mb-4 ">
                            <i class="fa fa-list-alt" aria-hidden="true"></i> List of admins
                        </a>
                        <a href="{{route('admin.create')}}" class="btn btn-primary mb-xxl-0 mb-4 "><i
                                class="fa fa-plus" aria-hidden="true"></i> Add admin
                        </a>
                    </div>
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mt-5">
                                    <div class="text-center mt-5">
                                        @if($admin->image)
                                            <img class="border border-primary"
                                                 src="{{asset('uploads/admins/'.$admin->image)}}"
                                                 alt="{{$admin->key}}"
                                                 height="300">
                                        @endif
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <form action="{{route('admin.update',$admin->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        Image<br>
                                        <input type="file" name="image" class="form-control mb-3">
                                        @error('image')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                        Role*<br>
                                        <input type="text" name="role" value="{{$admin->role}}"
                                               class="form-control mb-2" required>
                                        @error('role')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                        Name*<br>
                                        <input type="text" name="name" value="{{$admin->name}}"
                                               class="form-control mb-2" required>
                                        @error('name')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                        Email*<br>
                                        <input type="email" name="email" value="{{$admin->email}}"
                                               class="form-control mb-2" required>
                                        @error('email')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                        Password*<br>
                                        <input type="password" name="password" class="form-control" required>
                                        @error('password')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                        <button type="submit" class="btn btn-warning mt-3">Edit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
