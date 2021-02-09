<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Fix My Pothole</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <nav class="red darken-4" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo left">Fix My Pothole</a>
            <ul class="right">
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="section">
            <div>
                <h3 class="header center">Report a Pothole</h3>
            </div>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">phone</i>
                            <input id="icon_telephone" type="tel" class="validate">
                            <label for="icon_telephone">Telephone</label>
                        </div>
                        <div class="file-field input-field col s12 m6">
                            <div class="btn pothole-image-btn">
                                <span>Images</span>
                                <input type="file" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <textarea id="street_address" class="materialize-textarea" data-length="100"></textarea>
                            <label for="street_address">Street Address</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">location_city</i>
                            <input id="city" type="text" class="validate">
                            <label for="city">City</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">my_location</i>
                            <input id="state" type="text" class="validate">
                            <label for="state">State</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">location_on</i>
                            <input id="zip_code" type="tel" class="validate">
                            <label for="zip_code">Zip Code</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <textarea id="description2" class="materialize-textarea" data-length="256"></textarea>
                            <label for="description2">Description</label>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <button class="btn waves-effect waves-light submit-btn left" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                        <a class="waves-effect waves-teal btn-flat left">Clear</a> -->
                        <button class="btn waves-effect waves-light submit-btn right" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
        <br><br>
    </div>

    <footer class="page-footer red darken-4">
        <div class="container">
            <div class="row">
                <div class="col l8 s12">
                    <h5 class="white-text">About</h5>
                    <p class="grey-text text-lighten-4">This is a Web database application that will allow citizens to
                        report potholes within their local community so that they can be fixed. The application
                        allows users to submit information about the pothole including their name, phone number and/or
                        email, the location of the pothole, and a description to provide additional
                        information about the location and/or pothole. The user can also report the pothole anonymously.
                    </p>


                </div>
                <div class="col l4 s12">
                    <h5 class="white-text">Team Members</h5>
                    <ul>
                        <li><a class="orange-text text-lighten-3" target="_blank"
                                href="https://www.linkedin.com/in/miguel-angel-llamas-estrada">Miguel Angel Llamas
                                Estrada</a></li>
                        <li><a class="orange-text text-lighten-3" target="_blank" href="#!">Shruti</a></li>
                        <li><a class="orange-text text-lighten-3" target="_blank"
                                href="https://www.linkedin.com/in/garric/">Garric Mathias</a></li>
                    </ul>
                </div>
                <!-- <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Lab Assignment - NEWM-N-510 <a class="orange-text text-lighten-3"
                    href="https://github.com/garricm/NEWM-N510-Lab-1">Source Code</a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>