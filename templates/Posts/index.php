<div class="container">
    <h2>Posts from API</h2>

    <form method="get" action="/posts" class="mb-4">
        <div class="input-group">
            <input type="text" 
                   name="search" 
                   value="<?= h($searchTerm) ?>" 
                   class="form-control" 
                   placeholder="Search posts by title or content..."
                   aria-label="Search">
            <button type="submit" class="btn btn-primary">Search</button>
            <?php if (!empty($searchTerm)): ?>
                <a href="/posts" class="btn btn-outline-secondary">Clear</a>
            <?php endif; ?>
        </div>
    </form>

    <?php if (!empty($searchTerm)): ?>
        <p class="text-muted mb-3">
            Showing <?= count($posts) ?> results for "<?= h($searchTerm) ?>"
        </p>
    <?php endif; ?>

    <?php if (!empty($posts)): ?>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= h($post['id']) ?></td>
                    <td><?= h($post['userId']) ?></td>
                    <td><?= h($post['title']) ?></td>
                    <td><?= h($post['body']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">
            No posts found matching your search.
        </div>
    <?php endif; ?>
</div>
