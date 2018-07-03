<html>
    <head>		
        <title>Codelgniter form validation date</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body> 
        <div class="main">
            <div id="content">
                <h3 id='form_head'>Codelgniter form validation date</h3><br/>
                <hr>
                <div id="form_input">
                <?php
                
                // Open form and set url for submit form
                echo form_open('date_controller/submit');
                
                // Show Name Field in View Page
                echo form_label('Name :');
                $data = array(
                    'id' => 'name_id', 
                    'name' => 'u_name',
                    'placeholder' => 'Please Enter User Name',
                    'class' => 'input_box',
                    'required' => ''
                );
                echo form_input($data);
                echo "<br/><br/>";
                
                    // Show Date Field in View Page
                echo form_label('DOB:');
                $date = array(
                    'type' => 'text',
                    'id' => 'validate_dd_id', 
                    'name' => 'date',
                   'class' => 'input_box',
                    'placeholder' => 'dd/mm/yyyy',
                    'required' => ''
                );
              echo form_input($date);
                ?>
                    </div>

                    <div id="form_button">
                        <?php
                        
                         // Show Update Field in View Page
                        $data = array(
                            'type' => 'submit',
                            'value'=> 'Submit',
                            'class'=> 'submit'
                        );
                        echo form_submit($data); ?>
                    </div>     
               <?php echo form_close();?>
              
            </div> 
        </div>
    </body>
</html>


