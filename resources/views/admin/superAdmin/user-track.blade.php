@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Users Logs</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            User Logs
                            <a href="https://www.portal.agnisys.com/dashboard/s/userlogs/exportExcel" class="btn btn-success" style="background:#38c172;float:right">Export User Data </a>
                        </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                            
                                            <th class="sorting_desc">Login Time</th>
                                            <th>Logout Time</th>
                                            <th>Email</th>
                                            <th>URL</th>
        
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php  $excludeEmail = "@gmail";?>
                                          @foreach ($userlogs as $userlog)
                                            @if($userlog->url)
                                              @if (strpos($userlog->email, $excludeEmail) == false)
                                                  <tr>
                                                     
                                                     <td>{{$userlog->login_time}}</td>
                                                     <td>{{$userlog->logout_time }}</td>
                                                     <td>{{ucwords($userlog->email)}}</td>
                                                     
                                                     <td><?php 
                                                          if($userlog->url){
                                                            $str_arr = explode (",", $userlog->url); 
                                                            $i=1;
                                                            foreach ($str_arr as $key => $val) {  
                                                               echo $i.". ".$val."<br>";
                                                               $i++;
                                                            }
                                                          }
                                                     ?>   
                                                     </td>
                                                   </tr>
                                               @endif
                                            @endif
                                          @endforeach
                                      </tbody>
                                    </table>
                              </div>
                            </div>
                      </div>
            
            
    
@endsection
        