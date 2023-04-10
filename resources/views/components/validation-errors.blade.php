@if ($errors->any())
    <div {{ $attributes }}>
        <div class="alert alert-danger d-flex" role="alert">
            <span class="p-3 badge badge-center rounded-pill bg-danger border-label-danger me-2">
                <i class='bx bxs-error fs-6'></i></span>
            <div class="d-flex flex-column ps-1">
                <h6 class="mb-1 alert-heading d-flex align-items-center fw-bold">Error!!</h6>
                <span>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </span>
            </div>
        </div>
    </div>
@endif
