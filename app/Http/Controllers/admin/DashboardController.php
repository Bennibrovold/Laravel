<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;

use Auth;
use App\bonuses;
use App\User;
use App\Groups;
use App\bets;
use App\Team;
use App\Records;
use App\CategoriesModel;
use App\Models\MainModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function dashboard(request $request)
    {
      $categories = Categories::all();
      $countCategories = Categories::all()->count();
      // $countCategories = $categories-count();
      if(request()->ajax()) {
        return view('admin.contentFiles.main',['countCategories' => $countCategories,'categories' => $categories]);
      } else {
      return view('admin.dashboard',['countCategories' => $countCategories,'categories' => $categories]);
      }
    }

    public function ajaxContent($params)
    {
      if(request()->ajax()) {
        $page = 'test';
        return view('admin.contentFiles.'.$page)->with([
          $params,
        ]);
      }
    }

    public function createCategory()
    {
      if(request()->ajax()) {
        return view('admin.contentFiles.createCategory');
      } else {
      return view('admin.createCategory');
      }
    }

    protected function validator(Request $data)
    {
      return Validator::make($data->all(), [
          'name' => 'required|string|unique:categories|',
      ])->validate();
    }

    protected function addCategory(Request $data)
    {
      $validator = dashboardController::validator($data);
      if (!dashboardController::validator($data))
      {
        return response()->json([
              'success' => 'success',
              'errors'  => $validator->errors()->all(),
          ], 400);
      } else {
      CategoriesModel::create([
          'name' => $data['name'],
      ]);
      return $data['name'];
      }
    }

    public function create()
    {
      $categories = Categories::all();
      if(request()->ajax()) {
        return view('admin.contentFiles.createRecord_Category',['categories' => $categories]);
      } else {
      return view('admin.createRecord_Category',['categories' => $categories]);
      }
    }

    protected function validatorRecords(Request $data)
    {
      if($data->isMethod('post')) {
      return Validator::make($data->all(), [
          'title' => 'required|string|',
          'description' => 'required|string|',
          'pre_title' => 'required|string|',
          'category' => 'required|string|',
          'image' => 'image|mimes:jpeg,bmp,png|max:8192',
          'checkbox' => '',
      ])->validate();
    } else {
      echo 'Error';
    }
    }

    protected function addRecord(Request $data)
    {
      if(!isset($data['checkbox'])) {
        $data['checkbox'] = 0;
      } else {
        $data['checkbox'] = 1;
      }
      if($data->hasFile('image')) {
      $file = $data->file('image');
      $filename = $file->getClientOriginalExtension();
      $path = $data->image->storeAs('images',$data->image->getClientOriginalName());
      $name = '/images/'.$data->image->getClientOriginalName();
      Records::create([
          'image' => $name,
          'title' => $data['title'],
          'description' => $data['description'],
          'pre_title' => $data['pre_title'],
          'category' => $data['category'],
          'show' => $data['checkbox'],
      ]);
      return redirect()->back();
      } else {
      return 'ERROR-IMG';
      }
    }

    public function deleteCategory($id)
    {
      $category = Categories::findOrFail($id);
      $category->delete();
      return redirect('admin');
    }

    public function options()
    {
      if(request()->ajax()) {

      return view('admin.contentFiles.options');
      } else {
      dd(\Config::get('admin.hyppnotic'));
      return view('admin.options');
      }
    }

    public function users($name = null)
    {
        $users = MainModel::all();
        $groups = DB::table('groups')->get();
      if(request()->ajax()) {
        /*if(!$name == null) {
            $users = MainModel::where('name', 'like', $name)->get();
        }*/
      return view('admin.contentFiles.users',['users' => $users,'groups' => $groups]);
      } else {
      return view('admin.users',['users' => $users,'groups' => $groups]);
      }
    }
    public function usersGet($name)
    {
      if(request()->ajax()) {
        if(!$name == null) {
            $users = MainModel::where('name', 'like', $name)->get();
        }
        if($name == 'users') {
            $users = MainModel::all();
        }
        return view('admin.components.tableusers',['users' => $users]);
      } else {
        dd('no');
      }
      //$users = MainModel::where('name', '=', $post['name'])->get();
    }

    public function ajaxUsersGet(request $data)
    {
      if(request()->ajax()) {

    } else {
      return redirect()->back();
    }
    }

    protected function getSettings(Request $request)
    {
      if(request()->ajax())
      {
        $user = MainModel::findOrFail($request['user_id']);
        $groups = Groups::All();
        return view('admin.components.settings',['user' => $user,'groups' => $groups]);
      }
    }

    protected function getGroupTable()
    {
      if(request()->ajax())
      {
        $groups = Groups::All();
        return view('admin.components.groups_table',['groups' => $groups]);
      }
    }

    public function getUsersTable()
    {
      if(request()->ajax())
      {
        $users = MainModel::all();
        return view('admin.components.tableusers',['users' => $users]);
      }
    }

    protected function usersUpdate(Request $request)
    {
        $s = DB::table('users')->where('id','=',$request['id'])->update([
          'id' => $request['id'],
          'name' => $request['nickname'],
          'role' => $request['role'],
          'money' => $request['balance'],
          'a_panel' => $request['a_panel'],
          'ban' => $request['ban'],
        ]);

        dd($s);
        /*return response()->json([
              'success' => 'success',
              'errors'  => 'ok',
          ], 400); */
    }

    protected function groupDelete($id)
    {
      if(request()->ajax())
      {
      $group = DB::table('groups')->where('id','=',$id);
      $group->delete();
      return response($id);
      }
    }

    public function usersDelete($id)
    {
      if(request()->ajax())
      {
      $user = MainModel::find($id);
      $user->delete();
      return response($id);
      }
    }
    public function bet($img = null)
    {
      $teams = team::All();
      $params = [
        'teams' => $teams,
      ];
      if(request()->ajax()) {
        return view('admin.contentFiles.createBet',$params);
      } else {
      return view('admin.createBet',$params);
      }
    }

