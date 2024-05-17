@extends('layouts.base')


@section('content')



@include('admin.includes.ag-header')
    
    <div id="wrapper">

         @if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' )
          @include('admin.includes.sidebar')
        @else
          @include('admin.includes.sidebar1')
        @endif
        <?php
        // @if($data['userType'] == 'm')
        //   @include('admin.includes.sidebar')
        // @endif
        // @if($data['userType'] == 'e')
        //   @include('admin.includes.sidebar')
        // @endif
        ?>
        
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Team</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                Edit team</div>
            <div class="card-body">
              <div class="table-responsive">
                        <form action="{{URL::to('dashboard')}}/create-team" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                        <input type="hidden" name="cid" value="{{session::get('cid')}}"/>
                                        
                                        <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" value="{{@$team[0]->name}}" id="inputEmail3"  placeholder="Name of the team" required>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Tag</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tag" value="{{@$team[0]->tag}}" id="inputPassword3" placeholder="Ex: tag_mark1" required>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="text" class="col-md-2 col-form-label ">{{ __('Work') }}</label>
                                
                                                <div class="col-md-6">
                                                        <textarea id="add-notification" name="work" type="text" class="form-control" ></textarea>
                                                        <a href="https://guides.github.com/features/mastering-markdown/">
                                                        &nbsp;&nbsp;Styling with Markdown is supported
                                                        </a><br><br>
                                                </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                                <label for="fname" class="col-md-2 col-form-label ">{{ __('Mention Employees') }}</label>
                                
                                                <div class="col-md-6">
                                                        <textarea id="med" name="assignees" type="text" class="form-control" placeholder="Use @ for mention"></textarea>
                                                        <p>For All mention none</p>
                                                </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Add employees</label>
                                            <div class="col-sm-10">
                                                    
                                                <ul class="list-group" style="width:50%;overflow-y:scroll;height:200px;">
                                                    
                                                    @foreach ($users as $u)
                                                      <li class="list-group-item d-flex justify-content-between align-items-center">
                                                          
                                                        {{$u['username']}}
                                                            
                                                      <input class="" type="checkbox" name="assignees[]" value="{{$u->id}}" 
                                                      @if($team[0]->assigned_to != 'N;' && $team[0]->assigned_to != null)
                                                        <?php $seq = unserialize($team[0]->assigned_to);?> 
                                                        @foreach($seq as $s)
                                                           
                                                                @if($u->id == $s)
                                                                  {{__('checked')}}
                                                                @else
                                                                  {{__('')}}
                                                                @endif
                                                           
                                                                
                                                        @endforeach
                                                       @else
                                                        {{__('')}}
                                                       @endif

                                                      />
                                                      </li>
                                                    @endforeach
                                                    
                                                  </ul>
                                                    
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update    </button>
                                                </div>
                                        </div>
                                              
                        </form>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        @include('admin.includes.footer')
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you Sure you .</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" 
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection


@section('custom_js')
<script>

    var simplemde = new SimpleMDE({
        element: document.getElementById("add-notification"),
    });
    simplemde.value(
            `{{@$team[0]->work}}`
            );

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