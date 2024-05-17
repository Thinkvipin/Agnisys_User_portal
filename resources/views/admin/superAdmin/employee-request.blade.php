
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Requested Users</li>
                      </ol>
            
                      
                      <div class="alert alert-primary" role="alert">
                            Press user slash button to allow new request user to authenticate 
                          </div>
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        Requested Users <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('user-deleteall') }}" >Delete All Selected</button></div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>company</th>
                                    <th>Role</th>
                                    <th>Action</th>

                                </tr>
                              </thead>
                              {{-- <tfoot>
                                <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>company</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                </tr>
                              </tfoot> --}}
                              <tbody>
                                  <?php $i =1; ?>
                                  @foreach ($employeesAll as $employee)
                                  <tr>
                                     <td><input type="checkbox" name="ids" class="checkBoxClass sub_chk" value="{{$employee->id}}"></td>
                                     <td>{{$i++}}</td>
                                     <td>{{ucwords($employee->name)}}</td>
                                     <td>{{$employee->email}}</td>
                                     <td>
                                        @foreach($cmps as $c)
                                            @if($c->id == $employee->cid)
                                             {{ucwords($c->name) }}
                                            @endif
                                        @endforeach
                                    </td>
                                     <td>{{$employee->role}}</td>
                                     <td>
                                        {{-- <a class="btn bg-success" href="{{URL::to('dashboard/edit-employee')}}/{{$employee->id}}"><i class="fas fa-pencil-alt"></i></a> --}}
                                        <a class="btn bg-danger" href="{{URL::to('dashboard/delete-employee')}}/{{$employee->id}}"><i class="fas fa-trash-alt"></i></a>
                                        <a class="btn bg-danger" href="{{URL::to('dashboard/edit-employee')}}/{{$employee->id}}"><i class="fas fa-pencil-alt"></i></a>
                                        @if($employee->status == true)
                                          <a href="{{URL::to('dashboard/disable-employee')}}/{{$employee->id}}" class="btn btn-success bg-success"><i class="fas fa-user-alt"></i></a></td>
                                        @else 
                                          <a href="{{URL::to('dashboard/enable-employee')}}/{{$employee->id}}" class="btn btn-danger bg-danger"><i class="fas fa-user-alt-slash"></i></a></td>
                                        @endif
                                   </tr>
                                  @endforeach
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
<!-- loader style -->
<style>
.main-loader{
position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background:rgb(0 0 0 / 70%);
  display:none;
}
.loader {
  position:absolute;
  left:50%;
  top:50%;
  
  border: 6px solid #f3f3f3;
  border-radius: 50%;
  border-top: 6px solid #ec4d1b;
  width: 50px;
  height:50px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>        
<div class="main-loader"><div class="loader"></div></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
$(document).ready(function () {
    $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).val());
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
                
                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  

                    $(".main-loader").fadeIn();
                    var join_selected_values = allVals.join(","); 

                    
                    $.ajax({
                       type: "POST",
                       data: {ids:join_selected_values, _token: '{{csrf_token()}}'},
                       headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                       url: "https://www.portal.agnisys.com/dashboard/s/user-deleteall",
                       success: function(data){
                          // create an object with the key of the array
                          
                         if(data['success']){
                            $(".main-loader").fadeOut();
                            $(".sub_chk:checked").each(function() {  
                                $(this).parents("tr").remove();
                            });
                            alert(data['success']);
                            
                            if(data['success']){
                               location.reload(); 
                            }
                         }else if (data['error']) {
                            $(".main-loader").fadeOut();
                            alert(data['error']);
                         } else {
                            $(".main-loader").fadeOut();
                            alert(data);
                            alert('Whoops Something went wrong!!');
                         }
                       },
                       error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }  
            }  
    });
});
</script> 
    
@endsection


        