<?php

namespace App\Http\Controllers;

use App\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index", ["logs" => Logs::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("upload");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "messier_object" => ["bail", "string",
                Rule::in($this->generateMessierObjects())],
            "telescope_type" => ["string",
                Rule::in(["refractor", "reflector"])],
            "aperture" => ["integer", "gte:1"],
            "focal_length" => ["integer", "gte:1"],
            "camera" => "string",
            "no_of images" => ["integer", "gte:1"],
            "exposure_time" => ["numeric", "gte:0"],
            "location" => "string",
            "date" => ["date", "before_or_equal:" . date("Y-m-d")],
            "image" => "image"
        ]);
        if ($validator->fails()) {
            //TODO: add error messages for user
            return redirect("/");
        }
        //TODO: add user handling
        $log = new Logs();
        $log->username = $_SERVER["REMOTE_USER"];
        $log->messier_object = $request->messier_object;
        $log->telescope_type = $request->telescope_type;
        $log->aperture = $request->aperture;
        $log->focal_length = $request->focal_length;
        $log->camera = $request->camera;
        $log->no_of_images = $request->no_of_images;
        $log->exposure_time = $request->exposure_time;
        $log->location = $request->location;
        $log->date = $request->date;
        $log->image = time() . "." . $request->image->getClientOriginalExtension();
        $request->image->move(public_path("images"), $log->image);
        $log->save();
        return redirect("/personal")->with("upload", "true");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generateMessierObjects()
    {
        $objects = [];
        for ($i = 1; $i <= 110; $i++) {
            $objects[] = "M" . $i;
        }
        return $objects;
    }
}
