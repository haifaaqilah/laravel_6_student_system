<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    private function rules()
    {
        //Rules
        $rules = [
            'level_name' => 'required',
            'level_number' => 'required',
            'status' => 'required',
        ];

        return $rules;
    }

    private function rules_message()
    {
        //Custom Message
        $custom_message = [];

        return $custom_message;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('hello');
        $limit_per_page = 10;
        $levels = Level::latest()->paginate($limit_per_page);
        //dd($levels);

        return view('levels.index', compact('levels'))
        ->with('i', (request()->input('page', 1) - 1) * $limit_per_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Iput
        $validator = Validator::make(
            //request, rule, message
            $request->all(), $this->rules(), $this->rules_message()
        );

        //If Validator Failed
        if($validator->fails())
        {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //If Validator Success
        Level::create($request->all());

        return redirect()->route('level.index')->with('success', 'Level has been created successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        return view('levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        //Validate Iput
        $validator = Validator::make(
            //request, rule, message
            $request->all(), $this->rules(), $this->rules_message()
        );

        //If Validator Failed
        if($validator->fails())
        {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //If Validator Success
        $level->update($request->all());

        return redirect()->route('level.index')->with('success', 'Level has been updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('level.index')->with('success', 'Level has been deleted successfuly');
    }
}
