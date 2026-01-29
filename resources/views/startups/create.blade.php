@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Registre sua Startup</h1>

    <form id="startupForm" class="space-y-4">
        <div>
            <label class="block text-sm font-medium">Nome</label>
            <input type="text" name="nome" required
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Setor</label>
            <input type="text" name="setor" required
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Email de contato</label>
            <input type="email" name="email_contato" required
                   class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Enviar
        </button>

        <p id="message" class="text-sm mt-3"></p>
    </form>
</div>

<script>
document.getElementById('startupForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = e.target;
    const message = document.getElementById('message');

    const data = {
        nome: form.nome.value,
        setor: form.setor.value,
        email_contato: form.email_contato.value
    };

    try {
        const response = await fetch('/api/startups', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (!response.ok) {
            message.textContent = 'Erro ao salvar startup';
            message.className = 'text-red-600';
            return;
        }

        message.textContent = 'Startup registrada com sucesso!';
        message.className = 'text-green-600';

        form.reset();
    } catch (error) {
        message.textContent = 'Erro Inesperado';
        message.className = 'text-red-600';
    }
});
</script>
@endsection
