<main class="main-area">
    <h2>Добавить фотографию в портфолио</h2>
    <?

    if(isset($_POST['putPhoto'])) {
        $path = '../assets/images/';
        if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
            if($_FILES['image']['size']/1024/1024 < 5) {
    
                $name = md5($_FILES['image']['name']).'.png';
                if (!@copy($_FILES['image']['tmp_name'], $path.$name)){
                    echo 'Что-то пошло не так';
                } else {
                    
                    $date = date('d-m-Y H:i');
                    $putPhoto = $db->query("INSERT INTO `photo` (`src`, `likes`, `date`) VALUES ('".$name."', '0', '".$date."')");
                    if($putPhoto) {
                        echo 'Фото удачно загружено!';
                    } else {
                        echo "Ошибка загрузки фото в БД";
                    }
                }
    
            } else {
                echo "Big size";
            }
        } else {
            echo "Also png or jpg";
        }
    }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <label for="image">
            <span>Выберите фото</span>
            <input type="file" id="image" name="image">
        </label>

        <input type="submit" class="submit" name="putPhoto" value="Загрузить">
    </form>
    <br>
    
    <hr>
        
    <section class="gallery">
    <h2>Просмотр фотографий в портфолио</h2>
    <?
    $countPhoto = $db->query("SELECT count(*) FROM `photo`");
    
    foreach ($countPhoto as $row) { ?>
        <p>Всего фото: <?=$row[0];?> шт</p>
    <? } ?>
    <div class="card-list">
    <?
    
    $getPhoto = $db->query("SELECT * FROM `photo`");

    foreach ($getPhoto as $row) {
        ?>
        <div class="card-item">
            <span onclick="checkToClick(<?=$row['id']?>)" class="delete-btn">&plus;</span>
            <header>
                <img src="../assets/images/<?=$row['src']?>">
            </header>
            <footer>
                <div class="like">
                    <svg width="16" height="14" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path data-id="57" d="M29.4614 3.53613C27.8049 1.7395 25.532 0.75 23.0608 0.75C21.2136 0.75 19.522 1.33398 18.0327 2.4856C17.2812 3.06689 16.6003 3.77808 16 4.60815C15.3999 3.77832 14.7188 3.06689 13.967 2.4856C12.478 1.33398 10.7864 0.75 8.93921 0.75C6.46802 0.75 4.19482 1.7395 2.53833 3.53613C0.901611 5.31177 0 7.73755 0 10.3669C0 13.0732 1.00854 15.5505 3.17383 18.1633C5.11084 20.5005 7.89478 22.873 11.1187 25.6204C12.2195 26.5586 13.4673 27.6221 14.7629 28.7549C15.1052 29.0547 15.5444 29.2197 16 29.2197C16.4553 29.2197 16.8948 29.0547 17.2366 28.7554C18.5322 27.6223 19.7808 26.5583 20.8821 25.6196C24.1055 22.8728 26.8894 20.5005 28.8264 18.1631C30.9917 15.5505 32 13.0732 32 10.3667C32 7.73755 31.0984 5.31177 29.4614 3.53613Z" fill="url(#paint0_linear)"></path>
                        <defs>
                        <linearGradient id="paint0_linear" x1="16" y1="0.75" x2="16" y2="29.2197" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F81F01"></stop>
                        <stop offset="1" stop-color="#EE076E"></stop>
                        </linearGradient>
                        </defs>
                    </svg>
                    <span><?=$row['likes']?></span>
                </div>
                <div class="date"><span><?=$row['date']?></span></div>
            </footer>
        </div>
        <?
    }
    
    ?>
    </div>
    </section>
</main>