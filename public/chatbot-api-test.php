<!DOCTYPE html>
<html>
<head>
    <title>AJAX Example</title>
</head>
<body>

<h1>Send and Receive Data with XHR (AJAX)</h1>

<button onclick="makeRequest()">Send Request</button>

<div id="response"></div>

<script>
function makeRequest() {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the request method, URL, and asynchronous flag
    xhr.open('POST', 'http://54.147.13.164/chatbot', true);
    // Set the request headers for JSON
    xhr.setRequestHeader("Content-Type", "application/json");   
    // Define a callback function to handle the response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById("response").innerHTML = "Response: " + JSON.stringify(response);
        }
    };
    // Create the JSON data you want to send
    var data = {
        user_query: 'What is Address Unit?',
        user_name: 'Uttam',
        user_domain_name: '',
    };   
    // Convert the data to a JSON string
    var jsonData = JSON.stringify(data);

    // Send the request with the JSON data
    xhr.send(jsonData);
    
}
</script>
<p id="demo"></p>
</body>
</html>
