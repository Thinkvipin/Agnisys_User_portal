
@extends('layouts.base')


@section('content')



  @include('admin.includes.ag-header')
  <style>
      iframe{
          border:none;
          padding:0px 30px;
      }
  </style>
<div id="wrapper">
        @if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' )
          @include('admin.includes.sidebar')
        @else
          @include('admin.includes.side')
        @endif
        <div id="content-wrapper">
            <iframe width="100%" height="100%" src="https://www.portal.agnisys.com/new-troubleshooting-tool-installation/"></iframe>
        </div>
</div>

