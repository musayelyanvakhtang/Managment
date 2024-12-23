<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookingService;
use App\Services\TestSingleton;


class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(TestSingleton $singleton)
    {
        $initialValue = $singleton->getTestConfig();

        $singleton->incrementTestConfig();

        $updatedValue = $singleton->getTestConfig();
        $newSingleton = $singleton->incrementTestConfig();
        return response()->json([
            'initial_value' => $initialValue,
            'updated_value' => $updatedValue,
            'new_value' => $newSingleton,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/api/booking",
     *     tags={"Bookings"},
     *     summary="To book a table",
     *     description="To book a table in the system",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Booking details",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="table_id",type="integer",example=10),
     *             @OA\Property (property="customer_name",type="string",example="Jhon"),
     *             @OA\Property (property="booking_time",type="date",example="2026-10-12"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Table booked successfully.",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Table booking process failed",
     *     )
     * )
     */
    public function store(StoreBookingRequest $request)
    {
        $data = $request->validated();
        try {
            $this->bookingService->store($data);
            return response()->json([
                'message' => 'Table booked successfully'],
                Response::HTTP_CREATED);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Table booking process failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
