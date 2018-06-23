<?php

namespace App\Http\Controllers;

use App\Core\Models\Post;
use App\Core\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Auth::user()->routes()->get();
        $results = [];
        foreach ($routes as $route) {
            array_push($results, $route->id);
        }

        return view('profile.routes', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = new Route;
        $route->user_id = Auth::user()->id;

        $route->places = serialize(json_decode($request->data, true));
        $route->save();

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'Charset'      => 'utf-8',
        ];

        return response()->json('Ok!', 200, $header);
    }

    public function places($id)
    {
        $route = Auth::user()->routes()->where('id', $id)->first();
        $places = unserialize($route->places);
        $markers = Post::find($places);

        $place = collect();

        foreach ($markers as $marker) {
            $place->push([
                'id'          => $marker->id,
                'slug'        => $marker->slug,
                'type'        => $marker->type,
                'display'     => $marker->getBehaviorObject()->display(),
                'image'       => $marker->hero('medium'),
                'description' => str_strip_limit_words($marker->getContent('body'), 200),
                'name'        => $marker->getContent('name'),
                'place'       => $marker->getContent('place'),
            ]);
        }

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'Charset'      => 'utf-8',
        ];

        $response = response()->json($place, 200, $header, JSON_UNESCAPED_UNICODE);

        return $response;
    }

    public function show($id)
    {
        return view('profile.route', compact('id'));
    }

    public function delete(Request $request)
    {
        Auth::user()->routes()->where('id', $request->id)->delete();

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'Charset'      => 'utf-8',
        ];

        return response()->json('Deleted!', 200, $header);
    }
}
