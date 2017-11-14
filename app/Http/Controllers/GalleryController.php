<?php

namespace App\Http\Controllers;

use Auth;
use App\Gallery;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{		

	public function index(){

	  return Gallery::all();
	}


     public function store(Request $request)
    {
        $gallery = new Gallery();

        

        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->imageUrl = $request->input('imageUrl');
        $gallery->user_id =Auth::user()->id;

        $gallery->save();
       
        return $gallery;
    }


    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->imageUrl = $request->input('imageUrl');
        $gallery->user_id = Auth::user()->id;
        $gallery->save();
       
        return $gallery;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();

        return new JsonResponse(true);
    }

 		public function show($id)
    {
        return Gallery::find($id);
        dd('joj');
    }


}
