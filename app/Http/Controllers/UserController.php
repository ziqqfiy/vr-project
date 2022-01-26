<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function profile()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('auth.profile', compact('data'));
    }

    public function editProfile(Request $request)
    {
        $data = User::find($request->id);

        $data->username = $request->username;

        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $extention = $avatar->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $avatar->move('uploads/avatars/', $filename);
            $data->avatar = $filename;
        }

        $data->save();
        return redirect('profile');
    }

    public function generateQR()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        $qrcode = QrCode::size(150)->generate(User::where('id', '=', Session::get('loginId'))->get());
        return view('auth.profile', compact('data', 'qrcode'));
    }

}
