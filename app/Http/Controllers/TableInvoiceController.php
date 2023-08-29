<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetails;
use App\Models\Invoicemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\BreakLine;

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

        $itemname = $request->itemname;
        $hsn = $request->hsn;
        $quantity = $request->quantity;
        $unit = $request->unit;
        $price = $request->price;
        $amount = $request->amount;

        $count = count($itemname);
        for($i=0; $i<$count; $i++)
        {
            $itemname_str = $itemname[$i];
            $hsn_str = $hsn[$i];
            $quantity_str = $quantity[$i];
            $unit_str = $unit[$i];
            $price_str = $price[$i];
            $amount_str = $amount[$i];

            if ( trim($itemname_str)!=''){
                InvoiceDetails::insert([
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
        $listinvoice =DB::select('select itemname, hsn, quantity, unit, price, amount  from invoicedetails where invoiceid = ?', [$id]);
        //$listinvoice = InvoiceDetails::find($id);
        //  $listinvoice = InvoiceDetails::select("'itemname', 'hsn', 'quantity', 'unit', 'price', 'amount'")
        //                 ->whereColumn( 'invoice.id', 'invoicedetails.invoiceid')
        //                 ->get();
        // $listinvoice = DB::table('invoicedetails')
        //         ->whereColumn([
        //             ['id', '=', 'invoiceid']
        //         ])->get()->all();
        // $listin = DB::table('invoicedetails')
        // ->whereColumn('id', 'invoiceid')
        // ->get();

        // $edits = DB::table('invoice')
        //         ->select(DB::raw('invoicecompanyname','address','contact','itemname', 'hsn', 'quantity', 'unit', 'price', 'amount'))
        //         ->whereColumn('invoice.id', 'invoicedetails.invoiceid',$id);

        // $listinvoice = DB::table('invoicedetails')
        //             ->whereExists($edits)
        //             ->get();


        // $listinvoice = DB::table('invoice')
        //             ->join('invoicedetails', 'invoice.id', '=', 'invoicedetails.invoiceid')
        //             // ->join('orders', 'users.id', '=', 'orders.user_id')
        //             ->select('invoice.*', 'invoicedetails.itemname', 'invoicedetails.hsn','invoicedetails.quantity','invoicedetails.unit','invoicedetails.price','invoicedetails.amount')
        //             ->get();
        // $listinvoice = DB::table('invoicedetails')
        //         ->select('itemname', 'hsn', 'quantity', 'unit', 'price', 'amount')
        //         ->where([ 'invoice.id', '==',$id])
        //         ->get();
                     // print_r($listinvoice);exit;
        return view('edit_invoice',['listinvoice' => $listinvoice],compact('edits'));
    }

    public function updateinvoice(Request $request,$id)
    {
        $name = $request->input('ucompanyname');
        $email = $request->input('uaddress');
        $mobile = $request->input('ucontact');
        DB::update('update invoice set invoicecompanyname=?, address=?, contact=? where id=?',
        [$name,$email,$mobile,$id]);




        $itemname = $request->input('uitemname');
        $hsn = $request->input('uhsn');
        $quantity = $request->input('uquantity');
        $unit = $request->input('uunit');
        $price = $request->input('uprice');
        $amount = $request->input('uamount');
        $count = count($itemname);
        for($i=0; $i<$id; $i++)
        {
            $itemname_str = $itemname[$i];
            $hsn_str = $hsn[$i];
            $quantity_str = $quantity[$i];
            $unit_str = $unit[$i];
            $price_str = $price[$i];
            $amount_str = $amount[$i];
            if($itemname !='')
            {
               $invoiceup= InvoiceDetails::where('invoiceid',$id)->update([

                    'itemname' =>  $itemname_str,
                    'hsn' => $hsn_str,
                    'quantity' => $quantity_str,
                    'unit' =>  $unit_str,
                    'price' =>  $price_str,
                    'amount' =>$amount_str
                ]);
                break;
            }
            //print_r($invoiceup);exit;

        }





        // $invoiceup = DB::table('invoicedetails')
        //       ->where('id', $id)
        //       ->update(['itemname' => $itemname,'hsn' => $hsn,'quantity' => $quantity,'unit' => $unit, 'price' => $price, 'amount' => $amount]);


        // $itemname = $request->input('itemname');
        // $hsn = $request->input('itemname');
        // $quantity = $request->input('quantity');
        // $unit = $request->input('unit');
        // $price = $request->input('price');
        // $amount = $request->input('amount');
        // $invoiceup = DB::update('update invoicedetails set itemname=?, hsn=?, quantity=?, unit=?, price=?, amount=?   where id=?',
        // [ $itemname,$hsn,$quantity,$unit,$price,$amount,$id]);

        //  print_r($invoiceup);exit;
        return redirect('/invoicelist')->with('message', 'Updated');
    }
}
