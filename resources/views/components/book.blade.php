<tr {!! $attributes !!}>
    <td class="border px-4 py-2">Book #{{ $book->id }}</td>
    <td class="border px-4 py-2 w-1/2">
        <p>{{ $book->title }}</p>
        <p class="text-xs">{{ $book->description }}</p>
    </td>
    <td class="border px-4 py-2">{{ $book->released_at }}</td>
    <td class="border px-4 py-2">{{ $book->comments_count }} {{ Str::plural('comment', $book->comments_count) }}</td>
</tr>