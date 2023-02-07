<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetLocationRequest;
use App\Http\Requests\Api\LocationRequest;
use App\Models\Location;
use App\Transformers\LocationTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function get(GetLocationRequest $getLocationRequest){
       $locations =  Location::query();
       if ($getLocationRequest->filled('city')){
           $locations->orWhere('city',$getLocationRequest->get('city'));
       }
       if ($getLocationRequest->filled('query')){
           $locations->orWhere('name','like','%'.$getLocationRequest->get('query').'%');
           $locations->orWhere('state','like','%'.$getLocationRequest->get('query').'%');
           $locations->orWhere('address','like','%'.$getLocationRequest->get('query').'%');
       }
       $locations->where('status','1');
       return fractal($locations->get())->transformWith(new LocationTransformer());
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
            $location->request_ip = $contentRequest->getClientIp();
            $location->google_maps_url = $contentRequest->google_maps_url;
            $location->status = '0';
            if ($location->save()){
                return json_encode([
                    'data' => [
                        'status' => 'success',
                        'message' => 'Konum başarıyla eklendi. Onaylandıktan sonra 1 saat içerisinde eklenecektir.',
                    ]
                ]);
            }else{
                return json_encode([
                    'data' => [
                        'status' => 'error',
                        'message' => 'Konum ekleme sırasında bir hata meydana geldi. Lütfen daha sonra tekrar deneyiniz.',
                    ]
                ]);
            }
    }
}
