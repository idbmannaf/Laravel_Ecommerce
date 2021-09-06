<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BundleProductController extends Controller
{
   public function index(){
       return view('admin.products.bundle.index');
   }
    public function create(){
     $products=  Product::all();
        return view('admin.products.bundle.create',compact('products'));
    }

    public function store(Request $request){
        return "POst Method";
    }
    public function search(Request $request){
        $data = Product::where('CustomerName', 'like', '%'.$request->id.'%')
            ->orWhere('title', 'like', '%'.$request->id.'%')
            ->orWhere('sku', 'like', '%'.$request->id.'%')
            ->orderBy('id', 'desc')
            ->get();

        $output='';
        if ($data->count() > 0){
            foreach($data as $row)
            {
                $output .= '
        <tr>
         <td>'.$row->title.'</td>
         <td>'.$row->price.'</td>
         <td>'.$row->sku.'</td>
        </tr>';
            }
        }else
        {
            $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
        }
        $data = array(
            'table_data'  => $output,
        );
        echo json_encode($data);

    }
}
