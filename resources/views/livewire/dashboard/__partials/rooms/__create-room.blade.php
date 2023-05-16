<div wire:ignore.self class="modal fade create-room-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Create Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form id="create-room-form" action="{{ route('create-room') }}" class="needs-validation" validate enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="form-validation">
                            <div class="row">
                                <div class="col-xl-8 col-xxl-8 col-lg-8">
                                    <div class=" rounded-md p-0">
                                        <div class="h-20 relative image-fit cursor-pointer zoom-in mx-auto">
                                            <img style="width: 30%; border-radius:10px" class="col-12" alt="" id="preview-image-room" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fdevelopers.elementor.com%2Fdocs%2Fhooks%2Fplaceholder-image%2F&psig=AOvVaw1D_jfnBOgOPsPKTsGEWftF&ust=1679948068450000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCOjKutW0-v0CFQAAAAAdAAAAABAE">
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <input type="file" id="room_image_create" name="image_path" class="w-full h-full top-0 left-0"> 
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-xl-6 col-xxl-6 col-lg-6 mt-2 p-6">
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Room Type
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="room_types_id" class="default-select" id="validationCustom05">
                                            <option value="" data-display="Select">Select one</option>
                                            @forelse($room_types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a one.
                                        </div>
                                    </div>  
                                    <input type="hidden" name="team_id" value="{{ auth()->user()->currentTeam->id }}">
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Room Number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01" name="room_number"  placeholder="Enter a Room Type Name.." required>
                                        <div class="invalid-feedback">
                                            Please enter a room type name.
                                        </div>
                                    </div>
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Room Floor
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01" name="floor"  placeholder="The floor on which the room is located." required>
                                        <div class="invalid-feedback">
                                            Please enter the total number of people to occupy the room.
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-6 mt-2 p-6">                                             
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Bed Type
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="bed_type" class="default-select" id="validationCustom05">
                                            <option value="" data-display="Select">Select One</option>
                                            <option value="Double Bed">Double Bed</option>
                                            <option value="Queen Bed">Queen Bed</option>
                                            <option value="Twin Bed">Twin Bed</option>
                                            <option value="Double & Twin Beds">Double & Twin Beds</option>
                                            <option value="Queen & Twin Beds">Queen & Twin Beds</option>
                                            <option value="Queen & Double Beds">Queen & Double Beds</option>
                                            <option value="Queen, Double & Twin Beds">Queen, Double & Twin Beds</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="modified_by" value="{{auth()->user()->id}}" /> 
                                    <input type="hidden" name="is_available" value="1" /> 
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Occupancy
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01" name="occupancy"  placeholder="Total number of people" required>
                                        <div class="invalid-feedback">
                                            Please enter the total number of people to occupy the room.
                                        </div>
                                    </div>
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Number of Adults
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01" name="num_adult"  placeholder="Total number of adults" required>
                                        <div class="invalid-feedback">
                                        Please enter the total number of people to occupy the room.
                                        </div>
                                    </div>  
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Number of Children
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" id="validationCustom01" name="num_children"  placeholder="Total number of children" required>
                                        <div class="invalid-feedback">
                                            Please enter the total number of people to occupy the room.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary light" >Save changes</button>
                </div>  
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/rooms.js') }}"></script>
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