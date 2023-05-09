<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">
            <div class="card-action coin-tabs mb-2">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#AllRooms">All Booking</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#ActiveEmployee">Active Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#InactiveEmployee">Inactive Rooms</a>
                    </li> --}}
                </ul>
            </div>
            <div class="d-flex align-items-center mb-2"> 
                {{-- <button data-bs-toggle="modal" data-bs-target=".create-booking-modal-lg" class="btn btn-secondary">+ New Booking</button> --}}
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
                            <div class="tab-pane fade active show" id="AllRooms">
                                <div class="table-responsive">
                                    @include('livewire.dashboard.__partials.alerts.alerts')
                                    <table wire:ignore.self wire:poll.50000ms class="table card-table display mb-4 shadow-hover table-responsive-lg" id="guestTable-all3">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll3">
                                                    </div>
                                                </th>
                                                <th>Room Image</th>
                                                <th>Room Number</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                                <th>Agent</th>
                                                <th>Room Floor</th>
                                                <th>Contact Info</th>
                                                <th>Rate</th>
                                                <th>Status</th>
                                                <th class="bg-none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bookings as $booking)
                                                <tr>
                                                    <td>
                                                        <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="room-list-bx d-flex align-items-center">
                                                            @if($booking->room->image_path != null)
                                                            <img class="me-2 rounded" src="{{ 'public/'.Storage::url($booking->room->image_path) }}" alt="">
                                                            @else
                                                            <img class="me-2 rounded" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAMFBMVEXx8/XCy9K/yND09vfw8vTP1tzp7O/i5ure4+fO1dvJ0dfT2d/EzNPt7/Lb4OXo6+4FeM7UAAAFL0lEQVR4nO2c24KrIAxFLdha7///t0dxOlWDSiAKztnrbR4G6SoJBKHZA6zJYncgQeCEAicUOKHACQVOKHBCgRMKnFDghAInFDihwAkFTihwQoETCpxQ4IQCJxQ4ocAJBU4ocEKBEwqcUOCEAicUOKHACQVOKHBCgRMKnFDghAInFDihwAkFTihwQoETCpxQ4IQCJxQ4ocAJBU4ot3Oi1KMq64FnWTVq+EueWzlRquqKVn/J+/ezEfdyHydKPYtc62yF1m1Xymq5ixPVdDnx8eslf1eCVu7hRFXFppAfLW39kNJyByeqOTJirGTvRsbKDZyozsHIpKUQsZK8E1Vu55GTrKTuRL0ZRoyVLviZaTtRVctUMuaVOnCoJO1E1WwjxsorbGZO2Qk7br5WuhApKTvpfZWMy5WAoZKuk6b1NhI4VJJ10uRBSsas0ng+OlUnVaARw9NvqCTqRERJpt9eUtJ0IqPEN36SdNIIKRnIPeafFJ0Ep9c5mr+qTdFJ2CRMpLAn5fScqJeokrFWZkoRdaImwtpw2T9iSnnxuiDoRFXda6hK28JzWTA14ryBxKFlTT9iTlT1W57o3Lta96yED8krRieknCw/DDuEP1TnKBlgzMlCTtZDXr+8pIjOwitK5x7JOKFD3mukiE85ix45S5FxYll46prdiv8ekpsU19wv4kS9LV1ouQPlrPzKliIzTuw9YDYiVfgFSxFx8rR+wcyMomSX9HYpTjlFwonqrB3gBc/JyYQjRcRJYe8Ay4l9rMlLcVi8iTjp7Y/nOBHcMjngWEoi4+TUlcmKw9rnxHzCWMqeU/ltkB9JEZl3SusnYmwQn1fm2GgPeiOzZrM9WZfu/3/BNDznYATLOLENffep+JppeMZBMSZUF9N6ljFM7KF3qpTduBZyQj4W53XTiRsEm1L2dr2k9k9W9Rtjq2BrJj9Zyk7pI7bP9lw8kfH+4KIFLGF77Sa3R90Un0POvHNCcYzsLVMk9+2buni1bd9xjMSJHMPmjCz7zov/fidW5GQ7OS/2e8BoRrLtrBfXScTIMVLsk09cJxEjZ8I6+cR1EmG1tsRaDsZ0EjlyDL0leuxOpulD4JTALtfXORRbnqVO1LDOePdtpoclWPsqulL+wt0P0SNnxFKrrp2opmuXl+5OuHA3PSmByDGQ9ezSydYdM+ELd4YUIsdANnoWTva2RSUv3JlnJRE5I2RbY+6kee1+dTrrhC7cPTZeMUdivZnydaIc3tdqqWuI6USOYZlSfp0oxzVlJxNByUSOYZlSPk6cDzqEXy17JDTn/LBMKRlTSRZ4X2giep2zZnEwZHLiGjifFt6BTtKKHMMspUxO2BkvDzoDm1jkGGa7bsaJx0t9XfgrOfuMlhezwsc48RrKufvhyiXXHatg8T2Zkm0eHzluxO8W4pXHKljkXycBt3h9blFdeqyCx2fPOguLbn6qTWsBu+Czxs/CopsdP4kmkx+mcZ8FRrfuWUqSTSYT005keDucW4iXnzRhMg17iYacC6A0VyZzzIQs0pBrUrn22JoXY4Us0pDjaZMzb+dIMX6/Qi0dHSU0XHySz48heqSaOs60vsvlq2mtpzj9OCh/Trgjew7afgLar63d6ec2SmTZm37+UyV7048K+Gmkm7O10A/8aaSbY7sEr8rYvYoNnX4Sr3EuYJVpVc35Ccu/innZbryMJ1n4v9f4N9FZ39XPZ931GYzMGH9VPHYfAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADp8Q9+nG9anuOrfAAAAABJRU5ErkJggg==" alt="">
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="room-list-bx d-flex align-items-center">
                                                            <div>
                                                                <span class=" fs-16 font-w500 text-nowrap">{{ $booking->room->room_number }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="room-list-bx d-flex align-items-center">
                                                            <span class=" fs-16 font-w500 text-nowrap">
                                                                @php 
                                                                    $date_str = $booking->checkin_date;
                                                                    $date = DateTime::createFromFormat('m/d/Y', $date_str);
                                                                    $formattedDate = $date->format('F j, Y');
                                                                    echo $formattedDate; 
                                                                @endphp
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="room-list-bx d-flex align-items-center">
                                                            <span class=" fs-16 font-w500 text-nowrap">
                                                                @php 
                                                                    $date_str = $booking->checkout_date;
                                                                    $date = DateTime::createFromFormat('m/d/Y', $date_str);
                                                                    $formattedDate = $date->format('F j, Y');
                                                                    echo $formattedDate; 
                                                                @endphp
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <span class="fs-16 font-w500 text-nowrap">{{ $booking->room->bed_type }}</span>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            
                                                            <span class="fs-16 font-w500">{{ $booking->room->floor ?? ''}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="facility">
                                                        <div>
                                                            <span class="fs-16 comments">{{ $booking->room->room_types != null ? $booking->room->room_types->comments : ''}}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <span class="mb-2">Price</span>	
                                                            <span class="font-w500">K{{ $booking->room->room_types != null ? $booking->room->room_types->price : ''}}
                                                                <small class="fs-14 ms-2">/{{ $booking->room->room_types != null ? $booking->room->room_types->per : ''}}</small>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ( $booking->room->is_available == 1)
                                                            <button wire:click='toggleStatus({{ $booking->room->id}})' class="btn btn-success btn-md">Available</button>
                                                        @else
                                                            <button wire:click='checkOut({{ $booking->id}})' class="btn btn-danger btn-md">Checkout</button>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
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
                                                    </td> --}}
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>	
                            </div>	


                            <div class="tab-pane" id="ActiveEmployee">
                                <div class="table-responsive">
                                    <table class="table card-table display mb-4 shadow-hover table-responsive-lg" id="guestTable-all1">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll1">
                                                    </div>
                                                </th>
                                                <th>Room Name</th>
                                                <th>Bed Type</th>
                                                <th>Room Floor</th>
                                                <th>Facilities</th>
                                                <th>Rate</th>
                                                <th>Status</th>
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
                                                    <div class="room-list-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="images/room/room7.jpg" alt="">
                                                        <div>
                                                            <span class=" text-secondary fs-14 d-block">#12341225</span>
                                                            <span class=" fs-16 font-w500 text-nowrap">Deluxe A-91234</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <span class="fs-16 font-w500 text-nowrap">Double Bed</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        
                                                        <span class="fs-16 font-w500">Floor A-1</span>
                                                    </div>
                                                </td>
                                                <td class="facility">
                                                    <div>
                                                        <span class="fs-16 comments">AC, Shower, Double Bed, Towel, Bathup, Coffee Set, LED TV, Wifi</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <span class="mb-2">Price</span>	
                                                        <span class="font-w500">$145<small class="fs-14 ms-2">/night</small></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-md">BOOKED</a>
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


                            <div class="tab-pane" id="InactiveEmployee">
                                <div class="table-responsive">
                                    <table class="table card-table display mb-4 shadow-hover table-responsive-lg" id="guestTable-all2">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll2">
                                                    </div>
                                                </th>
                                                <th>Room Name</th>
                                                <th>Bed Type</th>
                                                <th>Room Floor</th>
                                                <th>Facilities</th>
                                                <th>Rate</th>
                                                <th>Status</th>
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
                                                    <div class="room-list-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="images/room/room7.jpg" alt="">
                                                        <div>
                                                            <span class=" text-secondary fs-14 d-block">#12341225</span>
                                                            <span class=" fs-16 font-w500 text-nowrap">Deluxe A-91234</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <span class="fs-16 font-w500 text-nowrap">Double Bed</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        
                                                        <span class="fs-16 font-w500">Floor A-1</span>
                                                    </div>
                                                </td>
                                                <td class="facility">
                                                    <div>
                                                        <span class="fs-16 comments">AC, Shower, Double Bed, Towel, Bathup, Coffee Set, LED TV, Wifi</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <span class="mb-2">Price</span>	
                                                        <span class="font-w500">$145<small class="fs-14 ms-2">/night</small></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-md">Check out</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    {{-- @include('livewire.dashboard.admin.__partials.bookings.__create_booking') --}}
</div>
