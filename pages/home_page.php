<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Zoo Virtuel ASSAD</title>

<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#36e27b",
                        "background-light": "#f6f8f7",
                        "background-dark": "#112117",
                        "surface-dark": "#1c2620",
                        "surface-light": "#ffffff",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem", 
                        "lg": "1.5rem", 
                        "xl": "2rem", 
                        "2xl": "2.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style>
        /* Custom scrollbar hiding for horizontal scrolls */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background-light dark:bg-background-dark text-[#111714] dark:text-white font-display overflow-x-hidden antialiased">
<div class="relative flex h-full min-h-screen w-full flex-col pb-24">
<!-- Top App Bar -->
<header class="flex items-center p-4 justify-between sticky top-0 z-50 bg-background-light/90 dark:bg-background-dark/90 backdrop-blur-md">
<div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-surface-dark/10 dark:bg-white/10 text-inherit">
<span class="material-symbols-outlined">menu</span>
</div>
<h2 class="text-lg font-bold leading-tight tracking-tight flex-1 text-center">Zoo Virtuel ASSAD</h2>
<button class="flex size-10 shrink-0 cursor-pointer items-center justify-center rounded-full bg-surface-dark/10 dark:bg-white/10 text-inherit transition-transform active:scale-95">
<span class="material-symbols-outlined">notifications</span>
</button>
</header>
<!-- Hero Section -->
<section class="px-4 py-2 @container">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat rounded-2xl items-center justify-end p-6 pb-10 relative overflow-hidden" data-alt="Immersive view of African savannah with acacia trees at sunset" style='background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(17, 33, 23, 0.4) 50%, rgba(17, 33, 23, 0.9) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBos4WNFGdeKtAptGs9dKpBHWAQCNCBYSNpjeZBreecPSE4qa3DWKCqKFnia1X0l-XW-gvhKYAQzTHynutz6MRqpKnC-S7GGdl52z07FtbH2S526xz9n7lmP6Ew0MEyHoRant1zfCHYVJ_iTFVTHOkMDusdu7ijcH7q1Vl6qzAZHJc8w9HuU7EoJwNKTlcE_qhn5hA7k9R4oRIRxkayv8AH5RHIhhbfOhnIivqJPHWouQkSrDkNkR5R6aX36RNjiuJHEn_HKzfWo8Y");'>
<div class="flex flex-col gap-3 text-center z-10 max-w-lg">
<span class="inline-flex items-center justify-center px-3 py-1 bg-primary/20 backdrop-blur-sm border border-primary/30 rounded-full text-primary text-xs font-bold uppercase tracking-wider w-fit mx-auto mb-1">
                        CAN 2025 Official
                    </span>
<h1 class="text-white text-4xl font-black leading-[1.1] tracking-tight">
                        Explore African Wildlife
                    </h1>
<p class="text-gray-200 text-base font-normal leading-relaxed max-w-xs mx-auto">
                        Celebrate CAN 2025 with Asaad the Atlas Lion and discover nature's majesty.
                    </p>
</div>
<div class="flex flex-row gap-3 w-full justify-center z-10 mt-2">
<button class="flex-1 max-w-[180px] cursor-pointer items-center justify-center rounded-full h-12 px-5 bg-primary text-[#112117] text-sm font-bold tracking-wide hover:bg-primary/90 transition-colors shadow-lg shadow-primary/20">
                        Explore Animals
                    </button>
<button class="flex-1 max-w-[180px] cursor-pointer items-center justify-center rounded-full h-12 px-5 bg-white/10 backdrop-blur-md border border-white/20 text-white text-sm font-bold tracking-wide hover:bg-white/20 transition-colors">
                        Guided Tours
                    </button>
