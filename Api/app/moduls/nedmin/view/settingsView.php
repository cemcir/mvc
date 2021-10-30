<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ayarlar</h3>
    </div>
    <div class="box-body">
        <table class="table table-striped">
            <thead
                <tr>
                    <th>Açıklama</th>
                    <th>İçerik</th>
                    <th>Anahtar Değer</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if(isset($data['message'])) {
                    echo $data['message'];
                } 
            ?>
            <?php if($data['status']) :?>
                <?php foreach($data['result'] as $adminSettings) :?>
                    <tr>
                        <td><?php echo $adminSettings['settings_description']; ?></td>
                        <td>
                        <?php 
                            if($adminSettings['settings_type']=="file") {?>
                                <img src="/images/settings/<?php echo $adminSettings['settings_value']; ?>">
                            <?php } 
                            else {
                                echo $adminSettings['settings_value'];    
                            } ?>
                        </td>
                        <td><?php echo $adminSettings['settings_key']?></td>
                        <td><a href="/nedmin/settings/update/<?php echo $adminSettings['settings_id']; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                    </tr>
                <?php endforeach;?>
            <?php endif; ?>    
            </tbody>
        </table>
    </div>
</div>