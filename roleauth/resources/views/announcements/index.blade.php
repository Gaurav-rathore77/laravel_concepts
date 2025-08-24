@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Announcements</h2>

    @foreach($announcements as $announcement)
        <div class="card mb-3 {{ in_array($announcement->id, $reads) ? 'bg-light' : 'bg-white' }}">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $announcement->title }}
                    @if($announcement->is_sticky)
                        <span class="badge bg-danger">Sticky</span>
                    @endif
                </h5>
                <p class="card-text">{{ $announcement->body }}</p>
                <small class="text-muted">
                    Starts: {{ $announcement->starts_at ?? 'Now' }} | 
                    Ends: {{ $announcement->ends_at ?? 'No limit' }}
                </small>

                <button class="btn btn-sm btn-primary mark-read-btn mt-2"
                    data-id="{{ $announcement->id }}"
                    {{ in_array($announcement->id, $reads) ? 'disabled' : '' }}>
                    {{ in_array($announcement->id, $reads) ? 'Read' : 'Mark as Read' }}
                </button>
            </div>
        </div>
    @endforeach
</div>

<script>
document.querySelectorAll('.mark-read-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        let id = this.dataset.id;
        fetch(`/announcements/${id}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        }).then(res => res.json())
          .then(data => {
              if(data.ok) {
                  this.textContent = 'Read';
                  this.disabled = true;
                  this.closest('.card').classList.add('bg-light');
              }
          });
    });
});
</script>
@endsection
