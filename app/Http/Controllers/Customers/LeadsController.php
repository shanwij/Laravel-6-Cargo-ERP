<?php

namespace App\Http\Controllers\Customers;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadsController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leadsContact = Contact::where('Status', 'leads')->get();
        return view('customers.leads.index',[
            'leadsContact' => $leadsContact,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $leadsContact = Contact::find($id);
        return view('customers.leads.edit', compact('leadsContact'));     
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

        return redirect()->route('customers.leads.index')->with('success', 'Contact updated!');
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

        return redirect()->route('customers.leads.index')->with('success', 'Contact deleted!');
    }

    function get_leads_data()
    {
        $leads_data = Contact::where('Status', 'leads')->limit(10)->get();

        return $leads_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_leads_data_to_html());
        return $pdf->stream();
    }

    function convert_leads_data_to_html()
    {
        $leads_data = $this->get_leads_data(); 
        $output ='
            <h3 align="center">Leads Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                <th style="border: 1px solid; padding:12px;">Company</th>
                <th style="border: 1px solid; padding:12px;" >Topic</th>
                <th style="border: 1px solid; padding:12px;" >Contact Person</th>
                <th style="border: 1px solid; padding:12px;" >Handler</th>
                <th style="border: 1px solid; padding:12px;" >Phone Number</th>
                <th style="border: 1px solid; padding:12px;" >Email</th>
                <th style="border: 1px solid; padding:12px;" >Initial Date</th>
                
               
            </tr>
            
            ';  
            
            foreach($leads_data as $leads_data)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$leads_data->Company.'</td>
                <td style="border: 1px solid; padding:12px;">'.$leads_data->Project_Type.'</td>
                <td style="border: 1px solid; padding:12px;">'.$leads_data->Contact_First.' '.$leads_data->Contact_Last.'</td>
                <td style="border: 1px solid; padding:12px;">'.$leads_data->Sales_Rep.'</td>
                <td style="border: 1px solid; padding:12px;">'.$leads_data->Phone.'</td>
                <td style="border: 1px solid; padding:12px;">'.$leads_data->Email.'</td>
                <td style="border: 1px solid; padding:12px;">'.$leads_data->Date_of_Initial_Contact.'</td>
               
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
