@extends('Employe.masteremp')

@section('content')
    <style>
        :root {
            --primary-navy: #1e3a8a;
            --navy-dark: #152a66;
            --navy-light: #4b5ea6;
            --navy-very-light: #e6e9f4;
            --white: #ffffff;
            --gradient-navy: linear-gradient(135deg, var(--primary-navy), var(--navy-dark));
            --glass: rgba(255, 255, 255, 0.7);
            --success: #28a745;
            --danger: #dc3545;
        }

        .documents-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: var(--glass);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .documents-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .documents-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: var(--gradient-navy);
            border-radius: 2px;
        }


        .add-document-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--gradient-navy);
            color: var(--white);
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
            position: relative;
            overflow: hidden;
            animation: pulse 2s infinite;
        }

        .add-document-btn i {
            transition: transform 0.3s ease;
        }

        .add-document-btn:hover {
            transform: translateY(-3px) rotate(2deg);
            box-shadow: 0 6px 16px rgba(30, 58, 138, 0.4);
        }

        .add-document-btn:hover i {
            transform: translateX(4px) rotate(10deg);
        }

        .add-document-btn:active {
            transform: scale(0.95);
            box-shadow: 0 2px 8px rgba(30, 58, 138, 0.2);
        }

        .table-container {
            overflow-x: auto;
        }

        .documents-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .documents-table th,
        .documents-table td {
            padding: 1.25rem;
            text-align: left;
            border-bottom: 1px solid var(--navy-very-light);
        }

        .documents-table th {
            background: var(--gradient-navy);
            color: var(--white);
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        .documents-table tr:hover {
            background: linear-gradient(to right, var(--navy-very-light), var(--white));
        }

        .document-title {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            text-transform: capitalize;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 6px rgba(30, 58, 138, 0.2);
        }

        .status-pending {
            background: var(--navy-light);
            color: var(--white);
        }

        .status-in_progress {
            background: var(--primary-navy);
            color: var(--white);
        }

        .status-approved {
            background: var(--navy-dark);
            color: var(--white);
        }

        .status-rejected {
            background: var(--navy-very-light);
            color: var(--primary-navy);
        }

        .status-completed {
            background: var(--navy-light);
            color: var(--white);
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cancel {
            background: var(--primary-navy);
            color: var(--white);
        }

        .btn-cancel:hover {
            background: var(--navy-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            color: var(--white);

        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            color: var(--white);
            background: var(--glass);
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in;
        }

        .alert-success {
            background: var(--success);
        }

        .alert-danger {
            background: var(--danger);
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 2.5rem;
            margin-bottom: 2rem;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pagination a, .pagination span {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            color: var(--primary-navy);
            background: var(--white);
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .pagination a.nav-arrow {
            width: 48px;
            height: 48px;
            background: var(--gradient-navy);
            color: var(--white);
        }

        .pagination a:hover:not(.nav-arrow) {
            background: var(--navy-very-light);
            color: var(--primary-navy);
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .pagination a.nav-arrow:hover {
            background: var(--navy-dark);
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .pagination .current {
            background: var(--gradient-navy);
            color: var(--white);
            font-weight: 600;
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .pagination .disabled {
            color: #aaa;
            background: #f1f3f5;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
        }

        .pagination .dots {
            font-size: 0.9rem;
            color: var(--primary-navy);
            padding: 0 0.5rem;
            background: none;
            box-shadow: none;
        }

        .pagination a i, .pagination span i {
            font-size: 1.1rem;
        }

        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3); }
            50% { transform: scale(1.03); box-shadow: 0 6px 16px rgba(30, 58, 138, 0.4); }
            100% { transform: scale(1); box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 767px) {
            .documents-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .documents-title {
                font-size: 1.8rem;
            }

            .documents-table th,
            .documents-table td {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .add-document-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="documents-container animate__animated animate__fadeIn">
        <div class="documents-header">
            <h1 class="documents-title">My Document Requests</h1>
            <a href="{{ route('employee.submit-document.create') }}" class="add-document-btn animate__animated animate__pulse">
                <i class="fas fa-file-upload"></i> Request New Document
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success animate__animated animate__fadeIn">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger animate__animated animate__fadeIn">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-container">
            <table class="documents-table">
                <thead>
                    <tr>
                        <th>Document Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Rejection Reason</th>
                        <th>Submitted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($documents as $document)
                        <tr>
                            <td class="document-title" title="{{ $document->document_title }}">{{ $document->document_title }}</td>
                            <td>{{ $document->description ?? 'N/A' }}</td>
                            <td><span class="status-badge status-{{ strtolower(str_replace(' ', '_', $document->status)) }}">{{ ucfirst($document->status) }}</span></td>
                            <td>{{ $document->rejection_reason ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($document->created_at)->format('M d, Y H:i') }}</td>
                            <td>
                                @if($document->status === 'pending')
                                    <form action="{{ route('employee.document.cancel', $document->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-cancel" onclick="return confirm('Are you sure you want to cancel this document request?')">
                                            <i class="fas fa-trash"></i> Cancel
                                        </button>
                                    </form>
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 2rem;">No document requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-container">
            {{ $documents->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection