<template >
  <div class="wrapper" style="overflow: hidden">
    <div class="container-fuild">
      <div id="header">
        <div id="headTitle">
          <div id="logo"><img alt="Healthbook" height="44" src="img/logo.png" width="70"></div>
          <h1 id="title">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Patient master</font>
            </font>
          </h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome"><a href="/" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png"
                width="28"></a></li>
          <li>
            <a href="dashbaord">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Master Admin</font>
              </font>
            </a>
          </li>
          <li>
            <span>
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                  Purchase-Order
                </font>
              </font>
            </span>
          </li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" original-title="PM12:13">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">2022/08/25</font>
              </font>
            </p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">system
                </font>
              </font><a href="/login/logout" id="btnlogout" original-title="logout">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">logout</font>
                </font>
              </a>
            </p>
          </div>
        </div>
        <!-- / #header -->
      </div>
    </div>
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
              <a class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropss"
                tabindex="10028"><i class="fas fa-edit"></i> Release</a>
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
            <a class="btn-radius bt-pn btn btn-sm" href="#" data-bs-toggle="dropdown" aria-expanded="false"
              style="float: left; color: #f8f5b4; margin-top: -2px">
              <i class="fas fa-plus" style="padding-right: 5px; margin-top: -2px">
              </i>
              Add New
            </a>
            <ul class="dropdown-menu">
              <li>
                <a @click="
                  getMessage(
                    'Message Confirm',
                    'Do you want to create new product.',
                    'crate',
                    code
                  )
                " class="dropdown-item btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#staticBackdrop">Generate Code</a>
              </li>
            </ul>
            <router-link to="/Purchasview"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px">
                <i class="fas fa-eye" style="padding-right: 5px"> </i>
                View
              </a></router-link>
              <a @click="gettoRecpt()" class="btn-radius btn btn-sm" href="#" style="color: #f8f5b4; margin-top: -2px">
                <i class="fas fa-edit"></i> Recept: {{ this.form.document_no }}
              </a>
          </div>
          <!-- Button trigger modal -->
          <!-- Modal -->
          <div class="modal fade ui-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title" id="staticBackdropLabel">
                    <span class="ui-dialog-title" id="ui-dialog-title-modal-edit-dialog">{{ this.title }}</span>
                  </h5>
                  <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal"><span
                      class="ui-icon ui-icon-closethick">close</span></a>
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
                  <th width="10%">Document Number</th>
                  <td width="50%">
                    <input :disabled="true" @change="autoUpdateProduct(form)" v-model="form.document_no"
                      class="string_zen_kana clear_text text input_text" maxlength="50" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Document Type</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.document_type"
                      class="string_zen_kana clear_text text input_text" maxlength="50" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Description</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.description"
                      class="string_zen clear_text text input_text" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Suppliyer</th>
                  <td width="50%">
                    <select :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.suppliyer_code"
                      class="form"   style="width: 380px" > 
                      
                      <option value="">Selete Suppliyer</option>
                      <option v-for="suppliye in suppliyer" :value="suppliye.sup_code" :key="suppliye.id">
                        {{ suppliye.sup_name }}
                      </option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th width="10%">Curency Code</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.curency_code"
                      class="string_zen clear_text text input_text" size="50" type="text" />
                  </td>
                </tr>
             
                <tr>
                  <th width="10%">Inactived</th>
                   <td width="50%">
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
        <div class="search-box-footer" style=" background: #094e59e0; border: 1px #e6e1e16e solid;">
              <div class="button type2" id="uniform-undefined">
                <span  data-bs-toggle="modal" data-bs-target="#statiex-import" tabindex="10028" @click="save()"><input @click="save()" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025"  /><i class='fas fa-file-import'></i> Import From Excel</span>
              </div>
              <div class="button type2" id="uniform-undefined">
                <span  data-bs-toggle="modal" data-bs-target="#statiex-import" tabindex="10028" @click="exportSheet()"><input @click="exportSheet()" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025"  /><i class='fas fa-file-import'></i> Export To Excel</span>
              </div>
            </div>
        <div class="box">
          <div class="box-content" id="excell">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list">
              <thead>
                <tr class="excellcolor-trhead">
                  <th class="excellcolor-trhead" style="width: 7%">Product No</th>
                  <th class="excellcolor-trhead" style="width: 10%">Description</th>
                  <th class="excellcolor-trhead" style="width: 7%">Unit Price</th>
                  <th class="excellcolor-trhead" style="width: 7%">Inventory</th>
                  <th class="excellcolor-trhead" style="width: 7%">Unit Code</th>
                  <th class="excellcolor-trhead" style="width: 7%">Total Amount</th>
                  <th class="excellcolor-trhead" style="width: 7%">Curency Code</th>
                  <th class="excellcolor-trhead" style="width: 10%">Remark</th>
                  <th class="excellcolor-trhead" style="width: 7%"></th>
                </tr>
                <tr v-for="purchaseLine in purchases_lines" :key="purchaseLine.index">
                  <th >
                    <div class="dropdown">
                      <button @onmouseout="prooductboom(purchaseLine)"
                        class="dropdown-toggle string_zen clear_text text" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" size="50">
                        <i class="fa fa-caret-down" aria-hidden="true"></i>{{ purchaseLine.product_no }}
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                        style="max-height: 400px; width: 250px; scroll-behavior: smooth; padding: 5px;margin: 5px;box-shadow: 1px 1px 5px #141417;">
                        <p><input :disabled="isDisabled" v-model="txtsearch" @input="searchproduct(txtsearch)"
                            class="string_zen clear_text text" size="50" type="text"
                            style="width:98% !important;border: 1px teal solid;border-radius: 1px;height: 30px;"></p>
                        <ul style="list-style:none ;" class="scrollable-menu">
                          <li v-for="boompro in boompros" @click="getproduct(boompro, purchaseLine, 'boomproducr')">
                            <div class="menu-item">
                              <p style="color: blue;">{{ boompro.product_no}}</p>
                              <p>{{ boompro.description }}</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </th>
                  <th >
                    <input :disabled="isDisabled" v-model="purchaseLine.description"
                      @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"
                      name="jusinsya_code" type="text" tabindex="10008" style="min-width: 10em; width:95%" />
                  </th>
                  <th >
                    <input :disabled="isDisabled" v-model="purchaseLine.unit_price"
                      @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"
                      name="jusinsya_code" type="text" tabindex="10008" style="min-width: 4em; width:90%" />
                  </th>
                  <th >
                    <input v-model="purchaseLine.inventory" @change="autoUpdatePurline(purchaseLine)"
                      class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008"
                      style="min-width: 4em; width:90%" />
                  </th>
                  <th >
                    <div class="dropdown">
                      <button @click="getunit(purchaseLine.product_no)" @onmouseout="prooductboom(purchaseLine)"
                        class="dropdown-toggle string_zen clear_text text" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" size="50">
                           {{purchaseLine.unit_of_measure_code}} <i class="fa fa-caret-down" aria-hidden="true"></i>  
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                        style="max-height: 400px; width: 250px; scroll-behavior: smooth; padding: 5px;margin: 5px;box-shadow: 1px 1px 5px #141417;border: none;">
                        <p><input :disabled="isDisabled" v-model="txtsearch" @input="searchproduct(txtsearch)"
                            class="string_zen clear_text text" size="50" type="text"
                            style="width:98% !important;border: 1px teal solid;border-radius: 1px;height: 30px;"></p>
                        <ul style="list-style:none ;" class="scrollable-menu">
                          <li v-for="boompro in boomunits" @click="getproduct(boompro, purchaseLine, 'linkunit')">
                            <div class="menu-item"> 
                               <p>{{boompro.variant_unit_of_measure_code}}</p>
                            </div> 
                          </li>
                        </ul>
                      </div>
                    </div>
                  </th>
                  <th >
                    <input :disabled="true" v-model="purchaseLine.total_amount"
                      @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"
                      name="jusinsya_code" type="text" tabindex="10008" style="width: 95%; margin-left: 0px !important;" />
                  </th>
                  
                  <th >
                    <input :disabled="isDisabled" v-model="purchaseLine.curency_code"
                      @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"
                      name="jusinsya_code" type="text" tabindex="10008" style="width: 95%" />
                  </th>
                  <th >
                    <input :disabled="isDisabled" v-model="purchaseLine.remark"
                      @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"
                      name="jusinsya_code" type="text" tabindex="10008" style="width: 95%" />
                  </th>
                  <th style="padding:5px 0px !important">
                    <div class="button type2" id="uniform-undefined" data-bs-toggle="modal"
                      data-bs-target="#staticBackdrop" @click="
                        getMessage(
                          'Message',
                          'Do yout want to Delete this recode. [' +
                          purchaseLine.id +
                          ']',
                          'delelink',
                          purchaseLine.id
                        )
                      ">
                      <span><input type="button" class="type2" style="opacity: 0; width: 54px" tabindex="10025"
                          value="display" /><i class="fa fa-trash" aria-hidden="true"></i> Delete</span>
                    </div>
                  </th>
                </tr>
              </thead>
              <vue-countdown style="display: none" v-if="counting" :time="60000" @end="onCountdownEnd"
                v-slot="{ totalSeconds }">Fetch again {{ totalSeconds }} seconds later</vue-countdown>
            </table>
          </div>
          <div class="box-footer-pagination">
            <div class="pagination" style="padding: 5px; width: 100%">
              <div class="button type2" id="uniform-undefined" v-show="btnGenerate" @click="myFunction()"
                style="float: left">
                <span style="width: 145px"><input type="button" class="type2" tabindex="10025" value="display"
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
                            <font style="vertical-align: inherit; color: #f8f5b4"  class="pro">Product</font>
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
                              v-model="total" />
                          </td>
                        </tr>
                        <tr>
                            <th>
                               <font style="vertical-align: inherit; color:#f8f5b4"> Total Amount</font>
                              </th>
                            <td>
                            <input :disabled="true" style=" vertical-align: inherit;  background: none; border: none; "
                              v-model="item" />
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
  <div class="modal fade ui-modal" id="staticboomId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticboomId" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title in-header" id="staticBackdropLabel" ><i class="fa fa-print" aria-hidden="true"></i> Print : {{ form.product_no }} , {{ form.description }}</h5>
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
            <h3 class="title-purchase">PURCHASE ORDER</h3>
            <!-- <p class="pt-0">MDBootstrap.com</p> -->
          </div>

        </div>


        <div class="row">
          <div class="col-xl-6 supplier-padding">
            <p class="text-muted title-pur-sup">COMPANY NAME</p>
            <ul class="list-unstyled">
               <li class="text-muted">Phone No: <span style="color:#5d9fc5 ;">John Lorem</span></li>
              <li class="text-muted">Email: <span style="color:#5d9fc5 ;">John Lorem</span></li>
              <li class="text-muted">Address: <span style="color:#5d9fc5 ;">John Lorem</span></li>
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

        <div class="row">
          <div class="col-xl-6 supplier-padding">
            <p class="text-muted title-pur-sup">Order Person</p>
            <ul class="list-unstyled">
               <li class="text-muted">Phone No: <span style="color:#5d9fc5 ;">John Lorem</span></li>
              <li class="text-muted">Email: <span style="color:#5d9fc5 ;">John Lorem</span></li>
              <li class="text-muted">Address: <span style="color:#5d9fc5 ;">John Lorem</span></li>
            </ul>
          </div>
          <div class="col-xl-6 supplier-padding">
            <p class="text-muted title-pur-sup">Supply Person</p>
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
                <th scope="col">Qty</th>
                <th scope="col">Unit</th>
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
                <td>Can</td>
                <td>$200</td>
                <td>$800</td>
              </tr>
              <tr>
                <td scope="row">2</td>
                <td>Web hosting</td>
                <td>For Protect Hand</td>
                <td>1</td>
                <td>Can</td>
                <td>$10</td>
                <td>$10</td>
              </tr>
              <tr>
                <td scope="row">3</td>
                <td>Consulting</td>
                <td>For Protect Hand</td>
                <td>1</td>
                <td>Can</td>
                <td>$300</td>
                <td>$300</td>
              </tr>
              <tr>
                <td scope="row" colspan="5" rowspan="3" class="th-font-bold text-padd-top">Remark: </td>
                <td class="th-font-bold text-right">Total :</td>
                <td class="th-font-bold">$800</td>
              </tr>
              <tr>
                <td class="th-font-bold text-right" >Tax : </td>
                <td class="th-font-bold">$80</td>
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
            <ul class="list-unstyled">
              <li class="text-muted">ABA BANK<span class="text--color">Mr. Master</span></li>
              <li class="text-muted">Bank Name:<span class="text--color">Mr. Master</span></li>
              <li class="text-muted">Bank Account Number: <span class="text--color">001 025 025</span></li>
                        </ul>

          </div>
        </div>
        <hr>
     

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
    <div class="modal fade ui-modal" id="statiex-import" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticboomId" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title in-header" id="staticBackdropLabel" ><i class="fa fa-print" aria-hidden="true"></i> {{ excel }} to Docutment: {{ form.document_no }} , {{ form.description }}</h5>
                  <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal">
                    <span class="ui-icon ui-icon-closethick">close</span></a>
                </div>
                <div id="purchaseorder">
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
                              <h3 v-if="excel=='Import'" class="​title-purchase" id="titlered">{{excel}} {{ exefile }} from Excel</h3>
                              <h3 v-else class="title-purchase" id="titlered">{{excel}} To Excel</h3>
                            </div>
                          </div>
                          <div class="row my-2 mx-1 justify-content-center table-padding-bot customsroll">
                            <table class="table table-striped table-borderless" id="exceldata">
                              <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                  <th style="width: 5%">No</th>
                                  <th style="width: 10%">Document No</th>
                                  <th style="width: 10%">Document Type</th>
                                  <th style="width: 7%">Product No</th>
                                  <th style="width: 7%">Description</th>
                                  <th style="width: 7%">Unit Price</th>
                                  <th style="width: 7%">Inventory</th>
                                  <th style="width: 7%">Unit Code</th>
                                  <th style="width: 7%">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="(purchaseLine,index) in items" :key="items.index">
                                  <th v-if="index>=1" style="width: 5%">{{index}}</th>
                                  <th v-if="index>=1" style="width: 10%">{{purchaseLine.document_no}}</th>
                                  <th v-if="index>=1" style="width: 10%">{{purchaseLine.document_type}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.product_no}}</th>
                                  <th v-if="index>=1" style="width: 10%">{{purchaseLine.description}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.unit_price}}{{purchaseLine.curency_code}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.inventory}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.unit_of_measure_code}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.total_amount}}{{purchaseLine.curency_code}}</th>
                                </tr>
                              </tbody>

                            </table>
                          </div>
                          <div class="row">
                            <div class="col-xl-8 supplier-padding">
                              <p class="ms-3">Payment Information</p>
                              <ul class="list-unstyled">
                                <li class="text-muted">ABA BANK<span class="text--color">Mr. Master</span></li>
                                <li class="text-muted">Bank Name:<span class="text--color">Mr. Master</span></li>
                                <li class="text-muted">Bank Account Number: <span class="text--color">001 025 025</span></li>
                              </ul>
                            </div>

                            <div class="col-xl-8 supplier-padding">
                              <ul class="list-unstyled">
                                <tr>
                                  <td class="th-font-bold text-right">Products :</td>
                                  <td class="th-font-bold">{{ productline }}</td>
                                </tr>
                                <tr>
                                  <td class="th-font-bold text-right" >Inventory : </td>
                                  <td class="th-font-bold">{{ item }}</td>
                                </tr>
                                <tr>
                                  <td class="th-font-bold table-th-width text-right">Total Amount : </td>
                                  <td class="th-font-bold">{{total}}{{form.curency_code}}</td>
                                </tr>
                              </ul>
                            </div>
                          </div>
                          <hr>
                      

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                     <a v-if="excel=='Import'" class="btn-purchase btn-light text-capitalize" data-bs-dismiss="modal" data-mdb-ripple-color="dark" @click="saveprulink()"><i class="fas fa-save"></i> Save Date</a>
                     <a v-if="excel=='Import'" class="btn-purchase btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="fas fa-file-excel"></i> {{ excel }} Form excel</a>
                     <input v-if="excel=='Import'"  type="file" @change="getExcelData" name="select_file" />
                     <a v-else class="btn-purchase btn-light text-capitalize" data-bs-dismiss="modal" data-mdb-ripple-color="dark" @click="exportdataExcel()"><i class="fas fa-save"></i> Save Date</a>
                     </div>
              </div>
            </div>
    </div>
    <div id="myModal" class="lskymodal">
      <div class="lskymodal-content">
         <p><i class="fa fa-check" aria-hidden="true"></i> {{ massege }}</p>
      </div>
    </div>
    <div id="myModalauto" class="lsky">
      <div class="lsky-content">
         <p>{{ massege }}</p>
      </div>
    </div>
