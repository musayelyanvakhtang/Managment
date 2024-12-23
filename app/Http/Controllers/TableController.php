<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Services\TableService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreTableRequest;

/**
 * @OA\Info(
 *     title="Cafe Management API",
 *     version="1.0.0",
 *     description="API documentation for cafe management."
 * )
 *
 * @OA\Server(
 *     url="http://localhost/api/tables",
 *     description="Local server"
 * )
 */
class TableController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     *
     * @OA\Get(
     *      path="api/tables",
     *      tags={"Tables"},
     *      summary="Retrieve a list of tables",
     *      description="Show tables and their statuses",
     *      @OA\Response(
     *          response=200,
     *          description="Successfuly retrieved list of tables",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="status", type="boolean", example="true"),
     *                  @OA\Property(property="campacity", type="string", example="8"),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error"
     *      )
     *  )
     */
    public function index()
    {
        $dataTables = $this->tableService->getAllTables();

        return response()->view("tables", compact('dataTables'),
            Response::HTTP_OK);
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
     *     path="api/tables",
     *     tags={"Tables"},
     *     summary="Creates a new table",
     *     description="Creates a new table in the system.",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Table details",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="capacity", type="integer", example=4)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Table created successfully",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function store(StoreTableRequest $request)
    {
        $data = $request->validated();
        try {
            $table = $this->tableService->createNewTable($data);
            return response()->json([
                'data' => $table],
                Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Table creating process failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }
}
