<?php
require_once "../Fonctionalite_php/connect.php";

require_once  "../connexion/authinification.php";
checkRole("visiteur");
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT  a.*, h.nom as habnom, h.type_climat, h.zone_zoo, h.description as description_habitat 
            FROM animaux a 
            LEFT JOIN habitats h ON a.id_habitat = h.id
            WHERE a.id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $animal = $result->fetch_assoc();
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
    <title>Fiche de l'Animal - Zoo Virtuel ASSAD</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
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
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-[#1b140d] font-display min-h-screen flex flex-col">
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-[#f3ede7]">
        <div class="max-w-[1200px] mx-auto px-4 md:px-10 py-3">
            <div class="flex items-center justify-between whitespace-nowrap">
                <div class="flex items-center gap-4">
                    <div class="text-primary">
                        <span class="material-symbols-outlined text-4xl">pets</span>
                    </div>
                    <h2 class="text-[#1b140d] text-lg font-bold leading-tight tracking-[-0.015em]">Zoo Virtuel ASSAD
                    </h2>
                </div>
                <div class="hidden lg:flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors"
                            href="index.php">Accueil</a>
                        <a class="text-primary text-sm font-bold hover:text-primary transition-colors"
                            href="index.php">Animaux</a>
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors"
                            href="#">CAN 2025</a>
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors"
                            href="#">Billetterie</a>
                    </div>
                    <button
                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-primary hover:bg-orange-600 transition-colors text-white text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Rejoindre</span>
                    </button>
                </div>
                <button class="lg:hidden text-[#1b140d]">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </header>

    <main class="flex-grow flex flex-col items-center py-10">
    <div class="w-full max-w-[1200px] px-4 md:px-10">
      
            <div class="mb-8">
                <a href="animaux.php" class="flex items-center gap-1 text-primary hover:text-primary-dark text-sm font-bold transition-colors mb-4 group">
                    <span class="material-symbols-outlined text-lg group-hover:-translate-x-1 transition-transform">arrow_back</span>
                    Retour à la liste des animaux
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 flex flex-col gap-6">
                    <div class="h-[450px] md:h-[550px] rounded-2xl overflow-hidden relative shadow-2xl shadow-primary/20 animate-fade-in">
                        <img alt="<?=$animal['nom'] ?>"
                             class="w-full h-full object-cover"
                             src="<?= $animal['image'] ?>" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 text-white">
                            <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-primary text-white text-sm font-bold shadow-lg mb-3">
                                <span class="material-symbols-outlined text-[18px]">restaurant</span>
                                <?=$animal['alimentation'] ?>
                            </span>
                            <h1 class="text-5xl md:text-6xl font-black tracking-tight drop-shadow-lg"><?=  ($animal['nom']) ?></h1>
                            <p class="text-2xl text-white/90 italic font-medium mt-2 drop-shadow-md"><?=  ($animal['espece']) ?></p>
                        </div>
                    </div>
                    
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-[#f3ede7]">
                        <h3 class="text-xl font-bold text-primary mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined">description</span>
                            Description détaillée
                        </h3>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            <?= $animal['description_courte'] ?>
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-1 flex flex-col gap-6 animate-slide-up">
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-[#f3ede7] sticky top-24">
                        <h2 class="text-2xl font-bold text-primary mb-6 border-b border-gray-100 pb-4">Fiche d'identité</h2>
                        
                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-50 text-orange-600 text-xs font-bold border border-orange-100">
                                <span class="material-symbols-outlined text-sm">public</span>
                                <?= $animal['pays_origine'] ?>
                            </span>
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-teal-50 text-teal-600 text-xs font-bold border border-teal-100">
                                <span class="material-symbols-outlined text-sm">home_pin</span>
                                <?= $animal['habnom'] ?>
                            </span>
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex flex-col gap-1 p-3 rounded-xl bg-gray-50/50">
                                <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Régime Alimentaire</span>
                                <span class="text-gray-800 font-semibold"><?= $animal['alimentation'] ?></span>
                            </li>
                            <li class="flex flex-col gap-1 p-3 rounded-xl bg-gray-50/50">
                                <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Habitat & Climat</span>
                                <span class="text-gray-800 font-semibold"><?= $animal['habnom'] ?> (<?= $animal['type_climat'] ?>)</span>
                            </li>
                            <li class="flex flex-col gap-1 p-3 rounded-xl bg-gray-50/50">
                                <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Zone du Zoo</span>
                                <span class="text-gray-800 font-semibold"><?= $animal['zone_zoo'] ?></span>
                            </li>
                        </ul>

                        <div class="bg-primary/5 p-4 rounded-xl border border-primary/10">
                            <h4 class="text-sm font-bold text-primary mb-2 flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">info</span>
                                À propos de l'habitat
                            </h4>
                            <p class="text-sm text-gray-600 leading-relaxed italic">
                                "<?= $animal['description_habitat'] ?>"
                            </p>
                        </div>
                        
                      
                    </div>
                </div>
            </div>
   
    </div>
</main>

    <footer class="bg-[#1b140d] text-white pt-16 pb-8 mt-auto">
        <div class="max-w-[1200px] mx-auto px-4 md:px-10">
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-xs">© 2025 Zoo Virtuel ASSAD. Tous droits réservés.</p>
                <div class="flex gap-6 text-gray-500 text-xs">
                    <a class="hover:text-white transition-colors" href="#">Confidentialité</a>
                    <a class="hover:text-white transition-colors" href="#">Conditions</a>
                    <a class="hover:text-white transition-colors" href="#">Cookies</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>