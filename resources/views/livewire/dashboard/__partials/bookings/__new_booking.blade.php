<div wire:ignore.self class="modal fade new-booking-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Record New Booking</h5>
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
                                            Arriving On
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="checkin_date"  placeholder="yyyy-mm-dd" required>
                                        <div class="invalid-feedback">
                                            Please enter a room type name.
                                        </div>
                                    </div>
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Adults
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01"  wire:model.defer="num_adults"  placeholder="Total number of children to occupy the room" required>
                                        <div class="invalid-feedback">
                                            Please enter the total number of Adults to occupy the room.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 mt-2 p-6">                                      
                                    <div class="p-2 row">
                                        <label class="col-lg-12 col-form-label" for="validationCustom01">Room Number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select wire:model="book_room_id" class="default-select wide form-control" id="validationCustom05">
                                            <option value="0">-- Choose --</option>
                                            @forelse($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->id.'Room# '.$room->room_number.' | '.$room->floor }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a one.
                                        </div>
                                    </div> 
                                    <div class="p-2 row">
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
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="makeBooking()" data-bs-dismiss="modal" class="btn btn-primary" >Book Now</button>
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