/*    public function team()
    {
      if(request()->ajax()) {
        return view('admin.contentFiles.createTeam');
      } else {
      return view('admin.createTeam');
      }
    } */

    protected function teamCreate(request $request)
    {
      if(request()->ajax()) {
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalExtension();
            $request->image->storeAs('images',$request->image->getClientOriginalName());
        Team::create([
            'team_name' => $request['name'],
            'img_link' => '/images/'.$request->image->getClientOriginalName(),
        ]);
        $teams = team::All();
        return $teams;
      } else {
      return response()->json([
            'success' => 'success',
            'errors'  => $request->hasFile('image'),
        ], 400);
        }
      }
    }

    protected function validatorBets($data)
    {
      return Validator::make($data->all(), [
          '1_team_name' => 'required|string|',
          '1_team_image' => 'required|string|',
          '2_team_name' => 'required|string|',
          '2_team_image' => 'required|string|',
          'time_of_match' => 'required|'
      ])->validate();
    }

    protected function betCreate(request $request)
    {
      if(request()->ajax()) {
        $success = bets::create([
            'team_name_1' => $request['team1'],
            'team_image_1' => $request['first_team_image'],
            'team_name_2' => $request['team2'],
            'team_image_2' => $request['second_team_image'],
            'time_of_match' => $request['time_of_match'],
        ]);
        if(!$success) {
        return Response()->json(['error' => $success], 404);
        }
      } else {
        return Response()->json(['error' => 'Method is not ajax'], 404);
      }
    }

    protected function addGroup(request $request)
    {
      if(request()->ajax())
      {
        return Groups::create([
            'group' => $request['group'],
            'priority' => $request['priority'],
        ]);
      }
    }
    public function bonus()
    {
      $users = MainModel::orderBy('referals','desc')->limit(10)->get();
      if(request()->ajax())
      {
        return view('admin.contentFiles.bonus',['users' => $users]);
      } else {
        return view('admin.bonus',['users' => $users]);
      }
    }

    protected function bonusAdd(request $request)
    {
      if(request()->ajax())
      {
        return Bonuses::create([
            'name' => $request['name'],
            'balance' => $request['balance'],
            'limit' => $request['limit'],
        ]);
      }
    }
}
