<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Form;
use App\HtmlField;
use App\FormField;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $forms = Form::orderBy('name')->get();
        return view('forms/index',compact('forms')); 
    }

    public function create()
    {
        $fields = HtmlField::orderBy('field')->get();
        return view('forms/create',compact('fields')); 
    }

    public function save(Request $request)
    {
        // dd($request);
        $form = Form::create([
                'name' => $request->get('form_name'),
            ]);        
        if($request->get('field') != NULL){
            $i=0;
            foreach($request->get('field') as $value){
                
                $form_fields = FormField::create([
                                            'form_id' => $form->id,
                                            'field_id' => $request->get('field')[$i],
                                            'label' => $request->get('label')[$i],
                                            'values' => $request->get('values')[$i],
                                        ]);
            }
            $i++;
        }
        return redirect()->route('forms.index')->with('save',true); 

    }

    public function loadFields()
    {
        $fields = HtmlField::orderBy('field')->get();

        return $fields;
    }

    public function view(Request $request,$id)
    {
        $form = Form::find($id);
        $form_fields  = FormField::where('form_id',$id)->get();

        return view('forms/view',compact('form','form_fields')); 
    }

    public function delete(Request $request,$id)
    {
        $form = Form::find($id)->delete();

        return redirect()->route('forms.index')->with('delete',true); 
    }

    public function edit(Request $request,$id)
    {
        $form = Form::find($id);
        $form_fields  = FormField::where('form_id',$id)->get();
        $fields = HtmlField::orderBy('field')->get();


        return view('forms/edit',compact('form','form_fields','fields')); 
    }

    public function update(Request $request)
    {

        $form = Form::where('id','=',$request->get('form_id'))
                        ->update([
                                'name' => $request->get('form_name'),/*$user->staff_id, */  
                            ]);
        if($request->get('field') != NULL){
            $i=0;

            FormField::where('id','=',$request->get('field_ids[$i]'))
                ->update([
                    'field_id' => $request->get('field')[$i],
                    'label' => $request->get('label')[$i],
                    'values' => $request->get('values')[$i],
                    ]); 
            $i++; 
        }                 
        if($request->get('new_field') != NULL){
            $i=0;
            
            foreach($request->get('new_field') as $value){
                
                $form_fields = FormField::create([
                                            'form_id' => $request->get('form_id'),
                                            'field_id' => $request->get('new_field')[$i],
                                            'label' => $request->get('new_label')[$i],
                                            'values' => $request->get('new_values')[$i],
                                        ]);
            }
            $i++;
        }
        return redirect()->route('forms.index')->with('update',true); 

    }



}
