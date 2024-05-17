
@extends('layouts.s_admin')
              
@section('sContent')

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{URL::to('/')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All Notifications</li>
          </ol>

          
          <div class="container">

            <div>
              <p>Companies: 
                  @if(isset($notifications[0]->companies) && $notifications[0]->companies != null) 
                    <?php $clist = unserialize($notifications[0]->companies);
                      $cmps = \App\company::select('name')->whereIn('id',$clist)->get();
                      foreach($cmps as $c)
                      {
                        echo $c->name.', ';
                      }
                    ?> 
                  
                   
                  @endif
              </p>
            </div>


          @if(isset($notifications[0]))
          <div class="row">
              <div class="col-md-12 paper-1"  style="min-height:70px;background:linear-gradient(90deg,#f26422,#742703)">
                  <div class="notification">
                    <div class="notification-header">
                      {{-- Notifications --}}
                    </div> 
                    <div class="notification-body">
                        
                      <h3 class="white">{{ @$notifications[0]->title}}</h3>
                      {{-- @if(isset($notifications[0]))
                        <a href="{{URL::to('dashboard/notification/'.$notifications[0]->id)}}" class="btn-round "style="border: 1px solid #fff;color:#fff;position:absolute; top:18px;right:20px;" >View</a>
                      @endif --}}
                      <p class="white">
                          @if(isset($notifications[0]))
                          <?php echo $notifications[0]->text;?>
                        @endif
                        <!-- 
                            <script>
                              var converter = new showdown.Converter();
                              var md = ``;
                                var html = converter.makeHtml(md);
                                document.write(html);
                            </script> -->
                      </p>
                    </div>
                    <div class="notification-footer"></div>
                  </div>
              </div>
          </div>
          @endif
          </div>
          <div style="min-height:100px;"></div>

    
@endsection

@section('s_js')

<script>
$("p").each(function(){

  if($(this).attr("data-f-id") == "pbf"){
    $(this).hide();
  }  
})

</script>
@endsection
        