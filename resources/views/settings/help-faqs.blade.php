@extends('layouts.settings')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help and FAQs</title>
    
  
    <style>
        .grid-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow: auto; 
        }

        .faq-box {
            background-color: #F07324;
            margin-top: 10%;
            max-width: 1200px; /* Increased width for a larger container */
            width: 350%; /* Adjust width for better responsiveness */
            padding: 30px;
            border-radius: 8px;
            position: relative;
        }

        .faqs-header h2, .faqs-header p {
            text-align: center;
            color: #F9F8F2;
        }

        details {
            cursor: pointer;
        }

        details summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            padding: 15px;
            background-color: #F9F8F2;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        details summary:hover {
            background-color: #e6e6e6;
        }

        details p {
            margin-top: 10px;
            color: #333;
            margin-left: 1rem;
            font-size: 16px;
        }

        @media (max-width: 1024px) {
            .faq-box {
                width: 95%;
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .faq-box {
                width: 100%;
                padding: 15px;
            }

            details summary {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .faq-box {
                width: 100%;
                padding: 10px;
            }

            details summary {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="grid-container">
        <div class="faq-box">
            <div class="w-full bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:max-w-4xl sm:px-10">
                <div class="mx-auto px-5">
                    <div class="faqs-header">
                        <h2>Help and FAQs</h2>
                        <p>Frequently Asked Questions</p>
                    </div>

                    <div class="mx-auto mt-8 max-w-3xl divide-y divide-neutral-200">
                        @foreach ($faqs as $faq)
                            <div class="py-5">
                                <details>
                                    <summary>
                                        <span>{{ $faq->question }}</span>
                                        <span class="transition">
                                            <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>
                                    <p>{{ $faq->answer }}</p>
                                </details>
                            </div>
                        @endforeach
                        @if($faqs->isEmpty())
                            <p>No FAQs available at this time.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
