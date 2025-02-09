<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARKILA Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .chat-container {
            width: 400px;
            height: 500px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        #chat-box {
            flex-grow: 1;
            overflow-y: scroll;
            padding: 20px;
            background-color: #ffffff;
            border-bottom: 2px solid #ddd;
            margin-bottom: 10px;
        }

        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 10px;
            max-width: 80%;
        }

        .user {
            background-color: #F07324;
            color: white;
            text-align: right;
            align-self: flex-end;
        }

        .bot {
            background-color: #F9F9F2;
            color: #333;
            text-align: left;
            align-self: flex-start;
        }

        #input-container {
            display: flex;
            padding: 10px;
            background-color: #fff;
        }

        #user-input {
            width: 100%;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ddd;
            margin-right: 10px;
            outline: none;
        }

        #send-btn {
            padding: 10px 20px;
            background-color: #F07324;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        #send-btn:hover {
            background-color: #F07324;
        }

        .message-time {
            font-size: 0.9em;
            color: #fff;
            margin-top: 5px;
        }

        #chat-box::-webkit-scrollbar {
            width: 6px;
        }

        #chat-box::-webkit-scrollbar-thumb {
            background-color: #bbb;
            border-radius: 3px;
        }
    </style>
</head>

<body>

    <h2>ARKILA Chatbot</h2>

    <div class="chat-container">
        <div id="chat-box">
            <!-- Chat messages will appear here -->
        </div>
        <div id="input-container">
            <input type="text" id="user-input" placeholder="Type a message..." autofocus>
            <button id="send-btn">Send</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('send-btn').addEventListener('click', function () {
                let userMessage = document.getElementById('user-input').value.trim();

                if (userMessage === "") {
                    alert("Please enter a message!");
                    return;
                }

                // Append user's message
                appendMessage(userMessage, 'user');

                fetch('/chatbot', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ message: userMessage })
                })
                .then(response => response.json())
                .then(data => {
                    let botReply = data.reply || "Sorry, I don't understand that.";
                    // Append bot's reply
                    appendMessage(botReply, 'bot');
                })
                .catch(error => {
                    console.error("Error:", error);
                    appendMessage("Sorry, there was an error. Please try again later.", 'bot');
                });

                // Clear input field
                document.getElementById('user-input').value = '';
            });
        }); 

        // Function to append message to chat-box
        function appendMessage(message, sender) {
            let chatBox = document.getElementById('chat-box');
            let messageDiv = document.createElement('div');
            messageDiv.classList.add('message', sender);

            // Add message content
            messageDiv.innerHTML = `
                <p>${message}</p>
                <p class="message-time">${new Date().toLocaleTimeString()}</p>
            `;

            chatBox.appendChild(messageDiv);

            // Scroll chat box to the bottom
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>

</body>

</html>
