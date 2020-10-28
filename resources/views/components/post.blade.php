<tr {!! $attributes !!}>
    <td class="border px-4 py-2">Post #{{ $post->id }} </td>
    <td class="border px-4 py-2 w-1/2">
        <p>{{ $post->title }}</p>
        <p class="text-xs">{{ $post->subtitle }}</p>
    </td>
    <td class="border px-4 py-2">{{ $post->published_at }}</td>
    <td class="border px-4 py-2">{{ $post->comments_count }} {{ Str::plural('comment', $post->comments_count) }}</td>
</tr>