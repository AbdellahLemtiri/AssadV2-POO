<?php

require_once "../OOP/habitats.php";
require_once "../OOP/utilisateur.php";
require_once  "../connexion/authinification.php";
checkRole("admin");
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];

$habitats = (new habitat())->getAllHabitats();


?>

<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Gestion des Habitats - ASSAD Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec7f13",
                        "background-dark": "#221910",
                        "surface-dark": "#2d241b"
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
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

    // Fonction pour générer les styles dynamiquement
    function nav_item($href, $icon, $label, $current_page)
    {
        $is_active = ($current_page == $href);

        // Classes si le lien est ACTIF
        if ($is_active) {
            return "flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-500 text-white shadow-lg shadow-emerald-200 dark:shadow-none transition-all duration-300";
        }
        // Classes si le lien est INACTIF (avec Hover)
        else {
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
                    <h1 class="text-3xl font-black">Gestion des Habitats</h1>
                    <p class="text-slate-500 text-sm italic">Surveillance des zones virtuelles</p>
                </div>
                <button onclick="openAddModal()" class="flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-lg font-bold transition-all">
                    <span class="material-symbols-outlined">add_location_alt</span>
                    Ajouter Nouvel Habitat
                </button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6">
            <div class="max-w-7xl mx-auto bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-800/30 border-b border-gray-100 dark:border-gray-800 text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Nom / ID</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Climat</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs text-center">Nb. Animaux</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        <?php foreach ($habitats as $hab): ?>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-emerald-100 dark:bg-emerald-500/10 text-emerald-600 rounded-lg">
                                            <span class="material-symbols-outlined">forest</span>
                                        </div>
                                        <div>
                                            <p class="font-bold"><?= $hab->getNomHabitat() ?></p>
                                            <p class="text-[10px] text-slate-400">ID: <?= $hab->getIdHabitat() ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-blue-50 dark:bg-blue-500/10 text-blue-600 rounded-md text-xs font-semibold">
                                        <?= $hab->getTypeClimat() ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-lg"><?= (new habitat)->getNbrAnimaux($hab->getIdHabitat()) ?></td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            data-open-edit-habitat
                                            data-id="<?= $hab->getIdHabitat() ?>"
                                            data-nom="<?= ($hab->getNomHabitat()) ?>"
                                            data-climat="<?= ($hab->getTypeClimat()) ?>"
                                            data-zone="<?= ($hab->getZoneZoo()) ?>"
                                            data-desc="<?= ($hab->getDescriptionHabitat()) ?>"
                                            class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined">edit</span>
                                        </button>
                                        <a href="fx/deletHab.php?id=<?= $hab->getIdHabitat() ?>" onclick="return confirm('Supprimer cet habitat ?')" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined">delete</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="modalAddHabitat" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeAddModal()"></div>
            <form action="fx/addHabitat.php" method="POST" class="relative bg-white dark:bg-slate-900 w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden">
                <div class="p-6 border-b dark:border-slate-800 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-emerald-600">Ajouter un Habitat</h2>
                    <button type="button" onclick="closeAddModal()" class="material-symbols-outlined">close</button>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-bold mb-1">Nom de l'habitat *</label>
                        <input type="text" name="nom" required class="w-full rounded-xl border-slate-200 dark:bg-slate-800 dark:border-slate-700">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Type de climat</label>
                        <input type="text" name="type_climat" class="w-full rounded-xl border-slate-200 dark:bg-slate-800 dark:border-slate-700">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Zone du Zoo</label>
                        <input type="text" name="zone_zoo" class="w-full rounded-xl border-slate-200 dark:bg-slate-800 dark:border-slate-700">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Description</label>
                        <textarea name="description" rows="3" class="w-full rounded-xl border-slate-200 dark:bg-slate-800 dark:border-slate-700"></textarea>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 dark:bg-slate-800/50 flex justify-end gap-3">
                    <button type="button" onclick="closeAddModal()" class="px-4 py-2 font-bold text-slate-500">Annuler</button>
                    <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-xl font-bold shadow-lg">Créer l'habitat</button>
                </div>
            </form>
        </div>
        <div id="modalEditHabitat" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeEditModal()"></div>
            <form action="fx/editHabitat.php" method="POST" class="relative bg-white dark:bg-slate-900 w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden">
                <input type="hidden" name="id" id="edit_habitat_id">

                <div class="p-6 border-b dark:border-slate-800 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-blue-600">Modifier l'Habitat</h2>
                    <button type="button" onclick="closeEditModal()" class="material-symbols-outlined">close</button>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-bold mb-1">Nom de l'habitat</label>
                        <input type="text" name="nom" id="edit_nom" required class="w-full rounded-xl border-slate-200 dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Type de climat</label>
                        <input type="text" name="type_climat" id="edit_climat" class="w-full rounded-xl border-slate-200 dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Zone du Zoo</label>
                        <input type="text" name="zone_zoo" id="edit_zone" class="w-full rounded-xl border-slate-200 dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Description</label>
                        <textarea name="description" id="edit_desc" rows="3" class="w-full rounded-xl border-slate-200 dark:bg-slate-800"></textarea>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 dark:bg-slate-800/50 flex justify-end gap-3">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 font-bold text-slate-500">Annuler</button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-xl font-bold shadow-lg">Mettre à jour</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        // القواميس (Selectors)
        const addModal = document.getElementById('modalAddHabitat');
        const editModal = document.getElementById('modalEditHabitat');

        // 1. وظائف الإضافة
        function openAddModal() {
            addModal.classList.remove('hidden');
        }

        function closeAddModal() {
            addModal.classList.add('hidden');
        }

        // 2. وظائف التعديل
        function closeEditModal() {
            editModal.classList.add('hidden');
        }

        // 3. التقاط أزرار التعديل في الجدول
        document.querySelectorAll('[data-open-edit-habitat]').forEach(btn => {
            btn.addEventListener('click', () => {
                // تعمير البيانات في المودال ديال التعديل
                document.getElementById('edit_habitat_id').value = btn.dataset.id;
                document.getElementById('edit_nom').value = btn.dataset.nom;
                document.getElementById('edit_climat').value = btn.dataset.climat;
                document.getElementById('edit_zone').value = btn.dataset.zone;
                document.getElementById('edit_desc').value = btn.dataset.desc;

                // إظهار المودال
                editModal.classList.remove('hidden');
            });
        });

        // 4. إغلاق المودالات بـ ESC
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeAddModal();
                closeEditModal();
            }
        });
    </script>
</body>

</html>