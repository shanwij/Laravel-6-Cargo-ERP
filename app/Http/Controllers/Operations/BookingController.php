<?php

namespace App\Http\Controllers\Operations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loading;
use DB; 

class BookingController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operations.bookings.index')->with('loadings', Loading::paginate(10)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operations.bookings.create');
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
            'shipper' => 'required',
            'contactNo' => 'required|min:10|max:10',
            'loadingDate' => 'required',
            'pickupDate' => 'required',
            'loadingAdd' => 'required',
            'loadingNum' => 'required|min:10|max:10',
            'dCompanyName' => 'required',
            'dAddress' => 'required',
            'dPerson' => 'required',
            'dNumber' =>'required|min:10|max:10'
        ]);

        $loading = new Loading([
            'shipper' => $request->get('shipper'),
            'contactNo' => $request->get('contactNo'),
            'loadingDate' => $request->get('loadingDate'),
            'pickupDate' => $request->get('pickupDate'),
            'loadingAdd' => $request->get('loadingAdd'),
            'loadingNum' => $request->get('loadingNum'),
            'dCompanyName' => $request->get('dCompanyName'),
            'dAddress' => $request->get('dAddress'),
            'dPerson' => $request->get('dPerson'),
            'dNumber' => $request->get('dNumber')
        ]);
        $loading->save();
        return redirect()->route('operations.bookings.index')->with('success','Booking has been stored.'); 
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
        $loading = Loading::find($id);
        return view('operations.bookings.load', compact('loading'));  
    }

    public function editvoice($id)
    {
        $loading = Loading::find($id);
        return view('operations.bookings.invoice', compact('loading'));  
    }

    public function editconfirm($id)
    {
        $loading = Loading::find($id);
        return view('operations.bookings.confirmation', compact('loading'));  
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
            'shipper' =>'required',
            'contactNo' =>'required|min:10|max:10',
            'loadingDate' =>'required',
            'pickupDate' =>'required' ,
            'loadingAdd' =>'required',
            'loadingNum' =>'required|min:10|max:10',
            'dCompanyName' =>'required',
            'dAddress' =>'required',
            'dPerson' =>'required',
            'dNumber' =>'required|min:10|max:10'
        ]);

        $loading = Loading::find($id);
        $loading->shipper = $request->get('shipper');
        $loading->contactNo = $request->get('contactNo');
        $loading->loadingDate = $request->get('loadingDate');
        $loading->pickupDate = $request->get('pickupDate');
        $loading->loadingAdd = $request->get('loadingAdd');
        $loading->loadingNum = $request->get('loadingNum');
        $loading->dCompanyName = $request->get('dCompanyName');
        $loading->dAddress = $request->get('dAddress');
        $loading->dPerson = $request->get('dPerson');
        $loading->dNumber = $request->get('dNumber');
        $loading->save();

        return redirect()->route('operations.bookings.index')->with('success','Booking has been updated.'); 
    }

    public function updatevoice(Request $request, $id)
    {
        $request->validate([
            'conName' => 'required',
            'conAddress' => 'required' ,
            'invoiceNo' => 'required|integer',
            'invoiceDate' => 'required' ,
            'conName' => 'required' ,
            'conAddress' => 'required',
            'conPhone' => 'required|min:10|max:10',
            'oceanVess' => 'required' ,
            'oceanDate' => 'required' ,
            'shipPort' => 'required',
            'delPort' => 'required',
            'containerNo' =>'required'
        ]);

        $loading = Loading::find($id);
        $loading->invoiceNo = $request->get('invoiceNo');
        $loading->invoiceDate = $request->get('invoiceDate');
        $loading->conName = $request->get('conName');
        $loading->conAddress = $request->get('conAddress');
        $loading->conPhone = $request->get('conPhone');
        $loading->oceanVess = $request->get('oceanVess');
        $loading->oceanDate = $request->get('oceanDate');
        $loading->shipPort = $request->get('shipPort');
        $loading->delPort = $request->get('delPort');
        $loading->containerNo = $request->get('containerNo');

        $loading->save();

        return redirect()->route('operations.bookings.index')->with('success','Booking has been updated.'); 
    }

    public function updateconfirm(Request $request, $id)
    {
        $request->validate([
            'containerNo'=>'required' ,
            'oceanVess'=>'required',
            'shipper'=>'required',
            'shipper_add'=>'required',
            'conName'=>'required',
            'conAddress'=>'required',
            'qty'=>'required|integer',
            'desc'=>'required',
            'weight'=>'required|integer',
            'cbm'=>'required',
            'oceanDate'=>'required',
            'contactNo' =>'required|min:10|max:10'
        ]);

        $loading = Loading::find($id);
        $loading->containerNo = $request->get('containerNo');
        $loading->oceanVess = $request->get('oceanVess');
        $loading->shipper = $request->get('shipper');
        $loading->shipper_add = $request->get('shipper_add');
        $loading->conName = $request->get('conName');
        $loading->conAddress = $request->get('conAddress');
        $loading->qty = $request->get('qty');
        $loading->desc = $request->get('desc');
        $loading->weight = $request->get('weight');
        $loading->cbm = $request->get('cbm');
        $loading->oceanDate = $request->get('oceanDate');
        $loading->contactNo = $request->get('contactNo');
        $loading->save();

        return redirect()->route('operations.bookings.index')->with('success','Booking has been updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loading = Loading::find($id);
        $loading->delete();

        return redirect()->route('operations.bookings.index')->with('success','Booking has been deleted.'); 
    }

    /**
     * 
     * 
     * 
     * EXPORT FUNCTIONS 
     * 
     * 
     *
     **/

    function get_n_data()
    {
        $n_data = DB::table('loadings')->limit(10)->get();

        return $n_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_n_data_to_html());
        return $pdf->stream();
    }

    function convert_n_data_to_html()
    {
        $n_data = $this->get_n_data(); 
        $output ='
            <h3 align="center">Booking Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                <th style="border: 1px solid; padding:12px;" width="10%">Booking ID</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Shipper</th>
                <th style="border: 1px solid; padding:12px;" width="50%">Contact No.</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Loading Date</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Pickup Date</th>
            </tr>
            
            ';  
            
            foreach($n_data as $n_data_indi)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->id.'</td>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->shipper.'</td>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->contactNo.'</td>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->loadingDate.'</td>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->pickupDate.'</td>
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
