<div class="i-toasts">
    @foreach (['success', 'error', 'warn', 'info'] as $type)
        @if (session($type))
            <div class="i-toast i-toast-{{ $type }}">
                <div>
                    @if ($type == 'success')
                        <i class="fas fa-circle-check"></i>
                    @elseif ($type == 'error')
                        <i class="fas fa-circle-xmark"></i>
                    @elseif ($type == 'warn')
                        <i class="fas fa-triangle-exclamation"></i>
                    @elseif ($type == 'info')
                        <i class="fas fa-circle-exclamation"></i>
                    @endif
                    {{ session($type) }}
                </div>
                <i class="fas fa-xmark"></i>
            </div>
        @endif
    @endforeach

    @foreach (session('i-toasts', []) as $alert)
        @foreach ($alert as $key => $message)
            @if ($message)
                <div class="i-toast i-toast-{{ $key }}">
                    <div>
                        @if ($key == 'success')
                            <i class="fas fa-circle-check"></i>
                        @elseif ($key == 'error')
                            <i class="fas fa-circle-xmark"></i>
                        @elseif ($key == 'warn')
                            <i class="fas fa-triangle-exclamation"></i>
                        @elseif ($key == 'info')
                            <i class="fas fa-circle-exclamation"></i>
                        @endif
                        {{ $message }}
                    </div>
                    <i class="fas fa-xmark"></i>
                </div>
            @endif
        @endforeach
    @endforeach
</div>


<script>
    document.querySelectorAll(".i-toast").forEach((iToast) => {
        const parent = iToast.parentElement;

        iToast.addEventListener("animationend", () => {
            setTimeout(() => {
                iToast.remove();

                if (parent && parent.children.length === 0) {
                    parent.remove();
                }
            }, 350);
        });

        iToast.querySelector(".fa-xmark").addEventListener("click", () => {
            iToast.classList.add("closed");
        });
    });
</script>
