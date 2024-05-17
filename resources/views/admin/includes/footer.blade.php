<!-- Sticky Footer -->
<footer class="sticky-footer1">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
        <span>Copyright© <?php echo date("Y");?> Agnisys, Inc. All Rights Reserved.</span>
        </div>
    </div>

    </footer>

</div>
<div class="flash-message" style="position: fixed;
left: 31px;
bottom: 30px;">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}" >
                {{ Session::get('alert-' . $msg) }} 
                <a href="#" class="close" style="margin-left:1em;" data-dismiss="alert" aria-label="close">&times;</a>
            </p>
          @endif
        @endforeach
</div> <!-- end .flash-message -->

<style>
/* The animation code */
@keyframes example {
  from {opacity: 1;}
  to {opacity: 0;}
}
/* The element to apply the animation to */
.flash-message {
  opacity: 0;
  animation-name: example;
  animation-duration: 10s;
}
</style>


<!--Fogbugz Api Logout after 8 hours -->
<input type="hidden" value="{{ Session::get('fogbugz') }}" id="fogbugzToken"> 
<p id="apiResponse"  class="hidden" style="color:transparent"></p>
<script>
    this.lastActiveTime = new Date();
          window.onclick = function () {
                this.lastActiveTime= new Date();
             };
             window.onmousemove = function () {
               this.lastActiveTime= new Date();
             };
             window.onkeypress = function () {
                this.lastActiveTime= new Date();
             };
             window.onscroll = function () {
                this.lastActiveTime= new Date();
             };
             
          let idleTimer_k = window.setInterval(CheckIdleTime, 10000);
       
          function CheckIdleTime() {
//returns idle time every 10 seconds
                  let dateNowTime = new Date().getTime();
                  let lastActiveTime = new Date(this.lastActiveTime).getTime();
                  let remTime = Math.floor((dateNowTime-lastActiveTime)/ 1000);
// converting from milliseconds to seconds
                 if(remTime >= 7200){
                        
                        var xhttp = new XMLHttpRequest();
                        var apiToken = document.getElementById("fogbugzToken").value;
                        xhttp.onreadystatechange = function() {
                          if (this.readyState == 4 && this.status == 200) {
                              document.getElementById("apiResponse").innerHTML = this.responseText;
                            }
                          };
                        xhttp.open("GET", "https://www.portal.agnisys.com/fogbugz-logout.php?apiToken="+apiToken, true);
                        xhttp.send();
                 }
                 else{
                     
                 }
          }
</script>
