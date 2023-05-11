<?php
require __DIR__ . '/vendor/autoload.php'; // Load the OpenAI API client library

use OpenAI\Api;

$api_key = 'YOUR_API_KEY'; // Replace with your API key
$client = new Api($api_key);

// Handle user input and generate a response
if (isset($_POST['user_input'])) {
    $user_input = $_POST['user_input'];
    $response = $client->createCompletion([
        'engine' => 'davinci',
        'prompt' => $user_input,
        'max_tokens' => 50,
        'temperature' => 0.5,
    ]);
    $bot_response = $response->choices[0]->text;
} else {
    $bot_response = 'Hello! How can I assist you today?';
}

// Output the chat interface
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chatbot Example</title>
</head>
<body>
    <h1>Chatbot Example</h1>
    <form method="post">
        <label for="user_input">You:</label>
        <input type="text" id="user_input" name="user_input">
        <button type="submit">Send</button>
    </form>
    <p>Bot: <?php echo $bot_response; ?></p>
</body>
</html>