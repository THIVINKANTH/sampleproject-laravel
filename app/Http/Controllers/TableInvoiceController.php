<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetails;
use App\Models\Invoicemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableInvoiceController extends Controller
{
    public function table_form()
    {
        return view('invoiceform');
    }

    public function tableinsert(Request $request)
    {

        DB::table('invoice')->insert([
            'invoicecompanyname' => $request-> invoivename,
            'address' => $request-> invoiceaddress,
            'contact' => $request-> invoicecontact,
        ]);
        return redirect('/invoicelist')->with('message', 'inserted');
    }
    public function insertbill(Request $request)
    {
        $invoiceid = InvoiceDetails::insertGetId([
            'invoicecompanyname' =>$request-> invoivename,
            'address' =>$request-> invoiceaddress,
            'contact' =>$request-> invoicecontact
        ]);

        $itemname = $request->itemname;
        $hsn = $request->hsn;
        $quantity = $request->quantity;
        $unit = $request->unit;
        $price = $request->price;
        $amount = $request->amount;

        $count = count($itemname);
        for($i=0;$i<$count;$i++)
        {
            $itemname = $itemname[$i];
            $hsn = $hsn[$i];
            $quantity = $quantity[$i];
            $unit = $unit[$i];
            $price = $price[$i];
            $amount = $amount[$i];

            if ($itemname!=''){
                InvoiceDetails::insert([
                    'invoiceid' =>$invoiceid,
                    'itemname' => $itemname,
                    'hsn' => $hsn,
                    'quantity' => $quantity,
                    'unit' => $unit,
                    'price' => $price,
                    'amount' => $amount

                ]);
            }
        }

        return redirect ('invoicetable');
    }

    public function invoicetable()
    {
        $lists = Invoicemodel::all();
        return view('invoicelist',compact('lists'));
    }

    public function invoicedelete($id)
    {
        // $id = $request->input('delete');
        //  $update = login::where('id',$id)->first();
        DB::delete('delete from invoice where id=?',[$id]);
        // return view('list_form',compact('del'));
        return redirect('/invoicelist')->with('message', 'Deleted');

    }

    public function editinvoice($id)
    {
        // $edits = DB::select("select * from companydetails where id=?",[$id]);
        $edits = Invoicemodel::find($id);
        return view('edit_invoice',compact('edits'));
    }

    public function updateinvoice(Request $request,$id)
    {
        $name = $request->input('ucompanyname');
        $email = $request->input('uaddress');
        $mobile = $request->input('ucontact');


        DB::update('update invoice set invoicecompanyname=?, address=?, contact=? where id=?',
        [$name,$email,$mobile,$id]);
        return redirect('/invoicelist')->with('message', 'Updated');
    }
}
