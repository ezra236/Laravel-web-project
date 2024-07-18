<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Obituaries</title>
    <meta name="description" content="View obituaries submitted to the platform.">
    <meta name="keywords" content="obituaries, view obituaries, death notices">
    <meta property="og:title" content="View Obituaries">
    <meta property="og:description" content="View obituaries submitted to the platform.">
    <meta property="og:image" content="your-image-url">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <link rel="canonical" href="{{ url()->current() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .social-share {
            margin-top: 20px;
        }
        .social-share a {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .social-share a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>View Obituaries</h2>
    @if($obituaries->isEmpty())
        <p>No obituaries found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Date of Death</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Submission Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($obituaries as $obituary)
                    <tr>
                        <td>{{ $obituary->id }}</td>
                        <td>{{ $obituary->name }}</td>
                        <td>{{ $obituary->date_of_birth }}</td>
                        <td>{{ $obituary->date_of_death }}</td>
                        <td>{{ $obituary->content }}</td>
                        <td>{{ $obituary->author }}</td>
                        <td>{{ $obituary->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <div class="social-share">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">Share on Facebook</a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text=View%20Obituaries" target="_blank">Share on Twitter</a>
    </div>
</body>
</html>
