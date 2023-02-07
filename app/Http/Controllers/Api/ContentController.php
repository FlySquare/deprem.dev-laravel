<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LocationRequest;
use App\Models\Location;
use App\Transformers\LocationTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function get(){
       $locations =  Location::all();
       return fractal($locations)->transformWith(new LocationTransformer());
    }

    public function find($id){
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:locations,id'
        ]);
        if ($validate->fails()){
            return json_encode([
                'data' => [
                    'status' => 'error',
                    'message' => 'Location not found',
                ]
            ]);
        }
        $location = Location::find($id);
        return fractal($location)->transformWith(new LocationTransformer());
    }

    public function store(\App\Http\Requests\Api\ContentRequest $contentRequest){
       $location = new Location();
         $location->name = $contentRequest->name;
            $location->address = $contentRequest->address;
            $location->city = $contentRequest->city;
            $location->state = $contentRequest->state;
            $location->phone = $contentRequest->phone;
            $location->google_maps_url = $contentRequest->google_maps_url;
            if ($location->save()){
                return json_encode([
                    'data' => [
                        'status' => 'success',
                        'message' => 'Location created successfully',
                    ]
                ]);
            }else{
                return json_encode([
                    'data' => [
                        'status' => 'error',
                        'message' => 'Location could not be created',
                    ]
                ]);
            }
    }
}
