<?php

namespace App\Services;

use App\Repositories\BookingRepository;

class BookingService
{
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function store(array $data)
    {
        $this->bookingRepository->createNewBooking($data);
    }


}
