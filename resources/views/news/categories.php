<?php
foreach($categories as $category): ?>
    <div>
        <h2>Category <?=$category['title']?></h2>
        <a href="<?=route('category.show', ['id' => $category['id']])?>">View all news in the category></a>
        <br>
            <?php foreach($category['newslist'] as $n): ?>
                <h3> <?=$n['id']?>. <?=$n['title']?></h3>
                <p><?=$n['description']?></p>
                <div><i><?=$n['author']?><br> <?=$n['created_at']?></i></div>
                <a href="<?=route('news.show', ['id' => $n['id']])?>">Read full text></a>
            <?php endforeach; ?>
    </div>
    <br>
<?php endforeach; ?>
