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
        // @if(Session::get('role') != 'user' || Session::get('role') != 'User')
        //   @include('admin.includes.sidebar')
        // @else
        //   @include('admin.includes.sidebar1')
        // @endif
        ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{URL::to('/')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Licenses</li>
            <li class="breadcrumb-item active">License request</li>
          </ol>
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                {{-- Request temporary license --}}
              </div>
            <div class="card-body">
              <div class="table-responsive">
                        <form action="{{URL::to('dashboard')}}/license-request" id="licenseRequest" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                        <input type="hidden" name="cid" value="{{session::get('cid')}}"/>
                                        <input type="hidden" name="uid" value="{{session::get('uid')}}"/>
                                        <!--<div class="form-group row">-->
                                        <!--        <label for="inputPassword3" class="col-sm-2 col-form-label">Product</label>-->
                                        <!--        <div class="col-sm-10">-->
                                        <!--                <select class="form-control select-multiple" name="pid[]" id="inputPassword3"  style="min-height:100px;" multiple="multiple" size={{count($products)}}>-->
                                        <!--                        <option value="0" >Select...</option>-->
                                                                <?php   
                                                                        // function display($pods){
                                                                        //         // print_r($cats);
                                                                        //         foreach ($pods as $pod){ 
                                                                        //                 if(isset($pod->name)){
                                                                        //                         echo '<option value="'.$pod->id.'">';
                                                                        //                                 for($i=0;$i<$pod->indent;$i++){
                                                                        //                                         echo '&nbsp';
                                                                        //                                 }
                                                                        //                         echo $pod->name.'</option>';
                                                                        //                 }
                                                                        //                 display($pod->childs);
                                                                        //         }
                                                                        // }
                                                                        // display(json_decode($pods));
                                                                ?>
                                        <!--                </select>-->
                                        <!--        </div>-->
                                        <!--</div> -->
                                        <div class="input_fields_wrap ">
                                            <span class="fas fa-plus-circle add_field_button"></span>
                                            <div class="box0 row" style="border:1px solid #ddd;padding:15px;">
                                                <div class="form-group col-sm-4">
                                                    <label for="inputEmail3" class="col-form-label">Product</label>
                                                    <select class="form-control" name="pid[]" id="inputPassword3" required>
                                                            <option value="0" >Select...</option>
                                                            <?php   
                                                                function display($pods){
                                                                    // print_r($cats);
                                                                    foreach ($pods as $pod){
                                                                        if(isset($pod->name)){
                                                                            if($pod->indent == 0){
                                                                                $disabled = 'disabled';
                                                                            }
                                                                            else{
                                                                                $disabled = '';
                                                                            }
                                                                            echo '<option value="'.$pod->id.'" '.$disabled.'>';
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
                                                <div class="form-group col-sm-4">
                                                    <label for="inputEmail3" class="col-form-label">Quantity</label><input type="number" class="form-control" name="quantity[]" value="" placeholder="Quantity in Numbers" required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <!--<label for="inputEmail3" class="col-form-label">Expiry Date</label>-->
                                                    <!--<input type="text" name="expiryDate[]" value="" placeholder="Expiry Date" class="form-control expiryDate" id="expiryDate" autocomplete="off" required>-->
                                                    <label for="inputEmail3" class="col-form-label">Duration</label>
                                                    <select class="form-control" name="expiryDate[]" id="duration"  required="">
                                                            <option value="" >Choose one</option>
                                                            <option value="Two weeks">Two weeks</option>
                                                            <option value="One month">One month</option>
                                                            <option value="One year">One year</option>
                                                            <option value="Three years">Three years</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License type</label>
                                                <div class="col-sm-10">
                                                        <select class="form-control" name="type_" id="license-type"  required="">
                                                                <option value="" >Choose one</option>
                                                                <option value="ALM">ALM</option>
                                                                <option value="Flex">Flex</option>
                                                        </select>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row" style='display:none;'>
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Duration</label>
                                                <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="duration" value="1" id="inputEmail3"  placeholder="" required>
                                                </div>
                                        </div>
                                        <!--<div class="form-group row">-->
                                        <!--        <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>-->
                                        <!--        <div class="col-sm-10">-->

                                        <!--        <input type="text" class="form-control"  value="1" name="quantity" id="inputQuantity" required>-->
                                        <!--        </div>-->
                                        <!--</div>-->
                                        <!--<div class="form-group row">-->
                                        <!--    <label for="inputPassword3" class="col-sm-2 col-form-label">Validity Date</label>-->
                                        <!--    <div class="col-sm-10">-->
                                        <!--      <input type="text" class="form-control" name="to" id="to"  autocomplete="off" required>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="form-group row" id="input-fields-types">
                                            <!--<label for="inputPassword3" class="col-sm-2 col-form-label">HostID/UUID</label>-->
                                            <!--<div class="col-sm-10">-->
                                            <!--  <input type="text" class="form-control" name="uuid" id=""  autocomplete="off" required>-->
                                            <!--</div>-->
                                            <label for="uuid"  id="uuid-label" style="display: none;" class="col-sm-2 col-form-label">UUID:</label>
                                            <div class="col-sm-10" id="uuid" style="display: none;"><input type="text"  name="uuid" id="keyValue"></div>
                                            
                                            <label for="host-id"  id="host-id-label" style="display: none;" class="col-sm-2 col-form-label">Host ID (MAC ID):</label>
                                            <div class="col-sm-10"  id="host-id" style="display: none;"><input type="text" name="hostid" ></div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary" >Send Request</button>
                                                </div>
                                        </div>
                                              
                        </form>
              </div>
            </div>
          </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

		
        $(document).ready(function() {
            var max_fields      = 5; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            var select = $(".box0").html();
            var x = 0; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="box'+x+' row" style="border:1px solid #ddd;padding:15px;">'+select+'<span class="fas fa-minus-circle remove_field"></span></div>'); //add input box
                    var dateID = "expiryDate"+x;
                    $(".box"+x).find("#expiryDate").attr('id',dateID);
                }
            });
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });

    </script>
    <script>
          var selectType = document.getElementById("license-type");
          var inputFields = document.getElementById("input-fields-types");
          var uuid = document.getElementById("uuid");
          var uuidLabel = document.getElementById("uuid-label");
          var hostId = document.getElementById("host-id");
          var hostIdLabel = document.getElementById("host-id-label");
        
          selectType.addEventListener("change", function() {
            if (selectType.value === "ALM") {
              uuidLabel.style.display = "block";
              uuidLabel.setAttribute("required", "required");
              uuid.style.display = "block";
              uuid.setAttribute("required", "required");
              hostIdLabel.style.display = "none";
              hostIdLabel.removeAttribute("required");
              hostId.style.display = "none";
              hostId.removeAttribute("required");
            } else if (selectType.value === "Flex") {
              uuidLabel.style.display = "none";
              uuidLabel.removeAttribute("required");
              uuid.style.display = "none";
              uuid.removeAttribute("required");
              hostIdLabel.style.display = "block";
              hostIdLabel.setAttribute("required", "required");
              hostId.style.display = "block";
              hostId.setAttribute("required", "required");
            }
          });
    </script>
    <script>
        function validateInput(input) {
          const regex = /^([0-9A-Fa-f]{2}[:-]){5}[0-9A-Fa-f]{2}$|^[0-9A-Fa-f]{12}$/;
          return regex.test(input);
        }
        
        const licenseRequest = document.getElementById("licenseRequest");
        licenseRequest.addEventListener("submit", function(event) {
          const input = document.getElementById("keyValue").value;
          if (!validateInput(input)) {
            alert("Invalid UUID");
            event.preventDefault(); // Prevent form from submitting
          }
        });
    </script>
@endsection


