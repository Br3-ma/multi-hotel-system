<x-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('New Hotel Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new team to collaborate with others on projects.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-label value="{{ __('Super Administrator') }}" />

            <div class="row items-center mt-2">
                <img class="col-xl-1" style="border-radius: 100%" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">

                <div class="col-xl-9" style="margin-top:1%">
                    <div class="text-gray-900">{{ $this->user->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $this->user->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Hotel Name') }}" />
            <x-input id="name" type="text" wire:model.defer="state.name" autofocus />
            <x-input-error for="name" class="mt-2" />
            
            <x-label for="type" value="{{ __('Hotel Type') }}" />
            <select id="type" type="text" class="form-control" wire:model.defer="state.type" autofocus>
                <option value="">--Select--</option>
                <option value="classic">Classic</option>
                <option value="urban">Urban</option>
            </select>
            <x-input-error for="name" class="mt-2" />
            
            <x-label for="rating" value="{{ __('Hotel Rating') }}" />
            <select id="rating" type="text" class="form-control" wire:model.defer="state.rating" autofocus>
                <option value="">--Select--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <x-input-error for="name" class="mt-2" />
            
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input id="address" type="text" wire:model.defer="state.address" autofocus />
            <x-input-error for="address" class="mt-2" />
            
            <x-label for="email" value="{{ __('Support Email') }}" />
            <x-input id="email" type="text" wire:model.defer="state.email" autofocus />
            <x-input-error for="email" class="mt-2" />
            
            <x-label for="phone" value="{{ __('Contact Phone') }}" />
            <x-input id="phone" type="text" wire:model.defer="state.phone" autofocus />
            <x-input-error for="phone" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Create') }}
        </x-button>
    </x-slot>
</x-form-section>
