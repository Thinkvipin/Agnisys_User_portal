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
        // @if(Session::get('role') != 'user' || Session::get('role') != 'User')
        //   @include('admin.includes.sidebar')
        // @else
        //   @include('admin.includes.sidebar1')
        // @endif
        ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
          </ol>

          
          <!-- include summernote css/js -->
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                Create Notifications</div>
            <div class="card-body">
              
            <form method="post" action="{{ URL::to('dashboard/edit-notification')}}">
              @csrf
            <input type="hidden" name="id" value="{{@$notification[0]->id}}" />
                  <div class="form-group row">
                      <label for="fname" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                      <div class="col-md-6">
                      <input id="title" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" value="{{@$notification[0]->title}}"name="title"  required autofocus>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Content') }}</label>

                      <div class="col-md-6">
                          <textarea id="add-notification" name="text" type="text" class="form-control"></textarea>
                          <a href="https://guides.github.com/features/mastering-markdown/">
                            &nbsp;&nbsp;Styling with Markdown is supported
                          </a><br><br>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="fname" class="col-md-2 col-form-label text-md-right">{{ __('Mention Employees') }}</label>

                      @if($notification[0]->assignees != null && $notification[0]->assignees != 'N;')
                                <?php $ass = json_decode($notification[0]->assignees); $n='';?>
                                @foreach($users as $u)

                                        @foreach($ass as $a)
                                        
                                                @if($u->id == $a->id)
                                                 <?php $n .= '@'.$u->username;?>
                                                @endif
                                        @endforeach
                                @endforeach
                        @endif
                      <div class="col-md-6">
                          <textarea id="med" name="mentionUser" type="text" class="form-control"  placeholder="Use @ for mention"
                      value="">{{$n}}</textarea>
                          <p>For All mention none</p>
                        </div>
                  </div>
                  <div class="form-group row">
                      <label for="fname" class="col-md-2 col-form-label text-md-right">{{ __(' ') }}</label>
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                  </div>
              </form>

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
    simplemde.value("{{@$notification[0]->text}}");

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