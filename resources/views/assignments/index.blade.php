@php use Illuminate\Support\Carbon; @endphp
<x-main>
    <section class="section">
        <div class="container">
            <div class="level">
                <div class="level-left">
                    <h1 class="title is-1">Assignments</h1>
                </div>
                <div class="level-right">
                    <a href="{{ route('assignments.create') }}" class="button is-success">
                        <span class="icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span>Create Assignment</span>
                    </a>
                </div>
            </div>

            @if($assignments->isEmpty())
                <div class="notification is-info">
                    <p class="has-text-centered">No assignments found. <a href="{{ route('assignments.create') }}">Create your first assignment!</a></p>
                </div>
            @else
                <div class="columns is-multiline">
                    @foreach($assignments as $assignment)
                        <div class="column is-one-third">
                            <a href="{{ route('assignments.show', $assignment->id) }}">
                                <div class="card is-hoverable">
                                    <div class="card-content">
                                        <div class="media">
                                            <div class="media-content">
                                                <p class="title is-4">{{ $assignment->name }}</p>
                                                <p class="subtitle is-6 has-text-grey">
                                                    Due: {{ Carbon::parse($assignment->due_date)->format('M j, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-main>
