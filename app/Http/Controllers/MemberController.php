<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    //
    public function memberCreate(Request $request)
    {
        $member = Member::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'address' => $request->address,
            'tel' => $request->tel,
        ]);

        return response()->json($member);
    }

    public function getMember(Request $request)
    {
        # code...
        $member = Member::finde($request->id);
        return response()->json($member);
    }

    public function update(Request $request)
    {
        // 見つけて変数に代入
        $member = Member::find($request->id);

        // 更新
        $member->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'address' => $request->address,
            'tel' => $request->tel,
        ]);

        return response()->json($member);
    }

    public function delete(Request $request)
    {
        $member = Member::find($request->id);
        $member->delete();
        return response()->json();
    }
}