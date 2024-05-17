@extends('layouts.s_admin')

@section('sContent')


<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
                <a href="{{URL::to('/')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit group</li>
</ol>



<!-- DataTables Example -->
<div class="card mb-3">
        <div class="card-header">
                <i class="fas fa-table"></i>
                Edit group</div>
        <div class="card-body">

                <form method="post" action="{{ URL::to('dashboard/s/edit-group')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$group[0]->id}}"/>
                        <div class="form-group row">
                                <label for="fname" class="col-md-2 col-form-label text-md-left">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                        <input id="title" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                                name="name" value="{{$group[0]->name}}" required autofocus>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Select companies</label>
                                <div class="col-sm-10">
                                        
                                    <ul class="list-group" style="width:50%;overflow-y:scroll;height:200px;">
                                        
                                        @foreach ($companies as $c)
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{$c->name}}
                                                
                                                
                                          <input class="" type="checkbox" name="companies[]" value="{{$c->id}}" 
                                          @if($group[0]->companies != 'N;' && $group[0]->companies != null)
                                                        <?php $seq = unserialize($group[0]->companies);?> 
                                                        @foreach($seq as $s)
                                                                @if($c->id == $s)
                                                                {{ __('checked')}}
                                                                @endif
                                                        @endforeach
                                                @else
                                                {{__('')}}
                                                @endif/>
                                          </li>
                                        @endforeach
                                        
                                      </ul>
                                        
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