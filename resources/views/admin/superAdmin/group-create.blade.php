@extends('layouts.s_admin')

@section('sContent')


<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
                <a href="{{URL::to('/')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create group</li>
</ol>



<!-- DataTables Example -->
<div class="card mb-3">
        <div class="card-header">
                <i class="fas fa-table"></i>
                Create group</div>
        <div class="card-body">

                <form method="post" action="{{ URL::to('dashboard/s/create-group')}}">
                        @csrf
                        <div class="form-group row">
                                <label for="fname" class="col-md-2 col-form-label text-md-left">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                        <input id="title" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                                name="name" required autofocus>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Select companies</label>
                                <div class="col-sm-10">
                                        
                                    <ul class="list-group" style="width:50%;overflow-y:scroll;height:200px;">
                                        
                                        @foreach ($companies as $c)
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              
                                            {{ucwords($c['name'])}}
                                                
                                          <input class="" type="checkbox" name="companies[]" value="{{$c->id}}" />
                                          </li>
                                        @endforeach
                                        
                                      </ul>
                                        
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

                var simplemde = new SimpleMDE({
                        element: document.getElementById("add-notification"),
                });
        
                simplemde.value("Issue description");
        
                var simplemde1 = new SimpleMDE({
                        element: document.getElementById("add-comment1"),
                });
        
                simplemde1.value("Issue description");
        
                function cnvt_md(md) {
                        var converter = new showdown.Converter();
                        var html = converter.makeHtml(md);
                        return html;
                }
        
                $("#med").mention({
                        users: <?php  ?>//[{
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