<?php

use App\Http\Controllers\{
    BrandsController,
    UserController,
    HomeController,
    OrderController,
    CategorysController,
    ProductgroupController,
    UnitofMeasureContraller,
    SuppliyerController,
    ProductContraller,
    SerailController,
    ProductBomContraller,
    PurcheaOrderContraller,
    ReceiveOrderContraller,
    StockTransactionContraller,
    StockCountController,
    StockalertController,
    CurencyController,
    ExchangeRateController
};

/*php
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//test api


Route::group(['prefix' => 'v1'], function () {
    //brand api
    Route::post('brands/create', [BrandsController::class, 'create']);
    Route::post('brands/update/{brand}', [BrandsController::class, 'update']);
    Route::get('brands/delete/{brand}', [BrandsController::class, 'destroy']);
    Route::get('brands/', [BrandsController::class, 'index']);
    Route::get('brands/getdata/', [BrandsController::class, 'getdata']);

    //category
    Route::post('categorys/create', [CategorysController::class, 'store']);
    Route::post('categorys/updete/{category}', [CategorysController::class, 'update']);
    Route::post('category/delete/{category}', [CategorysController::class, 'destroy']);
    Route::get('category/', [CategorysController::class, 'index']);
    Route::get('category/getcat', [CategorysController::class, 'getcat']);
    Route::post('category/excel', [CategorysController::class, 'storeExcel']);


    //Group product  
    Route::post('progroups/create', [ProductgroupController::class, 'create']);
    Route::get('progroups/edit/{progroups}', [ProductgroupController::class, 'edit']);
    Route::post('progroups/updete/{progroups}', [ProductgroupController::class, 'update']);
    Route::get('progroups/delete/{progroups}', [ProductgroupController::class, 'destroy']);
    Route::get('progroups/', [ProductgroupController::class, 'index']);
    Route::get('progroups/getdatagroup', [ProductgroupController::class, 'getdatagroup']);



    Route::get('units/', [UnitofMeasureContraller::class, 'index']);



    //Product
    Route::post('products/create/', [ProductContraller::class, 'create']);
    Route::post('products/create/{product}', [ProductContraller::class, 'crateUnite']);
    Route::get('products/units/{product}', [ProductContraller::class, 'getUnit']);
    Route::get('products/viewpro', [ProductContraller::class, 'viewpro']);
    Route::get('products/edite/{product}', [ProductContraller::class, 'edit']);
    Route::get('products/editlink/{product}', [ProductContraller::class, 'editlink']);
    Route::get('products/destLink/{product}', [ProductContraller::class, 'destLink']);
    Route::get('products/getProductCAt/{product}', [ProductContraller::class, 'getProductCAt']);
    Route::post('products/update/{product}', [ProductContraller::class, 'update']);
    Route::post('products/updateProductLinke/{product}', [ProductContraller::class, 'updateProductLinke']);
    Route::post('products/getlinkunit/{product}', [ProductContraller::class, 'getlinkunit']);
    Route::post('products/getboomline/{product}', [ProductContraller::class, 'getboomline']);
    Route::get('products/productsearch/', [ProductContraller::class, 'productsearch']);
    Route::post('purchase/delete/getPrulinkUnit/{purchase}', [PurcheaOrderContraller::class, 'getPrulinkUnit']);
    Route::post('products/saveDataFformexcel/', [ProductContraller::class, 'saveDataFformexcel']);
    Route::post('products/SaveDataLinkexcel/', [ProductContraller::class, 'SaveDataLinkexcel']);


    Route::get('category/', [CategorysController::class, 'index']);
    Route::post('categorys/store', [CategorysController::class, 'store']);
    Route::post('categorys/update/{category}', [CategorysController::class, 'updates']);
    Route::post('category/delete/{category}', [CategorysController::class, 'destroy']);
    Route::get('category/getCatName', [CategorysController::class, 'getCatName']);

    //Brands
    Route::get('brands/', [BrandsController::class, 'index']);
    Route::post('brands/store', [BrandsController::class, 'store']);
    Route::post('brands/update/{brand}', [BrandsController::class, 'update']);
    Route::post('brands/delete/{brand}', [BrandsController::class, 'destroy']);

    //suppliyers
    Route::get('suppliyers/getdatasub', [SuppliyerController::class, 'getdatasub']);
    Route::get('suppliyers/', [SuppliyerController::class, 'index']);
    Route::post('suppliyers/store/', [SuppliyerController::class, 'store']);
    Route::post('suppliyers/update/{suppliyers}', [SuppliyerController::class, 'update']);
    Route::post('suppliyers/delete/{suppliyers}', [SuppliyerController::class, 'destroy']);

    //Units code
    Route::get('getunite/', [UnitofMeasureContraller::class, 'getunite']);
    Route::get('units/', [UnitofMeasureContraller::class, 'index']);
    Route::post('units/store', [UnitofMeasureContraller::class, 'store']);
    Route::post('units/update/{units}', [UnitofMeasureContraller::class, 'update']);
    Route::post('units/delete/{units}', [UnitofMeasureContraller::class, 'destroy']);

    Route::get('serail/', [SerailController::class, 'index']);
    Route::post('serail/store/', [SerailController::class, 'store']);
    Route::post('serail/update/{serail}', [SerailController::class, 'update']);
    Route::post('serail/delete/{serail}', [SerailController::class, 'destroy']);

    Route::get('boomproduct/', [ProductBomContraller::class, 'index']);
    Route::post('boomproduct/{broid}', [ProductBomContraller::class, 'getboom']);
    Route::post('boomcreate/{broid}', [ProductBomContraller::class, 'boomcreate']);
    Route::get('getproductboom/{broid}', [ProductBomContraller::class, 'getproductboom']);
    Route::put('boomproduct/update/{broid}', [ProductBomContraller::class, 'update']);
    Route::get('boomproduct/search/{broid}', [ProductBomContraller::class, 'search']);
    Route::get('boomproduct/destroy/{broid}', [ProductBomContraller::class, 'destroy']);
    Route::get('boomproduct/show/{broid}', [ProductBomContraller::class, 'show']);

    //Purchase Order and Purchase Line 
    Route::get('purchase/', [PurcheaOrderContraller::class, 'index']);
    Route::post('purchase/store/', [PurcheaOrderContraller::class, 'store']);
    Route::get('purchase/purchaseorder/view', [PurcheaOrderContraller::class, 'purchaseorderView']);
    Route::get('purchase/edit/purchaseorder/{purchase}', [PurcheaOrderContraller::class, 'editPurchaseorder']);
    Route::post('purchase/update/purchaseorder/{purchase}', [PurcheaOrderContraller::class, 'updatePurchaseorder']);
    Route::post('purchase/delete/purchaseorder/{purchase}', [PurcheaOrderContraller::class, 'deletePurchaseorder']);
    Route::post('purchase/addrow/purchaseline/{purchase}', [PurcheaOrderContraller::class, 'addrowPurchaseline']);
    Route::get('purchase/edit/purchaseline/{purchase}', [PurcheaOrderContraller::class, 'editPurchaseline']);
    Route::post('purchase/delete/purchaseline/{purchase}', [PurcheaOrderContraller::class, 'deletePurchaseline']);
    Route::post('purchase/update/purchaseline/{purchase}', [PurcheaOrderContraller::class, 'updatePurchaseline']);
    Route::post('purchase/delete/purchaseorder/{purchase}', [PurcheaOrderContraller::class, 'deletePurchaseorder']);
    Route::post('purchase/delete/getPrulinkUnit/{purchase}', [PurcheaOrderContraller::class, 'getPrulinkUnit']);
    Route::post('purchase/PrulinkeSave/', [PurcheaOrderContraller::class, 'PrulinkeSave']);
    Route::get('purchase/search/{search}', [PurcheaOrderContraller::class, 'search']);
    // ReceiveOrderContraller
    Route::get('receive/getpurchea', [ReceiveOrderContraller::class, 'getshowpurchea']);
    Route::post('receive/receptlink/', [ReceiveOrderContraller::class, 'receptlink']);
    Route::post('receive/recept/', [ReceiveOrderContraller::class, 'store']);


    Route::get('stocktraview/', [StockTransactionContraller::class, 'index']);

    //Stock count
    Route::get('stockcout/create/', [StockCountController::class, 'store']);
    Route::get('stockcout/stockview/{stockcout}', [StockCountController::class, 'stockview']);
    Route::get('stockcout/stocklineview/{stockcout}', [StockCountController::class, 'stocklineview']);
    Route::get('stockcout/editStocklineview/{stockcout}', [StockCountController::class, 'editStocklineview']);
    Route::post('stockcout/updatestockline/{stockcout}', [StockCountController::class, 'updatestockline']);
    Route::post('stockcout/addrowstockline/{stockcout}', [StockCountController::class, 'addrowstockline']);
    Route::post('stockcout/getValicode/{stockcout}', [StockCountController::class, 'getValicode']);
    Route::get('stockcout/getStock/{stockcout}', [StockCountController::class, 'getStock']);
    Route::post('stockcout/updatestock/{stockcout}', [StockCountController::class, 'updatestock']);
    Route::get('stockcout/getviewscockcount/', [StockCountController::class, 'getviewscockcount']);
    Route::post('stockcout/bookingcountstock/{stockcout}', [StockCountController::class, 'bookingcountstock']);

    Route::get('stockcheck/checkOptionstock/', [StockalertController::class, 'checkOption_stock']);


    // currency
    Route::get('curency/getdata/', [CurencyController::class, 'index']);
    Route::post('curency/create/{curency}', [CurencyController::class, 'create']);
    Route::get('curency/update/{curency}', [CurencyController::class, 'update']);
    Route::post('curency/delete/{curency}', [CurencyController::class, 'destroy']);

    //getSetupExchangeRateController
    Route::get('exchangerate/getSetup/', [CurencyController::class, 'getSetup']);
    Route::get('exchangerate/getcurency/{exchangerate}', [ExchangeRateController::class, 'getcurency']);
    Route::get('exchangerate/create/{exchangerate}', [ExchangeRateController::class, 'create']);
    Route::get('exchangerate/update/{exchangerate}', [ExchangeRateController::class, 'update']);
    Route::get('exchangerate/destroy/{exchangerate}', [ExchangeRateController::class, ' destroy']);
});
