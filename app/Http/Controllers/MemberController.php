<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use DB;

class MemberController extends Controller
{
    //
    public function memberCreate(Request $request)
    {
        $member = new Member;
        DB::transaction(function () use($request,$member){
            $member->name    = $request->name;
            $member->gender  = $request->gender;
            $member->age     = $request->age;
            $member->address = $request->address;
            $member->tel     = $request->tel;

            $member->save();
        });

        return response()->json($member);
    }

    public function getAllmembers()
    {
        $member = Member::all();
        return response()->json($member);
    }

    public function getMember($id)
    {
        # code...
        $member = Member::find($id);
        return response()->json($member);
    }

    public function update(Request $request)
    {
        // 見つけて変数に代入
        $member = Member::find($request->id);
        // dd($request);

        // 更新
        DB::transaction(function () use($request,$member){
            $member->name    = $request->name;
            $member->gender  = $request->gender;
            $member->age     = $request->age;
            $member->address = $request->address;
            $member->tel     = $request->tel;

            $member->save();
        });

        return response()->json($member);
    }

    public function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        return response()->json();
    }
}
