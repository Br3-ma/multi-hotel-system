<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="card-action coin-tabs mb-2">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#AllGuest">All Booking Reservations</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Pending">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Booked">Booked</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Canceled">Canceled</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Refund">Refund</a>
                    </li> --}}
                </ul>
            </div>
            <div class="d-flex align-items-center mb-2 flex-wrap"> 
                {{-- <div class="guest-calendar">
                    <div id="reportrange" class="pull-right reportrange" style="width: 100%">
                        <span></span><b class="caret"></b>
                        <i class="fas fa-chevron-down ms-3"></i>
                    </div>
                </div> --}}
                {{-- <div class="newest ms-3">
                    <select class="default-select">
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>	 --}}
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="tab-content">	
                            <div class="tab-pane active show" id="AllGuest">
                                <div class="table-responsive p-4">
                                    @include('livewire.dashboard.__partials.alerts.alerts')
                                    <table id="example3" wire:ignore.self wire:poll.50000ms class="table card-table display p-4 mb-4 shadow-hover default-table table-responsive-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                    </div>
                                                </th>
                                                <th>Guest</th>
                                                <th>Order Date</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Special Request</th>
                                                <th class="text-center">Status</th>
                                                <th class="bg-none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($inquiries as $inq)
                                                <tr>
                                                    <td>
                                                        <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="concierge-bx d-flex align-items-center">
                                                            <img class="me-3 rounded" src="data:image/png;base64,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" alt="">
                                                            <div>
                                                                <h5 class="fs-16 mb-0 text-nowrap"><a class="text-black" href="javascript:void(0);">{{ App\Models\User::fullNames($inq->guests_id) }}</a></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <span>{{ $inq->created_at->toFormattedDateString() }}</span>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <h5 class="text-nowrap">
                                                            @php 
                                                                $date_str = $inq->checkin_date;
                                                                // $date = DateTime::createFromFormat('m/d/Y', $date_str);
                                                                // $formattedDate = $date->format('F j, Y');
                                                                echo $date_str; 
                                                                // echo $formattedDate; 
                                                                // echo 'waiting...'
                                                            @endphp
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <h5 class="text-nowrap">
                                                                @php 
                                                                    $date_str2 = $inq->checkout_date;
                                                                    // $date = DateTime::createFromFormat('m/d/Y', $date_str2);
                                                                    // $formattedDate = $date->format('F j, Y');
                                                                    echo $date_str2; 
                                                                    // echo $formattedDate; 
                                                                    // echo 'waiting...'
                                                                @endphp
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td class="request">
                                                        {{ $inq->special_requests ?? '' }}
                                                    </td>
                                                    <td>

                                                        @if($inq->is_confirmed == 1)
                                                            <span class="badge badge-sm badge-info">
                                                                Email feedback sent,<br/> 
                                                                @if ($inq->is_cancelled == 0)
                                                                    Available.
                                                                @else
                                                                    Not Available.
                                                                @endif
                                                            </span>
                                                        @else
                                                            <span class="badge badge-sm badge-primary">
                                                                Pending. 
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{-- <div class="request">
                                                            <a href="javascript:void(0);" class="btn btn-md text-primary">Refund</a>
                                                        </div>   --}}
                                                        <div class="request flex row space-x-2">
                                                            {{-- <button class="btn btn-xs btn-primary" wire:click="deny({{ $inq->id }})" onclick="confirm('Send Room Not Available Response') || event.stopImmediatePropagation();" class="btn btn-sm btn-info text-dark">
                                                                Decline
                                                            </button>  --}}
                                                            <button wire:click="bulkResponse({{ $inq->id }})" data-bs-toggle="modal" data-bs-target="#respondToReservation" class="btn btn-secondary btn-xs">Respond<span
                                                                    class="btn-icon-end"><i class="fa fa-envelope"></i></span>
                                                            </button> 
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown dropend">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                
                                                                <a data-bs-toggle="modal" data-bs-target=".create-booking-modal-lg" wire:click="bookRoom({{$inq->id}})" class="dropdown-item" href="javascript:void(0);">Book Room</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>	
                            </div>	

                             <div class="tab-pane" id="Pending">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Guest</th>
                                                <th>Order Date</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Special Request</th>
                                                <th class="text-center">Status</th>
                                                <th class="bg-none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($inquiries as $inq)
                                            <tr>
                                                <td>
                                                    <img class="rounded-full" width="35" src="data:image/png;base64,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" alt="">
                                                    <div>
                                                        <h5 class="fs-16 mb-0 text-nowrap"><a class="text-black" href="javascript:void(0);">{{ App\Models\User::fullNames($inq->guests_id) }}</a></h5>
                                                    </div>
                                                </td>
                                                <td>{{ $inq->created_at->toFormattedDateString() }}</td>
                                                <td>
                                                    @php 
                                                        // $date_str = $inq->checkin_date;
                                                        // $date = DateTime::createFromFormat('m/d/Y', $date_str);
                                                        // $formattedDate = $date->format('F j, Y');
                                                        // echo $formattedDate; 
                                                        echo 'waiting...'
                                                    @endphp
                                                </td>
                                                <td>
                                                    @php 
                                                        // $date_str = $inq->checkout_date;
                                                        // $date = DateTime::createFromFormat('m/d/Y', $date_str);
                                                        // $formattedDate = $date->format('F j, Y');
                                                        // echo $formattedDate; 
                                                        echo 'waiting...'
                                                    @endphp
                                                </td>
                                                <td>
                                                    {{ $inq->special_requests ?? '' }}
                                                </td>
                                                {{-- <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td> --}}
                                                <td>
                                                    
                                                    @if($inq->is_confirmed == 1)
                                                        <span class="badge badge-sm badge-info">
                                                            Email feedback sent,<br/> 
                                                            @if ($inq->is_cancelled == 0)
                                                                Available.
                                                            @else
                                                                Not Available.
                                                            @endif
                                                        </span>
                                                    @else
                                                        <span class="badge badge-sm badge-primary">
                                                            Pending. 
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="request">
                                                        <a href="javascript:void(0);" class="btn btn-md text-primary">Refund</a>
                                                    </div>  
                                                    <div class="request">
                                                        <button class="btn btn-sm btn-primary" wire:click="deny({{ $inq->id }})" onclick="confirm('Send Room Not Available Response') || event.stopImmediatePropagation();" class="btn btn-sm btn-info text-dark">
                                                            Respond
                                                        </button> 
                                                        <button wire:click="bulkResponse({{ $inq->id }})" data-bs-toggle="modal" data-bs-target="#respondToReservation" class="btn btn-secondary btn-xs">Respond<span
                                                                class="btn-icon-end"><i class="fa fa-envelope"></i></span>
                                                        </button> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropend">
                                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            
                                                            <a data-bs-toggle="modal" data-bs-target=".create-booking-modal-lg" wire:click="bookRoom({{$inq->id}})" class="dropdown-item" href="javascript:void(0);">Book Room</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>												
                                            </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>	
                            </div>
                            {{--<div class="tab-pane" id="Booked">
                                <div class="table-responsive">
                                    <table class="table card-table display mb-4 shadow-hover table-responsive-lg" id="guestTable-all2">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll3">
                                                    </div>
                                                </th>
                                                <th>Guest</th>
                                                <th>Order Date</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Special Request</th>
                                                <th>Room Type</th>
                                                <th class="text-center">Status</th>
                                                <th class="bg-none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="concierge-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="images/avatar/1.jpg" alt="">
                                                        <div>
                                                            <h5 class="fs-16 mb-0 text-nowrap"><a class="text-black" href="javascript:void(0);">Cahyadi Purnomo</a></h5>
                                                            <span class="text-primary fs-14">#EMP-00025</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <span>Oct 30th 2020 09:21 AM</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 2th, 2020</h5>
                                                        <span>9.46 PM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 4th, 2020</h5>
                                                        <span>6.12 PM</span>
                                                    </div>
                                                </td>
                                                <td class="request">
                                                    <a href="javascript:void(0);" class="btn  btn-sm">View Notes</a>
                                                </td>
                                                <td>
                                                    <span class="font-w500">Deluxe A - 02</span>
                                                </td>
                                                <td>
                                                    <div class="request">
                                                        <a href="javascript:void(0);" class="btn btn-md text-primary">Refund</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropend">
                                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>	
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="concierge-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="images/avatar/1.jpg" alt="">
                                                        <div>
                                                            <h5 class="fs-16 mb-0 text-nowrap"><a class="text-black" href="javascript:void(0);">Cahyadi Purnomo</a></h5>
                                                            <span class="text-primary fs-14">#EMP-00025</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <span>Oct 30th 2020 09:21 AM</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 2th, 2020</h5>
                                                        <span>9.46 PM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 4th, 2020</h5>
                                                        <span>6.12 PM</span>
                                                    </div>
                                                </td>
                                                <td class="request">
                                                    <a href="javascript:void(0);" class="btn  btn-sm">View Notes</a>
                                                </td>
                                                <td>
                                                    <span class="font-w500">Deluxe A - 02</span>
                                                </td>
                                                <td>
                                                    <div class="request">
                                                        <a href="javascript:void(0);" class="btn btn-md text-primary">Refund</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropend">
                                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>	
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="concierge-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="images/avatar/2.jpg" alt="">
                                                        <div>
                                                            <h5 class="fs-16 mb-0 text-nowrap"><a class="text-black" href="javascript:void(0);">Angela Smith</a></h5>
                                                            <span class="text-primary fs-14">#EMP-00025</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <span>Oct 30th 2020 09:21 AM</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 2th, 2020</h5>
                                                        <span>9.46 PM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 4th, 2020</h5>
                                                        <span>6.12 PM</span>
                                                    </div>
                                                </td>
                                                <td class="request">
                                                    <a href="javascript:void(0);" class="btn  btn-sm">View Notes</a>
                                                </td>
                                                <td>
                                                    <span class="font-w500">Deluxe A - 02</span>
                                                </td>
                                                <td>
                                                    <div class="request">
                                                        <a href="javascript:void(0);" class="btn btn-md text-primary">Refund</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropend">
                                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="Canceled">
                                <div class="table-responsive">
                                    <table class="table card-table display mb-4 shadow-hover table-responsive-lg" id="guestTable-all3">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll4">
                                                    </div>
                                                </th>
                                                <th>Guest</th>
                                                <th>Order Date</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Special Request</th>
                                                <th>Room Type</th>
                                                <th class="text-center">Status</th>
                                                <th class="bg-none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="concierge-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="images/avatar/2.jpg" alt="">
                                                        <div>
                                                            <h5 class="fs-16 mb-0 text-nowrap"><a class="text-black" href="javascript:void(0);">Angela Smith</a></h5>
                                                            <span class="text-primary fs-14">#EMP-00025</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <span>Oct 30th 2020 09:21 AM</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 2th, 2020</h5>
                                                        <span>9.46 PM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 4th, 2020</h5>
                                                        <span>6.12 PM</span>
                                                    </div>
                                                </td>
                                                <td class="request">
                                                    <a href="javascript:void(0);" class="btn  btn-sm">View Notes</a>
                                                </td>
                                                <td>
                                                    <span class="font-w500">Deluxe A - 02</span>
                                                </td>
                                                <td>
                                                    <div class="request">
                                                        <a href="javascript:void(0);" class="btn btn-md text-primary">Refund</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropend">
                                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            {{-- <div class="tab-pane" id="Refund">
                                <div class="table-responsive">
                                    <table class="table card-table display mb-4 shadow-hover table-responsive-lg" id="guestTable-all4">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll5">
                                                    </div>
                                                </th>
                                                <th>Guest</th>
                                                <th>Order Date</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Special Request</th>
                                                <th>Room Type</th>
                                                <th class="text-center">Status</th>
                                                <th class="bg-none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="concierge-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="images/avatar/2.jpg" alt="">
                                                        <div>
                                                            <h5 class="fs-16 mb-0 text-nowrap"><a class="text-black" href="javascript:void(0);">Angela Smith</a></h5>
                                                            <span class="text-primary fs-14">#EMP-00025</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <span>Oct 30th 2020 09:21 AM</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 2th, 2020</h5>
                                                        <span>9.46 PM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 4th, 2020</h5>
                                                        <span>6.12 PM</span>
                                                    </div>
                                                </td>
                                                <td class="request">
                                                    <a href="javascript:void(0);" class="btn  btn-sm">View Notes</a>
                                                </td>
                                                <td>
                                                    <span class="font-w500">Deluxe A - 02</span>
                                                </td>
                                                <td>
                                                    <div class="request">
                                                        <a href="javascript:void(0);" class="btn btn-md text-primary">Refund</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropend">
                                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="concierge-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="images/avatar/2.jpg" alt="">
                                                        <div>
                                                            <h5 class="fs-16 mb-0 text-nowrap"><a class="text-black" href="javascript:void(0);">Angela Smith</a></h5>
                                                            <span class="text-primary fs-14">#EMP-00025</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <span>Oct 30th 2020 09:21 AM</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 2th, 2020</h5>
                                                        <span>9.46 PM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="text-nowrap">Nov 4th, 2020</h5>
                                                        <span>6.12 PM</span>
                                                    </div>
                                                </td>
                                                <td class="request">
                                                    <a href="javascript:void(0);" class="btn  btn-sm">View Notes</a>
                                                </td>
                                                <td>
                                                    <span class="font-w500">Deluxe A - 02</span>
                                                </td>
                                                <td>
                                                    <div class="request">
                                                        <a href="javascript:void(0);" class="btn btn-md text-primary">Refund</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropend">
                                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modals --}}
    @include('livewire.dashboard.__partials.bookings.__book_room')
    @include('livewire.dashboard.__partials.bookings.__respond_reservation')
</div>

