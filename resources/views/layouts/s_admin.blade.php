@extends('layouts.base')


@section('content')


@include('admin.includes.ag-header')

<div id="wrapper">


        @include('admin.includes.side')
        
        <div id="content-wrapper">

                <div class="container-fluid">

                        

                        @yield('sContent')
                        

                </div>
                <!-- /.container-fluid -->

                @include('admin.includes.footer')

        </div>
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
                        <div class="modal-body">Are you Sure?</div>
                        <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
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

                .CodeMirror,
                .CodeMirror-scroll {
                        min-height: 150px !important;
                }
        }
</style>
@endsection

@section('custom_js')

        @yield('s_js')
@endsection