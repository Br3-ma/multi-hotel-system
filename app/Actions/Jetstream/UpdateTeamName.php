<?php

namespace App\Actions\Jetstream;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\UpdatesTeamNames;

class UpdateTeamName implements UpdatesTeamNames
{
    /**
     * Validate and update the given team's name.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, Team $team, array $input): void
    {
        
        Gate::forUser($user)->authorize('update', $team);

        try {
            
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
            ])->validateWithBag('updateTeamName');

            $team->forceFill([
                'name' => $input['name'],
                'address' => $input['address'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'type' => $input['type'],
                'rating' => $input['rating'],
                // 'cover_image' => $input['cover_image'],
                // 'cover_image2' => $input['cover_image2'],
            ])->save();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
