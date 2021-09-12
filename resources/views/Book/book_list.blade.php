@extends('layouts.app')
@section('content')
<select id="select-category">
    <option value="">--Select Category--</option>
    @foreach($all_categories as $cat)
    <option value="{{ $cat->id }}"> {{ $cat->category }} </option>
    @endforeach
</select>
<br/><br/><br/>
<div id="result">
    <table id="book-list-table" class="display" style="width:100%">
        <thead>
            <th>#</th>
            <th>Book</th>
            <th>Descripion</th>
            <th>Price</th>
            <th>Action</th>
        </thead>
        @foreach($all_books as $key => $book)
        <tbody>
            <td>{{ $key + 1}}</td>
            <td><input type="hidden" name="book_name" id="book_name_{{ $book->id }}">{{ $book->name }}</td>
            <td>{{ $book->description }}</td>
            <td><input type="hidden" name="unit_price" id="unit_price_{{ $book->id }}">{{ number_format($book->unit_price) }}</td>
            <td><input type="number" name="qty" id="qty_{{ $book->id }}"><button class="px-4 py-2 text-white bg-blue-800 rounded btn-info" onclick="add_to_cart('{{ $book->id }}')">Add To Cart</button></td>
        </tbody>
        @endforeach
    </table>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {

        $('#book-list-table').DataTable();
    });

    $(function() {
        $("#select-category").on('change', function() {
            $.ajax({
            type: 'GET',
            url: "{{URL::to('/filter-book-list')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $('#select-category').val(),
            },
            success: function(content) {
               $('#result').html(content);
            },
            error: function() {

            }
        });
        });

    });

    function add_to_cart(id){
        $.ajax({
            type: 'POST',
            url: "{{URL::to('/cart')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "Name": $('#book_name_'+ id).val(),
                "unit_price": $('#unit_price_'+ id).val(),
                "qty" : $('#qty_'+ id).val(),
            },
            success: function(content) {
              // $('#result').html(content);
            },
            error: function() {

            }
        });
    }
</script>
@endsection