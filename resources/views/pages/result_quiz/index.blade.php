@extends('layouts.app')

@section('content')

<div class="container pb-5">

    <h3 class="fw-bold mb-4">Hasil Quiz Users</h3>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>User</th>
                            <th>Quiz</th>
                            <th width="15%">Nilai</th>
                            <th width="15%">Status</th>
                            <th width="20%">Tanggal Submit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $index => $result)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $result->user->name ?? '-' }}</td>
                                <td>{{ $result->quiz->title ?? '-' }}</td>
                                <td class="fw-bold 
                                    {{ $result->score >= 70 ? 'text-success' : 'text-danger' }}">
                                    {{ $result->score }}%
                                </td>
                                <td>
                                    @if ($result->is_passed)
                                        <span class="badge bg-success">Lulus</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Lulus</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $result->submitted_at->format('d M Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    Belum ada hasil quiz
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>


@include('pages.result_quiz.style')

@endsection
