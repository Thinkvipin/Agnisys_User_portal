
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All Cases</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All Cases  <?php
                                    if(isset($obj->data->cases)){    
                                    ?>
                                        ({{$obj->data->count}} )</div>
                                    <?php
                                    }
                                    ?>
                                    
                        
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th>Case ID</th>
                                    <!--<th>Label</th>-->
                                    <th>Topic</th>
                                    <th>Company</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Start date</th>
                                    <th>Assigned To</th>
                                </tr>
                              </thead>
                              {{-- <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Label</th>
                                    <th>Topic</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Start date</th>
                                    <th>Assigned To</th>
                                </tr>
                              </tfoot> --}}
                              <tbody>
                               <?php
                               if(isset($obj->data->cases)){
                               ?> 
                                       @foreach ($obj->data->cases as $case)
                                            <tr>
                                              <td>{{$case->ixBug}}</td>
                                              <!--<td>{{$case->sCategory}} {{ $case->ixCategory}}</td>-->
                                              <td><a href="https://agnisys.manuscript.com/default.asp?{{$case->sTicket}}" target="_blank">{{$case->sTitle}}</a></td>
                                              <td>
                                                <?php 
                                                $mail = explode('<',$case->sCustomerEmail);
                                                try{
                                                   $website = explode('@',$mail[1]);
                                                   $company = explode('.',$website[1]);
                                                   echo "<span class='capitalise'> ".$company[0]."</span>";
                                                }
                                                catch(Exception $e) {
                                                  echo 'Message: ' .$e->getMessage();
                                                }
                                               
                                                ?>
                                              </td>
                                              <td>{{$case->ixPriority}}-{{$case->sPriority}}</td>
                                              <td>{{$case->sStatus}}</td>
                                              <td><?php $dt = explode('T',$case->dtOpened);echo $dt[0];?></td>
                                              <td>{{$case->sPersonAssignedTo}}</td>
                                            </tr>
                                           
                                       @endforeach
                                
                                <?php
                                }
                                else{
                                ?>
                                    <tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">Fogbugz API Logoff, Please go to <a href="{{ URL::to('dashboard')}}"><u>Dashboard</u></a> to get all Cases</td></tr>
                                 
                                <?php   
                                    
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
@endsection
        