</template>
<script>
import readXlsxFile from 'read-excel-file';
import * as XLSX from 'xlsx/xlsx.mjs';
import axios from "axios";
export default {
  data() {
    return {
      massege:'',
      pending: false,
      file:null,
      img: "",
      code: "",
      confirm: "",
      title: "",
      message: "",
      purchases: "",
      exefile:'',
      purchasesCode: "",
      suppliyer: [],
      purchases_lines: [],
      units: [],
      products: [],
      boompros: [],
      boomunits:[],
      btnGenerate: false,
      total: 0,
      item: 0,
      productline: 0,
      form: {
        document_no: "",
        document_type: "",
        description: "",
        suppliyer_code: "",
        curency_code: "",
        inactived: "",
      },
      checkexcel:[],
      items :[{
            id:'',
            document_no:'',
            document_type:'',
            product_no:'',
            description:'',
            unit_of_measure_code:'',
            inventory:0,
            unit_price:0,
            total_amount:0, 
            curency_code:'',
        }],
        checkarray:1,
        excel:'Import',
        head :["id","document_no","document_type","product_no","description","unit_of_measure_code","inventory","unit_price","total_amount", "curency_code"],
        fileName : "PrucheseLine.xlsx",
       
    };
  },
  async mounted() {
    try {
      if (this.$route.query.id.trim() != "undefined") {
        this.purchases = this.$route.query.id;
      }
    } catch (error) {
      this.purchases = "undefined";
    }
    this.getUnit();
    this.getsuppliyer();
    this.getProduct();
    this.getPurchaseoOrder();
    this.getEdite();
    this.prooductboom();
    this.purchases_lines = null;
  },
  methods: {
    sumTotal(totals) {
      this.total = 0;
      this.item = 0;
      this.productline = 0;
      totals.forEach((element) => {
        this.productline += 1;
        this.item += parseFloat(element.inventory);
        this.total += parseFloat(element.total_amount);
      });
    },
    gettoRecpt(){
      this.$router.push({
          name: "recept",
          query: { id: this.form.document_no },
        });
    },
    getPurchaseoOrder() {
      axios.get("api/v1/purchase").then((res) => {
        this.form = res.data;
      });
    },
    btnGenerate_code($status) {
      this.isDisabled = false;
      this.btnGenerate = true;
      this.crateNewsProduct();
    },
    myFunction(val) {
      axios
        .post("api/v1/purchase/addrow/purchaseline/" + this.purchases)
        .then((response) => {
          this.purchases_lines = response.data;
        });
      let i = this.purchases_lines.findIndex((x) => x.id === val.id);
      if (i != -1) {
        this.purchases_lines[i].document_no += 1;
      } else {
        var plus = this.purchases_lines.document_no;
        this.purchases_lines.push(plus);
      }
    },
    getProduct() {
      axios.get("api/v1/products/getdataPro").then((res) => {
        this.products = res.data;
      });
    },
    getUnit() {
      axios.get("/api/v1/unitcode/getData").then((response) => {
        this.units = response.data;
      });
    },
    getsuppliyer() {
      axios.get("/api/v1/suppliyers/getdatasub").then((response) => {
        this.suppliyer = response.data;
      });
    },
    prooductboom() {
      axios.get('/api/v1/getproductboom/' + this.products)
        .then((response) => {
          this.boompros = response.data;
        })
    },
    crateNewsProduct() {
      axios.post("/api/v1/purchase/store/").then((response) => {
        this.form = response.data;
        this.form.forEach((element) => {
          this.form.document_no = element.document_no;
          this.purchases = element.document_no;
          this.getEdite();
        });
      });
    },
    getEdite() {
      if (this.purchases.trim() != "undefined") {
        axios
          .get("api/v1/purchase/edit/purchaseorder/" + this.purchases)
          .then((response) => {
            this.form = response.data;
            this.isDisabled = false;
          }),
          axios
            .get("api/v1/purchase/edit/purchaseline/" + this.purchases)
            .then((response) => {
              this.purchases_lines = response.data;
              // this.sumItem(response.data);
              this.sumTotal(response.data);
              this.btnGenerate = true;
            });
      }
    },
    deleteUnit(linkId) {
      if (linkId != null) {
        axios
          .post("api/v1/purchase/delete/purchaseline/" + linkId)
          .then((response) => {
            this.purchases_lines = response.data;
          });
      }
    },
    getMessage(title, messsatetext, confirm, id) {
      this.title = title;
      this.message = messsatetext;
      this.confirm = confirm;
      this.code = id;
    },
    messagegetconfirm(confirm) {
      if (confirm == "crate") {
        this.btnGenerate_code("crate");
      }
      if (confirm == "delelink") {
        this.deleteUnit(this.code);
      }
    },
    autoUpdate(purline) {
      for (var i = 0; i <= 100000; i++) {
        if (i === 100000)
          alert(
            // purline.id +
            //   "  " +
            purline.document_no +
            "  " +
            purline.description +
            "  " +
            purline.product_no
          );
      }
    },
    searchproduct(txt) {
      axios.get('/api/v1/purchase/search/' + txt)
        .then((response) => {
          this.boompros = response.data;
        });
    },
    getproduct(boom, product, txt) {
      if (txt == 'boomproducr') {
        product.product_no = boom.product_no;
        product.description = boom.description;
        this.autoUpdatePurline(product);
      }
      if (txt == 'boomunit') {
        product.unit_of_measure_code = boom.variant_unit_of_measure_code;
        this.autoUpdatePurline(product);
      }
      if (txt == 'linkunit') {
        product.unit_of_measure_code = boom.variant_unit_of_measure_code;
        product.unit_price = boom.unit_price;
        product.curency_code = boom.curency_code;
        this.autoUpdatePurline(product);
      }
    },
    prooductboom() {
      axios.get('/api/v1/getproductboom/' + this.products)
        .then((response) => {
          this.boompros = response.data;
        })
    },
    autoUpdatePurline(purline) {
      purline.total_amount = parseFloat(purline.inventory) * parseFloat(purline.unit_price);
      axios.post( "/api/v1/purchase/update/purchaseline/" + purline.document_no, purline )
        .then((res) => {
          this.sumTotal(res.data);
          this.purchases_lines = res.data;
          this.inventory = 0;
        });
    },
    autoUpdateProduct(purform) {
      if (purform.document_no != "") {
        axios
          .post(
            "api/v1/purchase/update/purchaseorder/" + purform.document_no,
            purform
          )
          .then((response) => {
            this.purchases_lines = response.data;
          });
      }
    },
    getboomnit(proid) {
      axios.post('/api/v1/products/getboomline/' + proid)
        .then((response) => {
          this.uints = response.data;
          console.log(response.data);
        })
    },   
     getunit(proid){
      axios.post('/api/v1/purchase/delete/getPrulinkUnit/'+proid)
                  .then((response)=>{        
                     this.boomunits = response.data;
           })
    },
    print() {
      var printContents = document.getElementById("purchaseorder").outerHTML;
        document.body.innerHTML = printContents;
        window.print();
        window.location.reload();
    },
    getExcelData(event){
      this.exefile='';
     const titlered = document.getElementById("titlered");
     titlered.style.color = '326c7a';
      this.items = [];
      let xlsxfile = event.target.files ? event.target.files[0] : null;
      readXlsxFile(xlsxfile).then((rows) => {
        var x=0;
        rows.forEach(element => {
            if(x>=0){
                if(x==0){
                  this.checkexcel = element;
                 }else{
                    if(this.checkexcel[0]=='id' && this.checkexcel[1]=='product_no' && this.checkexcel[2]=='description' && this.checkexcel[3]=='unit_of_measure_code' && this.checkexcel[4]=='inventory' && this.checkexcel[5]=='unit_price' && this.checkexcel[6]=='total_amount'){
                      this.items.push({
                            id:x,
                            document_no: this.form.document_no,
                            document_type: this.form.document_type,
                            product_no: element[1],
                            description: element[2],
                            unit_of_measure_code: element[3],
                            inventory: element[4],
                            unit_price: element[5],
                            total_amount: element[6], 
                            curency_code: this.form.curency_code,
                        });
                    }else{ console.log(element);

                      this.exefile=' fail data ';
                      titlered.style.color = 'red';
                    
                    }
                }
            } 
            x++;
            this.sumTotal(this.items);
        });
      })
      this.exefile='';
    },
    saveprulink(){
      if(this.items.length > 0){ setTimeout(() => this.savepru(), 500);}
    },
  savepru(){
            axios.post('/api/v1/purchase/PrulinkeSave/',this.items[this.checkarray]).then((response) => { 
              this.massege = this.items[this.checkarray-1].product_no + ' / '+ this.items[this.checkarray-1].description;
              this.massege +=" : "+ this.items[this.checkarray].product_no + ' / '+ this.items[this.checkarray].description;
              this.massege +=" : "+ this.items[this.checkarray+1].product_no + ' / '+ this.items[this.checkarray+1].description;
             });
        if(this.checkarray < this.items.length ){
              this.saveprulink();
              this.checkarray++;
              this.meassagechek('open');
        }else{
          this.meassagechek('close');
          this.checkarray = 0;
        }
     },
    save(){
      this.excel = 'Import';
      this.productline =0;
      this.total = 0;
      this.items = [];
      this.item = 0;
    },
     meassagechek(check){
      var modal = document.getElementById("myModalauto");
        if(check =='open'){
          modal.style.display = "block";
        }else{
          axios.post("api/v1/purchase/addrow/purchaseline/" + this.purchases)
                  .then((response) => {
                    this.purchases_lines = response.data;
                    modal.style.display = "none";
              });
        }
      },
      exportSheet() { 
          this.items = [];
          this.purchases_lines.forEach(element => {
          console.log(element);
          this.items.push({
                      document_no: element.document_no,
                      document_type: element.document_type,
                      product_no: element.product_no,
                      description: element.description,
                      unit_of_measure_code: element.unit_of_measure_code,
                      inventory: element.inventory,
                      unit_price: element.unit_price,
                      total_amount: element.total_amount, 
                      curency_code: element.curency_code,
              })
        });
        this.excel = 'Export';
      },
      exportdataExcel(){
              const invoices = this.items.reduce((ac, element) => { 
                    ac.push({ 
                      document_no: element.document_no,
                      document_type: element.document_type,
                      product_no: element.product_no,
                      description: element.description,
                      unit_of_measure_code: element.unit_of_measure_code,
                      inventory: element.inventory,
                      unit_price: element.unit_price,
                      total_amount: element.total_amount, 
                      curency_code: element.curency_code,
                    }); 
                    return ac;
                }, []);
                var invoicesWS = XLSX.utils.json_to_sheet(invoices)
                var wb = XLSX.utils.book_new() 
                XLSX.utils.book_append_sheet(wb, invoicesWS, 'PruchecLink') 
                XLSX.writeFile(wb, 'PruchecLink.xlsx')
      }
  },
  startCountdown: function () {
    this.counting = true;
  },
  onCountdownEnd: function () {
    this.counting = false;
  },
};
</script>