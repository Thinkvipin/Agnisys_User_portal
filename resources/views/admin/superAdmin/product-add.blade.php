
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add product</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        Add product</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="{{URL::to('dashboard/s/add-product')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          
                                                        <input type="hidden" name="id" value=""/>
                                                          
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="name" id="inputEmail3"  required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Parent</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="parent" id="inputPassword3"  required>
                                                                                <option value="0">none</option>
                                                                                <?php   
                                                                                function display($pods){
                                                                                        // print_r($cats);
                                                                                        foreach ($pods as $pod){
                                                                                                if(isset($pod->name)){
                                                                                                        echo '<option value="'.$pod->id.'">';
                                                                                                                for($i=0;$i<$pod->indent;$i++){
                                                                                                                        echo '&nbsp';
                                                                                                                }
                                                                                                        echo $pod->name.'</option>';
                                                                                                }
                                                                                                display($pod->childs);
                                                                                        }
                                                                                }
                                                                                
                                                                                display(json_decode($pods));
                                                                        ?>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button type="submit" class="btn btn-primary">Add</button>
                                                            </div>
                                                        </div>
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
            
            
    
@endsection
        