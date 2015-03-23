<?php
use WebtudorBlog\DataObject\BlogPost;

/**
 * @var BlogPost[] $posts
 */
?>

<?php foreach ($posts as $post) :?>
	<h2><?=$post->getTitle()?></h2>
	<div class="excerpt">
		<?=$post->getExcerpt()?>
	</div>
	<button><a href="/blog/<?=htmlspecialchars($post->getSlug()) ?>">Olvass tovább &raquo;</a></button>
<?php endforeach; ?>
