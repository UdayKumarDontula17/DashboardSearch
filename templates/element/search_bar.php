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
        Showing <?= count($paginatedPosts) ?> results for "<?= h($searchTerm) ?>"
    </p>
<?php endif; ?>
