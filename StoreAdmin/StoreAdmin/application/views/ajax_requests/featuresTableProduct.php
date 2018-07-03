<?php
    $featurelist = explode(",",$productcategory[0]->feature_id);
    $count_options = 0;
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Option</th>
            <th>Values</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($index = 0; $index < count($feature); $index++):
            if(in_array($feature[$index]->feature_id, $featurelist)){
                $count_options++;
        ?>
        <tr>
            <td><?=$feature[$index]->feature_name?><input type="hidden" name="options_names[]" value="<?=$feature[$index]->feature_name?>"/></td>
            <td>
                <select name="options_values<?=$count_options?>[]" class="form-control" multiple="">
                    <?php 
                    $option_list = explode(",", $feature[$index]->feature_values);
                    foreach ($option_list as $value) {?>
                    <option value="<?=$value?>"><?=$value?></option>            
                    <?php }?>
                </select>
            </td>
        </tr>
        <?php }
        endfor;?>
    </tbody>
</table>
<input type="hidden" name="options_counting" value="<?=$count_options?>"/>
<script>
    $(document).ready(function(){
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square',
        increaseArea: '20%' // optional
      });
    });
</script>