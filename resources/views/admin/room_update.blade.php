<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        label{
            display:inline-block;
            width: 200px;

        }
        .div_deg{
            padding-top:30px;
        }
        .div_center{
            text-align:center;
            padding-top: 40px;
        }

    </style>
  </head>
  <body>
    @include('admin.heder')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

            </div>
            <div class="div_center">
                <h1 style="font-size: 30px; font-weight:bold">Update Room</h1>
            <form action="{{url('edit_room',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="div_deg">
                    <label for="">Room Title</label>
                    <input type="text" name="title" value="{{$data->room_title}}">
                </div>
                <div class="div_deg">
                    <label for="">Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                
                <div class="div_deg">
                    <label for="">Price</label>
                    <input type="number" name="price" value="{{$data->price}}">
                </div>
                <div class="div_deg">
                    <label for="">Room Type</label>
                    <select name="type" id="">
                    <option selected value="value="{{$data->room_type}}"">{{$data->room_type}}</option>
                        <option value="regular">Regular</option>
                        <option value="premium">Primium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div class="div_deg">
                    <label for="">Free Wifi</label>
                    <select name="wifi" id="">
                    <option selected value="value="{{$data->wifi}}"">{{$data->wifi}}</option>
                        <option  value="yes">Yes</option>
                        <option value="no">No</option>

                    </select>
                </div>
                <div class="div_deg">
                    <label for="">Current Image</label>
                    <img width="100" style="margin:auto;" src="/room/{{$data->image}}" alt="">
                </div>
                <div class="div_deg">
                    <label for="">Upload Image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_deg">
                    <input class="btn btn-primary" type="submit" value="Update Room">
                </div>
            </form>

            </div>
        </div>
    </div>

       
        @include('admin.footer')

  </body>
</html>