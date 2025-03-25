<div class="pagination-wrapper d-flex justify-content-between align-items-center mb-4">
    <div class="pagination-controls">
        <?php if ($page > 1): ?>
            <a href="<?= $this->Url->build([
                '?' => [
                    'search' => $searchTerm,
                    'page' => $page - 1,
                    'limit' => $limit
                ]
            ]) ?>" class="btn btn-outline-primary">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="<?= $this->Url->build([
                '?' => [
                    'search' => $searchTerm,
                    'page' => $i,
                    'limit' => $limit
                ]
            ]) ?>" class="btn <?= $i === $page ? 'btn-primary' : 'btn-outline-secondary' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="<?= $this->Url->build([
                '?' => [
                    'search' => $searchTerm,
                    'page' => $page + 1,
                    'limit' => $limit
                ]
            ]) ?>" class="btn btn-outline-primary">Next</a>
        <?php endif; ?>
    </div>

    <form method="get" class="records-per-page">
        <input type="hidden" name="search" value="<?= h($searchTerm) ?>">
        <div class="input-group">
            <select name="limit" class="form-select" onchange="this.form.submit()">
                <option value="10" <?= $limit === 10 ? 'selected' : '' ?>>10 per page</option>
                <option value="15" <?= $limit === 15 ? 'selected' : '' ?>>15 per page</option>
                <option value="20" <?= $limit === 20 ? 'selected' : '' ?>>20 per page</option>
            </select>
        </div>
    </form>
</div>

<style>
    .pagination-wrapper {
        gap: 1rem;
    }
    .pagination-controls {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    .records-per-page {
        width: auto;
    }
</style>
