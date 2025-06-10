@php use Carbon\Carbon; @endphp
<x-main>
    <section class="section">
        <div class="container">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ route('assignments.index') }}">Assignments</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ $assignment->name }}</a></li>
                </ul>
            </nav>

            <div class="level">
                <div class="level-left">
                    <h1 class="title is-1">{{ $assignment->name }}</h1>
                </div>
                <div class="level-right">
                    <div class="buttons">
                        <a href="{{ route('assignments.edit', $assignment->id) }}" class="button is-warning">
                            <span class="icon">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span>Edit</span>
                        </a>
                        <form method="POST" action="{{ route('assignments.destroy', $assignment->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button is-danger" onclick="return confirm('Are you sure you want to delete this assignment?')">
                                <span class="icon">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span>Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h2 class="subtitle is-3">Assignment Details</h2>
                            <div class="content">
                                <h3 class="label">Description</h3>
                                <p>{{ $assignment->description }}</p>
                                <div class="field">
                                    <label class="label">Due Date</label>
                                    <div class="control">
                                        @php
                                            $dueDate = Carbon::parse($assignment->due_date);
                                        @endphp
                                        <p>{{ $dueDate->format('l, F j, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>
