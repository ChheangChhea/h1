<template >
  <div class="wrapper" style="overflow: hidden">
    <div id="header">
        <div id="headTitle">
          <div id="logo"><img alt="Healthbook" height="44" src="img/logo.png" width="70"></div>
          <h1 id="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Patient master</font></font></h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome"><a href="index" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png" width="28"></a></li>              
              <li>
                  <a href="dashbaord"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Master Admin</font></font></a>
              </li>
              <li>
                  <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Recept-order
                  </font></font></span>
              </li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" original-title="PM12:13"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2022/08/25</font></font></p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">system 
              </font></font><a href="/login/logout" id="btnlogout" original-title="logout"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">logout</font></font></a></p>
          </div>
        </div>
        <!-- / #header --></div>
    <div class="search-box">
      <div id="purchase">
        <!--#contents -->
        <div class="search-box mb-4">
          <a class="btn-radius bt-pn btn btn-sm" data-bs-toggle="dropdown" aria-expanded="false"
            style="float: right; color: #f8f5b4">
            <i class="fas fa-plus" style="padding-right: 5px"> </i>
            Menu
          </a>
          <ul class="dropdown-menu">
            <li>
              <button class="dropdown-item btn btn-primary" tabindex="10028" @click="saverecept()"><i class="fas fa-edit"></i> Save Recept</button>
            </li>
            <li>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028"
                href="#"> <i class="fas fa-save"></i> Booking</a>
            </li>
            <li>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticboomId" tabindex="10028"
                href="#"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
            </li>
            <li>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028"
                href="#"><i class="fas fa-file-excel"></i> To Excel</a>
            </li>
          </ul>

          <div class="search-box-title">
            <a class="btn-radius bt-pn btn btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropss"
              tabindex="10028" style="float: left; color: #f8f5b4; margin-top: -2px">
              <i class="fas fa-plus" style="padding-right: 5px; margin-top: -2px">
              </i>
              Add New
            </a>
            <router-link to="/viewrecept"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px">
                <i class="fas fa-eye" style="padding-right: 5px"> </i>
                View
              </a></router-link>
          </div>
          <div class="modal fade ui-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title" id="staticBackdropLabel">
                    <span class="ui-dialog-title" id="ui-dialog-title-modal-edit-dialog">{{ this.title }}</span>
                  </h5>
                  <span
                      class="ui-icon ui-icon-closethick" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div class="ui-dialog-content">
                  <div class="modal-body">
                    {{ this.message }}
                  </div>
                  <div class="modal-footer">
                    <div class="button type2" id="uniform-undefined" data-bs-dismiss="modal">
                      <span>No<input type="button" class="type2" value="No" style="width: 89px; opacity: 0"
                          onclick="edit_cancel()" tabindex="10008" /></span>
                    </div>
                    <div class="button type2" @click="messagegetconfirm(this.confirm)" data-bs-dismiss="modal">
                      <span>Yes</span>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="search-box-content  search-box02">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
              <tbody>
                <tr>
                  <th width="20%">Document Number</th>
                  <td width="80%">
                    <input :disabled="true" @change="autoUpdateProduct(form)" v-model="form.document_no"
                      class="string_zen_kana clear_text text input_text" style="width: 385px" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="20%">Document Type</th>
                  <td width="80%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.document_type"
                      class="string_zen_kana clear_text text input_text" style="width: 385px" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="20%">Description</th>
                  <td width="80%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.description"
                      class="string_zen clear_text text input_text" style="width: 385px" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="20%">Suppliyer</th>
                  <td width="80%">
                    <select :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.suppliyer_code"
                      class="form" style="width: 385px">
                      <option value="">Selete Suppliyer</option>
                      <option v-for="suppliye in suppliyer" :value="suppliye.sup_code" :key="suppliye.id">
                        {{ suppliye.sup_name }}
                      </option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th width="20%">Curency Code</th>
                  <td width="80%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.curency_code"
                      class="string_zen clear_text text input_text" style="width: 385px" type="text" />
                  </td>
                </tr>
              
                <tr>
                     <th width="20%">Inactived</th>
                         <td width="80%">
                            <div class="selector" id="inactivced"><span>{{form.inactived}}</span>
                              <select id="inactivced" name="inactivced" v-model="form.inactived" tabindex="10003" style="min-width: 51px; opacity: 0; width: 80px;">
                                <option value="Yes" >Yes</option>
                                  <option value="No">No</option>
                              </select>
                            </div>
                         </td>
                     </tr>
              </tbody>
            </table>
          </div>
         
        </div>
        <div class="box">
          <div class="box-content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list">
              <thead>
                <tr>
                  <th style="width: 7%">Product No</th>
                  <th style="width: 10%">Description</th>
                  <th style="width: 7%">Qty Order</th>
                  <th style="width: 7%">Qty Recept</th>
                  <th style="width: 7%">Unit Code</th>
                  <th style="width: 7%">Unit Price</th>
                  <th style="width: 7%">Curency Code</th>
                  <th style="width: 7%">Qty Balance</th>
                  <th style="width: 7%">Total Amount</th>
                  <th style="width: 7%">Issu Date</th>
                  <th style="width: 7%">Exprit date</th>
                </tr>
                <tr v-for="purchaseLine in purchases_lines" :key="purchaseLine.index">
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.document_no" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008"  style="width: 100%"/>                 
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.description" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008" style="width: 100%"/>
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.inventory_order"
                      @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008" style="width: 100%" />
                  </th>
                  <th style="padding: 10px">
                    <input v-model="purchaseLine.inventory_recetive" @change="autoUpdatePurline(purchaseLine)"
                      class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008"
                      style="width: 100%" />
                  </th>
                  <th style="padding: 10px">
                    <div class="dropdown">
                      <button @click="getunit(purchaseLine.product_no)" @onmouseout="prooductboom(purchaseLine)"
                        class="dropdown-toggle string_zen clear_text text" type="button" id="dropdownMenuButton1" style="width: 100%"
                        data-bs-toggle="dropdown" aria-expanded="false" size="50"> {{ purchaseLine.unit_of_measure_code }}
                      </button>
                    </div>
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="false" v-model="purchaseLine.unit_price" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code" type="text" tabindex="10008" style="width: 100%" />
                  </th>

                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.curency_code"  @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008" style="width: 100%" />
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.qty_balance" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code" type="text" tabindex="10008" style="width: 100%" />
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.total_amount" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code" type="text" tabindex="10008"  style="width: 100%"/>
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="false" type="date" v-model="(purchaseLine.issu_date)" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code"  tabindex="10008" />
                  </th>
                  <th style="padding: 10px">
                      <input :disabled="false" type="date" v-model="purchaseLine.exprit_date" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code" tabindex="10008"/>
                  </th>
                  
                </tr>
              </thead>
              <vue-countdown style="display: none" v-if="counting" :time="60000" @end="onCountdownEnd"
                v-slot="{ totalSeconds }">Fetch again {{ totalSeconds }} seconds later</vue-countdown>
            </table>
          </div>
          <div class="box-footer-pagination">
            <div class="pagination" style="padding: 10px; width: 100%">
              <div class="button type2" id="uniform-undefined" v-show="btnGenerate" @click="myFunction()"
                style="float: left">
                <span style="width: 150px"><input type="button" class="type2" tabindex="10025" value="display"
                    style="opacity: 0; width: 54px" /><i class="fas fa-plus"></i> Generate Code</span>
              </div>
              <div style="width: 30%; float: right; background: none; color: #f8f5b4; ">
                <!-- /.card-header -->
                <div id="inspection_call_statusdisplay" class="clearfix mt_0" style="margin=0;">
                  <div class="col main status_tested" style="border: none; width: 100%">
                    <table cellpadding="0" cellspacing="0" border="0">
                      <thead>
                        <tr></tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>
                            <font style="vertical-align: inherit; color: #f8f5b4">Product</font>
                          </th>
                          <td>
                            <input :disabled="true" style="vertical-align: inherit; background: none;  border: none;  "
                              v-model="productline" />
                          </td>
                        </tr>
                        <tr>
                          <th>
                            <font style="vertical-align: inherit; color: #f8f5b4">Item</font>
                          </th>
                          <td>
                            <input :disabled="true" style=" vertical-align: inherit;  background: none; border: none; "
                              v-model="item" />
                          </td>
                        </tr>
                        <tr>
                          <th>
                            <font style="vertical-align: inherit; color: #f8f5b4">Total</font>
                          </th>
                          <td>
                            <input :disabled="true" style="vertical-align: inherit; background: none;border: none; "
                              v-model="this.form.total_amount" />
                          </td>
                        </tr>



                        <tr>
                          <th>
                            <font style="vertical-align: inherit; color: #f8f5b4">Total Amount</font>
                          </th>
                          <td>
                            <input :disabled="true" style="vertical-align: inherit; background: none;border: none; "
                              v-model="this.form.total_amount" />
                          </td>
                        </tr>





                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade ui-modal" id="staticBackdropss" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropss" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content ui-dialog">
         <div class="ui-widget-header">
          <h5 class="modal-title" id="staticBackdropLabel">Boom Products : {{ form.product_no }} , {{ form.description }} </h5>
          <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.description" class="string_zen clear_text text input_text" style="width:385px" type="text">
        </div>
        <div class="box-content">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list tbl_stripe">
            <thead>
              <tr>
                <!-- <th width="5%">Image</th> -->
                <th width="10%">Document Num</th>
                <th width="10%">Document Type</th>
                <th width="20%">Description</th>
                <th width="10%">Suppliyer</th>
                <th width="10%">Curency Code</th>
                <th width="9%">Inactived</th>
                <th width="9%"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(purchase, index) in purchases" :key="index">
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none;text-align: center; "> {{ purchase.document_no }} </td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.document_no }}  </td>
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none; text-align: center; "> {{ purchase.document_type }} </td>
                <td v-else style="border: medium none; text-align: center">  {{ purchase.document_type }}  </td>
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none; text-align: center; "> {{ purchase.description }} </td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.description }} </td>
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none; text-align: center; ">  {{ purchase.suppliyer_code }} </td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.suppliyer_code }} </td>
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none; text-align: center; "> {{ purchase.curency_code }} </td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.curency_code }} </td>
                <td v-if="index % 2 == 0" style="  background-color: #dbdee1; border: medium none; text-align: center;"> {{ purchase.inactived }}</td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.inactived }} </td>
                <td v-if="index % 2 == 0" style="  background-color: #dbdee1; border: medium none;  text-align: center; ">
                  <div class="">
                    <div class="button type2" id="uniform-undefined">
                      <span><input @click="getEdit(purchase.document_no)" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025"  data-bs-dismiss="modal" aria-label="Close" /><i class="fa fa-edit"></i> Recpt</span>
                    </div>
                  </div>
                </td>
                <td v-else style="border: medium none; text-align: center">
                  <div class="">
                    <div class="button type2" id="uniform-undefined">
                      <span><input @click="getEdit(purchase.document_no)" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025" data-bs-dismiss="modal" aria-label="Close"/><i class="fa fa-edit"></i>Recpt</span>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade ui-modal" id="staticboomId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticboomId" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content ui-dialog">
        <div class="ui-widget-header">
          <h5 class="modal-title in-header" id="staticBackdropLabel"><i class="fa fa-print" aria-hidden="true"></i> Print
            : {{ form.product_no }} , {{ form.description }}</h5>
                     <span class="ui-icon ui-icon-closethick" data-bs-dismiss="modal" aria-label="Close"></span>
        </div>
        <div class="ui-dialog-content" id="purchaseorder">
          <div class="card">
            <div class="card-body">
              <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                  <div class="col-xl-9">
                  </div>
                  <hr>
                </div>
  
                <div class="container">
                  <div class="col-md-12">
                    <div class="text-center">
                      <h3 class="title-purchase">RECEPT ORDER</h3>
                      <!-- <p class="pt-0">MDBootstrap.com</p> -->
                    </div>
  
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="list-unstyled">
                        <li class="text-muted text-right">Date:<span>15-Dec-2022</span></li>
                        <li class="text-muted text-right">Receipt No:<span>000001</span></li>
                      </ul>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-xl-6 supplier-padding">
                      <p class="text-muted title-pur-sup">COMPANY NAME</p>
                      <ul class="list-unstyled">
                        <li class="text-muted">Phone No: <span style="color:#5d9fc5 ;">012 233 333</span></li>
                        <li class="text-muted">Email: <span style="color:#5d9fc5 ;">john@gmail.com</span></li>
                        <li class="text-muted">Address: <span style="color:#5d9fc5 ;">#12, St.444, Sangkat Svay Pak, Phnom
                            Penh</span></li>
                      </ul>
                    </div>
                    <div class="col-xl-6 supplier-padding">
                      <p class="text-muted title-pur-sup">SUPPLIER NAME</p>
                      <ul class="list-unstyled">
                        <li class="text-muted">Phone No: <span style="color:#5d9fc5 ;">John Lorem</span></li>
                        <li class="text-muted">Email: <span style="color:#5d9fc5 ;">John Lorem</span></li>
                        <li class="text-muted">Address: <span style="color:#5d9fc5 ;">John Lorem</span></li>
                      </ul>
                    </div>
                  </div>
  
                  <div class="row my-2 mx-1 justify-content-center table-padding-bot">
                    <table class="table table-striped table-borderless">
                      <thead style="background-color:#84B0CA ;" class="text-white">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Qty Order</th>
                          <th scope="col">Qty Recept</th>
                          <th scope="col">Unit Code</th>
                          <th scope="col">Unit Price</th>
                          <th scope="col">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row">1</td>
                          <td>Pro Package</td>
                          <td>For Protect Hand</td>
                          <td>4</td>
                          <td>2</td>
                          <td>Can</td>
                          <td>$200</td>
                          <td>$800</td>
                        </tr>
                        <tr>
                          <td scope="row">2</td>
                          <td>Web hosting</td>
                          <td>For Protect Hand</td>
                          <td>1</td>
                          <td>1</td>
                          <td>Can</td>
                          <td>$10</td>
                          <td>$10</td>
                        </tr>
                        <tr>
                          <td scope="row">3</td>
                          <td>Consulting</td>
                          <td>For Protect Hand</td>
                          <td>4</td>
                          <td>1</td>
                          <td>Can</td>
                          <td>$300</td>
                          <td>$300</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="6" rowspan="4" class="th-font-bold text-padd-top">Remark: </td>
                          <td class="th-font-bold text-right">Total :</td>
                          <td class="th-font-bold">$800</td>
                        </tr>
                        <tr>
                          <td class="th-font-bold text-right">Tax : </td>
                          <td class="th-font-bold">$80</td>
                        </tr>
                        <tr>
                          <td class="th-font-bold table-th-width text-right">Other : </td>
                          <td class="th-font-bold">$00</td>
                        </tr>
                        <tr>
                          <td class="th-font-bold table-th-width text-right">Total Amount : </td>
                          <td class="th-font-bold">$880</td>
                        </tr>
                      </tbody>
  
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-xl-8 supplier-padding">
                      <p class="ms-3">Payment Information</p>
                      <!-- Default inline 1-->
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="defaultInline1">
                        <label class="custom-control-label" for="defaultInline1">CASE</label>
                      </div>
  
                      <!-- Default inline 2-->
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="defaultInline2">
                        <label class="custom-control-label" for="defaultInline2">CREDIT CARD</label>
                      </div>
  
                      <!-- Default inline 3-->
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="defaultInline3">
                        <label class="custom-control-label" for="defaultInline3">BANK TRANSWER</label>
                      </div>
                      <ul class="list-unstyled">
                        <li class="text-muted">Bank Name:<span class="text--color">Mr. Master</span></li>
                        <li class="text-muted">Bank Account Number: <span class="text--color">001 025 025</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="text-footer-page">
                    <div class="row ruler-foot">
                      <div class="col-xl-4 supplier-padding">
                        <ul class="list-unstyled">
                          <li class="text-muted">John Lorem</li>
                          <li class="text-muted">012 233 333</li>
                        </ul>
                      </div>
                      <div class="col-xl-4 supplier-padding">
                        <ul class="list-unstyled">
                          <li class="text-muted">St.333, Sangkat</li>
                          <li class="text-muted">Phnom Penh</li>
                        </ul>
                      </div>
                      <div class="col-xl-4 supplier-padding">
                        <ul class="list-unstyled">
                          <li class="text-muted">john@gmail.com</li>
                          <li class="text-muted">www.aaaaa.com</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="modal-footer">
          <!-- <a class="btn-purchase btn-light text-capitalize" data-mdb-ripple-color="dark"><i
              class="far fa fa-times-circle text-danger"></i> Close</a> -->
          <a class="btn-purchase btn-light text-capitalize border-0" data-mdb-ripple-color="dark" @click="print()"><i
              class="fas fa-print text-primary"></i> Print</a>
          <!-- <div class="button type2" id="uniform-undefined" data-bs-dismiss="modal"><span>No<input  type="button" class="type2" value="No" style="width: 89px; opacity: 0;" onclick="edit_cancel()" tabindex="10008"></span></div>
                      <div class="button type2" @click="print()" :value="G_code" data-bs-dismiss="modal"><span>Yes</span></div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios, { Axios } from "axios";
