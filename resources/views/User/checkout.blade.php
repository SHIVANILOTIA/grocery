

@extends('User.layout.main')
@section('MainSection')

        <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url('User/images/single-banner.jpg') no-repeat center;">
            <div class="container">
                <h2>checkout</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                    <li class="breadcrumb-item"><a href='shop-4column.html'>shop grid</a></li>
                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                    CHECKOUT PART START
        =======================================-->
        <section class="inner-section checkout-part">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>Your order</h4>
                            </div>
                            <div class="account-content">
                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">Serial</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">brand</th>
                                                <th scope="col">quantity</th>
                                                <th scope="col">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $user_cart as $list)
                                            @php
                                            // Calculate the total price for each item
                                            $itemTotalPrice = $list->sailing * $list->quantity;
                                            $totalprice += $itemTotalPrice; // Add the item price to the total cart price
                                        @endphp
                                        
                                            <tr>
                                                <td class="table-serial"><h6>{{ $list->id}}</h6></td>
                                                <td class="table-image"><img src="{{ $list->image}}" alt="product"></td>
                                                <td class="table-name"><h6>{{ $list->name }}</h6></td>
                                                <td class="table-price">₹{{$list->sailing}}<h6><small>/kilo</small></h6></td>
                                                <td class="table-brand"><h6>Fresh Company</h6></td>
                                                <td class="table-quantity"><h6>{{$list->quantity}}</h6></td>
                                                <td class="table-action">
                                                    <a class="view" href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#product-view"><i class="fas fa-eye"></i></a>
                                                    <a class="trash" href="#" title="Remove Wishlist"><i class="icofont-trash"></i></a>
                                                </td>
                                                @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="chekout-coupon">
                                    <button class="coupon-btn">Do you have a coupon code?</button>
                                    <form class="coupon-form">
                                        <input type="text" placeholder="Enter your coupon code">
                                        <button type="submit"><span>apply</span></button>
                                    </form>
                                </div>
                                <div class="checkout-charge">
                                    <ul>
                                        <li>
                                            <span>Sub total</span>
                                            <span>₹{{$totalprice}}</span>
                                        </li>
                                        <li>
                                            <span>delivery fee</span>
                                            <span>₹00.00</span>
                                        </li>
                                        <li>
                                            <span>discount</span>
                                            <span>₹00.00</span>
                                        </li>
                                        <li>
                                            <span>Total<small>(Incl. VAT)</small></span>
                                            <span>₹{{$totalprice}}.00</span>
                                        </li>
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>Delivery Schedule</h4>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card schedule active">
                                            <h6>express</h6>
                                            <p>90 min express delivery</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card schedule">
                                            <h6>8am-10pm</h6>
                                            <p>8.00 AM - 10.00 PM</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card schedule">
                                            <h6>Next day</h6>
                                            <p>Next day or Tomorrow</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>contact number</h4>
                                <button data-bs-toggle="modal" data-bs-target="#contact-add">add contact</button>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 alert fade show">
                                        <div class="profile-card contact active">
                                            <h6>primary</h6>
                                            <p>{{$user_data->mobile}}</p>
                                            <ul>
                                                <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 alert fade show">
                                        <div class="profile-card contact">
                                            <h6>secondary</h6>
                                            <p>{{$user_data->mobile_second ? $user_data->mobile_second: 'Not Available'}}</p>
                                            <ul>
                                                <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit-secondary"></button></li>
                                                <li><button class="trash icofont-ui-delete"  data-bs-dismiss="alert" {{url('delete_secondary')}}></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>delivery address</h4>
                                <button data-bs-toggle="modal" data-bs-target="#address-add">add address</button>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card address active">
                                            <h6>Home</h6>
                                            <p>jalkuri, fatullah, narayanganj-1420. word no-09, road no-17/A</p>
                                            <ul class="user-action">
                                                <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#address-edit"></button></li>
                                                <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card address">
                                            <h6>Office</h6>
                                            <p>east tejturi bazar, dhaka-1200. word no-04, road no-13/c, house no-4/b</p>
                                            <ul class="user-action">
                                                <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#address-edit"></button></li>
                                                <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card address">
                                            <h6>Bussiness</h6>
                                            <p>kawran bazar, dhaka-1100. word no-02, road no-13/d, house no-7/m</p>
                                            <ul class="user-action">
                                                <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#address-edit"></button></li>
                                                <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="account-card mb-0">
                            <div class="account-title">
                                <h4>payment option</h4>
                                <button data-bs-toggle="modal" data-bs-target="#payment-add">add card</button>
                            </div>
                          
                            <div class="checkout-check">
                                <input type="checkbox" id="checkout-check">
                                <label for="checkout-check">By making this purchase you agree to our <a href="#">Terms and Conditions</a>.</label>
                            </div>
                            <div class="checkout-proced">
                                <a class='btn btn-inline' href='invoice.html'>proced to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    CHECKOUT PART END
        =======================================-->


        <!--=====================================
                    MODAL ADD FORM START
        =======================================-->
        <!-- contact add form -->
        <div class="modal fade" id="contact-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title">
                            <h3>add new contact</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option selected>choose title</option>
                                <option value="primary">primary</option>
                                <option value="secondary">secondary</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">number</label>
                            <input class="form-control" type="text" placeholder="Enter your number">
                        </div>
                        <button class="form-btn" type="submit">save contact info</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- address add form -->
        <div class="modal fade" id="address-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title">
                            <h3>add new address</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option selected>choose title</option>
                                <option value="home">home</option>
                                <option value="office">office</option>
                                <option value="Bussiness">Bussiness</option>
                                <option value="academy">academy</option>
                                <option value="others">others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">address</label>
                            <textarea class="form-control" placeholder="Enter your address"></textarea>
                        </div>
                        <button class="form-btn" type="submit">save address info</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- payment add form -->
        <div class="modal fade" id="payment-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title">
                            <h3>add new payment</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">card number</label>
                            <input class="form-control" type="text" placeholder="Enter your card number">
                        </div>
                        <button class="form-btn" type="submit">save card info</button>
                    </form>
                </div> 
            </div> 
        </div>
        <!--=====================================
                    MODAL ADD FORM END
        =======================================-->

        
        <!--=====================================
                    MODAL EDIT FORM START
        =======================================-->
        <!-- contact edit form -->
        <div class="modal fade" id="contact-edit">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" action="{{url('Primary_mobile_update')}}" method="POST">
                        @csrf
                        <div class="form-title">
                            <h3>edit primary contact info</h3>
                        </div>
                      
                        <div class="form-group">
                            <label class="form-label">number</label>
                            <input class="form-control" type="text" name='primary' value="{{$user_data->mobile}}">
                        </div>
                        <button class="form-btn" type="submit">save contact info</button>
                    </form>
                </div> 
            </div> 
        </div>

        <div class="modal fade" id="contact-edit-secondary">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" action="{{url('Secondary_mobile_update')}}" method="POST">
                        @csrf
                        <div class="form-title">
                            <h3>edit secondary contact info</h3>
                        </div>
                       
                        <div class="form-group">
                            <label class="form-label">number</label>
                            <input class="form-control" type="text" name='secondary' value="{{$user_data->mobile_second ? $user_data->mobile_second: 'Not Available'}}">
                        </div>
                        <button class="form-btn" type="submit">save contact info</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- address edit form -->
        <div class="modal fade" id="address-edit">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title">
                            <h3>edit address info</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option value="home" selected>home</option>
                                <option value="office">office</option>
                                <option value="Bussiness">Bussiness</option>
                                <option value="academy">academy</option>
                                <option value="others">others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">address</label>
                            <textarea class="form-control" placeholder="jalkuri, fatullah, narayanganj-1420. word no-09, road no-17/A"></textarea>
                        </div>
                        <button class="form-btn" type="submit">save address info</button>
                    </form>
                </div> 
            </div> 
        </div>
        <!--=====================================
                    MODAL EDIT FORM END
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
        <!--=====================================
                    INTRO PART END
        =======================================-->


       





        @endsection



