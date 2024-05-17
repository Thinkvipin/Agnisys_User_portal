@extends('layouts.base')


@section('content')


  @include('admin.includes.ag-header')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VEZ8CTXCHW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VEZ8CTXCHW');
</script>    
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
             
          <div class="container">
            <div class="row">
              {{-- <div class="col-md-2"><img src="https://lms.agnisys.com/wp-content/uploads/2018/05/Agnisys-logo-RGB.gif" class="img-fluid" /></div> --}}
              <div class="col-md-10" style="padding: 0px"> 
                <h3>{{ ucwords($data['company'])}} </h3>
              
                <?php
                    if(Session::get('logo') != ''){
                       ?>
                       <img src="{{asset('public/logo_files')}}/{{Session::get('logo')}}"  style="
                          position: absolute;
                          right: -143px;
                          top: 19px;
                          height: 50px;" />
                       <?php
                    }
                    else{
                       ?>
                       <img src="{{asset('images/no-image-found.png')}}"  style="
                              position: absolute;
                              right: -143px;
                              top: 19px;
                              height: 50px;" /> 
                        <?php
                    }
                ?>
                <!--@if(isset($data['logo']))-->
                <!--  <img src="{{asset('public/logo_files')}}/{{Session::get('logo')}}"  style="-->
                <!--  position: absolute;-->
                <!--  right: -143px;-->
                <!--  top: 19px;-->
                <!--  height: 50px;" />-->
                <!--@endif-->
              </div> 
            </div>
          </div>
          @if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' )
            <div class="container">
            {{-- Notifications --}}
            <script src="{{asset('js/showdown.min.js')}}"></script>
            @if(isset($globalNoti[0]))
            <div class="row">
              <div class="col-md-12 paper-1" style="min-height:70px;">
                  <div class="notification">
                    <div class="notification-header">
                      {{-- Agnisys Notifications --}}
                      {{-- <span style="position:absolute; right:10px;">X</span> --}}
                    </div>
                    <div class="notification-body" >
                    <h3 class="black">{{@$globalNoti[0]->title}}</h3>
                    {{-- @if(isset($globalNoti[0]))
                      <a href="{{URL::to('dashboard/notification/'.$globalNoti[0]->id)}}" class="btn-round "style="border: 1px solid #fff;color:#fff;position:absolute; top:18px;right:20px;" >View</a>
                    @endif --}}
                    <p class="white">
                        @if(isset($globalNoti[0]))
                          <?php echo $globalNoti[0]->text;?>
                        @endif
                        
                      </p>
                    </div>
                    <div class="notification-footer"></div>
                  </div>
              </div>
            </div>
            @endif
            <br>
            {{-- Notifications componey--}}
            <?php $flag = false;?>
            @foreach($notifications as $notification)
              @if($notification->companies != NULL && $notification->companies != 'N;')
                <?php $cid = unserialize($notification->companies); ?>
                @foreach($cid as $c)
                    @if($flag == false)
                      @if($c == Session::get('cid'))
                        <?php $flag=true;?>
                              <div class="row"> 
                                  <div class="col-md-12 paper-1"  style="min-height:70px;">
                                    <!-- background:linear-gradient(90deg,#f26422,#742703) -->
                                      <div class="notification">
                                        <div class="notification-header">
                                          {{-- Notifications --}}
                                        </div>
                                        <div class="notification-body">
                                          <h3 class="">{{ @$notification->title}}</h3>
                                          <p class="white">
                                            @if(isset($notification))
                                                <?php echo $notification->text;?>
                                            @endif
                                          </p>
                                        </div>
                                        <div class="notification-footer"></div>
                                      </div>
                                  </div>
                              </div>
                              
                        @endif
                      @endif
                @endforeach
              @endif
            @endforeach
              <br>
             {{-- Cases --}}
             <div class="row justify-content-center">
                <div class="col-md-12 paper-1" style="margin-left:0em;">
                <h4>Open Cases</h4><a href="{{URL::to('dashboard/cases')}}" class="btn-round"style="position:absolute;top:25px;right:10px;">View More</a>
                    <ul class="list-group list-group-flush list-fb-cases" >
                        <?php 
                        $count = 0;
                        
                        
                        if(isset($fb_cases->data->cases)){
                          
                            $reversed = $fb_cases->data->cases;
                            
                            
                        ?>
                        
                                @foreach ($reversed  as $case)
                                
                                  <?php $mail = explode('<',$case->sCustomerEmail);
                                  
                                  $companyName = '';
                                      try{
                                        $website = explode('@',$mail[1]);
                                        $company = explode('.',$website[1]);
                                        // echo '<b>'.$company[0].'</b>';
                                        $companyName = $company[0];
                                      }
                                      catch(Exception $e) {
                                      }
                                      $domainarray = strtolower(Session::get('domain'));
                                      $DomainArray = explode(",",$domainarray);
                                    if($domainarray != ''){
                                      for($i=0;$i < count($DomainArray);$i++){
                                      
                                    
                                     
                                    //   $company00 = strtolower(Session::get('company'));
                                    //   $companyName01 = strtolower($companyName);
                                    //   if($company00 == 'western digital'){
                                    //       $company00 =  "wdc";
                                    //   }
                                  ?>
                                              @if(strtolower($companyName) == $DomainArray[$i] && $DomainArray[$i] != strtolower(Session::get('company')))
                                                  <?php $count++;?>
                                                  <style type="text/css">
                                                    ul.list-fb-cases{
                                                      height:300px;overflow-y:auto;
                                                    }
                                                  </style>
                                                  
                                                  <a href="https://agnisys.manuscript.com/default.asp?{{$case->sTicket}}" target="_blank">
                                                    <li class="list-group-item" style="font-size:12px;" >
                                                      <span class="circle text-center" style="color:azure;">
                                                        <i class="fas fa-envelope "></i>
                                                      </span>&nbsp;
                                                    <b>{{$case->sTitle}}</b>
                                                      <br>
                                                    <span style="font-size:10px;margin-left:1em;"><?php echo date_format( date_create($case->dtOpened), 'M-d-Y h:i A' ); ?> | {{$companyName}}</span>
                                                    <span class="badge badge-primary badge-pill badge-point">
                                                      @if ($case->ixCategory == 1)
                                                      <i class="fas fa-bug"></i>
                                                      @else
                                                          @if ($case->ixCategory == 2)
                                                          <i class="fas fa-lightbulb"></i>
                                                          @else
                                                          <i class="fas fa-envelope "></i>
                                                          @endif
                                                      @endif
                                                    </span>
                                                    <span class="badge badge-primary badge-pill badge-point1">{{$case->ixPriority}}</span>
                                                    </li>
                                                  </a>
                                              @endif
                                               @if(strtolower($companyName) == $DomainArray[$i] && $DomainArray[$i] == strtolower(Session::get('company')))
                                                  <?php $count++;?>
                                                  <style type="text/css">
                                                    ul.list-fb-cases{
                                                      height:300px;overflow-y:auto;
                                                    }
                                                  </style>
                                                  
                                                  <a href="https://agnisys.manuscript.com/default.asp?{{$case->sTicket}}" target="_blank">
                                                    <li class="list-group-item" style="font-size:12px;" >
                                                      <span class="circle text-center" style="color:azure;">
                                                        <i class="fas fa-envelope "></i>
                                                      </span>&nbsp;
                                                    <b>{{$case->sTitle}}</b>
                                                      <br>
                                                    <span style="font-size:10px;margin-left:1em;"><?php echo date_format( date_create($case->dtOpened), 'M-d-Y h:i A' ); ?> | {{$companyName}}</span>
                                                    <span class="badge badge-primary badge-pill badge-point">
                                                      @if ($case->ixCategory == 1)
                                                      <i class="fas fa-bug"></i>
                                                      @else
                                                          @if ($case->ixCategory == 2)
                                                          <i class="fas fa-lightbulb"></i>
                                                          @else
                                                          <i class="fas fa-envelope "></i>
                                                          @endif
                                                      @endif
                                                    </span>
                                                    <span class="badge badge-primary badge-pill badge-point1">{{$case->ixPriority}}</span>
                                                    </li>
                                                  </a>
                                              @endif
                                     <?
                                      }
                                    }
                                     ?> 
                                      
                                             @if(strtolower($companyName) == strtolower(Session::get('company')))
                                                  <?php $count++;?>
                                                  <style type="text/css">
                                                    ul.list-fb-cases{
                                                      height:300px;overflow-y:auto;
                                                    }
                                                  </style>
                                                  
                                                  <a href="https://agnisys.manuscript.com/default.asp?{{$case->sTicket}}" target="_blank">
                                                    <li class="list-group-item" style="font-size:12px;" >
                                                      <span class="circle text-center" style="color:azure;">
                                                        <i class="fas fa-envelope "></i>
                                                      </span>&nbsp;
                                                    <b>{{$case->sTitle}}</b>
                                                      <br>
                                                    <span style="font-size:10px;margin-left:1em;"><?php echo date_format( date_create($case->dtOpened), 'M-d-Y h:i A' ); ?> | {{$companyName}}</span>
                                                    <span class="badge badge-primary badge-pill badge-point">
                                                      @if ($case->ixCategory == 1)
                                                      <i class="fas fa-bug"></i>
                                                      @else
                                                          @if ($case->ixCategory == 2)
                                                          <i class="fas fa-lightbulb"></i>
                                                          @else
                                                          <i class="fas fa-envelope "></i>
                                                          @endif
                                                      @endif
                                                    </span>
                                                    <span class="badge badge-primary badge-pill badge-point1">{{$case->ixPriority}}</span>
                                                    </li>
                                                  </a>
                                              @endif
                                     <? 
                                     ?>          
                                    
                        
                                @endforeach
                                @if($count == 0)
                                    <p style="text-align:center;">{{__('No Fogbugz case found')}}</p>
                                    <div style="display:none;">
                                          <?php //echo strtolower($companyName)." - ".strtolower(Session::get('company'));?>
                                      </div>
                                @endif
                        <?php
                        }
                        else{
                           
                           Session([
                                        'key' => '',
                                        'fogbugz' => ''
                                        ]); 
                        ?>
                        <p style="text-align:center;">{{__('Refresh the page to get Fogbugz case ')}}</p>
                        
                                
                        <?php
                        }
                        ?>
                      </ul>
                </div>
                
            </div>
              <br>
            <div class="row">
              <div class="accordion" id="accordionExample" style="width: 100%;">
                
                <div class="card"  style="margin-bottom: 10px;">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0 mt-0">
                      <button class="btn  collapsed" type="button"  title=" It creates new ticket in Agnisys database"
                      data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Generate New Ticket
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      {{-- support --}}
                          <div class="row justify-content-center">
                              <div class="col-md-12 paper-1" >
                                  <h4>Agnisys Support</h4>
                                  <div class="modal-body">
                                      <form action="{{ URL::to('dashboard/support') }}" method="POST" enctype="multipart/form-data">                           
                                        @csrf
                                            
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Subject</label>
                                                  <input type="text" name="topic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter subject">
                                              </div>
                                              <textarea id="add-comment1" name="commentText"> </textarea>
                                              
                                              {{-- <a id="md-link" href="https://guides.github.com/features/mastering-markdown/">
                                                &nbsp;&nbsp;Styling with Markdown is supported
                                              </a><br><br> --}}
                                              <div class="form-group">
                                                  <label for="exampleFormControlFile1">Attach files</label>
                                                  <input type="file" class="form-control-file" name="extraFile" id="exampleFormControlFile1">
                                              </div>
                                              <button class="btn btn-primary" type="submit" style="">Send</button>
                                        
                                      </form>
                                  </div>
                              </div>
                              
                          </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <!--<div class="card-header" id="headingOne">-->
                  <!--  <h2 class="mb-0 mt-0">-->
                  <!--    <button class="btn collapsed" type="button"  title="It starts new discussion"-->
                  <!--    data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">-->
                  <!--      New Discussion-->
                  <!--    </button>-->
                  <!--  </h2>-->
                  <!--</div>-->
              
                  <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                       {{-- Issues --}}
                          <div class="row">
                              <div class="col-md-12 paper-1">
                                  <div class="notification">
                                    <div class="notification-header">
                                      
                                    <h4>Latest Issues</h4><a href="{{URL::to('dashboard/all-issues')}}" class="btn-round"style="position:absolute;top:25px;right:10px;">View More</a>
                                    </div>
                                    <div class="notification-body">
                                        <ul class="list-group list-group-flush">
                                          @foreach ($issues as $issue)
                                          <a href="{{ URL::to('dashboard/issue/'.$issue->id) }}" target="_blank" >
                                            <li class="list-group-item" style="font-size:12px;">
                                                <span class="circle text-center" style="color:azure;">
                                                  <i class="fas fa-envelope "></i>
                                                </span>&nbsp;
                                                <b>{{$issue->topic}}</b>
                                                <br>
                                                <span style="font-size:10px;margin-left:1em;">{{$issue->created_at}}</span>
                                              <span class="badge badge-primary badge-pill badge-point">
                                                @if ($issue->label == 'bug')
                                                <i class="fas fa-bug"></i>
                                                @else
                                                    @if ($issue->label == 'feature')
                                                    <i class="fas fa-lightbulb"></i>
                                                    @else
                                                    <i class="fas fa-envelope "></i>
                                                    @endif
                                                @endif
                                              </span>
                                              <span class="badge badge-primary badge-pill badge-point1">{{$issue->priority}}</span>
                                            </li>
                                          </a>
                                          @endforeach
                                          </ul>
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
                                                          {{--   New/ Open cases
                                                           Closed cases
                                                           In Progress
                                                           Waiting on customer
                                                           On hold --}}
                                                          
                                                          <option value="To do">To do</option>
                                                          <option value="In Review" >In Review</option>
                                                          <option value="Closed">Closed</option>
                                                          <option value="In Progress">In Progress</option>
                                                          <option value="On hold">On hold</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                </div>
                                                <button class="btn collapsed" type="button"  title="It starts new discussion"
                                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="position:absolute; right:140px;bottom:20px;">
                                                  Cancel
                                                </button>                     
                                                <button class="btn btn-primary" type="submit" style="position:absolute; right:10px;bottom:20px;">Create Discussion</button>
                                          
                                        </form>
                                    </div>
                                    <div class="notification-footer">
                                     
                                    </div>
                                  </div>
                              </div>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            
              
              <br>

          </div><!--container-->
          @else
            @include('admin.docs')
          @endif
          <br>
            
          

          
        </div>
        <!-- /.container-fluid -->

        

      </div>
      <!-- /.content-wrapper -->
      @include('admin.includes.footer')
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
          <div class="modal-body">Are you Sure?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger" href="{{ route('logout') }}" 
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


@section('custom_css')
  <style>
  @media (min-width: 768px) {
  .CodeMirror, .CodeMirror-scroll {
      min-height: 150px !important;
    }
  }
  </style>
@endsection

@section('custom_js')

<script>

  // var simplemde = new SimpleMDE({
  //     element: document.getElementById("add-comment"),
  // });

  // simplemde.value("Issue description");

  // var simplemde1 = new SimpleMDE({
  //     element: document.getElementById("add-comment1"),
  // });

  // simplemde1.value("Issue description");

function cnvt_md(md){
  var converter = new showdown.Converter();
  var html = converter.makeHtml(md);
  return html;
}

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
<script>
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
tinymce.init({
  selector: 'textarea#add-comment1',  // change this value according to your HTML
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
</script>

<script type="text/javascript">

   jQuery(document).ready(function ($) {
        var wp_auto_login_data = {
            'eid': "{{$wp_user_data['eid']}}",
            'token': "{{$wp_user_data['token']}}",
        }
        console.log(wp_auto_login_data);
        // console.log("Hello world");
        document.cookie = "is_wp_logout=no";
       
        /*
        console.log(getCookie('is_wp_login'));
        if(getCookie('is_wp_login') != 'no'){
           
            $.post("https://lms.agnisys.com/wp-json/v1/autologin/", wp_auto_login_data, function (response) {
                
                if(response.status){
                    console.log("wp login successfully by API call normal user");
                    document.cookie = "is_wp_login=yes"; 

                    var new_wp_auto_login_data = {
                            'laction': 'ulogin',
                            'eid': "{{$wp_user_data['eid']}}",
                            'token': "{{$wp_user_data['token']}}",
                        }
                    WPOpenWindowWithPost("https://lms.agnisys.com","NewFile", new_wp_auto_login_data);

                }else{
                    console.log("wp login failed");
                    document.cookie = "is_wp_login=no";
                }
            });
        }else{
            console.log("wp is already login");
        }
        */
        
        function makeid(length) {
           var result           = '';
           var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
           var charactersLength = characters.length;
           for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * charactersLength));
           }
           return result;
        }
        
        var Random = makeid(20);
        var protectedURL  = getCookie('openurl');
        if(protectedURL != ''){
            
            setTimeout(
              function() 
              {
                //do something special
                window.open('https://www.portal.agnisys.com/'+protectedURL+'?token='+Random, '_blank');
              }, 2000);
            
        }
       
    
    });

