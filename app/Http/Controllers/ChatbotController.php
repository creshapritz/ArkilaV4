<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        // Get and clean user input
        $userMessage = strtolower(trim($request->input('message')));

        // Predefined chatbot responses based on keywords
        $responses = [
            "hello" => "Hi! How can I help you today?",
            "hi" => "Hello! What can I do for you?",
            "bye" => "Goodbye! Have a great day!",
            "book" => "To book a car, visit our website and select a vehicle.",
            "requirements" => "You need a valid driver's license and a government-issued ID.",
            "cancel" => "You can cancel your booking through your account or contact support.",
            "cost" => "Our rental prices vary. Check our website for details.",
            "support" => "You can reach customer support via phone, email, or live chat.",
            "hours" => "Our support team is available from 8 AM to 10 PM daily.",
            // Add more keywords and responses as needed
        ];

        // Find the best response based on keywords
        $botReply = $this->getResponse($userMessage, $responses);

        return response()->json(['reply' => $botReply]);
    }

    /**
     * Get the response based on user input.
     */
    private function getResponse($userMessage, $responses)
    {
        // Loop through each keyword in responses
        foreach ($responses as $keyword => $response) {
            if (strpos($userMessage, $keyword) !== false) {
                return $response; // Return the corresponding response if keyword matches
            }
        }

        // Default fallback response if no keyword matches
        return $this->getFallbackResponse();
    }

    /**
     * Provide fallback suggestions when no match is found.
     */
    private function getFallbackResponse()
    {
        return "
I'm sorry, I didn't understand that. Here are some keywords you can use:
- 'hello' or 'hi'
- 'book' for booking information
- 'requirements' for renting a car
- 'cancel' for cancellation policies
- 'cost' for pricing information
- 'support' for customer support contact details
- 'hours' for operating hours
";
    }
}
