<table id="book-list-table1" class="display" style="width:100%">
    <thead>
        <th>#</th>
        <th>Book</th>
        <th>Descripion</th>
        <th>Price</th>
    </thead>
    @foreach($books as $key => $book)
    <tbody>
        <td>{{ $key + 1}}</td>
        <td>{{ $book->name }}</td>
        <td>{{ $book->description }}</td>
        <td>{{ number_format($book->unit_price) }}</td>
    </tbody>
    @endforeach
</table>

<script>
    $(document).ready(function() {

        $('#book-list-table').DataTable();
    });
</script>