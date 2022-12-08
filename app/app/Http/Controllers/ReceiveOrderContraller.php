<?php

namespace App\Http\Controllers;
use App\Models\purcheas_order_view;
use App\Models\receiveorder;
use App\Models\purcheaorder;
use App\Models\receiveorderline;
use App\Models\stockkeeping;
use App\Models\purchealine;
use Illuminate\Http\Request;

class ReceiveOrderContraller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receiveorder = receiveorder::create([
            'document_no'       => $request['document_no'],
            'document_type'     => $request['document_type'],
            'description'       => $request['description'],
            'suppliyer_code'    => $request['suppliyer_code'],
            'curency_code'      => $request['curency_code'],                                                                              
            'inactived'         => $request['inactived'],
            'total_amount'      => $request['total_amount'],
            'statue'            => 'Saved',
            'created_by'        => 'Chhin Pov'
        ]);
        if($receiveorder){
            return ['statue' => "successful"];

        }else{
            return ['statue '=>"faile"];
        }
    }
    public function receptlink(Request $request)
    {
        $check = true;
        $statue ="open";
        $receiveorder = receiveorderline::create([
        'document_no'           => $request['document_no'],
        'document_type'         => $request['document_type'],
        'product_no'            => $request['product_no'],
        'description'           => $request['description'],
        'issu_date'             => $request['issu_date'],
        'exprit_date'           => $request['exprit_date'],
        'line_no'               => $request['line_no'],
        'unit_of_measure_code'  => $request['unit_of_measure_code'],
        'unit_price'            => $request['unit_price'],
        'inventory'             => $request['inventory'],
        'inventory_order'       => $request['inventory_order'],
        'inventory_recetive'    => $request['inventory_recetive'],
        'qty_balance'           => $request['qty_balance'],
        'amount_balance'        => $request['amount_balance'],
        'total_amount'          => $request['total_amount'],
        'curency_code'          => $request['curency_code'],
        'remark'                => $request['remark'],
        'created_by'            => "Chhin Pov",
        ]);
        if ($receiveorder) {
            if(1){
                $stockkeeping = stockkeeping::where('product_no', '=',$request->product_no)->first();
                $purchealine = purchealine::where('document_no', '=',$request->document_no)->where('product_no', '=',$request->product_no)->first();
                $inventorynew =  floatval($purchealine->inventory)-floatval($request->inventory_recetive);
                $inventoryres =  $request->inventory_recetive;
                $purOrder = purcheaorder::where('document_no', '=',$request->document_no)->first(); $purOrder->statue = 'close'; $purOrder->save();  
                if($stockkeeping){

                 }else{
                        $inventory_order = 0;
                        $inventory = $inventory_order + floatval($request['inventory_recetive']);
                        $receiveorder = stockkeeping::create([
                            'document_no'           => $request['document_no'],
                            'document_type'         => $request['document_type'],
                            'product_no'            => $request['product_no'],
                            'description'           => $request['description'],
                            'issu_date'             => $request['issu_date'],
                            'exprit_date'           => $request['exprit_date'],
                            'line_no'               => $request['line_no'],
                            'unit_of_measure_code'  => $request['unit_of_measure_code'],
                            'unit_price'            => $request['unit_price'],
                            'inventory'             => $inventory,
                            'inventory_order'       => $inventory_order,
                            'inventory_new'         => $inventorynew,
                            'total_amount'          => $request['total_amount'],
                            'curency_code'          => $request['curency_code'],
                            'remark'                => $request['remark'],
                            'created_by'            => "Chhin Pov",
                            ]);
                            if($purchealine->inventory != $request->inventory_recetive){
                              $check = false;
                            }
                   }
                
                   if(!$check){
                        $statue ="open";
                        $purchealines = purchealine::find($purchealine->id);
                        $purchealines->statue = $statue;
                        $purchealines->save();
                   }else{
                        $statue ="close";
                        $purchealines = purchealine::find($purchealine->id);
                        $purchealines->statue = $statue;
                        $purchealines->inventory = $inventorynew;
                        $purchealines->inventory_recetive = $inventoryres;
                        $purchealines->save();
                   }
                    $purchealine = purchealine::where('document_no', '=',$request->document_no)->get();
                    foreach($purchealine as $purche){
                        if($purche->statue =="open"){
                            $purOrder = purcheaorder::where('document_no', '=',$request->document_no)->first(); $purOrder->statue = 'open'; $purOrder->save(); 
                            continue;   
                        }
                    }
                    if ($purOrder) {
                        return ['statue' => "successful"];
                    } else {
                        return ['statue '=>"faile"];
                    }
                }else{

                }
                    
        }else{

            return ['statue' => "fail"];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getshowpurchea(Request $request)
    {
        $purcheas_order_view = purcheaorder::where('statue', '=',"open")->get();
        if ($purcheas_order_view) {
            return $purcheas_order_view;
        } else {
            return ['statue :' => "Note Date"];
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}