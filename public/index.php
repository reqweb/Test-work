<?php

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

require_once( "../classes/DataBase.php" );

?>

<!DOCTYPE html>
<html lang="ru">
</head>
    <meta charset="utf-8">
    <title>Test work</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="image/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/jquery.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
    
<body>
        
    <header>
        <nav class="navbar mw">
            <a href="/" class="header_logo">Test work</a>
            <a></a>
        </nav>
    </header>

    <main class="mw">
    
        <form id="form" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" id="name" placeholder="Имя" required>
            <input type="text" name="email"  id="form-mail" placeholder="E-mail" required>
            <textarea name="review" id="review" placeholder="Текст отзыва" required></textarea>
            <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
            <input type="file" name="file" accept="image/jpeg,image/png,image/gif">
            <input type="submit" class="submit" value="Отправить" name='submit'>
        </form>
    
        <div class="reviews">
        
        <?
        $SelectItems = new DataBase(); 
        $items = $SelectItems->SelectAll('reviews');
        foreach ($items as $item) {
         ?>

            <div class="reviews_item">
                <?if(!empty($item["image"])){?>
                    <img src='../uploads/<?=$item["image"]?>'>
                <?}else{?>
                    <div class="no-img">?</div>
                <?}?>
                <p>
                  <?=$item["review"]?>
                </p>
                <h6><?=$item["name"]?> - <?=$item["publictime"]?></h6>
            </div>
            
        <? } ?>
        
        </div>
        
    </main>

    <footer>
        <div class="mw">
            Test work 2020
        </div>
    </footer>
    
    <div class="form_answer"></div>
    
    <script src="public/js/site.js"></script>

</body>
</html>
