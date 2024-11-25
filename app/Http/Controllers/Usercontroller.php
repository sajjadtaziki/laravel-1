<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckotpRequest;
use App\Http\Requests\OtpCodeRequest;
use App\Http\Requests\User\UserReques;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserOtpResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserShowResource;
use App\Http\Resources\User\UserUpdateResource;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//use http\Client\Curl\User;


class UserController extends Controller
{
//Storm
    public function Storm(UserReques $userRequest)
    {

        $user=User::create($userRequest->all());
        if ($userRequest->hasFile('picture'))
        {
            $pictureUrl=Storage::putFile('/User',$userRequest->picture);
            $user->update([
                'Url_Picture'=>$pictureUrl
            ]);
        }
        return response()->json([
            "message" => "کاربر با موفقیت ثبت شد",
            "deta" => new UserShowResource($user)
        ],200);
    }

//Show
    public function Show($id)
    {

        $User = User::find($id);
        if ($User == null){
            return response()->json([
                "message"=>"کاربر یافت نشد",
            ],403);
        }
        else{
            return response()->json([
                "message"=>"کاربر مورد نظر",
                "deta"=> new UserShowResource($User)
            ],200);
        }
    }
//ShowAll
    public function ShowAll()
    {
        $Users = DB::table('Users')->simplePaginate(1);
        if ($Users==null)
        {
            return response()->json([
                "message"=>"متاسفانه کاربری موجود نیست",
            ],403);
        }
        else{
            return response()->json([
                "massage"=>"لیست کاربران",
                "deta"=>UserShowResource::collection($Users)
            ]);
        }
    }

    public function update(UserUpdateRequest $userUpdateRequest , User $user)
    {
        $user->update($userUpdateRequest->all());

        return response()->json([
            "message"=>"اطلاعات به روز رسانی شود",
            "deta"=>new UserUpdateResource($user)
        ],200);
    }

    public function delete($id)
    {
        $User = User::find($id);
        if ($User==null)
        {
            return response()->json([
                "message"=>"کاربری وجود ندارد"
            ]);
        }
        else
        {
            $User->delete();
            return response()->json([
                "massage"=>"کاربر حذف شد"
            ]);
        }

    }
    //chkUser
    public function ChkUser(OtpCodeRequest $otpCodeRequest)
    {

     $user = User::Where('Phone',$otpCodeRequest->Phone)->first();
        if ($user)
        {
            $user_Otp=Otp::create([
                'Code'=>mt_rand(0000,9999),
                'Phone'=>$user->Phone
            ]);
            return response()->json([
                "massage"=>'کاربر با موفقیت یافت و کد احراز هویت ارسال شد',
                "deta"=>new UserOtpResource($user)
            ],200);

        }
        else{
            return response()->json([
                "massage"=>'کاربر یافت نشد '
            ],318);
        }
    }
    //checkCode
    public function CheckOtp(CheckotpRequest $checkotpRequest)
    {
        $chek_exist_otp=Otp::where('Phone',$checkotpRequest->Phone)->where('Code',$checkotpRequest->Code)->first();
        if ($chek_exist_otp)
        {
        $chek_exist_otp->delete();
        $user = User::where('Phone',$checkotpRequest->Phone)->first();
        $token = $user->createToken ('loge _'.$user->name);
        return response()->json([
            "massage"=>'داشبودر',
            "deta"=> new UserResource($user),
            "token"=>$token->plainTextToken
        ]);
        }
        else
        {
            return response()->json([
                "massage"=>'کد احراز هویت اشتباه است '
            ]);
        }

    }




}
