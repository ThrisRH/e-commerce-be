<?php

namespace App\Containers\OrderSection\Order\UI\API\Controllers;

use App\Containers\OrderSection\Order\Actions\OrderItems\GetOrderItemsAction;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetOrderItemsAction $action)
    {
        $items = $action->run();

        return ApiResponse::success($items);
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
    public function store(Request $request)
    {
        //
    }
}
