
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Update License</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                          Update License </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="{{URL::to('dashboard/s/license-edit')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                                        <?php

                                                            $selected_product_names = '';
                                                            foreach( $selectedproduct as $key => $value ) {
                                                                $selected_product_names .= $value->name . ', ';
                                                            }
                                                            $product_names = '';
                                                            $validityDate = unserialize($license[0]->validity_date);
                                                            $quantities = unserialize($license[0]->quantity);
                                                            
                                                        ?>
                                                          
                                                        <input type="hidden" name="id" value="{{$license[0]->id}}"/>
                                                        <div class="form-group row box-section">
                                                            <div class="col-sm-4">
                                                                <label for="inputEmail3" class=" col-form-label">Product</label>
                                                                <span >
                                                                <?php
                                                                    foreach( $selectedproduct as $key => $value ) {
                                                                    ?>
                                                                        <input type="text" class="form-control" name="products" value="{{$value->name}}" disabled> 
                                                                    <?php
                                                                    }
                                                                ?>
                                                                </span>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="inputEmail3" class=" col-form-label">Quantity</label>
                                                                <span >
                                                                <?php
                                                                    foreach($quantities as $quantity){
                                                                    ?>
                                                                        <input type="text" class="form-control"  value="{{$quantity}}" name="quantity[]" id="inputPassword3" disabled>
                                                                    <?php
                                                                    }
                                                                ?>
                                                                </span>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="inputEmail3" class=" col-form-label">Expiry Date</label>
                                                                <span>
                                                                <?php foreach($validityDate as $date){
                                                                    
                                                                       
                                                                       ?>
                                                                       <input type="text" class="form-control expiryDate"  value="{{$date}}" name="date[]" disabled>
                                                                       <?php
                                                                    } 
                                                                ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">License Key</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="key" value="{{$license[0]->license_key}}"id="inputEmail3" disabled >
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group row">-->
                                                        <!--        <label for="inputEmail3" class="col-sm-2 col-form-label">Selected Product</label>-->
                                                        <!--        <div class="col-sm-10">-->
                                                        <!--        <input type="text" class="form-control" name="products" id="inputEmail3" value="{{$selected_product_names}}" disabled>-->
                                                        <!--        </div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group row">-->
                                                        <!--        <label for="inputPassword3" class="col-sm-2 col-form-label">Product</label>-->
                                                        <!--        <div class="col-sm-10">-->
                                                        <!--                <select class="form-control select-multiple" name="pid[]" id="inputPassword3" multiple="multiple" >-->
                                                        <!--                        <option value="0" >Select...</option>-->
                                                                                <?php   
                                                                                        // function display($pods,$selected){
                                                                                        //         // print_r($cats);
                                                                                        //         foreach ($pods as $pod){
                                                                                        //                 if(isset($pod->name)){
                                                                                        //                         echo '<option value="'.$pod->id.'"';
                                                                                        //                                 if($selected == $pod->id)
                                                                                        //                                 echo 'selected';
                                                                                        //                         echo '>';
                                                                                        //                                 for($i=0;$i<$pod->indent;$i++){
                                                                                        //                                         echo '&nbsp';
                                                                                        //                                 }
                                                                                        //                         echo $pod->name.'</option>';
                                                                                        //                 }
                                                                                        //                 display($pod->childs,$selected);
                                                                                        //         }
                                                                                        // }
                                                                                        
                                                                                        //  display(json_decode($pods),$license[0]->pid);
                                                                                ?>
                                                                                {{-- @foreach ($products as $item)
                                                                                        <option value="{{$item->id}}" 
                                                                                                @if($item->id == $license[0]->pid) 
                                                                                                        {{__('selected')}}
                                                                                                @endif
                                                                                                >{{$item->name}}</option>
                                                                                @endforeach --}}
                                                        <!--                </select>-->
                                                        <!--        </div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group row">-->
                                                        <!--        <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>-->
                                                        <!--        <div class="col-sm-10">-->

                                                        <!--        <input type="text" class="form-control"  value="{{$license[0]->quantity}}" name="quantity" id="inputPassword3" >-->
                                                        <!--        </div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group row">-->
                                                        <!--    <label for="inputPassword3" class="col-sm-2 col-form-label">Expire Date</label>-->
                                                        <!--    <div class="col-sm-10">-->
                                                        <!--      <input type="text" class="form-control" name="date" value="{{$license[0]->validity_date}}" id="to"  >-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        <!-- <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">duration</label>
                                                                <div class="col-sm-10">
                                                                        <input type="number" class="form-control" name="duration" value="{{$license[0]->duration}}" id="inputEmail3"  placeholder="6" required>
                                                                        <span style="color:#ddd;font-size:12px;">Example 6 weeks</span>
                                                                </div>
                                                        </div> -->
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Company name</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" name="company" value="{{$company[0]->name}}" class="form-control" disabled/>
                                                                        <input type="hidden" name="cid" value="{{$company[0]->id}}" />

                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License type</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" value="{{$license[0]->type}}" class="form-control" disabled>
                                                                        <!--<select class="form-control" name="type_" id="inputPassword3"  >-->
                                                                        <!--        <option value="0" >Choose one</option>-->
                                                                        <!--        <option value="temp"-->
                                                                                <!--        @if($license[0]->type == 'temp') -->
                                                                                <!--                {{__('selected')}}-->
                                                                                <!--        @endif>Temporary</option>-->
                                                                                <!--<option value="full"-->
                                                                                <!--        @if($license[0]->type == 'full')  -->
                                                                                <!--                {{__('selected')}}-->
                                                                                <!--        @endif>Full</option>-->
                                                                        <!--</select>-->
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License type 2</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" value="{{$license[0]->type1}}" class="form-control" disabled>
                                                                        <!--<select class="form-control" name="type1" id="inputPassword3"  >-->
                                                                        <!--        <option value="alm" -->
                                                                        <!--                @if($license[0]->type1 == 'alm') -->
                                                                        <!--                        {{__('selected')}}-->
                                                                        <!--                @endif>ALM Floating licence</option>-->
                                                                        <!--        <option value="node"-->
                                                                        <!--                @if($license[0]->type1 == 'node') -->
                                                                        <!--                        {{__('selected')}}-->
                                                                        <!--                @endif>Node Lock license</option>-->
                                                                        <!--</select>-->
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Current License file</label>
                                                                <div class="col-sm-10">
                                                                    @if($license[0]->file !='')
                                                                        <a class="btn " download target="_blank" href="{{asset('public/license_files')}}/{{$license[0]->file}}"><i class="fas fa-download"></i></a>
                                                                    @else
                                                                            No file found
                                                                    @endif
                                                                </div>
                                                        </div>
                                                        <!--<div class="form-group row">-->
                                                        <!--        <label for="inputPassword3" class="col-sm-2 col-form-label">License file</label>-->
                                                        <!--        <div class="col-sm-10">-->
                                                                        
                                                        <!--                    <input type="file" class="form-control"  value="{{$license[0]->file}}" name="licenseFile" id="inputPassword3">-->
                                                                        
                                                        <!--        </div>-->
                                                        <!--</div>-->
                                                                
                                                        <!--<div class="form-group row">-->
                                                        <!--    <div class="col-sm-10">-->
                                                        <!--      <button type="submit" class="btn btn-primary">Update</button>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
            
            
    
@endsection
        