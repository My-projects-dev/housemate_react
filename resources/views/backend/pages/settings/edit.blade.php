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
                        <a href="{{route('settings.index')}}" class="btn btn-success mb-xxl-0 mb-4 ">
                            <i class="fa fa-list-alt" aria-hidden="true"></i> List of setting
                        </a>
                        <a href="{{route('settings.create')}}" class="btn btn-primary mb-xxl-0 mb-4 "><i
                                class="fa fa-plus" aria-hidden="true"></i> Add setting
                        </a>
                    </div>
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach($languages as $key=>$language)
                                        <li class="nav-item">
                                            <a class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab"
                                               href="{{'#'.$language}}">{{strtoupper($language)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="text-center mt-5">
                                    <div class="text-center mt-5">
                                        @if($setting->image)
                                            <img class="border border-primary"
                                                 src="{{asset('uploads/settings/'.$setting->image)}}"
                                                 alt="{{$setting->key}}"
                                                 height="300">
                                        @endif
                                    </div>
                                </div>

                                <form action="{{route('settings.update',['setting' =>$setting->id])}}" method="POST"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="container mt-4">
                                        Image<br>
                                        <input type="file" name="image" class="form-control mb-3">
                                        @error('image')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        Key <br>
                                        <input type="text" name="key" class="form-control mb-3" required
                                               value="{{ isset($setting) ? $setting->key : old('key') }}">
                                        @error('key')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        Static value<br>
                                        <input type="text" name="static_value" class="form-control mb-4"
                                               value="{{ isset($setting) ? $setting->static_value ?? '' : old('static_value') }}">
                                        @error("static_value")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror


                                        Status<br>
                                        <select class="custom-select form-control mb-3" id="status" name="status">
                                            <option value="1" {{($setting->status==1) ? 'selected' : ''}}>Active
                                            </option>
                                            <option value="0" {{($setting->status==0) ? 'selected' : ''}}>Passive
                                            </option>
                                        </select>
                                        @error('status')
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @foreach($languages as $key => $language)
                                            <div id="{{$language}}"
                                                 class="container tab-pane mt-0 {{$loop->first ? 'active' : ''}}">

                                                <br>
                                                Value ({{strtoupper($language)}})<br>
                                                <textarea class="form-control" name="value:{{$language}}" required
                                                          id="value_{{$language}}">
                                                    {{ isset($setting) ? $setting->translate($language)->value ?? '' : old('value:'.$language) }}
                                                </textarea>
                                                @error("value:$language")
                                                <p class="text-danger mb-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="container mt-0" >
                                        <button type="submit" class="form-control btn btn-primary mt-4">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        @foreach($languages as $lang)
        CKEDITOR.replace({{'value_'.$lang}});
        @endforeach
    </script>

@endsection
