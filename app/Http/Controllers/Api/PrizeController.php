<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SpinService;
use App\Models\Prize;

class PrizeController extends Controller
{
    public function index()
    {
        return response()->json(Prize::all());
    }

    public function spin()
    {
        $spinService = new SpinService();
        return response()->json($spinService->spin());
    }
}
