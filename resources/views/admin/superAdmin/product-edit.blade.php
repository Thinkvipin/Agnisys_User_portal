
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">edit product</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        edit product</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="{{URL::to('dashboard/s/edit-product')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          
                                                        <input type="hidden" name="id" value="{{$product[0]->id}}"/>
                                                          
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="name" value="{{$product[0]->name}}" id="inputEmail3"  >
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Parent</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="parent" id="inputPassword3"  >
                                                                                <option value="0">none</option>
                                                                                <?php   
                                                                                function display($pods,$parent){
                                                                                        // print_r($cats);
                                                                                        foreach ($pods as $pod){
                                                                                                if(isset($pod->name)){
                                                                                                        echo '<option value="'.$pod->id.'" ';
                                                                                                        if($parent == $pod->id)
                                                                                                          echo 'selected';
                                                                                                        echo '>';
                                                                                                                for($i=0;$i<$pod->indent;$i++){
                                                                                                                        echo '&nbsp';
                                                                                                                }
                                                                                                        echo $pod->name.'</option>';
                                                                                                }
                                                                                                display($pod->childs,$parent);
                                                                                        }
                                                                                }
                                                                                
                                                                                display(json_decode($pods),$product[0]->parent);
                                                                        ?>
                                                                                            
                                                                                        
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
            
            
    
@endsection
        