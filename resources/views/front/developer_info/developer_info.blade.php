<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

    <div class="container">
        <section class="container mt-4 mb-4">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex flex-row border rounded">
                            <div class="p-0 w-30">
                                <img src="{{ asset("/") }}front/images/developer/_DSC5156.JPG" class="img-fluid" style="height:200px"/>

                            </div>
                            <div class="pl-3 pt-2 pr-2 pb-2 w-70 border-left">
                                <h4 class="text-primary">Al Amin Rahul</h4>
                                <h5 class="text-info">Full stack Web Developer</h5>
                                <ul class="m-0 float-left" style="list-style: none; margin:0; padding: 0">
                                    <li><i class="fab fa-facebook-square"></i><a href="https://www.facebook.com/alamin.rahul.545" target="_blank">Facebook</a></li>
                                    <li><i class="fab fa-twitter-square"></i> 01645733349 </li>
                                    <li><i class="fab fa-twitter-square"></i> 01772529099 </li>
                                </ul>
{{--                                <p class="text-right m-0"><a href="#" class="btn btn-primary"><i class="far fa-user"></i> View Profile</a></p>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-row border rounded">
                            <div class="p-0 w-30">
                                <img src="{{ asset("/") }}front/images/developer/IMG_20180116_194339.jpg" class="img-fluid" style="height:200px"/>
                            </div>
                            <div class="pl-3 pt-2 pr-2 pb-2 w-70 border-left">
                                <h4 class="text-primary">K.M. Mahbubul</h4>
                                <h5 class="text-info">Full stack Web Developer</h5>
                                <ul class="m-0 float-left" style="list-style: none; margin:0; padding: 0">
                                    <li><i class="fab fa-facebook-square"></i> <a href="https://www.facebook.com/mahbubul161" target="_blank">Facebook</a></li>
                                    <li><i class="fab fa-twitter-square"></i> 01620600428 </li>
                                    <li><i class="fab fa-twitter-square"></i> 01779724298 </li>
                                </ul>
                                {{--                                <p class="text-right m-0"><a href="#" class="btn btn-primary"><i class="far fa-user"></i> View Profile</a></p>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
