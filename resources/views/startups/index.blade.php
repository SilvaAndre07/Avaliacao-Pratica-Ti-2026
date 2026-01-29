@extends('layouts.app')

@section('content')

{{-- Page header --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-primary mb-2">
        Startups Registradas
    </h1>
    <p class="text-gray-600">
        Registro oficial das startups associada à instituição
    </p>
</div>

{{-- Skeleton loaders --}}
<div id="skeletons"
     class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @for ($i = 0; $i < 6; $i++)
        <div class="bg-white p-5 rounded shadow animate-pulse">
            <div class="h-4 bg-gray-300 rounded w-3/4 mb-3"></div>
            <div class="h-3 bg-gray-200 rounded w-1/2 mb-4"></div>
            <div class="h-3 bg-gray-200 rounded w-full mb-2"></div>
            <div class="h-3 bg-gray-200 rounded w-5/6"></div>
        </div>
    @endfor
</div>

{{-- Startup list --}}
<div id="startupList"
     class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
</div>

<script>
let lastRenderHash = '';

async function loadStartups() {
    const list = document.getElementById('startupList');
    const skeletons = document.getElementById('skeletons');

    try {
        const response = await fetch('/api/startups', {
            headers: { 'Accept': 'application/json' }
        });

        const startups = await response.json();

        skeletons.classList.add('hidden');
        list.classList.remove('hidden');

        if (!Array.isArray(startups)) {
            list.innerHTML = `
                <p class="text-red-600 col-span-full">
                    Error loading startups.
                </p>`;
            return;
        }

        const currentHash = JSON.stringify(startups.map(s => s.id));
        if (currentHash === lastRenderHash) return;
        lastRenderHash = currentHash;

        if (startups.length === 0) {
            list.innerHTML = `
                <div class="col-span-full bg-white p-10 rounded shadow text-center">
                    <p class="text-xl font-semibold text-primary mb-2">
                        Nenhuma Startup Registrada Ainda
                    </p>
                    <p class="text-gray-600 mb-6">
                        Seja o primeiro a registrar sua Startup 🚀
                    </p>
                    <a href="/startups/create"
                       class="inline-block bg-secondary text-primary font-semibold px-6 py-3 rounded hover:opacity-90 transition">
                        Registre sua Startup
                    </a>
                </div>
            `;
            return;
        }

        list.innerHTML = startups.map(startup => `
            <div class="bg-white p-6 rounded shadow hover:shadow-md transition">
                <h2 class="text-lg font-bold text-primary mb-1">
                    ${startup.nome}
                </h2>

                <span class="inline-block mb-3 text-xs font-semibold
                             bg-secondary/20 text-primary px-2 py-1 rounded">
                    ${startup.setor}    
                </span>

                <p class="text-sm text-gray-700">
                    <strong>Email:</strong> ${startup.email_contato}
                </p>

                <p class="text-xs text-gray-500 mt-4">
                    Registrado em:
                    ${new Date(startup.data_cadastro).toLocaleDateString()}
                </p>
            </div>
        `).join('');

    } catch (error) {
        skeletons.classList.add('hidden');
        list.innerHTML = `
            <p class="text-red-600 col-span-full">
                Falha ao carregar startups.
            </p>`;
    }
}


loadStartups();
setInterval(loadStartups, 3000);

</script>

@endsection