export default {
  data() {
    return {
      total:0,
      item: 0,
      productline:0,
      links: [],
      purchases: [],
      purchases_lines: [
        {
          id:"",
          document_no :"",
          document_type:"",
          product_no :"",
          description:"",
          issu_date :"",
          exprit_date:"",
          unit_of_measure_code :"",
          unit_price:"",
          inventory_order :"",
          inventory_recetive:"",
          line_no :"",
          inventory:"",
          total_amount :0,
          qty_balance:0,
          amount_balance:0,
          curency_code:"",
          remark :"",
          created_by:"",
          delete_by :"",
          created_at:"",
          updated_at :"",
        }
      ],
      perPage: "",
      currentPage: 0,
      last_page: 1,
      form :{
          document_no:"",
          document_type:"",
          description:"",
          suppliyer_code:"",
          curency_code:"",
          inactived:"",
          total_amount:0,
          created_by:"",
          statue:"",
          delete_by:"",
      },
      purchases:'',
      datetime : new Date(),
    };
  },
  mounted() {
    try {
      if (this.$route.query.id.trim() != "undefined") {
        this.purchases = this.$route.query.id;
      }
    } catch (error) {
      this.purchases = "undefined";
    }
    this.getEdit(this.purchases);
    this.getPurchase();
    this.getsuppliyer();
  },
  methods: {
    getPurchase() {
          axios.get("api/v1/receive/getpurchea").then((response) => {
            this.purchases = response.data;
          });
    },
    getsuppliyer() {
      axios.get("/api/v1/suppliyers/getdatasub").then((response) => {
        this.suppliyer = response.data;
      });
    },
    getEdit(id) {
      if (this.id != "undefined") {
        axios
          .get("api/v1/purchase/edit/purchaseorder/" + id)
          .then((response) => {
            this.form = response.data;
          }),
          axios
            .get("api/v1/purchase/edit/purchaseline/" + id)
            .then((response) => {
              this.purchases_lines = response.data;
              this.purchases_lines.forEach(element => {
                element.inventory = element.inventory;
                element.unit_price = element.unit_price;
                element.inventory_order = element.inventory_order;
                element.total_amount = element.total_amount;
                element.inventory_recetive = element.inventory_order;
              });
              this.sumtotal();
      })
     }
    },
    btnDelete(id) {
      axios.post("api/v1/purchase/delete/purchaseorder/" + id).then((res) => {
        this.getPurchase();
      });
    },
    saverecept() {
      axios.post('api/v1/receive/recept',this.form).then((res) => {
           if(res.data.statue == "successful"){
               this.purchases_lines.forEach(element => {    
                    axios.post('api/v1/receive/receptlink',element).then((res) => {
                        console.log(res.data);
                    });                   
               });
           }
      });
    },
  formart2f (number){
   return new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 2 }).format(number);
  },
   autoUpdatePurline(ProLink){
       if(parseInt(ProLink.inventory_order) < parseInt(ProLink.inventory_recetive)){
        if (confirm("Preasse Insert Your Recept valuse Small then Order Valuse \n Product Id : "+ProLink.product_no+" Order :"+ProLink.inventory_order+">= Recept: "+ ProLink.inventory_recetive)) {
              ProLink.inventory_recetive = ProLink.inventory_order;
          } else {
              ProLink.inventory_recetive = ProLink.inventory_order;
          }
       }else{
         try {
          ProLink.qty_balance = 0;
          ProLink.amount_balance = 0;
          ProLink.qty_balance = parseFloat(ProLink.inventory_order) - parseFloat(ProLink.inventory_recetive);
          ProLink.total_amount = parseFloat(ProLink.unit_price)* parseFloat(ProLink.inventory_recetive);
          ProLink.amount_balance = parseFloat(ProLink.unit_price)*parseFloat( ProLink.qty_balance);
          ProLink.total_amount = formart2f(ProLink.total_amount);
          ProLink.amount_balance = formart2f(ProLink.amount_balance);
          ProLink.unit_price = formart2f(ProLink.unit_price);
         } catch (error) {
           console.log(error);
         }
         this.sumtotal();
       }
  },
  sumtotal(){
    this.productline = 0; this.item = 0;   this.form.total_amount = 0;
    this.purchases_lines.forEach(element => {
          try {
            this.productline += 1;
            this.item += parseFloat(element.inventory_recetive);
            this.form.total_amount += parseFloat(element.total_amount);
          } catch (error) {
            
          }
        });  
      },
      print() {
      var printContents = document.getElementById("purchaseorder").outerHTML;
        document.body.innerHTML = printContents;
        window.print();
        window.location.reload();
    },
 }
}
</script>