@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #4a4a4a; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Detail Tugas</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="background-color: #ecf0ff; padding: 40px; border-radius: 5px; box-shadow: 0 8px 16px rgb(0, 51, 255); max-width: 700px; margin: auto;">
            @csrf
            @method('PUT')

            <div class="form-group mb-4">
                <label for="title" style="font-weight: bold; color: #333;">Judul</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" style="border-radius: 10px; padding: 12px; border: 1px solid #ddd;" placeholder="Masukkan judul task" required>
            </div>

            <div class="form-group mb-4">
                <label for="description" style="font-weight: bold; color: #333;">Deskripsi</label>
                <textarea name="description" class="form-control" id="description" rows="5" style="border-radius: 10px; padding: 12px; border: 1px solid #ddd;" placeholder="Deskripsikan task" required>{{ $task->description }}</textarea>
            </div>

            <div class="form-group mb-4">
                <label for="status" style="font-weight: bold; color: #333;">Status</label>
                <select name="status" id="status" class="form-control" style="border-radius: 10px; padding: 15px; border: 1px solid #ddd;" required>
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="due_date" style="font-weight: bold; color: #333;">Tanggal Jatuh Tempo</label>
                <input type="date" name="due_date" class="form-control" id="due_date" value="{{ $task->due_date }}" style="border-radius: 10px; padding: 12px; border: 1px solid #ddd;" required>
            </div>

            <div class="form-group mb-4">
                <label for="user_id" style="font-weight: bold; color: #333;">User ID</label>
                <input type="text" name="user_id" class="form-control" id="user_id" value="{{ $task->user_id }}" style="border-radius: 10px; padding: 12px; border: 1px solid #ddd;" placeholder="Masukkan User ID" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success" style="background-color: #5cb85c; border: none; padding: 12px 50px; border-radius: 0px; font-size: 16px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); transition: background-color 0.3s ease;">
                    Kembali
                </button>
            </div>
        </form>
    </div>

    <style>
        .form-control:focus {
            border-color: #5cb85c;
            box-shadow: 0 0 8px rgba(92, 184, 92, 0.3);
        }
        .btn-success:hover {
            background-color: #4cae4c;
        }
    </style>
@endsection
