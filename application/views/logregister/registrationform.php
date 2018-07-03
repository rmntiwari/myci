<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 1/4/2017
 * Time: 2:20 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 1/4/2017
 * Time: 11:06 AM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo asset_url(); ?>css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body>
<div id="logintab" col s12>
    <div class="container">
        <div id="login-page" class="row">
            <div class="col s12  card-panel">
                <form id="login-form" action="<?php echo site_url('/logregister_controller/registeruser'); ?>" method="post" >

                    <div class="row">
                        <div class="input-field col s12 center ">
                            <!-- <img src="http://w3lessons.info/logo.png" alt="Image not available" class="responsive-img">-->
                            <i class="large material-icons " style="color: #00C853;">perm_identity</i>
                            <p class="center" style="font-weight:bold;">Registratin form</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 ">
                            <!--<i class="mdi-social-person-outline prefix">email</i>-->
                            <i class="small material-icons prefix ">email</i>
                            <input class="validate" id="email" type="email" name="email">
                            <label for="email" data-error="wrong" data-success="right" class=" ">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 ">
                            <i class="small material-icons prefix">vpn_key</i>
                            <input type="password" id="password" name="password" placeholder="">
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 center">
                            <button class="btn waves-effect waves-light" type="submit" name="submit">Register
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                    <div class="row center">
                        <div class="input-field col s12 center">
                            <div>Already have an account?<a href="<?php echo base_url().'index.php/logregister_controller/'; ?>">Login</a></div>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </div>
</div>


</body>

<!--src="<?php /*echo asset_url(); */?>js/jquery.js"></script>-->
<script type="text/javascript" src="<?php echo asset_url().'js/jquery.js';?>"> </script>
<script type="text/javascript" src="<?php echo asset_url().'js/materialize.min.js';?>"> </script>
<!--<script type="text/javascript" src="<?php /*echo asset_url().'js/employee.js';*/?>"> </script>-->


</html>
<style>

    #login-page{ width:50%;  margin:auto; margin-top:10%;}
    .tabs .tab a {
        color: #000 !important;
    }

    .tabs .tab a:hover, .tabs .tab a.active {
        background-color: transparent;
        color: #ee6e73 !important;
    }

</style>

