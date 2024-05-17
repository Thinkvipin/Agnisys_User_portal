
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        Add</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="{{URL::to('dashboard/s/add-company')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          
                                                        <input type="hidden" name="id" value=""/>
                                                          
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="name" id="inputEmail3"  required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputdomain3" class="col-sm-2 col-form-label">Company Domain Name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="domain" id="inputdomain3"  required>
                                                            <span>Example 2 doamin name - wdc.com and firsteda.com <b>Write - wdc,firsteda</b></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="address" id="inputPassword3" required >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="phone" id="inputPassword3" >
                                                                </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Finance contact</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="fContact" id="inputEmail3"  required>
                                                            <span>comma seperated</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Technical contact</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="techContact" id="inputPassword3"  required>
                                                            <span>comma separated</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Software contact</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text" class="form-control" name="swContact" id="inputPassword3" required >
                                                                <span>comma separated</span>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Logo</label>
                                                                <div class="col-sm-10">
                                                                        <input type="file" class="form-control" name="logo" id="inputPassword3" >
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button type="submit" class="btn btn-primary">Add</button>
                                                            </div>
                                                        </div>
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
            
            
    
@endsection
        