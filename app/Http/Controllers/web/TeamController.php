<?php

namespace App\Http\Controllers\web;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::paginate(4);
        return view('team.index',compact('teams'));
    }
    public function create()
    {
        $teams = Team::get();
        return view('team.create',compact('teams'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Title' => 'required|string|max:100',
            'Image' => 'required|Image|mimes:png,jpg|max:2048',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         $imageName = time() . '.' . $request->Image->extension();
         $request->Image->move(public_path('images'), $imageName);

         $team = new Team();
         $team->Name = $request->Name;
         $team->Title = $request->Title;
         $team->Image = $imageName;
         $team->save();

        Session::flash('message', 'Team is created successfully');

        return redirect(route('teams.create'))->withErrors(['message' => 'team Done!'])->withInput();
    }
    public function edit($id)
    {
        $team = Team::find($id);
        return view('team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Title' => 'required|string|max:100',
            'Image' => 'required|Image|mimes:png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->Image->extension();
        $request->Image->move(public_path('images'), $imageName);

        $team = Team::find($id);
        $team->Name = $request->Name;
        $team->Title = $request->Title;
        $team->Image = $imageName;
        $team->save();

        Session::flash('message', 'Team updated successfully!');

        return redirect(route('teams.index'))->withInput();
    }
    public function destroy($id)
    {
        $teams = Team::find($id);
        $teams->delete();
        Session::flash('message', 'team is Deleted !');

        return redirect(route('teams.index'))->withInput();

    }

}
