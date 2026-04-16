@extends('layout.default')

@section('content')
    <div class="card mx-auto shadow-sm" style="max-width: 500px; margin-top: 100px;">
        <div class="card-body text-center">
            <div class="fs-3 fw-bold text-center">Add New Task</div>
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <input name="title" type="text" class="form-control">
                </div>
                <div>
                    <input type="datetime-local" name="deadline" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                {{-- I Can Do This Checking By Two Ways: --}}
                @if (session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-success rounded-pill">Submit</button>
            </form>

        </div>
    </div>
@endsection
