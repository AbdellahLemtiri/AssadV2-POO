<?php


require_once "../OOP/animaux.php";
require_once "../OOP/habitats.php";


$animaux = Animal::getAnimaux();
$habitats = habitat::getAllHabitats();
?>

<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Gestion des Animaux - ASSAD Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#ec7f13",
                        "background-dark": "#221910",
                        "surface-dark": "#2d241b"
                    },
                    fontFamily: {
                        display: ["Plus Jakarta Sans", "sans-serif"]
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display min-h-screen flex overflow-hidden">

    <?php
    // On détecte la page actuelle pour allumer le bon bouton
    $current_page = basename($_SERVER['PHP_SELF']);

    function nav_item($href, $icon, $label, $current_page)
    {
        $is_active = ($current_page == $href);

        if ($is_active) {
            return "flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-500 text-white shadow-lg shadow-emerald-200 dark:shadow-none transition-all duration-300";
        } else {
            return "flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-400 transition-all duration-200 group";
        }
    }
    ?>

    <aside class="w-72 bg-white dark:bg-slate-900 border-r border-slate-100 dark:border-slate-800 flex-col hidden md:flex h-screen sticky top-0 shrink-0">
        <div class="h-full flex flex-col justify-between p-6">

            <div class="flex flex-col gap-8">
                <div class="flex items-center gap-4 px-2">
                    <div class="h-11 w-11 rounded-xl bg-gradient-to-br from-emerald-400 to-green-600 flex items-center justify-center shadow-md">
                        <span class="material-symbols-outlined text-white text-2xl">eco</span>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-slate-800 dark:text-white text-xl font-extrabold tracking-tight leading-none">ASSAD Admin</h1>
                        <p class="text-emerald-500 text-[10px] font-bold uppercase tracking-widest mt-1">Zoo Virtuel</p>
                    </div>
                </div>

                <nav class="flex flex-col gap-2">

                    <a href="index.php" class="<?= nav_item('index.php', 'dashboard', 'Vue d\'ensemble', $current_page) ?>">
                        <span class="material-symbols-outlined text-[22px]">dashboard</span>
                        <span class="text-sm font-semibold">Vue d'ensemble</span>
                    </a>

                    <a href="admin_animaux.php" class="<?= nav_item('admin_animaux.php', 'pets', 'Gestion Animaux', $current_page) ?>">
                        <span class="material-symbols-outlined text-[22px]">pets</span>
                        <span class="text-sm font-semibold">Gestion Animaux</span>
                    </a>

                    <a href="admin_habitats.php" class="<?= nav_item('admin_habitats.php', 'forest', 'Habitats', $current_page) ?>">
                        <span class="material-symbols-outlined text-[22px]">forest</span>
                        <span class="text-sm font-semibold">Habitats</span>
                    </a>

                    <a href="admin_users.php" class="<?= nav_item('admin_users.php', 'group', 'Utilisateurs', $current_page) ?>">
                        <span class="material-symbols-outlined text-[22px]">group</span>
                        <span class="text-sm font-semibold">Utilisateurs</span>
                    </a>



                </nav>
            </div>

            <div class="flex flex-col gap-4 border-t border-slate-100 dark:border-slate-800 pt-6">
                <div class="flex items-center justify-between bg-slate-50 dark:bg-slate-800/50 p-3 rounded-2xl">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <img class="h-10 w-10 rounded-full object-cover ring-2 ring-white dark:ring-slate-700"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLpsL4U45kNe2pJTEnRso6tfRPA6aLzfj3_19OQE6427LVmJ5aiOc1ZRWmvboLsjGaNmK64pZi1jhhiR-v87OvRhal9yHiSxQvTiX-eipY5OBy7UKmVoRy-c_ZXvLyH0-CLxF8G1ng-sBh2jhO4Yf-eaj5B3UE6mv0ggcUeAMOn8OYOLPj8EBGQKb-92AiJo5VHKJHGnSSRxJMnzp3emTjiTzC3qYd_2iEed3MQVluydYS0yi194Z_ztMxCH_6roaeCDAm0hQHwnIW" alt="Admin">
                            <span class="absolute bottom-0 right-0 h-3 w-3 bg-emerald-500 border-2 border-white dark:border-slate-800 rounded-full"></span>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-sm font-bold text-slate-700 dark:text-slate-200">ADMIN ASSAD</p>
                            <p class="text-[11px] text-slate-400 font-medium italic">Super Admin</p>
                        </div>
                    </div>
                    <a href="index.php" title="Déconnexion" class="text-slate-400 hover:text-red-500 transition-colors">
                        <span class="material-symbols-outlined text-xl">logout</span>
                    </a>
                </div>
            </div>

        </div>
    </aside>


    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <header class="bg-white dark:bg-surface-dark border-b border-gray-200 dark:border-gray-800 p-6">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-black">Gestion des Animaux</h1>
                    <p class="text-slate-500 text-sm">Liste complète des espèces</p>
                </div>
                <button data-open-add class="flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-lg font-bold transition-all">
                    <span class="material-symbols-outlined">add</span> Ajouter Nouvel Animal
                </button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-slate-950">
            <div class="max-w-7xl mx-auto bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Animal</th>
                            <th class="px-6 py-4 font-semibold">Espèce</th>
                            <th class="px-6 py-4 font-semibold">Habitat</th>
                            <th class="px-6 py-4 font-semibold">Alimentation</th>
                            <th class="px-6 py-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        <?php if (empty($animaux)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4">Aucun animal trouvé.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($animaux as $animal): ?>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 flex items-center gap-4">
                                        <img src="<?= $animal->getImageUrl() ?>" class="h-12 w-12 rounded-lg object-cover" onerror="this.src='https://via.placeholder.com/100'">
                                        <div>
                                            <p class="font-bold"><?= $animal->getNomAnimal() ?></p>
                                            <p class="text-xs text-slate-400">ID: #<?= $animal->getIdAnimal() ?></p>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 italic text-slate-500">
                                        <?= $animal->getEspeceAnimal() ?>
                                    </td>

                                    <td class="px-6 py-4">
                                        <?= $animal->nom_habitat ?? 'Non défini' ?>
                                    </td>

                                    <td class="px-6 py-4">
                                        <?= $animal->getTypeAlimentation() ?>
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button class="p-2 text-blue-600"
                                                data-open-edit
                                                data-id="<?= $animal->getIdAnimal() ?>"
                                                data-nom="<?= $animal->getNomAnimal() ?>"
                                                data-espece="<?= $animal->getEspeceAnimal() ?>"
                                                data-alimentation="<?= $animal->getTypeAlimentation() ?>"
                                                data-pays="<?= $animal->getPaysOrigine() ?>"
                                                data-image="<?= $animal->getImageUrl() ?>"
                                                data-habitat="<?= $animal->getIdHabitat() ?>">
                                                <span class="material-symbols-outlined">edit</span>
                                            </button>

                                            <a href="fx/delete.php?id=<?= $animal->getIdAnimal() ?>" class="p-2 text-red-500">
                                                <span class="material-symbols-outlined">delete</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="modal_add_animal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" data-close-add></div>
            <form method="POST" action="" class="relative bg-white dark:bg-slate-900 w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden">
                <input type="hidden" name="action" value="add">
                <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                    <h2 class="text-xl font-bold">Ajouter un animal</h2>
                    <button type="button" data-close-add class="material-symbols-outlined">close</button>
                </div>
                <div class="p-6 grid grid-cols-2 gap-4">
                    <div class="col-span-1"><label class="block text-sm font-bold mb-1">Nom *</label><input name="nom" required class="w-full rounded-xl border-slate-200 dark:bg-slate-800"></div>
                    <div class="col-span-1"><label class="block text-sm font-bold mb-1">Espèce</label><input name="espece" class="w-full rounded-xl border-slate-200 dark:bg-slate-800"></div>
                    <div class="col-span-2"><label class="block text-sm font-bold mb-1">Image URL</label><input name="image" id="add_image" placeholder="https://..." class="w-full rounded-xl border-slate-200 dark:bg-slate-800"></div>
                    <div class="col-span-1">
                        <label class="block text-sm font-bold mb-1">Alimentation</label>
                        <select name="alimentation" class="w-full rounded-xl border-slate-200 dark:bg-slate-800">
                            <option value="" selected disabled>-- Choisir --</option>
                            <option value="Carnivore">Carnivore</option>
                            <option value="Herbivore">Herbivore</option>
                            <option value="Omnivore">Omnivore</option>
                            <option value="Piscivore">Piscivore</option>
                            <option value="Insectivore">Insectivore</option>
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-bold mb-1">Habitat</label>
                        <select name="id_habitat" class="w-full rounded-xl border-slate-200 dark:bg-slate-800">
                            <option value="" selected disabled>-- Choisir --</option>
                            <?php foreach ($habitats as $h):
                            ?><option value="<?= $h->getIdHabitat() ?>"><?= $h->getNomHabitat() ?></option><?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 dark:bg-slate-800/50 flex justify-end gap-3">
                    <button type="button" data-close-add class="px-4 py-2 font-bold">Annuler</button>
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-xl font-bold shadow-lg">Enregistrer</button>
                </div>
            </form>
        </div>

        <div id="modal_edit_animal"  class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" data-close-edit></div>
            <form method="POST" action="fx/editAnim.php" class="relative bg-white dark:bg-slate-900 w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="animal_id" id="edit_id">
                <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                    <h2 class="text-xl font-bold">Modifier l'animal</h2>
                    <button type="button" data-close-edit class="material-symbols-outlined">close</button>
                </div>
                <div class="p-6 grid grid-cols-2 gap-4">
                    <div class="col-span-1"><label class="block text-sm font-bold mb-1">Nom *</label><input name="nom" id="edit_nom" required class="w-full rounded-xl border-slate-200 dark:bg-slate-800"></div>
                    <div class="col-span-1"><label class="block text-sm font-bold mb-1">Espèce</label><input name="espece" id="edit_espece" class="w-full rounded-xl border-slate-200 dark:bg-slate-800"></div>
                    <div class="col-span-2">
                        <label class="block text-sm font-bold mb-1">Image URL</label>
                        <input name="image" id="edit_image" class="w-full rounded-xl border-slate-200 dark:bg-slate-800">
                        <img id="edit_preview" src="" class="mt-2 h-16 w-16 rounded-lg object-cover border">
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-bold mb-1">Alimentation</label>
                        <select name="alimentation" class="w-full rounded-xl border-slate-200 dark:bg-slate-800">
                            <option value="" selected disabled>-- Choisir --</option>
                            <option value="Carnivore">Carnivore</option>
                            <option value="Herbivore">Herbivore</option>
                            <option value="Omnivore">Omnivore</option>
                            <option value="Piscivore">Piscivore</option>
                            <option value="Insectivore">Insectivore</option>
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-bold mb-1">Habitat</label>
                        <select name="id_habitat" id="edit_habitat" class="w-full rounded-xl border-slate-200 dark:bg-slate-800">
                            <option value="" selected disabled>-- Choisir --</option>
                            <?php foreach ($habitats as $h): ?>
                                <option value="<?= $h->getIdHabitat() ?>"><?= $h->getNomHabitat() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 dark:bg-slate-800/50 flex justify-end gap-3">
                    <button type="button" data-close-edit class="px-4 py-2 font-bold">Annuler</button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-xl font-bold shadow-lg">Mettre à jour</button>
                </div>
            </form>
        </div>


    </main>

    <script>
        const addModal = document.getElementById('modal_add_animal');
        const editModal = document.getElementById('modal_edit_animal');

        // OPEN/CLOSE ADD
        document.querySelector('[data-open-add]').addEventListener('click', () => addModal.classList.remove('hidden'));
        document.querySelectorAll('[data-close-add]').forEach(b => b.addEventListener('click', () => addModal.classList.add('hidden')));

        // OPEN EDIT & POPULATE
        document.querySelectorAll('[data-open-edit]').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('edit_id').value = btn.dataset.id;
                document.getElementById('edit_nom').value = btn.dataset.nom;
                document.getElementById('edit_espece').value = btn.dataset.espece;
                document.getElementById('edit_image').value = btn.dataset.image;
                document.getElementById('edit_habitat').value = btn.dataset.habitat;
                document.getElementById('edit_preview').src = btn.dataset.image;
                editModal.classList.remove('hidden');
            });
        });
        document.querySelectorAll('[data-close-edit]').forEach(b => b.addEventListener('click', () => editModal.classList.add('hidden')));


        document.getElementById('edit_image').addEventListener('input', (e) => {
            document.getElementById('edit_preview').src = e.target.value;
        });
    </script>
</body>

</html>