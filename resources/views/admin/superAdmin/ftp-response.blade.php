
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">FTP request</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                          FTP request</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="{{URL::to('dashboard/s/ftp-request')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          
                                                        <input type="hidden" name="id" value="{{$ftp[0]->id}}"/>
                                                        <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">FTP URL</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="{{$ftp[0]->ftp_url}}" name="url" id="inputEmail3"  >
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">FTP Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="username" id="inputEmail3"  >
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">FTP Password</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control"  name="pass" id="inputEmail3" value="" >
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">FTP Port</label>
                                                                        <div class="col-sm-10">
                                                                                <input type="text" class="form-control"  name="port"id="inputEmail3" value="" >
                                                                        </div>
                                                                </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Company</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control"  id="inputPassword3"  value="{{$company[0]->name}}" disabled>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">User        </label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control"  id="inputPassword3"   value="All users" disabled>
                                                                </div>
                                                        </div>
                                                                
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
            
            
    
@endsection
        