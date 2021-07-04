<?

if(isset($_POST['done']) && !empty($_POST['name']) && !empty($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    if(!empty($_POST['text'])) {
        $text = $_POST['text'];
    } else {
        $text = "Предпочтений нет";
    }

    $fileName = "assets/images/emailImage/".md5($_FILES['image']['name']).".png";
    if (@copy($_FILES['image']['tmp_name'], $path.$fileName)){
        $image = "<img width='256' src='http://rexoll-art.ru/$fileName'>";
    }

    $message = "<h2>Здраствуйте, меня зовут ".$name;
    $message .= ", мне необходим арт.</h2>";
    $message .= "<p>Мои предпочтения: $text.</p>";
    $message .= $image;
    $message .= "<br><hr> буду ждать вашего ответа!";

    $to = "#";
    $from = $email;
    $subject = "Заказ на АРТ";
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/html; charset=utf-8\r\n";
    $m = mail($to, $subject, $message, $headers);
    if($m) echo 'Ваше письмо успешно отправлено'; else echo "Ошибка, отправки письма, попробуйте ещё раз";
}



?>
<section class="forms" id="form">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Оставить заявку</h2>
                <p>Для оформления заказа на АРТ, просто заполните форму ниже</p>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="text" name="name" class="form-control" placeholder="Ваше имя" required>
                        <input type="email" name="email" class="form-control" placeholder="Ваша почта" required>
                    </div>
                    <textarea name="text" id="text" cols="30" rows="10" class="form-control" placeholder="Пожелания"></textarea>
                    <div class="row">
                        <input type="file" name="image" id="image" class="form-control">
                        <input type="submit" class="btn" name="done">
                    </div>
                    <label for="opd" style="font-size: 16px; margin-top: 20px; display: block; color: #c4c4c4">
                        <input id="opd" type="checkbox" checked required>
                        <a href="https://docs.google.com/document/d/1IjVvnt8RDKtno5WgIH1ggG-sgWMowSwLabD-NaZHFrw/edit?usp=sharing" target="politics">Согласен с политикой в отношении обработки персональных данных</a>
                    </label>
                </form>
            </div>
            <div class="col-md-6">
                <img src="../assets/images/site/form-image.png" alt="Картинка горы и мальчика">
            </div>
        </div>
    </div>
</section>