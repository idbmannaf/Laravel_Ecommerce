<?php

namespace App\Http\Controllers;

use App\Models\BillingDetails;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{

    public function downloadInvoice(Request $request){
        $order= Order::where('id',$request->id)->first();
        $billing_details= BillingDetails::where('order_id',$request->id)->first();
        $order_details= OrderDetails::where('order_id',$request->id)->get();
        $pdf= PDF::loadView('front.invoice',compact('order','billing_details','order_details'));
        return $pdf->download('invoice.pdf');
    }

}