</div>
</div>
</section>
<!-- Quick Categories -->
<section class="py-6 overflow-hidden">
<div class="px-4 mb-3 flex justify-between items-center">
<h3 class="text-lg font-bold">Categories</h3>
<span class="text-primary text-sm font-medium">View all</span>
</div>
<div class="flex gap-4 overflow-x-auto px-4 pb-2 hide-scrollbar">
<!-- Item 1 -->
<div class="flex flex-col items-center gap-2 min-w-[72px]">
<div class="w-[72px] h-[72px] rounded-full p-1 border-2 border-primary/50">
<div class="w-full h-full rounded-full bg-cover bg-center" data-alt="Close up of a lion face" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDhxoujbPm9JHkIVGQDxYQAd8l4rFOmwKRr_XQv9muaGVPMZO3ssHPtmyaRMhA9mJQYMesrqFAHZogmjBYA8QXb2lXA-766Tj79yHkrf0WxGl3RWQ_XAkt_LoiR5POOKwT-PNV_0pLOKmSqS2ZmyBVYyk4FpYw1E93NLodEyMvikSZJuqub8BxJEKrWlGrhKL4boNnv2Mj-t_F3hMqOxc0pN7V4FoR9Z3CDTkoU3bOB0DTYMIHzlRVxQAWlQZ_tU9T0DuH785FYGeo');"></div>
</div>
<span class="text-xs font-semibold">Lions</span>
</div>
<!-- Item 2 -->
<div class="flex flex-col items-center gap-2 min-w-[72px]">
<div class="w-[72px] h-[72px] rounded-full p-1 border-2 border-transparent bg-surface-dark dark:bg-surface-dark">
<div class="w-full h-full rounded-full bg-cover bg-center" data-alt="Elephant walking in savanna" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDDcRJ0wk4Inhv8BPLCW12oIPEuf5SIV1n4U8ImRRB4xpYM_QaMO4qYS6Da5Mb3hAICHSQxP9fvxvXf83ucbwvKoKRJsjVvcVvOK1XfEYr6FoSRWBOoHglNGoFjr96mESvCO8j2GQEZLOihoqm6Mps5jnyTruPzt-5qqa_pbFZfQf4yA6kBKq5GsEtnxDbHBGLf7C1JXcpCIOgA6pT5bGoiP_RUC6idFTcx7pCNmrmKvHoFMMYWA87ObgOLshErv2oosjC7ZzZ6R7s');"></div>
</div>
<span class="text-xs font-semibold opacity-80">Elephants</span>
</div>
<!-- Item 3 -->
<div class="flex flex-col items-center gap-2 min-w-[72px]">
<div class="w-[72px] h-[72px] rounded-full p-1 border-2 border-transparent bg-surface-dark dark:bg-surface-dark">
<div class="w-full h-full rounded-full bg-cover bg-center" data-alt="Giraffe neck and head" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC-Afxaa_X7gJg1DtsubLulp-eBqGzCUK3txr-GyYpP6pKkKM44swAZ38MJ0GT1sEh7JW0xLA8zK1T13hd4Uds1ZWxrV-HDku_xx1EG-aTzwxw-z6Mj6uwIbq2cJCUgSj2HJPmuWXSXD0F93vR5tnx-xDFjilpmr6JAydbVMRe2uaBcleJg2NmzHjevK31Ingj5PC9H3JC9oAPWQr1rf08RNsh86qO8U30TwdjqDuYqX2HI7EPnxovgDfabOzewQuPgjJlhzqUYGpM');"></div>
</div>
<span class="text-xs font-semibold opacity-80">Giraffes</span>
</div>
<!-- Item 4 -->
<div class="flex flex-col items-center gap-2 min-w-[72px]">
<div class="w-[72px] h-[72px] rounded-full p-1 border-2 border-transparent bg-surface-dark dark:bg-surface-dark">
<div class="w-full h-full rounded-full bg-cover bg-center" data-alt="Zebra stripes pattern" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCcMe_xJrGl_bGiCZO9T25bKi3tmWmOlVylBvdUqhl4ghp24ugHRY211InQyWMIawKNVeDH6SuECuua-Uau39BRBtn4BHTVIZv5PBrg8L3pwgxkIQ4e3Pb9oUF8T--YfbCpZPfuXQ39y-RNOAZW4T-BZeEOnCr25Gnw9El1DRm5dbc0k6o7OlY3kK152bB5kPXX74laz7NuqpDtaTku213oM4CfgzHBvVJLONUjRrXqhIzWTUvUGqzxne8HN9_LSriTHHClVD_X4HE');"></div>
</div>
<span class="text-xs font-semibold opacity-80">Zebras</span>
</div>
<!-- Item 5 -->
<div class="flex flex-col items-center gap-2 min-w-[72px]">
<div class="w-[72px] h-[72px] rounded-full p-1 border-2 border-transparent bg-surface-dark dark:bg-surface-dark flex items-center justify-center text-primary/50">
<span class="material-symbols-outlined text-3xl">add</span>
</div>
<span class="text-xs font-semibold opacity-80">More</span>
</div>
</div>
</section>
<!-- Feature Section: Meet Asaad -->
<section class="px-4 py-6">
<div class="bg-surface-dark rounded-2xl p-6 relative overflow-hidden group">
<!-- Background Pattern or subtle glow -->
<div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-3xl -mr-10 -mt-10"></div>
<div class="flex flex-col gap-6 relative z-10">
<div class="flex flex-col gap-3">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-primary text-xl">verified</span>
<span class="text-primary text-xs font-bold uppercase tracking-wider">Spotlight</span>
</div>
<h2 class="text-white text-3xl font-black leading-tight">
                            Meet Asaad <br/>The Atlas Lion
                        </h2>
