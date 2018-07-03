<table class="table table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Feature Name</th>
            <th>Feature Values</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($index = 0; $index < count($feature); $index++):?>
        <tr>
            <td><input type="checkbox" value="<?=$feature[$index]->feature_id?>" name="feature[]"/></td>
            <td><?=$feature[$index]->feature_name?></td>
            <td><?=$feature[$index]->feature_values?></td>
        </tr>
        <?php endfor;?>
    </tbody>
</table>
<script>
    $(document).ready(function(){
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square',
        increaseArea: '20%' // optional
      });
    });
</script>