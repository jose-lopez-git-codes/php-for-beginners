<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a href="/" class="text-blue-500 underline">Go back....</a>
            </p>
            <p class="text-white mb-6"><?= htmlspecialchars($note['body'])?></p>


            <footer>
                <div class="mt-2 flex items-center justify-end gap-x-6">
                    <a class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white" href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
                    <form method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" value="<?= $note['id'] ?>" name="id">
                        <button type="submit" class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white">Delete</button>
                    </form>
                </div>
            </footer>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>