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
              <a href="{{URL::to('/')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Discussions</li>
            <li class="breadcrumb-item active">All discussions</li>
          </ol>

          
          <div class="card mb-3">
            <div class="card-header">
              <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" title="It starts new discussion">New discussion</button>
            </div>
          </div>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              All disussion</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Topic</th>
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
                            <td><a href="{{ URL::to('dashboard/issue/'.$issue->id) }}" target="_blank" >{{ $issue->topic }}</a></td>
                            <td>{{ $issue->label }}</td>
                            <td>{{ $issue->priority }}</td>
                            <td>{{ $issue->status }}</td>
                            <td>{{ date("d-M-Y",strtotime($issue->created_at))}}</td>
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
            <div class="card-footer small text-muted"></div>
          </div>

        </div>
        <!-- /.container-fluid -->

        @include('admin.includes.footer')
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">New Discussion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="{{ URL::to('dashboard/add-issue') }}" method="POST">                           
                @csrf
                    
                      <div class="form-group">
                          <label for="exampleInputEmail1">Discussion Topic</label>
                          <input type="text" name="topic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter discussion ">
                      </div>
                      <textarea id="add-comment" name="commentText"> </textarea>
                      
                      {{-- <a id="md-link" href="https://guides.github.com/features/mastering-markdown/">
                        &nbsp;&nbsp;Styling with Markdown is supported
                      </a><br><br> --}}
                      <div class="form-group row">
    
                          <div class="col-md-9">
                              <textarea id="med" name="mentionUser" type="text" class="form-control" placeholder="Mention Using @"></textarea>
                              <p>For All mention none</p>
                            </div>
                      </div>
                      <div class="form-row">
                      <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Label</div>
                            </div>
                            <select name="label" class="form-control">
                                <option value="Bug">Bug</option>
                                <option value="Feature">Feature</option>
                                <option value="Inquiry">Inquiry</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Priority</div>
                            </div>
                            <select name="priority" class="form-control">
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Status</div>
                            </div>
                            <select name="status" class="form-control">
                                <option value="To do">To do</option>
                                <option value="In Review" >In Review</option>
                                <option value="Closed">Closed</option>
                                <option value="In Progress">In Progress</option>
                                <option value="On hold">On hold</option>
                            </select>
                          </div>
                      </div>
                      </div>
                                            
                      <button class="btn btn-primary" type="submit" style="position:absolute; right:13px;bottom:18px;">Create</button>
                
              </form>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div> -->
        </div>
      </div>
    </div>

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

  // var simplemde = new SimpleMDE({
  //     element: document.getElementById("add-comment"),
  // });

  //simplemde.value("This text will appear in the editor");


function cnvt_md(md){
  var converter = new showdown.Converter();
  var html = converter.makeHtml(md);
  return html;
}
tinymce.init({
  selector: 'textarea#add-comment',  // change this value according to your HTML
  plugins : 'advlist autolink link image lists charmap print preview',
  images_upload_url: "{{URL::to('upload')}}",
//   images_upload_base_path: '/some/basepath',
//   images_upload_credentials: true,
  images_upload_handler: function (blobInfo, success, failure) {
      var xhr, formData;
      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', "{{URL::to('upload')}}");
      xhr.onload = function() {
        var json;

        if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
        }
        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
        }
        success(json.location);
      };
      formData = new FormData();
      formData.append('_token', "{{csrf_token()}}");
      formData.append('file', blobInfo.blob(), blobInfo.filename());
      xhr.send(formData);
      }
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
				// }]
			});

      
</script>
@endsection


