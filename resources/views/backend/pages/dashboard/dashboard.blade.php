@extends('layouts.backend.master')
@section('content')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card gradient-1 card-bx">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-auto text-white">
                                <h2 class="text-white">{{$users_count ?? 0}}</h2>
                                <span class="fs-18">Number of users</span>
                            </div>
                            <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="29" cy="29" r="28" stroke="white" stroke-width="2"/>
                                <circle cx="29" cy="21" r="8" fill="white"/>
                                <path d="M18 42c0-5.5 4.5-10 10-10h2c5.5 0 10 4.5 10 10" stroke="white" stroke-width="2" fill="none"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card gradient-2 card-bx">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-auto text-white">
                                <h2 class="text-white">{{$active_announcement_count ?? 0 }}</h2>
                                <span class="fs-18">Active announcements</span>
                            </div>
                            <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M29.0611 39.4402L13.7104 52.5947C12.9941 53.2089 11.9873 53.3497 11.1271 52.9556C10.2697 52.5614 9.7226 51.7041 9.7226 50.7597C9.7226 50.7597 9.7226 26.8794 9.7226 14.5028C9.7226 9.16424 14.0517 4.83655 19.3904 4.83655H38.7289C44.0704 4.83655 48.3995 9.16424 48.3995 14.5028V50.7597C48.3995 51.7041 47.8495 52.5614 46.9922 52.9556C46.1348 53.3497 45.1252 53.2089 44.4088 52.5947L29.0611 39.4402ZM43.5656 14.5028C43.5656 11.8335 41.3996 9.66841 38.7289 9.66841C33.0207 9.66841 25.1014 9.66841 19.3904 9.66841C16.7196 9.66841 14.5565 11.8335 14.5565 14.5028V45.5056L27.4873 34.4215C28.3926 33.646 29.7266 33.646 30.6319 34.4215L43.5656 45.5056V14.5028Z"
                                      fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card gradient-3 card-bx">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-auto text-white">
                                <h2 class="text-white">{{$passive_announcement_count ?? 0}}</h2>
                                <span class="fs-18">Passive announcements</span>
                            </div>
                            <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M29.0611 39.4402L13.7104 52.5947C12.9941 53.2089 11.9873 53.3497 11.1271 52.9556C10.2697 52.5614 9.7226 51.7041 9.7226 50.7597C9.7226 50.7597 9.7226 26.8794 9.7226 14.5028C9.7226 9.16424 14.0517 4.83655 19.3904 4.83655H38.7289C44.0704 4.83655 48.3995 9.16424 48.3995 14.5028V50.7597C48.3995 51.7041 47.8495 52.5614 46.9922 52.9556C46.1348 53.3497 45.1252 53.2089 44.4088 52.5947L29.0611 39.4402ZM43.5656 14.5028C43.5656 11.8335 41.3996 9.66841 38.7289 9.66841C33.0207 9.66841 25.1014 9.66841 19.3904 9.66841C16.7196 9.66841 14.5565 11.8335 14.5565 14.5028V45.5056L27.4873 34.4215C28.3926 33.646 29.7266 33.646 30.6319 34.4215L43.5656 45.5056V14.5028Z"
                                      fill="#B0B0B0" fill-opacity="0.5"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card gradient-4 card-bx">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-auto text-white">
                                <h2 class="text-white">78</h2>
                                <span class="fs-18">Check Out</span>
                            </div>
                            <svg width="57" height="46" viewBox="0 0 57 46" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.55512 20.7503L11.4641 17.8435C12.3415 16.9638 12.3415 15.5397 11.4641 14.6601C10.5844 13.7827 9.16031 13.7827 8.28289 14.6601L1.53353 21.4094C0.653858 22.2891 0.653858 23.7132 1.53353 24.5929L8.28289 31.3422C9.16031 32.2197 10.5844 32.2197 11.4641 31.3422C12.3415 30.4626 12.3415 29.0385 11.4641 28.1588L8.55512 25.2498H27.8718C29.1137 25.2498 30.1216 24.2419 30.1216 23C30.1216 21.7604 29.1137 20.7503 27.8718 20.7503H8.55512Z"
                                      fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16.5038 31.9992V36.4987C16.5038 41.4708 20.5332 45.4979 25.5029 45.4979H48.0008C52.9728 45.4979 57 41.4708 57 36.4987C57 29.0092 57 16.9931 57 9.50129C57 4.53151 52.9728 0.502136 48.0008 0.502136C41.5687 0.502136 31.9373 0.502136 25.5029 0.502136C20.5332 0.502136 16.5038 4.53151 16.5038 9.50129V14.0009C16.5038 15.2427 17.5117 16.2507 18.7536 16.2507C19.9955 16.2507 21.0034 15.2427 21.0034 14.0009C21.0034 14.0009 21.0034 11.8928 21.0034 9.50129C21.0034 7.01752 23.0192 5.00171 25.5029 5.00171H48.0008C50.4868 5.00171 52.5004 7.01752 52.5004 9.50129V36.4987C52.5004 38.9848 50.4868 40.9983 48.0008 40.9983C41.5687 40.9983 31.9373 40.9983 25.5029 40.9983C23.0192 40.9983 21.0034 38.9848 21.0034 36.4987C21.0034 34.1095 21.0034 31.9992 21.0034 31.9992C21.0034 30.7595 19.9955 29.7494 18.7536 29.7494C17.5117 29.7494 16.5038 30.7595 16.5038 31.9992Z"
                                      fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-xxl-4">
                    <div class="row">
                        <div class="col-xl-12 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div id="radialChart" class="radialChart"></div>
                                    <h2>785</h2>
                                    <span class="fs-16 text-black">Available Room Today</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="mb-0">Booked Room Today</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress mb-4" style="height:13px;">
                                        <div class="progress-bar gradient-5 progress-animated"
                                             style="width: 55%; height:13px;" role="progressbar">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>
                                    <div class="progress mb-4" style="height:13px;">
                                        <div class="progress-bar gradient-6 progress-animated"
                                             style="width: 70%; height:13px;" role="progressbar">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>
                                    <div class="progress default-progress" style="height:13px;">
                                        <div class="progress-bar gradient-7 progress-animated"
                                             style="width: 50%; height:13px;" role="progressbar">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <span class="marker gradient-5"></span>
                                            <div>
                                                <p class="status">Pending</p>
                                                <span class="result">234</span>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <span class="marker gradient-6"></span>
                                            <div>
                                                <p class="status">Done</p>
                                                <span class="result">65</span>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <span class="marker gradient-7"></span>
                                            <div>
                                                <p class="status">Finish</p>
                                                <span class="result">763</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8">
                    <div class="card">
                        <div class="card-header border-0 d-sm-flex d-block">
                            <div class="me-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2">Reservation Statistic</h4>
                                <span>Lorem ipsum dolor sit amet</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex me-5">
                                    <h3 class="mb-0 me-2">549</h3>
                                    <span>Check In</span>
                                </div>
                                <div class="d-flex me-3">
                                    <h3 class="mb-0 me-2">327</h3>
                                    <span>Check Out</span>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="reservationChart" class="reservationChart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-3">
                                            <div class="me-4">
                                                <span class="donut"
                                                      data-peity='{ "fill": ["var(--primary)", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'>6/8</span>
                                            </div>
                                            <div>
                                                <h2>70%</h2>
                                                <span class="fs-18">Check In</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 d-flex align-items-center col-sm-6">
                                            <div class="me-4">
                                                <span class="donut"
                                                      data-peity='{ "fill": ["#FFC368", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'>2/8</span>
                                            </div>
                                            <div>
                                                <h2>30%</h2>
                                                <span class="fs-18">Check Out</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
