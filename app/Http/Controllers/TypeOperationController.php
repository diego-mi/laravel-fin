<?php

namespace App\Http\Controllers;

use App\TypeOperation;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class TypeOperationController extends Controller
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
        $typeoperations = TypeOperation::orderBy('id')->paginate(10);
        return view('type_operations.index')->withTypeoperations($typeoperations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_operations.create');
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

        $typeoperation = new TypeOperation;

        $typeoperation->title = $request->title;
        $typeoperation->save();

        Session::flash('success', 'New TypeOperation has been created');

        return redirect()->route('tipo-operacao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeoperation = TypeOperation::find($id);
        return view('type_operations.show')->withTypeoperation($typeoperation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeoperation = TypeOperation::find($id);
        return view('type_operations.edit')->withTypeoperation($typeoperation);
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

        $typeoperation = TypeOperation::find($id);

        $typeoperation->title = $request->title;
        $typeoperation->save();

        Session::flash('success', 'New TypeOperation has been edited');

        return redirect()->route('tipo-operacao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeoperation = TypeOperation::find($id);

        $typeoperation->delete();

        Session::flash('success', 'The tipo de operacao was successfully deleted.');
        return redirect()->route('tipo-operacao.index');
    }
}
