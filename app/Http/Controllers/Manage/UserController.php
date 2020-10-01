<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.users.index')->with('users', User::paginate(10)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if(Auth::user()->id == $id){
            return redirect()->route('manage.users.index')->with('warning', 'You are not allowed to edit yourself.');
        }

        return view('manage.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
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
        if(Auth::user()->id == $id){
            return redirect()->route('manage.users.index')->with('warning', 'You are not allowed to edit yourself.');
        }

        $user = User::find($id); 
        $user->roles()->sync($request->roles);

        return redirect()->route('manage.users.index')->with('success', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('manage.users.index')->with('warning', 'You are not allowed to delete yourself.');
        }

        $user = User::find($id);

        if ($user){
            $user->roles()->detach(); 
            $user->delete(); 
            return redirect()->route('manage.users.index')->with('success','User has been deleted.'); 
        }

        return redirect()->route('manage.users.index')->with('warning','User does not exist.'); 
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
        $n_data = DB::table('users')->limit(10)->get();

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
            <h3 align="center">User Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                <th style="border: 1px solid; padding:12px;" width="10%">ID</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
                <th style="border: 1px solid; padding:12px;" width="50%">Email</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Created</th>
            </tr>
            
            ';  
            
            foreach($n_data as $n_data_indi)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->id.'</td>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->name.'</td>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->email.'</td>
                <td style="border: 1px solid; padding:12px;">'.$n_data_indi->created_at.'</td>
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
