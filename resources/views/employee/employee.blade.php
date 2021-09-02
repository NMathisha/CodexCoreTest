@extends('layouts.layout')

@section('content')

<div><h1>Employee Details</h1></div>

<div><input type="button" class="btn btn-outline-primary" value="Company" onclick="location.href='{{ url('/Companies') }}'"></div>

  <div>
    <div class="form-group">
        <label for="exampleInputPassword1">First name</label>
        <input type="text" class="form-control" id="f_name"  name="name" placeholder="First Name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Last Name </label>
        <input type="text" class="form-control" id="l_name"  name="name" placeholder="Last Name" required>
    </div>

    <div class="form-group">
    <select class="form-control" id="company">
        <option selected disabled>choose</option>
            @foreach ($companies as $company)
        <option value="{{ $company->id }}">{{ $company->name }}</option>
           @endforeach
    </select>
    </div>



    <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="text" class="form-control" id="mail"  name="name" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Contat Number</label>
        <input type="text" class="form-control" id="phone"  name="name" placeholder="Name" required>
    </div>

    <div class="form-group">
        <input type="hidden" id="hid" name="hid" value="">
       <input type="button" value="Save" class="btn btn-outline-primary" onclick="employee.add()">
    </div>
  </div>

<table class="table">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Company</th>
        <th>E Mail</th>
        <th>Phone</th>
        <th>#</th>
    </tr>

    @foreach ($employees as $employee)

    <tr>
        <td>{{$employee->first_name}}</td>
        <td>{{$employee->last_name}}</td>
        <td>{{$employee->company_id}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone}}</td>
        <td><div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" onclick="employee.edit({{$employee->id}})">Edit</button>

            <button type="button" class="btn btn-danger" onclick="employee.delete({{$employee->id}})">Delete</button></td>

    </tr>

    @endforeach

</table>

<span>
    {{$employees->links()}}
</span>




@endsection
