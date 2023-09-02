<?php

namespace App\Http\Controllers;

use App\Models\Companydetails;
use App\Models\InvoiceDetails;
use App\Models\Invoicemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Rmunate\Utilities\SpellNumber;


class TableInvoiceController extends Controller
{
    public function table_form()
    {
        return view('invoiceform');
    }

    public function tableinsert(Request $request)
    {

        // DB::table('invoice')->insert([
        //     'invoicecompanyname' => $request-> invoivename,
        //     'address' => $request-> invoiceaddress,
        //     'contact' => $request-> invoicecontact,
        // ]);
        // print_r($request->all());exit;
        $invoiceid = Invoicemodel::insertGetId([
            'invoicecompanyname' =>$request-> invoivename,
            'address' =>$request-> invoiceaddress,
            'contact' =>$request-> invoicecontact
        ]);
        // $date = date('y-m-d');
        $date = $request->date;
        $itemname = $request->itemname;
        $hsn = $request->hsn;
        $quantity = $request->quantity;
        $unit = $request->unit;
        $price = $request->price;
        $amount = $request->amount;

        $count = count($itemname);
        for($i=0; $i<$count; $i++)
        {
            $date_str = date('Y-m-d',strtotime($date));
            $itemname_str = $itemname[$i];
            $hsn_str = $hsn[$i];
            $quantity_str = $quantity[$i];
            $unit_str = $unit[$i];
            $price_str = $price[$i];
            $amount_str = $amount[$i];

            if ( trim($itemname_str)!=''){
                InvoiceDetails::insert([
                   'date' => $date_str ,
                    'invoiceid' => $invoiceid,
                    'itemname' => $itemname_str,
                    'hsn' => $hsn_str,
                    'quantity' => $quantity_str,
                    'unit' => $unit_str,
                    'price' => $price_str,
                    'amount' => $amount_str

                ]);
            }
        }
        return redirect('/invoicelist')->with('message', 'inserted');
    }


    public function invoicetable()
    {
        $lists = Invoicemodel::all();
        $invoice = InvoiceDetails::all();
        return view('invoicelist',compact('lists','invoice'));
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
        $listinvoice =DB::table('invoice')
        ->join('invoicedetails', 'invoice.id', '=', 'invoicedetails.invoiceid')
        ->select('invoice.*', 'invoicedetails.*')
        ->where('invoiceid', $id)->distinct('invoiceid')->get();
        return view('edit_invoice',['listinvoice' => $listinvoice],compact('edits'));
    }

    public function updateinvoice(Request $request,$id )
    {
        $name = $request->input('ucompanyname');
        $address = $request->input('uaddress');
        $mobile = $request->input('ucontact');
        Invoicemodel::where('id',$id)->update([
            'invoicecompanyname'=>$name,
            'address'=>$address,
            'contact'=>$mobile,
        ]);

        $date = $request->input('date');
        $itemname = $request->input('uitemname');
        $hsn = $request->input('uhsn');
        $quantity = $request->input('uquantity');
        $unit = $request->input('uunit');
        $price = $request->input('uprice');
        $amount = $request->input('uamount');
        $did = $request->input('did');
        $count = count($itemname);


        for($i=0; $i<$count; $i++)
        {
            $date_str = date('Y-m-d',strtotime($date));
            $itemname_str = $itemname[$i];
            $hsn_str = $hsn[$i];
            $quantity_str = $quantity[$i];
            $unit_str = $unit[$i];
            $price_str = $price[$i];
            $amount_str = $amount[$i];
            $did_str = $did[$i];

                $invoiceup= InvoiceDetails::where('id', $did_str)->update([

                    'date' => $date_str ,
                    'itemname' =>  $itemname_str,
                    'hsn' => $hsn_str,
                    'quantity' => $quantity_str,
                    'unit' =>  $unit_str,
                    'price' =>  $price_str,
                    'amount' =>$amount_str
                ]);

        }
        return redirect('/invoicelist')->with('message', 'Updated');
    }


    public function invoicebill($id)
    {
        $name = Companydetails::all();
        $customer = Invoicemodel::find($id);
        $bill =DB::table('invoice')
        ->join('invoicedetails', 'invoice.id', '=', 'invoicedetails.invoiceid')
        ->select('invoice.*', 'invoicedetails.*')
        ->where('invoiceid', $id)->distinct('invoiceid')->get();
        $pdf = Pdf::loadView('invoicepage',compact('name','customer','bill'));
        return $pdf->stream();
       // return view('invoicepage', compact('name','customer','bill'));
    }

    // public function showcustomer()
    // {
    //     $num = 254678;
    //     $letter = SpellNumber::value($num)->toLetters();
    //     echo $letter;
    // }
}
