<!DOCTYPE html>
<html lang="en">
<head>

    @include('home.css')
        <style>
            table
                {                              
                    margin: 40px;
                    border: 1px solid skyblue;
                    padding: 40px;
                }
            th
                {
                    padding: 10px;
                    text-align: center;
                    background-color: red;
                    color: white;
                    font-weight: bold;
                }
            td
                {
                    padding: 10px;
                    color: white;
                }

            .div_center
                {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-top: 50px;
                }

            .div_deg
                {
                    padding: 10px;
                    /* width: 200px; */
                }

            label
                {
                    display: inline-block;
                    width: 100px;
                }

        </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    

    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-table">Book-Table</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Food Hut</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog<span class="sr-only">(current)</span></a>
                </li>

                @if (Route::has('login'))

                        @auth

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('my_cart')}}">Cart</a>
                        </li>

                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input class="btn btn-primary ml-xl-4" type="submit" value="Logout">
                        </form>
                
                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>

                    @endauth

                @endif
                
            </ul>
        </div>
    </nav>

    </br> </br> </br> </br>    

    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">

        <table>

            <tr>
                <th>Food Title</th>
                <th>Price (Rs.)</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

            <?php 
                    $total_qty = 0;
                    $total_price = 0;
            ?>

            @foreach ($data as $data)

            <tr>
                <td> {{$data->title}} </td>
                <td> {{number_format($data->price,2,'.', ',')}}/- </td>
                <td> {{number_format($data->qty,0,'.', ',')}} Pcs </td>
                <td>
                    <img width="100px" height="100px" src="food_img/{{$data->image}}" alt="">
                </td>
                <td>
                    <a onclick="return confirm('Are you sure to remove this ?')" class="btn btn-danger" href="{{url('remove_cart', $data->id)}}"> Remove </a>
                </td>
            </tr>

            <?php 
                    $total_qty = $total_qty + $data->qty;
                    $total_price = $total_price + $data->price;
            ?>

            @endforeach

            <tr>
                <th>Totals</th>
                <th> {{number_format($total_price,2,'.', ',')}}/- </th>
                <th> {{number_format($total_qty,0,'.', ',')}} Pcs </th>
                <th></th>
                <th></th>
            </tr>

        </table>

        <h4>
            Total QTY : {{number_format($total_qty,0,'.', ',')}} Pcs ~ Total Price for the Cart :  Rs. {{number_format($total_price,2,'.', ',')}}/-
        </h4>

    </div>

    <div class="div_center">

        <form action="{{url('confirm_order')}}" method="post">

            @csrf

            <div>

                <div class="div_deg">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{Auth()->user()->name}}">
                </div>

                <div class="div_deg">
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{Auth()->user()->email}}">
                </div>

                <div class="div_deg">
                    <label for="">Address</label>
                    <input type="text" name="address" value="{{Auth()->user()->address}}">
                </div>

                <div class="div_deg">
                    <label for="">Phone</label>
                    <input type="text" name="phone" value="{{Auth()->user()->phone}}">
                </div>

                <div class="div_deg">                    
                    <input class="btn btn-success" type="submit" value="Confirm Order">
                </div>

            </div>

        </form>

    </div>


	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="assets/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="assets/js/foodhut.js"></script>

</body>
</html>
