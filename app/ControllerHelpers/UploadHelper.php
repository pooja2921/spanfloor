<?php
namespace App\ControllerHelpers;
use Image;
use Storage;
use Carbon\Carbon;
use foduucrm\Models\Blog;

class UploadHelper
{

	// GLOBALY USABLE
	public static function file_upload($file){
        //dd($file);
       	$request = [];
        //$request['type'] = $file->getClientOriginalExtension();
        //return $file->getSize();
	    if($file->getSize() < 1000000){
	        $request['filesize'] = number_format(($file->getSize()/1000), 2, '.', '')."KB";
	    }else{
	        $request['filesize'] = number_format(($file->getSize()/1000000), 2, '.', '')."MB";
	    }
	    //return $request['filesize'] ;
	    $filename = self::renameFileExists(Carbon::now()->year."/".Carbon::now()->month, $file->getClientOriginalName());

	    $pathinfo = pathinfo($filename);
	   	$request['name']=$pathinfo['filename'];

	    //$destinationPathThumbnail = public_path('images'); 
	    //$img->save($destinationPathThumbnail.'/'.$filename);
	    $request['filepath'] = $file->move(public_path('images/upload'), $filename);
	    //$request['user_id'] = auth()->user()->id;

	    return  $filename;
	}

	public static function renameFileExists($filepath, $filename, $i=1)
    {

        $pathinfo = pathinfo($filename);
        $basename = $pathinfo['filename'];

        if( \File::exists(public_path('images/'.$filepath.'/'.$basename.'.'.$pathinfo['extension'])) ){
            $i = (int)$i+1;
            $basename = preg_replace('/-\d+$/', '', $basename).'-'.$i;
            $filename = $basename.'.'.$pathinfo['extension'];
            return self::renameFileExists($filepath, $filename, (int)$i++);

        }
        return $basename.'.'.$pathinfo['extension'];
    }

    



}

?>
