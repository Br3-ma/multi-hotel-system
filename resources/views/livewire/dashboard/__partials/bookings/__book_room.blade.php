<div wire:ignore.self class="modal fade create-booking-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Record New Booking</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal">
                    x
                </button>
            </div>
            <form id="create-room-form" action="{{ route('create-room') }}" class="needs-validation" validate enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="form-validation">
                            <div class="row">
                                <div class="col-xl-12 col-xxl-12 col-lg-12"> 
                                    <div class="mb-3 p-2 row">
                                        <label class="col-lg-12 col-form-label" for="validationCustom01">Room Number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select wire:model="book_room_id" class="default-select wide form-control" id="validationCustom05">
                                            @forelse($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->id.'Room# '.$room->room_number.' | '.$room->floor }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a one.
                                        </div>
                                    </div> 
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" wire:click="makeBooking()" data-bs-dismiss="modal" class="btn btn-primary" >Save changes</button>
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