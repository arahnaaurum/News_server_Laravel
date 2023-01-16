<?php
foreach($news as $n): ?>
    <div>
        <h3><?=$n['title']?></h3>
        <p><?=$n['description']?></p>
        <div><i><?=$n['author']?><br> <?=$n['created_at']?></i></div>
        <a href="<?=route('news.show', ['id' => $n['id']])?>">Read full text</a>>
    </div>
<?php endforeach; ?>
