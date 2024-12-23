<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{

    public function createNewBooking($data)
    {
        Booking::create($data);
    }
}
