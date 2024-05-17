
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        Edit</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="{{URL::to('dashboard/s/edit')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          
                                                          <input type="hidden" name="id" value="{{$company[0]->id}}"/>
                                                          
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="name" id="inputEmail3" value="{{$company[0]->name}}"  required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputdomain3" class="col-sm-2 col-form-label">Company Domain Name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="domain" id="inputdomain3" value="{{$company[0]->domain}}"  required>
                                                            <span>Example 2 doamin name - wdc.com and firsteda.com Write - wdc,firsteda</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="address" id="inputPassword3" value="{{$company[0]->address}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="phone" id="inputPassword3" value="{{$company[0]->phone}}" >
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Finance contact</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="fContact" id="inputEmail3"  value="{{$company[0]->finance_contact}}" required>
                                                                <span>coma seprated</span>                                                              
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Technical contact</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="techContact" id="inputPassword3"  value="{{$company[0]->technical_contact}}" required>
                                                                <span>coma seprated</span>                                                              
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">SW contact</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="swContact" id="inputPassword3"  value="{{$company[0]->license_sw_contact}}" required>
                                                                <span>coma seprated</span>                                                              
                                                                </div>
                                                        </div>                
                                                        <div class="form-group row">
                                                              <label  class="col-sm-2 col-form-label">Current Logo</label>
                                                              <div class="col-sm-10">
                                                                <?php
                                                                if($company[0]->logo != ''){
                                                                ?>
                                                                    <img src="{{asset('public/logo_files')}}/{{$company[0]->logo}}" style="width:auto;height:70px;"/>
                                                                <?php

                                                                }
                                                                else{

                                                                ?>
                                                                  <img src="{{asset('images/no-image-found.png')}}" style="width:auto;height:35px;"/>
                                                                <?php

                                                                }
                                                                ?>
                                                                
                                                              </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Logo</label>
                                                                <div class="col-sm-10">
                                                                        <input type="file" class="form-control" name="logo" id="inputPassword3"  >
                                                                        <span>Uploading new will override current</span>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
@endsection
        