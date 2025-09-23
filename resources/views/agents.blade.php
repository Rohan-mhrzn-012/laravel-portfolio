<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valorant Agents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Valorant Agents</h1>
    <div class="row">
        @foreach($agents as $agent)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $agent['displayIcon'] }}" class="card-img-top" alt="{{ $agent['displayName'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $agent['displayName'] }}</h5>
                        <p class="card-text">{{ $agent['description'] }}</p>
                        <p><strong>Role:</strong> {{ $agent['role']['displayName'] ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
