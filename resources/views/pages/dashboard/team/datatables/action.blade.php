<div class="flex">
    <a href="{{ route('team.show', $data->id) }}" type="button"
        class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded mb-5 mr-6">
        <span>Detail</span>
    </a>
    <a href="{{ route('team.edit', $data->id) }}" type="button"
        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded mb-5 mr-6">
        <span>Edit</span>
    </a>
    <form onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')" method="POST"
        action="{{ route('team.destroy', $data) }}">
        @method('DELETE')
        @csrf
        <button type="submit"
            class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded mb-5 cursor-pointer">
            Hapus
        </button>
    </form>
</div>
 