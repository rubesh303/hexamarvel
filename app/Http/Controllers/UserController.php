<?php

namespace App\Http\Controllers;
use App\User;
use App\Company;
use App\Branch;
use App\Designation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index(Request $request)
    {	
		
		$data['Company'] =Company::get();
		$data['Branch'] =Branch::get();
		$data['Designation'] =Designation::get();
		 if ($request->ajax()) {
				$branch = $request->branch;
                $designation = $request->designation;
             $data = User::
			 when($branch, function ($q) use ($branch) {
                    if ($branch!=null) {
                       $q->where('users.branch', $branch);
                    }
                    return $q;
                })
                ->when($designation, function ($q) use ($designation) {
                    if ($designation!=null) {
                       $q->where('users.designation', $designation);
                    }
                    return $q;
                })
			->leftJoin('branches','branches.id','=','users.branch')
			->leftJoin('companies','companies.id','=','users.company_name')
			->leftJoin('designations','designations.id','=','users.designation')
			->select('users.id as u_id','users.*','branches.*','companies.*','designations.*')
			->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" id="'.$row->u_id.'"class="edituser btn btn-primary btn-sm"data-toggle="modal" data-target="#editUser">edit</a>';
                           $btn .= '&nbsp;&nbsp;&nbsp;<a href="' . action('UserController@profileView', [$row->u_id]) . '" class="btn btn-lightred btn-sm mt-10">View</button></a>';
                           $btn .= '<a href="javascript:void(0)"id="'.$row->u_id.'" class="deleteuser btn btn-danger btn-sm"data-toggle="modal" data-target="#DeleteModel">delete</a>';
                          
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       return view('users.usersList',$data);
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

	public function profileView(Request $request){
		 $data['UserDetails'] = User::where('users.id',$request->user_id)
				->leftJoin('branches','branches.id','=','users.branch')
			->leftJoin('companies','companies.id','=','users.company_name')
			->leftJoin('designations','designations.id','=','users.designation')
			->select('users.id as u_id','users.*','branches.*','companies.*','designations.*')
				->get()->first();
		   return view('users.UserProfile',$data);
	}
    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }   
	public function edituser(Request $request){
	  
	  return $data['User'] = User::where('id',$request->user_id)->get()->first();
	   return response()->json($data);
	}
	public function Updateuser(Request $request){
		 try {
            $User = User::findorfail($request->user_id);
            $User->name = $request->name;
            $User->user_id = $request->user_id;
            $User->company_name = $request->company;
            $User->email = $request->email;
            $User->phone_number = $request->mobile;
            $User->gender = $request->mobile;
            $User->branch = $request->branch;
            $User->designation = $request->designation;
            $User->dob = $request->dob;
            $User->doj = $request->doj;
            $User->save();
            $Data['status'] = 'success';
            return response()->json($Data);
        }catch (Exception $e){
            $Data['status'] = 'error'.$e;
            return response()->json($Data);
        }
	}
	
	public function UserDelete(Request $request){
		 try {
            $Years = User::findorfail($request->rowId)->delete();
            $Data['status'] = 'success';
            return response()->json($Data);
        }catch (Exception $e){
            $Data['status'] = 'error';
            return response()->json($Data);
        }
	}
}