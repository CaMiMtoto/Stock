<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Request;
use App\RequestItem;
use App\Stock;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function index()
    {
        $req = Request::with(['requestedBy','approvedBy'])
            ->latest()
            ->paginate(10);
        $products = Product::all();
        return view('admin.requested', compact('products'))
            ->with(['requisitions' => $req, 'categories' => Category::all()]);
    }

    public function store(\Illuminate\Http\Request $request)
    {

        DB::beginTransaction();
        try {
            $re = new Request();
            $re->date = $request->date;
            $re->department = $request->department;
            $re->prepared_by = $request->prepared_by;
            $re->save();

            for ($i = 0; $i < count($request->product_id); $i++) {
                $item = new RequestItem();
                $item->request_id = $re->id;
                $item->qty = $request->qty[$i];
                $item->product_id = $request->product_id[$i];
                $item->unit_price = $request->price[$i];
                $item->save();
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with(
                ['message' => $exception->getMessage()]
            );
        }
        return redirect()->back();
    }

    public function show(Request $request)
    {
        return $request->load('requestItems');
    }

    public function details(Request $request)
    {
        $request = $request->load('requestItems');
        return view('admin.requestDetails', compact('request'));
    }

    public function updateStatus(\Illuminate\Http\Request $req, Request $request)
    {
        $request->status = $req->status;
        $request->comment = $req->comment;
        if ($req->status == 'approved') {
            $request->approved_by = Auth::id();
        } else {
            $request->approved_by = null;
        }
        $request->update();
        return response($request, 200);
    }

    public function updateStock(\Illuminate\Http\Request $req, Request $request)
    {
//        return response($req,404);
        DB::beginTransaction();
        $request->delivered_by = $req->delivered_by;
        $request->status = 'delivered';
        $request->update();

        for ($i = 0; $i < count($req->product); $i++) {
            $product = Product::find($req->product[$i]);
            $product->qty += $req->qtyToBeStocked[$i];
            $product->update();

            $stock = new Stock();
            $stock->product_id = $req->product[$i];
            $stock->qty = $req->qtyToBeStocked[$i];
            $stock->price = $req->unit_price[$i];
            $stock->save();
        }

        DB::commit();
        return response($request, 200);
    }

    public function destroy(Request $request)
    {
        $request->delete();
        return \response(null, 204);
    }
}
