<?php

namespace App\Http\Controllers;

use App\Http\Requests\Laptop\LaptopStormRequest;
use App\Http\Requests\Laptop\LaptopUpdateRequest;
use App\Http\Resources\Laptop\LaptopShowResorce;
use App\Models\Laptop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaptopController extends Controller
{
    public function Storm(LaptopStormRequest $laptopStormRequest)
    {
        Laptop::create($laptopStormRequest->all());

        return response()->json([
            "message"=>"اطلاعات لپ تاپ ذخیره شد",
            "deta"=>new LaptopShowResorce($laptopStormRequest)
        ],200);

    }

    public function Show($id)
    {
        $laptop = Laptop::find($id);
        if ($laptop==null)
        {
            return response()->json([
                "message"=>"لپ تاپ با این ایدی وجود ندارد"
            ],403);
        }
        else{
            return response()->json([
                "massage"=>"لپ تاپ مورد نظر",
                "date" => new LaptopShowResorce($laptop)
            ],200);
        }

    }

    public function ShowAll()
    {
        $laptops = DB::table('Users')->simplePaginate(2);
        if ($laptops==null)
        {
            return response()->json([
                "message"=>"متاسفانه لپ تاپی موجود نمیباشد"
            ],403);
        }
        else{
            return response()->json([
                "massage"=>"لیست لپ تاپ ها",
                "date" => LaptopShowResorce::collection($laptops)
            ],200);
        }

    }

    public function Update(LaptopStormRequest $laptopStormRequest,Laptop $laptop)
    {
        $laptop->update($laptopStormRequest->all());
        return response()->json([
            "message"=>"به روز رسانی با موفقیت انجام شد",
            "date"=> new LaptopUpdateRequest($laptop)
        ],200);

    }

    public function delete($id)
    {
        $laptop = Laptop::find($id);
        if ($laptop==null){
            return response()->json([
                "massage"=>"لپ تاپی با این ایدی وجود ندارد",
            ],403);
        }
        else
        {
            $laptop->delete();
            return response()->json([
                "massage"=>"لپ تاپ حذف شد",

            ],200);
        }

    }
}
