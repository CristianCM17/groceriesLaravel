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

             
                <div class= "col-lg-6">
                    <button id="cargar" class="btn btn-primary">Load Products</button>
                    <table id="tabla" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>CATEGORY</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class= "col-lg-6">
                    <label for="opciones">Selecciona una opción:</label>
                    <select class="form-control" id="opciones" name="opciones">
                        <option value="">All</option>
                        <option value="Vegetables">Vegetables</option>
                        <option value="Frozen Food">Frozen Food</option>
                        <option value="Packages">Packages</option>
                        <option value="Meats">Meats</option>
                        <option value="Fishes">Fishes</option>
                        <option value="Fruits">Fruits</option>
                    </select>
                    <table id="tablaDt" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>CATEGORY</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        </div>
    </section>
</div>



@endsection