<!-- Item -->
@forelse ($users as $user)
    <tr>
        <td><a href="{{ route('users.show', $user) }}" class="text-primary fw-bold">{{ $user->id }}</a></td>
        <td>
            @if (auth()->user()->id == $user->id)
                <span class="badge px-3 rounded-pill bg-success">You</span>
            @else
                {{ $user->name }}
            @endif
        </td>
        <td>
            {{ $user->email }}
        </td>
        <td>
            <a class="btn btn-primary" href="{{ route('users.show', $user) }}">Show</a>
        </td>

    </tr>
@empty
    <tr>
        <td colspan="4">

        </td>
    </tr>
@endforelse

<!-- End of Item -->
