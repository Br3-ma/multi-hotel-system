<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="card-action coin-tabs mb-2">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#AllGuest">All Contact Inquiries</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center mb-2 flex-wrap"> 
                @if (!empty($selectedItems))
                <button data-bs-toggle="modal" wire:click="deleteInquiries()" class="btn btn-danger">
                    Delete
                </button>
                @endif
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="tab-content">	
                            <div class="tab-pane active show" id="AllGuest">
                                <div class="table-responsive">

                                    
                                    <table wire:poll.100000ms class="table card-table display mb-4 shadow-hover default-table table-responsive-lg" id="guestTable-all">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    {{-- <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                    </div> --}}
                                                </th>
                                                <th>Subject</th>
                                                {{-- <th>Message</th> --}}
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Sent On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($inquiries as $inq)
                                            {{-- @dd($inq->created_at->toFormattedDateString()) --}}
                                                <tr>
                                                    <td>
                                                        <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="{{ $inq->id }}" wire:model="selectedItems">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="concierge-bx d-flex align-items-center">
                                                            <div style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#inquiryDetailModalLong" wire:click="viewMessageDetails({{$inq->id}})">
                                                                <h5 class="fs-16 mb-0 text-nowrap">
                                                                    <a class="text-black" href="javascript:void(0);">
                                                                        {{ $inq->subject }}
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    {{-- <td class="text-nowrap">
                                                        <span style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#inquiryDetailModalLong" wire:click="viewMessageDetails({{$inq->id}})">{{ $inq->message }}</span>
                                                    </td> --}}
                                                    <td>
                                                        <span style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#inquiryDetailModalLong" wire:click="viewMessageDetails({{$inq->id}})">{{ $inq->email }}</span>
                                                    </td>
                                                    <td>
                                                        <span style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#inquiryDetailModalLong" wire:click="viewMessageDetails({{$inq->id}})">{{ $inq->phone }}</span>
                                                    </td>
                                                    <td>
                                                        <span style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#inquiryDetailModalLong" wire:click="viewMessageDetails({{$inq->id}})">{{ $inq->created_at->toFormattedDateString() }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>	
                                <div class="flex justify-end">
                                    <div class="pagination flex justify-center mt-8 text-xs sm:text-xs">
                                        {{ $inquiries->links() }}
                                    </div>
                                </div>
                            </div>	
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @include('livewire.dashboard.__partials.contacts.__inquiry_details')
</div>
