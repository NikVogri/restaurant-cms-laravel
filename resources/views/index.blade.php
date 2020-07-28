<x-frontApp>

    <section class="site-cover" style="background-image: url(images/bg_3.jpg);" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center site-vh-100">
                <div class="col-md-12">
                    <h1 class="site-heading site-animate mb-3">Welcome To DemoRestaurant</h1>
                    <h2 class="h5 site-subheading mb-5 site-animate">Come and eat well with our delicious &amp; healthy
                        foods.</h2>
                    <p><a href="{{ route('cart.index') }}" class="btn btn-outline-white btn-lg site-animate">View your
                            Cart</a></p>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section" id="section-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5 site-animate">
                    <h2 class="display-4">Delicious Menu</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and
                                Consonantia, there live the blind texts.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row site-animate item-container">
                        @foreach ($items as $item)
                        <div class="col-md-6 media menu-item my-5">
                            <img class="mr-3" src="{{ asset($item->imagePath()) }}" height="100" class="img-fluid"
                                alt="Free Template by colorlib.com">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $item->name }}</h5>
                                <p style="text-align: left;">{{ substr($item->description, 0, 125) }}</p>
                                <div class="d-flex">
                                    <h6 style="text-align: left;" class=" text-primary menu-price">{{ $item->price }}€
                                    </h6>
                                    <button class="btn btn-primary ml-3" data-add_id="{{ $item->id }}">Add to
                                        Cart</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->


    <section class="site-section bg-light" id="section-contact">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center mb-5 site-animate">
                    <h2 class="display-4">Get In Touch</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and
                                Consonantia, there live the blind texts.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mb-5 site-animate">
                    <form action="{{ route('contacts.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                value="{{ old('name') }}">
                            @error('name')
                            <p class="text-small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ old('email') }}">
                            @error('email')
                            <p class="text-small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body" class="sr-only">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" name="body" class="form-control"
                                placeholder="Write your body">{{ old('body') }}</textarea>
                            @error('body')
                            <p class="text-small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg" value="Send Message">
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 site-animate">
                    <p><img src="images/about_img_1.jpg" alt="" class="img-fluid"></p>
                    <p class="text-black">
                        Address: <br> 121 Street, Melbourne Victoria <br> 3000 Australia <br> <br>
                        Phone: <br> 90 987 65 44 <br> <br>
                        Email: <br> <a href="mailto:info@yoursite.com">info@yoursite.com</a>
                    </p>

                </div>

            </div>
        </div>
    </section>
    <!-- END section -->

</x-frontApp>