<p class="text-gray-300 text-sm font-normal leading-relaxed max-w-sm">
                            The legendary symbol of the Atlas Mountains and the spirit of CAN 2025. Discover his origins and what he represents.
                        </p>
</div>
<div class="w-full aspect-video rounded-xl bg-cover bg-center relative shadow-xl" data-alt="Illustration of a majestic Atlas Lion roaring on a rock" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAlyqn5ByPuW41XhgEXCW98A3as6CHRXrJuA6Ac40_uqA2r6oKB6_HdsxCvAVghLcUQ3aJ0Tm3Mln9SrLPk7ewEqwqq2MbmUMtjSGmekENemzHvXNaP1ixsoqEi1QV7MW0NQd9mTouJZfRZk4VYJifQiWYwex1EEsIlg6MJslTgRfYRDjIt98kFfo1DgGrkSzq3dMussaQBiWYL_j8G0IoDFygz6GnXvp6JPB0QZFMRoYWpWGwra-Fj9XENEjgmZCO_8M_k8lDhOw4");'>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-xl"></div>
<div class="absolute bottom-3 left-3 flex gap-2">
<span class="px-2 py-1 bg-black/50 backdrop-blur-md rounded-md text-[10px] text-white font-medium border border-white/10">Endangered</span>
<span class="px-2 py-1 bg-black/50 backdrop-blur-md rounded-md text-[10px] text-white font-medium border border-white/10">Symbol</span>
</div>
</div>
<div class="flex gap-3 mt-1">
<button class="flex-1 h-12 flex items-center justify-center bg-primary text-[#112117] text-sm font-bold rounded-full transition-transform active:scale-95">
                            Meet Asaad
                        </button>
<button class="h-12 w-12 flex items-center justify-center rounded-full bg-[#29382f] text-primary border border-primary/20">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
<!-- Small Feature Grid inside card -->
<div class="grid grid-cols-2 gap-3 mt-2">
<div class="bg-black/20 rounded-lg p-3 flex flex-col gap-1 border border-white/5">
<span class="material-symbols-outlined text-primary text-xl mb-1">pets</span>
<h3 class="text-white text-xs font-bold">Strength</h3>
<p class="text-gray-400 text-[10px]">Symbol of power</p>
</div>
<div class="bg-black/20 rounded-lg p-3 flex flex-col gap-1 border border-white/5">
<span class="material-symbols-outlined text-primary text-xl mb-1">sports_soccer</span>
<h3 class="text-white text-xs font-bold">CAN 2025</h3>
<p class="text-gray-400 text-[10px]">Official Mascot</p>
</div>
</div>
</div>
</div>
</section>
<!-- Carousel: Did You Know? -->
<section class="py-6 pb-8">
<h2 class="text-lg font-bold px-4 mb-4 flex items-center gap-2">
                Did You Know?
                <span class="material-symbols-outlined text-primary text-lg">lightbulb</span>
