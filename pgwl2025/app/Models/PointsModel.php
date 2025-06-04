<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PointsModel extends Model
{
    protected $table = 'points';

    protected $guarded = ['id'];

    public function geojson_points()

    {
        $points = $this
            ->select(DB::raw('points.id, st_asgeojson(geom) as geom, points.name,
            points.description, points.image, points.created_at, points.updated_at, points.user_id, users.name as user_created'))
            ->leftJoin('users', 'points.user_id', '=', 'users.id')
            ->get(); //mengambil data dari database sek ini tadi aku ga make points.

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($points as $point) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($point->geom),
                'properties' => [
                    'id' => $point->id,
                    'name' => $point->name,
                    'description' => $point->description,
                    'image' => $point->image,
                    'created_at' => $point->created_at,
                    'updated_at' => $point->updated_at,
                    'user_id' => $point->user_id,
                    'user_created' => $point->user_created,
                ],
            ];

            array_push($geojson['features'], $feature);
        }
        return $geojson;
    }


    public function geojson_point($id)

    {
        $points = $this
            ->select(DB::raw('id, st_asgeojson(geom) as geom, name, image, description, created_at,
    updated_at, user_id'))
            ->where('id', $id)
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($points as $point) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($point->geom),
                'properties' => [
                    'id' => $point->id,
                    'name' => $point->name,
                    'description' => $point->description,
                    'image' => $point->image,
                    'created_at' => $point->created_at,
                    'updated_at' => $point->updated_at,
                    'user_id' => $point->user_id,
                ],
            ];

            array_push($geojson['features'], $feature);
        }
        return $geojson;
    }
}
