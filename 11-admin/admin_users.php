<?php
require_once '../OOP/admin.php';
$admin = new Admin();
$lesUtl = $admin->afficherToutUtilisatdeurs();


if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    if ($user_id > 0) {
        $current_status = $admin->getStatusAprouve($user_id);

 
        if ($current_status === 1) {
          $res=  $admin->desactiverUtilisateur($user_id)
            ;     header("Location: admin_users.php?hh$res");
        exit();
        } else {
            $res= $admin->acitiverUtilisateur($user_id);
              header("Location: admin_users.php?hh$res");
              exit();
        }
        
        
   
    }
}
// $query = "SELECT id, nom, email, role, approuve FROM utilisateurs";
// $result = mysqli_query($connect, $query);

// if (isset($_GET['toggle_status'])) {
//     $user_id = $_GET['toggle_status'];
    
//     $status_query = "SELECT approuve FROM utilisateurs WHERE id = $user_id";
//     $status_result = mysqli_query($connect, $status_query);
//     $user = mysqli_fetch_assoc($status_result);

 
//   
   
//     $update_query = "UPDATE utilisateurs SET approuve = $new_status WHERE id = $user_id";
//     mysqli_query($connect, $update_query);
    
  
//     header("Location: admin_users.php");
//     exit;
// }

?>


<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Gestion des Utilisateurs - ASSAD Admin</title>
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
                    primary: "#0d9488",          
                    "primary-dark": "#0f766e",
                    "primary-light": "#2dd4bf",
                    "background-light": "#f0fdfa",
                    "background-dark": "#042f2e",
                    "surface-light": "#ffffff",
                    "surface-dark": "#134e4a",
                    "text-light": "#164e63",
                    "text-dark": "#a7f3d0",
                    "text-secondary-light": "#0891b2",
                    "text-secondary-dark": "#5eead4",
                    "accent": "#f59e0b"          
                },
                fontFamily: {
                    sans: ["Plus Jakarta Sans", "sans-serif"]
                },
                animation: {
                    'fade-in': 'fadeIn 0.7s ease-out forwards',
                    'slide-up': 'slideUp 0.8s ease-out forwards',
                    'pulse-glow': 'pulseGlow 2s infinite'
                },
                keyframes: {
                    fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                    slideUp: { '0%': { transform: 'translateY(60px)', opacity: '0' }, '100%': { transform: 'translateY(0)', opacity: '1' } },
                    pulseGlow: { '0%, 100%': { boxShadow: '0 0 20px rgba(13,148,136,0.3)' }, '50%': { boxShadow: '0 0 40px rgba(13,148,136,0.6)' } }
                }
            }
        }
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
                        <h1 class="text-3xl font-black tracking-tight text-text-light dark:text-text-dark">Gestion des Utilisateurs</h1>
                        <p
                            class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium flex items-center gap-1">
                            Contrôle total sur les comptes Guides et Visiteurs
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                   
                    </div>
                </div>
            </div>
        </header>
        <div class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark">
            <div class="max-w-7xl mx-auto w-full px-6 py-8 flex flex-col gap-8">
                


                <div
                    class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                    <div class="overflow-x-auto">
<table class="min-w-full table-auto bg-white dark:bg-slate-800 shadow-md rounded-lg overflow-hidden">
    <thead class="bg-emerald-600 text-white">
        <tr>
            <th class="px-6 py-3 text-left text-sm font-medium">Utilisateur</th>
            <th class="px-6 py-3 text-left text-sm font-medium">Rôle</th>
            <th class="px-6 py-3 text-left text-sm font-medium">Statut</th>
            <th class="px-6 py-3 text-center text-sm font-medium">Actions</th>
        </tr>
    </thead>

    <tbody class="text-sm text-gray-700 dark:text-gray-300">
        <?php if(!$lesUtl) : ?>
            <p>auccun utilisateur pour le moment !</p>
        <?php else : ?>
        <?php foreach ($lesUtl as $user):  ?>
            <tr class="hover:bg-emerald-50 dark:hover:bg-slate-700 transition-colors duration-300">
                <td class="px-6 py-4"><?= $user['nom_utilisateur'] ?> <span class="text-xs text-gray-500">(<?= $user['email'] ?>)</span></td>
                <td class="px-6 py-4"><?= ucfirst($user['role']) ?></td>
                <td class="px-6 py-4">
                    <span class="text-xs <?= $user['statut_utilisateur'] == 1 ? 'text-green-500' : 'text-red-500' ?>">
                        <?= $user['statut_utilisateur'] == 1 ? 'Actif' : 'Inactif' ?>
                    </span>
                </td>
                <td class="px-6 py-4 text-center">
                    <a  onclick="return confirm('tu vraiment activer/desactiver <?= $user['nom_utilisateur'] ?> ')" href="?id=<?= $user['id_utilisateur'] ?>" class="p-2 rounded-full bg-emerald-600 text-white hover:bg-emerald-700 transition-all duration-300">
                        <span class="material-symbols-outlined text-lg">
                            <?= $user['statut_utilisateur'] == 1 ? 'toggle_on' : 'toggle_off' ?>
                        </span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>


                
        </div>
    </main>

</body>

</html>