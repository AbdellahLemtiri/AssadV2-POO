<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Rate Your Adventure</title>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Theme Configuration -->
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#36e27b",
                        "background-light": "#f6f8f7",
                        "background-dark": "#112117",
                        "surface-dark": "#1c2e24",
                        "surface-light": "#ffffff",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"],
                        "body": ["Noto Sans", "sans-serif"],
                    },
                    borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
                },
            },
        }
    </script>
<style>
        /* Custom scrollbar hide for horizontal scrolling */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
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
<body class="font-display bg-background-light dark:bg-background-dark text-slate-900 dark:text-white antialiased selection:bg-primary selection:text-background-dark">
<div class="relative flex h-auto min-h-screen w-full max-w-md mx-auto flex-col overflow-x-hidden shadow-2xl">
<!-- Header -->
<div class="flex items-center justify-between p-4 pb-2 sticky top-0 z-10 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md">
<button class="flex size-10 shrink-0 items-center justify-center rounded-full hover:bg-black/5 dark:hover:bg-white/10 transition-colors">
<span class="material-symbols-outlined text-2xl">arrow_back_ios_new</span>
</button>
<h2 class="text-lg font-bold leading-tight tracking-[-0.015em] text-center">Rate Your Adventure</h2>
<div class="size-10"></div> <!-- Spacer for centering title -->
</div>
<div class="flex flex-col gap-6 p-4 pb-24">
<!-- Context Card -->
<div class="flex items-stretch justify-between gap-4 rounded-xl bg-surface-light dark:bg-surface-dark p-3 shadow-sm border border-slate-100 dark:border-white/5">
<div class="w-24 shrink-0 bg-center bg-no-repeat bg-cover rounded-lg" data-alt="Lion resting in savanna grass during sunset" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAslVxVJ5L_jfoNj9-R_4aV9_Isl5ZQgQfpNLLt2_r5eC0qgU2hBNEse3Al6a4IVpwSODxzcZirCzgRTeheWo83B8oJHWhRfHbTaMq0UGhcjZ9xtO1Nd2w9d2zv22FMu6gXtCa7DOeY9AgPX7S76jqD-62BDSsyFee8YIevkbLmBtyPKqFm8sWEHLCS5DFyBNC-cTgqiHPOcyDqq78QQxp6gds4W8Idc7dEJ7nS-TTC-fPWWncH1lAS-ch1v2ShQWgMi8MZjMVeC7g");'></div>
<div class="flex flex-1 flex-col justify-center gap-1">
<p class="text-sm font-medium text-primary uppercase tracking-wider">Verified Tour</p>
<p class="text-base font-bold leading-tight">Savanna Sunset Safari</p>
<div class="flex items-center gap-1 text-slate-500 dark:text-slate-400 text-xs">
<span class="material-symbols-outlined text-[16px]">schedule</span>
<span>2 hours • Guided</span>
</div>
</div>
</div>
<!-- Rating Section -->
<div class="flex flex-col items-center gap-4 py-2">
<h2 class="text-[28px] font-bold leading-tight text-center">How was your Safari?</h2>
<p class="text-slate-600 dark:text-slate-300 text-sm font-normal leading-normal text-center px-4">
                    Your feedback helps us protect wildlife and improve future tours.
                </p>
