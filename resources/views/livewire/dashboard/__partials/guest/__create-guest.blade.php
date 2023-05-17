<div wire:ignore.self class="modal fade create-guest-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add Guest</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal">
                    x
                </button>
            </div>
            <form id="create-room-form" class="needs-validation" validate enctype="multipart/form-data">
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
                                        <input type="text" class="form-control input-default" id="validationCustom01" wire:model.defer="fname"  placeholder="" required>
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
                                        <input type="text" class="form-control input-default" id="validationCustom01" wire:model.defer="lname"  placeholder="" required>
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
                                        <input type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="email"  placeholder="" required>
                                        <div class="invalid-feedback">
                                            ex. name@email.com
                                        </div>
                                    </div> 
                                    <input type="hidden" name="team_id" value="{{ auth()->user()->currentTeam->id }}">
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">
                                            Gender
                                        </label>
                                        <select type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="gender"  placeholder="yyyy-mm-dd">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Phone Number
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="phone_number"  placeholder="ex. 260 999 999 999" required>
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
                                        
                                        <select type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="id_type"  placeholder="">
                                            <option value="">--Choose--</option>
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
                                        <input type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="id_number"  placeholder="ex. 9999 9999 9999" required>
                                        <div class="invalid-feedback">
                                            Please enter the total number of Adults to occupy the room.
                                        </div>
                                    </div>
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Occupation
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="occupation"  placeholder="" required>
                                       
                                    </div>
                                    {{-- <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Departing On
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="date form-control" id="validationCustom01" wire:model.defer="checkout_date"  placeholder="yyyy-mm-dd" required>
                                        <div class="invalid-feedback">
                                            Date of checking out
                                        </div>
                                    </div>
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Children
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="validationCustom01"  wire:model.defer="num_children"  placeholder="Total number of children to occupy the room" required>
                                        <div class="invalid-feedback">
                                        Please enter the total number of children to occupy the room.
                                        </div>
                                    </div>   --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="addGuest()" data-bs-dismiss="modal" class="btn btn-primary" >Create Now</button>
                </div>  
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="js/rooms.js"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#room_image_create').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-room').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>   