function WPOpenWindowWithPost(url, name, params,is_close=true){
    var  form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", url);
    form.setAttribute("target", name);
        for (var i in params) {
            if (params.hasOwnProperty(i)){
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = i;
                input.value = params[i];
                form.appendChild(input);
            }
        }
        document.body.appendChild(form);
         //note I am using a post.htm page since I did not want to make double request to the page 
         //it might have some Page_Load call which might screw things up.
        wp_window = window.open("", name);

        form.submit();
        document.body.removeChild(form);

        if(is_close){
            setTimeout(function(){ 
                wp_window.close();
            }, 2000);
        }
        /*
        delete wp_window[name];
        */
}

function Go_to_Wp_LMS(){

    var wp_auto_login_data = {
        'eid': "{{$wp_user_data['eid']}}",
        'token': "{{$wp_user_data['token']}}",
    }
    console.log(wp_auto_login_data);
    $.post("https://lms.agnisys.com/wp-json/v1/autologin/", wp_auto_login_data, function (response) {
        if(response.status){
            console.log(response.email);
            console.log("wp login successfully superAdmin");

            /*https://lms.agnisys.com/?laction="ulogin"&eid=EMmZcCOe47n5sJ+S6MEAc04=&token=validtoketn*/
            /*var param = { 'laction' : 'ulogin', 'eid': 'EMmZcCOe47n5sJ+S6MEAc04=', 'token': 'validtoketnS6MEAc04' };*/
            //'laction' : 'ulogin',
            var new_wp_auto_login_data = {
                    'laction': 'ulogin',
                    'eid': "{{$wp_user_data['eid']}}",
                    'token': "{{$wp_user_data['token']}}",
                }
            WPOpenWindowWithPost("https://lms.agnisys.com","NewFile", new_wp_auto_login_data,false);
        }else{
            console.log("wp login failed");
        }
    });
}
</script>

@endsection

