@extends('layout.groceries')

@section('main_content')
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset("assets/img/bg-header.jpg") }}');">
            <div class="container">
                <h1 class="pt-5">
                    Contact
                </h1>
                <p class="lead">
                    Don't Hesitate to Contact Us.
                </p>
            </div>
        </div>
    </div>


    <section class="pb-0">
        <div class="contact1 mb-5">
            <div class="container">
                <h1 class="pt-5">Admin Products</h1>
                <p class="lead">Products Administration</p>
            </div>
           
        </div>
    </section>

    <section class="pb-0">
        <div class="mb-5">
            <div class="container">
             <div class="row">

             
                <div class= "col-lg-12">
                    <table id="tableEmployees" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>SALARY</th>
                                <th>GENDER</th>
                                <th>DEPARTMENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $emp)
                            <tr>
                                <td>{{$emp->emp_no}}</td>
                                <td>{{$emp->name}}</td>
                                <td>{{$emp->salary}}</td>
                                <td>{{$emp->gender}}</td>
                                <td>{{$emp->department}}</td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
        </div>
    </section>
</div>



@endsection