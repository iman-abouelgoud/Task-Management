<form action="{{ $action }}" method="POST">
    @csrf
    @if(isset($task))
        @method('PUT')
    @endif

    <div class="form-group mt-5">
        <input name="name" type="text" class="form-control" value="{{ old('name', $task->name ?? '') }}" placeholder="{{ old('name') ? '' : 'Task Name'}}" id="name" required>
        @error('name')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-4">
        <input name="priority" type="number" class="form-control" value="{{ old('priority', $task->priority ?? '') }}" placeholder="{{ old('priority') ? '' : 'Priority'}}" min="1" max="100" required>
        @error('priority')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-4">
        <select name="project_id" class="form-select" id="project">
            <option value="" selected>Select Project</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}"
                    {{ old('project_id', isset($task) ? $task->project_id : '') == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
        @error('project_id')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-4">
        <button style="float: right" type="submit" class="btn btn-primary btn-sm"> {{ $button_text }} </button>
    </div>
</form>
