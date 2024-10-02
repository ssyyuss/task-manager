@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #4a4a4a; font-family: 'Poppins', sans-serif; font-weight: 600; margin: 30px 500px 30px;">Daftar Tugas</h1>

        <div class="text-center mb-4">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary" style="background-color: #5a67d8; border-radius: 0px; padding: 50px 30px, 10px;  font-size: 16px; margin: 0 495px 10px">+ Tambah Task</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center" style="color: #155724; background-color: #d4edda;margin: 0 470px 10px; border-color: #c3e6cb; border-radius: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover table-striped" style="background-color: #ffffff; border-radius: 0px; box-shadow: 0 4px 12px rgb(19, 90, 73);">
            <thead style="background-color: #f7f9fc;">
                <tr style="color: #5a67d8; text-align: center;">
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Jatuh Tempo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody style="text-align: center; color: #110f11;">
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>
                            <span class="badge" style="background-color: #49ff49
                                {{ $task->status == 'pending' ? '#f6c23e' : ($task->status == 'in_progress' ? '#49ff49' : '#1cc88a') }};
                                padding: 8px 12px; color: #ff4949; border-radius: 0px;">
                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                            </span>
                        </td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            <!-- Tombol Aksi -->
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm" style="border-radius: 0px; padding: 8px 20px; margin-right: 5px;">Detail</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm" style="border-radius: 0px; padding: 8px 20px; margin-right: 5px;">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px; padding: 8px 20px;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Styling untuk Tabel & Tombol -->
    <style>
        .btn-info {
            background-color: #3aad83;
            border: none;
        }
        .btn-warning {
            background-color: #baf91c;
            border: none;
        }
        .btn-danger {
            background-color: #ff1500;
            border: none;
        }
        .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
            opacity: 0.85;
        }
        table {
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endsection

