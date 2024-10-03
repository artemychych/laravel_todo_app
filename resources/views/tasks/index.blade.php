<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
</head>
<body>
    <h1>ToDo List</h1>
    
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="New Task" required>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit">{{ $task->completed ? 'Undo' : 'Complete' }}</button>
                </form>
                {{ $task->title }}
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
