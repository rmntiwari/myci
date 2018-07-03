<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 12/20/2016
 * Time: 3:26 PM
 */
 
?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo asset_url(); ?>css/materialize.min.css"  media="screen,projection"/>
    <!--<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.material.min.css"  />
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"  />-->
    <link type="text/css" rel="stylesheet" href="<?php echo dtable_url();?>/css/jquery.dataTables.min.css"  />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- <link type="text/css" rel="stylesheet" href="<?php /*echo dtable_url(); */?>/css/dataTables.material.min.css"  />-->


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<nav class="nav-extended">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="<?php echo site_url('emp_controller/'); ?>">Employee</a></li>
            <li><a href="#badges.html">User</a></li>
            <li><a href="#collapsible.html">Student</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="<?php echo site_url('emp_controller/'); ?>">Employee</a></li>
            <li><a href="#badges.html">User</a></li>
            <li><a href="#collapsible.html">Student</a></li>
        </ul>

        <ul class="tabs tabs-transparent">
            <li class="tab"><a class="active" href="#test1">Employee List</a></li>
            <li class="tab"><a  href="#test2">Add Employee</a></li>
            <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
            <li class="tab"><a href="#test4">Test 4</a></li>
        </ul>
    </div>
</nav>
<!--------------------------------- code for view tab ---------------->
<div id="test1" class="col s12">Test 1
    <div class="container">
    <table id="example" class="mdl-data-table" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Job title</th>
            <th>Email</th>
            
            <th>Action</th>

        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Phone</th>
            <th>Email</th>

            <th>Action</th>
        </tr>
        </tfoot>
        <tbody>
        <?php  //var_dump($records); //
        foreach($records as $r){ ?>
            <tr id="<?php echo $r->employeeNumber; ?>">
                <td><?php echo $r->firstName; ?></td>
                <td><?php echo $r->lastName; ?></td>
                <td><?php echo $r->jobTitle; ?></td>
                <td><?php echo $r->email; ?></td>

                <!--<td><a href="?did=<?php /*echo $r->empid; */?>" >Delete</a></td> ------------True-->
               <!-- <td><a href="javascript:void(0)" onclick="delemp(<?php /*echo $r->empid; */?>)" >Delete</a></td>-->
                <!-- <td><a href="javascript:void(0)" onclick="window.location='<?php /*echo site_url("emp_controller/delemployee?id=$r->empid");*/?>'" >Delete</a></td>-->
                <td>
                    <!-- updating record -->

                    <a class="waves-effect waves-light btn" href="" onclick="getuserbyid(<?php echo $r->employeeNumber; ?>);">Edit</a>
                    <div id="edit<?php echo $r->employeeNumber; ?>" class="modal">
                        <div class="modal-content">
                            <h4>Edit Record</h4>
                            <form class="col s12" method="post" action="<?php echo site_url('emp_controller/update_employee?id='. $r->employeeNumber); ?>">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Placeholder" id="first_name<?php echo $r->employeeNumber; ?>" name ="first_name" type="text" class="validate" value="">
                                        <label for="first_name">First Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="Placeholder" id="last_name<?php echo $r->employeeNumber; ?>" name="last_name" type="text" class="validate">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input  placeholder="Placeholder" id="phone<?php echo $r->employeeNumber; ?>"  name="phone" type="text" class="validate">
                                        <label for="password">Phone</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input placeholder="Placeholder" id="email<?php echo $r->employeeNumber; ?>" name="email" type="email"   autocomplete="off"  class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input placeholder="Placeholder" id="pass<?php echo $r->employeeNumber; ?>" name="pass" type="password"  autocomplete="off"  class="validate" required>
                                        <label for="pass">Password</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12">

                                        <button class="btn waves-effect waves-light" type="submit" name="submit" value="submit">Save
                                            <i class="material-icons right">send</i>
                                        </button>
                                        <button onclick="closemodel('edit<?php echo $r->employeeNumber; ?>')" class="btn waves-effect waves-light" type="button" name="cancle" value="submit">Cancle
                                        </button>

                                    </div>
                                </div>

                            </form>


                        </div>
                        <div class="modal-footer">
                            <!--<a href="<?php /*echo site_url("emp_controller/");*/?>" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancle</a>
                            <a href="<?php /*echo site_url("emp_controller/update_employee?id=$r->empid");*/?>" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>-->

                        </div>
                    </div>
                    <!-- updating record end-->

                    <!-- Modal Trigger Delete record-->
                    <a class="waves-effect waves-light btn" href="#delete<?php echo $r->employeeNumber; ?>">Delete</a>
                    <div id="delete<?php echo $r->employeeNumber; ?>" class="modal">
                        <div class="modal-content">
                            <h4>Modal Header</h4>
                            <p>Do you really want to delete this record??</p>
                        </div>
                        <div class="modal-footer">
                            <a  onclick="closemodel('delete<?php echo $r->employeeNumber; ?>')" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancle</a>
                            <a href="<?php echo site_url("emp_controller/delemployee?id=$r->employeeNumber");?>" class=" modal-action modal-close waves-effect waves-green btn-flat">Delete</a>

                        </div>
                    </div>
                    <!--Delete record end-->


                </td>
            </tr>
         <?php  } ?>
        </tbody>
    </table>
    </div>

</div>
<!--------------------------------- code for view tab end ---------------->

<!--------------------------------- code for add emp tab ---------------->
<div id="test2" class="col s12"><div class="container">
        <div class="row">
            <form class="col s12" method="post" action="<?php echo site_url('emp_controller/addemployee'); ?>">
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" name ="first_name" type="text" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" name="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                        <label for="disabled">Disabled</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="phone" name="phone" type="text" class="validate">
                        <label for="password">Phone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="pass" name="pass" type="password" class="validate" required>
                        <label for="pass">Password</label>
                    </div>
                </div>
                 
                <div class="row">
                    <div class="col s12">

                        <button class="btn waves-effect waves-light" type="submit" name="submit" value="submit">Submit
                            <i class="material-icons right">send</i>
                        </button>

                    </div>
                </div>

            </form>
        </div>
    </div></div>
<!--------------------------------- code for add tab end ---------------->
<div id="test3" class="col s12">Test 3</div>
<div id="test4" class="col s12">Test 4</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery.js"></script>
<!--<script type="text/javascript" src="<?php /*echo asset_url(); */?>js/jquery.dataTables.min.js"></script>-->
<script type="text/javascript" src="<?php echo asset_url(); ?>js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>js/dataTables.material.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>js/employee.js"></script>
<!--<script type="text/javascript" src="<?php /*echo asset_url(); */?>/js/employee.js"></script>-->
<script type="text/javascript" src="<?php echo dtable_url();?>/js/jquery.dataTables.min.js"></script>
</body>
</html>

<script>
  
</script>






