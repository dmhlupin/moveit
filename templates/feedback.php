<div class="feedbackContainer">
    <h3>Отзывы</h3>
    <br>
    <form action="/main/home/add_feedback/?itemId=<?=$itemId?>" method="post">
        <p>Оставьте отзыв: </p> 
        <input type="text" name="item" value="<?=$itemId?>" hidden>
        <input class="inputFieldFeedback" type="text" name="name" placeholder="Имя"><br>
        <input class="inputFieldFeedback"type="text" name="message" placeholder="Напишите отзыв здесь..."><br>
        <input type="submit" value="Добавить">
    </form>
    <br>
    <?php foreach ($feedback as $value): ?>
        <div><i><?=$value['created_at']?>: </i> <strong><?=$value['author']?></strong>: <?=$value['feedback_text']?></div>
    <?php endforeach;?>
</div>
