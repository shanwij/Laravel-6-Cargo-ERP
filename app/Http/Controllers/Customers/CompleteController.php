<?php

namespace App\Http\Controllers\Customers;
use App\Notes;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $taskNotes2 = Notes::where('Task_Status' , 'completed')->get(); 
        $contacts = Contact::all();
    
        return view('customers.completed.index',[
            'taskNotes2' => $taskNotes2,
            'contacts'=> $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all();

        return view('customers.completed.create', compact('contacts'));
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
        $taskNotes2 = Notes::find($id);
        return view('customers.completed.edit', compact('taskNotes2')); 
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
            'Todo_Due_Date'=>'required|date',
            'description'=>'required',
            'Task_Status'=>'required',
            'Task_Update'=>'required',
            'Sales_Rep'=>'required',
        ]);

        $notes = Notes::find($id);
        $notes->description = $request->get('description');
        $notes->Todo_Due_Date  = $request->get('Todo_Due_Date');
        $notes->Task_Status  = $request->get('Task_Status');
        $notes->Task_Update  = $request->get('Task_Update');
        $notes->Sales_Rep = $request->get('Sales_Rep');
        $notes->save();

        return redirect()->route('customers.completed.index')->with('success', 'Task has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notes = Notes::find($id);
        $notes->delete();

        return redirect()->route('customers.completed.index')->with('success', 'Task has been deleted.');
    }

    function get_com_data()
    {
        $com_data = Notes::where('Task_Status' , 'completed')->limit(10)->get();

        return $com_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_com_data_to_html());
        return $pdf->stream();
    }

    function convert_com_data_to_html()
    {
        $com_data = $this->get_com_data(); 
        $output ='
            <h3 align="center">Completed Task Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                <th style="border: 1px solid; padding:12px;">ID</th>
                <th style="border: 1px solid; padding:12px;" >Company</th>
                <th style="border: 1px solid; padding:12px;" >Task</th>
                <th style="border: 1px solid; padding:12px;" >Deadline</th>
                <th style="border: 1px solid; padding:12px;" >Update</th>
                <th style="border: 1px solid; padding:12px;" >Handler</th>
                <th style="border: 1px solid; padding:12px;" >Last Updated</th>
                
            </tr>
            
            ';  
            
            foreach($com_data as $com_data)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$com_data->id.'</td>
                <td style="border: 1px solid; padding:12px;">'.$com_data->contact['Company'].'</td>
                <td style="border: 1px solid; padding:12px;">'.$com_data->description.'</td>
                <td style="border: 1px solid; padding:12px;">'.$com_data->Todo_Due_Date.'</td>
                <td style="border: 1px solid; padding:12px;">'.$com_data->Task_Update.'</td>
                <td style="border: 1px solid; padding:12px;">'.$com_data->Sales_Rep.'</td>
                <td style="border: 1px solid; padding:12px;">'.$com_data->updated_at.'</td>
              
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
