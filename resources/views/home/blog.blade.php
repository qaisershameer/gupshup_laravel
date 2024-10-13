<!-- BLOG Section  -->

<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
    
    <h2 class="section-title py-5">EVENTS AT THE FOOD HUT</h2>

    <div class="row justify-content-center">

        <div class="col-sm-7 col-md-4 mb-5">

            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#foods" role="tab" aria-controls="pills-home" aria-selected="true">Pak Foods</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#juices" role="tab" aria-controls="pills-profile" aria-selected="false">Euro Juices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile2-tab" data-toggle="pill" href="#juices1" role="tab" aria-controls="pills-profile2" aria-selected="false">Itly Juices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile3-tab" data-toggle="pill" href="#juices2" role="tab" aria-controls="pills-profile3" aria-selected="false">Germn Juices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile4-tab" data-toggle="pill" href="#barbq" role="tab" aria-controls="pills-profile4" aria-selected="false">French Juices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile5-tab" data-toggle="pill" href="#chinese" role="tab" aria-controls="pills-profile5" aria-selected="false">Chinese Flavour</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile6-tab" data-toggle="pill" href="#pizza" role="tab" aria-controls="pills-profile6" aria-selected="false">NewYork Pizza</a>
                </li>                
            </ul>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">            
            <div class="row">
                @foreach ($data as $data)
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3 my-md-0">
                            <img height="400px" src="food_img/{{$data->image}}" alt="template by QrDevTeam http://www.qrdpro.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">Rs. {{number_format($data->price,2,'.', ',')}}/-</a></h1>
                                <h4 class="pt20 pb20">{{$data->title}}</h4>
                                <p class="text-white">{{$data->detail}} </p>
                            </div>

                            <form action="">
                                <input type="number" min="1">
                                <input class="btn btn-danger" type="submit" value="ADD TO CARD">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="juices" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$15</a></h1>
                            <h4 class="pt20 pb20">Consectetur Adipisicing Elit</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$29</a></h1>
                            <h4 class="pt20 pb20">Ullam Laboriosam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$3</a></h1>
                            <h4 class="pt20 pb20">Fugit Ipsam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="juices1" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$15</a></h1>
                            <h4 class="pt20 pb20">Consectetur Adipisicing Elit</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$29</a></h1>
                            <h4 class="pt20 pb20">Ullam Laboriosam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$3</a></h1>
                            <h4 class="pt20 pb20">Fugit Ipsam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="juices2" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$15</a></h1>
                            <h4 class="pt20 pb20">Consectetur Adipisicing Elit</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$29</a></h1>
                            <h4 class="pt20 pb20">Ullam Laboriosam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$3</a></h1>
                            <h4 class="pt20 pb20">Fugit Ipsam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="juices3" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$15</a></h1>
                            <h4 class="pt20 pb20">Consectetur Adipisicing Elit</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$29</a></h1>
                            <h4 class="pt20 pb20">Ullam Laboriosam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$3</a></h1>
                            <h4 class="pt20 pb20">Fugit Ipsam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="barbq" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$15</a></h1>
                            <h4 class="pt20 pb20">Consectetur Adipisicing Elit</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$29</a></h1>
                            <h4 class="pt20 pb20">Ullam Laboriosam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$3</a></h1>
                            <h4 class="pt20 pb20">Fugit Ipsam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="chinese" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$15</a></h1>
                            <h4 class="pt20 pb20">Consectetur Adipisicing Elit</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$29</a></h1>
                            <h4 class="pt20 pb20">Ullam Laboriosam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$3</a></h1>
                            <h4 class="pt20 pb20">Fugit Ipsam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pizza" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$15</a></h1>
                            <h4 class="pt20 pb20">Consectetur Adipisicing Elit</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$29</a></h1>
                            <h4 class="pt20 pb20">Ullam Laboriosam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$3</a></h1>
                            <h4 class="pt20 pb20">Fugit Ipsam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="beef" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$15</a></h1>
                            <h4 class="pt20 pb20">Consectetur Adipisicing Elit</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$29</a></h1>
                            <h4 class="pt20 pb20">Ullam Laboriosam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$3</a></h1>
                            <h4 class="pt20 pb20">Fugit Ipsam</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa provident illum officiis fugit laudantium voluptatem sit iste delectus qui ex. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>