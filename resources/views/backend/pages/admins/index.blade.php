@extends('layouts.backend.master')
@section('content')
    <!--**********************************
            Content body start
        ***********************************-->
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
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                        <a href="{{route('admin.create')}}" class="btn btn-primary mb-xxl-0 mb-4 "><i
                                class="fa fa-plus" aria-hidden="true"></i> Add admin</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="All">
                            <div class="table-responsive">
                                <table
                                    class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl "
                                    id="guestTable-all">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="bg-none"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>
                                                <div class="guest-bx">
                                                    @if($admin->image)
                                                        <img src="{{asset('uploads/admins/'.$admin->image)}}"
                                                             alt="{{$admin->name}}"
                                                             width="100"
                                                             height="100"
                                                             class="me-3 rounded">
                                                    @endif </div>
                                            </td>
                                            <td class="job-desk">
                                                <div>
                                                    <span>{{$admin->name}}</span>
                                                </div>
                                            </td>
                                            <td class="job-desk">
                                                <div>
                                                    <span>{{$admin->email}}</span>
                                                </div>
                                            </td>
                                            <td class="job-desk">
                                                <div>
                                                    <span>{{$admin->role}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0);" class="btn-link"
                                                       data-bs-toggle="dropdown"
                                                       aria-expanded="false">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                            <path
                                                                d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                            <path
                                                                d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                           href="{{route('admin.edit',$admin->id)}}">Edit</a>
                                                        @if($admin->id != 1)
                                                            <form
                                                                action="{{ route('admin.destroy',$admin->id) }}"
                                                                method="Post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item ai-icon">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">{!! $admins->links() !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection
