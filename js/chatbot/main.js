             
function collapse(arg) {
    var content = arg.nextElementSibling;
    if (content.style.maxHeight) {
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


function sendUserResponseToServer(responseMessage, displayMessage) {

    if (responseMessage.includes('?::')) {

    } else {
        sendMessageToUI(displayMessage, 'right');
    }
    var sysId;
    var iPageTabID = sessionStorage.getItem("tabID");
    if (iPageTabID === null) {
        var iLocalTabID = localStorage.getItem("tabID");
        var current_date = new Date()
        var cms = current_date.getMilliseconds()
        var newID = 1 + cms;
        var oldId = Number(iLocalTabID) + 1;
        var updateID = oldId + cms;
        var iPageTabID = (iLocalTabID == null) ? newID : updateID;
        localStorage.setItem("tabID", iPageTabID);
        sessionStorage.setItem("tabID", iPageTabID);
    }
    sysId = sessionStorage.getItem("tabID");
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "https://ids.agnisys.com/mlserver/get?msg=" + sysId + ":" + responseMessage, false);
    xhttp.send();
    if (responseMessage.includes('?::')) {
        alert(xhttp.responseText);
    } else {
        sendMessageToUI(xhttp.responseText, 'left');
    }

    //     alert(xhttp.responseText);

}

function sendUserResponse(responseMessage) {
    if (responseMessage === 'Yes') {
        sendUserResponseToServer("?::yes::?", "?::yes::?");
    } else {
        var suggestion = prompt("Please type your suggestion..", " ");
        if (suggestion != null) {
            sendUserResponseToServer("?::no:" + suggestion + "::?", "?::no:" + suggestion + "::?");
        }
    }
}


function sendMessageToUI(text, side) {
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
    var prevCommand = [];
    var commandCount = 0;
    var keyCount = 0;
    // $("#form-prompt").on("submit", function (e) {

    // });


    $(document).keydown(function (event) {
       if (event.which == 38 && $("#textTest").is(":focus")) {
            keyCount++;
            var index = prevCommand.length - keyCount;
            if (typeof prevCommand[index] !== "undefined") {
                $('#res').append('<hr>' + prevCommand[index]);
            }
        } else if (event.which == 40 && $("#command-text").is(":focus")) {

        }
    });


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
        var getMessageText, message_side, sendMessage, responseMessage, sendServerMessage;
        message_side = 'left';
        getMessageText = function () {
            var $message_input;
            $message_input = $('.message_input');
            return $message_input.val();
        };
        sendMessage = function (text, side) {
            var $messages, message;
            // if (text.trim() === '') {
            //     return;
            // }
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

        sendServerMessage = function (input_Message) {
            var sysId;
            var iPageTabID = sessionStorage.getItem("tabID");
            var username = $(".user_name").val();
            var useremail = $(".user_email").val();
            
            // if it is the first time that this page is loaded
            if (iPageTabID === null) {
                var iLocalTabID = localStorage.getItem("tabID");
                // if tabID is not yet defined in localStorage it is initialized to 1
                // else tabId counter is increment by 1
                var current_date = new Date()
                var cms = current_date.getMilliseconds()
                var newID = 1 + cms;
                var oldId = Number(iLocalTabID) + 1;
                var updateID = oldId + cms;
                var iPageTabID = (iLocalTabID == null) ? newID : updateID;
                // new computed value are saved in localStorage and in sessionStorage
                localStorage.setItem("tabID", iPageTabID);
                sessionStorage.setItem("tabID", iPageTabID);
            }
            sysId = sessionStorage.getItem("tabID");
            var xhttp = new XMLHttpRequest();
            // xhttp.open("GET", "https://ids.agnisys.com/mlserver/get?msg="+sysId+":"+input_Message, false);
            
            xhttp.open("POST", "https://d1x35h7sssb88.cloudfront.net/chatbot", true);
            
            
            // Get the CSRF token from the meta tag
            // const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
            
            // Set the request headers
            xhttp.setRequestHeader('Content-Type', 'application/json');
            // xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            // Set up a callback function to handle the response
            xhttp.onreadystatechange = function () {
            
                if (xhttp.readyState === 4) {
                  // alert("State 4 - "+username + useremail);
                    if (xhttp.status === 200) {
                      // alert("status 200 - "+username + useremail);
                        // Request was successful, handle the response here
                        var response = JSON.parse(xhttp.responseText);
                        var get_value = response.answer;
                        var static_data = "**Note:** The response generated above may not be entirely accurate; please ensure to double-check with Agnisys support team. You can find more information regarding your query in the links mentioned below.";
                        
                        var get_links = response.related_links;
                        
                        // Create a Set to store unique links
                        var uniqueLinks = new Set();
            
                        // Add links to the Set to ensure uniqueness
                        get_links.forEach(element => {
                            uniqueLinks.add(element);
                        });
            
                        // Convert the Set back to an array
                        var uniqueLinksArray = Array.from(uniqueLinks);
            
                        // Now, uniqueLinksArray contains unique related links
                        // console.log(uniqueLinksArray);
                        
                        
                        const linkContainer = document.createElement('div');
                        const staticParagraph = document.createElement('p');
                          staticParagraph.textContent = static_data;                        
                        const paragraph = document.createElement('p');
                        paragraph.textContent = get_value;
                        linkContainer.appendChild(paragraph);
                         linkContainer.appendChild(staticParagraph);                        
                        //  linkContainer.appendChild(document.createElement('br'));
                        
                        try{                        
                        
                                if (uniqueLinksArray.length > 0) {
                                    const linksHeading = document.createElement('span');
                                    linksHeading.textContent = "**Related Links:**";
                                    linkContainer.appendChild(linksHeading);
                                    linkContainer.appendChild(document.createElement('br'));
                                    uniqueLinksArray.forEach(element => {
                                        const link = document.createElement('a');
                                        link.href = element;
                                        link.textContent = element;
                                        link.target = "_blank"; 
                                        linkContainer.appendChild(link);
                                        linkContainer.appendChild(document.createElement('br'));
                                    });
                                }
                        }
                        catch(e){console.log(e)}
                        sendMessage(linkContainer, 'left');
                    } else {
                        sendMessage("Request failed with status: " + xhttp.statusText, 'left');
                        console.error("Request failed with status: " + xhttp.statusText);
                        
                        
                    }
                }
            };
            // Create a JSON payload (if needed)
            var chatbotQueryData = {
                user_query: input_Message,
                user_name: username,
                user_domain_name: useremail,
            };

            var chatbotJSON = JSON.stringify(chatbotQueryData);
            console.log(chatbotJSON);
            xhttp.send(chatbotJSON);
          
        };

        $('.send_message').click(function (e) {
            var message_text = getMessageText();
            sendMessage(message_text, 'right');
            sendServerMessage(message_text);
            commandCount++;
            keyCount = 0;
            prevCommand[commandCount] = $('#textTest').val();
            e.preventDefault();
            $('#textTest').val('');
        });
        $('.message_input').keyup(function (e) {
            if (e.which === 13) {
                var message_text = getMessageText();
                sendMessage(message_text, 'right');
                sendServerMessage(message_text);
            }
        });

        $('.svaStartStop').click(function (e) {
            var message_text = "-search=sva";
            sendMessage(message_text, 'right');
            sendServerMessage(message_text);
        });


        sendMessage('Hello, How may I help you! :)', 'left');
    });
}.call(this));



