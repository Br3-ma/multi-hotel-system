<?php

use App\Http\Controllers\Api\RoomsController;
use App\Http\Livewire\Admin\Hotels\ManageHotelView;
use App\Http\Livewire\Dashboard\AgentView;
use App\Http\Livewire\Dashboard\BookingCalendarView;
use App\Http\Livewire\Dashboard\BookingInquiringView;
use App\Http\Livewire\Dashboard\BookingManageView;
use App\Http\Livewire\Dashboard\EditRoomTypeView;
use App\Http\Livewire\Dashboard\EditUserView;
use App\Http\Livewire\Dashboard\GuestInfoView;
use App\Http\Livewire\Dashboard\GuestView;
use App\Http\Livewire\Dashboard\IndexView;
use App\Http\Livewire\Dashboard\ReservationView;
use App\Http\Livewire\Dashboard\RoomManageView;
use App\Http\Livewire\Dashboard\RoomTypeManageView;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', IndexView::class)->name('dashboard');
    Route::get('/hotel-settings', ManageHotelView::class)->name('manage-hotels');
    
    Route::get('/rooms', RoomManageView::class)->name('manage-rooms');
    Route::get('/room-types', RoomTypeManageView::class)->name('manage-room-types');



    Route::get('/reservations', ReservationView::class)->name('reservations');
    Route::get('/bookings', BookingManageView::class)->name('bookings');
    Route::get('/calendar-and-bookings', BookingCalendarView::class)->name('calendar');
    Route::get('/booking-inquiries', BookingInquiringView::class)->name('inquiries');


    
    Route::post('/create-room-type', [RoomsController::class, 'createRoomType'])->name('create-room-type');    
    Route::post('/update-room-type', [RoomsController::class, 'editRoomType'])->name('update-room-type');    
    Route::get('/edit-room-type/{id}', EditRoomTypeView::class)->name('edit-room-type');    
    Route::get('/delete-room-type/{id}', [RoomsController::class, 'deleteRoomType'])->name('delete-room-type');    
    Route::get('/delete-room/{id}', [RoomsController::class, 'deleteRoom'])->name('delete-room');    
    Route::post('/create-room', [RoomsController::class, 'createRoom'])->name('create-room');
     
    Route::get('/guests', GuestView::class)->name('guests');
    Route::get('/agents', AgentView::class)->name('agents');
    Route::get('/guest-information/{id}', GuestInfoView::class)->name('guest-info');
    Route::get('/edit-details/{id}', EditUserView::class)->name('edit-user');

});
