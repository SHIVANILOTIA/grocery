@extends('User.layout.main')
@section('MainSection')

        <div class="modal fade" id="product-view">
            <div class="modal-dialog"> 
                <div class="modal-content">
                    <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                    <div class="product-view">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="view-gallery">
                                    <div class="view-label-group">
                                        <label class="view-label new">new</label>
                                        <label class="view-label off">-10%</label>
                                    </div>
                                    <ul class="preview-slider slider-arrow"> 
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                    </ul>
                                    <ul class="thumb-slider">
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="view-details">
                                    <h3 class="view-name">
                                        <a href='product-video.html'>existing product name</a>
                                    </h3>
                                    <div class="view-meta">
                                        <p>SKU:<span>1234567</span></p>
                                        <p>BRAND:<a href="#">radhuni</a></p>
                                    </div>
                                    <div class="view-rating">
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <a href='product-video.html'>(3 reviews)</a>
                                    </div>
                                    <h3 class="view-price">
                                        <del>$38.00</del>
                                        <span>$24.00<small>/per kilo</small></span>
                                    </h3>
                                    <p class="view-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit non tempora magni repudiandae sint suscipit tempore quis maxime explicabo veniam eos reprehenderit fuga</p>
                                    <div class="view-list-group">
                                        <label class="view-list-title">tags:</label>
                                        <ul class="view-tag-list">
                                            <li><a href="#">organic</a></li>
                                            <li><a href="#">vegetable</a></li>
                                            <li><a href="#">chilis</a></li>
                                        </ul>
                                    </div>
                                    <div class="view-list-group">
                                        <label class="view-list-title">Share:</label>
                                        <ul class="view-share-list">
                                            <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                                            <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                        </ul>
                                    </div>
                                    <div class="view-add-group">
                                        <button class="product-add" title="Add to Cart">
                                            <i class="fas fa-shopping-basket"></i>
                                            <span>add to cart</span>
                                        </button>
                                        <div class="product-action">
                                            <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                            <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                            <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="view-action-group">
                                        <a class="view-wish wish" href="#" title="Add Your Wishlist">
                                            <i class="icofont-heart"></i>
                                            <span>add to wish</span>
                                        </a>
                                        <a class='view-compare' href='compare.html' title='Compare This Item'>
                                            <i class="fas fa-random"></i>
                                            <span>Compare This</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
        <!--=====================================
                    PRODUCT VIEW END
        =======================================-->


        <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url('User/images/single-banner.jpg'); no-repeat center;">
            <div class="container">
                <h2>Shop 5 Column</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">shop-5column</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                    SHOP PART START
        =======================================-->
        <section class="inner-section shop-part">
            <div class="container">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
                   
                        @foreach ($data as $product )
                        <div class="col-md-3">
                        <div class="product-card" >
                            <div class="product-media">
                                <div class="product-label">
                                    <label class="label-text new">new</label>
                                </div>
                                <button class="product-wish wish">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <a class='product-image' href="{{url('SingleProduct',['id' =>$product->id])}}">
                                    <img src="{{$product->image}}"  alt="product" style=" width: 100%; height: 140px;">
                                </a>
                                <div class="product-widget">
                                    <a class='fas fa-random' href='compare.html' title='Product Compare'></a>
                                    <a title="Product Video" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                    <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="product-name">
                                    {{$product->name}}
                                </h6>
                                <div class="product-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->rating)
                                            <i class="active icofont-star"></i>
                                        @else
                                            <i class="icofont-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                
                                <h6 class="product-price">
                                    <del>₹{{$product->sailing}}</del>
                                    <span>₹{{$product->discount}}<small>/piece</small></span>
                                </h6>
                                    <button class="btn btn-sm btn-success" title="Add to Cart" onclick="addtocart({{ $product->id }})">
                                        <i class="fas fa-shopping-basket">Add to cart</i>
                                    </button>
                                      
                                <div class="product-action">
                                    <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                    <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                    <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--=====================================
                    SHOP PART END
        =======================================-->
        

        <!--=====================================
                    NEWSLETTER PART START
        =======================================-->
        <section class="news-part" style="background: url(images/newsletter.jpg) no-repeat center;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 col-lg-6 col-xl-7">
                        <div class="news-text">
                            <h2>Get 20% Discount for Subscriber</h2>
                            <p>Lorem ipsum dolor consectetur adipisicing accusantium</p>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <form class="news-form">
                            <input type="text" placeholder="Enter Your Email Address">
                            <button><span><i class="icofont-ui-email"></i>Subscribe</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    NEWSLETTER PART END
        =======================================-->


        <!--=====================================
                    INTRO PART START
        =======================================-->
        <section class="intro-part">
            <div class="container">
                <div class="row intro-content">
                    <div class="col-sm-6 col-lg-3">
                        <div class="intro-wrap">
                            <div class="intro-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="intro-content">
                                <h5>free home delivery</h5>
                                <p>Lorem ipsum dolor sit amet adipisicing elit nobis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="intro-wrap">
                            <div class="intro-icon">
                                <i class="fas fa-sync-alt"></i>
                            </div>
                            <div class="intro-content">
                                <h5>instant return policy</h5>
                                <p>Lorem ipsum dolor sit amet adipisicing elit nobis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="intro-wrap">
                            <div class="intro-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="intro-content">
                                <h5>quick support system</h5>
                                <p>Lorem ipsum dolor sit amet adipisicing elit nobis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="intro-wrap">
                            <div class="intro-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="intro-content">
                                <h5>secure payment way</h5>
                                <p>Lorem ipsum dolor sit amet adipisicing elit nobis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
        @endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastify JS CDN -->
    

    <script>
        function addtocart(productId) {
            // Create an AJAX request using jQuery
            $.ajax({
                url: "{{route('User.AddToCart')}}", 
                // url: 'AddToCart', 
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                    product_id: productId
                },
                success: function(result) {
                    // Handle the response from the server (e.g., update the UI or display a message)
                    if (result.status_code == 1) {
                        Toastify({
                            text: result.massage,
                            duration: 3000,
                            gravity: "top",   
                            position: "right",
                            backgroundColor: "#28a745",  
                        }).showToast();
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);

                    }
                       
                    else if (result.status_code == 2) {
                        Toastify({
                            text: result.massage,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#ffc107",
                        }).showToast();
                    }
                },
                
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    Toastify({
                        text: 'An error occurred. Please try again.',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#dc3545",
                    }).showToast();
                }
            });
        }
    </script>


@endsection
        