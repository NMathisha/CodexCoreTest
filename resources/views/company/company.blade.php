@extends('layouts.layout')

@section('content')



    <div><h1>Company Details</h1></div>

    <div><input type="button" class="btn btn-outline-primary" value="Employee" onclick="location.href='{{ url('/Employee') }}'"></div>

    <div class="container">
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
            <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
         </ul>
        </div>
        @endif


        <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('/submitcompany') }}">
            @csrf

            <div class="form-group">
                <label for="exampleInputPassword1">Company Name</label>
                <input type="text" class="form-control" id="name"  name="name" placeholder="Company Name" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Mail</label>
                <input type="text" class="form-control" id="mail" name="mail"  placeholder="Mail" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Website</label>
                <input type="text" class="form-control" id="web" name="web" placeholder="Website" required>
            </div>




                <input type="file" id="files" name="files[]" class="dropify" data-max-file-size-preview="3M"
                multiple="multiple" accept="image/*" onchange="" />
            <div>


                <input type="hidden" id="hid" name="hid" value="">
                <button id="uploadButton" class="btn btn-outline-primary" >Submit</button>
            </div>










            </div>
        </form>




        <table class="table">
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Logo</th>
            <th>WebSite</th>
            <th>#</th>

        </tr>

        @foreach ($company_data as $data )

        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td><img src="{{$data->logo}}" alt="" width="100" height="60"></td>
            <td>{{$data->website}}</td>
            <td><div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary" onclick="company.edit({{$data->id}})">Edit</button>

                <button type="button" class="btn btn-danger" onclick="company.delete({{$data->id}})">Delete</button>
              </div></td>
        </tr>

        @endforeach

    </table>

    <span>
        {{$company_data->links()}}
    </span>

</div>
@endsection
