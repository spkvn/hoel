<?php 
namespace App\Services;

use App\Room;
use App\RoomImage; 

class ImageService
{
	public static function upload($request,$roomid)
	{
		$file = $request->file;
		$dir = public_path().'/uploads/RoomImgs/';
		$filename = substr(sha1(time()), 0,6).$file->getClientOriginalName();

		$contents = file_get_contents($file->getRealPath());
		$success = file_put_contents($dir.$filename, $contents);
		$roomimage = RoomImage::create([
			'room_id' => $roomid,
			'path'	  => '/uploads/RoomImgs/'.$filename,
			'alt' 	  => 'default alt'
		]);
		return $success;
	}
}