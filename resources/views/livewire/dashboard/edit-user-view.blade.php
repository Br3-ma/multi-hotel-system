<div class="content-body">
    <div class="container-fluid">
            <div class="card">
                    <div class="card-content"><div class="mt-3 flex justify-center" wire:loading>
                        <p>Processing...</p>
                        {{-- <img src="{{ asset('public/dash/images/loader.gif') }}" /> --}}
                    </div>
                    <form wire:loading.remove id="create-room-form" class="needs-validation" validate enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-validation">
                                    <div class="row">
                                        <div class="col-xl-12 col-xxl-12 col-lg-12"> 
                                            <div class="p-2 row">
                                                <label class="col-lg-12 col-form-label" for="validationCustom01">Country
                                                    <span class="text-danger">*</span>
                                                </label>
                                                @include('livewire.dashboard.__partials.countries.countries')
                                                <div class="invalid-feedback">
                                                    Please select a one.
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-xl-6 mt-2 p-6">                                             
                                            <div class="p-2 row">
                                                <label class="col-lg-6 col-form-label" for="validationCustom01">First Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control input-default" id="validationCustom01" wire:model.defer="fname">
                                                <div class="invalid-feedback">
                                                    First Name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt-2 p-6">                                             
                                            <div class="p-2 row">
                                                <label class="col-lg-6 col-form-label" for="validationCustom01">Last Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input value="{{ $user->lname }}" type="text" class="form-control input-default" id="validationCustom01" wire:model.defer="lname">
                                                <div class="invalid-feedback">
                                                    Last Name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-xxl-6 col-lg-6 mt-2 p-6">                                             
                                            <div class="p-2 row">
                                                <label class="col-lg-6 col-form-label" for="validationCustom01">Email
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input value="{{ $user->email }}" type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="email">
                                                <div class="invalid-feedback">
                                                    ex. name@email.com
                                                </div>
                                            </div> 
                                            <input type="hidden" name="team_id" value="{{ auth()->user()->currentTeam->id }}">
                                            <div class="p-2 row">
                                                <label class="col-lg-6 col-form-label" for="validationCustom01">
                                                    Gender
                                                </label>
                                                <select type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="gender">
                                                    @if ($user->guests === null)
                                                    <option value="{{ $user->agents->email }}">{{ $user->agents->email }}</option>
                                                    @else
                                                    <option value="{{ $user->guests->email }}">{{ $user->guests->email }}</option>
                                                    @endif
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="p-2 row">
                                                <label class="col-lg-6 col-form-label" for="validationCustom01">Phone Number
                                                </label>
                                                @if ($user->guests === null)
                                                <input value="{{ $user->agents->phone_number }}" type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="phone_number">
                                                @else
                                                <input value="{{ $user->guests->phone_number }}" type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="phone_number">
                                                @endif
                                                <div class="invalid-feedback">
                                                    Please enter the total number of Adults to occupy the room.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt-2 p-6"> 
                                            <div class="p-2 row">
                                                <label class="col-lg-6 col-form-label" for="validationCustom01">ID Type
                                                    <span class="text-danger">*</span>
                                                </label>
                                                
                                                <select type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="id_type">                                                    
                                                    @if ($user->guests === null)
                                                        <option value="{{ $user->agents->id_type }}">{{ $user->agents->id_type }}</option>
                                                    @else
                                                        <option value="{{ $user->guests->id_type }}">{{ $user->guests->id_type }}</option>
                                                    @endif
                                                    <option value="Passport">Passport</option>
                                                    <option value="National Identity Card (NRC)">National Registration Card (NRC)</option>
                                                    <option value="Driver's License">Driver's License</option>
                                                    <option value="National Identity Card">National Identity Card</option>
                                                    <option value="Social Security Card">Social Security Card</option>
                                                    <option value="Voter ID Card">Voter ID Card</option>
                                                    <option value="Resident Permit Card">Resident Permit Card</option>
                                                    <option value="Military ID Card">Military ID Card</option>
                                                    <option value="Health Insurance Card">Health Insurance Card</option>
                                                    <option value="Tax Identification Number (TIN) Card">Tax Identification Number (TIN) Card</option>
                                                    <option value="Refugee ID Card">Refugee ID Card</option>
                                                    <option value="Professional License Card">Professional License Card</option>
                                                    <option value="Student ID Card">Student ID Card</option>
                                                </select>
                                            </div>
                                            <div class="p-2 row">
                                                <label class="col-lg-6 col-form-label" for="validationCustom01">ID Number
                                                    <span class="text-danger">*</span>
                                                </label>
                                                @if ($user->guests === null)
                                                <input value="{{ $user->agents->id_number }}" type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="id_number">
                                                @else
                                                <input value="{{ $user->guests->id_number }}" type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="id_number">
                                                @endif
                                                <div class="invalid-feedback">
                                                    Please enter the total number of Adults to occupy the room.
                                                </div>
                                            </div>
                                            <div class="p-2 row">
                                                <label class="col-lg-6 col-form-label" for="validationCustom01">Occupation
                                                    <span class="text-danger">*</span>
                                                </label>
                                                @if ($user->guests === null)
                                                <input value="{{ $user->agents->occupation }}" type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="occupation">
                                                @else
                                                <input value="{{ $user->guests->occupation }}" type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="occupation">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button> --}}
                            <button type="button" wire:click="updateUser()" data-bs-dismiss="modal" class="btn btn-primary" >Save Changes</button>
                        </div>  
                    </form>
                </div>
            </div>
    </div>
</div>
