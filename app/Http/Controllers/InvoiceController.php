<?php

namespace App\Http\Controllers;

use App\Models\Companydetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function insert_form()
    {
        return view('insertform');
    }
    public function insertdata(Request $request)
    {
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $mobile = $request->input('mobile');
        // $address = $request->input('address');
        // insert database


        DB::table('companydetails')->insert([
            'companyname' => $request-> name,
            'email' => $request-> email,
            'mobile' => $request-> mobile,
            'address' => $request-> address,
            'logo' => $request-> logo,
            'sign' => $request-> sign,
            'bankname' => $request-> bankname,
            'bankacnum' => $request-> bankacnumber,
            'ifsccode' => $request-> ifsccode,
            'acholdername' => $request-> acname
        ]);
        return redirect('/list')->with('message', 'inserted');

    }

   public function userlist()
    {
        $list = Companydetails::all();
        return view('tablelist',compact('list'));
    }

    public function delete($id)
    {
        // $id = $request->input('delete');
        //  $update = login::where('id',$id)->first();
        DB::delete('delete from companydetails where id=?',[$id]);
        // return view('list_form',compact('del'));
        return redirect('/list')->with('message', 'Deleted');

    }
    public function edit($id)
    {
        // $edits = DB::select("select * from companydetails where id=?",[$id]);
        $edits = Companydetails::find($id);
        return view('edit_form',compact('edits'));
    }
    public function updates(Request $request,$id)
    {
        $name = $request->input('uname');
        $email = $request->input('uemail');
        $mobile = $request->input('umobile');
        $address = $request->input('uaddress');
        $logo = $request->input('ulogo');
        $sign = $request->input('usign');
        $bankname = $request->input('ubankname');
        $bankacnumber = $request->input('ubankacnumber');
        $ifsc = $request->input('uifsccode');
        $acholder = $request->input('uacname');

        DB::update('update companydetails set companyname=?, email=?, mobile=?, address=?, logo=?, sign=?, bankname=?, bankacnum=?, ifsccode=?, acholdername=? where id=?',
        [$name,$email,$mobile,$address,$logo,$sign,$bankname,$bankacnumber,$ifsc,$acholder,$id]);
        return redirect('/list')->with('message', 'Updated');
    }
}
