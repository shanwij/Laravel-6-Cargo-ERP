<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;

use PDF;
use DB;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.payments.index')->with('payments', Payment::paginate(10)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.payments.create');
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

        $payment = new Payment([
            'date' => $request->get('date'),
            'details' => $request->get('desc'),
            'amount'=> $request->get('payment')
        ]);
        $payment->save();
        return redirect()->route('accounts.payments.index')->with('success','Payment has been stored.'); 
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
        $payment = Payment::find($id);
        return view('accounts.payments.edit', compact('payment'));  
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

        $payment = Payment::find($id);
        $payment->date =  $request->get('date');
        $payment->details = $request->get('details');
        $payment->amount = $request->get('amount');
        $payment->save();

        return redirect()->route('accounts.payments.index')->with('success','Payment has been updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        return redirect()->route('accounts.payments.index')->with('success','Payment has been deleted.'); 
    }

    function get_payment_data()
    {
        $payment_data = DB::table('payments')->limit(10)->get();

        return $payment_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_payment_data_to_html());
        return $pdf->stream();
    }

    function convert_payment_data_to_html()
    {
        $payment_data = $this->get_payment_data(); 
        $output ='
            <h3 align="center">Loans Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                <th style="border: 1px solid; padding:12px;" width="10%">Date</th>
                <th style="border: 1px solid; padding:12px;" width="50%">Description</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Amount</th>
               
            </tr>
            
            ';  
            
            foreach($payment_data as $payment_data)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$payment_data->date.'</td>
                <td style="border: 1px solid; padding:12px;">'.$payment_data->details.'</td>
                <td style="border: 1px solid; padding:12px;">'.$payment_data->amount.'</td>
        
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
