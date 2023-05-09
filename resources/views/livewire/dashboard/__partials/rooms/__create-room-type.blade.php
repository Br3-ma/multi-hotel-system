<div wire:ignore class="modal fade create-room-type-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Create Room Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form id="create-room-type-form" action="{{ route('create-room-type') }}" class="needs-validation" validate enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="form-validation">
                            <div class="row">
                                <div class="col-xl-8 col-xxl-8 col-lg-8">
                                    <div class="rounded-md p-0 col-xl-12">
                                        <div class="mx-auto cursor-pointer relative mt-0">
                                            <input type="file" id="room_type_image_create" name="image_path" class=" top-0 left-0"> 
                                        </div>
                                        <div class="h-20 relative image-fit cursor-pointer zoom-in mx-auto">
                                            <img style="width: 30%; border-radius:10px" id="preview-image-room_type" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAMFBMVEXx8/XCy9K/yND09vfw8vTP1tzp7O/i5ure4+fO1dvJ0dfT2d/EzNPt7/Lb4OXo6+4FeM7UAAAFL0lEQVR4nO2c24KrIAxFLdha7///t0dxOlWDSiAKztnrbR4G6SoJBKHZA6zJYncgQeCEAicUOKHACQVOKHBCgRMKnFDghAInFDihwAkFTihwQoETCpxQ4IQCJxQ4ocAJBU4ocEKBEwqcUOCEAicUOKHACQVOKHBCgRMKnFDghAInFDihwAkFTihwQoETCpxQ4IQCJxQ4ocAJBU4ot3Oi1KMq64FnWTVq+EueWzlRquqKVn/J+/ezEfdyHydKPYtc62yF1m1Xymq5ixPVdDnx8eslf1eCVu7hRFXFppAfLW39kNJyByeqOTJirGTvRsbKDZyozsHIpKUQsZK8E1Vu55GTrKTuRL0ZRoyVLviZaTtRVctUMuaVOnCoJO1E1WwjxsorbGZO2Qk7br5WuhApKTvpfZWMy5WAoZKuk6b1NhI4VJJ10uRBSsas0ng+OlUnVaARw9NvqCTqRERJpt9eUtJ0IqPEN36SdNIIKRnIPeafFJ0Ep9c5mr+qTdFJ2CRMpLAn5fScqJeokrFWZkoRdaImwtpw2T9iSnnxuiDoRFXda6hK28JzWTA14ryBxKFlTT9iTlT1W57o3Lta96yED8krRieknCw/DDuEP1TnKBlgzMlCTtZDXr+8pIjOwitK5x7JOKFD3mukiE85ix45S5FxYll46prdiv8ekpsU19wv4kS9LV1ouQPlrPzKliIzTuw9YDYiVfgFSxFx8rR+wcyMomSX9HYpTjlFwonqrB3gBc/JyYQjRcRJYe8Ay4l9rMlLcVi8iTjp7Y/nOBHcMjngWEoi4+TUlcmKw9rnxHzCWMqeU/ltkB9JEZl3SusnYmwQn1fm2GgPeiOzZrM9WZfu/3/BNDznYATLOLENffep+JppeMZBMSZUF9N6ljFM7KF3qpTduBZyQj4W53XTiRsEm1L2dr2k9k9W9Rtjq2BrJj9Zyk7pI7bP9lw8kfH+4KIFLGF77Sa3R90Un0POvHNCcYzsLVMk9+2buni1bd9xjMSJHMPmjCz7zov/fidW5GQ7OS/2e8BoRrLtrBfXScTIMVLsk09cJxEjZ8I6+cR1EmG1tsRaDsZ0EjlyDL0leuxOpulD4JTALtfXORRbnqVO1LDOePdtpoclWPsqulL+wt0P0SNnxFKrrp2opmuXl+5OuHA3PSmByDGQ9ezSydYdM+ELd4YUIsdANnoWTva2RSUv3JlnJRE5I2RbY+6kee1+dTrrhC7cPTZeMUdivZnydaIc3tdqqWuI6USOYZlSfp0oxzVlJxNByUSOYZlSPk6cDzqEXy17JDTn/LBMKRlTSRZ4X2giep2zZnEwZHLiGjifFt6BTtKKHMMspUxO2BkvDzoDm1jkGGa7bsaJx0t9XfgrOfuMlhezwsc48RrKufvhyiXXHatg8T2Zkm0eHzluxO8W4pXHKljkXycBt3h9blFdeqyCx2fPOguLbn6qTWsBu+Czxs/CopsdP4kmkx+mcZ8FRrfuWUqSTSYT005keDucW4iXnzRhMg17iYacC6A0VyZzzIQs0pBrUrn22JoXY4Us0pDjaZMzb+dIMX6/Qi0dHSU0XHySz48heqSaOs60vsvlq2mtpzj9OCh/Trgjew7afgLar63d6ec2SmTZm37+UyV7048K+Gmkm7O10A/8aaSbY7sEr8rYvYoNnX4Sr3EuYJVpVc35Ccu/innZbryMJ1n4v9f4N9FZ39XPZ931GYzMGH9VPHYfAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADp8Q9+nG9anuOrfAAAAABJRU5ErkJggg==">
                                        </div>
                                    </div>
                                </div>  
                                <br/>
                                <div class="col-xl-6 col-xxl-6 col-lg-6 mt-2 p-6">
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" name="name"  placeholder="Enter a Room Type Name.." required>
                                        <div class="invalid-feedback">
                                            Please enter a room type name.
                                        </div>
                                    </div>
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Price
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default" name="price"  placeholder="ZMW" required>
                                        <div class="invalid-feedback">
                                            Please enter the price
                                        </div>
                                    </div>  
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Total Occupancy
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control input-default " id="validationCustom01" name="size"  placeholder="Enter a Number of People" required>
                                        <div class="invalid-feedback">
                                            Please enter the total number of people to occupy the room.
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="team_id" value="{{ auth()->user()->currentTeam->id }}">
                                <div class="col-xl-6 mt-2 p-6">                                             
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Bed Type
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="bed_type" class="default-select">
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
                                    <input type="hidden" name="added_by" value="{{auth()->user()->id}}" />
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom01">Charged
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="per" class="default-select" id="validationCustom05">
                                            <option value="" data-display="Select">Select one</option>
                                            <option value="night">Night</option>
                                            <option value="day">Daily</option>
                                            <option value="month">Monthly</option>
                                            <option value="year">Yearly</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a one.
                                        </div>
                                    </div>  
                                    <div class="p-2 row">
                                        <label class="col-lg-6 col-form-label" for="validationCustom04">Facilities<span
                                                class="text-danger">*</span>
                                        </label>
                                        <textarea name="comments" class="input-default" rows="5" placeholder="Example: AC, Shower, Double Bed, Towel, Bathup, Coffee Set, LED TV, Wifi etc."></textarea>
                                        <div class="invalid-feedback">
                                            Ex. AC, Shower, Double Bed, Towel, Bathtab, Coffee Set, LED TV, Wifi etc.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
        $('#room_type_image_create').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-room_type').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>