</h2>
<div class="flex overflow-x-auto hide-scrollbar px-4 gap-4 snap-x snap-mandatory">
<!-- Card 1 -->
<div class="min-w-[240px] snap-center flex flex-col gap-3 rounded-xl bg-surface-dark p-3 border border-white/5 hover:border-primary/30 transition-colors">
<div class="w-full aspect-[4/3] bg-cover bg-center rounded-lg" data-alt="Lion sleeping under a tree shade" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAxgEw8kDys86-4D8Cdu1RqISWSHbwlMzGUXWP7n93jXy1TbOx2j82CGOR6N8NYgRbVuiWN5y_raRLjGZI3w0c-8Ir-LJw-BXTq0iCSIcTl7L50-V9q-UrV4W6ePMKSnI8DDvtgAuuPlsvxIxUHJioWJ_t9WKBNFre3MsPdMsXdNJW-qdcDtC9lX2rE09UZRSx2-HsWEvkHlaNb27qar1ZKCSq4jvWWmp7FPZkbbvcx_x4pVT0jgRlJapt-pW4aP1Rw6GH0i7RnGEA");'></div>
<div class="px-1 pb-1">
<h3 class="text-white text-sm font-bold leading-tight mb-1">Lions Sleep 20h</h3>
<p class="text-gray-400 text-xs">Lions are the laziest of the big cats, spending most of their day sleeping.</p>
</div>
</div>
<!-- Card 2 -->
<div class="min-w-[240px] snap-center flex flex-col gap-3 rounded-xl bg-surface-dark p-3 border border-white/5 hover:border-primary/30 transition-colors">
<div class="w-full aspect-[4/3] bg-cover bg-center rounded-lg" data-alt="Elephant herd walking together" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBxsOKkTJEYyoCUjE8bprpzo5q3GT12d_QP6IUaPrL0d-AX66PMUxrjrcTl8SAz_GrF-sY6eW_AcOpxJMu-vFIw3Dh-VMD3woo5PMLAqCMU0GwDaYwp0hgvr1uWDxDoYAgs9YsxBteaNrbtqIXrd-6fh5i5DCkcPElLEeTSzp0njgUDM3ZivZY4zuDgLf9WRcNMo__7GECAyNJnBdK-BYIZhMa31lkCTEGZUE7V4VTvDkKK90T9ZBZ2ZgZXSKPvsvu2GagPpzRpZGI");'></div>
<div class="px-1 pb-1">
<h3 class="text-white text-sm font-bold leading-tight mb-1">Elephants Remember</h3>
<p class="text-gray-400 text-xs">Elephants have incredible memories and can recognize friends after decades.</p>
</div>
</div>
<!-- Card 3 -->
<div class="min-w-[240px] snap-center flex flex-col gap-3 rounded-xl bg-surface-dark p-3 border border-white/5 hover:border-primary/30 transition-colors">
<div class="w-full aspect-[4/3] bg-cover bg-center rounded-lg" data-alt="Close up of zebra stripes" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB9_1Gz53rhiV_dO8-iojzx2Kuf9Zn8quKN7N0AUZS4y5cm-zhRKchs8wrqL3ur7JwLIdH0Wsyz1Mvd4J6ciHMsR63Ogu90GYzyxwBGyc0KxiYLf1YkCZyBIM8GIXmtYS2IVVQ6No95izHiQLPMsnh94XlQ_DlIeKMMP4Ev8wNQf6Ia5itRK7uRLIPPzHT6MQ-Rz75WrIOakk3RjtNtvEW36qphZspJlKd-yEQY4os9z7M_6WB0EYRNx-INljylwRXmELiB10jmUWM");'></div>
<div class="px-1 pb-1">
<h3 class="text-white text-sm font-bold leading-tight mb-1">Unique Stripes</h3>
<p class="text-gray-400 text-xs">Like human fingerprints, no two zebras have the same stripe pattern.</p>
</div>
</div>
</div>
</section>
<!-- Floating Bottom Navigation -->
<nav class="fixed bottom-6 left-4 right-4 h-16 bg-[#1c2620]/90 dark:bg-[#1c2620]/90 backdrop-blur-xl rounded-full flex items-center justify-evenly border border-white/10 shadow-2xl z-50 max-w-[480px] mx-auto">
<button class="flex flex-col items-center justify-center w-12 h-full text-primary gap-1">
<span class="material-symbols-outlined fill-1">home</span>
<span class="text-[10px] font-medium">Home</span>
</button>
<button class="flex flex-col items-center justify-center w-12 h-full text-gray-400 hover:text-white transition-colors gap-1">
<span class="material-symbols-outlined">map</span>
<span class="text-[10px] font-medium">Map</span>
</button>
<!-- AR Camera Button (Center) -->
<button class="flex items-center justify-center w-12 h-12 -mt-8 bg-primary text-[#112117] rounded-full shadow-lg shadow-primary/40 border-4 border-background-dark transform transition-transform active:scale-90">
<span class="material-symbols-outlined text-2xl">view_in_ar</span>
</button>
<button class="flex flex-col items-center justify-center w-12 h-full text-gray-400 hover:text-white transition-colors gap-1">
<span class="material-symbols-outlined">confirmation_number</span>
<span class="text-[10px] font-medium">Tickets</span>
</button>
<button class="flex flex-col items-center justify-center w-12 h-full text-gray-400 hover:text-white transition-colors gap-1">
<span class="material-symbols-outlined">person</span>
<span class="text-[10px] font-medium">Profile</span>
</button>
</nav>
</div>
</body></html>