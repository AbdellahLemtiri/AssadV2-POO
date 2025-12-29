<?php
// Hadu bach ila kano errors ybanu lik o mat-tla3ch page bida
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "../OOP/animaux.php";
require_once "../OOP/habitats.php";
require_once "../connexion/authinification.php";

checkRole("visiteur"); 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Appel dyal l-function static direct smit l-Class (Animal)
    $animal = Animal::getAnimalById($_GET['id']);
    
    if (!$animal) {
        header("Location: animaux.php");
        exit();
    }
} else {
    header("Location: animaux.php");
    exit();
}
?>
<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?= htmlspecialchars($animal->getNomAnimal()) ?> - Zoo Virtuel ASSAD</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
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
                        "accent": "#f59e0b"
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.7s ease-out forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        slideUp: { '0%': { transform: 'translateY(40px)', opacity: '0' }, '100%': { transform: 'translateY(0)', opacity: '1' } },
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark text-[#1b140d] font-sans min-h-screen flex flex-col">


    <main class="flex-grow py-10">
        <div class="max-w-[1200px] mx-auto px-4 md:px-10">
            <div class="mb-6">
                <a href="animaux.php" class="inline-flex items-center gap-2 text-primary hover:text-primary-dark text-sm font-bold transition-all group">
                    <span class="material-symbols-outlined text-lg group-hover:-translate-x-1 transition-transform">arrow_back</span>
                    Retour à la liste
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <div class="h-[400px] md:h-[500px] rounded-3xl overflow-hidden relative shadow-2xl animate-fade-in">
                        <img alt="<?= htmlspecialchars($animal->getNomAnimal()) ?>" class="w-full h-full object-cover" src="<?= htmlspecialchars($animal->getImageUrl()) ?>" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-8 left-8 text-white">
                             <div class="flex gap-2 mb-3">
                                <span class="px-3 py-1 rounded-full bg-primary/90 text-xs font-bold uppercase tracking-wider">
                                    <?= htmlspecialchars($animal->getTypeAlimentation()) ?>
                                </span>
                             </div>
                            <h1 class="text-4xl md:text-6xl font-black mb-1"><?= htmlspecialchars($animal->getNomAnimal()) ?></h1>
                            <p class="text-xl text-white/80 italic"><?= htmlspecialchars($animal->getEspeceAnimal()) ?></p>
                        </div>
                    </div>
                    
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-teal-50">
                        <h3 class="text-xl font-bold text-text-light mb-4 flex items-center gap-2 border-b border-teal-50 pb-4">
                            <span class="material-symbols-outlined text-primary">menu_book</span>
                            À propos de l'animal
                        </h3>
                        <p class="text-gray-600 leading-relaxed text-lg italic">
                            "<?= nl2br(htmlspecialchars($animal->getDescriptionAnimal())) ?>"
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-1 animate-slide-up">
                    <div class="bg-white p-6 rounded-3xl shadow-xl border border-teal-50 sticky top-24">
                        <h2 class="text-2xl font-bold text-text-light mb-6">Fiche d'identité</h2>
                        
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-background-light border border-teal-100 flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center text-primary shadow-sm">
                                    <span class="material-symbols-outlined">public</span>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 font-bold uppercase">Origine</p>
                                    <p class="text-text-light font-bold"><?= htmlspecialchars($animal->getPaysOrigine()) ?></p>
                                </div>
                            </div>

                            <div class="p-4 rounded-2xl bg-background-light border border-teal-100 flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center text-primary shadow-sm">
                                    <span class="material-symbols-outlined">explore</span>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 font-bold uppercase">Habitat</p>
                                    <p class="text-text-light font-bold"><?= htmlspecialchars($animal->getNomHabitat()) ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 p-5 rounded-2xl bg-teal-900 text-white relative overflow-hidden">
                            <span class="material-symbols-outlined absolute -right-2 -bottom-2 text-6xl opacity-10">landscape</span>
                            <h4 class="text-sm font-bold mb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm text-primary-light">info</span>
                                Information
                            </h4>
                            <p class="text-xs text-teal-100 leading-relaxed italic">
                                Cet animal vit dans un habitat de type <?= htmlspecialchars($animal->getNomHabitat()) ?>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-background-dark text-white pt-12 pb-8">
        <div class="max-w-[1200px] mx-auto px-4 md:px-10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 border-t border-white/10 pt-8">
                <p class="text-teal-500/60 text-xs text-center md:text-left">© 2026 Zoo Virtuel ASSAD.</p>
            </div>
        </div>
    </footer>
</body>
</html>