<form name="edit_category_form" id="edit-category-form">
    <div class="row">
        <input type="hidden" name="id" id="id" value="{{$cat_detail->id}}">
    </div>
    <div class="row">
        <label for="category">Category</label>
        <input type="text" name="category" id="category" value="{{$cat_detail->category}}">
    </div>
    <div class="row">
        <label for="description">Descripion</label>
        <input type="text" name="description" id="description" value="{{$cat_detail->description}}">
    </div>
    <div class="row">
        <input type="Submit" value="Add">
    </div>
</form>
<div class="error-wrap"></div>
<script>
    $(function() {

        $('#edit-category-form').validate({
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
                    url: "{{URL::to('/update-category')}}",
                    type: "GET",
                    data: $("#edit-category-form").serialize() + "&_token=" + token,
                    success: function(msg) {
                        if (msg == 1) {
                            $('.error-wrap').html('<div class="success">Alright! Category has been updated successfully.</div>');
                            $('#edit-category').hide();
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