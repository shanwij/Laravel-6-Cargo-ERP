<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loan;

use PDF;
use DB;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.loans.index')->with('loans', Loan::paginate(10)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.loans.create');
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
            'amount'=>'required|integer',
            'bank'=>'required',
            'due_date'=>'required',
            'status'=>'required'
        ]);

        $loan = new Loan([
            'date' => $request->get('date'),
            'details' => $request->get('details'),
            'amount' => $request->get('amount'),
            'bank' => $request->get('bank'),
            'due_date' => $request->get('due_date'),
            'status' => $request->get('status')
        ]);
        $loan->save();
        return redirect()->route('accounts.loans.index')->with('success','Loan has been stored.'); 
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
        $loan = Loan::find($id);
        return view('accounts.loans.edit', compact('loan'));  
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
            'amount'=>'required|integer',
            'bank'=>'required',
            'due_date'=>'required',
            'status'=>'required'
        ]);

        $loan = Loan::find($id);
        $loan->date =  $request->get('date');
        $loan->details =  $request->get('details');
        $loan->amount =  $request->get('amount');
        $loan->bank = $request->get('bank');
        $loan->due_date = $request->get('due_date');
        $loan->status = $request->get('status');
        $loan->save();

        return redirect()->route('accounts.loans.index')->with('success','Loan has been updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = Loan::find($id);
        $loan->delete();

        return redirect()->route('accounts.loans.index')->with('success','Loan has been deleted.'); 
    }

    function get_loans_data()
    {
        $loans_data = DB::table('loans')->limit(10)->get();

        return $loans_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_loans_data_to_html());
        return $pdf->stream();
    }

    function convert_loans_data_to_html()
    {
        $loans_data = $this->get_loans_data(); 
        $output ='
            <h3 align="center">Loans Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                <th style="border: 1px solid; padding:12px;" width="10%">Date</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Details</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Amount</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Bank</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Due Date</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Status</th>
                
            </tr>
            
            ';  
            
            foreach($loans_data as $loans_data)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$loans_data->date.'</td>
                <td style="border: 1px solid; padding:12px;">'.$loans_data->details.'</td>
                <td style="border: 1px solid; padding:12px;">'.$loans_data->amount.'</td>
                <td style="border: 1px solid; padding:12px;">'.$loans_data->bank.'</td>
                <td style="border: 1px solid; padding:12px;">'.$loans_data->due_date.'</td>
                <td style="border: 1px solid; padding:12px;">'.$loans_data->status.'</td>
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
