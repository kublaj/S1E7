<?php
use WebtudorBlog\DataObject\BlogPost;

/**
 * @var BlogPost $post
 */
?>

<h1><?=$post->getTitle()?></h1>
<div class="excerpt">
	<?=$post->getExcerpt()?>
</div>
<div class="content">
	<?=$post->getContent()?>
</div>
