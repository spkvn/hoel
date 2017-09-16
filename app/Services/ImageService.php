<?php 
namespace App\Services;

use App\Room;
use App\RoomImage; 

class ImageService
{
	public static function upload($file)
	{

		$dir = storage_path().'/uploads/RoomImgs/';
		$filename = substr(sha1(time()), 0,6).$file->getClientOriginalName();

		$contents = file_get_contents($file->getRealPath());
		$success = file_put_contents($dir.$filename, $contents);
		$roomImage = new RoomImage();
		
		return $success;
	}
}