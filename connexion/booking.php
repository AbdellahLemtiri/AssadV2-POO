

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attente d'approbation - AS-SAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body class="bg-[#fcfaf8] h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-white rounded-[2rem] shadow-2xl p-10 text-center border border-gray-100">
        
        <div class="w-24 h-24 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-8">
            <span class="material-symbols-outlined text-amber-500 text-6xl animate-pulse">
                hourglass_empty
            </span>
        </div>

        <h1 class="text-3xl font-black text-[#1b140d] mb-4 tracking-tight">
            Compte en attente
        </h1>

        <p class="text-gray-600 mb-8 leading-relaxed text-lg">
            Merci de nous avoir rejoint ! Votre profil de <strong></strong> est en cours de validation par notre administration.
        </p>

        <div class="bg-blue-50/50 rounded-2xl p-5 mb-10 flex items-start gap-4 text-left border border-blue-100">
            <span class="material-symbols-outlined text-blue-500">info</span>
            <p class="text-blue-900 text-sm font-medium">
                Cette étape prend généralement <strong>24h à 48h</strong>. Vous recevrez un accès complet dès que votre compte sera approuvé.
            </p>
        </div>

        <div class="space-y-4">
            <a href="../index.php" 
               class="w-full py-4 bg-[#1b140d] text-white font-bold rounded-2xl hover:bg-black transition-all flex items-center justify-center gap-3 shadow-lg shadow-black/10">
                <span class="material-symbols-outlined">logout</span>
                Se déconnecter
            </a>
            
            <p class="text-xs text-gray-400">
                Besoin d'aide ? <a href="mailto:support@as-sad-zoo.com" class="text-amber-600 hover:underline font-bold">Contactez l'administration</a>
            </p>
        </div>
    </div>

</body>
</html>