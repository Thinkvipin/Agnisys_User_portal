
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add</li>
                      </ol>
            
                      
                      
                       <!-- DataTables Example -->
          <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                            Profile</div>
                        <div class="card-body">
                          <div class="table-responsive">
                                    <form action="{{URL::to('dashboard/s/edit')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            
                                                    <input type="hidden" name="refId" value="{{session::get('refId')}}"/>
                                                    <input type="hidden" name="id" value="{{session::get('cid')}}"/>
                                                    
                                                    <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Company name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="name" value="{{$company[0]->name}}" id="inputEmail3"  >
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="address" value="{{$company[0]->finance_contact}}" id="inputEmail3"  >
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Technical Contact</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="phone" value="{{$company[0]->technical_contact}}" id="inputPassword3" >
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">License SW Contact</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="phone" value="{{$company[0]->license_sw_contact}}" id="inputPassword3" >
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
        