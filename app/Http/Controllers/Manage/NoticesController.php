<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notices;
use DB;
use PDF;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.notices.index')->with('notices', Notices::paginate(10)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.notices.create');
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
            'title'=>'required',
            'desc'=>'required'
        ]);

        $notice = new Notices([
            'title' => $request->get('title'),
            'desc' => $request->get('desc')
        ]);
        $notice->save();
        return redirect()->route('manage.notices.index')->with('success','Notice has been stored.'); 
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
        $notice = Notices::find($id);
        return view('manage.notices.edit', compact('notice'));  
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
            'title'=>'required',
            'desc'=>'required'
        ]);

        $notice = Notices::find($id);
        $notice->title =  $request->get('title');
        $notice->desc = $request->get('desc');
        $notice->save();

        return redirect()->route('manage.notices.index')->with('success','Notice has been updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notices::find($id);
        $notice->delete();

        return redirect()->route('manage.notices.index')->with('success','Notice has been deleted.'); 
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

    function get_notices_data()
    {
        $notices_data = DB::table('notices')->limit(10)->get();

        return $notices_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_notices_data_to_html());
        return $pdf->stream();
    }

    function convert_notices_data_to_html()
    {
        $notices_data = $this->get_notices_data(); 
        $output ='
            <h3 align="center">Notices Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                <th style="border: 1px solid; padding:12px;" width="10%">ID</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Title</th>
                <th style="border: 1px solid; padding:12px;" width="50%">Description</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Created</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Updated</th>
            </tr>
            
            ';  
            
            foreach($notices_data as $notice)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$notice->id.'</td>
                <td style="border: 1px solid; padding:12px;">'.$notice->title.'</td>
                <td style="border: 1px solid; padding:12px;">'.$notice->desc.'</td>
                <td style="border: 1px solid; padding:12px;">'.$notice->created_at.'</td>
                <td style="border: 1px solid; padding:12px;">'.$notice->updated_at.'</td>
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
