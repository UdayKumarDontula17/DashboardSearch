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
        No posts found<?= !empty($searchTerm) ? ' matching your search' : '' ?>.
    </div>
<?php endif; ?>
