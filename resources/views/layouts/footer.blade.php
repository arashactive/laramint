<x-logoutModal />

@livewireScripts

<!-- Bootstrap core JavaScript-->
<script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::to('js/sb-admin-2.min.js') }}"></script>
<script src="{{ URL::to('js/jquery-ui.min.js') }}"></script>
<script src="{{ URL::to('js/custom.js') }}"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="{{ URL::to('vendor/jQuery-TE/jquery-te-1.4.0.min.js') }}"></script>

@yield('js')
<script>
    $(".editor").jqte();
</script>