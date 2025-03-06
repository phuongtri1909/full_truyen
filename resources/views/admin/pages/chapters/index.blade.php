@extends('admin.layouts.app')

@section('content-auth')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-0 mx-md-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Danh sách chương</h5>
                            <p class="text-sm mb-0">
                                Tổng số: {{ $totalChapters }} chương
                                ({{ $publishedChapters }} hiển thị / {{ $draftChapters }} nháp)
                            </p>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="statusToggle"
                                {{ $status->status === 'done' ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusToggle">
                                <span
                                    class="badge-status badge bg-{{ $status->status === 'done' ? 'success' : 'warning' }}">
                                    {{ $status->status === 'done' ? 'Hoàn thành' : 'Đang viết' }}
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <form method="GET" class="d-flex">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control w-auto" name="search" placeholder="Tìm kiếm..."
                                    aria-label="Tìm kiếm" aria-describedby="inputGroup-sizing-sm">
                                <button class="btn bg-gradient-primary btn-sm px-2 mb-0" type="submit" id="button-addon2">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </div>

                        </form>

                        <a href="{{ route('chapters.create') }}" class="btn bg-gradient-primary btn-sm mb-0 px-2"
                            type="button">
                            <i class="fa-solid fa-plus"></i> Thêm chương
                        </a>
                    </div>

                </div>
                <div class="card-body px-0 pt-0 pb-2">

                    @include('admin.pages.components.success-error')

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tên chương
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nội dung
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Views
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Trạng thái
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ngày tạo
                                    </th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapters as $item)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">Chương {{ $item->number }}</p>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"> <a target="_blank"
                                                    href="{{ route('chapter', $item->slug) }}">{{ $item->title }}</a></p>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->content }}</p>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->views }}</p>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                @if ($item->status == 'draft')
                                                    <span class="badge bg-gradient-warning">Viết nháp</span>
                                                @else
                                                    <span class="badge bg-gradient-success">Hiển thị</span>
                                                @endif
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->created_at }}</p>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('chapters.edit', $item->id) }}" class="mx-3"
                                                title="Sửa">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>

                                            @include('admin.pages.components.delete-form', [
                                                'id' => $item->id,
                                                'route' => route('chapters.destroy', $item->id),
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <x-pagination :paginator="$chapters" />

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts-admin')
    <script>
        $(document).ready(function() {
            $('#statusToggle').change(function() {
                const toggle = $(this);
                const label = toggle.closest('.form-check').find('.badge-status');

                $.ajax({
                    url: '{{ route('status.toggle') }}',
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            if (response.newStatus === 'done') {
                                label.removeClass('bg-warning').addClass('bg-success');
                                label.text('Hoàn thành');
                            } else {
                                label.removeClass('bg-success').addClass('bg-warning');
                                label.text('Đang viết');
                            }
                            showToast('Đã cập nhật trạng thái thành công', 'success');
                        }
                    },
                    error: function() {
                        toggle.prop('checked', !toggle.prop(
                        'checked')); // Revert checkbox state
                        showToast('Có lỗi xảy ra', 'error');
                    }
                });
            });
        });
    </script>
@endpush
