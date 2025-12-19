<?php 
require_once "../Fonctionalite_php/connect.php"; 
$sql = "SELECT * FROM habitats where 1  ";
$res = $connect->query($sql);
$habitats=[];
if($res){
$habitats = $res->fetch_all(MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Ajouter un Nouvel Animal - ASSAD Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec7f13",
                        "primary-dark": "#d16a0a",
                        "background-light": "#f8f7f6",
                        "background-dark": "#221910",
                        "surface-light": "#ffffff",
                        "surface-dark": "#2d241b",
                        "text-light": "#1b140d",
                        "text-dark": "#f0e6dd",
                        "text-secondary-light": "#9a734c",
                        "text-secondary-dark": "#b08d6b",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark font-display antialiased min-h-screen flex overflow-hidden">
 <?php
// On détecte la page actuelle pour allumer le bon bouton
$current_page = basename($_SERVER['PHP_SELF']);

// Fonction pour générer les styles dynamiquement
function nav_item($href, $icon, $label, $current_page) {
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
                
             <a href="dash.php" class="<?= nav_item('dash.php', 'dashboard', 'Vue d\'ensemble', $current_page) ?>">
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

                <a href="settings.php" class="<?= nav_item('settings.php', 'settings', 'Paramètres', $current_page) ?>">
                    <span class="material-symbols-outlined text-[22px] group-hover:rotate-45 transition-transform duration-500">settings</span>
                    <span class="text-sm font-semibold">Paramètres</span>
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
                        <p class="text-sm font-bold text-slate-700 dark:text-slate-200">Admin</p>
                        <p class="text-[11px] text-slate-400 font-medium italic">Super Admin</p>
                    </div>
                </div>
                <a href="logout.php" title="Déconnexion" class="text-slate-400 hover:text-red-500 transition-colors">
                    <span class="material-symbols-outlined text-xl">logout</span>
                </a>
            </div>
        </div>

    </div>
</aside>
    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <header
            class="bg-surface-light dark:bg-surface-dark border-b border-gray-200 dark:border-gray-800 shrink-0 z-10">
            <div class="px-6 py-5 max-w-7xl mx-auto w-full">
                <div class="flex flex-wrap justify-between items-end gap-4">
                    <div class="flex flex-col gap-1">
                        <h1 class="text-3xl font-black tracking-tight text-text-light dark:text-text-dark">Ajouter un Nouvel Animal</h1>
                        <p
                            class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium flex items-center gap-1">
                            Créez une nouvelle entrée pour une espèce ou un individu
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                         <a href="admin_animaux.php" class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-700 text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-800/50 transition-colors text-sm font-bold">
                            <span class="material-symbols-outlined text-lg">arrow_back</span>
                            Retour à la Liste
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark">
            <div class="max-w-4xl mx-auto w-full px-6 py-8 flex flex-col gap-8">
                
          
                
               <form method="POST" action="admin_add_animal.php" enctype="multipart/form-data" class="flex flex-col gap-8">
    
    <section class="p-6 bg-surface-light dark:bg-surface-dark rounded-xl shadow-xl border border-gray-100 dark:border-gray-800">
        <h2 class="text-xl font-bold text-primary mb-4 pb-2 border-b border-gray-100 dark:border-gray-800 flex items-center gap-2">
            <span class="material-symbols-outlined text-2xl">pets</span>
            Informations de l'Animal
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Nom <span class="text-red-500">*</span></label>
                <input type="text" name="nom" required class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-background-light dark:bg-surface-dark/50 text-text-light dark:text-text-dark" placeholder="Ex: Simba" />
            </div>
            
            <div>
                <label class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Espèce <span class="text-red-500">*</span></label>
                <input type="text" name="espece" required class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-background-light dark:bg-surface-dark/50 text-text-light dark:text-text-dark" placeholder="Ex: Lion" />
            </div>

            <div>
                <label class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Alimentation</label>
                <input type="text" name="alimentation" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-background-light dark:bg-surface-dark/50 text-text-light dark:text-text-dark" placeholder="Ex: Carnivore" />
            </div>

            <div>
                <label class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Pays d'Origine</label>
                <input type="text" name="pays_origine" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-background-light dark:bg-surface-dark/50 text-text-light dark:text-text-dark" placeholder="Ex: Maroc" />
            </div>
        </div>
        
        <div class="mt-4">
            <label class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Description Courte</label>
            <textarea name="description_courte" rows="3" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-background-light dark:bg-surface-dark/50 text-text-light dark:text-text-dark resize-none" placeholder="Quelques mots sur l'animal..."></textarea>
        </div>
    </section>
    
    <section class="p-6 bg-surface-light dark:bg-surface-dark rounded-xl shadow-xl border border-gray-100 dark:border-gray-800">
        <h2 class="text-xl font-bold text-primary mb-4 pb-2 border-b border-gray-100 dark:border-gray-800 flex items-center gap-2">
            <span class="material-symbols-outlined text-2xl">image</span>
            Habitat & Médias
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Habitat Affecté <span class="text-red-500">*</span></label>
                <select name="id_habitat" required class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-background-light dark:bg-surface-dark/50 text-text-light dark:text-text-dark">
                    <option value="" disabled selected>Sélectionner un habitat</option>
                    <?php foreach ($habitats as $h) : ?>
                        <option value="<?= $h['id'] ?>"><?= htmlspecialchars($h['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Image de l'Animal</label>
                <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20" />
            </div>
            
        </div>
    </section>
    
    <div class="flex justify-end gap-4 pt-4 border-t border-gray-100 dark:border-gray-800">
        <a href="admin_animaux.php" class="px-6 py-2.5 rounded-lg border border-gray-200 text-gray-500 font-bold hover:bg-gray-100 transition-colors">Annuler</a>
        <button type="submit" name="submit_animal" class="bg-primary hover:bg-primary-dark text-white px-8 py-2.5 rounded-lg font-bold shadow-lg shadow-primary/30 transition-all">
            Enregistrer l'Animal
        </button>
    </div>
</form>
                
            </div>
            <div class="pb-6 text-center">
                <p class="text-[10px] text-gray-300 uppercase tracking-[0.2em] font-bold">Inspiré par la force des Lions
                    de l'Atlas</p>
            </div>
        </div>
    </main>

</body>

</html>