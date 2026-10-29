@props(['title' => null])

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title.' · ' : '' }}Perdu de vue</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <header class="bg-blue-900 text-white">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4">
            <a href="{{ route('items.index') }}"
               class="rounded text-xl font-bold focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400">
                Perdu de vue
            </a>

            <nav class="flex flex-wrap gap-1">
                @foreach ([
                    'items.index' => 'Objets',
                    'items.create' => 'Ajouter',
                    'styleguide' => 'Composants',
                ] as $route => $label)
                    <a href="{{ route($route) }}"
                       @if (request()->routeIs($route)) aria-current="page" @endif
                       @class([
                           'rounded-lg px-3 py-2 text-sm font-semibold transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400',
                           'bg-yellow-400 text-blue-950' => request()->routeIs($route),
                           'text-white hover:bg-blue-800' => ! request()->routeIs($route),
                       ])>
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8">
        @if (session('status'))
            <div role="status" class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                {{ session('status') }}
            </div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
