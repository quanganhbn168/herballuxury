<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('admin.rewards.index', compact('rewards'));
    }

    public function create()
    {
        return view('admin.rewards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'probability' => 'required|integer|min:1'
        ]);

        Reward::create($request->all());
        return redirect()->route('rewards.index')->with('success', 'Thêm phần thưởng thành công!');
    }

    public function edit(Reward $reward)
    {
        return view('admin.rewards.edit', compact('reward'));
    }

    public function update(Request $request, Reward $reward)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'probability' => 'required|integer|min:1'
        ]);

        $reward->update($request->all());
        return redirect()->route('rewards.index')->with('success', 'Cập nhật phần thưởng thành công!');
    }

    public function destroy(Reward $reward)
    {
        $reward->delete();
        return redirect()->route('rewards.index')->with('success', 'Xóa phần thưởng thành công!');
    }
}