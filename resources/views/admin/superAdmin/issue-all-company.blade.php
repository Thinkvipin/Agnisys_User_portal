
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{URL::to('/')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">All Discussions</li>
            </ol>

          
          <!-- <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                  <div class="col-md-4">
                      
                  </div>
                </div>
                
            </div>
          </div> -->
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              All Discussion
              <select id="cmp">
                  <option vlaue="0">Select Company...</option>
                  @foreach($companies as $c)
                      <option vlaue="{{$c->id}}">{{$c->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Topic</th>
                        <th>Company</th>
                        <th>Label</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Start date</th>
                        <th>Assigned To</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($issues as $issue)
                        <tr>
                            <td><a href="{{ URL::to('dashboard/s/single-issue/'.$issue->id.'/'.$issue->cid) }}" target="_blank" >{{ $issue->topic }}</a></td>
                            <td>
                              @foreach($companies as $c)
                                @if($c->id == $issue->cid)
                                  {{ ucwords($c->name)}}
                                @endif
                              @endforeach
                            </td>
                            <td>{{ $issue->label }}</td>
                            <td>{{ $issue->priority }}</td>
                            <td>{{ $issue->status }}</td>
                            <td>{{ date("d-M-Y",strtotime($issue->created_at)) }}</td>
                            <td>
                              @if( $issue->assigns != null && $issue->assigns !=  'N;')
                                  <?php $assgning = unserialize($issue->assigns);?>
                                  @foreach ($assgning as $item)
                                      @foreach($users as $u)
                                          @if($u->id == $item)
                                            {{ $u->username.', '}}
                                          @endif
                                      @endforeach
                                  @endforeach
                              @endif
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

    $("#cmp").on("change",function(){
        var cid = $(this).val();
        console.log(cid);
        var url= "{{URL::to('dashboard')}}/s/cmp-issues/"+cid; 
        window.location = url;
    });
    

$("#med").mention({
				users: <?php echo json_encode($users); ?>//[{
				// 	name: 'Lindsay Made',
				// 	username: 'LindsayM'
				// }, {
				// 	name: 'Rob Dyrdek',
				// 	username: 'robdyrdek'
				// }, {
				// 	name: 'Rick Bahner',
				// 	username: 'RickyBahner'
				// }, {
				// 	name: 'Jacob Kelley',
				// 	username: 'jakiestfu'
				// }, {
				// 	name: 'John Doe',
				// 	username: 'HackMurphy'
				// }, {
				// 	name: 'Charlie Edmiston',
				// 	username: 'charlie'
				// }, {
				// 	name: 'Andrea Montoya',
				// 	username: 'andream'
				// }, {
				// 	name: 'Jenna Talbert',
				// 	username: 'calisunshine'
				// }, {
				// 	name: 'Street League',
				// 	username: 'streetleague'
				// }, {
				// 	name: 'Loud Mouth Burrito',
				// 	username: 'Loudmouthfoods'
				// }]
			});

      
</script>
@endsection


