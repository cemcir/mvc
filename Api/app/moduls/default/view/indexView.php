<h1> indexView.php sayfası metin görünümünde çalıştı.</h1>
<hr/>
<img src="images/enes.jpg" alt="enes cemcir">
<hr/>
<button class="btn btn-success">Gönder</button>
<hr/>
<?php 
    //echo "<pre>";
    //print_r($data['blogs']);
    
    if(isset($data['result'])) {
        foreach($data['result'] as $blogs) {
            echo $blogs['blogs_title'].'<br/>';
        }
    }
    
?>