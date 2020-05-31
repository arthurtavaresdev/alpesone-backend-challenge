<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use Exception;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{

    public $root_url;


    public function index(Request $request)
    {

        $params = ['sku', 'name', 'modelDate', 'mileage', 'price', 'fuelType'];


        $this->validate($request, [
            "sku" => "max:255",
            "name" => "max:255",
            "modelDate" => "max:255",
            "mileage" => "max:255",
            "price" => "max:255",
            "fuelType" => "max:255",
            "priceMin" => 'numeric  |min:0|not_in:0',
            "priceMax" => 'numeric  |min:0|not_in:0',
        ]);

        if (isset($request->priceMin) && !isset($request->priceMax)) {

            return response()->json([
                "error" =>  "The price min field is required when price max is not present.",
            ], 422);
        } elseif (!isset($request->priceMin) && isset($request->priceMax)) {
            return response()->json([
                "error" =>  "The price max field is required when price min is not present.",
            ], 422);
        }

        if (!count($request->all())) {
            $cars = DB::table('cars')->select($params)->get();
        } else {
            $responseParams = $request->all();
            try {

                $cars = Cars::query();
                foreach ($responseParams as $key => $param) {
                    if (in_array($key, ['priceMin', 'priceMax'])) continue;

                    $cars->where($key, 'LIKE', '%' . $param . '%');
                }

                if (isset($request->priceMin)) $cars->whereBetween('price', [$request->priceMin, $request->priceMax]);

                $cars = $cars->select($params)->distinct()->get();
            } catch (Exception $e) {
                report($e);
                return response()->json(['error' => 'Invalid parameter'], 400);
            }
        }



        return response()->json($cars);
    }

    public function show($sku)
    {
        return response()->json(Cars::find($sku));
    }
}
