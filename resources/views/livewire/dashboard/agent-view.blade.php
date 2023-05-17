<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">
            <div class="card-action coin-tabs mb-2">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#AllRooms">Agent List</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#ActiveEmployee">Active Room Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#InactiveEmployee">Inactive Room Types</a>
                    </li> --}}
                </ul>
            </div>
            <div class="d-flex align-items-center mb-2"> 
                <button data-bs-toggle="modal" data-bs-target=".create-agent-modal-lg" class="btn btn-secondary">+ New Agent</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="tab-content">	
                            <div class="tab-pane fade active show" id="AllRooms">
                                <div class="table-responsive p-4">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif                                  
                                    <div class="mt-3 flex justify-center" wire:loading>
                                        <p>Processing...</p>
                                        {{-- <img src="{{ asset('public/dash/images/loader.gif') }}" /> --}}
                                    </div>
                                    <table wire:loading.remove id="example5" class="p-4 table card-table display mb-4 shadow-hover table-responsive-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                      <input class="form-check-input" type="checkbox" value="" id="checkAll3">
                                                    </div>
                                                </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>Email Verified On</th>
                                                <th>Created on</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @forelse ($users as $guest)
                                                <tr>
                                                    <td>
                                                        <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <a target="_blank" href="{{ route('guest-info', $guest->user->id) }}">
                                                            <span class="fs-16 font-w500 text-nowrap">{{ $guest->user->fname.' '.$guest->user->lname }}</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="fs-16 comments">{{ $guest->user->email }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="fs-16 comments">{{ $guest->phone_number }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="fs-16 comments">{{ $guest->country }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="fs-16 comments">{{ $guest->user->email_verified_at }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="fs-16 comments">{{ $guest->user->created_at }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a target="_blank" href="{{ route('edit-user', $guest->user->id) }}">Edit</a>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>   
                                    </div>
                                    <div class="flex justify-end">
                                        <div class="pagination flex justify-center mt-8 text-xs sm:text-xs">
                                            {{ $users->links() }}
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modals --}}
    @include('livewire.dashboard.__partials.agent.__create-agent')
</div>
