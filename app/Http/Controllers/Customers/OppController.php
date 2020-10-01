<?php

namespace App\Http\Controllers\Customers;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class OppController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $oppContact = Contact::where('Status', 'opportunities')->get();
        return view('customers.opportunities.index',[
            'oppContact' => $oppContact,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.opportunities.detailAdd');
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
            'Contact_First'=>'required|String',
            'Contact_Last'=>'required|String',
            'Phone'=>'required|size:10',
            'Email'=>'required|email',
            'Date_of_Initial_Contact'=>'required|date',
            'Contact_Title',
            'Title',
            'Company'=>'required',
            'Address'=>'required',
            'Address_Street_1'=>'required',
            'Address_City'=>'required',
            'Address_State'=>'required',
            'Address_Zip'=>'required',
            'Address_Country'=>'required',
            'Status'=>'required',
            'Sales_Rep'=>'required',
            'Project_Type'=>'required',
            'Project_Description'=>'required',
            'Proposal_Due_Date'=>'required',
            'Budget',
            

        ]);

        $contact = new Contact([
            'Contact_First' => $request->get('Contact_First'),
            'Contact_Last' => $request->get('Contact_Last'),
            'Email' => $request->get('Email'),
            'Phone' => $request->get('Phone'),
            'Contact_Title' => $request->get('Contact_Title'),
            'Date_of_Initial_Contact' => $request->get('Date_of_Initial_Contact'),
            'Title' => $request->get('Title'),
            'Company' => $request->get('Company'),
            'Address' => $request->get('Address'),
            'Address_Street_1' => $request->get('Address_Street_1'),
            'Address_City' => $request->get('Address_City'),
            'Address_State' => $request->get('Address_State'),
            'Address_Zip' => $request->get('Address_Zip'),
            'Address_Country' => $request->get('Address_Country'),
            'Status' => $request->get('Status'),
            'Sales_Rep' => $request->get('Sales_Rep'),
            'Project_Type' => $request->get('Project_Type'),
            'Project_Description' => $request->get('Project_Description'),
            'Proposal_Due_Date' => $request->get('Proposal_Due_Date'),
            'Budget' => $request->get('Budget')
        ]);
        $contact->save();
        return redirect()->route('customers.opportunities.index')->with('success', 'Contact saved!');


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
        $oppContact = Contact::find($id);
        return view('customers.opportunities.edit', compact('oppContact'));      
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
            'Contact_First'=>'required|String',
            'Contact_Last'=>'required|String',
            'Phone'=>'required|size:10',
            'Email'=>'required|email',
            'Company'=>'required',
            'Status'=>'required',
            'Project_Type'=>'required',
            'Project_Description'=>'required',
        ]);

        $contact = Contact::find($id);
        $contact->Contact_First =  $request->get('Contact_First');
        $contact->Contact_Last = $request->get('Contact_Last');
        $contact->Phone = $request->get('Phone');
        $contact->Email = $request->get('Email');
        $contact->Contact_Title = $request->get('Contact_Title');
        $contact->Title = $request->get('Title');
        $contact->Company = $request->get('Company');
        $contact->Status = $request->get('Status');
        $contact->Project_Type = $request->get('Project_Type');
        $contact->Project_Description = $request->get('Project_Description');
        $contact->Budget = $request->get('Budget');
        $contact->save();

        return redirect()->route('customers.opportunities.index')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('customers.opportunities.index')->with('success', 'Contact deleted!');
    }

    function get_opp_data()
    {
        $opp_data = Contact::where('Status', 'opportunities')->limit(10)->get();

        return $opp_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_opp_data_to_html());
        return $pdf->stream();
    }

    function convert_opp_data_to_html()
    {
        $opp_data = $this->get_opp_data(); 
        $output ='
            <h3 align="center">Opportunity Data</h3>
            <div class="table-responsive">
            <table width="100%" style="border-collapse: collapse; border: 0px;" aligh:"left";>
            
            <tr>
                <th style="border: 1px solid; padding:12px;">Company</th>
                <th style="border: 1px solid; padding:12px;" >Topic</th>
                <th style="border: 1px solid; padding:12px;" >Contact Person</th>
                <th style="border: 1px solid; padding:12px;" >Handler</th>
                <th style="border: 1px solid; padding:12px;" >Phone Number</th>
                <th style="border: 1px solid; padding:12px;" >Email</th>
                <th style="border: 1px solid; padding:12px;" >Quotation Date</th>
               
            </tr>
            
            ';  
            
            foreach($opp_data as $opp_data)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$opp_data->Company.'</td>
                <td style="border: 1px solid; padding:12px;">'.$opp_data->Project_Type.'</td>
                <td style="border: 1px solid; padding:12px;">'.$opp_data->Contact_First.'</td>
                <td style="border: 1px solid; padding:12px;">'.$opp_data->Sales_Rep.'</td>
                <td style="border: 1px solid; padding:12px;">'.$opp_data->Phone.'</td>
                <td style="border: 1px solid; padding:12px;">'.$opp_data->Email.'</td>
                <td style="border: 1px solid; padding:12px;">'.$opp_data->Proposal_Due_Date.'</td>
               
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
   
}
