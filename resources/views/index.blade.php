<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginated Items</title>
</head>
<body>

    <h1>Items List</h1>

    <!-- Dropdown to select number of items per page -->
    <form action="{{ url('/items') }}" method="GET">
        <label for="per_page">Items per page:</label>
        <select name="per_page" id="per_page" onchange="this.form.submit()">
            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
            <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
        </select>
    </form>

    <!-- Display the items -->
    <ul>
        @foreach ($items as $item)
            <li>{{ ($items->currentPage() - 1) * $perPage + $loop->iteration }}. {{ $item->name }} - ${{ $item->price }}</li>
        @endforeach
    </ul>

    <!-- Display pagination links -->
    <div>
        {{ $items->appends(request()->query())->links() }}
    </div>

</body>
</html>
