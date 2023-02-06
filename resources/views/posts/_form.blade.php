@csrf

<label class="uppercase text-gray-700 text-xs" for="title">Titutlo</label>
<input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{ $post->title }}">

<label class="uppercase text-gray-700 text-xs" for="body">Contenido</label>
<textarea name="body" rows="5" class="rounded border-gray-200 w-full mb-4">{{ $post->body }}</textarea>

<div class="flex items-center justify-between">
  <a href="{{ route('posts.index') }}" class="bg-indigo-600">Volver</a>

  <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2 cursor-pointer">
</div>