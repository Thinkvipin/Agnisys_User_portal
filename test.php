<!DOCTYPE html>
<html>
   <head>
      <title>HTML Meta Tag</title>
      <!--Chat Bot styles -->
        <link href="https://www.old.agnisys.com/chatbot/style.css" rel="stylesheet" >
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <!--Chat Bot styles -->
      <!--<meta http-equiv = "refresh" content = "2; url = http://ec2-54-82-0-182.compute-1.amazonaws.com:8888/get?msg=1:hello" />-->
      <script>
             
    function collapse(arg){
        var content = arg.nextElementSibling;
        if (content.style.maxHeight){
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        } 
    }


    function openForm() {
      document.getElementById("chatWindow").style.display = "block";
      document.getElementById("open-button").style.display = "none";
    }
    
    function closeForm() {
      document.getElementById("chatWindow").style.display = "none";
      document.getElementById("open-button").style.display = "block";
    }


    function sendUserResponseToServer( responseMessage, displayMessage ) {

        if ( responseMessage.includes('?::') ) {

        } else {
            sendMessageToUI(displayMessage,'right');  
        }    
        var sysId;
            var iPageTabID = sessionStorage.getItem("tabID");
            if (iPageTabID === null)
                {
                var iLocalTabID = localStorage.getItem("tabID");
                var current_date = new Date()
                var cms = current_date.getMilliseconds()
                var newID = 1 + cms;
                var oldId = Number(iLocalTabID) + 1;
                var updateID = oldId + cms;
                var iPageTabID = (iLocalTabID == null) ? newID  : updateID;
                localStorage.setItem("tabID",iPageTabID);
                sessionStorage.setItem("tabID",iPageTabID);
                }
            sysId = sessionStorage.getItem("tabID");               
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "https://ids.agnisys.com/mlserver/get?msg="+sysId+":"+responseMessage, false);
            
            xhttp.send();
            if ( responseMessage.includes('?::') ) {
                alert(xhttp.responseText);
            } else {
                sendMessageToUI(xhttp.responseText,'left');   
            }  
             
       //     alert(xhttp.responseText);


            
            
    }

   function sendUserResponse( responseMessage ) {   
       if ( responseMessage === 'Yes' ) {        
            sendUserResponseToServer( "?::yes::?", "?::yes::?");
        } else {
            var suggestion = prompt("Please type your suggestion..", " ");
          if (suggestion != null) {        
            sendUserResponseToServer("?::no:"+suggestion+"::?", "?::no:"+suggestion+"::?");
          }
        }  
  }


  function sendMessageToUI(text,side) {
    var $messages, message;
    if (text.trim() === '') {
        return;
    }
    $('.message_input').val('');
    $messages = $('.messages');
    message_side = side;
    message = new Message({
            text: text,
            message_side: message_side
        });
        message.draw();
    return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
    };


    function Message(arg) {
        this.text = arg.text, this.message_side = arg.message_side;
        this.draw = function (_this) {
            return function () {
                var $message;
                $message = $($('.message_template').clone().html());
                $message.addClass(_this.message_side).find('.text').html(_this.text);
                $('.messages').append($message);
                return setTimeout(function () {
                    return $message.addClass('appeared');
                }, 0);
            };
        }(this);
        return this;
    };


