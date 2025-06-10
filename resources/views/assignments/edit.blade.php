@php use Illuminate\Support\Carbon; @endphp
<x-main>
    <section class="section">
        <div class="container">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ route('assignments.index') }}">Assignments</a></li>
                    <li><a href="{{ route('assignments.show', $assignment->id) }}">{{ $assignment->name }}</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Edit</a></li>
                </ul>
            </nav>

            <h1 class="title is-1">Edit Assignment</h1>

            <div class="columns">
                <div class="column">
                    <form method="POST" action="{{ route('assignments.update', $assignment->id) }}" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="field">
                            <label class="label" for="name">Assignment Name</label>
                            <div class="control">
                                <input
                                    class="input @error('name') is-danger @enderror"
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $assignment->name) }}"
                                    placeholder="Enter assignment name"
                                    required
                                >
                            </div>
                            @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label" for="description">Description</label>
                            <div class="control">
                                <textarea
                                    class="textarea @error('description') is-danger @enderror"
                                    id="description"
                                    name="description"
                                    rows="6"
                                    placeholder="Enter assignment description"
                                >{{ old('description', $assignment->description) }}</textarea>
                            </div>
                            @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label" for="due_date">Due Date</label>
                            <div class="control">
                                <input
                                    class="input @error('due_date') is-danger @enderror"
                                    type="date"
                                    id="due_date"
                                    name="due_date"
                                    value="{{ old('due_date', Carbon::parse($assignment->due_date)->format('Y-m-d')) }}"
                                    required
                                >
                            </div>
                            @error('due_date')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-success">
                                    <span class="icon">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span>Update Assignment</span>
                                </button>
                            </div>
                            <div class="control">
                                <a href="{{ route('assignments.show', $assignment->id) }}" class="button is-light">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-main>
