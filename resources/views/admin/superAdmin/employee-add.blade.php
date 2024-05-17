
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add user</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        Add user</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="{{URL::to('dashboard/s/add-employee')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          
                                                        <input type="hidden" name="id" value=""/>
                                                          
                                                        <div class="form-group row">
                                                            <label for="inputName3" class="col-sm-2 col-form-label">First name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="fname" id="inputName3"  required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Last name</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="lname" id="inputEmail3"  required>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                              <input type="email" class="form-control" name="email" id="inputPassword3"  required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                                                <div class="col-sm-10">
                                                                        <input type="password" class="form-control" name="password" id="inputPassword3"  required>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Company</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="cid" id="inputPassword3"  required>
                                                                                <option value="0">Select...</option>
                                                                                @foreach ($company as $item)
                                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                                @endforeach
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <input type="hidden" name="type" value="e"/>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Employee type</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="role" id="inputPassword3"  required>
                                                                                <option value="Registered">Registered User</option>
                                                                                <option value="Customer" selected>Customer</option>
                                                                                <option value="Subcriber">Subscriber</option>
                                                                                <option value="Admin">Admin</option>
                                                                                
                                                                        </select>
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
        