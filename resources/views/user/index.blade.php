<x-app-layout>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Users</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New User
            </a>
        </div>
    </div>


    <div class="table-settings mb-4">
        <div class="row align-items-center justify-content-between">
            <div class="col col-md-6 col-lg-3 col-xl-4">
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input id="custom-search-field" type="text" class="form-control" placeholder="Search resident..">
                </div>
            </div>
            <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
                <select id="custom-page-length" class="form-select fmxw-200 d-md-inline"
                    aria-label="Message select example 2">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body table-wrapper table-responsive">
            <table class="table table-hover" id="users-table">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0">Name</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Created</th>
                        <th class="border-0">Action</th>

                    </tr>
                </thead>
                {{-- <tbody class="align-middle" id="#users-list">
                    @include('user.users_list')
                </tbody> --}}
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    {{-- 
    <div class="card-footer px-3  align-items-center justify-content-between">
        {{ $users->links('vendor.pagination.bootstrap-5') }}
    </div> --}}

    <x-modal-delete modal-id="user-modal" button-id="destroy-user" type="delete" label="user" />

    @push('scripts')
        <script src="{{ asset('js/page/user/index.js') }}"></script>
    @endpush

</x-app-layout>
