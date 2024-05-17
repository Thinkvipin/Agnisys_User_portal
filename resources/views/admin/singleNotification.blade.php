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
            <li class="breadcrumb-item active">All Notifications</li>
          </ol>

          
          <div class="issue-container">
                <script src="{{asset('js/showdown.min.js')}}"></script>
              <h3>{{ $notifications[0]->title}}</h3>
              <div class="row">
                <div class="col-md-9">
                  
                  <div class="comment-box">
                    <div class="comment-header">
                        
                    <p> <span>{{ date("d-m-Y",strtotime($notifications[0]->created_at))}}</span></p>
                    </div>
                    <div class="comment">
                        <?= $notifications[0]->text;?>
                        {{-- <script>
                         
                            var converter = new showdown.Converter();

                            var md = ``;
                              var html = converter.makeHtml(md);
                              document.write(html);
                          </script> --}}
                    </div>
                    
                  </div>


                </div></div></div>
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
$("p").each(function(){

if($(this).attr("data-f-id") == "pbf"){
  $(this).hide();
}  
})
</script>
@endsection