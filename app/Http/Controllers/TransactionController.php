<?php

namespace App\Http\Controllers;

use App\Category;
use App\Source;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Session;

class TransactionController extends Controller
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
        $transactions = Transaction::orderBy('id')->paginate(10);
        return view('transactions.index')->withTransactions($transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = Source::all();
        $categories = Category::all();

        return view('transactions.create')->withSources($sources)->withCategories($categories);
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'value' => 'required',
            'purchase_at' => 'required',
            'payment_at' => 'required',
            'category_id' => 'required',
            'source_id' => 'required',
        ));

        $source = new Transaction;

        $source->title = $request->input('title');
        $source->description = $request->input('description');
        $source->value = $request->input('value');
        $source->purchase_at = $request->input('purchase_at');
        $source->payment_at = $request->input('payment_at');
        $source->category_id = $request->input('category_id');
        $source->source_id = $request->input('source_id');
        $source->user_id = Auth::id();
        $source->save();

        Session::flash('success', 'New Transaction has been created');

        return redirect()->route('transacao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $source = Transaction::find($id);
        return view('transactions.show')->withTransaction($source);
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

        $source = Transaction::find($id);

        return view('transactions.edit')->withTransaction($source)->withTypeoperations($arrTypeoperations);
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

        $source = Transaction::find($id);

        $source->title = $request->input('title');
        $source->type_operation_id = $request->input('type_operation_id');
        $source->save();

        Session::flash('success', 'New Transaction has been edited');

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
        $source = Transaction::find($id);

        $source->delete();

        Session::flash('success', 'The category was successfully deleted.');
        return redirect()->route('origem.index');
    }
}
