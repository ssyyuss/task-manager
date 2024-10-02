@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4" style="color: #5a5a5a;">Buat Tugas Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST" style="max-width: 7000px; margin: auto;">
        @csrf
        <table class="table" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgb(71, 111, 156); background-color: #f9f9f9;">
            <tr style="background-color: #f1f1f1;">
                <td><label for="title" class="form-label" style="font-weight: 600; color: #333;">Judul</label></td>
                <td><input type="text" name="title" class="form-control" id="title" style="border-radius: 5px;" placeholder="Masukkan judul" required></td>
            </tr>

            <tr>
                <td><label for="description" class="form-label" style="font-weight: 600; color: #333;">Deskripsi</label></td>
                <td><textarea name="description" class="form-control" id="description" rows="3" style="border-radius: 5px;" placeholder="Masukkan deskripsi" required></textarea></td>
            </tr>

            <tr style="background-color: #f1f1f1;">
                <td><label for="status" class="form-label" style="font-weight: 600; color: #333;">Status</label></td>
                <td>
                    <select name="status" id="status" class="form-select" style="border-radius: 5px;" required>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="due_date" class="form-label" style="font-weight: 600; color: #333;">Jatuh Tempo</label></td>
                <td><input type="date" name="due_date" class="form-control" id="due_date" style="border-radius: 5px;" required></td>
            </tr>

            <tr style="background-color: #f1f1f1;">
                <td><label for="user_id" class="form-label" style="font-weight: 600; color: #333;">User ID</label></td>
                <td><input type="text" name="user_id" class="form-control" id="user_id" style="border-radius: 5px;" placeholder="Masukkan User ID" required></td>
            </tr>

            <tr>
                <td colspan="0" class="text-center">
                    <button type="submit" class="btn btn-primary" style="background-color: #5cb85c; border-color: #4cae4c; border-radius: 0px; padding: 10px 10px;">Simpan Task</button>
                </td>
            </tr>
        </table>
    </form>
@endsection
