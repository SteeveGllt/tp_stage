<?php

namespace App\Http\Controllers;

use App\Photo;
use Image;
use Illuminate\Http\Request;
use Validator;
use Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tab = Photo::all();
        return view('photo/listPhoto', compact('tab'));
    }
    public function list()
    {
        $test = Photo::all();
        return view('photo/galeriephoto', compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo/uploadphoto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->only('profile_image');
    $file = $postData['profile_image'];

    // Build the input for validation
    $fileArray = array('image' => $file);

    // Tell the validator that this file should be an image
    $rules = array(
      'image' => 'mimes:jpeg,jpg,gif|required|max:10000' // max 10000kb
    );
     // Now pass the input and rules into the validator
     $validator = Validator::make($fileArray, $rules);
    // Check to see if validation fails or passes
    if ($validator->fails())
    {
          // Redirect or return json to frontend with a helpful message to inform the user 
          // that the provided file was not an adequate type
         
          //return response()->json(['error' => $validator->errors()->getMessages()], 400);
          return redirect('photo/create')->with('error', "Non non non.");

    } 
    else{

    
        if($request->hasFile('profile_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $time = time();
            //filename to store
            $filenametostore = $filename.'_'.$time.'.'.$extension;
     
            //small thumbnail name
            $smallthumbnail = 'small_'.$filenametostore;
     
            //medium thumbnail name
            $mediumthumbnail = 'medium_'.$filenametostore;
     
            //large thumbnail name
            $largethumbnail = 'large_'.$filenametostore;
     
            //Upload File
            $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
            $request->file('profile_image')->storeAs('public/profile_images/thumbnail', $smallthumbnail);
            $request->file('profile_image')->storeAs('public/profile_images/thumbnail', $mediumthumbnail);
            $request->file('profile_image')->storeAs('public/profile_images/thumbnail', $largethumbnail);
      
            //create small thumbnail
            $smallthumbnailpath = public_path('storage/profile_images/thumbnail/'.$smallthumbnail);
            $this->createThumbnail($smallthumbnailpath, 150, 93);
     
            //create medium thumbnail
            $mediumthumbnailpath = public_path('storage/profile_images/thumbnail/'.$mediumthumbnail);
            $this->createThumbnail($mediumthumbnailpath, 300, 185);
     
            //create large thumbnail
            $largethumbnailpath = public_path('storage/profile_images/thumbnail/'.$largethumbnail);
            $this->createThumbnail($largethumbnailpath, 550, 340);

            $p = new Photo;
            $p->titre = $request->input('titre');
            $p->chemin = $filenametostore;
            $p->save();
      
            return redirect('photo/create')->with('success', "Image uploaded successfully.");
        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo, Request $request)
    {
        $p = Photo::find($photo->id); 
        
        Storage::delete('public/profile_images/'.$p->chemin);
        Storage::delete('public/profile_images/thumbnail/small_'.$p->chemin);
        Storage::delete('public/profile_images/thumbnail/medium_'.$p->chemin);
        Storage::delete('public/profile_images/thumbnail/large_'.$p->chemin);
        $request->session()->flash('success','Photo supprimée');
        $p->delete();
      //  return redirect()->route('photo.index');

       
      
            
 
    }


    public function createThumbnail($path, $width, $height)
{
    $img = Image::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->save($path);
}
}
