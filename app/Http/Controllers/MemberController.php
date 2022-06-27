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

        return response()->json([$member],201);
    }

    public function getAllmembers()
    {
        $member = Member::get()->toJson(JSON_PRETTY_PRINT);
        return response($member,200);
    }

    public function getMember($id)
    {
        // メンバーが存在しているか確認
        if (Member::where('id',$id)->whereNull('deleted_at')
        ->exists()) {
            $member = Member::find($id)->toJson(JSON_PRETTY_PRINT);
            return response($member,200);
        } else {
            return response()->json([
                "message" => "not founde"
            ],404);
        }
    }

    public function update(Request $request)
    {
        //メンバーが存在しているか確認
        if (Member::where('id',$request->id)->whereNull('deleted_at')
        ->exists()){
            // 見つけて変数に代入
            $member = Member::find($request->id);
            // 更新
            DB::transaction(function () use($request,$member){
                $member->name    = $request->name;
                $member->gender  = $request->gender;
                $member->age     = $request->age;
                $member->address = $request->address;
                $member->tel     = $request->tel;

                $member->save();
            });
            return response()->json([
                "message" => "update done",
                "data" =>$member
            ],200);
        } else {
            return response()->json([
                "message" => "not found"
            ],404);
        }
    }

    public function delete($id)
    {
        // 存在しているか確認
        if (Member::where('id',$id)->whereNull('deleted_at')
        ->exists()){
            $member = Member::find($id);
            $member->delete();
            return response()->json([
                "message" => "deleted"
            ],202);
        } else {
            return response()->json([
                "message" => "not found"
            ],404);
        }

    }
}
