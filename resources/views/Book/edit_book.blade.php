<form name="edit_book_form" id="edit-book-form">
<div class="row">
        <input type="text" name="id" id="id" value="{{$book_detail->id}}">
    </div>
    <div class="row">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$book_detail->name}}">
    </div>
    <div class="row">
        <label for="category">Category</label>
        <select name="cat_id" id="cat_id" >
            <option >--Select Category--</option>
            @foreach($all_categories as $cat)
            <option value="{{ $cat->id }}" <?php if(  $cat->id ==  $book_detail->cat_id){?> selected <?php } ?>> {{$cat->category}} </option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <label for="number">qty</label>
        <input type="text" name="qty" id="qty" value="{{$book_detail->qty}}">
    </div>
    <div class="row">
        <label for="unit_price">price</label>
        <input type="text" name="unit_price" id="unit_price" value="{{$book_detail->unit_price}}">
    </div>
    <div class="row">
        <label for="description">Descripion</label>
        <input type="text" name="description" id="description" value="{{$book_detail->description}}">
    </div>
    <div class="row">

        <input type="Submit" value="Update">
    </div>
</form>
<div class="error-wrap"></div>
<script>
    $(function() {

        $('#edit-book-form').validate({
            rules: {
                title: {
                    required: true,
                },
                alias: {
                    required: true,
                },
            },
            submitHandler: function(form) {

                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: "{{URL::to('/update-book')}}",
                    type: "GET",
                    data: $("#edit-book-form").serialize() + "&_token=" + token,
                    success: function(msg) {
                        if (msg == 1) {
                            $('.error-wrap').html('<div class="success">Alright! Category has been updated successfully.</div>');
                            $('#edit-book').hide();
                            window.location = "{{URL::to('/category')}}";
                        } else {
                            $('.error-wrap').html('<div class="notice">Oppes! Something went wrong.</div>');
                        }

                    },
                    error: function(data) {



                    }
                });



            }
        });

    });

    
</script>