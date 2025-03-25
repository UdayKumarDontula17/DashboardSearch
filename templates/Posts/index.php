<div class="container">
    <h2>Posts from API</h2>

    <?= $this->element('search_bar', ['searchTerm' => $searchTerm]) ?>

    <?= $this->element('posts_table', ['posts' => $paginatedPosts, 'searchTerm' => $searchTerm]) ?>

    <?= $this->element('pagination', [
        'searchTerm' => $searchTerm,
        'page' => $page,
        'limit' => $limit,
        'totalPages' => $totalPages
    ]) ?>
</div>
