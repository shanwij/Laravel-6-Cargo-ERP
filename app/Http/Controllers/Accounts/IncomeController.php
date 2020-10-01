<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Income;

use PDF;
use DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.incomes.index')->with('incomes', Income::paginate(10)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'details'=>'required',
            'amount'=>'required|integer'
        ]);

        $income = new Income([
            'date' => $request->get('date'),
            'details' => $request->get('details'),
            'amount'=> $request->get('amount')
        ]);
        $income->save();
        return redirect()->route('accounts.incomes.index')->with('success','The entry has been stored.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income = Income::find($id);
        return view('accounts.incomes.edit', compact('income'));  
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
        $request->validate([
            'date'=>'required',
            'details'=>'required',
            'amount'=>'required|integer'
        ]);

        $income = Income::find($id);
        $income->date =  $request->get('date');
        $income->details = $request->get('details');
        $income->amount = $request->get('amount');
        $income->save();

        return redirect()->route('accounts.incomes.index')->with('success','The entry has been updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income = Income::find($id);
        $income->delete();

        return redirect()->route('accounts.incomes.index')->with('success','Data has been deleted.'); 
    }

    function get_income_data()
    {
        $income_data = DB::table('incomes')->limit(10)->get();

        return $income_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_income_data_to_html());
        return $pdf->stream();
    }

    function convert_income_data_to_html()
    {
        $income_data = $this->get_income_data(); 
        $output ='
            <h3 align="center">Incomes Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                <th style="border: 1px solid; padding:12px;" width="10%">Date</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Details</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Amount</th>
            </tr>
            
            ';  
            
            foreach($income_data as $income_data)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$income_data->date.'</td>
                <td style="border: 1px solid; padding:12px;">'.$income_data->details.'</td>
                <td style="border: 1px solid; padding:12px;">'.$income_data->amount.'</td>
            
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
