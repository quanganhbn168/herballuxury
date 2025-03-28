<?php
namespace App\Services;

use App\Models\Prize;

class SpinService
{
    public function spin()
    {
        $prizes = Prize::all();
        $totalProbability = $prizes->sum('probability');
        $random = mt_rand(0, $totalProbability * 100) / 100;

        $current = 0;
        foreach ($prizes as $prize) {
            $current += $prize->probability;
            if ($random <= $current) {
                return $prize;
            }
        }
        return $prizes->first(); // Fallback
    }
}