<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard</h3>
    </div>
    <div class="box-body">
        <p>Sitenizi sol menüden yönetebilirsiniz...</p>
        <?php
            echo "<pre>";
            print_r($_SESSION);  
            echo "<hr>";
            echo "<pre>";
            print_r($_COOKIE);      
        ?>
    </div>
</div>