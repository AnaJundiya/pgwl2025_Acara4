<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolygonModel extends Model
{
    protected $table = 'polygon';

    protected $guarded = ['id'];

    public function geojson_polygon()
    {
        $polygon = $this
            ->select(columns: DB::raw('polygon.id, st_asgeojson(geom) as geom, polygon.name, polygon.image, polygon.description, st_area(geom, true) as luas_m2,
            st_area (geom, true)/1000000 as luas_km2, st_area(geom, true)/10000 as luas_hektar, polygon.created_at, polygon.updated_at, polygon.user_id, users.name as user_created'))
            ->leftJoin('users', 'polygon.user_id', '=', 'users.id')
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygon as $polygon) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polygon->geom),
                'properties' => [
                    'id' => $polygon->id,
                    'name' => $polygon->name,
                    'description' => $polygon->description,
                    'image' => $polygon->image,
                    'luas_m2' => $polygon->luas_m2,
                    'luas_km2' => $polygon->luas_km2,
                    'luas_hektar' => $polygon->luas_hektar,
                    'created_at' => $polygon->created_at,
                    'updated_at' => $polygon->updated_at,
                    'user_id' => $polygon->user_id,
                    'user_created' => $polygon->user_created,
                ],
            ];

            array_push($geojson['features'], $feature);
        }
        return $geojson;
    }
    public function geojson_polygons($id)
    {
        $polygon = $this
            ->select(columns: DB::raw('id, st_asgeojson(geom) as geom, name, image, description, st_area(geom, true) as luas_m2,
            st_area (geom, true)/1000000 as luas_km2, st_area(geom, true)/10000 as luas_hektar, created_at, updated_at'))
            ->where('id' , $id)
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygon as $polygon) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polygon->geom),
                'properties' => [
                    'id' => $polygon->id,
                    'name' => $polygon->name,
                    'description' => $polygon->description,
                    'image' => $polygon->image,
                    'luas_m2' => $polygon->luas_m2,
                    'luas_km2' => $polygon->luas_km2,
                    'luas_hektar' => $polygon->luas_hektar,
                    'created_at' => $polygon->created_at,
                    'updated_at' => $polygon->updated_at,
                ],
            ];

            array_push($geojson['features'], $feature);
        }
        return $geojson;
    }
}