(function () {
    var Message;
    Message = function (arg) {
        this.text = arg.text, this.message_side = arg.message_side;
        this.draw = function (_this) {
            return function () {
                var $message;
                $message = $($('.message_template').clone().html());
                $message.addClass(_this.message_side).find('.text').html(_this.text);
                $('.messages').append($message);
                return setTimeout(function () {
                    return $message.addClass('appeared');
                }, 0);
            };
        }(this);
        return this;
    };
    $(function () {
        var getMessageText, message_side, sendMessage, responseMessage,sendServerMessage;
        message_side = 'left';
        getMessageText = function () {
            var $message_input;
            $message_input = $('.message_input');

            return $message_input.val();
            alert($message_input.val());
        };
        sendMessage = function (text,side) {
            var $messages, message;
            if (text.trim() === '') {
                return;
            }
            $('.message_input').val('');
            $messages = $('.messages');
            message_side = side;
            message = new Message({
                text: text,
                message_side: message_side
            });
            message.draw();
            return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
        };

        sendServerMessage = function(input_Message){
            var sysId;
            var iPageTabID = sessionStorage.getItem("tabID");
              // if it is the first time that this page is loaded
            if (iPageTabID === null)
                {
                var iLocalTabID = localStorage.getItem("tabID");
                  // if tabID is not yet defined in localStorage it is initialized to 1
                  // else tabId counter is increment by 1
                var current_date = new Date()
                var cms = current_date.getMilliseconds()
                var newID = 1 + cms;
                var oldId = Number(iLocalTabID) + 1;
                var updateID = oldId + cms;
                var iPageTabID = (iLocalTabID == null) ? newID  : updateID;
                  // new computed value are saved in localStorage and in sessionStorage
                localStorage.setItem("tabID",iPageTabID);
                sessionStorage.setItem("tabID",iPageTabID);
                }
            sysId = sessionStorage.getItem("tabID");
            
            
            // new code
                // Construct the URL
                  var url = "http://3.88.136.222:8888/chatbot";
                
                  var xhttp = new XMLHttpRequest();
                  xhttp.open("POST", url, false);
                
                  // Set the content type header to indicate JSON data
                  xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                
                  // Construct the JSON data to send
                  var jsonData = JSON.stringify({
                    user_query: "What is Address Unit?",
                    user_name: "John Doe",
                    user_domain_name: ""
                  });
                
                  xhttp.send(jsonData);
                  // Handle the response here
                  if (xhttp.status === 200) {
                    var responseText = xhttp.responseText;
                    // Do something with the responseText (e.g., parse it as JSON)
                    console.log(responseText);
                  } else {
                    // Handle errors or non-200 responses
                    console.error("Request failed with status:", xhttp.status);
                  }
            // new code end
            
            // var xhttp = new XMLHttpRequest();
            // xhttp.open("GET", "https://ids.agnisys.com/mlserver/get?msg="+sysId+":"+input_Message, false);
            // alert(input_Message);
        //   xhttp.open("GET", "http://google.com", false);
            // xhttp.send();
        //   var preText = "<div><span style=\"color:black;font-size:10px\"><b>is this information helpful/correct ? :-</b></span><button class=\'correctAns\' onclick=\"sendUserResponse(\'Yes\')\"><span>&#10003;</span></button>&nbsp;&nbsp;<button class=\"wrongAns\" onclick=\"sendUserResponse(\'No\')\"><span>&#xd7;</span></button></br><div>";
          sendMessage(xhttp.responseText,'left');
        };

        $('.send_message').click(function (e) {
            var message_text = getMessageText();
            sendMessage(message_text,'right'); 
            sendServerMessage(message_text);
        });
        $('.message_input').keyup(function (e) {
            if (e.which === 13) {
                var message_text = getMessageText();
                sendMessage(message_text,'right'); 
                sendServerMessage(message_text);
            }
        });
       
        $('.svaStartStop').click(function (e) {
            var message_text = "-search=sva";
            sendMessage(message_text,'right'); 
            sendServerMessage(message_text);
        });


        sendMessage('Hello, How may I help you! :)','left');
    });
}.call(this));



      </script>
   </head>
   <body>
      <p>This is demo text.</p>
       <!--Chat Bot Script -->
    <!--<script src="https://www.old.agnisys.com/chatbot/main.js"></script>-->
    <button id="open-button" onclick="openForm()">Help</button>
    <div class="chat_window" id="chatWindow">
        <div class="top_menu">
            <div class="buttons">
                <div class="button close" onclick="closeForm()">x</div>
                <!--<div class="button minimize"></div>-->
                <!--<div class="button maximize"></div>-->
            </div>
            <div class="title">Chat</div>
        </div>
        <ul class="messages"></ul>
        <div class="bottom_wrapper clearfix">
            <input type="hidden" name="userEmail" value="{{Session::get('userMail')}}">
            <input type="hidden" name="userName" value="{{Session::get('username')}}">
            <div class="message_input_wrapper">
                <input class="message_input" placeholder="Type your message here..." />
            </div>
            <div class="send_message">
                <div class="icon"></div>
                <div class="text"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
            </div>
        </div>
    </div>
    <div class="message_template"><li class="message"><div class="avatar"></div><div class="text_wrapper"><div class="text"></div></div></li></div>
    <!--end Chat Bot Script -->
   </body>
</html>