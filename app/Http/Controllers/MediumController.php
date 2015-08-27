<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medium;
use App\MediumType;
//use App\Format;
use Storage;
use File;
use Image;

class MediumController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        //$mediums = Medium::all();
        $mediums = Medium::orderBy('title', 'ASC')->get();
        //return $mediums; JSON return
        return view('medium.index', compact('mediums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $types = MediumType::lists('title','id');
        return view('medium.create')->with('types',$types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required'
        ]);
        $input = $request->all();
       //$input->type_id = 1;

        $medium = Medium::create($input);

        \Session::flash('flash_message', trans('messages.create_success'));

        //return redirect()->back();
        //$medium = $input;
        //dd($medium);
        return redirect()->route('medium.edit', [$medium->id]);
       // return view('medium.show/$medium->slug',compact('medium'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        //$medium = Medium::findOrFail($id);
        $medium = Medium::findBySlug($slug);
        $medium->type = MediumType::find($medium->type_id);
        //$medium->formats = $medium->formats;
        $medium->issues = $medium->issues;
        return view('medium.show',compact('medium'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $medium = Medium::findOrFail($id);
        $types = MediumType::lists('title','id');
        return view('medium.edit',compact('medium','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
        $medium = Medium::findOrFail($id);

        $this->validate($request, [
            'title' => 'required'
        ]);

        $filename = "";
        if($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getFilename().'.'.$extension;
            //$fileresized = Image::make($request->file('file'))->resize(300, 200);
            //$fileresized->save();
           //Storage::disk('local')->put($filename ,  File::get($fileresized));
            Image::make($request->file('file'))->fit(300, 401)->save(
                base_path() . '/public/uploads/'.$filename
            );
            /* $request->file('file')->move(
                base_path() . '/public/uploads/', $filename
            );*/
/*$fileresized->move(
                base_path() . '/public/uploads/', $filename
            );*/
            $request->merge(array('cover' => $filename));
         }
        /*$entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;
 */
       // $entry->save();
        //$request->input('yodel', $filename);
        
        $input = $request->all(); 
        //$input->cover = $filename;
        //dd($input);
        //$input->cover = $cover;

        $medium->fill($input)->save();

        \Session::flash('flash_message', trans('messages.create_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $medium = Medium::findOrFail($id);
        $image = $medium->cover;
        if(File::isFile(public_path().'/uploads/'.$image)) {
            File::delete(public_path().'/uploads/'.$image);
        }
        $medium->delete();
        \Session::flash('flash_message', 'Task successfully deleted!');
        return redirect()->route('medium.index');
    }
}
