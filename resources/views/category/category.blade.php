@extends('layouts.app')
@section('content')
<style>
    /* Popup box BEGIN */
    .edit-category {
        background: rgba(0, 0, 0, .4);
        cursor: pointer;
        display: none;
        height: 100%;
        position: fixed;
        text-align: center;
        top: 0;
        width: 100%;
        z-index: 10000;
    }

    .edit-category .helper {
        display: inline-block;
        height: 100%;
        vertical-align: middle;
    }

    .edit-category>div {
        background-color: #fff;
        box-shadow: 10px 10px 60px #555;
        display: inline-block;
        height: auto;
        max-width: 551px;
        min-height: 100px;
        vertical-align: middle;
        width: 60%;
        position: relative;
        border-radius: 8px;
        padding: 15px 5%;
    }

    .popupCloseButton {
        background-color: #fff;
        border: 3px solid #999;
        border-radius: 50px;
        cursor: pointer;
        display: inline-block;
        font-family: arial;
        font-weight: bold;
        position: absolute;
        top: -20px;
        right: -20px;
        font-size: 25px;
        line-height: 30px;
        width: 30px;
        height: 30px;
        text-align: center;
    }

    .popupCloseButton:hover {
        background-color: #ccc;
    }

    /* Popup box BEGIN */
</style>
{{$page_title}}
<form name="add_category_form" id="add-category-form">
    <label for="category">Category</label>
    <input type="text" name="category" id="category">
    <label for="description">Descripion</label>
    <input type="text" name="description" id="description">

    <input type="Submit" value="Add">
</form>
<div class=".error-wrap"></div>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <td>#</td>
            <td>Category</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($all_categories as $key=>$category)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$category->category}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a class="btn btn-app bg-info" onclick="edit_category(<?php echo $category->id; ?>);">
                    <i class="fas fa-trash"></i>Edit
                </a>
                <a class="btn btn-app bg-danger" onclick="delete_category(<?php echo $category->id; ?>);">
                    <i class="fas fa-trash"></i>Delete
                </a>


            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>#</td>
            <td>Category</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
    </tfoot>
</table>

<div class="edit-category">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">&times;</div>
        <div id="edit-form"></div>
        <div class=".error-wrap"></div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {

        $('#example').DataTable();
    });

    function delete_category(id) {
        $.ajax({
            type: 'GET',
            url: "{{URL::to('/delete-category')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(content) {
                // load_danger_modal('Delete Category', content.element)
            },
            error: function() {

            }
        });

    }

    $(function() {

        $('#add-category-form').validate({
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
                    url: "{{URL::to('/add-category')}}",
                    type: "GET",
                    data: $("#add-category-form").serialize() + "&_token=" + token,
                    success: function(msg) {
                        if (msg == 1) {
                            $('.error-wrap').html('<div class="success">Alright! Category has been added successfully.</div>');
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
<script>
    function edit_category(cat_id) {
        $('.edit-category').show();
        var token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{URL::to('/edit-category')}}",
            type: "GET",
            data:{
                "_token": "{{ csrf_token() }}",
                "id": cat_id
            },
            success: function(msg) {
                if (msg) {
                    $('#edit-form').html(msg);
                }
            },
            error: function(data) {

            }
        });

    };
    $('.hover_bkgr_fricc').click(function() {
        $('#edit-category').hide();
    });
    $('.popupCloseButton').click(function() {
        $('#edit-category').hide();
    });
</script>
@endsection