<tr {!! $attributes !!}>
    <td class="border px-4 py-2">Video #{{ $video->id }}</td>
    <td class="border px-4 py-2 w-1/2">
        <p>{{ $video->name }}</p>
        <p class="text-xs">{{ $video->description }}</p>
    </td>
    <td class="border px-4 py-2">{{ $video->published_at }}</td>
    <td class="border px-4 py-2">{{ $video->comments_count }} {{ Str::plural('comment', $video->comments_count) }}</td>
</tr>