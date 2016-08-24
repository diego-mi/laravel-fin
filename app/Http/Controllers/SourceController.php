<?php

namespace App\Http\Controllers;

use App\Source;
use App\TypeOperation;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class SourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::orderBy('id')->paginate(10);
        return view('sources.index')->withSources($sources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeoperations = TypeOperation::all();
        return view('sources.create')->withTypeoperations($typeoperations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save a new category and then redirect back to index
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));

        $source = new Source;

        $source->title = $request->input('title');
        $source->value_initial = $request->input('value_initial');
        $source->value = $request->input('value_initial');
        $source->type_operation_id = $request->input('type_operation_id');
        $source->save();

        Session::flash('success', 'New Source has been created');

        return redirect()->route('origem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $source = Source::find($id);
        return view('sources.show')->withSource($source);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeoperations = TypeOperation::all();

        $arrTypeoperations = array();
        foreach ($typeoperations as $typeoperation) {
            $arrTypeoperations[$typeoperation->id] = $typeoperation->title;
        }

        $source = Source::find($id);

        return view('sources.edit')->withSource($source)->withTypeoperations($arrTypeoperations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Save a new category and then redirect back to index
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));

        $source = Source::find($id);

        $source->title = $request->input('title');
        $source->type_operation_id = $request->input('type_operation_id');
        $source->save();

        Session::flash('success', 'New Source has been edited');

        return redirect()->route('origem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $source = Source::find($id);

        $source->delete();

        Session::flash('success', 'The category was successfully deleted.');
        return redirect()->route('origem.index');
    }
}
