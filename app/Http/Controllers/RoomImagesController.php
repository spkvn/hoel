<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\Services\ImageService;

class RoomImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room)
    {
        $images = $room->images()->get();
        return view('admin.roomimages')
               ->with('room', $room)
               ->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Room $room)
    {
        return view('admin.create.roomimage')
               ->with('room',$room);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Room $room, FileRequest $request)
    {
        if(count($request->messages()) > 0)
        {
            return Response::json('error',400);
        }
        else
        {
            $uploadSuccess = ImageService::upload($request,$room->id);
            if($uploadSuccess != false)
            {
                //uploaded &  saved successfull
                $images = $room->images()->get();
                return view('admin.roomimages')
                       ->with('room', $room)
                       ->with('images', $images);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
