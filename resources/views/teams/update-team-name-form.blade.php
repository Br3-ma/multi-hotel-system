<x-form-section submit="updateTeamName">
    <div class="row items-center">
        <div class="col-xl-4">
            <x-slot name="title">
                {{ $team->name }} Profile
            </x-slot>
            <x-slot name="description">
                {{ __('The Lodge\'s name and owner information.') }}
            </x-slot>
        </div>
    
        <div class="col-xl-6">
            <x-slot name="form">
                <!-- Team Owner Information -->
                {{-- <span class="col-xl-3">
                    <x-label value="{{ __('Hotel Owner') }}" />
        
                    <div class="row items-center">
                        <img class="col-xl-3" src="{{ $team->owner->profile_photo_url }}" alt="{{ $team->owner->name }}">
        
                        <div class="col-xl-9">
                            <div class="text-gray-900">{{ $team->owner->name }}</div>
                            <div class="text-gray-700 text-sm">{{ $team->owner->email }}</div>
                        </div>
                    </div>
                </span> --}}
        
                <!-- Team Name -->
                <span class="row">
                    <div class="col-lg-6 col-xl-6">
                        <x-label for="name" value="{{ __('Hotel Name') }}" />
                        <x-input id="name"
                                    type="text"
                                    wire:model.defer="state.name"
                                    :disabled="! Gate::check('update', $team)" />
                    </div>
                           
                    <div class="col-lg-6 col-xl-6">     
                        <x-label for="type" value="{{ __('Hotel Type') }}" />
                        <select id="type" class="form-control"
                                    type="text"
                                    wire:model.defer="state.type"
                                    :disabled="! Gate::check('update', $team)" />
                                <option value="">--Select--</option>
                                <option value="classic">Classic</option>
                                <option value="urban">Urban</option>
                        </select>
                    </div>
                    
                           
                    <div class="col-lg-6 col-xl-6">  
                        <x-label for="rating" value="{{ __('Rating') }}" />
                        <select id="rating" class="form-control"
                                    type="text"
                                    wire:model.defer="state.rating"
                                    :disabled="! Gate::check('update', $team)" />
                                <option value="">--Select--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                        </select>
                    </div>
                           
                    <div class="col-lg-6 col-xl-6"> 
                        <x-label for="address" value="{{ __('Address') }}" />
                        <x-input id="address"
                                type="text"
                                wire:model.defer="state.address"
                                :disabled="! Gate::check('update', $team)" />
 
                    </div>
        
                           
                    <div class="col-lg-6 col-xl-6"> 
                        <x-label for="email" value="{{ __('Support Email') }}" />
                        <x-input id="email"
                                    type="text"
                                wire:model.defer="state.email"
                                :disabled="! Gate::check('update', $team)" />
                    </div> 
                           
                    <div class="col-lg-6 col-xl-6">        
                        <x-label for="phone" value="{{ __('Contact Phone') }}" />
                        <x-input id="phone"
                                    type="text"
                                    wire:model.defer="state.phone"
                                    :disabled="! Gate::check('update', $team)" />
                                                                                    
                        <x-input-error for="name" class="mt-2" />
                    </div>
                </span>
            </x-slot>
        
            @if (Gate::check('update', $team))
                <x-slot name="actions">
                    <x-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-action-message>
        
                    <x-button>
                        {{ __('Save Profile') }}
                    </x-button>
                </x-slot>
            @endif
        </div>
    </div>
</x-form-section>
