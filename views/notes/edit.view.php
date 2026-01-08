<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <div class="space-y-3">
                    <div>
                        <div class="col-span-full">
                            <label for="body" class="block text-sm/10 font-medium text-white">Edit Note</label>
                            <div class="mt-2">
                                <textarea
                                    id="body"
                                    name="body"
                                    rows="3"
                                    required
                                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                                    placeholder="Here's an idea for a note..."
                                    ><?= $note['body'] ?? '' ?></textarea>
                                <?php if (isset($errors['body'])): ?>
                                    <p class="text-red-500 text-sm mt-2"> <?= $errors['body'] ?></p>
                                <?php elseif (isset($message['body'])):  ?>
                                    <p class="text-green-500 text-sm mt-2"> <?= $message['body'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 flex items-center justify-end gap-x-6">
                        <a href="/notes" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>