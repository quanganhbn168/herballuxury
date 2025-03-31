<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class WheelController extends Controller
{
    public function index()
    {
        // Lấy danh sách phần thưởng từ cơ sở dữ liệu
        $rewards = Reward::all();
        return view('wheel', compact('rewards'));
    }

    // API để lấy phần thưởng ngẫu nhiên khi quay
    public function spin()
    {
        $rewards = Reward::all();
        if ($rewards->isEmpty()) {
            return response()->json(['error' => 'No rewards available'], 400);
        }

        // Tính toán xác suất (nếu bạn muốn dùng probability)
        $totalProbability = $rewards->sum('probability');
        $random = rand(1, $totalProbability);
        $current = 0;

        foreach ($rewards as $reward) {
            $current += $reward->probability;
            if ($random <= $current) {
                return response()->json(['reward' => $reward->name]);
            }
        }

        // Nếu không chọn được, trả về phần thưởng cuối cùng
        return response()->json(['reward' => $rewards->last()->name]);
    }
}