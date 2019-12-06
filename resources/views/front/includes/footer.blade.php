<div class="container-fluid mt-5">
    <div class="row bg-success">

        <div class="col-lg-10 col-md-10 offset-md-1 offset-lg-1" >
            <div class="row">
                <div class="col-lg-7 col-md-8 p-1 col-sm-9 offset-lg-1">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 " type="text" placeholder="NewsLater">
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Subscribe</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 mt-lg-2 mt-md-3 col-sm-3 mt-sm-3">
                    <div class="d-inline-block">
                        <a href="https://www.facebook.com/halalghor" target="_blank"><i class="fab fa-facebook-f" style="color: white;font-size: 24px;"></i></a>
                    </div>
                    <div class="d-inline-block ml-2">
                        <a href="https://www.youtube.com/channel/UCtnniAx6ZnH-FPSvR3H3FlA" target="_blank"><i class="fab fa-youtube" style="color: white;font-size: 24px;"></i></a>
                    </div>
                    <div class="d-inline-block ml-2">
                        <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter" style="color: white;font-size: 24px;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Second Footer--}}

<div class="container-fluid mt-3 ">
    <div class="row ">
        <div class="offset-md-1"></div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 pl-sm-5">
                <table>
                    <tr>
                        <th>INFORMATION</th>
                    </tr>
                    <tr>
                        <td><a href="{{route('about-us')}}" class="nav-link">About Us</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('contact-us')}}" class="nav-link">Contact Us</a></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 pl-sm-5">
                <table>
                    <tr>
                        <th>CUSTOMER SERVICE</th>
                    </tr>
                    <tr>
                        <td><a href="{{route('security-policy')}}" class="nav-link">Security Policy</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('shipping-and-replace')}}" class="nav-link">Shipping & Replacement</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('privacy-policy')}}" class="nav-link">Privacy Policy</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('terms-of-use')}}" class="nav-link">Terms Of Use</a></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 pl-sm-5 offset-lg-1">
                <table class="footer-contact justify-content-end">
                    <tr>
                        <th>CONTACT US</th>
                    </tr>
                    <tr>
                        <td><i class="fa fa-map-marker-alt"></i> 98/2 Senpara porbota,Mirpur 10,Dhaka 12016</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-envelope"></i> halalghor@gmail.com</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-mobile"></i> +880 1947325581, +880 1750521719</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row bg-success" style="height: auto;color: white">
        <div class="col-md-6 col-12">
            <p class="text-center mt-2">©{{ date("Y") }} All Right Reserved By {{ config("app.name") }}</p>
        </div>
        <div class="col-md-6 col-12">
            <p class="text-center mt-2">Developed By <a href="{{ route("developer_info") }}" target="_blank" style="color: black">Team</a></p>
        </div>
    </div>
</div>
