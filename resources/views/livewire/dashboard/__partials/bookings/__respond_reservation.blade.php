<div wire:ignore.self class="modal fade" id="respondToReservation">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Respond to Reservation</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="w-full">
                    <div class="basic-form">
                        <div class="mb-3">
                            <textarea placeholder="Enter your message response..." class="form-control" wire:model.defer='message' rows="10" id="comment">

                            </textarea>
                        </div>
                        
                        <div class="mb-3 mb-0 px-2">
                            <input type="radio" id="age1" name="age" value="Room is available" wire:model.defer="optresp">
                            <label for="age1">Room is available</label><br>
                            <input type="radio" id="age2" name="age" value="Unfortunately all rooms currently booked" wire:model.defer="optresp">
                            <label for="age2">Room is NOT available</label><br>  
                            {{-- <label for="one" class="radio-inline me-3">
                                <input id="one" name="one" type="radio" value="Room is available" wire:model.defer="optresp"> Room is available
                            </label>

                            <label for="two" class="radio-inline me-3">
                                <input id="two" name="two" type="radio" value="Unfortunately all rooms currently booked" wire:model.defer="optresp"> Room is NOT available
                            </label> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.defer='sendResponse()' data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>