<div class="flex items-center justify-center gap-3 mt-2">
<!-- Rating Icons (Using 'pets' for paw prints) -->
<button class="group transition-transform hover:scale-110 focus:outline-none">
<span class="material-symbols-outlined text-4xl text-primary fill-1" style="font-variation-settings: 'FILL' 1;">pets</span>
</button>
<button class="group transition-transform hover:scale-110 focus:outline-none">
<span class="material-symbols-outlined text-4xl text-primary fill-1" style="font-variation-settings: 'FILL' 1;">pets</span>
</button>
<button class="group transition-transform hover:scale-110 focus:outline-none">
<span class="material-symbols-outlined text-4xl text-primary fill-1" style="font-variation-settings: 'FILL' 1;">pets</span>
</button>
<button class="group transition-transform hover:scale-110 focus:outline-none">
<span class="material-symbols-outlined text-4xl text-primary fill-1" style="font-variation-settings: 'FILL' 1;">pets</span>
</button>
<button class="group transition-transform hover:scale-110 focus:outline-none">
<span class="material-symbols-outlined text-4xl text-slate-300 dark:text-slate-600 hover:text-primary transition-colors">pets</span>
</button>
</div>
<p class="text-primary font-medium text-sm">Wildly Awesome!</p>
</div>
<!-- Feedback Form -->
<div class="flex flex-col gap-3">
<label class="text-sm font-bold ml-1" for="review-text">Your Experience</label>
<textarea class="w-full rounded-xl bg-surface-light dark:bg-surface-dark border-none p-4 text-base placeholder:text-slate-400 focus:ring-2 focus:ring-primary resize-none shadow-inner" id="review-text" placeholder="Tell us about your favorite animal encounter..." rows="4"></textarea>
</div>
<!-- Photo Upload Section -->
<div class="flex flex-col gap-3">
<div class="flex justify-between items-center px-1">
<label class="text-sm font-bold">Add Safari Photos</label>
<span class="text-xs text-slate-500">Optional</span>
</div>
<div class="flex gap-3 overflow-x-auto no-scrollbar pb-2">
<!-- Add Button -->
<button class="flex flex-col items-center justify-center shrink-0 size-24 rounded-xl border-2 border-dashed border-slate-300 dark:border-slate-600 bg-transparent text-slate-400 hover:border-primary hover:text-primary transition-colors">
<span class="material-symbols-outlined text-2xl">add_a_photo</span>
<span class="text-[10px] font-bold uppercase mt-1">Add</span>
</button>
<!-- Existing Image 1 -->
<div class="relative shrink-0 size-24 rounded-xl overflow-hidden group">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Close up of a zebra pattern" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBhhfbfUdqwKT_DVlyxHj0oo9s8H1HEMY-IWY-Az9Vdl-qWOdsT3TE5gRL_aUvX9c20LUHgTjOqrRwyeKY1wqggaeNq7CRetW83LMCiHxNjekHY0-7e1iGxoCf7YFTfid-pyXwOe4rVBqpldu9tWEYqBhYWFHZOWRX65Ctx5NAHzyGQip1eTIRT6OYuOEymMsqDflYFKQyjV_l-6s1yoiOn2jIjnL6UInC-0gX2ORWp8y-AOP3shZdI-oR9Obwfx7EN1cR9joBk5og");'></div>
<button class="absolute top-1 right-1 bg-black/50 text-white rounded-full p-0.5 opacity-0 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-sm">close</span>
</button>
</div>
<!-- Existing Image 2 -->
<div class="relative shrink-0 size-24 rounded-xl overflow-hidden group">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Giraffe standing tall among acacia trees" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDwhNfsgquGFLMrvQO-9b8PtKKVt8mxJVPtExeA8kDEjYXEAj06WZU91TILAJtnlSLMs1ud1F61NxUg5O0hcpDDVbFR7JvEz9p3TqMdy5xhEsBOvzQnOMrxtYRCAbIj076hJFYT3hUBttnDXckb6jmJ-gf5K2FUq_THxbRKi0zQtdM0umB4yAZoOZ2qzETeRBZcxdX7PRZETfjbbz84aIy9Z6h7yH4OxN4y8IFF48q1AFSMrtYEIwk2KrggKohbxlch5zxihd0okIQ");'></div>
<button class="absolute top-1 right-1 bg-black/50 text-white rounded-full p-0.5 opacity-0 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-sm">close</span>
</button>
</div>
</div>
</div>
<!-- Submit Button (Sticky Bottom) -->
<div class="fixed bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-background-light via-background-light to-transparent dark:from-background-dark dark:via-background-dark dark:to-transparent z-20 flex justify-center max-w-md mx-auto">
<button class="w-full bg-primary hover:bg-green-400 text-background-dark font-bold text-base h-12 rounded-xl shadow-[0_4px_14px_0_rgba(54,226,123,0.39)] transition-all transform active:scale-95 flex items-center justify-center gap-2">
<span>Share Experience</span>
<span class="material-symbols-outlined text-lg">send</span>
</button>
</div>
</div>
</div>
</body></html>