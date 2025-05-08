<h1>Lista de Compromisso</h1>
<hr>

<form action="{{ route('compromissos.salvar') }}" method="post">
    @csrf
    <input type="text" name="titulo" placeholder="O que você tem pra fazer?">
    <br>
    <input type="datetime-local" name="quando" placeholder="O que você tem pra fazer?">
    <br>
    <input type="submit" value="Gravar">
</form>

<hr>
Sua Lista:
<ul>
    @foreach ($compromissos as $comp)
        <li>
            {{ $comp->titulo }} {{ $comp->quando }} | <a href="{{ route('compromissos.editarForm', $comp->id) }}">Editar</a>
        </li>
    @endforeach
</ul>