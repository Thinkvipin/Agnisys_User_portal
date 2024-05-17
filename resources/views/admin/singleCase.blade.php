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
            <li class="breadcrumb-item active">Issue</li>
          </ol>

          
                  <div class="issue-container">
                      <script src="{{asset('js/showdown.min.js')}}"></script>
                    <h3>{{ $issueData[0]->topic}}</h3>
                    <div class="row">
                      <div class="col-md-9">
                        
                        @foreach($comments as $comment)

                          <div class="comment-box">
                            <div class="comment-header">
                                <img class="comment-img" src="https://avatars1.githubusercontent.com/u/24919422?s=88&v=4"  />
                            <p><b>{{ $comment->username }}</b> Commented on <span>{{ $comment->created_at}}</span></p>
                            </div>
                            <div class="comment">
                            
                                <script>
                                  var converter = new showdown.Converter();
                                  var md = `{{ $comment->comment}}`;
                                    var html = converter.makeHtml(md);
                                    document.write(html);
                                </script>
                              
                            </div>
                            
                          </div>
                        
                        @endforeach
                        
                      <form action="{{ URL::to('dashboard/add-comment') }}" method="POST">                           
                        @csrf
                        <div class="comment-box">
                            <div class="comment-header">
                                <img class="comment-img" src="https://avatars1.githubusercontent.com/u/24919422?s=88&v=4"  />
                              <p><b>{{ Session::get('username')}}</b> </p>
                            </div>
                            
                              <textarea id="add-comment" name="commentText"> </textarea>
                              <input type="hidden" name="issueId" value="{{ $issueData[0]->id }}"/>
                              <a href="https://guides.github.com/features/mastering-markdown/">
                                &nbsp;&nbsp;Styling with Markdown is supported
                              </a><br><br>
                              <div class="form-group row">
            
                                  <div class="col-md-9">
                                      <textarea id="med" name="mentionUser" type="text" class="form-control" placeholder="Mention Using @"></textarea>
                                      <p>For All mention none</p>
                                    </div>
                              </div>
                              
                              <button class="btn btn-primary" type="submit" style="position:absolute; right:35px;bottom:135px;">Comment</button>
                              

                        </div>
                      </form>

                      </div>
                      <div class="col-md-3">
                          <div class="card">
                              <h5 class="card-header">Status</h5>
                              <div class="card-body">
                                @if($issueData[0]->status == 'done')
                                  <a href="#" class="btn btn-success">{{ $issueData[0]->status}}</a>
                                @else
                                  <a href="#" class="btn btn-primary">{{ $issueData[0]->status}}</a>
                                @endif
                              </div>
                          </div>
                          <br>
                          <div class="card">
                              <h5 class="card-header">Assignees</h5>
                              <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                          </div>
                          <br>
                          <div class="card">
                              <h5 class="card-header">Label</h5>
                              <div class="card-body">
                                <a href="#" class="btn btn-primary">{{ $issueData[0]->label}}</a>
                              </div>
                          </div>
                          <br>
                          <div class="card">
                              <h5 class="card-header">Priority</h5>
                              <div class="card-body">
                              <a href="#" class="btn btn-danger">{{ $issueData[0]->priority}}</a>
                              </div>
                          </div>
                      </div>
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
            <form id="logout-form"   action="{{ route('logout') }}" method="POST" style="display: none;">
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
      element: document.getElementById("add-comment"),
  });

  //simplemde.value("This text will appear in the editor");


function cnvt_md(md){
  var converter = new showdown.Converter();
  var html = converter.makeHtml(md);
  return html;
}
 
$("#med").mention({
				users: [{
					name: 'Lindsay Made',
					username: 'LindsayM'
				}, {
					name: 'Rob Dyrdek',
					username: 'robdyrdek'
				}, {
					name: 'Rick Bahner',
					username: 'RickyBahner'
				}, {
					name: 'Jacob Kelley',
					username: 'jakiestfu'
				}, {
					name: 'John Doe',
					username: 'HackMurphy'
				}, {
					name: 'Charlie Edmiston',
					username: 'charlie'
				}, {
					name: 'Andrea Montoya',
					username: 'andream'
				}, {
					name: 'Jenna Talbert',
					username: 'calisunshine'
				}, {
					name: 'Street League',
					username: 'streetleague'
				}, {
					name: 'Loud Mouth Burrito',
					username: 'Loudmouthfoods'
				}]
			});

      
</script>
@endsection


