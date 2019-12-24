@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    
    <form  method="post" action="{{route('article.store')}}"  id="upload_form" enctype="multipart/form-data">
        {{csrf_field()}}
       
      
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-input">
        <label for="text">First name</label>
        <input type="text" name="text" id="{{Auth::id()}}">
        </div>

        <div class="form-input">
            <label for="main_picture">main picture</label>
            <input type="file" name="main_picture">
        </div>

        <div class="form-input">  
        <label for="user_id">User id</label>      
        <select name="user_id">
        <option value={{\Auth::id()}}>{{\Auth::id()}}</option>
        </select>

        </div>
        <div class="wrapper">
        </div>
            <div class="form-input items" >
                <label for="item_image[]">item image</label>
                <input type="file"  name="item_image[]">
            </div>
            <div class="form-input items" >
                <label for="item_image[]">item image</label>
                <input type="file"  name="item_image[]">
            </div>
            <div class="form-input items" >
                <label for="item_image[]">item image</label>
                <input type="file"  name="item_image[]">
            </div>
            <div class="form-input items" >
                <label for="item_image[]">item image</label>
                <input type="file"  name="item_image[]">
            </div>
            <div class="form-input items" >
                <label for="item_image[]">item image</label>
                <input type="file"  name="item_image[]">
            </div>
        
      
        <div class="form-input">
            <button type="submit" name="upload" id="upload" value="submit" >Submit</button>
        </div>
    </form>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">


           


            $.ajaxSetup({
                 headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                    });
            $("#upload_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
            type: 'POST',
            url: "{{route('article.store')}}",
            data: new FormData($this),
            dataType: "JSON",
            contentType : application/json,
           // cache :false,
           // processData: false,
            success: function (data) {
               alert(data.success);
            }
        });
            });
        });
        $(document).ready(function() {
      $(".btn-success").click(function(){ 
         alert("hello");
      });
    </script>
@stop