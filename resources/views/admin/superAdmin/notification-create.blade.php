@extends('layouts.s_admin')

@section('sContent')


<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
                <a href="{{URL::to('/')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
</ol>



<!-- DataTables Example -->
<div class="card mb-3">
        <div class="card-header">
                <i class="fas fa-table"></i>
                Create Notifications</div>
        <div class="card-body">

                <form method="post" action="{{ URL::to('dashboard/s/add-notification')}}">
                        @csrf
                        <div class="form-group row">
                                <label for="fname" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                        <input id="title" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                                name="title" required autofocus>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Content') }}</label>

                                <div class="col-md-6">
                                        <textarea id="add-notification" name="text" type="text" class="form-control"></textarea>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Select company</label>
                                <div class="col-sm-10">
                                        
                                    <ul class="list-group" style="width:50%;overflow-y:scroll;height:200px;">
                                        
                                        @foreach ($companies as $c)
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              
                                            {{strtoupper($c['name'])}}
                                                
                                          <input class="" type="checkbox" name="companies[]" value="{{$c->id}}" />
                                          </li>
                                        @endforeach
                                        
                                      </ul>
                                        
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Select Groups</label>
                                <div class="col-sm-10">
                                        
                                    <ul class="list-group" style="width:50%;overflow-y:auto;height:100px;">
                                        
                                        @foreach ($groups as $c)
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              
                                            {{$c['name']}}
                                                
                                          <input class="" type="checkbox" name="groups[]" value="{{$c->id}}" />
                                          </li>
                                        @endforeach
                                        
                                      </ul>
                                        
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="fname" class="col-md-2 col-form-label text-md-right">{{ __('Global') }}</label>

                                <div class="col-md-6">
                                        <input type="checkbox" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                                name="global"  >
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="fname" class="col-md-2 col-form-label text-md-right">{{ __(' ') }}</label>
                                <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                        </div>
                </form>

        </div>
</div>


@endsection

@section('s_js')
<script>

tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  plugins : 'advlist autolink link image lists charmap print preview',
  images_upload_url: "{{URL::to('upload')}}",
  height : "400",
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

                // $(function() {
                //         $('#add-notification').froalaEditor({
                //                 toolbarInline: false,
                //                 charCounterCount: true,
                //                 toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 
                //                                 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 
                //                                 'fontAwesome', '-', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|', 
                //                                 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '-', 'insertHR', 'selectAll',  'print', 'help', 'html', 'fullscreen', '|', 
                //                                 'undo', 'redo'],
                //                 toolbarVisibleWithoutSelection: true,
                //                 heightMin: 200,
                        
                //         })
                // });

                
        
        </script>
@endsection