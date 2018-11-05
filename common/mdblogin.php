    <?php
/**
 * Created by PhpStorm.
 * User: horra
 * Date: 12/2/2017
 * Time: 6:30 PM
 */

?>

<!--Main Navigation-->
    <!--Modal: new Password Form-->
    <div class="card modal fade" id="newpasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >
        <div class="modal-dialog cascading-modal   col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header orange-gradient darken-3  ">
                    <h4 class="title"><i class="fa fa-user-plus"></i> Create Secure Password</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <form action="" role="form" id="newPassForm" name="newPassForm" novalidate>
                        <div id="gendererror"></div>
                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="form31" name="pass1" class="form-control">
                            <label for="form31" class="active">Your current password</label>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" name="pass2" id="form32" class="form-control">
                            <label for="form32" class="active">New password</label>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" name="pass3" id="form33" class="form-control">
                            <label for="form33" class="active">Repeat New password</label>
                        </div>
                        <div class="text-center mt-2">
                            <button type="submit"  id="validate" class="btn peach-gradient btn-rounded">Validate<i class="fa fa-sign-in ml-1"></i></button>

                            <a class="btn blue-gradient btn-rounded"><i class="fa fa-bolt"></i></a>
                        </div>
                    </form>

                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <div id="response" class="options text-center text-md-right mt-1">
                        <p>Enter a new PWD</p>
                    </div>

                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Register Form-->


    <!-- Central Modal Medium Info -->
    <div class="modal fade" id="passwordModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Password requirements</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-refresh fa-4x mb-3 animated rotateIn"></i>
                        <br>
                        <p>To increase security we now require that all passowrds are at least <strong>8 characters long.</strong></p>
                        <hr>
                        <p>Passwords must contain letters &amp; numbers, at least one upper case letter, one lower case letter, and one symbol!</p>
                        <p><strong>Please do not use names or simple number comnbinations such as 12345! If you neglect secure password principles, your account will sooner or later be compromised! Therefore use strong passwords!</strong></p>If you have not yet changed your password please go to the profile link in the menu and change your password. Thank you!
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Close</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Info-->
    <!-- Central Modal Medium Info -->
    <div class="modal fade" id="securityModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Why the changes?</p>
                    <h4 class="h3-responsive"></h4>
                    <br>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-question-o fa-4x mb-3 animated rotateIn"></i>
                        <br>
                        <p>To maintain established site sfety standards we recently switched to secure servers with 256 bit encryption (same standard used for online banking). All transactions are now fully end to end encrypted and secure. The <strong>final step to tigthen up security</strong> and discourage brute forcing passwords, is the use of strong passwords.
                        <hr>
                        <p>Finally, we also monitor login attempts and multiple successive, failed login attempts will lockout your site's IP address permanently (This will poterntially lock out all your co-workers from using eSupport as well, until verified and manually reset). Therefore, if your login credentials do not work after a few attempts, please contact us imemdiately and do not retry exessively until your IP becomes blacklisted.<br>Thank you!</p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Close</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Info-->

    <!-- Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Password Guidelines</h5>

                    <div class="col-md-12">
                        <div class="row">
                            <h4 class="h3-responsive">Password requirements</h4>
                            <br>
                            <p>To increase security we now require that all passowrdsa are at least <strong>8 characters long.</strong></p>
                            <hr>
                            <p>Passwords must contain letters &amp; numbers, at least one upper case letter, one lower case letter, and one symbol!</p>
                            <p><strong>Please do not use names or simple number comnbinations such as 12345! Your account will sooner or later be compromised if you neglect secure password principles/strong></p>
                        </div>
                    </div>

                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="securityModal" tabindex="-1" role="dialog" aria-labelledby="securityModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="securityModalLabel">Enhanced site security</h5>

                    <div class="col-md-12">
                        <div class="row">
                            <h4 class="h3-responsive">Why the changes?</h4>
                            <br>

                            <p>To maintain established site sfety standards we recently switched to secure servers with 256 bit encryption (same standard used for online banking). All transactions are now fully end to end encrypted and secure. The <strong>final step to tigthen up security</strong> and discourage brute forcing passwords, is the use of strong passwords.
                            <hr>
                            <p>Finally, we also monitor login attempts and multiple successive, failed login attempts will lockout your site's IP address permanently (This will poterntially lock out all your co-workers from using eSupport as well, until verified and manually reset). Therefore, if your login credentials do not work after a few attempts, please contact us imemdiately and do not retry exessively until your IP becomes blacklisted.<br>Thank you!</p>
                        </div>
                    </div>
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>eSupport 2.0</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#securityModalInfo">Security information <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#passwordModalInfo">password guidelines</a>
                    </li>
             <!--       <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#newpasswordModal">Create secure password</a>
                    </li>
 -->
                </ul>
            </div>
        </div>
    </nav>

    <!--Intro Section-->
    <?php
  echo '<section class="view '.$intro_background.' hm-indigo-light">';
    ?>
        <div class="full-bg-img flex-center">
            <div class="container" id="pwdmodal">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                        <form method="post" role="form" id="newPassForm2" name="newPassForm2" >
                            <!--Form with header-->
                            <div class="card wow zoomInDown flipInX" id="passwordcard"  data-wow-delay="1.0s" data-wow-duration="2.0s">
                                <div class="card-body z-depth-4">

                                    <!--Header-->
                                    <div class="form-header peach-gradient-rgba">
                                        <h5><i class="fa fa-user mt-3 mb-3"></i> Casaria eSupport 2.0 login</h5>
                                    </div>

                                    <!--Body-->
                                    <div class="md-form">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <input type="text" id="form1" name="user" class="form-control white-text">
                                        <label for="form1">Your user name</label>
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-lock prefix white-text"></i>
                                        <input type="password" id="form2" name="password" class="form-control white-text">
                                        <label for="form2">Your password</label>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" id="submit" onkeypress="capsLock(event )" name="login" class="btn peach-gradient-rgba btn-lg">LOGIN</button>
                                        <hr>
                                        <div class="inline-ul text-center d-flex justify-content-center">
                                            <label for="submit"><?php echo $modalMessage;?></label>
                                        </div>
                                          <div id="divCaps" style="visibility:hidden">Caps Lock is on.</div>
                                    </div>

                                </div>
                            </div>
                            <!--/Form with header-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script Src="../mdb/js/mdb.js">

    </script>

