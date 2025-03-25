<div class="container">
    <h2>Posts from API</h2>

    <!-- Render Search Bar -->
    <?= $this->element('search_bar', ['searchTerm' => $searchTerm]) ?>

    <!-- Render Posts Table -->
    <?= $this->element('posts_table', ['posts' => $paginatedPosts, 'searchTerm' => $searchTerm]) ?>

    <!-- Render Pagination Controls -->
    <?= $this->element('pagination', [
        'searchTerm' => $searchTerm,
        'page' => $page,
        'limit' => $limit,
        'totalPages' => $totalPages
    ]) ?>
</div>
