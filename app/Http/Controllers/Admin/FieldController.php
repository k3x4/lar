<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use App\Field;
use App\FieldGroup;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fieldGroups = FieldGroup::all()->pluck('title', 'id')->toArray();
        return view('admin.fields.index', compact('fieldGroups'));
    }

    public function data(Request $request)
    {
        $query = Field::query();

        if($request->filled('field_group')){
            $query = $query->where('field_group_id', $request->field_group);
        }

        return Datatables::of($query)
            ->addColumn('action', 'datatables.action')
            ->editColumn('title', 'datatables.field.edit')
            ->addColumn('field_group', 'datatables.field.field_group')
            ->editColumn('created_at', 'datatables.created_at')
            ->make(true);
    }

    public function options(Request $request)
    {
        $type = $request->get('type');
        $id = $request->get('id');
        $options = $id ? unserialize(Field::find($id)->options) : null;

        if($type){
            return view('admin.fields.options.' . $type, compact('options'));
        } else {
            return '';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fieldGroups = FieldGroup::all()->pluck('title', 'id')->toArray();
        $types = [
            'textbox'   => 'Textbox',
            'textarea'  => 'Textarea',
            'number'    => 'Number',
            'select'    => 'Select',
            'checkbox'  => 'Checkbox',
            'radio'     => 'Radio',
            'url'       => 'URL',
            'email'     => 'Email',
        ];

        return view('admin.fields.create', compact('fieldGroups', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'field_group_id' => 'required',
            'type' => 'required',
        ]);

        $optionsMap = [
            'textbox' => ['label', 'default', 'placeholder']
        ];

        $type = $request->input('type');
        $optionsRequest = $request->all();
        $options = [];

        if(isset($optionsMap[$type])){
            foreach($optionsMap[$type] as $optionKey){
                $options[$optionKey] = $optionsRequest[$optionKey];
            }
        }

        $field = new Field();
        $field->title = $request->input('title');
        $field->field_group_id = $request->input('field_group_id');
        $field->type = $request->input('type');
        $field->options = serialize($options);
        $field->save();

        return redirect()->route('admin.fields.index')
                        ->with('success','Field created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $field = Field::find($id);
        return view('admin.fields.show', compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field = Field::find($id);
        $fieldGroups = FieldGroup::all()->pluck('title', 'id')->toArray();
        $types = [
            'textbox'   => 'Textbox',
            'textarea'  => 'Textarea',
            'number'    => 'Number',
            'select'    => 'Select',
            'checkbox'  => 'Checkbox',
            'radio'     => 'Radio',
            'url'       => 'URL',
            'email'     => 'Email',
        ];

        return view('admin.fields.edit', compact('field', 'fieldGroups', 'types'));
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
        $this->validate($request, [
            'title' => 'required',
            'field_group_id' => 'required',
            'type' => 'required',
        ]);

        $optionsMap = [
            'textbox' => ['label', 'default', 'placeholder']
        ];

        $type = $request->input('type');
        $optionsRequest = $request->all();
        $options = [];

        if(isset($optionsMap[$type])){
            foreach($optionsMap[$type] as $optionKey){
                $options[$optionKey] = $optionsRequest[$optionKey];
            }
        }

        $field = Field::find($id);
        $field->title = $request->input('title');
        $field->field_group_id = $request->input('field_group_id');
        $field->type = $request->input('type');
        $field->options = serialize($options);
        $field->save();

        return redirect()->route('admin.fields.index')
                        ->with('success','Field updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $ids = explode(',', $request->input('ids'));
        Field::destroy($ids);
        return redirect()->route('admin.fields.index')
                        ->with('success','Fields deleted successfully');
    }

}
