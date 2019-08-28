<?php
// для работы можно использовать любой токен в данном случае сервисный вполне уместен
// VK API utils.getShortLink делаем php скрипт сокращение ссылок через вконтакте апи
$token = 'bdcc4fbdbdcc4fbdbdcc4fbd86bda01246bbdccbdcc4fbde095806323486a42a85062cd';
if(isset($_POST['submit'])){
    if(empty($_POST['url'])){
        echo "Не введена ссылка <a href='index.php'>< Обратно</a>";
    }
    else{
        $query = file_get_contents("https://api.vk.com/method/utils.checkLink?url=".urlencode($_POST['url'])."&private=0&access_token=".$token."&v=5.63");
        $result = json_decode($query,true);
        if($result['error']['error_code']){
            echo "Не верная ссылка <a href='index.php'>< Обратно</a>";
        }
        else{
            echo "
            Статус<br>
            <input type='text' value='".$result['response']['status']."'>
            <a href='index.php'>< Проверить еще.</a>";
        }
    }
}

?>