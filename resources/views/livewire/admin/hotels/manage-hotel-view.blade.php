<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-md-flex d-block p-0">
                        <div class="card-tabs mt-3 mt-sm-0 mb-sm-0 mb-3">
                            <ul class="nav nav-tabs shadow-none" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#All" role="tab">All Hotels</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Published" role="tab">3 Star Hotels</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Deleted" role="tab">5 Star Hotels</a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex p-md-0 p-sm-4 p-3">
                            <span class="me-3">Sort by rate:</span>
                            <ul class="star-review">
                                <li><i class="fas fa-star orange"></i></li>
                                <li><i class="fas fa-star orange"></i></li>
                                <li><i class="fas fa-star orange"></i></li>
                                <li><i class="fas fa-star orange"></i></li>
                                <li><i class="fas fa-star orange"></i></li>
                            </ul>
                        </div>
                    </div>	
                    <div class="card-body pb-0">
                        <div class="tab-content">	
                            <div class="tab-pane active show" id="All">
                                
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                    @foreach (Auth::user()->allTeams() as $team)
                                        
                                        <div class="row align-items-center customer-review-list">
                                            <div class="col-xl-3 col-lg-4 mb-xl-0 mb-3">
                                                <div class="review-bx">
                                                    <img class="me-3" src="{{ asset('public/ico/hotel.ico') }}" alt="{{ $team->name }}">
                                                    <div>
                                                        <span class="text-primary fs-16">{{ $team->id }}</span>
                                                        <h4 class="mt-1 fs-20 font-w600"><a class="text-black" href="guest-detail.html">{{ $team->name }}</a></h4>
                                                        <span class="fs-12">Created on {{ $team->created_at->toFormattedDateString() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-xxl-6">
                                                <ul class="star-review mb-2">
                                                    <li><i class="fas fa-star orange"></i></li>
                                                    <li><i class="fas fa-star orange"></i></li>
                                                    <li><i class="fas fa-star orange"></i></li>
                                                    <li><i class="fas fa-star orange"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                                <p class="mb-0">I have been there many times.Rooms ,Food and Service are excellent.we did lots of Excursions and all the places are from the Hotel reachable. we visited Long Waterfall and  was very helpful and excellent</p>
                                            </div>
                                            <div class="col-xl-3 text-end col-xxl-2 action-btn">
                                                <button type="submit" wire:click="switchHotel({{ $team->id }})" class="btn btn-primary btn-xs">Switch</button>
                                                {{-- <x-switchable-team :team="$team" component="responsive-nav-link" /> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <div class="tab-pane" id="Published">
                                <div class="row align-items-center customer-review-list">
                                    <div class="col-xl-3 col-lg-4 mb-xl-0 mb-3">
                                        <div class="review-bx">
                                            <img class="me-3" src="images/avatar/pic22.jpg" alt="">
                                            <div>
                                                <span class="text-primary fs-16">#EMP-00025</span>
                                                <h4 class="mt-1 fs-20 font-w600"><a class="text-black" href="guest-detail.html">Oliver Jean</a></h4>
                                                <span class="fs-12">Posted on 26/04/2020, 12:42 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <ul class="star-review mb-2">
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
                                    </div>
                                    <div class="col-xl-3 text-end col-xxl-2 action-btn">
                                        <a class="review-icon rounded-circle btn-success me-3" href="javascript:void(0);"><i class="far fa-check-circle"></i></a>
                                        <a class="review-icon rounded-circle btn-danger" href="javascript:void(0);"><i class="far fa-times-circle"></i></a>
                                    </div>
                                </div>
                                <div class="row align-items-center customer-review-list">
                                    <div class="col-xl-3 col-lg-4 mb-xl-0 mb-3">
                                        <div class="review-bx">
                                            <img class="me-3" src="images/avatar/pic33.jpg" alt="">
                                            <div>
                                                <span class="text-primary fs-16">#EMP-00025</span>
                                                <h4 class="mt-1 fs-20 font-w600"><a class="text-black" href="guest-detail.html">Post Melone</a></h4>
                                                <span class="fs-12">Posted on 26/04/2020, 12:42 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <ul class="star-review mb-2">
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur 
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                    </div>
                                    <div class="col-xl-3 text-end col-xxl-2 action-btn">
                                        <a class="review-icon rounded-circle btn-success me-3" href="javascript:void(0);"><i class="far fa-check-circle"></i></a>
                                        <a class="review-icon rounded-circle btn-danger" href="javascript:void(0);"><i class="far fa-times-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Deleted">
                                <div class="row align-items-center customer-review-list">
                                    <div class="col-xl-3 col-lg-4 mb-xl-0 mb-3">
                                        <div class="review-bx">
                                            <img class="me-3" src="images/avatar/pic44.jpg" alt="">
                                            <div>
                                                <span class="text-primary fs-16">#EMP-00025</span>
                                                <h4 class="mt-1 fs-20 font-w600"><a class="text-black" href="guest-detail.html">Kevin Mandala</a></h4>
                                                <span class="fs-12">Posted on 26/04/2020, 12:42 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <ul class="star-review mb-2">
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star orange"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, conse</p>
                                    </div>
                                    <div class="col-xl-3 text-end col-xxl-2 action-btn">
                                        <a class="review-icon rounded-circle btn-success me-3" href="javascript:void(0);"><i class="far fa-check-circle"></i></a>
                                        <a class="review-icon rounded-circle btn-danger" href="javascript:void(0);"><i class="far fa-times-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="d-sm-flex d-block align-items-center justify-content-between">
                    <h4 class="mb-sm-0 mb-3">Showing 1 to 5 of 5 entries</h4>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item page-indicator">
                                <a class="page-link" href="javascript:void(0)">
                                    <i class="la la-angle-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                            <li class="page-item page-indicator">
                                <a class="page-link" href="javascript:void(0)">
                                    <i class="la la-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
