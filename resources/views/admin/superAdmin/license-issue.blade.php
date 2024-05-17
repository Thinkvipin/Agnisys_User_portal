
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Issue License</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                          Issue License </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form id="licence-gen" action="{{URL::to('dashboard/s/issue-license')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                                        
                                                        <input type="hidden" name="duration" id="duration" value="0"/>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Company Name</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="cid" id="inputPassword3"  required>
                                                                                <option value="0" >Select...</option>
                                                                                @foreach ($companies as $item)
                                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                                @endforeach
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        
                                                        <!--<div class="form-group row" >-->
                                                        <!--        <label for="inputPassword3" class="col-sm-2 col-form-label">License Catgory</label>-->
                                                        <!--        <div class="col-sm-10">-->
                                                        <!--                <select class="form-control" name="type_" id="inputPassword3"  required>-->
                                                        <!--                        <option value="0" >Choose one</option>-->
                                                        <!--                        <option value="Temporary">Temporary</option>-->
                                                        <!--                        <option value="Full">Full</option>-->
                                                        <!--                </select>-->
                                                        <!--        </div>-->
                                                        <!--</div>-->
                                                        <div class="form-group row">
                                                                <!--<label for="inputPassword3" class="col-sm-2 col-form-label">License Type</label>-->
                                                                <!--<div class="col-sm-10">-->
                                                                <!--        <select class="form-control" name="type1" id="inputPassword3"  required>-->
                                                                <!--                <option value="ALM – Open short term">ALM – Open short term</option>-->
                                                                <!--                <option value="ALM – Node locked"> ALM – Node locked</option>-->
                                                                <!--                <option value="ALM – Floating"> ALM – Floating</option>-->
                                                                <!--                <option value="Flex – Node locked">Flex – Node locked</option>-->
                                                                <!--                <option value="Flex – Floating"> Flex – Floating</option>-->
                                                                <!--        </select>-->
                                                                <!--</div>-->
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License type</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="type_" id="license-type"  required="">
                                                                                <option value="" >Choose one</option>
                                                                                <option value="ALM">ALM</option>
                                                                                <option value="Flex">Flex</option>
                                                                        </select>
                                                                </div>
                                                        </div> 
                                                        
                                                        <!--<div class="form-group row">-->
                                                        <!--    <label for="inputEmail3" class="col-sm-2 col-form-label">UUID/ MAC-ID</label>-->
                                                        <!--    <div class="col-sm-10">-->
                                                        <!--        <input type="text" class="form-control" name="key" id="inputEmail3"  required>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        <div class="form-group row" id="input-fields-types">
                                                            <label for="uuid"  id="uuid-label" style="display: none;" class="col-sm-2 col-form-label">UUID:</label>
                                                            <div class="col-sm-10" id="uuid" style="display: none;"><input type="text"  name="uuid" id="keyValue"></div>
                                                            
                                                            <label for="host-id"  id="host-id-label" style="display: none;" class="col-sm-2 col-form-label">Host ID (MAC ID):</label>
                                                            <div class="col-sm-10"  id="host-id" style="display: none;"><input type="text" name="uuid" ></div>
                                                        </div>
                                                        <div class="form-group row">
                                                               <!--  <label for="inputPassword3" class="col-sm-2 col-form-label">Product</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control select-multiple" name="pid[]" id="inputPassword3" style="min-height:100px;" multiple="multiple" size={{count($products)}} required>
                                                                                <option value="0" >Select...</option> -->
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
                                                                        <!-- </select> 

                                                                </div> -->
                                                        </div>
                                                        <div class="input_fields_wrap ">
                                                            <span class="fas fa-plus-circle add_field_button"></span>
                                                            <div class="box0 row" style="border:1px solid #ddd;padding:15px;">
                                                                <div class="form-group col-sm-4">
                                                                    <label for="inputEmail3" class="col-form-label">Product</label>
                                                                    <select class="form-control" name="pid[]" id="inputPassword3" required>
                                                                            <option value="0" >Select...</option>
                                                                            <?php   
                                                                                function display($pods){
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
                                                        <!-- <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                                                                <div class="col-sm-10">

                                                                <input type="text" class="form-control"  value="1" name="quantity" id="inputPassword3" required>
                                                                </div>
                                                        </div> -->
                                                        <!--<div class="form-group row" >
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Start Date</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="date" id="from"  autocomplete="off" required>
                                                            </div>
                                                        </div>-->
                                                        <!-- <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Expire Date</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="to" id="to"  autocomplete="off" required>
                                                            </div>
                                                        </div> -->
                                                        
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License file</label>
                                                                <div class="col-sm-10">
                                                                        <input type="file" class="form-control"  name="licenseFile" id="inputPassword3" >
                                                                </div>
                                                        </div>
                                                                
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button class="btn btn-primary getlicencefile" onclick="return getlicensefile();" >Generate</button>
                                                              <button type="submit" class="btn btn-primary finalsubmit">Submit</button>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                  </form>
                  
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
<script type="text/javascript">

    var form_data = new FormData($('#licence-gen')[0]);

    function getlicensefile(event) {

        var form_data = new FormData($('#licence-gen')[0]);

        var company_name = $('select[name=cid] option:selected').text();

        if( !company_name || company_name == 'Select...' ) {
            alert('Company name is required');
            return false;
        }
        
        
        
        // var pid = $("input[name='pid']").map(function(){
        //     return $(this).val();
        // }).get();
        var quantity = $("input[name='quantity[]']").map(function(){
            return $(this).val();
        }).get();
        if( !quantity ) {
            alert('Quantity is required to generate license');
            return false;
        }
        var to = $("input[name='expiryDate[]']").map(function(){
            return $(this).val();
        }).get();
        if( !to ) {
            alert('Expiry Date is required to generate license');
            return false;
        }
        form_data.append('quantity', quantity);
        form_data.append('expirydatearray', to);
        form_data.append('company_name', company_name);
        // form_data.append('company_name', company_name);
        $.ajax({
            type: "POST",
            url: "{{URL::to('dashboard/s/getlicencefile')}}",
            data: form_data,
            contentType: false,
            mimeType: "multipart/form-data",
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                try {
                    response = JSON.parse(data);
                    if (response.status === true) {

                        let link = document.createElement('a');
                        link.download = 'licence.dat';

                        let blob = new Blob([response.data], {type: 'text/plain'});

                        link.href = URL.createObjectURL(blob);

                        link.click();

                        URL.revokeObjectURL(link.href);

                        $('.getlicencefile').attr('disabled', true);
                        $('.finalsubmit').attr('disabled', false);
                        alert('Now attach the generated licence file in the licence file section');

                    } else {
                        alert('Something went wrong, while generating license. Kindly contact to admin');
                    }
                } catch (e) {
                    alert(e); // error in the above string (in this case, yes)!
                }
            },
            error: function(jqXHR, exception) {
                console.log(jqXHR.responseText);
                alert('Something went wrong...');
            }

        });
        return false;
    }
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
        
        const uuidKey = document.getElementById("keyValue");
        uuidKey.addEventListener("blur", function() {
          const input = uuidKey.value;
          if (!validateInput(input)) {
            alert("Invalid UUID Value");
            uuidKey.focus(); // Return focus to the input field
          }
        });
    </script>
@endsection
        