
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">License Request</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                          License request</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form id="licence-gen" action="{{URL::to('dashboard/s/license-request')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          
                                                        <input type="hidden" name="id" value="{{@$license[0]->id}}"/>
                                                        <input type="hidden" name="cid" value="{{@$license[0]->cid}}"/>
                                                        <input type="hidden" name="pid" value="{{@$license[0]->pid}}"/>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Company Name</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control"  id="inputcname"  value="{{@$company[0]->name}}" disabled>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License Category</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="type_" id="inputPassword3"  required>
                                                                                <option value="0" >Choose one</option>
                                                                                <option value="Temporary" selected>Temporary</option>
                                                                                <option value="Full">Full</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License Type</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="type1" id="inputPassword3"  required>
                                                                                <option value="ALM – Open short term">ALM – Open short term</option>
                                                                                <option value="ALM – Node locked"> ALM – Node locked</option>
                                                                                <option value="ALM – Floating"> ALM – Floating</option>
                                                                                <option value="Flex – Node locked">Flex – Node locked</option>
                                                                                <option value="Flex – Floating"> Flex – Floating</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">UUID/ MAC-ID</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="key" id="inputEmail3" value="{{ empty($license[0]->uuid) ? '' : $license[0]->uuid }}">
                                                            </div>
                                                        </div>
                                                        <?php

                                                            $product_names = '';
                                                            $validityDate = unserialize($license[0]->validity_date);
                                                            $quantities = unserialize($license[0]->quantity);
                                                            
                                                        ?>
                                                        <div class="form-group row box-section">
                                                            <div class="col-sm-4">
                                                                <label for="inputEmail3" class=" col-form-label">Product</label>
                                                                <span >
                                                                <?php
                                                                    foreach( $product as $key => $value ) {
                                                                        $product_names .= $value->name . ', ';
                                                                    ?>
                                                                        <input type="text" class="form-control" name="products[]" value="{{$value->name}}" disabled> 
                                                                    <?php
                                                                    }
                                                                ?>
                                                                </span>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="inputEmail3" class=" col-form-label">Quantity</label>
                                                                <span >
                                                                <?php
                                                                    foreach($quantities as $quantity){
                                                                    ?>
                                                                        <input type="text" class="form-control"  value="{{$quantity}}" name="quantity[]" id="inputPassword3" >
                                                                    <?php
                                                                    }
                                                                ?>
                                                                </span>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="inputEmail3" class=" col-form-label">Expiry Date</label>
                                                                <span>
                                                                <?php foreach($validityDate as $date){
                                                                    
                                                                       
                                                                       ?>
                                                                       <input type="text" class="form-control expiryDate"  value="{{$date}}" name="to[]" >
                                                                       <?php
                                                                    } 
                                                                ?>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        
                                                        <!--<div class="form-group row">-->
                                                        <!--        <label for="inputEmail3" class="col-sm-2 col-form-label">Product</label>-->
                                                        <!--        <div class="col-sm-10">-->
                                                        <!--        <input type="text" class="form-control" name="products" id="inputEmail3" value="{{$product_names}}" disabled>-->
                                                        <!--        </div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group row">-->
                                                        <!--        <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>-->
                                                        <!--        <div class="col-sm-10">-->

                                                        <!--        <input type="text" class="form-control"  value="" name="quantity" id="inputPassword3" >-->
                                                        <!--        </div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group row">-->
                                                        <!--    <label for="inputPassword3" class="col-sm-2 col-form-label">Expire Date</label>-->
                                                        <!--    <div class="col-sm-10">-->
                                                        <!--      <input type="text" class="form-control" name="date[]" value="">-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        
                                                        <div class="form-group row" style="display: none;">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Duration</label>
                                                                <div class="col-sm-10">
                                                                <input type="number" class="form-control" name="duration" value="{{@$license[0]->duration}}" id="inputEmail3"  placeholder="Enter the weeks" required>
                                                                        <span style="color:#ddd;font-size:12px;">Enter the weeks Ex: 6 or 12</span>
                                                                </div>
                                                        </div>
                                                        
                                                         
                                                        
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">License file</label>
                                                                <div class="col-sm-10">
                                                                        <input type="file" class="form-control"  name="licenseFile" id="inputPassword3">
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button class="btn btn-primary getlicencefile" onclick="return getlicensefile();">Generate</button>
                                                              <button disabled="" type="submit" class="btn btn-primary finalsubmit">Submit</button>
                                                            </div>
                                                        </div>
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
            
<script type="text/javascript">
    
    function getlicensefile() {

        var form_data = new FormData($('#licence-gen')[0]);

        var company_name = $('#inputcname').val();

        if( !company_name ) {
            alert('Company name is required');
            return false;
        }
        var products = $("input[name='products[]']").map(function(){
            return $(this).val();
        }).get();
        if( !products ) {
            alert('Products is required to generate license');
            return false;
        }
        var quantity = $("input[name='quantity[]']").map(function(){
            return $(this).val();
        }).get();
        if( !quantity ) {
            alert('Quantity is required to generate license');
            return false;
        }
        var to = $("input[name='to[]']").map(function(){
            return $(this).val();
        }).get();
        if( !to ) {
            alert('Expiry Date is required to generate license');
            return false;
        }

        
        // var products = $('input[name=products]').val();
        
        form_data.append('company_name', company_name);
        form_data.append('products', products);
        form_data.append('quantity', quantity);
        form_data.append('expirydatearray', to);
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
            }

        });
        return false;
    }
</script>  
    
@endsection
        