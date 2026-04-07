<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\OrderSection\Order\Models\Order;
use App\Ship\Enums\OrderStatus;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetWeeklyRevenueTask extends Task
{
    public function run(): Collection
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $revenue = Order::query()
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('status', '!=', OrderStatus::Cancelled->value)
            ->select([
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_amount) as total_revenue')
            ])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Ensure all days of the week are present with 0 if no revenue
        $days = [];
        for ($date = $startOfWeek->copy(); $date->lte($endOfWeek); $date->addDay()) {
            $formattedDate = $date->toDateString();
            $dayRevenue = $revenue->firstWhere('date', $formattedDate);
            
            $days[] = [
                'date' => $formattedDate,
                'day_name' => $date->format('l'), // e.g. Monday, Tuesday
                'revenue' => $dayRevenue ? (int) $dayRevenue->total_revenue : 0
            ];
        }

        return collect($days);
    }
}
