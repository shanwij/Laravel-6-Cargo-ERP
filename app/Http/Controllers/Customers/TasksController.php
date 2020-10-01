<?php

namespace App\Http\Controllers\Customers;
use App\Notes;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $taskNotes = Notes::where('Task_Status', 'pending')->get();
        // $taskNotes2 = Notes::where('Task_Status' , 'completed')->get(); 
        $contacts = Contact::all();
        return view('customers.tasks.index',[
            'taskNotes' => $taskNotes,
            'contacts'=> $contacts,
        ]);
        // return view('customers.tasks.completed.taskComplete',[
        //     'taskNotes2' => $taskNotes2,
        //     'contacts'=> $contacts,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all();

        return view('customers.tasks.create', compact('contacts'));
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
            'Todo_Due_Date'=>'required|date',
            'description'=>'required',
            'cus_id'=>'required',
            'Task_Status'=>'required',
            'Task_Update'=>'required',
            'Sales_Rep'=>'required',
        ]);

        $notes = new Notes([
            'description' => $request->get('description'),
            'Todo_Due_Date' => $request->get('Todo_Due_Date'),
            'Task_Status' => $request->get('Task_Status'),
            'Task_Update' => $request->get('Task_Update'),
            'Sales_Rep' => $request->get('Sales_Rep'),
            'cus_id' => $request->get('cus_id'),
        ]);

        $notes->save();
        return redirect()->route('customers.tasks.index')->with('success', 'Task has been created.');
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
        $taskNotes = Notes::find($id);
        return view('customers.tasks.edit', compact('taskNotes')); 
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

        return redirect()->route('customers.tasks.index')->with('success', 'Task has been updated.');
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

        return redirect()->route('customers.tasks.index')->with('success', 'Task has been deleted.');
    }

    function get_pending_data()
    {
        $pending_data = Notes::where('Task_Status', 'pending')->limit(10)->get();

        return $pending_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_pending_data_to_html());
        return $pdf->stream();
    }

    function convert_pending_data_to_html()
    {
        $pending_data = $this->get_pending_data(); 
        $output ='
            <h3 align="center">Pending Task Data</h3>
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
            
            foreach($pending_data as $pending_data)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$pending_data->id.'</td>
                <td style="border: 1px solid; padding:12px;">'.$pending_data->contact['Company'].'</td>
                <td style="border: 1px solid; padding:12px;">'.$pending_data->description.'</td>
                <td style="border: 1px solid; padding:12px;">'.$pending_data->Todo_Due_Date.'</td>
                <td style="border: 1px solid; padding:12px;">'.$pending_data->Task_Update.'</td>
                <td style="border: 1px solid; padding:12px;">'.$pending_data->Sales_Rep.'</td>
                <td style="border: 1px solid; padding:12px;">'.$pending_data->updated_at.'</td>
              
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
