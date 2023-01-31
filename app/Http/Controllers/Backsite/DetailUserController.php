<?php

namespace App\Http\Controllers\Backsite;


use Auth;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//  use model detail user
use App\Models\ManagementAccess\DetailUser;
// use model user
use App\Models\User;
// use storage
use Illuminate\Support\Facades\Storage;
// use request update detail user
use App\Http\Requests\DetailUser\UpdateDetailUserRequest;
use App\Http\Requests\DetailUser\UpdatePasswordRequest;
use App\Rules\CurrentPassword;



class DetailUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user()->detail_user->get();
        return view('pages.backsite.detail-user.index', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        return abort(404);
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
        $user = User::find($id);
        $detail_user = DetailUser::find($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        $user->update($data);

        $dudata = [
            'age' => $request->age,
            'contact' => $request->contact,
            'address' => $request->address,
            'gender' => $request->gender,
            'photo' => $request->hasFile('photo') ? $request->photo : $detail_user->photo,
        ];


        if($request->file('photo')){
            // first checking old photo to delete from storage
           $get_item = Auth::user()->detail_user['photo'];

           // change file locations
           $dudata['photo'] = $request->file('photo')->store(
               'assets/file-detail-user', 'public'
           );

           // delete old photo from storage
           $data_old = 'storage/'.$get_item;
           if (File::exists($data_old)) {
               File::delete($data_old);
           }else{
               File::delete('storage/app/public/'.$get_item);
           }
        }
    
        $detail_user->update($dudata);
        
            // alert
            alert()->success('Success', 'Successfully updated information');
            return redirect()->back();
    }

   

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
    {
        return abort(404);
    }


        public function editpw()
    {
        return view('pages.backsite.detail-user.edit');
    }
     public function changepw(Request $request, $id)
    {

        $user = User::find($id);

        $this->validate($request, [
           
            'current_password' => ['required', new CurrentPassword],
            'new_password' => 'required',
            'confirmation_password' => 'same:new_password',
        ]);

        $data = [
            'password' => Hash::make($request->new_password),
        ];

        $user->update($data)
            ? alert()->success('Success', 'Successfully updated information')
            : alert()->success('Error', "Password telah gagal diubah!");
            
            return redirect()->back();

    } 

       
}
