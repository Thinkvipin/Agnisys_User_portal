
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Update User</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        Update</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form id="userupdate" action="{{URL::to('dashboard/s/edit-employee')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          
                                                        <input type="hidden" name="id" value="{{$user[0]->id}}"/>
                                                        <input type="hidden" name="type" value="{{$user[0]->type}}"/>
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">First name</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="fname" value="{{$E_data[0]->first_name}}" id="inputEmail3">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Last name</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="lname" value="{{$E_data[0]->last_name}}" id="inputPassword3">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="email" value="{{$user[0]->email}}" id="inputPassword3">
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group row">-->
                                                        <!--    <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>-->
                                                        <!--    <div class="col-sm-10">-->
                                                        <!--            <input type="text" class="form-control" name="username" value="{{$user[0]->username}}" id="inputPassword3">-->
                                                        <!--    </div>-->
                                                        <!--</div>     -->
                                                        <?php 
                                                            $roleArray = array('Registered','Customer','Subscriber','Admin');
                                                        
                                                        ?>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Employee type</label>

                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="role" id="inputPassword3"  >
                                                                                <?php
                                                                                foreach($roleArray as $roleValue) {
                                                                                ?>
                                                                                    <?php 
                                                                                        if($roleValue == $user[0]->role){

                                                                                         ?> 
                                                                                            <option value="<?php echo $roleValue; ?>" selected><?php echo $roleValue;?></option> 

                                                                                        <?php 
                                                                                        }
                                                                                        else{
                                                                                        ?>
                                                                                            <option value="<?php echo $roleValue; ?>"><?php echo $roleValue;?></option>   
                                                                                        <?php
                                                                                        }
                                                                                        ?>





                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                <!--<option value="Registered">Registered User</option>-->
                                                                                <!--<option value="Customer">Customer</option>-->
                                                                                <!--<option value="Subcriber">Subscriber</option>-->
                                                                                <!--<option value="Admin">Admin</option>-->
                                                                        </select>
                                                                </div>
                                                        </div>  
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">User Company</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="{{$user[0]->company}}" id="inputPassword3" disabled>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Company</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="cid" id="inputPassword3"  >
                                                                                <option value="0">Select...</option>
                                                                                @foreach ($companies as $item)
                                                                                        <option value="{{$item->id}}" @if($item->id == $user[0]->cid){{__('selected')}}@endif>{{$item->name}}</option>
                                                                                @endforeach
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                                            <div class="col-sm-10">
                                                                    <!--<input type="text" class="form-control" name="username" value="{{$user[0]->username}}" id="inputPassword3">-->
                                                                    <input type="text" class="form-control" name="password" value="" id="inputPassword3">
                                                                    <span>Entering new will override current password</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button type="submit" id="submit-btn" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
            
    
    
@endsection
       