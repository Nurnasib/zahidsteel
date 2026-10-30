<div class="menu-row {{ $row->status ? '' : 'is-hidden' }}">
    <span class="drag-handle"><i class="fa fa-arrows" aria-hidden="true"></i></span>
    <span class="menu-title">{{ $row->title }}</span>
    <span class="menu-link">
        @if($row->page)
            <i class="fa fa-file-text-o"></i> {{ $row->page->title }}
        @else
            <i class="fa fa-link"></i> {{ $row->url }}
        @endif
        @if($row->new_tab) <span class="label label-default">new tab</span> @endif
        @if(! $row->status) <span class="label label-warning">hidden</span> @endif
    </span>
    <span class="menu-actions">
        <a href="#" data-toggle="modal" data-target="#editRowModal{{ $row->id }}" class="btn btn-warning btn-xs">Edit</a>
        <form action="{{ route('admin.menu.delete', $row->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-xs"
                    onclick="return confirm('{{ $row->parent_id ? 'Delete this menu item?' : 'Delete this menu item and all its submenus?' }}')">Delete</button>
        </form>
    </span>
</div>
