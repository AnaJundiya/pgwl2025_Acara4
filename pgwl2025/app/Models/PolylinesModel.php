<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolylinesModel extends Model
{
    protected $table = 'polylines';

    protected $guarded = ['id'];

    public function geojson_polylines()

    {
        $polylines = $this
        ->select(columns: DB::raw('polylines.id, st_asgeojson(geom) as geom, polylines.name, polylines.image, polylines.description, st_length(geom, true) as length_m,
        st_length(geom, true)/1000 as length_km, polylines.created_at, polylines.updated_at, polylines.user_id, users.name as user_created'))
        ->leftJoin('users', 'polylines.user_id', '=', 'users.id')
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' =>[],
        ];

        foreach ($polylines as $polyline) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polyline->geom),
                'properties' => [
                    'id' => $polyline->id,
                    'name' => $polyline->name,
                    'description' => $polyline->description,
                    'image' => $polyline->image,
                    'length_m' => $polyline->length_m,
                    'length_km' => $polyline->length_km,
                    'created_at' => $polyline->created_at,
                    'updated_at' => $polyline->updated_at,
                    'user_id' => $polyline->user_id,
                    'user_created' => $polyline->user_created,
                ],
            ];

            array_push($geojson['features'],$feature);
        }
            return $geojson;
        }
    public function geojson_polyline($id)

    {
        $polylines = $this
        ->select(columns: DB::raw('id, st_asgeojson(geom) as geom, name, image, description, st_length(geom, true) as length_m,
        st_length(geom, true)/1000 as length_km, created_at, updated_at'))
        ->where('id' , $id)
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' =>[],
        ];

        foreach ($polylines as $polyline) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polyline->geom),
                'properties' => [
                    'id' => $polyline->id,
                    'name' => $polyline->name,
                    'description' => $polyline->description,
                    'image' => $polyline->image,
                    'length_m' => $polyline->length_m,
                    'length_km' => $polyline->length_km,
                    'created_at' => $polyline->created_at,
                    'updated_at' => $polyline->updated_at,
                ],
            ];

            array_push($geojson['features'],$feature);
        }
            return $geojson;
        }

}
