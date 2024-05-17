
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All Notifications</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All Notifications</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                                        <tr>
                                                            <th>SNo</th>
                                                            <th>Topic</th>
                                                            <th>Type</th>
                                                            <th>date</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                      </thead>
                                                      {{-- <tfoot>
                                                        <tr>
                                                            <th>SNo</th>
                                                            <th>Topic</th>
                                                            <th>Type</th>
                                                            <th>Start date</th>
                                                            <th>Action</th>

                                                        </tr>
                                                      </tfoot> --}}
                                                      <tbody>
                                                        <?php $i = 0;?>
                                                        @foreach ($notifications as $notification)
                                                          
                                                         
                                                                <tr >
                                                                    <td>{{ ++$i }}</td>
                                                                    {{-- <td>{{ $n[0]->id, Session::get('uid') }}</td> --}}
                                                                    <td><a href="{{ URL::to('dashboard/notification/'.$notification->id) }}">
                                                                      
                                                                        {{ $notification->title}}
                                                                      
                                                                      </a>
                                                                    </td>
                                                                    <td>
                                                                      @if($notification->type == 'danger')
                                                                        {{ __('Global') }}
                                                                      @else
                                                                        {{-- {{ __('Company') }} --}}
                                                                        @if(isset($notification->companies) && $notification->companies != null) 
                                                                            <?php $clist = unserialize($notification->companies);
                                                                              $cmps = \App\company::select('name')->whereIn('id',$clist)->get();
                                                                              foreach($cmps as $c)
                                                                              {
                                                                                echo $c->name.'<br>';
                                                                              }
                                                                            ?> 
                                                                        @endif

                                                                      @endif
                                                                    </td>
                                                                  
                                                                    <td>{{ date("d-M-Y",strtotime($notification->created_at)) }}</td>
                                                                    <td>
                                                                        <a class="btn bg-success" href="{{URL::to('dashboard/s/edit-notification')}}/{{$notification->id}}"><i class="fas fa-pencil-alt"></i></a>
                                                                        <a class="btn bg-danger" href="{{URL::to('dashboard/s/delete-notification')}}/{{$notification->id}}"><i class="fas fa-trash-alt"></i></a>
                                                                        <a class="btn" href="{{ URL::to('dashboard/s/notification/'.$notification->id) }}"><i class="far fa-eye"></i></a>
                                                                    </td>
                                                                </tr>
                                                             
                                                        @endforeach
                                                        
                                                        
                                                        
                                                      </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
@endsection
        

@section('custom_js')
<script>
 
 function cmp(){
    
    
      $("[class=clist]").each(function(){

        var clist = $(this).html();
        var ele = $(this);

        $.get( "{{URL::to('api/company-list')}}?cmps="+clist, function( data ) {
          console.log("{{URL::to('api/company-list')}}?cmps="+clist);
          ele.html(data);
        });

      });
 
  
 }
 cmp();

</script>

                     

@endsection