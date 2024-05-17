
@extends('layouts.s_admin')
              
@section('sContent')
    

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
                            <p><b>{{ $comment->username }}</b> Commented on <span>{{ date("d-M-Y",strtotime($comment->created_at))}}</span></p>
                            </div>
                            <div class="comment">
                                <?= $comment->comment?>
                              
                            </div>
                            
                          </div>
                        
                        @endforeach
                        
                      <form action="{{ URL::to('dashboard/add-comment') }}" method="POST">                           
                        @csrf
                        <div class="comment-box">
                            <div class="comment-header">
                              <p><b>{{ Session::get('username')}}</b> </p>
                            </div>
                            
                              <textarea id="add-comment" name="commentText"> </textarea>
                              <input type="hidden" name="issueId" value="{{ $issueData[0]->id }}"/>
                              
                              <div class="form-group" style="margin-top:20px;">
            
                                  <div class="col-md-9">
                                      <textarea id="med" name="mentionUser" type="text" class="form-control" placeholder="Mention Using @"></textarea>
                                      <p>For All mention none</p>
                                    </div>
                              </div>
                              
                              <button class="btn btn-primary" type="submit" style="position:absolute; right:20px;bottom:35px;">Comment</button>
                              

                        </div>
                      </form>

                      </div>
                      <div class="col-md-3">
                          <div class="card">
                              <h5 class="card-header">Status</h5>
                              <div class="card-body">
                                @if($issueData[0]->status == 'Closed')
                                  <a href="#" class="btn bg-success btn-success btn-round">{{ $issueData[0]->status}}</a>
                                @else
                                  <a href="#" class="btn bg-primary btn-primary btn-round">{{ $issueData[0]->status}}</a>
                                @endif
                                <br><br>
                                <form action="{{URL::to('dashboard')}}/update-status" method="post">
                                  @csrf
                                <input type="hidden" value="{{$issueData[0]->id}}" name="id"/>

                                  <div class="form-group row">
                                      <div class="col-sm-12">
                                          <select name="status" class="form-control">
                                              <option value="To do">To do</option>
                                              <option value="In Review" >In Review</option>
                                              <option value="Closed">Closed</option>
                                              <option value="In Progress">In Progress</option>
                                              <option value="On hold">On hold</option>
                                          </select>
                                      </div>
                                  </div>
                                  
                                  <button class="btn btn-primary" type="submit" >Update</button>
                                </form>
                              </div>
                          </div>
                          <br>
                          <div class="card">
                              <h5 class="card-header">Assignees</h5>
                              <div class="card-body">
                                {{-- <h5 class="card-title">Special title treatment</h5> --}}
                                @if( $issueData[0]->assigns != null && $issueData[0]->assigns !=  'N;')
                                    <?php $assgning = unserialize($issueData[0]->assigns);?>
                                    @foreach ($assgning as $item)
                                        @foreach($users as $u)
                                            @if($u->id == $item)
                                              <span class="btn btn-round">{{ $u->email}}</span>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif
                                <br>
                                <br>
                                <form action="{{URL::to('dashboard')}}/update-assignees" method="post">
                                    @csrf
                                <input type="hidden" value="{{$issueData[0]->id}}" name="id"/>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <ul class="list-group" style="overflow-y:scroll;height:200px;">
                                            @foreach($users as $u)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                  {{$u->email}}
                                                <input type="checkbox" value="{{$u->id}}"name="user[]" 
                                                @if( $issueData[0]->assigns != null && $issueData[0]->assigns !=  'N;')
                                                    <?php $assgning = unserialize($issueData[0]->assigns);?>
                                                    @foreach ($assgning as $item)
                                                        
                                                            @if($u->id == $item)
                                                              {{__('checked')}}
                                                            @endif
                                                        
                                                    @endforeach
                                                @endif

                                                />
                                                </li>
                                            @endforeach
                                          </ul>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary" type="submit" >Update</button>
                                  </form>
                              </div>
                          </div>
                          <br>
                          <div class="card">
                              <h5 class="card-header">Label</h5>
                              <div class="card-body">
                                @if($issueData[0]->status == 'Bug')
                                  <a href="#" class="btn bg-success btn-success btn-round">{{ $issueData[0]->label}}</a>
                                @else
                                  <a href="#" class="btn bg-primary btn-primary btn-round">{{ $issueData[0]->label}}</a>
                                @endif
                              
                              <br><br>
                              <form action="{{URL::to('dashboard')}}/update-label" method="post">
                                @csrf
                                <input type="hidden" value="{{$issueData[0]->id}}" name="id"/>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select name="label" class="form-control">
                                            <option value="Bug">Bug</option>
                                            <option value="Feature">Feature</option>
                                            <option value="Enquiry">Enquiry</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary" type="submit" >Update</button>
                              </form>
                            </div>
                          </div>
                          <br>
                          <div class="card">
                              <h5 class="card-header">Priority</h5>
                              <div class="card-body">
                                @if($issueData[0]->priority == 'Low')
                                  <a href="#" class="btn bg-success btn-success btn-round">{{ $issueData[0]->priority}}</a>
                                @else
                                  @if($issueData[0]->priority == 'Medium')
                                    <a href="#" class="btn bg-primary btn-primary btn-round">{{ $issueData[0]->priority}}</a>
                                  @else
                                    <a href="#" class="btn bg-danger btn-danger btn-round">{{ $issueData[0]->priority}}</a>
                                  @endif
                                @endif
                              <br><br>
                              <form action="{{URL::to('dashboard')}}/update-priority" method="post">
                                @csrf
                                <input type="hidden" value="{{$issueData[0]->id}}" name="id"/>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select name="priority" class="form-control">
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary" type="submit" >Update</button>
                              </form>
                            </div>
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


