
@extends('layouts.s_admin')
              
@section('sContent')
    
              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">License View</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                          License </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="{{URL::to('dashboard/s/license-request')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                                        <input type="hidden" name="id" value="{{@liicense[0]->id}}"/>
                                                          
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">License Key</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" value="{{@liicense[0]->license_key}}" name="key" id="inputEmail3"  >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Product</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="{{@$product[0]->name}}" name="key" id="inputEmail3"  >
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Start Date</label>
                                                            <div class="col-sm-10">
                                                              <input type="date" class="form-control" name="date" value="{{@liicense[0]->start_date}}"id="inputPassword3"  >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">duration</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="duration" value="{{@liicense[0]->duration}}" id="inputEmail3"  placeholder="6" required>
                                                                        <span style="color:#ddd;font-size:12px;">in weeks</span>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Company name</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="{{@$company[0]->name}}" name="key" id="inputEmail3"  >
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License type</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="type_" id="inputPassword3"  >
                                                                                <option value="0" >Choose one</option>
                                                                                <option value="temp">Temporary</option>
                                                                                <option value="full">Full</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                                                                <div class="col-sm-10">
                                                                <input type="email" class="form-control"  value="{{@liicense[0]->quantity}}" name="quantity" id="inputPassword3">
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License file</label>
                                                                <div class="col-sm-10">
                                                                        <input type="file" class="form-control"  value="{{asset('license_files')}}/{{@liicense[0]->file}}" name="licenseFile" id="inputPassword3">
                                                                </div>
                                                        </div>
                                                        <a href="{{asset('public/license_files')}}/{{@liicense[0]->file}}" target="_blank" class="btn bg-primary">Download license file</a>
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
        